<!-- compact('user','coachs','sponsors','coaches_user','sponsors_user') -->
@extends('layouts.baseadmin')
@section('content')
    <h1>Editer un utilisateur</h1>
    <div class="formContainerAdmin ">
        <form method="POST" action="/admin/user/edit/{{$user->id}}">
            @csrf
            {{--  Prénom  --}}
            <user-input-text required="true" id="first_name" type="text" label="Prénom" value="{{ $user->first_name }}" error="@error('first_name') is-invalid @enderror">
                @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            {{--  Nom  --}}
            <user-input-text required="true" id="last_name" type="text" label="Nom" value="{{ $user->last_name }}" error="@error('last_name') is-invalid @enderror">
                @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            {{--  Email  --}}
            <user-input-text required="true" id="email" type="email" label="Email" value="{{ $user->email }}" error="@error('email') is-invalid @enderror">
                @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            {{--  role  --}}
            <user-input-dropdown value="{{ $user->role }}" required="true" id="role" label="Grade" error="@error('role') is-invalid @enderror">
                <option value="0" @if($user->role == 0)selected @endif>Jeune</option> 
                <option value="1" @if($user->role == 1)selected @endif>Coach</option>
                <option value="2" @if($user->role == 2)selected @endif>Parrain</option>
                <option value="3" @if($user->role == 3)selected @endif>Admin</option>
                @error('role')
                    <span class="invalid-feedback" role="alert" v-slot:error>
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </user-input-dropdown>
            {{--  adresse  --}}
            <user-input-text required="false" id="location" type="text" label="Adresse" value="{{ $user->location }}" error="@error('location') is-invalid @enderror">
                @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            {{--  birth date  --}}
            <user-input-text required="false" id="birth_date" type="date" label="Date de naissance" value="{{ $user->birth_date }}" error="@error('birth_date') is-invalid @enderror">
                @error('birth_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            {{--  phone_number  --}}
            <user-input-text required="false" id="phone_number" type="text" label="Numéro de téléphone" value="{{ $user->phone_number }}" error="@error('phone_number') is-invalid @enderror">
                @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>
            {{--  description  --}}
            <user-input-text required="false" id="description" type="text" label="Description" value="{{ $user->description }}" error="@error('description') is-invalid @enderror">
                @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
            </user-input-text>

            {{--  coach  --}}
                <user-input-slimselect label="Coach" id="coaches" name="coaches[]" error="@error('coaches') is-invalid @enderror">
                    @foreach ($coachs as $coach)
                        <option value={{ $coach->id}} @if(array_search($coach->id, $coaches_user) !== false)selected @endif >{{$coach->first_name}} {{$coach->last_name}}</option>
                    @endforeach
                    @error('coaches')
                        <span class="invalid-feedback" role="alert" v-slot:error>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </user-input-slimselect> 
            
            {{--  sponsor  --}}
            <user-input-slimselect label="Parrain" id="sponsors" name="sponsors[]" error="@error('sponsors') is-invalid @enderror">
                    @foreach ($sponsors as $sponsor)
                        <option value={{ $sponsor->id}} @if(array_search($sponsor->id, $sponsors_user) !== false)selected @endif >{{$sponsor->first_name}} {{$sponsor->last_name}}</option>
                    @endforeach
                    @error('sponsors')
                        <span class="invalid-feedback" role="alert" v-slot:error>
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </user-input-slimselect>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Enregistrer les modifications') }}
                    </button>
                    @if($updated == true)
                        <span class="text-success">Les modifications ont bien été enregistrées !</span>
                    @endif
                </div>
            </div>
        </form>
    </div>
@endsection