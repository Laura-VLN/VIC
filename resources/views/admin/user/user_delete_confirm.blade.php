@extends('layouts.baseadmin')
@section('content')
    <h1>Vous allez Supprimer {{$user->first_name}} {{$user->last_name}}.</h1>
    <h3>Voulez-vous continuer ?</h3>
    <div class="confirmDelete">
        <form action="/admin/user/delete/{{$user->id}}" method="post">
            @csrf
            <input class="btn btn-primary" type="submit" value="oui">
        </form>
        <a class="btn btn-primary" href="/admin/user/list/1">non</a>
    </div>
@endsection