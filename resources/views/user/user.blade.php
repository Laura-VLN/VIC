@extends('layouts.base')

@section('content')
    <title-sec theme="none">Mon Profile</title-sec>
    {{-- profile --}}
    <div class="row w-100 m-0">
        <profile-card v-bind:user="{{  json_encode($user) }}"></profile-card>
        <profile-document  csrf="{{ csrf_token() }}" :userid="{{$user->id}}" :canadd="true" v-bind:documents="{{  json_encode($documents) }}" cpas="{{$user->cpas_status}}"></profile-document>
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
            <agenda v-bind:agenda="{{ json_encode($agenda) }}"></agenda>
        </div>
    </div>
@endsection