@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Admin</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">                                       <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/admins">Admin</a></li>
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
                                        <form class="needs-validation" novalidate="" action="{{ Route('admins.update',$admin['id']) }}" method="POST">
                                            @csrf
                                            @method("PUT")
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="validationCustom01">First Name</label>
                                                        <div class="col-sm-9">
                                                            <div>{{ $admin['first_name'] }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="validationCustom02">Last Name</label>
                                                        <div class="col-sm-9">
                                                            <div>{{ $admin['last_name'] }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="validationCustom03">Email</label>
                                                        <div class="col-sm-9">
                                                            <div>{{ $admin['email'] }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="validationCustom03">Created At</label>
                                                        <div class="col-sm-9">
                                                            <div>{{ date('d-m-Y , h:i A',strtotime($admin['created_at'])) }}</div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <a class="btn btn-primary mt-3 float-right" href="/admin/admins/{{$admin['id']}}/edit">Edit</a>
                                            <a class="btn btn-success mt-3 float-left" href="/admin/admins/">back</a>
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



@endsection


