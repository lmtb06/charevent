<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Evenement;
use App\Models\BesoinActif;
use Illuminate\Http\Request;
use App\Models\NotificationSimple;
use Illuminate\Foundation\Auth\User;

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
        Evenement::findOrFail($id);
        BesoinActif::create([
            'titre' => $validated['titre'],
            'id_evenement' => $id,
        ]);

        return redirect()->route('pageEvenement',
            ['id' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        
        $besoin = BesoinActif::updateOrCreate(
            ['id_besoin' => $id],
            ['titre' => $validated['titre']]
        );

        return redirect()->route('pageEvenement',
            ['id' => $besoin->evenement->id_evenement]);
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

        // Prévenir l'utilisateur responsable du besoin qu'il est supprimé
        if (!is_null($besoin->id_responsable)){
            NotificationSimple::create([
                'id_destinataire' => $besoin->id_responsable,
                'id_evenement' => $besoin->evenement->id_evenement,
                'dateReception' => Carbon::now()->toDate(),
                'message' => "Le besoin dont vous êtes responsable a été supprimé",

            ]);
        }
    }
}
