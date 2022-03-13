<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Support\Facades\Auth;


class AfficherEvenement extends Controller
{
    public function __invoke($id)
    {
        $user = Auth::user();
        $event = Evenement::find($id);

        return view('evenement',[
            'user' => $user,
            'event' => $event,
        ]);
    }

}
