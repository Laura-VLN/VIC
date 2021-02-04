@extends('layouts.baseadmin')
@section('content')
    <h1>Utilisateurs</h1>
    <admin-user-list v-bind:users="{{  json_encode($users) }}" v-bind:coachs="{{  json_encode($coachs) }}" v-bind:sponsors="{{  json_encode($sponsors) }}" v-bind:coaches_users="{{  json_encode($coaches_users) }}" v-bind:sponsors_users="{{  json_encode($sponsors_users) }}">
        
    </admin-user-list>
    
    <pagination-cards></pagination-cards>
    
    
@endsection

