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
                                                    <div class="col-sm-12">
{{--                                                        <img class="img-fluid w-100" src="{{ asset('images/Admin/images/blog/'.$blog['image']) }}" alt="blog-image">--}}
                                                        @if($blog->getFirstMedia('blog-image'))
                                                            <img class="img-fluid w-100" src="{{ $blog->getFirstMedia('blog-image')->getUrl()}}" alt="blog-image">
                                                        @else
                                                            <img class="img-fluid w-100" src="{{asset('Assets/Customer/images/blog/12.jpg')}}" alt="blog-image">
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3" for="validationCustom01">Title</label>
                                                    <div class="col-sm-9">
                                                        <div>{{ $blog['title'] }}</div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-3">Category</label>
                                                    <div class="col-sm-9">
                                                        <div>{{ $blog['category'] }}</div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-3">Created At</label>
                                                    <div class="col-sm-9">
                                                        <div>{{ date('d-m-Y , h:i A',strtotime($blog['created_at'])) }}</div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3">Updated At</label>
                                                    <div class="col-sm-9">
                                                        <div>{{ date('d-m-Y , h:i A',strtotime($blog['updated_at'])) }}</div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-0">
                                                    <label class="col-sm-3 col-form-label">Content</label>
                                                    <div class="col-sm-9">
                                                        <div>{{ $blog['content'] }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-primary mt-3 float-right" href="/admin/blogs/{{$blog['id']}}/edit">Edit</a>
                                        <a class="btn btn-success mt-3 float-left" href="/admin/blogs/">back</a>
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


