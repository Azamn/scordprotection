@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Store</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">                                       <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Store</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                                                        <a class="btn btn-primary" href="/admin/stores/create" ><i class="fa fa-plus"></i> Add Store</a>
                            {{--                            <button class="btn btn-primary" type="button" ><i class="fa fa-plus"></i>Attributes</button>--}}
                        </div>
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive">
                                    <table class="table table-styling" id="store-table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="store_table_body">
                                        @foreach($stores as $store)

                                            <tr id="{{$store->id}}">
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td >{{ $store['name'] }}</td>
                                                <td >{{ $store['phone_number'] }}</td>

                                                <td>
                                                    <a class="btn btn-sm btn-outline-success"  href="/admin/stores/{{$store->id}}" type="button">Details</a>
                                                    <a class="btn btn-sm btn-outline-info"  href="/admin/stores/{{$store->id}}/edit" type="button">Edit</a>
                                                    <a class="btn btn-sm btn-outline-secondary" onclick="delete_store({{$store->id }})" type="button">Delete</a>
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
            </div>
        </div>
    </div>


@endsection


@section('js')



    <script>



        function delete_store(store_id) {
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
                        url  : "/admin/stores/"+store_id,
                        data : {
                            "_token": "{{ csrf_token() }}",
                        },
                        success :function(data){
                            $('#' + store_id).fadeOut('fast', function(){
                                $('#' + store_id).remove();
                            });
                            $.notify({
                                    // title:'Title',
                                    message:'Store Successfully Deleted!'
                                },
                                {
                                    type:'success',
                                    allow_dismiss:false,
                                    newest_on_top:false ,
                                    mouse_over:false,
                                    showProgressbar:false,
                                    spacing:10,
                                    timer:800,
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
            });
        }
    </script>

@endsection


