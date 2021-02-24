@extends('layouts.base')
@section('content')
    @if ($hassponsor)
        <title-sec theme="sponsor">Mes Parrains</title-sec>
        <div class="row w-100 ml-md-4">
            @foreach ($sponsors as $sponsor)
                <profile-card v-bind:uid="{{ $sponsor->sponsor_id }}" v-bind:user="{{ json_encode($sponsor) }}" path="/parrain/" theme="parrain"></profile-card>
            @endforeach
        </div>
    @else
        <div class="container mt-5">
            <h3>Aucun parrain définit</h3>
            <p>Veuillez contacter un administrateur si vous pensez avoir un parrain</p>
        </div>         
    @endif
@endsection