@extends('layouts.base')
@section('content')
    <title-sec theme="logement">Galerie</title-sec>
    <logement-gallery v-bind:pictures="{{  json_encode($gallery) }}"></logement-gallery>
    <div class="row">
        <div class="col-12 col-xl-9">
            <title-sec theme="logement">Description</title-sec>
            <logement-desc :logement="{{  json_encode($logement) }}"></logement-desc>
        </div>
        <div class="col-12 col-xl-3">
            <title-simple theme="logement">Coordonnées</title-simple>
            <logement-coord :logement="{{  json_encode($logement) }}"></logement-coord>
        </div>
    </div>
@endsection