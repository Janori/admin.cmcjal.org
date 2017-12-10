<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Mail;

use App\News;


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
      return redirect('/'); // The register section isn´t built yet.
    }

    public function internacionales() {
        $news = News::where('category', 'INTERNACIONALES')->get();
        $title = 'INTERNACIONALES';
        $subtitle = 'Conecta tu conocimiento alrrededor del mundo';
        setlocale(LC_ALL, "es_MX");
        return view('front.internacionales', compact('news', 'title', 'subtitle'));
    }

    public function nacionales() {
        $news = News::where('category', 'NACIONALES')->get();
        $title = 'NACIONALES';
        $subtitle = 'Conecta tu conocimiento alrrededor del mundo';
        setlocale(LC_ALL, "es_MX");
        return view('front.internacionales', compact('news', 'title', 'subtitle'));
    }

    public function locales() {
        $news = News::where('category', 'LOCALES')->get();
        $title = 'LOCALES';
        $subtitle = 'Participa en los eventos cercanos a ti';
        setlocale(LC_ALL, "es_MX");
        return view('front.internacionales', compact('news', 'title', 'subtitle'));
    }

    public function mensuales() {
        $news = News::where('category', 'SESIONES MENSUALES')->get();
        $title = 'SESIONES MENSUALES';
        $subtitle = 'En constante preparación';
        setlocale(LC_ALL, "es_MX");
        return view('front.internacionales', compact('news', 'title', 'subtitle'));
    }

    public function noticias() {
        $news = News::where('category', 'NOTICIAS')->get();
        $title = 'NOTICIAS';

        $subtitle = 'Conecta tu conocimiento alrrededor del mundo';
        setlocale(LC_ALL, "es_MX");
        return view('front.internacionales', compact('news', 'title', 'subtitle'));
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
