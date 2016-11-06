<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\EventCalendar;

class CalendarController extends Controller
{
	public function getEvents()
	{
		$data 	= array(); //declaramos un array principal que va contener los datos
		$id 	= EventCalendar::all()->lists('id'); //listamos todos los id de los eventos
		$title 	= EventCalendar::all()->lists('title'); //lo mismo para lugar y fecha
		$start 	= EventCalendar::all()->lists('start');
		$end 	= EventCalendar::all()->lists('end');
		$allDay = EventCalendar::all()->lists('all_day');
		$color 	= EventCalendar::all()->lists('color');
		$count 	= count($id); //contamos los ids obtenidos para saber el numero exacto de eventos
 
		//hacemos un ciclo para anidar los valores obtenidos a nuestro array principal $data
		for($i = 0; $i < $count; $i++)
		{
			$data[$i] = array(
				"title"	=> $title[$i], //obligatoriamente "title", "start" y "url" son campos requeridos
				"start"	=> $start[$i], //por el plugin asi que asignamos a cada uno el valor correspondiente
				"end"	=> $end[$i],
				"all_day" => $allDay[$i],
				"color"	=> $color[$i],
				"id" => $id[$i],
				"url"=> 'events/' . $id[$i]
				//en el campo "url" concatenamos el el URL con el id del evento para luego
				//en el evento onclick de JS hacer referencia a este y usar el método show
				//para mostrar los datos completos de un evento
			);

			if($allDay[$i])
			{
				$dt = new \DateTime($data[$i]['start']);
				$dt->setTimeZone(new \DateTimeZone('UTC'));

				$data[$i]['start'] = $dt->format('Y-m-d');
			}
			else
			{
				$dt = new \DateTime($data[$i]['start']);
				$dt->setTimeZone(new \DateTimeZone('UTC'));

				$data[$i]['start'] = $dt->format('Y-m-d\TH-i-s');;
			}
		}

		json_encode($data); //convertimos el array principal $data a un objeto Json 
		return $data; //para luego retornarlo y estar listo para consumirlo
	}

	public function show($id)
	{
		$evento = EventCalendar::find($id);
		return view('calendar.details', ['event' => $evento]);
	}

	public function edit($id, Request $request)
	{
		$evento = EventCalendar::find($id);
		$evento->fill($request->all());
		$evento->save();

		return redirect('events');
	}

	public function create(Request $request){

		//Valores recibidos via ajax
		$title 	= $request->input('title');
		$start 	= $request->input('start');
		$end 	= $request->input('end');
		$color 	= $request->input('color');
		$allDay = $request->input('allDay') == "true"; 

		//Insertando evento a base de datos
		$evento = new EventCalendar();
		
		$evento->title 	= $title;
		$evento->start 	= $start;
		$evento->end 	= $end;
		$evento->all_day = $allDay;
		$evento->color = $color;

		$evento->save();
	}

	public function update(Request $request){

		//Valores recibidos via ajax
   		$id 	= $request->input('id');
		$title 	= $request->input('title');
		$start 	= $request->input('start');
		$end 	= $request->input('end');
		$color 	= $request->input('color');
		$allDay = $request->input('allDay') == "true"; 

		$evento = EventCalendar::find($id);

		$evento->title 	= $title;
		$evento->start 	= $start;
		$evento->end 	= $end;
		$evento->all_day = $allDay;
		$evento->color = $color;

		$evento->save();
	}	

	public function delete($id){
		//Valor id recibidos via ajax
		EventCalendar::destroy($id);

		return redirect('events');
	}
}
