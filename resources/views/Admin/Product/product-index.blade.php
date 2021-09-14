@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Product list</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item active">Products</li>
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
                    <a class="btn btn-primary" href="/admin/products/create"><i class="fa fa-plus"></i> Add Product</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive product-table">
                        <table class="display dataTable" id="basic-1">
                            <thead>
                            <tr >
                                <th>#</th>
                                <th>Image</th>
                                <th>Details</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $p)
                                <tr id="{{$p->id}}">
                                    <td>{{$loop->iteration}}</td>
                                    <td class="text-center">
                                        @if($p->getFirstMedia('product-thumbnail'))
                                        <img  src="{{$p->getFirstMedia('product-thumbnail')->getUrl('profile')}}" width="80px" height="60px" alt="img not found">
                                    @else
                                        <img  src="{{ Asset('Assets/Admin/images/product/1.png') }}" width="80px" height="60px" alt="img not found">
                                    @endif
                                    </td>
                                    <td>
                                        <h6> {{$p->name}}</h6>
                                        {{--                    <span>Interchargebla lens Digital Camera with APS-C-X Trans CMOS Sens</span>--}}
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-primary" type="button"
                                           href="/admin/products/{{$p->id}}">Details</a>
                                        <a class="btn btn-sm btn-outline-secondary" type="button"
                                           href="/admin/products/{{$p->id}}/rating">Rating</a>
                                        <a class="btn btn-sm btn-outline-success" type="button"
                                           href="/admin/products/{{$p->id}}/edit">Edit</a>
                                        <a class="btn btn-sm btn-outline-danger" type="button"
                                           onclick="product_delete({{$p->id}})">Delete</a>
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
        function product_delete(product_id){
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
                        url  : "/admin/products/"+product_id,
                        data : {
                            "_token": "{{ csrf_token() }}",
                        },
                        success :function(data){
                            $('#' + product_id).fadeOut('fast', function(){
                                $('#' + product_id).remove();
                            });
                            $.notify({
                                    // title:'Title',
                                    message:'Product Successfully Deleted!'
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
