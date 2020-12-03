@extends('layouts.base')
@section('content')
    <div class="container mt-5">
        <h3>Ajouter un document</h3>
        <form action="/profile/upload/{{$id}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" id="title" placeholder="Titre" required>
            <input type="file" name="file" id="file" class="my-4" required><br>
            <input type="submit" value="Uploader le document">
        </form>
    </div>
@endsection