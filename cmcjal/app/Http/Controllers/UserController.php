<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\EventCalendar;
use Validator;
use File;
use Session;
use Redirect;

class UserController extends Controller
{
	public function create()
	{
		return view('user.create');
	}

	public function store(Request $request)
	{
		User::create([
			'name' => $request->input('name'),
			'lastname' => $request->input('lastname'),
			'email' => $request->input('email'),
			'password' => bcrypt($request->input('password')), 
			'type' => $request->input('type'),
			'status' => $request->input('status')
		]);

		return redirect('users');
	}

	public function show($id)
	{
		$user = \App\User::find($id);
		return view('home.profile')->with('user', $user)->with('id', $id);
	}

	public function edit($id)
	{
		$user = User::find($id);
		return view('user.edit', ['user' => $user]);
	}

	public function update(Request $request, $id)
	{
		$user = User::find($id);
		$user->fill($request->all());
		$user->save();

		return redirect('users');
	}

	public function destroy($id)
	{
		$user = User::find($id);
		User::destroy($id);

		return $user->name . ' ' . $user->lastname . ' fue eliminado correctamente';
	}

	public function uploadPicture(Request $request, $id) {
		$user = User::find($id);
		$picture = $request->file('picture');
		$rules = array(
			'picture' => 'required|mimes:png,jpeg,jpg,gif|max:3000',
		);
		$messages = [
			'picture.required' => 'Selecciona una imagen.',
			'picture.mimes' => 'No puedes utilizar ese tipo de imagen, intenta con (jpg/png/jpeg).',
			'picture.max' => 'Tu imagen no puede pesar mas de 3MB.'
		];

		if($user->image != "")
			File::delete(storage_path().'/pictures/profile/'.$user->id.".".$picture->getClientOriginalExtension());

		$validator = Validator::make($request->all(), $rules, $messages);
		if($validator->passes()){
			$destinationPath = storage_path().'/pictures/profile/';
			//$filename = $file->getClientOriginalName();
			$filename = $user->id.".".$picture->getClientOriginalExtension();
			$picture->move($destinationPath, $filename);

			$user->image = $filename;
			$user->save();
			Session::flash('alert-success', 'Cambiaste tu imagen de perfil'); 
			return Redirect::to('/users/'.$user->id);
		}
		else
			return Redirect::to('/users/'.$user->id)->withInput()->withErrors($validator);
	}

	public function assistance($id)
	{
		$query = DB::table('assistance')->select('event_id')->where('user_id', $id)->get();

		$values = array();
		foreach ($query as $q)
			$values[] = $q->event_id;

		$sub   = DB::table('events')->select('title', 'start')->whereIn('id', $values)->get();

		$data = array();

		foreach($sub as $s)
			$data[] = array(
					'date' 			=> date('Y-m-d', strtotime($s->start)),
					'title' 		=> $s->title,
					'certificate' 	=> null
				);

		return response()->json($data);
	}
}
