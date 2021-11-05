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
                        <li class="breadcrumb-item active">Completed Requests</li>
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

                <h3>Request Completed List</h3>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Contact</th>
                            <th scope="col">Message</th>
                            {{-- <th scope="col">Complete</th> --}}
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (@$customerCompletedRequest as $key => $request)
                        <tr>
                            <th scope="row">{{ $key + 1}}</th>
                            <td>{{ $request['name'] }}</td>
                            <td>{{ $request['contact'] }}</td>
                            <td>{{ $request['message'] }}</td>
                            {{-- <td>
                                <div class="media-body  switch-m">
                                    <label class="switch">
                                        <input type="checkbox" onchange="request_active_toggle_function({{$request['id']}})" @if($request['status']) checked=""@endif ><span class="switch-state" ></span>
                                    </label>
                                </div>
                            </td> --}}
                            <td>
                                <button class="btn btn-danger m-2" data-id="{{ $request['id'] }}" id="deleteBtn" type="submit">Delete</button>
                            </td>
                        </tr>
                        @endforeach
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

// delete
 $(document).on('click','#deleteBtn', function(){

    var form = this;
    var request_id = $(form).attr('data-id');
    var url = '{{ route("delete.request") }}';

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
                data:{request_id:request_id},
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
