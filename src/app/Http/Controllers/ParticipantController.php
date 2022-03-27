<?php

namespace App\Http\Controllers;

use App\Events\ParticipantAPostule;
use App\Events\ParticipantEstInvite;
use App\Events\ParticipantQuitte;
use App\Models\BesoinActif;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Evenement;
use App\Models\Participant;
use App\Models\Localisation;
use Illuminate\Http\Request;
use App\Models\NotificationSimple;
use Illuminate\Support\Facades\Auth;
use App\Models\NotificationDemandeParticipation;
use App\Models\NotificationInvitationParticipation;

class ParticipantController extends Controller
{
    /**
     * Demande à rejoindre un événement
     *
     * @param int $id
     * @return void
     */
    public function create($id){
        $event = Evenement::findorFail($id);
        $user = User::find(Auth::id());
        
        if ($user->id_compte == $event->id_createur){
            abort(403, 'Vous ne pouvez pas rejoindre cet événement car vous en êtes le créateur');
        }
        // Création de la demande de participation  
        event(new ParticipantAPostule($user, $event));

        return redirect()->route('pageEvenement', [
            'id' => $event->id_evenement,
        ]);

    }

    /**
     * Enregistre les invitations à participer à un événement
     *
     * @param [type] $id
     * @param Request $request
     */
    public function store($id, Request $request){
        $event = Evenement::find($id);
        $participant = $request->participant;        
        foreach ($participant as $p){
            event(new ParticipantEstInvite((int)$p, $event));
        }
        return redirect()->route('pageEvenement', [
            'id' => $event->id_evenement,
        ]);
    }


    /**
     * Un utilisateur quitte un événement
     *
     * @param int $id
     * @return void
     */
    public function delete ($id){
        $event = Evenement::findorFail($id);
        $user_id = Auth::id();
        
        if ($user_id == $event->id_createur){
            abort(403, 'Vous ne pouvez pas quitter cet événement car vous en êtes le créateur');
        }

        // Gestion des besoins dont l'utilisateur est responsable
        BesoinActif::where(['id_responsable', $user_id])->update('id_responsable', NULL);

        // Retire la participation à l'événement de cet utilisateur
        Participant::where([
            ['id_compte', $user_id],
            ['id_evenement', $event->id_evenement]
        ])->delete();

        // Création de la notification
        event(new ParticipantQuitte(User::find($user_id), $event));
                
        return redirect()->route('accueil');
    }

    /**
     * Effectue la recherche d'utilisateurs selon les critères définis
     *
     * @param Request $request Objet contenant les inputs de l'utilisateurs
     */
    public function search($id, Request $request){

        $validated = $request->validate([
            'name'          => 'nullable|string|min:2',
            'departement'   => 'nullable|numeric|digits_between:1,3',
            'ville'         => 'nullable|alpha_dash',
            'age_min'       => 'nullable|numeric|min:1',
            'age_max'       => 'nullable|numeric|gt:age_min',
            'tel'           => 'nullable',
        ]);

        $event = Evenement::findOrFail($id);
        
        $tel = !is_null($request->tel);

        // Traitement de la date - avec age compris entre 1 et 150 par défaut si les champs sont vides
        $ageMin = 1;
        $ageMax = 150;
        if (filled($validated['age_min'])) $ageMin = $validated['age_min'];
        if (filled($validated['age_max'])) $ageMax = $validated['age_max'];

        $min = Carbon::now()->subYears($ageMin)->toDate();
        $max = Carbon::now()->subYears($ageMax)->toDate();

        // Requête si tous les critères concernant l'utilisateurs
        $users = User::whereHasTelephone($tel)
            ->whereName($validated['name'])
            ->whereAge($min, $max)
            ->get();
        
        $ville = $validated['ville'];
        $dpt = $validated['departement'];

        // Requête concernant les localisations
        $localisations = Localisation::when($dpt, function ($query, $dpt){
            return $query->where('departement', $dpt);
        })->when($ville, function ($query, $ville){
            return $query->where('ville', 'like', '%'.$ville.'%');
        })
        ->get();
        
        // Filtre les utilisateurs correspondant aux localisations retournées
        if (count($localisations) == 1){
            foreach ($localisations as $lieu){
                $users = $users->diff($lieu->comptes);
            }
        }

        // Filtre les participants déjà présents dans l'événement
        $participants = Participant::where('id_evenement', $event->id_evenement)->get();
        $users = $users->diff($participants);

        // Filtre les participants potentiels qui n'ont pas encore répondu
        $notifs = NotificationInvitationParticipation::where([
            ['id_evenement', $event->id_evenement],
            ['accepte', null],
            ['supprime', false]
            ])
        ->get();
        $users = $users->diff($notifs);

        $notifs = NotificationDemandeParticipation::where([
            ['id_evenement', $event->id_evenement],
            ['accepte', null],
            ['supprime', false]
            ])
        ->get();
        $users = $users->diff($notifs);

        return view('rechercheParticipants', [
            'participants' => $users,
            'event' => $event,
            'user' => User::find(Auth::id()),
        ]);
    }
}
