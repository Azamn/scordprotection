@extends('Admin.layouts.base')

@section('content')

<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Features</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/admin/dashboard"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"><a href="/admin/features"> Features</a></li>
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
                        <h5>Features Details</h5>
                    </div>
                    <form method="post" action="{{ route('features.store') }}" class="form theme-form needs-validation" novalidate="" enctype="multipart/form-data" >
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">

                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input name="name" class="form-control" type="text" placeholder="Feature Name" required="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Image</label>
                                        <div class="col-sm-9">
                                            <input name="image" class="form-control" type="file"
                                                   placeholder="Product Thumbnail" required="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-sm-9 offset-sm-3">
                                <button class="btn btn-primary" type="submit">Save</button>
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
@endsection
