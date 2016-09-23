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
