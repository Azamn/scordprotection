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
                        <li class="breadcrumb-item active">Our Clients</li>
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
                <h3>Clients List</h3>
                <div class="mt-4">
                    <a class="btn btn-primary" href="{{ route('create-clients') }}">Add Client</a>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table" id='client_table'>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Client Name</th>
                            <th scope="col">Client Photo</th>
                            <th scope="col">Show</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ourClientData as $key => $client )
                        <tr>
                            <th scope="row">{{ $key + 1  }}</th>
                            <td>{{ $client['name'] }}</td>
                            <td><img src="{{ $client['image_url'] }}" width="150" alt=""></td>
                            <td>
                                {{-- <div class="media mb-2">
                                <div class="media-body text-end"> --}}

                                    <label class="switch">
                                        {{-- <input data-id="{{ $client['id'] }}" id="toggleStatus" class="toggle-class" type="checkbox"
                                            data-onstyle="success"
                                                data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive"
                                                 {{ $client['status'] ? 'checked' : '' }}> --}}

                                        <input type="checkbox" id="togBtn" value="true" data-bs-original-title="" title=""><span class="switch-state"></span> --}}
                                    </label>


                                {{-- </div>
                              </div> --}}
                            </td>
                            <td>
                                <button class="btn btn-danger m-2" data-id="{{ $client['id'] }}" id="deleteBtn" type="submit">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                        {{-- <tr>
                            <th scope="row">1</th>
                            <td>Alexander</td>
                            <td><img src="{{asset('images/scordimg/2.jpeg')}}" width="150" alt=""></td>
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
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script>

    // delete
     $(document).on('click','#deleteBtn', function(){

        var form = this;
        var client_id = $(form).attr('data-id');
        var url = '{{ route("client.delete") }}';

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
                    data:{client_id:client_id},
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

{{-- <script>


    $(function(){
        $('#toggleStatus').click(function(){

            var = status = $(this).prop('checked') == true ? 1 : 0;
            var client_id = $(this).data('id');

            console.log(status);
            $.ajax({
                headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                type:"GET",
                dataType:"Json",
                url:'{{ route("client.change.status") }}',
                data:{
                    'status':status,
                    'client_id':client_id
                },
                success: function(data){
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

        });
    })

</script> --}}
@endsection
