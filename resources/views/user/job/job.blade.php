@extends('layouts.base')
@section('content')
    <div class="row">
        <div class="col-12 col-xl-3 order-xl-2">
            <title-simple theme="job">{{sizeof($jobs)}} Objets trouvés</title-simple>
            <job-filter csrf="{{ csrf_token() }}"></job-filter>
        </div>
        <div class="col-12 col-xl-9 order-xl-1">
            <title-sec theme="job">Mon job</title-sec>
            <job-card v-bind:jobs="{{  json_encode($jobs) }}" pagetheme="job"></job-card>
        </div>
    </div>
    
    <pagination-cards></pagination-cards>
@endsection