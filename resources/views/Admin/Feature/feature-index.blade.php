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
                <div class="card-header">
                    <a class="btn btn-primary" href="/admin/features/create"><i class="fa fa-plus"></i> Add Feature</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive tag-table">
                        <table class="display dataTable" id="basic-1">
                            <thead>
                            <tr >
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($features as $f)
                                <tr id="{{$f->id}}">
                                    <td >
                                        @if($f->getFirstMedia('product-feature'))
                                            <img src="{{$f->getFirstMedia('product-feature')->getUrl('product-feature-thumbnail')}}"  style="height: 60px;width: 100px" alt="not found">
                                        @endif
                                    </td>
                                    <td>
                                        <h6> {{$f->name}}</h6>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-success" type="button"
                                           href="/admin/features/{{$f->id}}/edit">Edit</a>
                                        <a class="btn btn-sm btn-outline-danger" type="button"
                                           onclick="tag_delete({{$f->id}})">Delete</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
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
