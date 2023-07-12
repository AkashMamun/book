<?php

namespace App\Http\Controllers\Backend;

use App\Book;
use App\Author;
use App\Category;
use App\Publisher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('backend.pages.books.index',compact('books'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Is book controller get the route
       // return 1;
        $categories = Category::all();
        $publishers = Publisher::all();
        $authors = Author::all();

        return view('backend.pages.books.create',compact('categories','publishers','authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | max:50',
            'slug' => 'nullable | unique:categories',
            
        ]);
        $book = new Book();
        $book->name = $request->name;
        if(empty($request->slug)){
            $book->slug = Str::slug($request->name);
        }else{
            $book->slug = $request->slug;
        }
        $book->parent_id = $request->parent_book;
        $book->description = $request->description;

        $book->save();

        session()->flash('success','book has been created !!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $book = Book::find($id);

        $request->validate([
            'name' => 'required | max:50',
            'slug' => 'nullable | unique:categories,slug'.$book->id,
            'description' => 'nullable',
            
        ]);
  

        $book->name = $request->name;
        if(empty($request->slug)){
            $book->slug = Str::slug($request->name);
        }else{
            $book->slug = $request->slug;
        }
        $book->parent_id = $request->parent_book;
        $book->description = $request->description;

        $book->save();

        session()->flash('success','book has been updated !!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    // $book= Book::where('parent_id',$id)->get();
    //     foreach($child_books as $child){
    //         $child->delete();
    //     }
    //     $book = book::find($id);
    //     $book->delete();

    //     session()->flash('success','book has been deleted successfully !');
    //     return back();
    }
}
