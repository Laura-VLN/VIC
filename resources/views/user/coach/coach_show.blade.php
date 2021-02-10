@extends('layouts.base')
@section('content')
    @if ($hascoaches == null)
        <div class="container mt-5">
            <h3>Aucun Coach définit</h3>
            <p>Veuillez contacter un administrateur si vous pensez avoir un coach</p>
        </div>  
    @else
        <title-sec theme="coach">Mes Coachs</title-sec>
        <div class="row w-100 ml-4">
            @foreach ($coachs as $coach)
                <profile-card v-bind:uid="{{ $coach->coach_id }}" v-bind:user="{{  json_encode($coach) }}" path="/coach/" theme="coach"></profile-card>
            @endforeach
        </div>
    @endif
@endsection