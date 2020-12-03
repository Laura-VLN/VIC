@extends('layouts.base')
@section('content')
<div class="row">
    <div class="col-12 col-xl-3 order-xl-2">
        <title-simple theme="logement">{{sizeof($logements)}} Objets trouvés</title-simple>
        <logement-filter csrf="{{ csrf_token() }}"></logement-filter>
    </div>
    <div class="col-12 col-xl-9 order-xl-1">
        <title-sec theme="logement">Mon logement</title-sec>
        <logement-card v-bind:logements="{{  json_encode($logements) }}" pagetheme="logement"></logement-card>
    </div>
    
</div>
<pagination-cards></pagination-cards>
@endsection