<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( Auth::id() != 1 ) abort(401);
        $etudiants = Etudiant::all()->sortByDesc("id");
        return view('etudiants', ['etudiants' => $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( Auth::id() != 1 ) abort(401);
        $villes = Ville::all()->sortByDesc("nom");;
        return view('create', ['villes' => $villes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if( Auth::id() != 1 ) abort(401);
        $request->validate([
            'name' => 'required|string|min:10|max:100',
            'date_of_birth' => 'required|date_format:d-m-Y',
            'address' => 'required|string',
            'phone' => 'required|regex:/(01)[0-9]{9}/|unique:etudiants',
            'email' => 'required|email|unique:etudiants|unique:users',
            'town_id' => 'required|exists:villes,id',
        ]);

        $etudiant = Etudiant::create([
            'nom' => $request->name,
            'date_de_naissance' => date('Y-m-d', strtotime($request->date_of_birth)),
            'adresse' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'ville_id' => $request->town_id
        ]);
           
        return redirect()->route('show', $etudiant);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        if( Auth::id() != 1 ) abort(401);
        $cetEtudiant = Etudiant::join('villes', 'villes.id', '=', 'ville_id')->select('etudiants.*', 'villes.nom as nom_ville')->find($etudiant->id);
        return view('etudiant', ['etudiant' => $cetEtudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        if( Auth::id() != 1 ) abort(401);
        $villes = Ville::all()->sortByDesc("nom");
        $etudiant->date_de_naissance = date('d-m-Y', strtotime($etudiant->date_de_naissance));
        return view('edit', ['villes' => $villes, 'etudiant' => $etudiant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        if( Auth::id() != 1 ) abort(401);

        $request->validate([
            'name' => 'required|string|min:10|max:100',
            'date_of_birth' => 'required|date_format:d-m-Y',
            'address' => 'required|string',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'email' => 'required|email',
            'town_id' => 'required|exists:villes,id',
        ]);

        $etudiant->update([
            'nom' => $request->name,
            'date_de_naissance' => date('Y-m-d', strtotime($request->date_of_birth)),
            'adresse' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
            'ville_id' => $request->town_id
        ]);
        // 'email' => $request->email,
                   
        return redirect()->route('students', $etudiant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        if( Auth::id() != 1 ) abort(401);
        $etudiant->delete();
        return redirect()->route('home');
    }
}