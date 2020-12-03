@extends('layouts.base')
@section('content')
    @if($haveYoung)
        <title-sec theme="formation">Mon Jeune</title-sec>
        <div class="row w-100 m-0">
            <profile-card v-bind:user="{{  json_encode($user) }}"></profile-card>
            <profile-document v-bind:documents="{{  json_encode($document) }}" cpas="{{$user->cpas_status}}"></profile-document>
        </div>
        <div class="row d-flex">
            {{-- recement --}}
            <div class="col-12 col-md-6 d-flex flex-column text-center pt-3">
                <h4 class="ml-5 mr-auto px-1 title-profile pb-1 mb-3">Créer un compte rendu</h4>
                <form class="text-left mx-5 my-4" action="">
                    @csrf
                    <input class="my-2" type="text" name="" id="" placeholder="intitulé"><br>
                    <textarea class="my-2" name="" id="" cols="60" rows="10" placeholder="contenu"></textarea><br>
                    <input type="submit" value="Envoyer">
                </form>
            </div>
            {{-- Agenda --}}
            <div class="col-12 col-md-6 d-flex flex-column pt-3 profile-vr pr-0">
                <h4 class="ml-5 mr-auto px-1 title-profile pb-1 mb-3">Agenda <a href="/young/create_agenda/{{$user->id}}" class="text-dark"><i class="fas fa-plus"></i></a></h4>
                {{-- VUE Component --}}
                <agenda v-bind:agenda="{{ json_encode($agenda) }}"></agenda>
            </div>
        </div>
    @else
        <h3 style="margin-left:50px;margin-top:30px;">Aucun jeune assigné</h3>
        <small style="margin-left:50px;">Si vous pensez avoir un jeune assigné, contactez l'administration</small>
    @endif
@endsection