@extends('Admin.layouts.base')

@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Recent Orders</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Ecommerce</li>
                            <li class="breadcrumb-item active"> Recent Orders</li>
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
                            <h5>New Orders</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($orders as $o)
                                    @if($o->status == 101)
                                        <div class="col-xl-4 col-md-6">
                                            <div class="prooduct-details-box">
                                                <div class="media"><img class="align-self-center img-fluid img-60"
                                                                        src="{{asset('Assets/Admin/images/ecommerce/product-table-6.png')}}"
                                                                        alt="#">
                                                    <div class="media-body ml-3">
                                                        <div class="product-name">
                                                            <h6><a href="#">{{$o->User['first_name']}} {{$o->User['last_name']}}</a></h6>
                                                        </div>
                                                        <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                                class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                                class="fa fa-star"></i></div>
                                                        <div class="price d-flex">
                                                            <div class="text-muted mr-2">Price</div>
                                                            : {{$o->Payment['amount']}}$
                                                        </div>

                                                        <a class="btn btn-primary btn-xs" href="/admin/orders/{{$o->id}}">Process</a><i class="close" data-feather="x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>Shipped Orders</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($orders as $o)
                                    @if($o->status == 103)
                                        <div class="col-xl-4 col-md-6">
                                            <div class="prooduct-details-box">
                                                <div class="media"><img class="align-self-center img-fluid img-60"
                                                                        src="{{asset('Assets/Admin/images/ecommerce/product-table-6.png')}}"
                                                                        alt="#">
                                                    <div class="media-body ml-3">
                                                        <div class="product-name">
                                                            <h6><a href="#">{{$o->User['first_name']}} {{$o->User['last_name']}}</a></h6>
                                                        </div>
                                                        <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                                class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                                class="fa fa-star"></i></div>
                                                        <div class="price d-flex">
                                                            <div class="text-muted mr-2">Price</div>
                                                            : {{$o->Payment['amount']}}$
                                                        </div>

                                                        <a class="btn btn-success btn-xs" href="/admin/orders/{{$o->id}}">Shipped</a><i class="close"
                                                                                                                  data-feather="x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h5>Cancelled Orders</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($orders as $o)
                                    @if($o->status == 100)
                                        <div class="col-xl-4 col-md-6">
                                            <div class="prooduct-details-box">
                                                <div class="media"><img class="align-self-center img-fluid img-60"
                                                                        src="{{asset('Assets/Admin/images/ecommerce/product-table-6.png')}}" alt="#">
                                                    <div class="media-body ml-3">
                                                        <div class="product-name">
                                                            <h6><a href="#">{{$o->User['first_name']}} {{$o->User['last_name']}}</a></h6>
                                                        </div>
                                                        <div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                                class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                                class="fa fa-star"></i></div>
                                                        <div class="price d-flex">
                                                            <div class="text-muted mr-2">Price</div>
                                                            : {{$o->Payment['amount']}}$
                                                        </div>

                                                        <a class="btn btn-danger btn-xs" href="/admin/orders/{{$o->id}}">Cancelled</a><i class="close"
                                                                                                                 data-feather="x"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Datatable order history</h5>
                        </div>
                        <div class="card-body">
                            <div class="order-history">
                                <table class="table table-bordernone display" id="basic-1">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">User name</th>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->User['first_name'] }} {{ $order->User['last_name'] }}</td>
                                            <td>{{ $order->order_number }}</td>
                                            <td>&#x20B9;{{ $order->Payment['amount'] }}</td>
                                            <td>{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                                            <td>
                                                @if($order->status == 100)
                                                    <span class="badge badge-pill badge-danger">Cancelled</span>
                                                @elseif($order->status == 101)
                                                    <span class="badge badge-pill badge-primary">Processing</span>
                                                @elseif($order->status == 102)
                                                    <span class="badge badge-pill badge-warning">Confirmed</span>

                                                @elseif($order->status == 103)
                                                    <span class="badge badge-pill badge-info">Shipped</span>
                                                @elseif($order->status == 104)
                                                    <span class="badge badge-pill badge-success">Delivered</span>
                                                @endif


                                            </td>
                                            <td><a href="/admin/orders/{{$order->id}}" class="btn btn-light btn-sm">Details</a>
                                            </td>

                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
