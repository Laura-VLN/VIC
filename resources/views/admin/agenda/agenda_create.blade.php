@extends('layouts.baseadmin')
@section('content')
<h1>Ajouter un Rendez-vous</h1>
<div class="formContainerAdmin">
    <form method="POST" action="/admin/agenda/create">
        @csrf
        {{--  Titre  --}}
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
        {{--  topic  --}}
        <div class="form-group row">
            <label for="topic" class="col-md-2 col-form-label text-md-right">{{ __('Type') }}</label>
            <div class="col-md-6">
                <select id="topic" type="text" class="form-control @error('topic') is-invalid @enderror" name="topic" required autocomplete="topic">
                    <option value="aucun" selected>Choisir un type de rendez-vous</option>
                    <option value="formation">Formation</option>
                    <option value="job">Job</option>
                    <option value="logement">Logement</option>
                </select>
                @error('topic')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        {{-- user_id --}}
        <user-input-agenda :users="{{ json_encode($users) }}" label="Utilisateur" id="topic" error="@error('topic') is-invalid @enderror"></user-input-agenda>
        {{--  Time  --}}
        <div class="form-group row">
            <label for="time" class="col-md-2 col-form-label text-md-right">{{ __('Date') }}</label>
            <div class="col-md-6">
                <input id="time" type="date" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time') }}" required autocomplete="title" autofocus>
                @error('time')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        {{--  Hour  --}}
        <div class="form-group row">
            <label for="hour" class="col-md-2 col-form-label text-md-right">{{ __('Heure') }}</label>
            <div class="col-md-6">
                <input id="hour" type="time" class="form-control @error('hour') is-invalid @enderror" name="hour" value="{{ old('hour') }}" required autocomplete="title" autofocus>
                @error('hour')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        {{--  Location  --}}
        <div class="form-group row">
            <label for="location" class="col-md-2 col-form-label text-md-right">{{ __('Lieu') }}</label>
            <div class="col-md-6">
                <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required autocomplete="title" autofocus>
                @error('location')
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
                    <span class="text-success">Le rendez-vous à bien été enregistrée !</span>
                @endif
            </div>
        </div>
    </form>
</div>
@endsection