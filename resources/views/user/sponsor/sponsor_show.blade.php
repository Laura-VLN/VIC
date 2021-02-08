@extends('layouts.base')
@section('content')
    @if ($hassponsor)
        <div class="container mt-5">
            <h3>Aucun parrain définit</h3>
            <p>Veuillez contacter un administrateur si vous pensez avoir un parrain</p>
        </div>  
    @else
        <title-sec theme="sponsor">Mes Parrains</title-sec>
        <div class="row w-100 ml-4">
            @foreach ($sponsors as $sponsor)
                <profile-card v-bind:user="{{ json_encode($sponsor) }}" path="/parrain/" theme="parrain"></profile-card>
            @endforeach
        </div>
    @endif
@endsection