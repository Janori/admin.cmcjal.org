<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Thumbnail;
use File;

class ThumbnailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thumbnails = Thumbnail::all();
        return view('gallery', compact('thumbnails'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file   = $request->file('image');
        $name   = str_replace('-', ' ', File::name($file->getClientOriginalName()));
        $image  = \Image::make($file);
        $path   = public_path() . '/thumbnails/';

        $image->save($path . $file->getClientOriginalName());
        $image->resize(240, 200);
        $image->save($path . 'thumb_' . $file->getClientOriginalName());

        $thumbnail = new Thumbnail();
        $thumbnail->name    = $name;
        $thumbnail->image   = $file->getClientOriginalName();
        $thumbnail->save();

        return redirect('gallery');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Thumbnail::destroy($id);

        return 'Imagen eliminada correctamente';
    }
}
