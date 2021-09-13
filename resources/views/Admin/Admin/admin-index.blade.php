@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Admins</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">                                       <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Admins</li>
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
                            <a class="btn btn-primary" href="/admin/admins/create" ><i class="fa fa-plus"></i> Add Admin</a>

                            {{--                                                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus"></i> Add User</button>--}}
                            {{--                            <button class="btn btn-primary" type="button" ><i class="fa fa-plus"></i>Attributes</button>--}}
                        </div>
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive">
                                    <table class="table table-styling" id="category-table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Verified</th>
                                            <th scope="col">Active</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="category_table_body">
                                        @foreach($admins as $u)

                                            <tr id="{{$u->id}}">
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td >{{$u->first_name}} {{$u->last_name}}</td>
                                                <td >

                                                </td>
                                                <td >
                                                    {{--                                                    <div class="media">--}}
                                                    <div class="media-body  switch-sm">
                                                        <label class="switch">
                                                            <input type="checkbox" onchange="user_active_toggle_function({{$u->id}})" @if($u->is_active) checked=""@endif ><span class="switch-state" ></span>
                                                        </label>
                                                    </div>
                                                    {{--                                                    </div>--}}
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-outline-success"  href="/admin/admins/{{$u->id}}" type="button">Details</a>
                                                    <a class="btn btn-sm btn-outline-secondary" onclick="delete_user({{$u->id }})" type="button">Delete</a>
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
        function user_active_toggle_function(user_id){
            $.ajax({
                type : 'PUT',
                url  : "/admin/user/active-toggle/" + user_id,
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

        function delete_user(user_id) {
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
                        url  : "/admin/admins/"+user_id,
                        data : {
                            "_token": "{{ csrf_token() }}",
                        },
                        success :function(data){
                            $('#' + user_id).fadeOut('fast', function(){
                                $('#' + user_id).remove();
                            });
                            $.notify({
                                    // title:'Title',
                                    message:'User Successfully Deleted!'
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


