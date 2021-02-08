@extends('layouts.base')
@section('content')
    @if (!$hascoaches)
        <div class="container mt-5">
            <h3>Aucun Coach définit</h3>
            <p>Veuillez contacter un administrateur si vous pensez avoir un coach</p>
        </div>  
    @else
        <title-sec theme="coach">Mon Parrain</title-sec>
        <div class="row w-100 m-0">
            <profile-card v-bind:user="{{  json_encode($coachs) }}"></profile-card>
            <profile-document csrf="{{csrf_token()}}" v-bind:documents="{{  json_encode($documents) }}" cpas="{{$coachs->cpas_status}}"></profile-document>
        </div>
        <hr class="profile-hr">

        <div class="row d-flex">
            {{-- recement --}}
            <div class="col-12 col-md-6 d-flex flex-column text-center pt-3">
                <h4 class="ml-5 mr-auto px-1 title-profile pb-1 mb-3">Récemment</h4>
            </div>
            {{-- Agenda --}}
            <div class="col-12 col-md-6 d-flex flex-column pt-3 profile-vr pr-0">
                <h4 class="ml-5 mr-auto px-1 title-profile pb-1 mb-3">Agenda</h4>
                {{-- VUE Component --}}
                <!-- <agenda v-bind:agenda="{{ json_encode($agenda) }}"></agenda> -->
            </div>
        </div>
    @endif
@endsection