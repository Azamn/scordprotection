@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Sub Categories</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/categories">Categories</a></li>
                            <li class="breadcrumb-item active">Sub Categories</li>
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
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus"></i> Add Sub Category</button>
                        </div>
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive">
                                    <table class="table table-styling" id="sub-category-table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th class="w-50" scope="col">Name</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="sub-category-table-body">
                                        @foreach($sub_categories as $sc)
                                            <tr id="{{$sc->id}}">
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td >{{$sc->name}}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-outline-success" type="button"   data-toggle="modal" data-target="#exampleModalCenter" title="">Edit</a>
                                                    <form  id="sub-category-delete-form" method="post" style="display: inline-block">
                                                        <a class="btn btn-sm btn-outline-danger" type="button" onclick="delete_confirmation({{$sc->id}})" title="">Delete</a>
                                                    </form>
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


    {{-- Edit Modal--}}
    <div class="modal bounceIn animated" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Sub Category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form id="sub-categories-form" action="{{ Route('categories.sub-categories.store',$category = $category_id)}}">
                    @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-12">
                         <input class="form-control" type="text" placeholder="Enter Sub Category Name" name="name">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Delete Modal--}}
    <div class="modal" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group text-center row">
                        <div class="col-sm-6">
                            <button id="modal-cancel-button" class="btn btn-primary" type="button">Cancel</button>
                        </div>
                        <div class="col-sm-6">
                            <button id="modal-submit-button" class="btn btn-danger" type="button">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    {{--    script for adding sub categories--}}
    <script>
        $('#sub-categories-form').on('submit',function(e){
            e.preventDefault();
            var number_of_rows = $("#sub-category-table tr").length;
            $.ajax({
                    type : 'POST',
                    url : this.action,
                    data : $(this).serialize(),
                    success :function(data){
                        $("#exampleModalCenter").modal('hide');
                        $("#sub-categories-form").trigger('reset');
                        $.notify({
                                // title:'Title',
                                message:'Sub Category Successfully Added!'
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
                        $("#sub-category-table-body").append("<tr id="+ data.subCategory.id +"><th scope='row'>"+ number_of_rows++ +" </th><td >"+ data.subCategory.name +"</td><td><a class='btn btn-sm btn-outline-success' type='button'   data-toggle='modal' data-target='#exampleModalCenter' title'>Edit</a> <form  id='sub-category-delete-form' method='post' style='display: inline-block'><a class='btn btn-sm btn-outline-danger' type='button' onclick='delete_confirmation("+ data.subCategory.id +")'>Delete</a></form></td></tr>\n")
                    }
                }
            )
        });


        function delete_confirmation(category_id) {
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
                        url : "/admin/sub-categories/"+category_id,
                        data : {
                            "_token": "{{ csrf_token() }}",
                        },
                        success :function(data){
                            $('#' + category_id).fadeOut('slow', function(){
                                $('#' + category_id).remove();
                            });
                            $.notify({
                                    // title:'Title',
                                    message:'Sub Category Successfully Deleted!'
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

        function delete_function(category_id){
            $("#delete-modal").modal('show');
            $("#modal-cancel-button").on('click',function (){
                $("#delete-modal").modal('hide');
            });
            $("#modal-submit-button").on('click',function(e){
                $("#delete-modal").modal('hide');
                e.preventDefault();
                $.ajax({
                    type : 'DELETE',
                    url : "/admin/sub-categories/"+category_id,
                    data : {
                        "_token": "{{ csrf_token() }}",
                    },
                    success :function(data){
                        $('#' + category_id).fadeOut('fast', function(){
                            $('#' + category_id).remove();
                        });
                        $.notify({
                                // title:'Title',
                                message:'Sub Category Successfully Deleted!'
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
            });

        }

        $("#category-delete-form").on('submit',function(e){
            e.preventDefault();
            $.ajax({
                type : 'POST',
                url : this.action,
                data : $(this).serialize(),
                success :function(data){
                    alert(data.category_id);
                    // $("#" + category_id).remove();
                }
            });
        });
    </script>
@endsection


