@extends('layout')
@section('title', __('Files') )

@section('content')

<a class="btn btn-primary" href="{{route('create-file') }}">{{ __('ajouter file') }}</a>

<ul class="list-group">
    @foreach($files as $file)
        <li class="list-group-item">
            <span class="d-inline-block p-3">{{++$loop->index}}</span>
            <span class="d-inline-block p-3"><a href="{{ Storage::url( $file->slug ) }}">{{$file->nom}}</a></span>
            @if(Auth::user()->id == $file->id_user)
                <span class="d-inline-block p-3"><a href="{{route('delete-file', [ $file ]) }}">{{ __('supprimer') }}</a></span>
            @endif
        </li>
    @endforeach
</ul>

<div class="mt-5">
    {{ $files->links() }}
</div>


@endsection('content')


