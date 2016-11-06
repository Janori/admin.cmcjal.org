<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\EventCalendar;
use DB;
use Illuminate\Support\Facades\Storage;
use File;
use Session;
use Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */


    public function index()
    {
        return view('index');
    }

    public function showEvents() {
        $user = Auth::user();
        return view('calendar')->with('user', $user);
    }

    public function formatBytes($size, $precision = 2) {
        $base = log($size, 1024);
        $suffixes = array('b', 'Kb', 'Mb', 'Gb', 'Tb');   
        return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
    }

    public function showFiles() {
        // Creating the new document...
        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        /* Note: any element you append to a document must reside inside of a Section. */

         // Adding an empty Section to the document...
        $section = $phpWord->addSection();

        // Adding Text element to the Section having font styled by default...
        $section->addText(
            htmlspecialchars(
                '"Learn from yesterday, live for today, hope for tomorrow. '
                    . 'The important thing is not to stop questioning." '
                    . '(Albert Einstein)'
            )
        );

        // Saving the document as HTML file...
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
        $objWriter->save('helloWorld.html');

        $files =  Storage::disk('publicfiles')->files();
          foreach ($files as $key => $file) {
            $files_array[$key]['name'] = $file;
            $files_array[$key]['size'] = $this->formatBytes(Storage::disk('publicfiles')->size($file));
            $files_array[$key]['extension'] = File::extension($file);
            $files_array[$key]['id'] = $key;
          }

        return view('files')->with('files', $files_array);
    }

    public function uploadFile(Request $request) {
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $i = 1;
        while(Storage::disk('publicfiles')->exists($filename)) {
            $filename =" (".$i.") ".$file->getClientOriginalName();
            $i++;
        }
        $file->move(public_path('files'), $filename);

        Session::flash('alert-success', 'Archivo subido correctamente: '.$filename); 
        return Redirect::to('files');
    }

    public function deleteFile($filename) {
        if(Storage::disk('publicfiles')->exists($filename)) {
            Storage::disk('publicfiles')->delete($filename);
            Session::flash('alert-success', 'Archivo elimado correctamente: '.$filename); 
            return Redirect::to('files');
        } else {
            Session::flash('alert-danger', 'Este archivo no se puede eliminar por que no existe: '.$filename); 
            return Redirect::to('files');
        }
    }

    public function getPreview(Request $request)
    {
        $file = Storage::disk('publicfiles')->get($request->input('filename'));

        return response()->json(['content' => $file]);
    }

    public function getEventSerach(Request $request)
    {
        $term = strtolower($request->input('term'));

        $result = DB::table("event_calendars")->select('id', 'title')->where('title', 'LIKE', '%'. $term . '%')->groupBy('title')->take(10)->get();
        
        $data = array(); 
        foreach ($result as $r)
            $data[] = array('label' => $r->title, 'value' => $r->id);

        //if()
        return response()->json($data);
    }
}
