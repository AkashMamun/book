@extends('backend.layouts.app')


@section('content')

<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Books</h1>
        <a href="#addModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal"><i
                class="fas fa-plus-circle fa-sm text-white-50"></i> Add book</a>
    </div>
    <div>
        @include('backend.layouts.partials.message')
    </div>
  
  <!-- Add book Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add book</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">book Name</label>
                        <br>
                        <input type="text" name="name" class="form-control"  placeholder="book Name" value="{{ old('name')}}">
                    </div>
                    <div class="col-md-6">
                        <label for="slug">book URL Text</label>
                        <br>
                        <input type="text" name="slug" class="form-control"  placeholder="book Slug, e.g, c-programming" value="{{ old('slug')}}">
                    </div>
                    <div class="col-md-6">
                        <label for="parent_book">Parent book</label>
                        <br>
                        <select name="parent_book" id="parent_book" class="form-control" >
                            <option value="">Select a book</option>
                            @foreach ($parent_book as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="">book Description</label>
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
                    <h6 class="m-0 font-weight-bold text-primary">book Lists</h6>
                </div>
                <div class="card-body">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>URL</th>
                                <th>Parent book</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $book)    
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                <td> {{ $book->name }} </td>
                                <td> 
                                    <a href="{{ route('categories.show',$book->slug) }}" target="_blank"> {{ route('categories.show',$book->slug) }}</a> 
                                </td>
                                <td> 
                                    @if (!is_null($book->parent_book($book->parent_id))) 
                                        {{ $book->parent_book($book->parent_id)->name }}
                                        @else
                                        -- 
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-success"  data-toggle="modal" data-target="#editModal{{$book->id}}"><i class="fa fa-edit">Edit</i></a>
                                    <a href="" class="btn btn-danger"  data-toggle="modal" data-target="#deleteModal{{$book->id}}"><i class="fa fa-trash">Delete</i></a>
                                </td>
                            </tr>
                             <!-- Edit book Modal -->
                            <div class="modal fade" id="editModal{{$book->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update book Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.categories.update',$book->id) }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">book Name</label>
                                                    <br>
                                                    <input type="text" name="name" class="form-control"  placeholder="book Name" value="{{ $book->name }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="slug">book URL Text</label>
                                                    <br>
                                                    <input type="text" name="slug" class="form-control"  placeholder="book Slug, e.g, c-programming" value="{{ $book->slug }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="parent_book">Parent book</label>
                                                    <br>
                                                    <select name="parent_book" id="parent_book" class="form-control" >
                                                        <option value="">Select a book</option>
                                                        @foreach ($parent_book as $parent)
                                                            <option value="{{ $parent->id }}" {{ $book->parent_id == $parent->id ? 'selected' : ''}}>{{ $parent->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label for="">book Description</label>
                                                    <br>
                                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{!! $book->description !!}</textarea>                    
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
                             <!-- Delete book Modal -->
                            <div class="modal fade" id="deleteModal{{ $book->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete it?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.categories.delete',$book->id) }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                {{ $book->name }} will be deleted.
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