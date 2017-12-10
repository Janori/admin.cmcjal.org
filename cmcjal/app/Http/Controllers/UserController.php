<?php

namespace App\Http\Controllers\A;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\EventCalendar;
use App\Documentation;
use App\User;


use Auth;
use File;
use Redirect;
use Session;
use Validator;

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
			'password' => $request->input('password'),
			'type' => $request->input('type'),
			'status' => $request->input('status')
		]);

		return redirect('admin/users');
	}

	public function show($id = 0)
	{
		if($id == 0)
			$id = Auth::user()->id;

		$user 			= User::find($id);
		$documentation 	= $user->documentation;

		$required  = [
			'acta_nacimiento' 	=> 'Acta de nacimiento',
			'titulo' 			=> 'Título',
			'cedula'			=> 'Cédula',
		];

		$credits = DB::table('assistance')->select(DB::raw("SUM(credits) as creditos"))->where('user_id', $id)->get();
		$credits = $credits[0]->creditos;

		return view('user.show')->with('user', $user)
								   ->with('id', $id)
								   ->with('documentation', $documentation)
								   ->with('required', $required)
								   ->with('credits', $credits);
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

		if(!$request->has('status'))
			$user->status = 0;

		$user->save();

		return redirect('admin/users');
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
			return Redirect::to('/admin/users/'.$user->id);
		}
		else
			return Redirect::to('/admin/users/'.$user->id)->withInput()->withErrors($validator);
	}

	public function uploadDocumentation($id, Request $request) {
		$user 			= User::find($id);
		$documentation 	= new Documentation;
		$documentation->user_id = $id;

		$files = ['birth_certificate', 'certificate', 'document'];

		foreach ($files as $type)
		{
			if(!$request->hasFile($type))
				continue;

			$file = $request->file($type);

			// TODO Validate
			if(true)
			{
				$destinationPath 	= storage_path() . '/docs/' . $id . '/';
				$filename 			= $type . '.' . $file->getClientOriginalExtension();

				$file->move($destinationPath, $filename);

				$documentation->{$type} = 'docs/' . $id . '/'. $filename;

			}
		}

		$documentation = $user->documentation()->save($documentation);

		$user->documentation_id = $documentation->id;

		return redirect()->route('users.show', ['id' => $id]);
	}

	public function getDocumentation($id, $file)
	{
		echo "Mostrando $file del $id";
	}

	public function assistance($id)
	{
		$query = DB::table('assistance')->select('event_id')->where('user_id', $id)->get();

		$values = array();
		foreach ($query as $q)
			$values[] = $q->event_id;

		$sub   = DB::table('events')->select('id', 'title', 'start', 'credits')->whereIn('id', $values)->get();

		$data = array();

		foreach($sub as $s)
			$data[] = array(
					'date' 			=> date('Y-m-d', strtotime($s->start)),
					'title' 		=> $s->title,
					'credits' 		=> $s->credits,
					'certificate' 	=> null,
					'event_id'	=> $s->id,
					'user_id' => $id,
				);

		return response()->json($data);
	}
}
