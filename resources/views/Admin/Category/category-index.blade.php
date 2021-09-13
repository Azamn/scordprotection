@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Categories</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">                                       <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Categories</li>
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
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus"></i> Add Category</button>
{{--                            <button class="btn btn-primary" type="button" ><i class="fa fa-plus"></i>Attributes</button>--}}
                        </div>
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive">
                                    <table class="table table-styling" id="category-table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th class="w-25" scope="col">Name</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="category_table_body">
                                        @foreach($categories as $c)
                                        <tr id="{{$c->id}}">
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td >{{$c->name}}</td>
                                            <td>
                                                <a class="btn btn-sm btn-outline-primary" type="button" href="/admin/categories/{{$c->id}}/sub-categories" title="">Sub Category</a>
                                                <a class="btn btn-sm btn-outline-info" type="button" href="/admin/categories/{{$c->id}}/attributes" title="">Attributes</a>
                                                <a class="btn btn-sm btn-outline-success" type="button"  onclick="category_edit_function({{$c}})">Edit</a>
                                                <a class="btn btn-sm btn-outline-secondary" type="button"   onclick="delete_confirmation({{$c->id}})" >Delete</a>
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
                    <h5 class="modal-title">Add Category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form id="category_form">
                    @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-12">
                                <input class="form-control" type="text" placeholder="Enter Category Name" name="name"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
{{--                    <button class="btn btn-danger" type="button">close</button>--}}
                    <button class="btn btn-primary" type="submit">Add</button>
            </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal bounceIn animated" id="category-edit-modal" tabindex="-1" role="dialog" aria-labelledby="category-edit-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
{{--                <form id="category-edit-form">--}}
{{--                    @csrf--}}
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input class="form-control" id="edit_input_name" type="text" placeholder="Enter Category Name" name="name" value=""/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="button" id="category-edit-form-submit-button">Update</button>
                    </div>
{{--                </form>--}}

            </div>
        </div>
    </div>

    {{-- Delete Modal--}}
    <div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group text-center row">
                        <div class="col-sm-6">
                            <button class="btn btn-primary"  id="modal_cancel_button" type="button">Cancel</button>
                        </div>
                        <div class="col-sm-6">
                            <button class="btn btn-danger" id="modal_submit_button" type="button">Delete</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
{{--    script for adding categories--}}
    <script>

        var number_of_rows = $("#category-table tr").length;

        $('#category_form').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                    type : 'POST',
                    url : "{{ Route('categories.store') }}",
                    data : $(this).serialize(),
                    success :function(data){
                        $("#exampleModalCenter").modal('hide');
                        $("#category_form").trigger('reset');
                        $.notify({
                                // title:'Title',
                                message:'Category Successfully Added!'
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
                        $("#category_table_body").append("<tr id="+ data.category.id +"><th scope='row'>"+ number_of_rows++ +"</th><td >"+ data.category.name +"</td><td><a class='btn btn-sm btn-outline-primary' type='button' href='/admin/categories/"+ data.category.id +"/sub-categories' >Sub Category</a> <a class='btn btn-sm btn-outline-info' type='button' href='/admin/categories/"+ data.category.id +"/attributes' >Attributes</a> <a class='btn btn-sm btn-outline-success' type='button'  data-toggle='modal' data-target='#exampleModalCenter'>Edit</a> <a class='btn btn-sm btn-outline-secondary' type='button'   onclick='delete_confirmation("+ data.category.id +")' >Delete</a></td></tr>");
                    }
                }
            );
        });



        function category_edit_function(category){
            $("#category-edit-modal").modal('show');
            $("#edit_input_name").val(category.name);
            $("#category-edit-form-submit-button").on('click',function(e){
                e.preventDefault();
                e.stopImmediatePropagation();
                $.ajax({
                        type : 'PUT',
                        url  : "/admin/categories/"+category.id,
                        data : {
                                    "_token": "{{ csrf_token() }}",
                                    "name" : "keyboard",
                                },
                        success :function(data){
                            $("#category-edit-modal").modal('hide');
                            $("#category-edit-form").trigger('reset');

                        },
                        error: function() {
                            alert('error');
                        }
                    }
                );
            });
        }






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
                        url  : "/admin/categories/"+category_id,
                        data : {
                            "_token": "{{ csrf_token() }}",
                        },
                        success :function(data){
                            $('#' + category_id).fadeOut('fast', function(){
                                $('#' + category_id).remove();
                            });
                            $.notify({
                                    // title:'Title',
                                    message:'Category Successfully Deleted!'
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


