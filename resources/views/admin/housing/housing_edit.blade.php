@extends('layouts.baseadmin')
@section('content')
    <h1>Modifier un logement</h1>
    <div class="formContainerAdmin">
        <form method="POST" action="/admin/logement/edit/{{$logement->id}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $logement->id }}">
            {{--  Location  --}}
            <user-input-text required="true" id="location" type="text" label="Adresse" value="{{ $logement->location }}" error="@error('location') is-invalid @enderror">
                @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            {{--  Area  --}}
            <user-input-text required="false" id="area" type="number" label="Surface" value="{{ $logement->area }}" error="@error('area') is-invalid @enderror">
                @error('area')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            {{--  type  --}}
            <user-input-dropdown value="{{ $logement->type }}" required="true" id="type" label="Type de logement" error="@error('type') is-invalid @enderror">
                <option value="aucun" @if($logement->type == "aucun")selected @endif>Choisir un type de logement</option>
                <option value="appart" @if($logement->type == "appart")selected @endif>Appartement</option> 
                <option value="maison" @if($logement->type == "maison")selected @endif>Maison</option>
                @error('type')
                    <span class="invalid-feedback" role="alert" v-slot:error>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </user-input-dropdown>
            {{--  Proximity  --}}
            <user-input-dropdown value="{{ $logement->proximity }}" required="true" id="proximity" label="Ville à proximité" error="@error('proximity') is-invalid @enderror">
                <option value="aucun" @if($logement->proximity == "aucun")selected @endif>Choisir un ville à proximité</option>
                <option value="brx" @if($logement->proximity == "brx")selected @endif>Bruxelles</option> 
                <option value="nmr" @if($logement->proximity == "nmr")selected @endif>Namur</option>
                <option value="lge" @if($logement->proximity == "lge")selected @endif>Liège</option>
                <option value="crl" @if($logement->proximity == "crl")selected @endif>Charleroi</option>
                @error('type')
                    <span class="invalid-feedback" role="alert" v-slot:error>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </user-input-dropdown>
            {{--  Price  --}}
            <user-input-text required="true" id="price" type="number" label="Prix" value="{{ $logement->price }}" error="@error('price') is-invalid @enderror">
                @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            {{--  Availability  --}}
            <user-input-text required="false" id="availability" type="date" label="Disponibilité" value="{{ $logement->availability }}" error="@error('availability') is-invalid @enderror">
                @error('availability')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            {{--  email  --}}
            <user-input-text required="true" id="email" type="email" label="Email" value="{{ $logement->email }}" error="@error('email') is-invalid @enderror">
                @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            {{--  Phone  --}}
            <user-input-text required="false" id="phone" type="text" label="Téléphone" value="{{ $logement->phone }}" error="@error('phone') is-invalid @enderror">
                @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            {{--  Description  --}}
            <user-input-textarea required="true" id="description" label="Description" value="{{ $logement->description }} "error="@error('description') is-invalid @enderror" >
                @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-textarea>
            {{--  Images  --}}
            <user-input-images id="{{$logement->id}}" csrf="{{ csrf_token() }}" houseId="{{$logement->id}}" label="Photos du logement" v-bind:images="{{  json_encode($images) }}" asset="{{ asset("") }}">

            </user-input-images>
            
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Enregistrer') }}
                    </button>
                    @if($updated == true)
                        <span class="text-success">Les modifications ont bien été enregistrées !</span>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection