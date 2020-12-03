@extends('layouts.baseadmin')
@section('content')
    <h1>Editer une formation</h1>
    <div class="formContainerAdmin ">
        <form method="POST" action="/admin/formation/edit/{{$formation->id}}">
            @csrf
            {{--  Title  --}}
            <user-input-text required="true" id="title" type="text" label="Titre" value="{{ $formation->title }}" error="@error('title') is-invalid @enderror">
                @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            {{--  Description  --}}
            <user-input-textarea required="true" id="description" label="Description" value="{{ $formation->description }} "error="@error('description') is-invalid @enderror" >
                @error('desciption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-textarea>
            {{--  Email  --}}
            <user-input-text required="true" id="email" type="email" label="Email" value="{{ $formation->email }}" error="@error('email') is-invalid @enderror">
                @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            {{--  Location  --}}
            <user-input-text required="false" id="location" type="text" label="Adresse" value="{{ $formation->location }}" error="@error('location') is-invalid @enderror">
                @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            {{--  Date  --}}
            <user-input-text required="false" id="time" type="date" label="Date" value="{{ $formation->time }}" error="@error('time') is-invalid @enderror">
                @error('time')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            {{--  Proximity  --}}
            <user-input-dropdown value="{{ $formation->proximity }}" required="true" id="proximity" label="Ville à proximité" error="@error('proximity') is-invalid @enderror">
                <option value="aucun" @if($formation->proximity == "aucun")selected @endif>Choisir un ville à proximité</option>
                <option value="brx" @if($formation->proximity == "brx")selected @endif>Bruxelles</option> 
                <option value="nmr" @if($formation->proximity == "nmr")selected @endif>Namur</option>
                <option value="lge" @if($formation->proximity == "lge")selected @endif>Liège</option>
                <option value="crl" @if($formation->proximity == "crl")selected @endif>Charleroi</option>
                @error('type')
                    <span class="invalid-feedback" role="alert" v-slot:error>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </user-input-dropdown>
            {{--  Phone  --}}
            <user-input-text required="false" id="phone" type="text" label="Téléphone" value="{{ $formation->phone }}" error="@error('phone') is-invalid @enderror">
                @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Enregistrer les modifications') }}
                    </button>
                    @if($updated == true)
                        <span class="text-success">Les modifications ont bien été enregistrée !</span>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection