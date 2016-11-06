<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Session;

class FileController extends Controller
{
    public static function formatBytes($size, $precision = 2) {
		$base = log($size, 1024);
		$suffixes = array('b', 'Kb', 'Mb', 'Gb', 'Tb');   
		return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
	}


	public function upload(Request $request) {
		$file = $request->file('file');
		$filename = $file->getClientOriginalName();
		$i = 1;
		while(Storage::disk('files')->exists($filename)) {
			$filename =" (".$i.") ".$file->getClientOriginalName();
			$i++;
		}
		$file->move(public_path('files'), $filename);

		Session::flash('alert-success', 'Archivo subido correctamente: '.$filename); 
		return redirect('files');
	}

	public function delete($filename) {
		if(Storage::disk('files')->exists($filename)) {
			Storage::disk('files')->delete($filename);
			Session::flash('alert-success', 'Archivo elimado correctamente: '.$filename); 
			return redirect('files');
		} else {
			Session::flash('alert-danger', 'Este archivo no se puede eliminar por que no existe: '.$filename); 
			return redirect('files');
		}
	}

	public function download($filename)
	{
		// Check if file exists in app/storage/file folder
		$file_path = public_path() .'/files/'. $filename;
		if (file_exists($file_path))
		{
			// Send Download
			return response()->download($file_path, $filename, [
				'Content-Length: '. filesize($file_path)
			]);
		}
		else
		{
			// Error
			exit('Requested file does not exist on our server!');
		}
	}

	public function getPreview(Request $request)
	{
		$file = Storage::disk('files')->get($request->input('filename'));

		return response()->json(['content' => $file]);
	}

}
