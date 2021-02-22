@extends('layouts.base')
@section('content')
<reports-table></reports-table>
@endsection
<!-- @foreach($reports as $report)
<form action="/report/download/{{$report->id}}" method="POST">
@csrf
    <input type="submit">
</form> 
@endforeach -->