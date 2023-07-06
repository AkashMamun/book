@extends('backend.layouts.app')


@section('content')

<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Authors</h1>
        <a href="#addModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal"><i
                class="fas fa-plus-circle fa-sm text-white-50"></i> Add Author</a>
    </div>
    <div>
        @include('backend.layouts.partials.message')
    </div>
  
  <!-- Add Author Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.authors.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <label for="">Author Name</label>
                        <br>
                        <input type="text" name="name" class="form-control"  placeholder="Author Name">
                    </div>
                    <div class="col-12">
                        <label for="">Author Description</label>
                        <br>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>                    
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
                    <h6 class="m-0 font-weight-bold text-primary">Author Lists</h6>
                </div>
                <div class="card-body">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($authors as $author)    
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                <td> {{ $author->name }} </td>
                                <td> {{ $author->description }} </td>
                                <td> {{ $author->link }}</td>
                                <td>
                                    <a href="" class="btn btn-success"  data-toggle="modal" data-target="#editModal{{$author->id}}"><i class="fa fa-edit">Edit</i></a>
                                    <a href="" class="btn btn-danger"  data-toggle="modal" data-target="#deleteModal{{$author->id}}"><i class="fa fa-trash">Delete</i></a>
                                </td>
                            </tr>
                             <!-- Edit Author Modal -->
                            <div class="modal fade" id="editModal{{$author->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Author Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.authors.update',$author->id) }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="">Author Name</label>
                                                    <br>
                                                    <input type="text" name="name" class="form-control"  placeholder="Author Name" value="{{ $author->name }}">
                                                </div>
                                                <div class="col-12">
                                                    <label for="">Author Description</label>
                                                    <br>
                                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{!! $author->description !!}</textarea>                    
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
                             <!-- Delete Author Modal -->
                            <div class="modal fade" id="deleteModal{{ $author->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete it?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.authors.delete',$author->id) }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                {{ $author->name }} will be deleted.
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