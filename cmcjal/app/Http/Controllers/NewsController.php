<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\News;
use File;

class NewsController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        $news = News::all(); //show only 5 items at a time in descending order

        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $picture = $request->file('image');

        //Validating title and body field
        $this->validate($request, [
            'title'=>'required|max:100',
            'body' =>'required',
            ]);

        $title = $request['title'];
        $body = $request['body'];

        $news = News::create($request->only('title', 'body', 'category', 'link'));

        if(!is_null($picture)) {
            $destinationPath = storage_path().'/pictures/news/';
            //$filename = $file->getClientOriginalName();
            $filename = $news->id.".".$picture->getClientOriginalExtension();
            $picture->move($destinationPath, $filename);

            $news->image = $filename;
        }
        $news->save();

        //Display a successful message upon save
        return redirect()->route('news.index')
            ->with('flash_message', 'Article,
             '. $news->title.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $news = News::findOrFail($id); //Find post of id = $id

        return view ('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $news = News::findOrFail($id);

        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $picture = $request->file('image');

        $this->validate($request, [
            'title'=>'required|max:100',
            'body'=>'required',
        ]);

        $news = News::findOrFail($id);

		// if($news->image != "")
			// File::delete(storage_path().'/pictures/news/'.$news->id.".".$picture->getClientOriginalExtension());


        $news->title = $request->input('title');
        $news->body = $request->input('body');
        $news->category  = $request->input('category');
        $news->link  = $request->input('link');

        if(!is_null($picture)) {
            $destinationPath = storage_path().'/pictures/news/';
            //$filename = $file->getClientOriginalName();
            $filename = $news->id.".".$picture->getClientOriginalExtension();
            $picture->move($destinationPath, $filename);

            $news->image = $filename;
        }
        $news->save();

        return redirect()->route('news.index')->with('flash_message',
            'Article, '. $news->title.' updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('news.index')
            ->with('flash_message',
             'Article successfully deleted');

    }
}
