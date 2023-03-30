@extends('layout')
@section('title', __('Files') )

@section('content')

<form class="mt-5 mb-5" action="{{ route('insert-file') }}" method="post" enctype="multipart/form-data">

    @csrf
    
    <div class="g-3 align-items-center mb-4">
        <div class="col-auto">
            <label for="inputNomFr" class="col-form-label">{{ __('Nom de fichier (Fr)') }}</label>
        </div>
        <div>
            <input type="text" name="nom_fr" id="inputNomFr" class="form-control  @error('nom_fr') is-invalid @enderror" aria-describedby="NomFrHelpInline" value="{{ old('nom_fr') }}">
        </div>

        @error('nom_fr')
            <span class="alert alert-danger d-inline-block m-2 p-2">{{ $message }}</span>
        @enderror
        
        <div>
            <span id="NomFrHelpInline" class="form-text">
                {{ __('Nom de fichier en Français') }}
            </span>
        </div>
    </div>

    <div class="g-3 align-items-center mb-4">
        <div class="col-auto">
            <label for="inputNomFr" class="col-form-label">{{ __('Nom de fichier (En)') }}</label>
        </div>
        <div>
            <input type="text" name="nom_en" id="inputNomFr" class="form-control @error('nom_fr') is-invalid @enderror" aria-describedby="NomFrHelpInline" value="{{ old('nom_en') }}">
        </div>

        @error('nom_en')
            <span class="alert alert-danger d-inline-block m-2 p-2">{{ $message }}</span>
        @enderror
        
        <div>
            <span id="NomFrHelpInline" class="form-text">
                {{ __('Nom de fichier en Anglais') }}
            </span>
        </div>
    </div>


    <div class="g-3 align-items-center mb-4">
        <div class="col-auto">
            <label for="inputFichier" class="col-form-label">{{ __('Fichier') }}</label>
        </div>
        <div>
            <input type="file" name="fichier" id="inputFichier" class="form-control @error('fichier') is-invalid @enderror" aria-describedby="FichierHelpInline">
        </div>

        @error('fichier')
            <span class="alert alert-danger d-inline-block m-2 p-2">{{ $message }}</span>
        @enderror

        <div>
            <span id="FichierHelpInline" class="form-text">
                {{ __('Fichier pdf, doc ou zip') }}
            </span>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">{{ __('Téléverser') }}</button>

</form>

@endsection('content')


