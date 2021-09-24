@extends('Admin.layouts.base')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Contact</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard"> <i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" novalidate="">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="validationCustom01">Phone Number</label>
                                    <input class="form-control" id="validationCustom01" type="number" value=""
                                        required="" data-bs-original-title="" title="">
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class=" col-md-6">
                                    <label class="form-label" for="validationCustom02">Email</label>
                                    <input class="form-control" id="validationCustom02" type="email" value=""
                                        required="" data-bs-original-title="" title="">
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                               
                            </div>
                           <div class="mt-3">
                            <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Update</button>
                           </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('js')
<script>
    function user_active_toggle_function(user_id) {
        $.ajax({
            type: 'PUT',
            url: "/admin/user/active-toggle/" + user_id,
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function (data) {
                $.notify({
                    // title:'Title',
                    message: 'Success'
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
            },
            error: function (data) {},
        });
    }

    function delete_user(user_id) {
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
                    url: "/admin/users/" + user_id,
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (data) {
                        $('#' + user_id).fadeOut('fast', function () {
                            $('#' + user_id).remove();
                        });
                        $.notify({
                            // title:'Title',
                            message: 'User Successfully Deleted!'
                        }, {
                            type: 'success',
                            allow_dismiss: false,
                            newest_on_top: false,
                            mouse_over: false,
                            showProgressbar: false,
                            spacing: 10,
                            timer: 800,
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
                    }
                });
            }
        });
    }

</script>


@endsection
