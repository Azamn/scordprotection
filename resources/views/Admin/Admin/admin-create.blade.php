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
                            <li class="breadcrumb-item">Create</li>
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
                                        <form class="needs-validation" novalidate="" action="{{ Route('admins.store') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="validationCustom01">First Name</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" id="validationCustom01" type="text" placeholder="First Name" required="" name="first_name">
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="validationCustom02">Last Name</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" id="validationCustom02" type="text" placeholder="Last Name" required="" name="last_name">
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="validationCustom03">Email</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" id="validationCustom03" type="email" placeholder="Email" required="" name="email">
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="validationCustom03">Password</label>
                                                        <div class="col-sm-9">
                                                            <input class="datepicker-here form-control" id="validationCustom03" type="password" data-language="en" placeholder="Password" required="" name="password">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="validationCustom05">Confirm Password</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" id="validationCustom05" type="passowrd" placeholder="Confirm Password" required="" name="password_confirmation">
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <button class="btn btn-primary mt-3 float-right" type="submit">Add Admin</button>
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


