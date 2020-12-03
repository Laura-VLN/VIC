@extends('layouts.baseadmin')
@section('content')
    <h1>Vous allez Supprimer le job {{$job->title}}.</h1>
    <h3>Voulez-vous continuer ?</h3>
    <div class="confirmDelete">
        <form action="/admin/job/delete/{{$job->id}}" method="post">
            @csrf
            <input class="btn btn-primary" type="submit" value="oui">
        </form>
        <a class="btn btn-primary" href="/admin/job/list/1">non</a>
    </div>
@endsection