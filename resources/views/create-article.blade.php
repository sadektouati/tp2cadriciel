@extends('layout')
@section('title', 'Créer nouvel étudiant')

@section('content')
<form class="mt-5 mb-5" action="{{route('my-article', $article) }}" method="post">
    @csrf
    
    <div class="g-3 align-items-center mb-4">
        <div>
            <label for="exampleInputVille" class="col-form-label">{{ __('Catégorie') }}</label>
        </div>
        <div>
            <select name="id_categorie" class="form-control @error('id_categorie') is-invalid @enderror" id="exampleInputVille" aria-describedby="vhilleHelp">
                <option value="" disabled selected>{{ __('Choisissez') }}</option>
                @forelse($categories as $categorie)
                <option value="{{$categorie->id}}" {{$categorie->id == $article->id_categorie ? 'selected' : ''}}>{{$categorie->nom}}</option>
                @empty
                <option value="" disabled selected>{{ __('Aucune catégorie') }}</option>
                @endforelse
            </select>
        </div>

        <div class="mt-1">
            <span id="addressHelpInline" class="form-text">
                {{ __('Choisissez une catégorie') }}
            </span>
        </div>

        @error('id_categorie')
            <span class="alert alert-danger">{{$message}}</span>
        @enderror

    </div>

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
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror
        
    </div>

    <div class="g-3 align-items-center mb-4">
        <div class="col-auto">
            <label for="inputCorpFr" class="col-form-label">{{ __('Corp d\'article') }}</label>
        </div>
        <div>
            <textarea name="corp_fr" id="inputCorpFr" class="form-control @error('corp_fr') is-invalid @enderror" aria-describedby="CorpFrHelpInline" rows="5">{{ old('corp_fr') ?? $article->corp_fr}}</textarea>
        </div>

        <div class="mt-1">
            <span id="CorpFrHelpInline" class="form-text">
                {{ __('Corp de texte en Français') }}
            </span>
        </div>

        @error('corp_fr')
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror

    </div>


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
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror

    </div>

    <div class="g-3 align-items-center mb-4">
        <div>
            <label for="inputCorpEn" class="col-form-label">{{ __('Corp d\'article (En)') }}</label>
        </div>
        <div>
            <textarea name="corp_en" id="inputCorpEn" class="form-control @error('titre_fr') is-invalid @enderror" aria-describedby="CorpEnHelpInline" rows="5">{{ old('corp_en') ?? $article->corp_en }}</textarea>
        </div>

        <div class="mt-1">
            <span id="CorpEnHelpInline" class="form-text">
            {{ __('Corp de texte en Anglais') }}
            </span>
        </div>

        @error('corp_en')
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror

    </div>


    <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
    @if( $article->id )
        <a href="{{route('delete-article', $article) }}" class="btn btn-secondary">{{ __('Supprimer') }}</button>
    @endif

</form>
@endsection('content')
