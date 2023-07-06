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
    // public function index()
    // {
    //     $total_books = Book::get()->count();
    //     // dd($total_books);
    //     $total_authors = Author::get()->count();
    //     $total_publishers = Publisher::get()->count();
    //     $total_categories = Category::get()->count();
    //     return view('backend.pages.index', compact('total_books','total_authors','total_publishers','total_categories'));
        
    // }
}
