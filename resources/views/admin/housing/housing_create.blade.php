@extends('layouts.baseadmin')
@section('content')
    <h1>Ajouter un logement</h1>
    <div class="formContainerAdmin">
        <form method="POST" action="/admin/logement/create">
            @csrf
            {{--  Location  --}}
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
            {{--  Area  --}}
            <div class="form-group row">
                <label for="area" class="col-md-2 col-form-label text-md-right">{{ __('Surface') }}</label>
                <div class="col-md-6">
                    <input id="area" type="number" class="form-control @error('area') is-invalid @enderror" name="area" value="{{ old('area') }}" autocomplete="area" autofocus>
                    @error('area')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{--  Type  --}}
            <div class="form-group row">
                <label for="type" class="col-md-2 col-form-label text-md-right">{{ __('Type de logement') }}</label>
                <div class="col-md-6">
                    <select id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" autocomplete="type">
                        <option value="aucun" selected>Choisir un type de logement</option>
                        <option value="appart">Appartement</option>
                        <option value="maison">Maison</option>
                    </select>
                    @error('type')
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
            {{--  Price  --}}
            <div class="form-group row">
                <label for="price" class="col-md-2 col-form-label text-md-right">{{ __('Prix') }}</label>
                <div class="col-md-6">
                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{--  Date  --}}
            <div class="form-group row">
                <label for="availability" class="col-md-2 col-form-label text-md-right">{{ __('Disponibilité') }}</label>
                <div class="col-md-6">
                    <input id="availability" type="date" class="form-control @error('availability') is-invalid @enderror" name="availability" autocomplete="availability">
                    @error('availability')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{--  Email  --}}
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
            {{--  Phone  --}}
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
            {{--  Description  --}}
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
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Enregistrer') }}
                    </button>
                    @if($updated == true)
                        <span class="text-success">Le logement à bien été enregistrée !</span>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection