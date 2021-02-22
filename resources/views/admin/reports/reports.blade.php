@foreach($reports as $report)
<form action="/report/download/{{$report->id}}" method="POST">
@csrf
    <input type="submit">
</form>
@endforeach