@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Blogs</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">                                       <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Blogs</li>
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
                                                        <a class="btn btn-primary" href="/admin/blogs/create" ><i class="fa fa-plus"></i> Add Blog</a>
                            {{--                            <button class="btn btn-primary" type="button" ><i class="fa fa-plus"></i>Attributes</button>--}}
                        </div>
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive">
                                    <table class="table table-styling" id="blog-table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col"  >Title</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Active</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="blog_table_body">
                                        @foreach($blogs as $b)

                                            <tr id="{{$b->id}}">
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td style="max-width: 200px" >{{ $b->title }}</td>
                                                <td >{{ $b->category }}</td>
                                                <td >{{ date('d-m-Y',strtotime($b->created_at)) }}</td>
                                                <td >
                                                    <div class="media-body  switch-sm">
                                                        <label class="switch">
                                                            <input type="checkbox" onchange="blog_active_toggle_function({{$b->id}})" @if($b->is_active) checked=""@endif ><span class="switch-state" ></span>
                                                        </label>
                                                    </div>
                                                    {{--                                                    </div>--}}
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-outline-success"  href="/admin/blogs/{{$b->id}}" type="button">Details</a>
                                                    <a class="btn btn-sm btn-outline-info"  href="/admin/blogs/{{$b->id}}/edit" type="button">Edit</a>
                                                    <a class="btn btn-sm btn-outline-secondary" onclick="delete_blog({{$b->id }})" type="button">Delete</a>
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
        function blog_active_toggle_function(blog_id){
            $.ajax({
                type : 'PUT',
                url  : "/admin/blog/active-toggle/" + blog_id,
                data : {
                    "_token": "{{ csrf_token() }}",
                },
                success : function(data){
                    $.notify({
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

        function delete_blog(blog_id) {
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
                        url  : "/admin/blogs/"+blog_id,
                        data : {
                            "_token": "{{ csrf_token() }}",
                        },
                        success :function(data){
                            $('#' + blog_id).fadeOut('fast', function(){
                                $('#' + blog_id).remove();
                            });
                            $.notify({
                                    // title:'Title',
                                    message:'Blog Successfully Deleted!'
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


