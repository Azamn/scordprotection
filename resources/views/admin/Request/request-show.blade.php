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

                <h3>Request Details</h3>
            </div>
            <div class="card-body">
               <h5> Customer Name : <span> name</span></h5>
               <h5> Customer Number : <span> 0321456987</span></h5>
               <h5> Customer Address : <span> B-46, Flat-203, Pranav CHS Ltd. Sector -1, Shanti Nagar Mira Road Dist-Thane</span></h5>
               <h5> Request Date : <span> 12/12/2020</span></h5>
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
