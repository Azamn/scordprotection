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
                            <li class="breadcrumb-item">Show</li>
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
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-3" for="validationCustom01">Name</label>
                                                    <div class="col-sm-9">
                                                        <div>{{ $store['name'] }}</div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-3">Phone Number</label>
                                                    <div class="col-sm-9">
                                                        <div>{{ $store['phone_number'] }}</div>
                                                    </div>
                                                </div>


                                                <div class="form-group row ">
                                                    <label class="col-sm-3 col-form-label">Address</label>
                                                    <div class="col-sm-9">
                                                        <div>{{ $store['address'] }}</div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Location</label>
                                                    <div class="col-sm-9">
                                                        <div>{{ $store['location'] }}</div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3">Created At</label>
                                                    <div class="col-sm-9">
                                                        <div>{{ date('d-m-Y , h:i A',strtotime($store['created_at'])) }}</div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3">Updated At</label>
                                                    <div class="col-sm-9">
                                                        <div>{{ date('d-m-Y , h:i A',strtotime($store['updated_at'])) }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-primary mt-3 float-right" href="/admin/stores/{{$store['id']}}/edit">Edit</a>
                                        <a class="btn btn-success mt-3 float-left" href="/admin/stores/">back</a>
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



@endsection


