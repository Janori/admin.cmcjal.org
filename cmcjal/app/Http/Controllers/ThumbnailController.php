<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Thumbnail;
use Illuminate\Support\Facades\Storage;
use File;

class ThumbnailController extends Controller
{
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

        return redirect('admin/gallery');
    }

    public function destroy($id)
    {
        $file = Thumbnail::find($id);
        Thumbnail::destroy($id);

        $filename = $file->image;

        if(Storage::disk('thumbnails')->exists($filename)) {
            Storage::disk('thumbnails')->delete($filename);
            Storage::disk('thumbnails')->delete('thumb_' . $filename);
            return 'Imagen eliminada correctamente';
        }

    }
}
