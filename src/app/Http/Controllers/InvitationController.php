<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Evenement;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    // Afficher le formulaire de recherche
    public function showForm($id)
	{
        $event = Evenement::findOrFail($id);

        // Si l'utilisateur identifié n'est pas le propriétaire de l'événement
        if ($event->id_createur != Auth::id()){
            return redirect()->route('pageEvenement',
                ['id' => $event->id_evenement]);
        }
        return view('invitation',[
            'user' => User::find(Auth::id()),
            'event' => $event
        ]);
	}

    public function showResult($id, Request $request)
	{
		// Afficher le formulaire de recherche

        $data = $request->all();

        $user= User::select('departement','ville','dateNaissance','numeroTelephone','nom','prenom')
                    ->join('localisations','comptes_actifs.id_residence','localisations.id_localisation')

                    ->when(!empty($data['departement']) , function ($query) use($data){
                        return $query->where('departement', $data['departement']);
                        })
                    ->when(!empty($data['ville']) , function ($query) use($data){
                        return $query->where('ville' ,$data['ville']);
                        })
                    ->when(!empty($data['ageMin']) , function ($query) use($data){
                        return $query->whereDate('dateNaissance', '<', Carbon::now()->subYears($data['ageMax'])->toDate());
                        })
                    ->when(!empty($data['ageMax']) , function ($query) use($data){
                        return $query->whereDate('dateNaissance', '>', Carbon::now()->subYears($data['ageMin'])->toDate());
                        })
                    ->when(!empty($data['tel']) , function ($query) use($data){
                        return $query->where('numeroTelephone', '<>', 'null');
                        })
                    ->get();

        print($user . "<br>");
        //return view();
	}
}
