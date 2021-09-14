@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Feature list</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">Features</li>
                            {{--              <li class="breadcrumb-item active">Product list</li>--}}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive tag-table">
                        <form method="post" action="/admin/products/{{$product_id}}/features">
                        @csrf
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                    <button type="button" class="close fa fa-times text-danger" data-dismiss="alert" aria-label="Close">
                                        <i class="material-icons">close</i>
                                    </button>
                                </div>@endif
                        <table class="display dataTable" id="basic-1">
                            <thead>
                            <tr >
                                <th>#</th>

                                <th>Name</th>
                            </tr>
                            </thead>
                                @csrf
                                @foreach($productFeatures as $f)
                                    <tr id="{{$f->id}}">
                                        <td>
                                            @if($f->selected == $product_id)
                                                    <input class="" id="{{$f->id}}" name="features[]" value="{{$f->id}}" type="checkbox" checked="" />
                                            @else
                                                    <input class="" id="{{$f->id}}" name="features[]" value="{{$f->id}}" type="checkbox" />
                                            @endif
                                        </td>
                                        <td>
                                            <h6> {{$f->name}}</h6>
                                        </td>

                                    </tr>
                                @endforeach

                            <tbody>

                            </tbody>
                        </table>
                            <button type="submit" class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
@section('js')
    <script>
        function tag_delete(feature_id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                // icon: 'warning',
                showCancelButton: true,
                allowOutsideClick : false,
                cancelButtonColor: '#7366ff',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type : 'DELETE',
                        url  : "/admin/features/"+feature_id,
                        data : {
                            "_token": "{{ csrf_token() }}",
                        },
                        success :function(data){
                            $('#' + feature_id).fadeOut('fast', function(){
                                $('#' + feature_id).remove();
                            });
                            $.notify({
                                    // title:'Title',
                                    message:'Feature Successfully Deleted!'
                                },
                                {
                                    type:'success',
                                    allow_dismiss:false,
                                    newest_on_top:false ,
                                    mouse_over:false,
                                    showProgressbar:false,
                                    spacing:10,
                                    timer:500,
                                    placement:{
                                        from:'top',
                                        align:'right'
                                    },
                                    offset:{
                                        x:30,
                                        y:60
                                    },
                                    delay:500,
                                    z_index:10000,
                                    animate:{
                                        enter:'animated fadeIn',
                                        exit:'animated fadeOut'
                                    }
                                });
                            // location.reload();
                        }
                    });
                }
            });
        }
    </script>
@endsection
