<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Participant;
use Illuminate\Support\Facades\Auth;


class AfficherEvenement extends Controller
{
    public function __invoke($id)
    {
        $user = Auth::user();
        $event = Evenement::find($id);  
        //dd($event->comptes->toArray());      
        
        return view('evenement',[
            'user' => $user,
            'event' => $event,
            'participants' => $event->comptes
        ]);
    }

}
