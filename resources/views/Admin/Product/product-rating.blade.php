@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>{{ $product->name }}</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/products">Products</a></li>
                            <li class="breadcrumb-item active">Rating</li>
                            {{--              <li class="breadcrumb-item active">Product list</li>--}}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                     <h2>{{ $star }} <i data-feather="star"></i></h2>
                    <br>
                    <h6>Total Ratings : {{ $star_count }}</h6>
                    <h6>Total Reviews : {{ $reviews_count }}</h6>
                </div>

            </div>
            @foreach($reviews as $r)
            <div class="card b-r-0">
                <div class="card-body">
                    <h6> <span class="badge badge-pill badge-success">{{ $r->star }} <i data-feather="star"></i></span> {{$r->title}} </h6>
                    <p class="mb-0">{{$r->description}}</p>
                    <div class="mt-3">
                        @if($r->User)
                            <span  style="color: grey;">{{$r->User['first_name']}} {{$r->User['last_name']}}</span>
                        @endif
                            <span  style="color: grey; float: right">{{ date('d-m-Y, h:i A', strtotime($r->created_at)) }}</span>
                    </div>
                </div>
            </div>
                @endforeach

        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
@section('js')
    <script>

    </script>
@endsection
