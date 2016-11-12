<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Thumbnail;
use App\User;
use Illuminate\Http\Request;
use Auth;
use App\EventCalendar;
use Illuminate\Support\Facades\Storage;
use File;

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

	public function users()
	{
		
		$users = User::paginate(2);
		return view('user.index', compact('users'));
	}


	
	public function events() {
		$user = Auth::user();
		return view('calendar')->with('user', $user);
	}

	public function assistance()
	{
		return view('assistance');
	}
	
	public function files() {

		$files_array = array();
		
		$files =  Storage::disk('files')->files();
		  foreach ($files as $key => $file) {
			$files_array[$key]['name'] = $file;
			$files_array[$key]['size'] = FileController::formatBytes(Storage::disk('files')->size($file));
			$files_array[$key]['extension'] = File::extension($file);
			$files_array[$key]['id'] = $key;
		  }

		return view('files')->with('files', $files_array);
	}

    public function gallery()
    {
        $thumbnails = Thumbnail::all();
        return view('gallery', compact('thumbnails'));
    }
}
