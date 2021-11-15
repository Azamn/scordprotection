@extends('layouts.base')

@section('content')
<div class="body-inner">

    <section id="page-title" data-bg-parallax="{{{asset('images/scordimg/bg.jpg')}}}">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="page-title">
                <h1 class="text-uppercase text-medium">OUR SERVICES</h1>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">

                <div class="row">
                    <div class="col-lg-6">

                        <div class="heading-text heading-section">



                            <h2>{{ $serviceData['name'] }}</h2>

                        </div>

                        <div>
                            {{ $serviceData['description'] }}
                        </div>
                    </div>

                    <div class="col-lg-6 mt-10"><img src="{{ $serviceData['image_url']}}" width="100%" alt="Cannot show img"></div>
                </div>

            </div>
        </div>
    </section>

</div>

@endsection
