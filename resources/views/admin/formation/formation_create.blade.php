@extends('layouts.baseadmin')
@section('content')
    <h1>Ajouter une formation</h1>
    <div class="formContainerAdmin">
        <form method="POST" action="/admin/formation/create">
            @csrf
            <div class="form-group row">
                <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Titre') }}</label>
                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-md-2 col-form-label text-md-right">{{ __('Description') }}</label>
                <div class="col-md-6">
                    <textarea rows="10" cols="200" id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus></textarea>
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('Email') }}</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="location" class="col-md-2 col-form-label text-md-right">{{ __('Adresse') }}</label>
                <div class="col-md-6">
                    <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" autocomplete="location">
                    @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="time" class="col-md-2 col-form-label text-md-right">{{ __('Date') }}</label>
                <div class="col-md-6">
                    <input id="time" type="date" class="form-control @error('time') is-invalid @enderror" name="time" autocomplete="time">
                    @error('time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{-- Proximity --}}
            <div class="form-group row">
                <label for="proximity" class="col-md-2 col-form-label text-md-right">{{ __('Ville à proximité') }}</label>
                <div class="col-md-6">
                    <select id="proximity" type="text" class="form-control @error('proximity') is-invalid @enderror" name="proximity" autocomplete="proximity">
                        <option value="aucun" selected>Choisir une ville à proximité</option>
                        <option value="brx">Bruxelles</option>
                        <option value="nmr">Namur</option>
                        <option value="lge">Liège</option>
                        <option value="crl">Charleroi</option>
                    </select>
                    @error('proximity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="col-md-2 col-form-label text-md-right">{{ __('Téléphone') }}</label>
                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" autocomplete="phone">
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Enregistrer') }}
                    </button>
                    @if($updated == true)
                        <span class="text-success">La formation à bien été enregistrée !</span>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection