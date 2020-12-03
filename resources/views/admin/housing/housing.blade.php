@extends('layouts.baseadmin')
@section('content')

    <h1>Logements</h1>
    <admin-housing-list v-bind:logements="{{  json_encode($logements) }}">
        
    </admin-housing-list>
    <pagination-cards></pagination-cards>
@endsection