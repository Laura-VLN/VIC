@extends('layouts.base')
@section('content')

    @foreach($reports as $report)
    <reports-table v-bind:report="{{  json_encode($report) }}"></reports-table>
    @endforeach

@endsection