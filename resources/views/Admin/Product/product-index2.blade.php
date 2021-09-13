@extends('Admin.layouts.base')

@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Products</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard">                                       <i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item">Products</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus"></i> Add Product</button>
                            {{--                            <button class="btn btn-primary" type="button" ><i class="fa fa-plus"></i>Attributes</button>--}}
                        </div>
                        <div class="card-block row">
                            <div class="col-sm-12 col-lg-12 col-xl-12">
                                <div class="table-responsive">
                                    <table class="table table-styling" id="product-table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th class="w-25" scope="col">Name</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="category_table_body">
                                        @foreach($products as $p)
                                            <tr id="{{$p->id}}">
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td >{{$p->name}}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-outline-info" type="button" href="/admin/categories/{{$p->id}}/attributes" title="">Attributes</a>
                                                    <a class="btn btn-sm btn-outline-success" type="button"  onclick="category_edit_function({{$p}})">Edit</a>
                                                    <a class="btn btn-sm btn-outline-secondary" type="button"   onclick="delete_confirmation({{$p->id}})" >Delete</a>
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

    {{-- Edit Modal--}}
    <div class="modal bounceIn animated" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Product</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <form id="product_form">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-2">
                            <div class="col-form-label">Select Category</div>
                            <select name="category_name" id="category_dd" class="form-control form-control-primary-fill btn-square">
                                <option value="opt1" selected disabled>Select One Value Only</option>
                                @foreach($categories as $c)
                                    <option value={{ $c->id }} >{{ $c->name }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" value="test" name="good">
                        </div>
                        <div class="mb-2">
                            <div class="col-form-label">Select Sub-Category</div>
                            <select class="form-control form-control-primary-fill btn-square" name="select">
                                <option value="opt1">Select One Value Only</option>
                                <option value="opt2">Type 2</option>
                            </select>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input class="form-control" type="text" placeholder="Enter Product Name" name="name"/>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        {{--                    <button class="btn btn-danger" type="button">close</button>--}}
                        <button class="btn btn-primary" type="submit">Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal bounceIn animated" id="category-edit-modal" tabindex="-1" role="dialog" aria-labelledby="category-edit-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                {{--                <form id="category-edit-form">--}}
                {{--                    @csrf--}}
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input class="form-control" id="edit_input_name" type="text" placeholder="Enter Category Name" name="name" value=""/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" id="category-edit-form-submit-button">Update</button>
                </div>
                {{--                </form>--}}

            </div>
        </div>
    </div>

    {{-- Delete Modal--}}
    <div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group text-center row">
                        <div class="col-sm-6">
                            <button class="btn btn-primary"  id="modal_cancel_button" type="button">Cancel</button>
                        </div>
                        <div class="col-sm-6">
                            <button class="btn btn-danger" id="modal_submit_button" type="button">Delete</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    {{--    script for adding categories--}}
    <script>

        var number_of_rows = $("#product-table tr").length;

        $('#product_form').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                    type : 'POST',
                    url : "{{ Route('products.store') }}",
                    data : $(this).serialize(),
                    success :function(data){
                        $("#exampleModalCenter").modal('hide');
                        $("#product_form").trigger('reset');
                        // $("#product_table_body").append("<tr id="+ data.product.id +"><th scope='row'>"+ number_of_rows++ +"</th><td >"+ data.product.name +"</td><td><a class='btn btn-sm btn-outline-primary' type='button' href='/admin/products/"+ data.category.id +"/sub-categories' >Sub Category</a> <a class='btn btn-sm btn-outline-info' type='button' href='/admin/categories/"+ data.category.id +"/attributes' >Attributes</a> <a class='btn btn-sm btn-outline-success' type='button'  data-toggle='modal' data-target='#exampleModalCenter'>Edit</a> <a class='btn btn-sm btn-outline-secondary' type='button'   onclick='delete_confirmation("+ data.category.id +")' >Delete</a></td></tr>");
                    }
                }
            );
        });




@endsection


