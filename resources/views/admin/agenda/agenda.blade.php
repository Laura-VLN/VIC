@extends('layouts.baseadmin')
@section('content')
<h1>Agendas</h1>
    
<admin-agenda-list v-bind:agendas="{{  json_encode($agendas) }}">
    
</admin-agenda-list>
<pagination-cards></pagination-cards>
@endsection