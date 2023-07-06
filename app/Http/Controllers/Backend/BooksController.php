<?php

namespace App\Http\Controllers\Backend;

use App\Book;
use App\Author;
use App\Category;
use App\Publisher;
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
        $categories = Book::all();
        $parent_category = Category::where('parent_id',null)->get();
        return view('backend.pages.books.index',compact('categories','parent_category'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $category = new Category();
        $category->name = $request->name;
        if(empty($request->slug)){
            $category->slug = Str::slug($request->name);
        }else{
            $category->slug = $request->slug;
        }
        $category->parent_id = $request->parent_category;
        $category->description = $request->description;

        $category->save();

        session()->flash('success','Category has been created !!');
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
        $category = Category::find($id);

        $request->validate([
            'name' => 'required | max:50',
            'slug' => 'nullable | unique:categories,slug'.$category->id,
            'description' => 'nullable',
            
        ]);
  

        $category->name = $request->name;
        if(empty($request->slug)){
            $category->slug = Str::slug($request->name);
        }else{
            $category->slug = $request->slug;
        }
        $category->parent_id = $request->parent_category;
        $category->description = $request->description;

        $category->save();

        session()->flash('success','Category has been updated !!');
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
        $child_categories = Category::where('parent_id',$id)->get();
        foreach($child_categories as $child){
            $child->delete();
        }
        $category = Category::find($id);
        $category->delete();

        session()->flash('success','Category has been deleted successfully !');
        return back();
    }
}
