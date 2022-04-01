<?php

namespace App\Http\Controllers;

use App\Models\NotificationInvitationParticipation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());

        // Récupération de toutes les notifs issues des 7 tables
        $partic = $user->demandeParticipationsRecues;
        $invit = $user->invitationEvenementRecues;
        $modif = $user->demandeModificationBesoinRecues;
        $propose = $user->propositionBesoinRecues;
        $info = $user->informationRecues;
        $suppr = $user->demandeSuppressionBesoinRecues;
        $volont = $user->volontaireBesoinRecues;


        // Concaténation de tous les résultats et tris
        $notifs = $partic->concat($invit)
            ->concat($modif)->concat($propose)
            ->concat($info)->concat($suppr)
            ->concat($volont); //->orderBy('dateReception', 'descending');

        //dd($notifs);
        return view('notification', [
            'notifs' => $notifs,
            'user' => $user,
        ]);
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
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
