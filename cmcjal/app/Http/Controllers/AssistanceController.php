<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\User;
use App\EventCalendar;

class AssistanceController extends Controller
{
	public function store(Request $request)
	{
		$event_id 	= $request->input('event_id');
		$user_id 	= $request->input('user_id');

		if(DB::table('assistance')->select('user_id')->where([['event_id', '=', $event_id], ['user_id', '=', $user_id]])->count())
			return response()->json([]);

		$event 		= EventCalendar::find($event_id);
		$user 		= User::find($user_id);

		$event->users()->attach($user);

		DB::table('users')->where('id', $user_id)->increment('credits');

		// TODO Crear diploma de asistencia

		return response()->json([$user->toArray()]);

	}

	public function delete(Request $request)
	{
		$event_id 	= $request->input('event_id');
		$user_id	= $request->input('user_id');

		$id = DB::table('assistance')->select('id')->where([
				['user_id', '=', $user_id],
				['event_id', '=', $event_id]
			])->first()->id;

		DB::table('assistance')->where('id', $id)->delete();
		DB::table('users')->where('id', $user_id)->decrement('credits');

		// TODO Eliminar diploma de asistenciañ
		
		return 'La asistencia se elminó correctamente';
	}

	
	public function getEventSerach(Request $request)
	{
		$term = strtolower($request->input('term'));

		$result = DB::table("events")->select('id', 'title', 'start')->where('title', 'LIKE', '%'. $term . '%')->take(10)->get();
		
		$data = array(); 
		foreach ($result as $r) {
			$label  = 'EID' . date('Ymd', strtotime($r->start)) . str_pad($r->id, 3, "0", STR_PAD_LEFT) . ' - ' . $r->title;
			$data[] = array('label' => $label, 'value' => $r->id);
		}

		return response()->json($data);
	}

	public function getEventInfo($id)
	{
		$event = EventCalendar::find($id);

		$data = [
			'title'     => $event->title,
			'start'     => $event->start,
			'end'       => $event->end,
			'all_day'   => $event->all_day    
		];
		
		return response()->json($data);
	}

	public function getUsersInfo($id)
	{
		$sub    = DB::table('assistance')->select('user_id', 'modality')->where('event_id', $id)->get();
		$ids    = array();
		foreach ($sub as $s) {
			$ids[] = $s->user_id;
		}
		if(count($ids) == 0)
			return response()->json([]);
		
		$result = DB::table('users')->select(DB::raw('id, name, lastname, null as modalidad'))
									->whereIn('id', $ids)
									->get();

		$data   = array();

		for($i = 0; $i < count($result); $i++)
		{
			$r  = $result[$i];
			$s  = $sub[$i];

			$data[] = array(
					'id'        => $r->id,
					'name'      => $r->name,
					'lastname'  => $r->lastname,
					'modality'  => ($s->modality == 0 ? "Presencial" : "Examen")
					);
		}

		return response()->json($data);

	}

	public function getUserSearch(Request $request)
	{
		$term = strtolower($request->input('term'));

        $result = DB::table('users')->select('id', 'name', 'lastname')->where('name', 'LIKE', '%'. $term . '%')->take(10)->get();
        
        $data = array(); 
        foreach ($result as $r) {
            $label  = 'UID' . $r->id . ' - ' . $r->name . ' ' . $r->lastname;
            $data[] = array('label' => $label, 'value' => $r->id);
        }

        return response()->json($data);
    
	}
}
