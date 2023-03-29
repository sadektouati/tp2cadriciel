@extends('layout')
@section('title', __('Créer nouvel étudiant') )

@section('content')
<form class="mt-5 mb-5" action="{{route('insert') }}" method="post">
    @csrf
<div class="g-3 align-items-center mb-4">
    
        <div class="col-auto">
            <label for="inputNom" class="col-form-label">{{ __('Nom') }}</label>
        </div>
        <div class="col-auto">
            <input type="text" name="name" value="{{ old('name') }}" id="inputNom" class="form-control @error('titre_fr') is-invalid @enderror" aria-describedby="nomHelpInline">
        </div>

        <div class="col-auto">
            <span id="nomHelpInline" class="form-text">
            {{ __('Comme sur ça piéce d\'identité.') }}
            </span>
        </div>

        @error('name')
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror

    </div>
    

    <div class="g-3 align-items-center mb-4">
        <div class="col-auto">
            <label for="inputEmail" class="col-form-label">{{ __('Courriel') }}</label>
        </div>
        <div class="col-auto">
            <input type="email" name="email" value="{{ old('email') }}" id="inputEmail" class="form-control @error('titre_fr') is-invalid @enderror" aria-describedby="emailHelpInline">
        </div>

        <div class="col-auto">
            <span id="emailHelpInline" class="form-text">
            {{ __('On partage pas ton courriel') }}
            </span>
        </div>

        @error('email')
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror

    </div>

    <div class="g-3 align-items-center mb-4">
        <div class="col-auto">
            <label for="inputPhone" class="col-form-label">{{ __('Téléphone') }}</label>
        </div>
        <div class="col-auto">
            <input type="tel" name="phone" value="{{ old('phone') }}" id="inputPhone" class="form-control @error('titre_fr') is-invalid @enderror" aria-describedby="phoneHelpInline">
        </div>

        <div class="col-auto">
            <span id="phoneHelpInline" class="form-text">
            {{ __('On partage pas ton numéro de téléphone') }}
            </span>
        </div>

        @error('phone')
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror

    </div>


    <div class="g-3 align-items-center mb-4">
        <div class="col-auto">
            <label for="inputDob" class="col-form-label">{{ __('Date de naissance') }}</label>
        </div>
        <div class="col-auto">
            <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" id="inputDob" class="form-control @error('titre_fr') is-invalid @enderror" aria-describedby="dobHelpInline">
        </div>

        <div class="col-auto">
            <span id="dobHelpInline" class="form-text">
            {{ __('Date de naissance') }}
            </span>
        </div>

        @error('date_of_birth')
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror

    </div>


    <div class="g-3 align-items-center mb-4">
        <div class="col-auto">
            <label for="inputAddress" class="col-form-label">{{ __('Adresse') }}</label>
        </div>
        <div class="col-auto">
            <input type="text" name="address" value="{{ old('address') }}" id="inputAddress" class="form-control @error('titre_fr') is-invalid @enderror" aria-describedby="addressHelpInline">
        </div>

        <div class="col-auto">
            <span id="addressHelpInline" class="form-text">
            {{ __('Adresse') }}
            </span>
        </div>

        @error('address')
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror

    </div>

    <div class="g-3 align-items-center mb-4">
        <div class="col-auto">
            <label for="exampleInputVille" class="col-form-label">{{ __('Ville') }}</label>
        </div>
        <div class="col-auto">
            <select name="town_id" class="form-control @error('titre_fr') is-invalid @enderror" id="exampleInputVille" aria-describedby="vhilleHelp">
                <option value="" disabled selected>{{ __('Choisissez') }}</option>
                @forelse($villes as $ville)
                <option value="{{$ville->id}}" {{ $ville->id == old('town_id') ? 'selected' : '' }}>{{$ville->nom}}</option>
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

        @error('town_id')
            <span class="alert alert-danger">{{ $message }}</span>
        @enderror

    </div>

  <button type="submit" class="btn btn-primary">{{ __('Suavegarder') }}</button>

</form>
@endsection('content')
