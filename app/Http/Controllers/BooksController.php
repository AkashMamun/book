<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use App\Category;
use App\Publisher;
use App\BookAuthor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function create()
    {
        // Is book controller get the route
       // return 1;
        $categories = Category::all();
        $publishers = Publisher::all();
        $authors = Author::all();
        $books = Book::where('is_approved',1)->get();


        return view('frontend.pages.books.create',compact('categories','publishers','authors','books'));
    }
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
        $book->user_id = Auth::id();
        $book->isbn = $request->isbn;
        $book->translator_id = $request->translator_id;
        $book->is_approved = 0;

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
}
