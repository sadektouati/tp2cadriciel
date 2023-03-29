<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::orderBy("id")->paginate(20, ['id', 'id_user', 'slug', 'nom_' . App::currentLocale() . ' as nom']);

        return view('files', ['files' => $files]);
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-file');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_en' => 'required|string|min:10|max:100|unique:files',
            'nom_fr' => 'required|string|min:10|max:100|unique:files',
            'fichier' => 'file|mimes:doc,pdf,zip'
        ]);

            $fichier = $request->file('fichier');
            $fichierSurDisk = str_replace(' ', '-', $request->nom_en);
            $extension = $fichier->getClientOriginalExtension();
            $slug = $fichier->storeAs('public/' . $request->user()->id, $fichierSurDisk . '.' . $extension);

        File::create(
            [
                'nom_en' => $request->nom_en,
                'nom_fr' => $request->nom_fr,
                'slug' => $slug,
                'id_user' => Auth::id()
            ]
        );

        return redirect()->route('files');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        if($file->id_user != Auth::id()) abort(401);

        Storage::delete($file->slug);
        $file->delete();

        return redirect()->route('files');
    }
}
