<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchEventController extends Controller
{
    /**
     * Display a listing of the resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('accueil_connecte');
    }

    public function show($id)
    {
        $event=Evenement::findOrFail($id);
        return view('evenement', ['event' => $event]);
    }

    public function search(Request $request)
    {
        $keyword= $request->input('q');
        $data = DB::select("SELECT * FROM `evenements_actifs` WHERE titre LIKE '%$keyword%' OR `description` LIKE '%$keyword%' ");

        return view('accueil_connecte')->with("data", $data);
    }

    public function getResults(Request $request)
    {
        $query=$request->input('query');
        if(!$query)
        {
            return redirect()->route('/evenement/all');
        }

        $user = User::where(DB::raw("CONCAT(prenom, ' ',nom )"), 'LIKE', "%{$query}%")
        ->orWhere('id_compte','LIKE',"%{$query}")->get();

        $event = DB::select("SELECT * FROM `evenements_actifs` WHERE titre LIKE '%$keyword%' OR `description` LIKE '%$keyword%' ");

        $result = $user->merge($event);

        return view('search.results')->with('user',$result);
    }
}
