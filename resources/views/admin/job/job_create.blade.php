@extends('layouts.baseadmin')
@section('content')
    <h1>Ajouter un job</h1>
    <div class="formContainerAdmin">
        <form method="POST" action="/admin/job/create">
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
                <label for="company" class="col-md-2 col-form-label text-md-right">{{ __("Nom de l'entreprise") }}</label>
                <div class="col-md-6">
                    <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" autocomplete="company">
                    @error('company')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="contact_people" class="col-md-2 col-form-label text-md-right">{{ __('Personne de contact') }}</label>
                <div class="col-md-6">
                    <input id="contact_people" type="text" class="form-control @error('contact_people') is-invalid @enderror" name="contact_people" autocomplete="contact_people">
                    @error('contact_people')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="deadline" class="col-md-2 col-form-label text-md-right">{{ __('DeadLine') }}</label>
                <div class="col-md-6">
                    <input id="deadline" type="date" class="form-control @error('deadline') is-invalid @enderror" name="deadline" autocomplete="deadline">
                    @error('deadline')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="type" class="col-md-2 col-form-label text-md-right">{{ __('Type') }}</label>
                <div class="col-md-6">
                    <select id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" autocomplete="type">
                        <option value="cdi" selected>CDI</option>
                        <option value="cdd">CDD</option>
                        <option value="interim">Interim</option>
                        <option value="stage">Stage</option>
                    </select>
                    @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
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
                <label for="skills_needed" class="col-md-2 col-form-label text-md-right">{{ __('Compétences requises') }}</label>
                <div class="col-md-6">
                    <textarea rows="10" cols="200" id="skills_needed" type="text" class="form-control @error('skills_needed') is-invalid @enderror" name="skills_needed" value="{{ old('skills_needed') }}" autocomplete="skills_needed"></textarea>
                    @error('skills_needed')
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
                        <span class="text-success">Le job à bien été enregistrée !</span>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection