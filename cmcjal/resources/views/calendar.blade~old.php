@extends('layouts.app')

@section('content')
<div class="container">
	<div class="calendario-info">
	    <span class="label label-default">Caducada</span>
		<span class="label label-success">Vigente</span>
		<span class="label label-warning">Pendiente</span>
		<span class="label label-danger">Cancelada</span>
		<span class="label label-primary">Reagendar</span>
	</div>
    {!! $calendar->calendar() !!}

 </div>
@endsection
@section('scripts')
    <script src="/assets/javascripts/moment.min.js"></script>
    <script src="/assets/javascripts/fullcalendar.min.js"></script>
    <script src="/assets/javascripts/lang-all.js"></script>
    <link rel="stylesheet" href="/assets/stylesheets/fullcalendar.min.css"/>
    {!! $calendar->script() !!}
@endsection