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
                            <li class="breadcrumb-item"><a href="/admin/stores">Store</a></li>
                            <li class="breadcrumb-item">Edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="card-body">
                                    <div class="card-body">
                                        <form class="needs-validation" novalidate="" action="{{ Route('stores.update',$store['id']) }}" method="POST">
                                            @csrf
                                            @method("PUT")
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="validationCustom01">Name</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" id="validationCustom01" type="text" placeholder="Store Name" required="" name="name" value="{{ $store['name'] }}">
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="validationCustom02">Phone Number</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" id="validationCustom02" type="text" placeholder="Phone Number" required="" name="phone_number" value="{{ $store['phone_number'] }}">
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Address</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="3" cols="5" placeholder="" required name="address">{{ $store['address'] }}</textarea>
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="validationCustom05">Location</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" id="validationCustom05" type="text" placeholder="Location" required="" name="location" value="{{ $store['location'] }}">
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary mt-3 float-right" type="submit">Save Changes</button>
                                        </form>
                                    </div>
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

    <script src="{{asset('Assets/Admin/js/form-validation-custom.js')}}"></script>


@endsection


