@extends('layouts.app')

@section('title','Category')

@push('css')


@endpush

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {{--                    for error validation on input data--}}
                    @include('layouts.includes.message')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Add New Category</h4>
                            <p class="card-category"> Here is a subtitle for this table</p>
                        </div>
                        <div class="card-body">
                            <div class="card-content">
                                <form action="{{route('item.update',$item->id)}}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Category</label>
                                                <select class="form-control" name="category">
                                                    @foreach($categories as $category)
                                                        <option {{$category->id==$item->category->id ?'selected':''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Name</label>
                                                <input type="text" class="form-control" value="{{$item->name}}" name="name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Description</label>
                                                <textarea class="form-control"  name="description">{{$item->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Price</label>
                                                <input type="number" class="form-control" value="{{$item->price}}" name="price">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div>
                                                <label class="control-label">Image</label>
                                            </div>
                                            <input type="file"  name="image">

                                        </div>
                                    </div>

                                    <a href="{{route('item.index')}}" class="btn btn-danger">Back</a>
                                    <button type="submit" class="btn btn-success" name="submit">Save</button>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')



    {{--    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>--}}
    {{--    <!-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script> -->--}}
    {{--    <script >--}}
    {{--        $(document).ready(function() {--}}
    {{--            $('#table').DataTable();--}}
    {{--        } );--}}
    {{--    </script>--}}

@endpush


