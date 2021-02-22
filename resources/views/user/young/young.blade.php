@extends('layouts.base')
@section('content')
        <title-sec theme="formation">Mon Jeune</title-sec>
        <div class="row w-100 m-0">
            <profile-card v-bind:young="{{  json_encode($young) }}"></profile-card>
            <profile-document csrf="{{csrf_token()}}" v-bind:documents="{{  json_encode($document) }}" cpas="{{$young->cpas_status}}"></profile-document>
        </div>
        <div class="row d-flex">
            {{-- recement --}}
            <div class="col-12 col-md-6 d-flex flex-column text-center pt-3">
                <h4 class="ml-5 mr-auto px-1 title-profile pb-1 mb-3">Créer un compte rendu</h4>
                <form class="text-left mx-5 my-4" method="POST" action="{{route('upload.uploadReport')}}" enctype="multipart/form-data">
                    @csrf
                    <input class="my-2" type="text" name="title" id="" placeholder="intitulé"><br>
                    <input type="file" name="report"><br>
                    <input type="submit" value="Envoyer">
                </form>
            </div>
            {{-- Agenda --}}
            <div class="col-12 col-md-6 d-flex flex-column pt-3 profile-vr pr-0">
                <h4 class="ml-5 mr-auto px-1 title-profile pb-1 mb-3">Agenda <a href="/young/create_agenda/{{$young->id}}" class="text-dark"><i class="fas fa-plus"></i></a></h4>
                {{-- VUE Component --}}
                <agenda v-bind:agenda="{{ json_encode($agenda) }}"></agenda>
            </div>
        </div>
@endsection