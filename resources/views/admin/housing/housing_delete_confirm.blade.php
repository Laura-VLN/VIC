@extends('layouts.baseadmin')
@section('content')
    <h1>Vous allez Supprimer le logement {{$housing->location}}.</h1>
    <h3>Voulez-vous continuer ?</h3>
    <div class="confirmDelete">
        <form action="/admin/logement/delete/{{$housing->id}}" method="post">
            @csrf
            <input class="btn btn-primary" type="submit" value="oui">
        </form>
        <a class="btn btn-primary" href="/admin/logement/list/1">non</a>
    </div>
@endsection