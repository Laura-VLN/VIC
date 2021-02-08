@extends('layouts.base')
@section('content')
    @if ($hascoaches == null)
        <div class="container mt-5">
            <h3>Aucun Coach définit</h3>
            <p>Veuillez contacter un administrateur si vous pensez avoir un coach</p>
        </div>  
    @else
        <title-sec theme="coach">Mes Coachs</title-sec>
        <div class="row w-100 m-0">
            @foreach ($coachs as $coach)
            <a href="/coach/{{ $coach->id }}">
            <profile-card v-bind:user="{{  json_encode($coach) }}"></profile-card>
            </a>
        @endforeach
        </div>
    @endif
@endsection