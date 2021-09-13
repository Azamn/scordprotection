@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Coupons</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">                                       <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Coupons</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                                                        <a class="btn btn-primary" href="/admin/coupons/create" ><i class="fa fa-plus"></i> Add Coupon</a>
                            {{--                            <button class="btn btn-primary" type="button" ><i class="fa fa-plus"></i>Attributes</button>--}}
                        </div>
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive">
                                    <table class="table table-styling" id="coupon-table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Discount(%)</th>
                                            <th scope="col">Usage</th>
                                            <th scope="col">Active</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="coupon_table_body">
                                        @foreach($coupons as $c)

                                            <tr id="{{$c->id}}">
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td >{{$c->name}}</td>
                                                <td >{{ $c->discount }}</td>
                                                <td >{{ $c->total_usage }}</td>
                                                <td >
                                                    <div class="media-body  switch-sm">
                                                        <label class="switch">
                                                            <input type="checkbox" onchange="coupon_active_toggle_function({{$c->id}})" @if($c->is_active) checked=""@endif ><span class="switch-state" ></span>
                                                        </label>
                                                    </div>
                                                    {{--                                                    </div>--}}
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-outline-success"  href="/admin/coupons/{{$c->id}}" type="button">Details</a>
                                                    <a class="btn btn-sm btn-outline-info"  href="/admin/coupons/{{$c->id}}/edit" type="button">Edit</a>
                                                    <a class="btn btn-sm btn-outline-secondary" onclick="delete_coupon({{$c->id }})" type="button">Delete</a>
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
    </div>


@endsection


@section('js')


    <script>
        function coupon_active_toggle_function(coupon_id){
            $.ajax({
                type : 'PUT',
                url  : "/admin/coupon/active-toggle/" + coupon_id,
                data : {
                    "_token": "{{ csrf_token() }}",
                },
                success : function(data){
                    $.notify({
                            // title:'Title',
                            message:'Success'
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
                },
                error : function(data){
                },
            });
        }

        function delete_coupon(coupon_id) {
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
                        url  : "/admin/coupons/"+coupon_id,
                        data : {
                            "_token": "{{ csrf_token() }}",
                        },
                        success :function(data){
                            $('#' + coupon_id).fadeOut('fast', function(){
                                $('#' + coupon_id).remove();
                            });
                            $.notify({
                                    // title:'Title',
                                    message:'Coupon Successfully Deleted!'
                                },
                                {
                                    type:'success',
                                    allow_dismiss:false,
                                    newest_on_top:false ,
                                    mouse_over:false,
                                    showProgressbar:false,
                                    spacing:10,
                                    timer:800,
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
                        }
                    });
                }
            });
        }
    </script>

@endsection


