<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\News;

class NoticiasController extends Controller
{

        public function index() {
            $news = News::all(); //show only 5 items at a time in descending order

            return view('news.index', compact('news'));
        }
}
