<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
    	return view('frontend.pages.books.index');
    }
    public function show()
    {
    	return view('frontend.pages.books.show');
    }
}
