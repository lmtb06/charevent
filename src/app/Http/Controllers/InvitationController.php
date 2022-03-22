<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\User;
use Illuminate\Http\Request;

use Carbon\Carbon;

class InvitationController extends Controller
{
    // Afficher le formulaire de recherche
    public function showForm($id)
	{
        $nomEvent = Evenement::findOrFail($id)->titre;
        return view('invitation',[
            'nomEvent' => $nomEvent,
        ]);
	}

    public function showResult($id, Request $request)
	{
		// Afficher le formulaire de recherche

        $data = $request->all();

        $user=User::select('departement','ville','dateNaissance','numeroTelephone','nom','prenom')
                    ->join('localisations','comptes_actifs.id_residence','localisations.id_localisation')
                    ->when(!empty($data['departement']) , function ($query) use($data){
                        return $query->where('departement', $data['departement']);
                        })
                    ->when(!empty($data['ville']) , function ($query) use($data){
                        return $query->where('ville' ,$data['ville']);
                        })
                    ->when(!empty($data['ageMin']) , function ($query) use($data){
                        return $query->whereDate('dateNaissance', '<', Carbon::now()->subYears($data['ageMin'])->toDateString());
                        })
                    ->when(!empty($data['ageMax']) , function ($query) use($data){
                        return $query->whereDate('dateNaissance', '>', Carbon::now()->subYears($data['ageMax'])->toDateString());
                        })
                    ->when(!empty($data['tel']) , function ($query) use($data){
                        return $query->where('numeroTelephone', '<>', 'null');
                        })
                    ->get();

        print($user . "<br>");
        //return view();
	}
}
