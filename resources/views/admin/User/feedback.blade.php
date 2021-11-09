@extends('Admin.layouts.base')

@section('content')
<div class="">

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
                        @foreach (@$allFeedback as $key => $feedback)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $feedback['name'] }}</td>
                            <td>{{ $feedback['message'] }}</td>
                            <td>
                                <div class="media-body  switch-m">
                                    <label class="switch">
                                        <input type="checkbox" onchange="feedback_active_toggle_function({{$feedback['id']}})" @if($feedback['status']) checked=""@endif ><span class="switch-state" ></span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-danger m-2" data-id="{{ $feedback['id'] }}" id="deleteBtn" type="submit">Delete</button>
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

    function feedback_active_toggle_function(feedback_id){
        var feedback_id = feedback_id;

        $.ajax({
            headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'{{ route("feedback.change.status") }}',
                method:'GET',
                data:{
                    feedback_id:feedback_id
                    },
                dataType:'json',
            success : function(data){

                if(data.status == true){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        location.reload(true);
                }

                        // title:'Title',
            },
            error : function(data){
            },
        });
    }

    // delete
    $(document).on('click','#deleteBtn', function(){

    var form = this;
    var feedback_id = $(form).attr('data-id');
    var url = '{{ route("feedback.delete") }}';

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
                headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:url,
                method:'DELETE',
                data:{feedback_id:feedback_id},
                dataType:'json',

            success:function(data){
                if(data.status == true){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        location.reload(true);
                }
            }

            });
        }
    });
    });


</script>
@endsection
