@extends('layouts.app')

@section('title','Category')

@push('css')

    <link rel="stylesheet"  href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

@endpush

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('category.create')}}" class="btn btn-primary">Add New</a>
                    @include('layouts.includes.message')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">All Category</h4>
                            <p class="card-category"></p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="table" class="table table-striped table-bordered" cellpadding="0" style="width:100%">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                    <th>Message</th>
                                    </thead>
                                    <tbody>

                                  @foreach($categories as $key=>$category)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->slug}}</td>
                                            <td>{{$category->created_at}}</td>

                                            <td>{{$category->updated_at}}</td>

                                            <td>
                                                <a href="{{route('category.edit',$category->id)}}" class="btn btn-info btn-sm"><i class="material-icons">mode_edit</i></a>

                                                <form id="delete-form-{{$category->id}}" action="{{route('category.destroy',$category->id)}}" style="display: none;" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <button type="button" class="btn btn-danger btn-sm" onclick= "if(confirm('Are you sure ? you want to delete this ?'))
                                                        {
                                                        event.preventDefault();
                                                        document.getElementById('delete-form-{{$category->id}}').submit();
                                                        }else {
                                                        event.preventDefault();
                                                        }">
                                                    <i class="material-icons"  >delete</i>

                                                </button>
                                            </td>


                                            </tr>


                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endsection
    @push('scripts')



        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
        <script >
            $(document).ready(function() {
                $('#table').DataTable();
            } );
        </script>

    @endpush



