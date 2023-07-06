@extends('backend.layouts.app')


@section('content')

<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Categories</h1>
        <a href="#addModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal"><i
                class="fas fa-plus-circle fa-sm text-white-50"></i> Add Category</a>
    </div>
    <div>
        @include('backend.layouts.partials.message')
    </div>
  
  <!-- Add Category Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Category Name</label>
                        <br>
                        <input type="text" name="name" class="form-control"  placeholder="Category Name" value="{{ old('name')}}">
                    </div>
                    <div class="col-md-6">
                        <label for="slug">Category URL Text</label>
                        <br>
                        <input type="text" name="slug" class="form-control"  placeholder="Category Slug, e.g, c-programming" value="{{ old('slug')}}">
                    </div>
                    <div class="col-md-6">
                        <label for="parent_category">Parent Category</label>
                        <br>
                        <select name="parent_category" id="parent_category" class="form-control" >
                            <option value="">Select a category</option>
                            @foreach ($parent_category as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="">Category Description</label>
                        <br>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('name')}}</textarea>                    
                    </div>
                </div>
                <div class="mt-4">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            
            </form>
            
        </div>
      </div>
    </div>
  </div>
  

    <!-- Content Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Category Lists</h6>
                </div>
                <div class="card-body">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>URL</th>
                                <th>Parent Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)    
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                <td> {{ $category->name }} </td>
                                <td> 
                                    <a href="{{ route('categories.show',$category->slug) }}" target="_blank"> {{ route('categories.show',$category->slug) }}</a> 
                                </td>
                                <td> 
                                    @if (!is_null($category->parent_category($category->parent_id))) 
                                        {{ $category->parent_category($category->parent_id)->name }}
                                        @else
                                        -- 
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-success"  data-toggle="modal" data-target="#editModal{{$category->id}}"><i class="fa fa-edit">Edit</i></a>
                                    <a href="" class="btn btn-danger"  data-toggle="modal" data-target="#deleteModal{{$category->id}}"><i class="fa fa-trash">Delete</i></a>
                                </td>
                            </tr>
                             <!-- Edit category Modal -->
                            <div class="modal fade" id="editModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update category Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.categories.update',$category->id) }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Category Name</label>
                                                    <br>
                                                    <input type="text" name="name" class="form-control"  placeholder="Category Name" value="{{ $category->name }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="slug">Category URL Text</label>
                                                    <br>
                                                    <input type="text" name="slug" class="form-control"  placeholder="Category Slug, e.g, c-programming" value="{{ $category->slug }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="parent_category">Parent Category</label>
                                                    <br>
                                                    <select name="parent_category" id="parent_category" class="form-control" >
                                                        <option value="">Select a category</option>
                                                        @foreach ($parent_category as $parent)
                                                            <option value="{{ $parent->id }}" {{ $category->parent_id == $parent->id ? 'selected' : ''}}>{{ $parent->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label for="">Category Description</label>
                                                    <br>
                                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{!! $category->description !!}</textarea>                    
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancle</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        
                                        </form>
                                        
                                    </div>
                                </div>
                                </div>
                            </div>
                             <!-- Delete category Modal -->
                            <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete it?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.categories.delete',$category->id) }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                {{ $category->name }} will be deleted.
                                            </div>
                                            <div class="mt-4">
                                                <button type="submit" class="btn btn-primary">OK, Confirm</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        
                                        </form>
                                        
                                    </div>
                                </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        
    </div>

  </div>
<!-- /.container-fluid -->

@endsection