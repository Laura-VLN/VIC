@extends('layouts.base')
@section('content')
    <title-sec theme="job">Postuler au job</title-sec>
    <job-desc v-bind:job="{{  json_encode($job) }}"></job-desc>
    <div class="row">
        <div class="col-12 col-md-9">
            <title-sec theme="job">Formulaire</title-sec>
            <!-- <job-post></job-post> -->
        </div>
        <div class="col-12 col-md-3">
            <title-simple theme="job">Coordonées</title-simple>
            <job-coord v-bind:job="{{  json_encode($job) }}"></job-coord>
        </div>
    </div>
    

@endsection