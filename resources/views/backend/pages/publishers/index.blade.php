@extends('backend.layouts.app')


@section('content')

<!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Manage Publishers</h1>
        <a href="#addModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle="modal"><i
                class="fas fa-plus-circle fa-sm text-white-50"></i> Add Publisher</a>
    </div>
    <div>
        @include('backend.layouts.partials.message')
    </div>
  
  <!-- Add publisher Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Publisher</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.publishers.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Publisher Name</label>
                        <br>
                        <input type="text" name="name" class="form-control"  placeholder="publisher Name" value="{{ old('name')}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Publisher Link</label>
                        <br>
                        <input type="text" name="link" class="form-control"  placeholder="publisher link" value="{{ old('link')}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Publisher Address</label>
                        <br>
                        <input type="text" name="address" class="form-control"  placeholder="publisher Address" value="{{ old('address')}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Publisher Outlet</label>
                        <br>
                        <input type="text" name="outlet" class="form-control"  placeholder="publisher Outlet" value="{{ old('outlet')}}">
                    </div>
                    <div class="col-12">
                        <label for="">publisher Description</label>
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
                    <h6 class="m-0 font-weight-bold text-primary">publisher Lists</h6>
                </div>
                <div class="card-body">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Address</th>
                                <th>Outlet</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($publishers as $publisher)    
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                <td> {{ $publisher->name }} </td>
                                <td> {{ $publisher->link }} </td>
                                <td> {{ $publisher->address }} </td>
                                <td> {{ $publisher->outlet }} </td>
                                <td> {{ $publisher->description }} </td>
                                <td>
                                    <a href="" class="btn btn-success"  data-toggle="modal" data-target="#editModal{{$publisher->id}}"><i class="fa fa-edit">Edit</i></a>
                                    <a href="" class="btn btn-danger"  data-toggle="modal" data-target="#deleteModal{{$publisher->id}}"><i class="fa fa-trash">Delete</i></a>
                                </td>
                            </tr>
                             <!-- Edit publisher Modal -->
                            <div class="modal fade" id="editModal{{$publisher->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Publisher Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.publishers.update',$publisher->id) }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="">Publisher Name</label>
                                                    <br>
                                                    <input type="text" name="name" class="form-control"  value="{{ $publisher->name }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Publisher Link</label>
                                                    <br>
                                                    <input type="text" name="link" class="form-control"  value="{{ $publisher->link }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Publisher Address</label>
                                                    <br>
                                                    <input type="text" name="address" class="form-control"  value="{{ $publisher->address }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Publisher Outlet</label>
                                                    <br>
                                                    <input type="text" name="outlet" class="form-control"  value="{{ $publisher->outlet }}">
                                                </div>
                                                <div class="col-12">
                                                    <label for="">publisher Description</label>
                                                    <br>
                                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $publisher->description }}</textarea>                    
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
                             <!-- Delete publisher Modal -->
                            <div class="modal fade" id="deleteModal{{ $publisher->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete it?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.publishers.delete',$publisher->id) }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                {{ $publisher->name }} will be deleted.
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