@extends('layouts.base')
@section('content')
<div class="container">
    <title-sec theme="formation">Créer un rendez-vous</title-sec>
    <agenda-create csrf="{{ csrf_token() }}" :youngid="{{ $user->id }}"></agenda-create>
</div>
@endsection