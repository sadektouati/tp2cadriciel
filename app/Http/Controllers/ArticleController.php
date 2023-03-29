<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
 
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Article::orderBy("id")->paginate(30, ['id', 'id_user', 'titre_' . App::currentLocale() . ' as titre']);
        return view('accueil', ['articles' => $articles]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article', ['article' => $article]);
    }

}
