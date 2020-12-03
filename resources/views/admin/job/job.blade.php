@extends('layouts.baseadmin')
@section('content')
    <h1>Jobs</h1>
    
    <admin-job-list v-bind:jobs="{{  json_encode($jobs) }}">
        
    </admin-job-list>
    <pagination-cards></pagination-cards>
    

    
    
@endsection