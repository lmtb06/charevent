<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Evenement;
use App\Models\BesoinActif;
use Illuminate\Http\Request;
use App\Models\BesoinArchive;
use App\Models\BesoinEnAttente;
use App\Models\NotificationSimple;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use App\Models\NotificationPropositionBesoin;
use App\Models\NotificationSuppressionBesoin;
use App\Models\NotificationModificationBesoin;

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
        $validated = $request->validate([
            'titre' => 'required|string|max:50',            
        ]);
        $event = Evenement::findOrFail($id);

        if (Auth::id() === $event->id_createur){
            BesoinActif::create([
                'titre' => $validated['titre'],
                'id_evenement' => $id,
            ]);
        }else{
            $b = BesoinEnAttente::create([
                'titre' => $validated['titre'],
                'id_evenement' => $id,
            ]);
            $user = User::find(Auth::id());

            NotificationPropositionBesoin::create([
                'id_destinataire' => $event->id_createur,
                'id_envoyeur' => Auth::id(),
                'id_evenement' => $event->id_evenement,
                'id_besoin_en_attente' => $b->id_besoin,
                'dateReception' => Carbon::now()->toDate(),
                'message' => $user->prenom." propose le besoin " . $b->titre . " pour : ". $event->titre
            ]);
        }

        return redirect()->route('pageEvenement',
            ['id' => $id]);
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


        // Si l'utilisateur à l'origine de la modification
        // est le créateur de l'événement : on modifie et prévient
        // de la modif l'utilisateur responsable du besoin (si existe)
        if (Auth::id() === $event->id_createur || Auth::user()->role == 0){

            $besoin->titre = $validated['titre'];
            $besoin->save();
            
            if (isset($besoin->id_responsable)){
                NotificationSimple::create([
                    'id_destinataire' => $besoin->id_responsable,
                    'id_evenement' => $besoin->id_evenement,
                    'dateReception' => Carbon::now()->toDate(),
                    'message' => "Un besoin dont vous êtes responsable a été modifié : ". $besoin->titre,
                ]);
            }
        }else{
            // Sinon, création d'un besoin équivalent avec nouveau titre
            $b = BesoinEnAttente::create([
                'titre' => $validated['titre'],
                'id_evenement' => $besoin->id_evenement,
                'id_responsable' => $besoin->id_responsable,
            ]);
            $user = User::find(Auth::id());
            // Et génération d'une notification dans la table
            NotificationModificationBesoin::create([
                'id_destinataire' => $event->id_createur,
                'id_envoyeur' => Auth::id(),
                'id_evenement' => $event->id_evenement,
                'id_besoin_en_attente' => $b->id_besoin,
                'id_besoin_original' => $besoin->id_besoin,
                'dateReception' => Carbon::now()->toDate(),
                'message' => $user->prenom." propose de modifier le besoin " . $besoin->titre . " par : ". $b->titre .".",
            ]);
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
    public function destroy($id)
    {
        $besoin = BesoinActif::findOrFail($id);
        $event = Evenement::find($besoin->id_evenement);

        if (Auth::id() === $event->id_createur || Auth::user()->role == 0){
            // Prévenir l'utilisateur responsable du besoin qu'il est supprimé
            if (!is_null($besoin->id_responsable)){
                NotificationSimple::create([
                    'id_destinataire' => $besoin->id_responsable,
                    'id_evenement' => $besoin->evenement->id_evenement,
                    'dateReception' => Carbon::now()->toDate(),
                    'message' => "Le besoin ". $besoin->titre  ." dont vous êtes responsable a été supprimé",

                ]);
            }

            BesoinArchive::create([
                'id_responsable' => $besoin->id_responsable,
                'id_evenement' => $besoin->id_evenement,
                'titre' => $besoin->titre,
            ]);

            $besoin->delete();
        }else{

            $user = User::find(Auth::id());

            NotificationSuppressionBesoin::create([
                'id_destinataire' => $event->id_createur,
                'id_envoyeur' => Auth::id(),
                'id_evenement' => $event->id_evenement,
                'id_besoin' => $besoin->id_besoin,
                'dateReception' => Carbon::now()->toDate(),
                'message' => $user->prenom." souhaite supprimer le besoin " . $besoin->titre . " de ". $event->titre
            ]);

        }
    }
}
