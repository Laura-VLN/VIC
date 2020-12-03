@extends('layouts.baseadmin')
@section('content')
    <h1>Formations</h1>
    
    <admin-formation-list v-bind:formations="{{  json_encode($formations) }}">
        
    </admin-formation-list>
    <pagination-cards></pagination-cards>
    
    

    
    
@endsection