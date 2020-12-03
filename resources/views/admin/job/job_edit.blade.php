@extends('layouts.baseadmin')
@section('content')
    <h1>Modifier un job</h1>
    <div class="formContainerAdmin">
        <form method="POST" action="/admin/job/edit/{{$job->id}}">
            @csrf
            {{--  Title  --}}
            <user-input-text required="true" id="title" type="text" label="Titre" value="{{ $job->title }}" error="@error('title') is-invalid @enderror">
                @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            {{--  Email  --}}
            <user-input-text required="true" id="email" type="email" label="Email" value="{{ $job->email }}" error="@error('email') is-invalid @enderror">
                @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            {{--  Location  --}}
            <user-input-text required="false" id="location" type="text" label="Adresse" value="{{ $job->location }}" error="@error('location') is-invalid @enderror">
                @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            {{--  Company  --}}
            <user-input-text required="false" id="company" type="text" label="Nom de l'entreprise" value="{{ $job->company }}" error="@error('company') is-invalid @enderror">
                @error('company')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            {{--  People contact  --}}
            <user-input-text required="false" id="contact_people" type="text" label="Personne de contact" value="{{ $job->contact_people }}" error="@error('contact_people') is-invalid @enderror">
                @error('contact_people')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            {{--  Deadline  --}}
            <user-input-text required="false" id="deadline" type="date" label="Date limite" value="{{ $job->deadline }}" error="@error('deadline') is-invalid @enderror">
                @error('deadline')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            {{--  Type  --}}
            <user-input-dropdown value="{{ $job->type }}" required="false" id="type" label="Type" error="@error('type') is-invalid @enderror">
                <option value="cdi" @if($job->type == "cdi")selected @endif>CDI</option> 
                <option value="cdd" @if($job->type == "cdd")selected @endif>CDD</option>
                <option value="interim" @if($job->type == "interim")selected @endif>Interim</option>
                <option value="stage" @if($job->type == "stage")selected @endif>Stage</option>
                @error('type')
                    <span class="invalid-feedback" role="alert" v-slot:error>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </user-input-dropdown>
            {{--  Proximity  --}}
            <user-input-dropdown value="{{ $job->proximity }}" required="true" id="proximity" label="Ville à proximité" error="@error('proximity') is-invalid @enderror">
                <option value="aucun" @if($job->proximity == "aucun")selected @endif>Choisir un ville à proximité</option>
                <option value="brx" @if($job->proximity == "brx")selected @endif>Bruxelles</option> 
                <option value="nmr" @if($job->proximity == "nmr")selected @endif>Namur</option>
                <option value="lge" @if($job->proximity == "lge")selected @endif>Liège</option>
                <option value="crl" @if($job->proximity == "crl")selected @endif>Charleroi</option>
                @error('type')
                    <span class="invalid-feedback" role="alert" v-slot:error>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </user-input-dropdown>
            {{--  Description  --}}
            <user-input-textarea required="true" id="description" label="Description" value="{{ $job->description }} "error="@error('description') is-invalid @enderror" >
                @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-textarea>
            {{--  Skills needed  --}}
            <user-input-textarea required="false" id="skills_needed" label="Compétences requises" value="{{ $job->skills_needed }} "error="@error('skills_needed') is-invalid @enderror" >
                @error('skills_needed')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-textarea>
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