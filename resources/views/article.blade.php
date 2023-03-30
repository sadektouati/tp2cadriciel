@extends('layout')
@section('title', __('article') )

@section('content')

<div class="container">
    <h1 class="mb-4">{{Config::get('app.locale') == 'en' ? $article->titre_en :  $article->titre_fr}}</h1>
    
    @if(Auth::user()->id == $article->id_user)
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('my-article', [ $article ]) }}">{{ __('modifier') }}</a>
            <a class="navbar-brand" href="{{route('delete-article', [ $article ]) }}">{{ __('supprimer') }}</a>
        </div>
    </nav>
    @endif
    <div>
        {{Config::get('app.locale') == 'en' ? $article->corp_en :  $article->corp_fr}}
    </div>

</div>

@endsection('content')


