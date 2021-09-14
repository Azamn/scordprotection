@extends('Admin.layouts.base')

@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Tag Edit</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/tags"> Tags</a></li>
                            <li class="breadcrumb-item active">Edit</li>
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
                            <h5>{{ $tag['name'] }}</h5>
                        </div>
                        <form class="form theme-form needs-validation"  action="{{Route('tags.update',$tag['id'])}}" novalidate="" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Tag Name"
                                                       value="{{$tag['name']}}" name="name" required="">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-sm-9 offset-sm-3">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                    <button class="btn btn-light" >Cancel</button>

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
