<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MonArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::where('id_user', '=', Auth::id())->orderByDesc("id")->paginate(8, ['id', 'id_user', 'titre_' . App::currentLocale() . ' as titre']);
        return view('mes-articles', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Article $article)
    {
        if($article->id_user && $article->id_user != Auth::id()) abort(401);

        return view('create-article', ['article' => $article]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article)
    {
        if($article->id_user && $article->id_user != Auth::id()) abort(401);
        //
        $request->validate([
            'titre_en' => 'required|string|min:10|max:200' . ($article->id ? '' : '|unique:articles'),
            'corp_en' => 'required|string|min:10',
            'titre_fr' => 'required|string|min:10|max:200' . ($article->id ? '' : '|unique:articles'),
            'corp_fr' => 'required|string|min:10',
        ]);

        Article::updateOrCreate(
            ['id' => $article->id],
            [
                'titre_en' => $request->titre_en,
                'corp_en' => $request->corp_en,
                'titre_fr' => $request->titre_fr,
                'corp_fr' => $request->corp_fr,
                'id_user' => Auth::id()
            ]
        );

        return redirect()->route('my-articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if($article->id_user != Auth::id()) abort(401);

        $article->delete();

        return redirect()->route('my-articles');

    }
}
