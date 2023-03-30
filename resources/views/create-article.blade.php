@extends('layout')
@section('title', 'Créer nouvel étudiant')

@section('content')

<form class="d-flex bg-white justify-content-center p-5 mt-5 mb-5 special-form" action="{{route('my-article', $article) }}" method="post">
    @csrf

<div>
<div class="g-3 align-items-center mb-4">
        <div>
            <label for="inputTitreFr" class="col-form-label">{{ __('Titre d\'article (Fr)') }}</label>
        </div>
        <div>
            <input type="text" name="titre_fr" value="{{ old('titre_fr') ?? $article->titre_fr }}" id="inputTitreFr" class="form-control @error('titre_fr') is-invalid @enderror" aria-describedby="TitreEnHelpInline" value="{{$article->titre_fr}}">
        </div>

        <div class="mt-1">
            <span id="TitreFrHelpInline" class="form-text">
                {{ __('Titre de texte en Français') }}
            </span>
        </div>

        @error('titre_fr')
            <span class="alert alert-danger d-inline-block m-2 p-2">{{ $message }}</span>
        @enderror
        
    </div>

    <div class="g-3 align-items-center mb-4">
        <div class="col-auto">
            <label for="inputCorpFr" class="col-form-label">{{ __('Corp d\'article') }}</label>
        </div>
        <div>
            <textarea name="corp_fr" id="inputCorpFr" class="form-control @error('corp_fr') is-invalid @enderror" aria-describedby="CorpFrHelpInline" rows="10">{{ old('corp_fr') ?? $article->corp_fr}}</textarea>
        </div>

        <div class="mt-1">
            <span id="CorpFrHelpInline" class="form-text">
                {{ __('Corp de texte en Français') }}
            </span>
        </div>

        @error('corp_fr')
            <span class="alert alert-danger d-inline-block m-2 p-2">{{ $message }}</span>
        @enderror

    </div>
</div>

<div>
<div class="g-3 align-items-center mb-4">
        <div>
            <label for="inputTitreEn" class="col-form-label">{{ __('Titre d\'article (En)') }}</label>
        </div>
        <div>
            <input type="text" name="titre_en" value="{{ old('titre_en') ?? $article->titre_en}}" id="inputTitreEn" class="form-control @error('titre_fr') is-invalid @enderror" aria-describedby="TitreEnHelpInline">
        </div>

        <div class="mt-1">
            <span id="TitreEnHelpInline" class="form-text">
            {{ __('Titre de texte en Anglais') }}
            </span>
        </div>
        
        @error('titre_en')
            <span class="alert alert-danger d-inline-block m-2 p-2">{{ $message }}</span>
        @enderror

    </div>

    <div class="g-3 align-items-center mb-4">
        <div>
            <label for="inputCorpEn" class="col-form-label">{{ __('Corp d\'article (En)') }}</label>
        </div>
        <div>
            <textarea name="corp_en" id="inputCorpEn" class="form-control @error('titre_fr') is-invalid @enderror" aria-describedby="CorpEnHelpInline" rows="10">{{ old('corp_en') ?? $article->corp_en }}</textarea>
        </div>

        <div class="mt-1">
            <span id="CorpEnHelpInline" class="form-text">
            {{ __('Corp de texte en Anglais') }}
            </span>
        </div>

        @error('corp_en')
            <span class="alert alert-danger d-inline-block m-2 p-2">{{ $message }}</span>
        @enderror

    </div>

</div>

<div>
    <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
    @if( $article->id )
        <a href="{{route('delete-article', $article) }}" class="btn btn-secondary">{{ __('Supprimer') }}</a>
    @endif
</div>

</form>
@endsection('content')
