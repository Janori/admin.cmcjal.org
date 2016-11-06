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
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    
    public function getEventSerach(Request $request)
    {
        $term = strtolower($request->input('term'));

        $result = DB::table("event_calendars")->select('id', 'title')->where('title', 'LIKE', '%'. $term . '%')->groupBy('title')->take(10)->get();
        
        $data = array(); 
        foreach ($result as $r)
            $data[] = array('label' => $r->title, 'value' => $r->id);

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
}
