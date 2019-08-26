@extends('layouts.app')

@section('title','Slider')

@push('css')


@endpush

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                   @include('layouts.includes.message')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Add New Slider</h4>
                            <p class="card-category"> Here is a subtitle for this table</p>
                        </div>
                        <div class="card-body">
                            <div class="card-content">
                                <form action="{{route('slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Title</label>
                                                <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="bmd-label-floating">Sub Title</label>
                                                <input type="text" class="form-control" name="sub_title" value="{{ $slider->sub_title }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <label class="control-label">Image</label>
                                            <input type="file" class="form-control" name="image" >
                                        </div>


                                    </div>


                                    <a href="{{route('slider.index')}}" class="btn btn-danger">Back</a>
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


