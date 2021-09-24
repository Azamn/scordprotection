@extends('Admin.layouts.base')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
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

                <h3>Request List</h3>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Contact</th>
                            <th scope="col">Complete</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Alexander</td>
                            <td>Orton</td>
                            <td> <div class="media mb-2">
                                <div class="media-body text-end">
                                  <label class="switch">
                                    <input type="checkbox" data-bs-original-title="" title=""><span class="switch-state"></span>
                                  </label>
                                </div>
                              </div></td>
                            <td> <button class="btn btn-primary" type="submit">Show</button>
                                <button class="btn btn-danger" onclick="tag_delete()" type="submit">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection
@section('js')
<script>
    function tag_delete(request_id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            // icon: 'warning',
            showCancelButton: true,
            allowOutsideClick: false,
            cancelButtonColor: '#7366ff',
            confirmButtonColor: '#d33',
            confirmButtonText: 'Delete'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'DELETE',
                    url: "/admin/request/" + request_id,
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (data) {
                        $('#' + request_id).fadeOut('fast', function () {
                            $('#' + request_id).remove();
                        });
                        $.notify({
                            // title:'Title',
                            message: 'Feature Successfully Deleted!'
                        }, {
                            type: 'success',
                            allow_dismiss: false,
                            newest_on_top: false,
                            mouse_over: false,
                            showProgressbar: false,
                            spacing: 10,
                            timer: 500,
                            placement: {
                                from: 'top',
                                align: 'right'
                            },
                            offset: {
                                x: 30,
                                y: 60
                            },
                            delay: 500,
                            z_index: 10000,
                            animate: {
                                enter: 'animated fadeIn',
                                exit: 'animated fadeOut'
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
