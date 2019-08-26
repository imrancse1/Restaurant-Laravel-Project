{{--                    for edit.blade error validation on input data --}}
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display='none'">
                <i class="material-icons">close</i>
            </button>
            <span>
                                       <b> Danger - </b> {{$error}}</span>
        </div>
    @endforeach
@endif


{{--for index.blade file message show--}}
@if(session('successMsg'))
    <div class="alert alert-success" >

        <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none'">
            <i class="material-icons">close</i>
        </button>
        <span>
                            <b>Success - </b> {{session('successMsg')}}
                        </span>
    </div>
@endif

