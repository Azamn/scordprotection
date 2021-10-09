@extends('Admin.layouts.base')

@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3></h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('list-service') }}">Service</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Add Service</h5>
                    </div>
                    <form class="widget-contact-form" id="serviceAdd" method="POST">
                    {{-- <form class="form theme-form needs-validation" id="serviceAdd" method="" > --}}
                        @csrf
                        <input type="hidden" name="_token" value="yfXzE8OYEU7NhGfZDXxqQd532do1eI1PStO3MqkX">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span id="successMessage" class="alert-success" ></span>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input name="name" id="name" class="form-control" type="text" placeholder="Service Name" required="">
                                            <span id="nameError" class="alert-message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Description</label>
                                        <div class="col-sm-9">
                                            <textarea name="description" id="description" class="form-control" type="text" placeholder="Service Descrition" required=""></textarea>
                                            <span id="descriptionError" class="alert-message" style="color:red"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Image</label>
                                        <div class="col-sm-9">
                                            <input name="image" id="image" class="form-control" type="file"
                                                   placeholder="Product Thumbnail" >
                                            <span id="imageError" class="alert-message" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-sm-9 offset-sm-3">
                                <button class="btn btn-primary" onclick="serviceAdd()"  id="form-submit"><i class="fa fa-paper-plane"></i>&nbsp;Save</button>
                                {{-- <button class="btn btn-primary " onclick="serviceAdd()" type="submit">Save</button> --}}
                                <button class="btn btn-light" type="submit">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>

@endsection



@section('js')
<script src="{{asset('Assets/Admin/js/form-validation-custom.js')}}"></script>
<script src="{{asset('Asset/website/js/functions.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

        function serviceAdd(){

            const name = $('#name').val();
            const description =  $('#description').val();
            const image = $('#image').val();


            $.ajax({
                type: "POST",
                // contentType: "application/json; charset=utf-8",
                url: '{{ Route('store.services') }}',
                // dataType: "json",
                data: {
                    "_token" : "{{ csrf_token() }}",
                    "name" : name,
                    "description" : description,
                    "image" : image,
                },
                success: function (data) {
                    console.log('data');
                    $('#form-submit').html('<i class="fa fa-paper-plane"></i>&nbsp;Add Service');
                    if(data.status){
                        $("#name").val('');
                        $("#description").val('');
                        $("#image").val('');

                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    }

                    else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }
                },
                error: function (data) {
                    $('#form-submit').html('<i class="fa fa-paper-plane"></i>&nbsp;Send message');
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                }

            });

        }
</script>

@endsection



