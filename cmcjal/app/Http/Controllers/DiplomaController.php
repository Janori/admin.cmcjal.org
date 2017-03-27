<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;

use App\User;
use App\EventCalendar;

use File;

use Barryvdh\DomPDF\Facade as PDF;

class DiplomaController extends Controller
{
    public function show($user_id, $event_id) {
      $exist = DB::table('assistance')->where([['user_id', $user_id], ['event_id', $event_id]])->count();

      if(!$exist)
        return redirect('/');

      $dir = storage_path() . "/diploma/$user_id/$event_id" . '.pdf';

      if(false) { // Until the next budget refill
        // If diploma aleady exists, then return it.
      }
      else {
        // Otherwise, generate it.
        $user   = User::find($user_id);
        $event  = EventCalendar::find($event_id);
        PDF::setOptions(['dpi' => 150, 'isRemoteEnabled' => true]);
        $pdf = PDF::loadView('diploma', [
          'user'  => $user,
          'event' => $event,
        ])->setPaper('A4', 'landscape');

        return $pdf->stream();
      }
    }
}
