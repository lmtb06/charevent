<?php

namespace App\Http\Controllers;

use App\Mail\MdpOublieMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RecuperationController extends Controller
{
    public function index()
    {
        // Les utilisateurs connectés ne peuvent pas voir la page d'inscription
        if (Auth::check())
            abort(403, 'Veuillez vous déconnecter pour récuperer un compte');
        return view('recuperation');
    }

    public function reset(Request $request)
    {
        $user = User::where('mail', $request->email)->first();

        // Si un utilisateur a bien été récupéré :
        if (!is_null($user)) {
            // Génération d'un nouveau mot de passe
            $mdp = Str::random(8);
            $hash = Hash::make($mdp);

            // Enregistrement de ce dernier dans la db
            $user->hashMDP = $hash;
            $user->save();

            // Envoi sa version en clair par mail
            Mail::to($user->mail)->send(new MdpOublieMail($user, $mdp));
        }

        // Retourne vers la page de connexion
        return redirect()->route('connexion');
    }
}
