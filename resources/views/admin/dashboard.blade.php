@extends('Admin.layouts.base')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-6">
                    <h3>Dashboard</h3>
                </div>
                <div class="col-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Ecommerce</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row size-column">

            <div class="col-xl-7 box-col-12 xl-100">
                <div class="row dash-chart">
                    <div class="col-xl-6 box-col-6 col-lg-12 col-md-6">
                        <div class="card o-hidden">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="f-w-900 font-roboto">Total Request<span
                                                class="badge pill-badge-primary ml-3">New</span></p>
                                        <div class="progress-box">
                                            <h4 class="f-w-900 mb-0 f-26"><span class="counter">50</span></h4>
                                            <div
                                                class="progress sm-progress-bar progress-animate app-right d-flex justify-content-end">
                                                <div class="progress-gradient-primary" role="progressbar"
                                                    style="width: 35%" aria-valuenow="75" aria-valuemin="0"
                                                    aria-valuemax="100"><span class="font-primary">50%</span><span
                                                        class="animate-circle"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 box-col-6 col-lg-12 col-md-6">
                        <div class="card o-hidden">
                            <div class="card-body">
                                <div class="ecommerce-widgets media">
                                    <div class="media-body">
                                        <p class="f-w-900 font-roboto" >Request Pending<span
                                                class="badge pill-badge-primary ml-3">Hot</span></p>
                                        <h4 class="f-w-900 mb-0 f-26"><span class="counter">25</span></h4>
                                    </div>
                                    <div class="ecommerce-box light-bg-primary"><i class="fa fa-heart"
                                            aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 box-col-6 col-md-6">
                        <div class="card o-hidden">
                            <div class="card-header card-no-border">
                                
                                <div class="media">
                                    <div class="media-body">
                                        <p><span class="f-w-900 font-roboto">Request Completed</span></p>
                                        <h4 class="f-w-900 mb-0 f-26"><span class="counter">25</span></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="media">
                                    <div class="media-body">
                                        <div class="profit-card">
                                            <div id="spaline-chart"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 box-col-6 col-md-6">
                        <div class="card o-hidden">
                            <div class="card-header card-no-border">
                               
                                <div class="media">
                                    <div class="media-body">
                                        <p><span class="f-w-900 font-roboto">Request </span></p>
                                        <h4 class="f-w-900 mb-0 f-26 counter">45</h4>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                
                </div>
            </div>
            <div class="col-xl-7 box-col-7 col-lg-12 col-md-7">
                <div class="card o-hidden">
                    <div class="card-body">
                        <div class="ecommerce-widgets media">
                            <div class="media-body">
                                <p class="f-w-900 font-roboto">Feedback<span
                                        class="badge pill-badge-primary ml-3">Hot</span></p>
                                <h4 class="f-w-900 mb-0 f-26"><span class="counter">25</span></h4>
                            </div>
                            <div class="ecommerce-box light-bg-primary"><i class="fa fa-heart"
                                    aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection
