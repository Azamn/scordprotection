@extends('Admin.layouts.base')

@section('content')




<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>Attributes</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/admin/dashboard"><i data-feather="home"></i></a></li>
                <li class="breadcrumb-item"><a href="/admin/categories">Categories</a></li>
              <li class="breadcrumb-item active">Attributes</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header">
              <h5>{{ $category->name }}</h5>
            </div>
            <div class="card-body">
              <div class="todo">
                <div class="todo-list-wrapper">
                  <div class="todo-list-container">
{{--                    <div class="mark-all-tasks">--}}
{{--                      <div class="mark-all-tasks-container"><span class="mark-all-btn" id="mark-all-finished" role="button"><span class="btn-label">Mark all as finished</span><span class="action-box completed"><i class="icon"><i class="icon-check"></i></i></span></span><span class="mark-all-btn move-down" id="mark-all-incomplete" role="button"><span class="btn-label">Mark all as Incomplete</span><span class="action-box"><i class="icon"><i class="icon-check"></i></i></span></span></div>--}}
{{--                    </div>--}}

                    <div class="todo-list-body">
                      <div class="table-responsive">
                        <table class="table table-styling">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th class="w-50" scope="col">Attribute Name</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody id="attribute-table-body">
                            <tr>
                              <th scope="row">1</th>
                              <td>Name</td>
                              <td>

                              </td>
                            </tr>
                            <tr>
                              <th scope="row">2</th>
                              <td>MRP</td>
                              <td>
                              </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Quantity</td>
                                <td>
                                </td>
                            </tr>

                          @foreach($attributes as $a)
                            <tr id="{{$a->id}}">
                              <th scope="row">{{ $loop->iteration+3 }}</th>
                              <td id="attribute_name">{{ $a->attribute_name }} </td>
                              <td>
                                <a class="btn btn-sm btn-outline-success" type="button">Edit</a>
                                <a class="btn btn-sm btn-outline-danger" type="button" onclick="delete_confirmation({{$a->id}})" title="">Delete</a>
                              </td>
                            </tr>
                              @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="todo-list-footer">
                      <div class="add-task-btn-wrapper"><span class="add-task-btn">
                          <button class="btn btn-primary"><i class="icon-plus"></i> Add new Attributes</button></span></div>
                      <div class="new-task-wrapper">
                          <form id="add_attribute_form">
                              @csrf
                            <textarea id="new-task" placeholder="Enter new attributes here. . ." name="attribute_name"></textarea>
                          <span class="btn btn-danger cancel-btn" id="close-task-panel">Close</span>
                          <button class="btn btn-success ml-3 add-new-task-btn" id="add-task" type="button" onclick="add_task_function({{$category->id}})">Add Attributes</button>
                          </form>

                      </div>
                    </div>
                  </div>
                </div>
                <div class="notification-popup hide">
                  <p><span class="task"></span><span class="notification-text"></span></p>
                </div>
              </div>
              <!-- HTML Template for tasks-->
              <script id="task-template" type="tect/template">
                <tr>
                  <th scope="row">1</th>
                  <td>Otto</td>
                  <td>
                    <a class="btn btn-sm btn-outline-success"  type="button" data-toggle="modal" data-target="#EditModal" title="">Edit</a>
                    <a class="btn btn-sm btn-outline-danger" type="button" title="">Delete</a>
                  </td>
                </tr>
              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

{{-- Edit Modal--}}
<div class="modal bounceIn animated" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Edit Name</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          </div>
          <form id="category-form">
            <div class="modal-body">
                <div class="form-group row">
                    <div class="col-sm-12">
                            <input class="form-control" type="text" placeholder="Enter Attribute Name" name="name"/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
          </form>

      </div>
  </div>
</div>

@endsection



@section('js')
    <script>
        function delete_confirmation(attribute_id) {
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
                        url : "/admin/attributes/"+attribute_id,
                        data : {
                            "_token": "{{ csrf_token() }}",
                        },
                        success :function(data){
                            $('#' + data.attribute.id).fadeOut('fast', function(){
                                $('#' + data.attribute.id).remove();
                            });
                            $.notify({
                                    // title:'Title',
                                    message:'Attribute Successfully Deleted!'
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

        function add_task_function(category_id){
            var attribute_name = $("#new-task").val();
            $.ajax({
                    type: "POST",
                    url: "/admin/categories/"+ category_id + "/attributes",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "attribute_name": attribute_name,
                    },
                    success: function (data) {
                        $('#attribute-table-body').append("<tr id="+ data.attribute.id +"><th scope='row'>#</th><td id='attribute_name'>" + data.attribute.attribute_name + "</td><td><a class='btn btn-sm btn-outline-success'  type='button' data-toggle='modal' data-target='#EditModal' >Edit</a> <a class='btn btn-sm btn-outline-danger' type='button' onclick='delete_confirmation("+ data.attribute.id+ ")'>Delete</a></td></tr>");
                        $.notify({
                                // title:'Title',
                                message:'Attribute Successfully Added!'
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
                    }
                });
        }

    </script>


    @endsection


