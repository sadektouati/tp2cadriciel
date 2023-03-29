<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        
        $request->validate([
            'name' => 'required|string|min:10|max:100',
            'date_of_birth' => 'required|date_format:d-m-Y',
            'address' => 'required|string',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'email' => 'required|email|unique:etudiants',
            'town_id' => 'required|exists:villes,id',
        ]);

        $newPost = Etudiant::create([
            'nom' => $request->name,
            'date_de_naissance' => $request->date_of_birth,
            'adresse' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'ville_id' => $request->town_id
        ]);
           
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
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

        $villes = Ville::all()->sortByDesc("nom");
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
        $etudiant->update([
            'nom' => $request->name,
            'date_de_naissance' => $request->date_of_birth,
            'adresse' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'ville_id' => $request->town_id
        ]);
           
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return redirect()->route('home');
    }
}