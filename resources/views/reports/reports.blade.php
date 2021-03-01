@extends('layouts.base')
@section('content')
<div class="container">
    <title-sec theme="formation">Créer un rapport</title-sec>
    <report-create csrf="{{ csrf_token() }}" :youngid="{{ $user->id }}"></report-create>
</div>
@endsection
