@extends('Admin.layouts.base')

@section('content')
<div class="page-body-wrapper sidebar-icon">

    <!-- Page Sidebar Ends-->
    <div class="page-body">
      <div class="container-fluid">
        <div class="page-title">
          <div class="row">
            <div class="col-6">
            </div>
            <div class="col-6">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                <li class="breadcrumb-item">Apps</li>
                <li class="breadcrumb-item active">Users</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>Feedback List</h3>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Feedback Text</th>
                            <th scope="col">Show on Website</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (@$allFeedback as $feedback)
                        <tr>
                            <th scope="row">{{ $feedback['id'] }}</th>
                            <td>{{ $feedback['name'] }}</td>
                            <td>{{ $feedback['message'] }}</td>
                            <td> <div class="media mb-2">
                                <div class="media-body text-end">
                                  <label class="switch">
                                    <input type="checkbox" data-bs-original-title="" title=""><span class="switch-state"></span>
                                  </label>
                                </div>
                              </div></td>
                            <td>
                                <button class="btn btn-danger" onclick="tag_delete()" type="submit">Delete</button>
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
@endsection

@section('js')

<script>
    function tag_delete(feedback_id) {
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
                    url: "/admin/feedback/" + feedback_id,
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function (data) {
                        $('#' + feedback_id).fadeOut('fast', function () {
                            $('#' + feedback_id).remove();
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
