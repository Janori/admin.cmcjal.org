<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\EventCalendar;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('layouts.main', function($view) {
            date_default_timezone_set('America/Mexico_City');
            $today = date( 'Y-m-d H:i:s', mktime(0,0,0,date('n'),1,date('Y')));
            $events = EventCalendar::where(DB::raw('MONTH(start)'), '=', date('n') )->get();
            
            foreach ($events as $e) {
                if ($e->status == "aceptada") {
                    if ($e->end < $today) {
                        $calendar = \Calendar::addEvent($e,['color' => 'gray', 'borderColor' => 'gray'])
                        ->setOptions([ //set fullcalendar options
                            'firstDay' => 0
                        ]); 
                    } else {
                        $calendar = \Calendar::addEvent($e,['color' => '#5cb85c', 'borderColor' => '#4cae4c'])
                        ->setOptions([ //set fullcalendar options
                            'firstDay' => 0,

                        ]);
                    }

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
            $view->with(compact('calendar'))->with('events', $events);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
