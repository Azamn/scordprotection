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
                        <li class="breadcrumb-item active">Service</li>
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

                <h3>Service List</h3>
                <div class="mt-4">
                    <a class="btn btn-primary" href="{{ route('create-service') }}">Add Service + </a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (@$serviceData as $key => $service)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>

                            <td>{{ $service['name'] }}</td>
                            <td>
                               {{$service['description']}}
                            </td>
                            <td><img src="{{ $service['image_url'] }}" alt="" width = "100"></td>
                            <td>
                                {{-- <a class="btn btn-primary m-2"href="{{ '/api/admin/get/single/service/list/'.$service['id'] }}" id="editBtn">Edit</a> --}}
                                <button class="btn btn-danger m-2" data-id="{{ $service['id'] }}" id="deleteBtn" type="submit">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                        {{-- <tr>
                            <th scope="row">1</th>

                            <td>Alexander</td>
                            <td>
                                The most happiest time of the day!. Morbi sagittis, sem quis lacinia faucibus, orci
                                ipsum gravida tortor,
                                vel interdum mi sapien ut justo. Nulla varius consequat magna, id molestie ipsum
                                volutpat quis. A true story,
                                that never been told!. Fusce id mi diam, non ornare orci. Pellentesque ipsum erat,
                            </td>
                            <td><img src="{{asset('images/scordimg/3.jpeg')}}" alt="" width = "100"></td>
                            <td> <a class="btn btn-primary m-2" href="/admin/service-edit">Edit</a>
                                <button class="btn btn-danger m-2" onclick="tag_delete()" type="submit">Delete</button>
                            </td>
                        </tr> --}}
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
    $(function(){

        // Delete
        $(document).on('click','#deleteBtn', function(){

            var form = this;
            var service_id = $(form).attr('data-id');
            var url = '{{ route("delete.service") }}';

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
                        data:{service_id:service_id},
                        dataType:'json',

                       success:function(data){
                           if(data.status == true){
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: data.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                location.reload(true);
                           }
                       }

                    });
                }
            });
        });


    })
</script>
@endsection
