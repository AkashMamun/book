<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $category = Category::first();
        $na = "Himel";
        return view('welcome',compact('category','na'));
    }
}
