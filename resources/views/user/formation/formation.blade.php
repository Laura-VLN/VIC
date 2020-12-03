@extends('layouts.base')
@section('content')
    <div class="row">
        <div class="col-12 col-xl-3 order-xl-2">
            <title-simple theme="formation">{{sizeof($formations)}} Objets trouvés</title-simple>
            <formation-filter csrf="{{ csrf_token() }}"></formation-filter>
        </div>
        <div class="col-12 col-xl-9 order-xl-1">
            <title-sec theme="formation">Mes formations</title-sec>
            <formation-card v-bind:formations="{{  json_encode($formations) }}" pagetheme="formations"></formation-card>
        </div>
    </div>
    <pagination-cards></pagination-cards>
@endsection