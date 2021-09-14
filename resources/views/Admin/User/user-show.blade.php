@extends('Admin.layouts.base')

@section('content')
<div class="page-body-wrapper sidebar-icon">

    <!-- Page Sidebar Ends-->
    <div class="page-body">
      <div class="container-fluid">
        <div class="page-title">
          <div class="row">
            <div class="col-6">
              <h3>Users Details</h3>
            </div>
            <div class="col-6">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                <li class="breadcrumb-item">Apps</li>
                <li class="breadcrumb-item active">Users</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- Container-fluid starts-->
      <div class="container-fluid">
        <div class="email-wrap bookmark-wrap">
          <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex">
                        <h5> Personal Info</h5>
                    </div>
                    <div class="card-body ">
                    <div class="row list-persons" id="addcon">

                    <div class="col-xl-12 col-md-12">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane contact-tab-0 tab-content-child fade show active" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab">
                            <div class="profile-mail">
                                <div class="media"><img class="img-100 img-fluid m-r-20 rounded-circle update_img_0" src="{{asset('Assets/Admin/images/user/2.png')}}" alt="">

                                <div class="media-body">
                                    <h5><span class="first_name_0">{{ $user['name'] }} </span></h5>
                                    <p class="email_add_0 mt-4">{{ $user['email'] }} </p>
                                </div>
                                </div>
                                <div class="email-general">
                                <h6 class="mb-3">General</h6>
                                <ul>
                                    <li>First Name <span class="font-primary first_name_0">{{ $user['first_name'] }} </span></li>
                                    <li>Last Name <span class="font-primary first_name_0">{{ $user['last_name'] }} </span></li>
                                    <li>Gender <span class="font-primary">{{ $user['gender'] }}</span></li>
                                    <li>Birthday<span class="font-primary"> <span ></span>{{ $user['dob'] }}</span></li>
                                    <li>Mobile No<span class="font-primary mobile_num_0">{{ $user['mobile_number']}} </span></li>
                                    <li>Email Address <span class="font-primary email_add_0">{{ $user['email'] }} </span></li>
                                </ul>

                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

          </div>
          <div class="row">
              <div class="col-md-6">
                  <div class="card">
                      <div class="card-header d-flex">
                          <h5>Address</h5>
                      </div>
                      <div class="card-body ">
                          <div class="row list-persons" id="addcon">

                              <div class="col-xl-12 col-md-12">
                                  <div class="tab-content" id="v-pills-tabContent">

                                      <div class="profile-mail">
                                          <div class="email-general pt-0">
                                              <h6 class="mb-3">Home Address</h6>
                                              <ul>
                                                  <li>Line 1 <span class="font-primary first_name_0">{{ $user->Address['0']->line_1}} </span></li>
                                                  <li>Line 2 <span class="font-primary">{{ $user->Address['0']->line_2}} </span></li>
                                                  <li>City<span class="font-primary"> <span class="birth_day_0">{{ $user->Address['0']->city}} </span>
                                                  <li>State<span class="font-primary personality_0">{{ $user->Address['0']->state}} </span></li>
                                                  <li>Pincode<span class="font-primary city_0">{{ $user->Address['0']->pincode}} </span></li>
                                                  <li>Country<span class="font-primary mobile_num_0">{{ $user->Address['0']->country}} </span></li>
                                              </ul>

                                          </div>
                                      </div>

                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
            <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Order History</h5>
                    </div>
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                <table class="table table-styling" id="coupon-table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="coupon_table_body">
                                    @foreach($orders as $order)

                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td >{{ $order->order_number}}</td>

                                            <td >&#x20B9;{{ $order->Payment->amount }}</td>
                                            <td >{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
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
                                            <td>
                                                <a class="btn btn-sm btn-outline-success"  href="/admin/orders/{{$order->id}}" type="button">Details</a>
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
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
@endsection
