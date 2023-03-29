@extends('layout')
@section('title', __('Modifier étudiant'))

@section('content')
<form class="mt-5 mb-5" action="{{route('update', $etudiant) }}" method="post">
    @csrf
<div class="g-3 align-items-center mb-4">
        <div class="col-auto">
            <label for="inputNom" class="col-form-label">{{ __('Nom') }}</label>
        </div>
        <div class="col-auto">
            <input type="text" name="name" value="{{$etudiant->nom}}" id="inputNom" class="form-control" aria-describedby="nomHelpInline">
        </div>
        <div class="col-auto">
            <span id="nomHelpInline" class="form-text">
            {{ __('Comme sur ça piéce d'identité.') }}
            </span>
        </div>
    </div>
    

    <div class="g-3 align-items-center mb-4">
        <div class="col-auto">
            <label for="inputEmail" class="col-form-label">{{ __('Courriel') }}</label>
        </div>
        <div class="col-auto">
            <input type="email" name="email" value="{{$etudiant->email}}" id="inputEmail" class="form-control" aria-describedby="emailHelpInline">
        </div>
        <div class="col-auto">
            <span id="emailHelpInline" class="form-text">
            {{ __('On partage pas ton courriel') }}
            </span>
        </div>
    </div>

    <div class="g-3 align-items-center mb-4">
        <div class="col-auto">
            <label for="inputPhone" class="col-form-label">{{ __('Téléphone') }}</label>
        </div>
        <div class="col-auto">
            <input type="tel" name="phone" value="{{$etudiant->phone}}" id="inputPhone" class="form-control" aria-describedby="phoneHelpInline">
        </div>
        <div class="col-auto">
            <span id="phoneHelpInline" class="form-text">
            {{ __('On partage pas ton numéro de téléphone') }}
            </span>
        </div>
    </div>


    <div class="g-3 align-items-center mb-4">
        <div class="col-auto">
            <label for="inputDob" class="col-form-label">{{ __('Date de naissance') }}</label>
        </div>
        <div class="col-auto">
            <input type="date" name="date_of_birth" value="{{$etudiant->date_de_naissance}}" id="inputDob" class="form-control" aria-describedby="dobHelpInline">
        </div>
        <div class="col-auto">
            <span id="dobHelpInline" class="form-text">
            {{ __('Date de naissance') }}
            </span>
        </div>
    </div>


    <div class="g-3 align-items-center mb-4">
        <div class="col-auto">
            <label for="inputAddress" class="col-form-label">{{ __('Adresse') }}</label>
        </div>
        <div class="col-auto">
            <input type="text" name="address" value="{{$etudiant->adresse}}" id="inputAddress" class="form-control" aria-describedby="addressHelpInline">
        </div>
        <div class="col-auto">
            <span id="addressHelpInline" class="form-text">
            {{ __('Adresse') }}
            </span>
        </div>
    </div>

    <div class="g-3 align-items-center mb-4">
        <div class="col-auto">
            <label for="exampleInputVille" class="col-form-label">{{ __('Ville') }}</label>
        </div>
        <div class="col-auto">
            <select name="town_id" class="form-control" id="exampleInputVille" aria-describedby="vhilleHelp">
                <option value="" disabled selected>{{ __('Choisissez') }}</option>
                @forelse($villes as $ville)
                <option value="{{$ville->id}}" {{$ville->id == $etudiant->ville_id ? 'selected' : ''}}>{{$ville->nom}}</option>
                @empty
                <option value="" disabled selected>{{ __('Aucune ville') }}</option>
                @endforelse
            </select>
        </div>
        <div class="col-auto">
            <span id="addressHelpInline" class="form-text">
            {{ __('Choisissez une ville') }}
            </span>
        </div>
    </div>

  <button type="submit" class="btn btn-primary">{{ __('Sauvegarder') }}</button>
</form>
@endsection('content')


