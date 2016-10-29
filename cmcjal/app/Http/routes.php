<?php

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', 'HomeController@index');
    Route::get('calendar', 'CalendarController@show');
    Route::get('user/{id}',  ['uses' => 'HomeController@userProfile']);
    Route::post('uploadpicture/{id}', ['uses' => 'UserController@uploadPicture']);
    Route::get('events', 'HomeController@showEvents');
    Route::get('files', 'HomeController@showFiles');

    // Calendar Route's
    Route::get('cargaEventos{id?}','CalendarController@index');
	Route::post('guardaEventos', array('as' => 'guardaEventos','uses' => 'CalendarController@create'));
	Route::post('actualizaEventos','CalendarController@update');
	Route::post('eliminaEvento','CalendarController@delete');

Route::get('/gallery', function() {
    return view('gallery');
});	


    Route::post('uploadfile', 'HomeController@uploadFile');
    //DOWNLOAD
    Route::get('download/{filename}', function($filename) {
	    // Check if file exists in app/storage/file folder
	    $file_path = public_path() .'/files/'. $filename;
	    if (file_exists($file_path))
	    {
	        // Send Download
	        return Response::download($file_path, $filename, [
	            'Content-Length: '. filesize($file_path)
	        ]);
	    }
	    else
	    {
	        // Error
	        exit('Requested file does not exist on our server!');
	    }
	}) ->where('filename', '[A-Za-z0-9\-\_\. ()]+');

    Route::get('deletefile/{filename}', 'HomeController@deleteFile')->where('filename', '[A-Za-z0-9\-\_\. ()]+');


});


/*Route::get('calendar', function () {
    return view('calendar');
});*/
