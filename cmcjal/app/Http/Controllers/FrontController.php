<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Mail;


class FrontController extends Controller
{
    public function index() {
      return view('front.index');
    }

    public function cmcjal() {
      return view('front.cmcjal');
    }

    public function colegiados() {
      return view('front.colegiados');
    }

    public function registro() {
      return redirect('/'); // The register section isn´t builded yet.
    }

    public function internacionales() {
      return view('front.internacionales');
    }

    public function nacionales() {
      return view('front.nacionales');
    }

    public function locales() {
      return view('front.locales');
    }

    public function mensuales() {
      return view('front.mensuales');
    }

    public function noticias() {
      return view('front.noticias');
    }

    public function contacto() {
      return view('front.contacto');
    }

    public function galeria() {
      return view('front.galeria');
    }

    public function submit(Request $request) {
      $data = $request->all();

      unset($data['token']);

      Mail::send('emails.contacto', ['data' => $data], function($message) {
            $message->subject('Formulario de contacto - CMCJAL');
            $message->from('no-reply@cmcjal.org', 'CMCJAL');
            //if(isset($file))
                // $message->attach($file->getClientOriginalName() . '.' . $file->getClientOriginalExtension());
            $message->to('contacto@cmcjal.org');
      });

      foreach(Mail::failures() as $email_address) {
        echo " - $email_address <br />";
      }
      return response()->json(['status' =>  count(Mail::failures())]);
    }
}
