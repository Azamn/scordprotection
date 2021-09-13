@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Coupons</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">                                       <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/coupons">Coupon</a></li>
                            <li class="breadcrumb-item">Edit</li>
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
                                        <form class="needs-validation" novalidate="" action="{{ Route('coupons.update',$coupon['id']) }}" method="POST">
                                            @csrf
                                            @method("PUT")
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="validationCustom01">Coupon Code</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" id="validationCustom01" type="text" placeholder="Coupon Code" required="" name="name" value="{{ $coupon['name'] }}">
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="validationCustom02">Discount (%)</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" id="validationCustom02" type="number" placeholder="Discount in percent" required="" name="discount" value="{{ $coupon['discount'] }}">
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="validationCustom03">Max Discount</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" id="validationCustom03" type="number" placeholder="Maximum Discount" required="" name="max_discount" value="{{ $coupon['max_discount'] }}">
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="validationCustom03">Expiry Date</label>
                                                        <div class="col-sm-9">
                                                            <input class="datepicker-here form-control" id="validationCustom03" type="date" data-language="en" required="" name="expiry_date" value="{{ $coupon['expiry_date'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="validationCustom05">Min Amount</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" id="validationCustom05" type="number" placeholder="Minimum Amount" required="" name="minimum_amount" value="{{ $coupon['minimum_amount'] }}">
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-3" for="validationCustom06">Limit (per user)</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" id="validationCustom06" type="number" placeholder="Limit per user" required="" name="limit_per_user" value="{{ $coupon['limit_per_user'] }}">
                                                            <div class="valid-feedback">Looks good!</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <label class="col-sm-3 col-form-label">Description (optional)</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="3" cols="5" placeholder="Description" name="description">{{ $coupon['description'] }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary mt-3 float-right" type="submit">Save Changes</button>
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


