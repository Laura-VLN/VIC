@extends('layouts.base')
@section('content')
    @if($haveYoung)
        <title-sec theme="formation">Mes Jeunes</title-sec>
        <div class="row w-100 ml-md-4">
            @foreach ($youngs as $young)
                <profile-card v-bind:user="{{  json_encode($young) }}" v-bind:uid="{{ $young->user_id }}"  v-bind:path="/young/" theme="young"></profile-card>
            @endforeach
        </div>
    @else
        <h3 style="margin-left:50px;margin-top:30px;">Aucun jeune assigné</h3>
        <small style="margin-left:50px;">Si vous pensez avoir un jeune assigné, contactez l'administration</small>
    @endif
@endsection