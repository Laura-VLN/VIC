@extends('layouts.base')
@section('content')
    <title-sec theme="formation">Ma formation</title-sec>
    <formation-desc :formation="{{ json_encode($formation) }}"></formation-desc>
@endsection