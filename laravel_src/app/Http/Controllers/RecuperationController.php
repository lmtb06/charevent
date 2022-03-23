<?php

namespace App\Http\Controllers;

use App\Http\Helpers\GenerateurMDP;
use App\Http\Requests\RecuperationRequest;
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
            abort(403, 'Veuillez vous déconnecter d\'abord');
        return view('recuperation');
    }

    public function reset(RecuperationRequest $request)
    {
		$mail = $request->validated('email');
        $user = User::where('mail', $mail)->first();

        // Si un utilisateur a bien été récupéré :
        if (!is_null($user)) {
            // Génération d'un nouveau mot de passe
            $mdp = GenerateurMDP::generer();
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
