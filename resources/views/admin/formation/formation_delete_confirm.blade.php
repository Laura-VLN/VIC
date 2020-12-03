@extends('layouts.baseadmin')
@section('content')
    <h1>Vous allez Supprimer la formation {{$formation->title}}.</h1>
    <h3>Voulez-vous continuer ?</h3>
    <div class="confirmDelete">
        <form action="/admin/formation/delete/{{$formation->id}}" method="post">
            @csrf
            <input class="btn btn-primary" type="submit" value="oui">
        </form>
        <a class="btn btn-primary" href="/admin/formation/list/1">non</a>
    </div>
@endsection