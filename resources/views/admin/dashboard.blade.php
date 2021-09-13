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
                    <div class="col-xl-6 box-col-6 col-md-6">
                        <div class="card o-hidden">
                            <div class="card-header card-no-border">
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="fa fa-spin fa-cog"></i></li>
                                        
                                    </ul>
                                </div>
                                <div class="media">
                                    <div class="media-body">
                                        <p><span class="f-w-500 font-roboto">Total sale</span><span
                                                class="f-w-700 font-primary ml-2">Today</span></p>
                                        <h4 class="f-w-500 mb-0 f-26">$<span class="counter">3000.56</span></h4>
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
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="fa fa-spin fa-cog"></i></li>
                                        <li><i class="view-html fa fa-code"></i></li>
                                        <li><i class="icofont icofont-maximize full-card"></i></li>
                                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                                        <li><i class="icofont icofont-error close-card"></i></li>
                                    </ul>
                                </div>
                                <div class="media">
                                    <div class="media-body">
                                        <p><span class="f-w-500 font-roboto">Today Total visits</span><span
                                                class="f-w-700 font-primary ml-2">35.00%</span></p>
                                        <h4 class="f-w-500 mb-0 f-26 counter">9,050</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="monthly-visit">
                                    <div id="column-chart"></div>
                                </div>
                                <div class="code-box-copy">
                                    <button class="code-box-copy__btn btn-clipboard"
                                        data-clipboard-target="#example-head1" title="Copy"><i
                                            class="icofont icofont-copy-alt"></i></button>
                                   
                                            
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 box-col-6 col-lg-12 col-md-6">
                        <div class="card o-hidden">
                            <div class="card-body">
                                <div class="ecommerce-widgets media">
                                    <div class="media-body">
                                        <p class="f-w-500 font-roboto">Our Sale Value<span
                                                class="badge pill-badge-primary ml-3">New</span></p>
                                        <h4 class="f-w-500 mb-0 f-26">$<span class="counter">7454.25</span></h4>
                                    </div>
                                    <div class="ecommerce-box light-bg-primary"><i class="fa fa-heart"
                                            aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 box-col-6 col-lg-12 col-md-6">
                        <div class="card o-hidden">
                            <div class="card-body">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="f-w-500 font-roboto">Today Stock value<span
                                                class="badge pill-badge-primary ml-3">Hot</span></p>
                                        <div class="progress-box">
                                            <h4 class="f-w-500 mb-0 f-26">$<span class="counter">9000.04</span></h4>
                                            <div
                                                class="progress sm-progress-bar progress-animate app-right d-flex justify-content-end">
                                                <div class="progress-gradient-primary" role="progressbar"
                                                    style="width: 35%" aria-valuenow="75" aria-valuemin="0"
                                                    aria-valuemax="100"><span class="font-primary">88%</span><span
                                                        class="animate-circle"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 box-col-12 xl-50">
                <div class="card o-hidden dash-chart">
                    <div class="card-header card-no-border">
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="fa fa-spin fa-cog"></i></li>
                                
                            </ul>
                        </div>
                        <div class="media">
                            <div class="media-body">
                                <p><span class="f-w-500 font-roboto">Total Profit</span><span
                                        class="font-primary f-w-700 ml-2">99.00%</span></p>
                                <h4 class="f-w-500 mb-0 f-26">$<span class="counter">3000.56</span></h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="negative-container">
                            <div id="negative-chart"></div>
                        </div>
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head2"
                                title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                            
                                
                        </div>
                    </div>
                </div>
            </div>


          <div class="col-xl-8 xl-100 box-col-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="best-seller-table responsive-tbl">
                                <div class="item">
                                    <div class="table-responsive product-list">
                                        <table class="table table-bordernone">
                                            <thead>
                                             <h4>Latest Order</h4>
                                                <tr>
                                                    <th>Customer Name</th>
                                                    <th>Date</th>
                                                    <th>Product</th>
                                                    <th>City</th>
                                                    <th>Total</th>
                                                    <th class="text-right">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-inline-block align-middle"><img
                                                                class="img-40 m-r-15 rounded-circle align-top"
                                                                src="../assets/images/avtar/7.jpg" alt="">
                                                            <div class="status-circle bg-primary"></div>
                                                            <div class="d-inline-block"><span>John keter</span>
                                                                <p class="font-roboto"></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>06 August</td>
                                                    <td>CAP</td>
                                                    <td>Mumbai</td>
                                                    <td> <span class="label">$5,08,652</span></td>
                                                    <td class="text-right"><i class="fa fa-check-circle"></i>Done
                                                    </td>
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

            <div class="col-xl-4 xl-50 box-col-12">
                <div class="card">
                    <div class="card-header card-no-border">
                        <h5>New Product</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="fa fa-spin fa-cog"></i></li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="our-product">
                            <div class="table-responsive">
                                <table class="table table-bordernone">
                                    <thead>
                                           <tr>
                                               <th>Product Name</th>
                                               <th>Category</th>
                                               <th>Price</th>
                                               
                                           </tr>
                                       </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                               <span>Hike Shoes</span> 
                                            </td>
                                            <td>
                                                <span>PIX001</span>
                                            </td>
                                            <td>
                                               <span>$99.00</span>
                                            </td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="code-box-copy">
                            <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head3"
                                title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                            <pre></pre>
                        </div>
                    </div>
                </div>
            </div>

           
           
            
            
           
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection
