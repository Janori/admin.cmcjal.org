@extends('layouts.main')

@section('pageHeader')
	<header class="page-header">
		<h2>Calendario / Examen del evento</h2>

		<div class="right-wrapper pull-right">
			<ol class="breadcrumbs">
				<li>
					<a href="{{ route('admin.index') }}">
						<i class="fa fa-home"></i>
					</a>
				</li>
				<li><span>Calendario / Examen del Evento</span></li>
			</ol>

			<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
		</div>
	</header>
@endsection

@section('content')

	<div class="alert alert-info" role="alert">
		<div class="countdown">

			Tiempo restante:
			<span id="clock"></span>
		</div>
	</div>
	<section class="panel">
		<header class="panel-heading">
			<div class="panel-actions">
				<a href="#" class="fa fa-caret-down"></a>

			</div>

				<h2 class="panel-title"><i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;&nbsp; Examen del Evento</h2>

		</header>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12 center"><h2>{{ $title }}</h2></div>
			</div>

			{!! Form::open(['route' => 'exam.evaluate', 'method' => 'POST']) !!}
			{!! Form::hidden('event_id', $event_id) !!}
			<div class="exam-body">
				@foreach($questions as $question)
					<div class="row question">
						<div class="col-md-12 question-title"> {{ $number++ . '.- ' .  $question->title }}</div>
						@foreach(json_decode($question->options) as $value => $option)
							<div class="col-md-3">
								<div class="radio">
									<label class="question-option">
										<input type="radio" name="answer[{{ $number - 1 }}]" value="{{ $value }}">{{ $option }}
									</label>
								</div>
							</div>
						@endforeach
					</div>
				@endforeach
			</div>
			<div class="box-body pull-right">
					{!! Form::submit('Enviar resultados', ['class' => 'btn btn-primary', 'style' => 'margin-right: 15px;']) !!}
				</div>
			{!! Form::close() !!}
		</div>

	</section>
@endsection

@section('scripts')
<script type="text/javascript">
	$(document).ready(function()
	{
		var $clock	=	$('#clock').on('update.countdown', function(event) {
	  						var format = '%M:%S';

	  						$(this).html(event.strftime(format));
	  					})
						.on('finish.countdown', function(event) {
							$(this).parent()
							.addClass('disabled');

							bootbox.alert('El tiempo se terminó');
							$('form').submit();
						});
		var time = (1000 * 60) * 5; // 5 minutes;
		var selectedDate = new Date().valueOf() + time;
		$clock.countdown(selectedDate.toString());
	});
</script>
@endsection
