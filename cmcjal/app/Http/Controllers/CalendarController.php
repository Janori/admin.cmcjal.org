<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\EventCalendar;
use MaddHatter\LaravelFullcalendar\Event;
use Auth;

class CalendarController extends Controller
{
    public function show() {
    	$event = EventCalendar::all();

        foreach ($event as $e) {
                if ($e->status == "aceptada") {
                    $calendar = \Calendar::addEvent($e,['color' => '#5cb85c', 'borderColor' => '#4cae4c'])
                    ->setOptions([ //set fullcalendar options
                        'firstDay' => 0
                    ]); 
                } elseif ($e->status == "cancelada") {
                    $calendar = \Calendar::addEvent($e,['color' => '#d9534f', 'borderColor' => '#d43f3a'])
                    ->setOptions([ //set fullcalendar options
                        'firstDay' => 0
                    ]); 
                }
                elseif ($e->status == "pendiente") {
                    $calendar = \Calendar::addEvent($e,['color' => '#f0ad4e', 'borderColor' => '#eea236'])
                    ->setOptions([ //set fullcalendar options
                        'firstDay' => 0
                    ]); 
                } elseif ($e->status == "reagendar") {
                    $calendar = \Calendar::addEvent($e,['color' => '#337ab7', 'borderColor' => '#2e6da4'])
                    ->setOptions([ //set fullcalendar options
                        'firstDay' => 0
                    ]); 
                }
        }

        return view('calendar', compact('calendar'));
        //return view('calendar');
    }
}
