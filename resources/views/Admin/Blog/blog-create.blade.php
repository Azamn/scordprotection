@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Blog</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">                                       <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/blogs">Blog</a></li>
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
                                        <form class="needs-validation" novalidate="" action="{{ Route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="validationCustom0">Image</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" id="validationCustom0" type="file" required="" name="image">
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                    <label class="col-sm-3" for="validationCustom01">Title</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" id="validationCustom01" type="text" placeholder="Blog Title" required="" name="title">
                                                        <div class="valid-feedback">Looks good!</div>
                                                    </div>
                                                </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="validationCustom02">Category</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" id="validationCustom02" type="text" placeholder="Blog Category" required="" name="category">
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row mb-0">
                                                        <label class="col-sm-3 col-form-label">Content</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="3" cols="5" placeholder="Content" name="content"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary mt-3 float-right" type="submit">Add Blog</button>
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


