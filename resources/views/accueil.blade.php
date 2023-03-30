@extends('layout')
@section('title', 'Articles')

@section('content')

<ul class="list-group">
    @forelse($articles as $article)
        <li class="list-group-item">
            <span class="d-inline-block p-3">{{++$loop->index}}</span>
            <span class="d-inline-block p-3"><a href="{{route('article', [ $article ]) }}">{{$article->titre}}</a></span>
            <span class="d-inline-block p-3">
                ({{$article->author->name}})
            </span>
            @if(Auth::user()->id == $article->id_user)
                <span class="d-inline-block p-3"><a href="{{route('my-article', [ $article ]) }}">{{ __('modifier') }}</a></span>
            @endif
        </li>
    @empty
        <li>{{ __('Aucun article') }} <a href="{{route('my-article') }}">{{ __('Créer article') }}</a></li>
    @endforelse
</ul>

<div class="mt-5">
    {{ $articles->links() }}
</div>

@endsection('content')


