<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\EventCalendar;
use App\Thumbnail;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use Auth;
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
		return view('home.index');
	}

	public function users()
	{

		$users = User::where('type', '<>', 3)->get();
		return view('home.users', compact('users'));
	}



	public function events() {
		$user = Auth::user();
		return view('home.calendar')->with('user', $user);
	}

	public function assistance()
	{
		return view('home.assistance');
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

		return view('home.files')->with('files', $files_array);
	}

	public function gallery()
	{
		$thumbnails = Thumbnail::all();
		return view('home.gallery', compact('thumbnails'));
	}

	public function lockscreen(Request $request)
	{

		$email 		= $request->input('ls_email');
		$password 	= $request->input('ls_password');

		$hashedPassword = DB::table('users')->select('password')->where('email', $email)->first()->password;

		if (Hash::check($password, $hashedPassword))
		{
			session(['locked' => false]);
			return 'success';
		}

		return 'failure';
	}

	public function lock()
	{
		session(['locked' => true]);
	}
}
