@extends('Admin.layouts.base')

@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Product Edit</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/products"> Products</a></li>
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
                            <h5>{{ $product['name'] }}</h5>
                        </div>
                        <form class="form theme-form needs-validation"  action="{{Route('products.update',$product['id'])}}" novalidate="" method="POST"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Thumbnail</label>
                                            <div class="col-sm-9">
                                                <input name="thumbnail" class="form-control" type="file" placeholder="Product Thumbnail">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" placeholder="Product Name"
                                                       value="{{$product['name']}}" name="name" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">MRP</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" placeholder="MRP"
                                                       value="{{$product['mrp']}}" name="mrp" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Cut MRP</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" placeholder="Cut MRP"
                                                       value="{{$product['cut_mrp']}}" name="cut_mrp" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Description</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" rows="5" cols="5" name="description"
                                                          placeholder="Description">{{$product['description']}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Quantity In Stock</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" placeholder="Quantity"
                                                       value="{{$product['quantity']}}" required="" name="quantity">
                                            </div>
                                        </div>


                                        <div class="form-group row ">
                                            <label class="col-sm-3 col-form-label">Category</label>
                                            <div class="col-sm-9">
                                                <select class="form-control " id="choose-category" required=""
                                                        name="category_id" onchange="new_function()">
                                                    <option value="{{$product['category_id']}}"
                                                            selected>{{$product->Category->name}}</option>
                                                    @foreach($categories as $c)
                                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Sub Category</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="choose-subcategory" required=""
                                                        name="subcategory_id">
                                                    <option value="{{$product['subcategory_id']}}"
                                                            selected>{{$product->SubCategory->name}}</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mt-5">
                                            <div class="col" id="attributes">
                                                @foreach($product->attributes as $key => $value)
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">{{$key}}</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="text"
                                                                   placeholder="Attribute Value" value="{{$value}}"
                                                                   name="attributes[{{$key}}]" required="">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-sm-9 offset-sm-3">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                    <button class="btn btn-light" >Cancel</button>

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
    <script>
        function new_function() {
            var category_id = $('#choose-category').val();
            $.ajax({
                type  : "POST",
                url   : "{{ Route('choose.category') }}",
                data  : {
                    "_token": "{{ csrf_token() }}",
                    "category_id" : category_id,
                },
                success : function(data){
                    // console.log(data.sub_categories);
                    $('#choose-subcategory').empty();
                    $('#choose-subcategory').append("<option disabled value='' selected >Select Sub Category</option>");
                    for (i = 0; i < data.sub_categories.length; i++) {
                        $('#choose-subcategory').append("<option value=" + data.sub_categories[i].id + ">" + data.sub_categories[i].name + "</option>\n")
                    }

                    $("#attributes").empty();
                    for (i = 0; i < data.attributes.length; i++){
                        $('#attributes').append("<div class='form-group row'><label class='col-sm-3 col-form-label'>"+ data.attributes[i].attribute_name +"</label><div class='col-sm-9'><input class='form-control' type='text' required='' placeholder='Attribute Value' name='attributes["+data.attributes[i].attribute_name+"]' ></div></div>")
                    }
                },
                error  : function(data){

                }
            });
        }
    </script>
@endsection
