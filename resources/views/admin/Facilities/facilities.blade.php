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
                        <li class="breadcrumb-item active">Facilities</li>
                                      {{-- <li class="breadcrumb-item active">Product list</li> --}}
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <! Container-fluid starts>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>Facilities List</h3>
                <div class="mt-4">
                    <a class="btn btn-primary" href="/admin/facilities-create">Add Facilities</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id='client_table'>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Facilities Name</th>
                            <th scope="col">Show</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($facilitiesData as $key => $facilities )
                         <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $facilities['name'] }}</td>
                            <td>
                                <div class="media-body  switch-m">
                                    <label class="switch">
                                        <input type="checkbox" onchange="feature_active_toggle_function({{$facilities['id']}})" @if($facilities['status']) checked=""@endif ><span class="switch-state" ></span>
                                    </label>
                                </div>
                            </td>
                            <td>
                                {{-- <a class="btn btn-primary m-2" data-id="{{ $facilities['id'] }}" id="editBtn">Edit</a> --}}
                                <button class="btn btn-danger m-2" data-id="{{ $facilities['id'] }}" id="deleteBtn" type="submit">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <! Container-fluid Ends>
</div>
@endsection
@section('js')
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script>

    function feature_active_toggle_function(feature_id){
        var feature_id = feature_id;

        $.ajax({
            headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url:'{{ route("feature.change.status") }}',
                method:'GET',
                data:{
                    feature_id:feature_id
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
    var feature_id = $(form).attr('data-id');
    var url = '{{ route("feature.delete") }}';

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
                data:{feature_id:feature_id},
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
