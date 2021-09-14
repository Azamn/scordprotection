@extends('Admin.layouts.base')

@section('content')


<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Product Page</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">
              <i data-feather="home"></i></a></li>
            <li class="breadcrumb-item"><a href="/admin/products"> Product </a></li>
            <li class="breadcrumb-item active">Details</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="row product-page-main">

      <div class="col-md-12">
        <div class="card">
            {{-- <img class="card-img-top" src="{{$product->getFirstMedia('product-thumbnail')->getUrl()}}" alt="Card image cap"> --}}
          <div class="card-body">
            <div class="product-page-details">
              <h3>{{$product['name']}}</h3>
            </div>
            <div class="product-price f-28"> ₹{{$product['mrp']}}
              <del> ₹{{$product['cut_mrp']}}</del>
            </div>

            <hr>
              <p>{{$product['description']}}</p>
            <hr>
            <div>
              <table class="product-page-width">
                <tbody>

                  <tr>
                    <td> <b>Quantity In Stock &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                      @if($product['quantity'] > 0)
                    <td class="txt-success">In stock</td>
                      @else
                          <td class="txt-danger">Out of stock</td>
                      @endif

                  </tr>

                  <tr>
                    <td> <b>Rating &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                    <td>4/5</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <hr>

            <div class="m-t-15">
              <a class="btn btn-sm btn-outline-primary" type="button" title="">Sub Category</a>
              <a class="btn btn-sm btn-outline-info" type="button" title="">Attributes</a>
              <a class="btn btn-sm btn-outline-success" type="button" href="/admin/products/{{$product['id']}}/edit" >Edit</a>
              <a class="btn btn-sm btn-outline-secondary" type="button"  >Delete</a>
              <a class="btn btn-sm btn-outline-warning" type="button" href="/admin/products/{{$product['id']}}/features"  >Features</a>
              <a class="btn btn-sm btn-outline-dark" type="button" href="/admin/products/{{$product['id']}}/instructions"  >Instruction</a>
              <a class="btn btn-sm btn-outline-primary" type="button" href="/admin/products/{{$product['id']}}/rating"  >Rating</a>
            </div>
          </div>
        </div>
      </div>






      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="product-slider owl-carousel owl-theme" id="sync1">
{{--              <div class="item"><img src="{{asset('Assets/Admin/images/ecommerce/01.jpg')}}" height="400" width="400" alt=""></div>--}}
              @foreach($product_images as $image)
                <div class="item"><img src="{{$image->getUrl()}}" height="400" width="400" alt=""></div>
              @endforeach
            </div>
            <div class="owl-carousel owl-theme" id="sync2">
{{--              <div class="item"><img src="{{asset('Assets/Admin/images/ecommerce/01.jpg')}}" alt=""></div>--}}
                @foreach($product_images as $image)
                     <div class="item"><img  src="{{$image->getUrl()}}" alt=""></div>
                @endforeach


            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="collection-filter-block">
              <h4>Attributes</h4>
              <div>
                <table class="product-page-width">
                  <tbody>
                  @foreach($product->attributes as $key => $value)
                    <tr>
                      <td> <b>{{$key}} &nbsp;&nbsp;&nbsp;:</b></td>
                      <td>&nbsp;&nbsp;&nbsp; {{$value}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- silde-bar colleps block end here-->
        </div>
        <div class="card">
          <div class="card-body">
            <!-- side-bar colleps block stat-->
            <div class="filter-block">
              <h4>Tags</h4>
              <ul>
                  @foreach($tags_name as $tag)
                      <li>{{ $tag->name }}</li>
                  @endforeach
              </ul>
            </div>
          </div>
        </div>

          <div class="card">
              <div class="card-body">
                  <!-- side-bar colleps block stat-->
                  <div class="filter-block">
                      <h4>Features</h4>
                      <ul>
                          @foreach($features_name as $feature)
                              <li>{{ $feature->name }}</li>
                          @endforeach
                      </ul>
                  </div>
              </div>
          </div>

          <div class="card">
              <div class="card-body">
                  <!-- side-bar colleps block stat-->
                  <div class="filter-block">
                      <h4>Washing Instructions</h4>
                      <ul>
                          @foreach($instructions_name as $instruction)
                              <li>{{ $instruction->name }}</li>
                          @endforeach
                      </ul>
                  </div>
              </div>
          </div>

      </div>
    </div>
    <div class="card">
      <div class="row product-page-main">
        <div class="col-sm-12">
          <ul class="nav nav-tabs border-tab mb-0" id="top-tab" role="tablist">
            <li class="nav-item"><a class="nav-link active" id="top-home-tab" data-toggle="tab" href="#top-home" role="tab" aria-controls="top-home" aria-selected="false">Febric</a>
              <div class="material-border"></div>
            </li>
            <li class="nav-item"><a class="nav-link" id="profile-top-tab" data-toggle="tab" href="#top-profile" role="tab" aria-controls="top-profile" aria-selected="false">Video</a>
              <div class="material-border"></div>
            </li>
            <li class="nav-item"><a class="nav-link" id="contact-top-tab" data-toggle="tab" href="#top-contact" role="tab" aria-controls="top-contact" aria-selected="true">Details</a>
              <div class="material-border"></div>
            </li>
            <li class="nav-item"><a class="nav-link" id="brand-top-tab" data-toggle="tab" href="#top-brand" role="tab" aria-controls="top-brand" aria-selected="true">Brand</a>
              <div class="material-border"></div>
            </li>
          </ul>
          <div class="tab-content" id="top-tabContent">
            <div class="tab-pane fade active show" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
              <p class="mb-0 m-t-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
              <p class="mb-0 m-t-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
            </div>
            <div class="tab-pane fade" id="top-profile" role="tabpanel" aria-labelledby="profile-top-tab">
              <p class="mb-0 m-t-20">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
            </div>
            <div class="tab-pane fade" id="top-contact" role="tabpanel" aria-labelledby="contact-top-tab">
              <p class="mb-0 m-t-20">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
            </div>
            <div class="tab-pane fade" id="top-brand" role="tabpanel" aria-labelledby="brand-top-tab">
              <p class="mb-0 m-t-20">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid Ends-->
</div>

@endsection
