@extends('backend.layouts.app')


@section('content')

<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Books</h1>
        <a href="#addModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal"><i
                class="fas fa-plus-circle fa-sm text-white-50"></i> Create Book</a>
    </div>
    <div>
        @include('backend.layouts.partials.message')
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <form action="" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Book Title</label>
                        <br>
                        <input type="text" name="name" class="form-control"  placeholder="Book Title"">
                    </div>
                    <div class="col-md-6">
                        <label for="category">Book Category</label>
                        <br>
                        <select name="category_id" id="category_id" class="form-control" >
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="category">Book Author</label>
                        <br>
                        <select name="publisher_id" id="publisher_id" class="form-control" >
                            <option value="">Select a Autor</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="category">Book Publisher</label>
                        <br>
                        <select name="publisher_id" id="publisher_id" class="form-control" >
                            <option value="">Select a publisher</option>
                            @foreach ($publishers as $publisher)
                                <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="">Book Details</label>
                        <br>
                        <textarea name="details" id="details" cols="30" rows="10" class="form-control">{!! $category->name !!}</textarea>                    
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