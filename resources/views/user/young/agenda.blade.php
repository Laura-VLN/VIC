@extends('layouts.base')
@section('content')
<div class="container">
    <title-sec theme="formation">Créer un rendez-vous</title-sec>
    <agenda-create csrf="{{ csrf_token() }}" :youngid="{{ json_encode($user) }}"></agenda-create>
</div>
@endsection