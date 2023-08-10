@extends('backend.layouts.app')


@section('content')

<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Book {{ $book->title}}</h1>
    </div>
    <div>
        @include('backend.layouts.partials.message')
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Book Title</label>
                        <br>
                        <input type="text" name="title" class="form-control"  value="{{ $book->title }}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Book URL Text</label>
                        <br>
                        <input type="text" name="slug" class="form-control"  value="{{ $book->slug }}">
                    </div>
                    <div class="col-md-6">
                        <label for="category">Book Category</label>
                        <br>
                        <select name="category_id" id="category_id" class="form-control" >
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }} >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="isbn">Book ISBN</label>
                        <br>
                        <input type="text" class="form-control" name="isbn" value="{{ $book->isbn }}">
                    </div>
                    <div class="col-md-6"> 
                        <label for="category">Book Author</label>
                        <br>
                        <select name="author_ids[]" id="author_id" class="form-control select2" multiple>
                            <option value="">Select a Autor</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}" {{ App\Book::isAuthorSelected($book->id, $author->id) ? 'selected' : ''}}>{{ $author->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="category">Book Publisher</label>
                        <br>
                        <select name="publisher_id" id="publisher_id" class="form-control" >
                            <option value="">Select a publisher</option>
                            @foreach ($publishers as $publisher)
                                <option value="{{ $publisher->id }}" {{ $book->publisher_id == $publisher->id ? 'selected' : '' }}>{{ $publisher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="category">Book Publication Year</label>
                        <br>
                        <select name="publish_year" id="publish_year" class="form-control" >
                            <option value="">Select year</option>
                            @for ($year = date('Y'); $year >=1900 ; $year-- )
                                <option value="{{ $year }}" {{ $book->publish_year == $year ? 'selected' : '' }}> {{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="image">Book Featured Image (optional) <a href="{{ asset('images/books/'.$book->image) }}" target="_blank">Old Image</a></label>
                        <br>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="translator_id">Translator Book</label>
                        <br>
                        <select name="translator_id" id="translator_id" class="form-control select2" >
                            <option value="">Select a translator book</option>
                            @foreach ($books as $tb)
                                <option value="{{ $tb->id }}" {{ $tb->id == $book->translator_id ? 'selected' : ''}}>{{ $tb->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="summernote">Book Details</label>
                        <br>
                        <textarea name="description" id="summernote" cols="30" rows="10" class="form-control">{!! $book->description !!}</textarea>                    
                    </div>
                </div>
                <div class="mt-4">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            
            </form>
            
        </div>
    </div>

    <div class="row">

        
    </div>

  </div>
<!-- /.container-fluid -->

@endsection