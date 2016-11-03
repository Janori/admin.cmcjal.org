<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Redirect; 
use Session;
use File;

class UserController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$users = User::All();
		return view('user.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('user.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
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

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$user = \App\User::find($id);
        return view('profile')->with('user', $user)->with('id', $id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		return view('user.edit', ['user' => $user]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$user = User::find($id);
		$user->fill($request->all());
		$user->save();

		return redirect('users');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
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

		if($user->image != "") {
			File::delete(storage_path().'/pictures/profile/'.$user->id.".".$picture->getClientOriginalExtension());
		}

		$validator = Validator::make($request->all(), $rules, $messages);
		if($validator->passes()){
			$destinationPath = storage_path().'/pictures/profile/';
			//$filename = $file->getClientOriginalName();
			$filename = $user->id.".".$picture->getClientOriginalExtension();
			$picture->move($destinationPath, $filename);

			$user->image = $filename;
			$user->save();
			Session::flash('alert-success', 'Cambiaste tu imagen de perfil'); 
			return Redirect::to('/user/'.$user->id);
		} else {
		  return Redirect::to('/user/'.$user->id)->withInput()->withErrors($validator);
		}
	}
}
