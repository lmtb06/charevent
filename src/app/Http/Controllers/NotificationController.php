<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Enums\NotifType;
use App\Models\Evenement;
use App\Models\BesoinActif;
use App\Models\Participant;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\BesoinArchive;
use App\Models\BesoinEnAttente;
use App\Events\SuppressionBesoin;
use Illuminate\Support\Facades\DB;
use App\Events\ReponseNotification;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Boolean;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //DB::commit();

        $user = User::find(Auth::id());
        // Récupération de toutes les notifs
        $notifs = $user->notifications->sortByDesc('dateReception');
        $notifs = $notifs->where('supprime', False);

        return view('notification', [
            'notifs' => $notifs,
            'user' => $user,
        ]);
    }

    /**
     * Accepte le contenu de la notification
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function accepte(Request $request)
    {
        $id = $request->bouton;
        $notif = $this->repondreNotification($id, True);
        $user = User::find(Auth::id());
        $cible = User::find($notif->id_envoyeur);
        $event = Evenement::find($notif->id_evenement);

        switch ($notif->type){
            /*
            Réaction à l'invitation acceptée d'un utilisateur
            */
            case NotifType::InviteEvent:
                Participant::firstOrCreate([
                    'id_compte' => $notif->id_destinataire,
                    'id_evenement' => $notif->id_evenement,
                ]);

                event(new ReponseNotification($user, $cible, $event,
                    $user->prenom." a accepté de rejoindre l'événement."));
                
                break;
            /*
            Réaction à la modification validée d'un besoin
            */
            case NotifType::ModifBesoin:
                $besoin = BesoinActif::find($notif->id_besoin_original);
                $newer = BesoinEnAttente::find($notif->id_besoin_en_attente);
                $besoin->titre = $newer->titre;
                $besoin->save();

                event(new ReponseNotification($user, $cible, $event,
                    $user->prenom." a accepté de modifier le besoin selon votre suggestion."));

                break;

            /*
            Réaction à l'acceptation d'un nouveau participant
            */
            case NotifType::PostuleEvent:
                Participant::firstOrCreate([
                    'id_compte' => $notif->id_envoyeur,
                    'id_evenement' => $notif->id_evenement,
                ]);

                event(new ReponseNotification($user, $cible, $event,
                    "Votre candidature a été accepté."));

                break;

            /*
            Réaction à l'acceptation d'ajout d'un besoin
            */
            case NotifType::ProposeBesoin:
                $waiting = BesoinEnAttente::find($notif->id_besoin_en_attente);
                BesoinActif::firstOrCreate([
                    'id_evenement' => $notif->id_evenement,
                    'titre' => $waiting->titre,
                ]); 

                event(new ReponseNotification($user, $cible, $event,
                    $user->prenom." a accepté votre suggestion de besoin."));

                break;

            /*
            Réaction à la suppression validée d'un besoin
            */
            case NotifType::SupprimeBesoin:
                $besoin = BesoinActif::find($notif->id_besoin_original);

                if ($besoin->id_responsable !== null){
                    event(new SuppressionBesoin($besoin));
                }
    
                BesoinArchive::firstOrCreate([
                    'id_responsable' => $besoin->id_responsable,
                    'id_evenement' => $besoin->id_evenement,
                    'titre' => $besoin->titre,
                ]);

                event(new ReponseNotification($user, $cible, $event,
                    $user->prenom." a accepté de supprimer le besoin."));
    
                $besoin->delete();

                break;
            case NotifType::VolontaireBesoin:

                break;
        }

        return redirect()->route('pageNotification');
    }

    /**
     * Refuse le contenu de la notification
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function refuse(Request $request)
    {
        $id = $request->bouton;
        $notif = $this->repondreNotification($id, False);
        $user = User::find(Auth::id());
        $cible = User::find($notif->id_envoyeur);
        $event = Evenement::find($notif->id_evenement);

        switch ($notif->type){
            case NotifType::InviteEvent:
                event(new ReponseNotification($user, $cible, $event,
                $user->prenom." a refusé de supprimer le besoin."));
                break;
            case NotifType::ModifBesoin:
                event(new ReponseNotification($user, $cible, $event,
                $user->prenom." a refusé de modifier le besoin."));
                break;

            case NotifType::PostuleEvent:
                event(new ReponseNotification($user, $cible, $event,
                "Votre demande de participation à un événement a été refusé."));
                break;
            case NotifType::ProposeBesoin:
                event(new ReponseNotification($user, $cible, $event,
                "Votre proposition de besoin à un événement a été refusé."));
                break;
            case NotifType::SupprimeBesoin:
                event(new ReponseNotification($user, $cible, $event,
                "Votre demande de suppression d'un besoin a été refusé."));
                break;
            case NotifType::VolontaireBesoin:
                break;
            }

        return redirect()->route('pageNotification');
    }

    /**
     * Applique la réponse à une notification
     */
    private function repondreNotification($id, $accepte): Notification{
        $notif = Notification::find($id);
        $notif->accepte = $accepte;
        $notif->dateChoix = Carbon::now()->toDate();
        $notif->dateLecture = Carbon::now()->toDate();
        $notif->save();
        return $notif;
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $notifs = $request->notifications;
        // Déclare les notifications sélectionnées comme supprimées
        foreach ($notifs as $notif){
            $n = Notification::find($notif);
            $n->supprime = True;
            $n->save();
        }
        return $this->index();
    }
}
