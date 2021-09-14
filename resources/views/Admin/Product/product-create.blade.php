@extends('Admin.layouts.base')

@section('content')

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6">
                        <h3>Product</h3>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/products"> Products</a></li>
                            <li class="breadcrumb-item active">Create</li>
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
                            <h5>Product Details</h5>
                        </div>
                        <form method="post" action="{{ route('products.store') }}"
                              class="form theme-form needs-validatio" novalidate="" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Thumbnail</label>
                                            <div class="col-sm-9">
                                                <input name="thumbnail" class="form-control" type="file"
                                                       placeholder="Product Thumbnail" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input name="name" class="form-control" type="text"
                                                       placeholder="Product Name" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">MRP</label>
                                            <div class="col-sm-9">
                                                <input name="mrp" class="form-control" type="number" placeholder="MRP"
                                                       required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Cut MRP</label>
                                            <div class="col-sm-9">
                                                <input name="cut_mrp" class="form-control" type="number"
                                                       placeholder="Cut MRP" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Description (optional)</label>
                                            <div class="col-sm-9">
                                                <textarea name="description" class="form-control" rows="5" cols="5"
                                                          placeholder="Desc"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Quantity In Stock</label>
                                            <div class="col-sm-9">
                                                <input name="quantity" class="form-control" type="number"
                                                       placeholder="Quantity" required="">
                                            </div>
                                        </div>


                                        <div class="form-group row ">
                                            <label class="col-sm-3 col-form-label">Category</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" onchange="new_function()"
                                                        id="choose-category"
                                                        name="category_id" required="">
                                                    <option disabled value="" selected>Select Category</option>
                                                    @foreach($categories as $c)
                                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Sub Category</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" id="choose-subcategory"
                                                        name="subcategory_id" required="">
                                                    <option disabled value="" selected>Select Sub Category</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="col" id="attributes">
                                                {{--                                                  Attributes using ajax                              --}}
                                            </div>
                                        </div>

                                        
                                        <div class="mb-2">
                                            <div class="col-form-label">Add Tags</div>
                                            <select class="js-example-basic-multiple col-sm-12" multiple="multiple" name="tags[]">
                                                @foreach($tags as $t)
                                                    <option value="{{ $t->id }}">{{ $t->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>



                                        <div class="image-container mt-5">
                                            <label class="col-sm-3 col-form-label">Product Images</label>

                                            <div class="input-group control-group increment">
                                                <input type="file" name="product_image[]" class="form-control">
                                                <div class="input-group-btn">
                                                    <button class="btn btn-success ml-2" type="button"><i
                                                            data-feather=""></i>Add
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="clone d-none">
                                                <div class="control-group input-group" style="margin-top:10px">
                                                    <input type="file" name="product_image[]" class="form-control">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-danger ml-2" type="button"><i
                                                                data-feather=""></i> Remove
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-sm-9 offset-sm-3">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                    <button class="btn btn-light" type="submit">Cancel</button>
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
        $(".btn-success").click(function () {
            var html = $(".clone").html();
            $(".increment").after(html);
        });

        $("body").on("click", ".btn-danger", function () {
            $(this).parents(".control-group").remove();
        });

        function new_function() {
            var category_id = $('#choose-category').val();
            $.ajax({
                type: "POST",
                url: "{{ Route('choose.category') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "category_id": category_id,
                },
                success: function (data) {
                    // console.log(data.sub_categories);
                    $('#choose-subcategory').empty();
                    $('#choose-subcategory').append("<option disabled value='' selected >Select Sub Category</option>");
                    for (i = 0; i < data.sub_categories.length; i++) {
                        $('#choose-subcategory').append("<option value=" + data.sub_categories[i].id + ">" + data.sub_categories[i].name + "</option>\n")
                    }

                    $("#attributes").empty();
                    for (i = 0; i < data.attributes.length; i++) {
                        $('#attributes').append("<div class='form-group row'><label class='col-sm-3 col-form-label'>" + data.attributes[i].attribute_name + "</label><div class='col-sm-9'><input class='form-control' type='text' required='' placeholder='Attribute Value' name='attributes[" + data.attributes[i].attribute_name + "]' ></div></div>")
                    }
                },
                error: function (data) {

                }
            });
        }
    </script>
@endsection
