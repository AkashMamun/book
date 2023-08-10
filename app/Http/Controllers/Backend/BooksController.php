<?php

namespace App\Http\Controllers\Backend;

use App\Book;
use App\Author;
use App\BookAuthor;
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
        $books = Book::where('is_approved',1)->get();


        return view('backend.pages.books.create',compact('categories','publishers','authors','books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        // dd($request->all());
        $request->validate([
            'title' => 'required | max:50',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'slug' => 'nullable|unique:books',
            'description' => 'nullable',
            'image' => 'required|image|max:2048',
            
        ],
        [
            'image.max' => 'Image size can not be greater than 2MB',
        ]
        );

        $book = new Book();
        $book->title = $request->title;
        if(empty($request->slug)){
            $book->slug = Str::slug($request->title);
        }else{
            $book->slug = $request->slug;
        }
        $book->category_id = $request->category_id;
        $book->publisher_id = $request->publisher_id;
        $book->publish_year = $request->publish_year;
        $book->description = $request->description;
        $book->user_id = 1;
        $book->isbn = $request->isbn;
        $book->translator_id = $request->translator_id;
        $book->is_approved = 1;

         //Image Upload
         if($request->image){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $name = time().'-'.$book->id.'.'.$ext;
            $path = "images/books";
            // dd($ext);
            $file->move($path,$name);
            $book->image = $name;
            $book->save();
        }
        
        $book->save();

        //book author
        foreach ($request->author_ids as $id) {
            # code...
            $book_author = new BookAuthor();
            $book_author->book_id = $book->id;
            $book_author->author_id = $id;
            $book_author->save();
        }

        session()->flash('success','Book has been created !!');
        return redirect()->route('admin.books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id);
        $categories = Category::all();
        $publishers = Publisher::all();
        $authors = Author::all();
        $books = Book::where('is_approved',1)->where('id','!=',$id)->get();


        return view('backend.pages.books.edit',compact('categories','publishers','authors','books','book'));
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
        // $book = Book::find($id);

        // $request->validate([
        //     'name' => 'required | max:50',
        //     'slug' => 'nullable | unique:categories,slug'.$book->id,
        //     'description' => 'nullable',
            
        // ]);
  

        // $book->name = $request->name;
        // if(empty($request->slug)){
        //     $book->slug = Str::slug($request->name);
        // }else{
        //     $book->slug = $request->slug;
        // }
        // $book->parent_id = $request->parent_book;
        // $book->description = $request->description;

        // $book->save();

        // session()->flash('success','book has been updated !!');
        // return back();
        $book = Book::find($id);
        $request->validate([
            'title' => 'required | max:50',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'slug' => 'nullable|unique:books,slug,'.$book->id,
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048',
            
        ],
        [
            'image.max' => 'Image size can not be greater than 2MB',
        ]
        );

        $book->title = $request->title;
        if(empty($request->slug)){
            $book->slug = Str::slug($request->title);
        }else{
            $book->slug = $request->slug;
        }
        $book->category_id = $request->category_id;
        $book->publisher_id = $request->publisher_id;
        $book->publish_year = $request->publish_year;
        $book->description = $request->description;
        $book->isbn = $request->isbn;
        $book->translator_id = $request->translator_id;
        //$book->is_approved = 1;

         //Image Upload
         if($request->image){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $name = time().'-'.$book->id.'.'.$ext;
            $path = "images/books";
            // dd($ext);
            $file->move($path,$name);
            $book->image = $name;
            $book->save();
        }
        
        $book->save();

        //book author

        //Delete old authors table data
        $book_authors = BookAuthor::where('book_id',$book->id)->get();
        foreach($book_authors as $author){
            $author->delete();
        }

        foreach ($request->author_ids as $id) {
            # code...
            $book_author = new BookAuthor();
            $book_author->book_id = $book->id;
            $book_author->author_id = $id;
            $book_author->save();
        }

        session()->flash('success','Book has been Update !!');
        return redirect()->route('admin.books.index');
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
