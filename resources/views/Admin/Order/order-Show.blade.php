@extends('Admin.layouts.base')

@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Order Details</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Ecommerce</li>
                            <li class="breadcrumb-item active">Order</li>
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
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Date : {{ date('d-m-Y', strtotime($order['created_at'])) }} </h5>
                                    <br>
                                    <h5>Order ID : #{{$order['order_number']}}</h5>
                                </div>
                                <div class="col-md-6">
                                    @if($order->status == 100)
                                        <h5 class="text-md-right text-danger">Cancelled</h5>
                                    @elseif($order->status == 101)
                                        <h5 class="text-md-right text-primary">processing</h5>
                                    @elseif($order->status == 102)
                                        <h5 class="text-md-right text-success">Confirmed</h5>
                                    @elseif($order->status == 103)
                                        <h5 class="text-md-right text-secondary">Shipped</h5>
                                    @elseif($order->status == 104)
                                        <h5 class="text-md-right text-success">Delivered</h5>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="media">
                                        <div class="media-left"><img class="media-object rounded-circle img-60"
                                                                     src="{{asset('Assets/Admin/images/user/1.jpg')}}"
                                                                     alt=""></div>
                                        <div class="media-body m-l-20">
                                            <h4 class="media-heading">{{$order->User->first_name}} {{$order->User->last_name}}</h4>
                                            <p>{{$order->User->email}}<br><span>{{$order->User->mobile_number}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="text-md-right" id="project">
                                        <h5 class="text-primary md-5">Address</h5>
                                        <p>{{$order['line_1']}}<br>{{$order['line_2']}}
                                            <br>{{$order['city']}}, {{$order['state']}}
                                            , {{$order['pincode']}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="order-history table-responsive wishlist">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($order->OrderDetail as $od)
                                            <tr>
                                                <td>
                                                    @if($od->Product->getFirstMedia('product-thumbnail'))
                                                        <img class="img-fluid img-60" style="height: 40px;width: 60px" src="{{ $od->Product->getFirstMedia('product-thumbnail')->getUrl('thumbnail') }}" alt="#">
                                                    @else
                                                        <img class="img-fluid img-40" style="height: 40px;width: 60px" src="{{asset('Assets/Admin/images/product/1.png')}}" alt="#">
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="product-name"><a href="#">{{$od->Product->name}}</a>
                                                    </div>
                                                </td>
                                                <td>&#x20B9;{{$od->Product->mrp}}</td>
                                                <td>
                                                    {{$od->quantity}}
                                                </td>
                                                <td><i data-feather="x-circle"></i></td>
                                                <td>&#x20B9;{{$od->Product->mrp * $od->quantity}}</td>
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td colspan="4">

                                            </td>
                                            <td class="total-amount">
                                                <h6 class="m-0 text-right"><span class="f-w-600">Total Price </span>
                                                </h6>
                                            </td>
                                            <td><span>&#x20B9;{{$order['grand_total']}}  </span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5">
                                                <h6 class="m-0 text-right">
                                                    <span class="f-w-600">Payment Transaction ID</span>
                                                </h6>
                                            </td>
                                            <td><span>{{$order->Payment->payment_id}} </span></td>
                                        </tr>

                                        @if($order->tracking_link == null)
                                        <form method="POST" action="{{ route('order.successful') }}">
                                            @csrf
                                            <tr>
                                                <td colspan="5">
                                                    <h6 class="m-0 text-right">
                                                        <span class="f-w-600">Tracking ID</span>
                                                    </h6>
                                                </td>
                                                <td>
                                                    @if($order->status == 102)
                                                        <input id='tracking_id' type="text" placeholder="Enter Tracking ID" required="" name="tracking_id" class="form-control">
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5">
                                                    <h6 class="m-0 text-right">
                                                        <span class="f-w-600">Tracking Link</span>
                                                    </h6>
                                                </td>
                                                <td>
                                                    @if($order->status == 102)
                                                        <input id='tracking_link' type="text" placeholder="Enter Tracking Link" required="" name="tracking_link" class="form-control">
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5">
                                                    <h6 class="m-0 text-right">
                                                        <span class="f-w-600">Delivery Method</span>
                                                    </h6>
                                                </td>
                                                <td>
                                                    @if($order->status == 102)
                                                        <input id='delivery_method' type="text" placeholder="Enter Delivery Method" required="" name="delivery_method" class="form-control">
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5"></td>
                                                <td>
                                                    @if($order->status == 102)
                                                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                        <button class="btn btn-success cart-btn-transform"
                                                                type="submit">Ship Order
                                                        </button>
                                                    @endif
                                                </td>
                                            </tr>
                                        </form>
                                        @else
                                                <tr>
                                                    <td colspan="5">
                                                        <h6 class="m-0 text-right">
                                                            <span class="f-w-600">Tracking ID</span>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                            <span>{{$order->tracking_id}} </span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <h6 class="m-0 text-right">
                                                            <span class="f-w-600">Tracking Link</span>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                            <span>{{$order->tracking_link}} </span>
                                                            <a href="#">Edit</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5">
                                                        <h6 class="m-0 text-right">
                                                            <span class="f-w-600">Delivery Method</span>
                                                        </h6>
                                                    </td>
                                                    <td>
                                                            <span>{{$order->delivery_method}} </span>
                                                    </td>
                                                    </tr>
                                                <tr>
                                                    <td colspan="5"></td>

                                                    @if($order->status == 103)
                                                        <td>
                                                            <button class="btn btn-secondary cart-btn-transform"
                                                                onclick="confirm_delivered({{$order->id}})">Confirm Delivered
                                                            </button>
                                                        </td>
                                                    @endif
                                                </tr>
                                        @endif

                                    <tr>
                                            <td colspan="5"></td>
                                           <td>
                                               @if($order->status == 101)
                                               <button class="btn btn-success cart-btn-transform"
                                                       onclick="confirm_order({{$order->id}})">Confirm Order
                                            </button>
                                            @endif
{{--                                                    @elseif($order->status == 102)--}}
{{--                                                    <button class="btn btn-secondary cart-btn-transform"--}}
{{--                                                            onclick="confirm_shipped({{$order->id}})">Submit--}}
{{--                                                    </button>--}}
{{--                                                    @elseif($order->status == 103)--}}
{{--                                                    <button class="btn btn-secondary cart-btn-transform"--}}
{{--                                                            onclick="confirm_delivered({{$order->id}})">Confirm Delivered--}}
{{--                                                    </button>--}}
                                                   
{{--                                            </td>--}}
                                        </tr>
                                        </tbody>
                                    </table>
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
    <script>
        function confirm_order(id){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                // icon: 'warning',
                showCancelButton: true,
                allowOutsideClick : false,
                cancelButtonColor: '#7366ff',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type : 'POST',
                        url  : "{{ Route('order.confirmed')}}",
                        data : {
                            "_token": "{{ csrf_token() }}",
                            "order_id" : id,
                        },
                        success : function (data) {
                            location.reload();
                            $.notify({
                                    // title:'Title',
                                    message:'Order Confirmed!'
                                },
                                {
                                    type:'success',
                                    allow_dismiss:false,
                                    newest_on_top:false ,
                                    mouse_over:false,
                                    showProgressbar:false,
                                    spacing:10,
                                    timer:500,
                                    placement:{
                                        from:'top',
                                        align:'right'
                                    },
                                    offset:{
                                        x:30,
                                        y:60
                                    },
                                    delay:500,
                                    z_index:10000,
                                    animate:{
                                        enter:'animated fadeIn',
                                        exit:'animated fadeOut'
                                    }
                                });
                        },
                        error  : function (data) {
                            alert('error');
                        }
                    });
                }
            });

        }

        function confirm_shipped(id){
            var t_id = $("#tracking_id").val();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                // icon: 'warning',
                showCancelButton: true,
                allowOutsideClick : false,
                cancelButtonColor: '#7366ff',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type : 'POST',
                        url  : "{{ Route('order.shipped')}}",
                        data : {
                            "_token": "{{ csrf_token() }}",
                            "order_id" : id,
                            "tracking_id" : t_id,
                        },
                        success : function (data) {
                            location.reload();
                            $.notify({
                                    message:'Order Shipped!'
                                },
                                {
                                    type:'success',
                                    allow_dismiss:false,
                                    newest_on_top:false ,
                                    mouse_over:false,
                                    showProgressbar:false,
                                    spacing:10,
                                    timer:500,
                                    placement:{
                                        from:'top',
                                        align:'right'
                                    },
                                    offset:{
                                        x:30,
                                        y:60
                                    },
                                    delay:500,
                                    z_index:10000,
                                    animate:{
                                        enter:'animated fadeIn',
                                        exit:'animated fadeOut'
                                    }
                                });
                        },
                        error  : function (data) {
                            alert('error');
                        }
                    });
                }
            });
        }

        function confirm_delivered(id){

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                // icon: 'warning',
                showCancelButton: true,
                allowOutsideClick : false,
                cancelButtonColor: '#7366ff',
                confirmButtonColor: '#d33',
                confirmButtonText: 'Confirm'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type : 'POST',
                        url  : "{{ Route('order.delivered')}}",
                        data : {
                            "_token": "{{ csrf_token() }}",
                            "order_id" : id,
                        },
                        success : function (data) {
                            location.reload();
                            $.notify({
                                    message:'Order Delivered!'
                                },
                                {
                                    type:'success',
                                    allow_dismiss:false,
                                    newest_on_top:false ,
                                    mouse_over:false,
                                    showProgressbar:false,
                                    spacing:10,
                                    timer:500,
                                    placement:{
                                        from:'top',
                                        align:'right'
                                    },
                                    offset:{
                                        x:30,
                                        y:60
                                    },
                                    delay:500,
                                    z_index:10000,
                                    animate:{
                                        enter:'animated fadeIn',
                                        exit:'animated fadeOut'
                                    }
                                });
                        },
                        error  : function (data) {
                            alert('error');
                        }
                    });
                }
            });
        }


    </script>
@endsection
