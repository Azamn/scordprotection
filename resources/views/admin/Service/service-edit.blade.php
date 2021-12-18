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
                            <li class="breadcrumb-item"><a href="{{ route('list-service') }}"> Service</a></li>
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
                            <h5>Service Edit</h5>
                        </div>
                        <form class="form theme-form needs-validation"  action="" novalidate="">
                            @csrf
                            {{-- @method('PUT') --}}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" id="name" class="form-control"  value="{{ $serviceData['name'] }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" name="description" id="description" class="form-control" >{{ $serviceData['description'] }}</textarea>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Image</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="file" data-bs-original-title="" title="">
                                            </div>
                                        </div> --}}

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-sm-9">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                    <button class="btn btn-primary m-2" href="{{ route('list-service')}}">Cancel</button>

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



    </script>


@endsection
