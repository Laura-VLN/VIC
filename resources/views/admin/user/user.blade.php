@extends('layouts.baseadmin')
@section('content')
    <h1>Utilisateurs</h1>
    <admin-user-list v-bind:users="{{  json_encode($users) }}">
        
    </admin-user-list>
    
    <pagination-cards></pagination-cards>
    
    
@endsection

