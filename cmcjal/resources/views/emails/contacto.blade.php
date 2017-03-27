@foreach($data as $index => $field)
{{ ucfirst($index) }} : {{ $field }} <br><br>
@endforeach
