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
                        <form class="needs-validation" id="update_contact"  enctype="multipart/form-data" novalidate="">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <input type="hidden" id="contact_id" value="{{ $contact->id ?? NULL }}">

                                    <label class="form-label" for="validationCustom01">Phone Number</label>
                                    <input class="form-control" id="mobile_no" type="number" value="{{$contact->mobile_no ?? NULL}}"
                                        required="" data-bs-original-title="" title="">
                                    <div class="valid-feedback">Looks good!</div>
                                </div>
                                <div class=" col-md-6">
                                    <label class="form-label" for="validationCustom02">Email</label>
                                    <input class="form-control" id="email" type="email" value="{{ $contact->email ?? NULL}}"
                                        required="" data-bs-original-title="" title="">
                                    <div class="valid-feedback">Looks good!</div>
                                </div>

                            </div>
                           <div class="mt-3">
                            <button class="btn btn-primary "type="submit" data-bs-original-title="" title="">Update</button>
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
<script src="{{asset('Assets/Admin/js/form-validation-custom.js')}}"></script>
<script src="{{asset('Asset/website/js/functions.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

        $('#update_contact').on('submit',function(e){
            e.preventDefault();

            let id = $('#contact_id').val();
            let mobile_no = $('#mobile_no').val();
            let email = $('#email').val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:'{{ route("update.contatc") }}',
                    method:'POST',
                    data:{
                        id:id,
                        mobile_no:mobile_no,
                        email:email,
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
        });


</script>

@endsection
