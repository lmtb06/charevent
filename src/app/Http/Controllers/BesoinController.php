<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Evenement;
use App\Models\BesoinActif;
use Illuminate\Http\Request;
use App\Events\ProposeBesoin;
use App\Models\BesoinArchive;
use App\Models\BesoinEnAttente;
use App\Events\SuppressionBesoin;
use App\Events\ModificationBesoin;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Events\SouhaiteSuppressionBesoin;
use App\Events\SouhaiteModificationBesoin;


class BesoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $event = Evenement::findOrFail($id);       

        $validated = $request->validate([
            'titre' => 'required|string|max:50',            
        ]);
            
        // Si l'utilisateur authentifié est le créateur de l'événement
        // Il peut créer un besoin directement
        if (Auth::id() === $event->id_createur){
            BesoinActif::create([
                'titre' => $validated['titre'],
                'id_evenement' => $id,
        ]);
        }else{
            // Sinon on verifie si l'utilisateur est participant
            $user = Participant::where('id_evenement', '=', $event->id_evenement)
                        ->where('id_compte', '=', Auth::id())
                        ->first();
                
            if ($user === null) {
                return redirect()->route('pageEvenement', ['id' => $id]);
            } else {
                // Sinon il crée un besoin temporaire et envoie une proposition
                $b = BesoinEnAttente::create([
                    'titre' => $validated['titre'],
                    'id_evenement' => $id,
                    'id_responsable' => Auth::id()
                ]);
                $user = User::find(Auth::id());
                // Envoie de la notification proposant le nouveau besoin
                event(new ProposeBesoin($user, $event, $b));
            }
        }
        return redirect()->route('pageEvenement',['id' => $id]);
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:50',            
        ]);

        $besoin = BesoinActif::findOrFail($id);
        $event = Evenement::find($besoin->id_evenement);

        // Si l'utilisateur authentifié est le créateur de l'événement
        // Il peut modifier un besoin directement
        if (Auth::id() === $event->id_createur || Auth::user()->role == 0){
            $besoin->titre = $validated['titre'];
            $besoin->save();
            
          
            if ($besoin->id_responsable !== null){
                event(new ModificationBesoin($besoin));
            }
        }else{
            // Sinon on verifie si l'utilisateur est participant
            $user = Participant::where('id_evenement', '=', $event->id_evenement)
                        ->where('id_compte', '=', Auth::id())
                        ->first();
                    
            if ($user === null) {
                return redirect()->route('pageEvenement', ['id' => $id]);
            } else {
                // Sinon, création d'un besoin équivalent avec nouveau titre
                $b = BesoinEnAttente::create([
                    'titre' => $validated['titre'],
                    'id_evenement' => $besoin->id_evenement,
                    'id_responsable' => $besoin->id_responsable,
                ]);
                $user = User::find(Auth::id());
                // Et génération d'une notification dans la table
                event(new SouhaiteModificationBesoin($event, $user, $besoin, $b));
            }
        }
        return redirect()->route('pageEvenement',
            ['id' => $event->id_evenement]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $besoin = BesoinActif::findOrFail($id);
        $event = Evenement::find($besoin->id_evenement);

        if (Auth::id() === $event->id_createur || Auth::user()->role == 0){
            // Prévenir l'utilisateur responsable du besoin qu'il est supprimé
            if ($besoin->id_responsable !== null){
                event(new SuppressionBesoin($besoin));
            }

            BesoinArchive::create([
                'id_responsable' => $besoin->id_responsable,
                'id_evenement' => $besoin->id_evenement,
                'titre' => $besoin->titre,
            ]);

            $besoin->delete();
        }else{
            // Effectue la demande de suppression d'un besoin
            $user = User::find(Auth::id());
            event(new SouhaiteSuppressionBesoin($event, $user, $besoin));
        }
    }
}
