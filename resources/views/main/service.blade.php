@extends('layouts.base')

@section('content')
<div class="body-inner">

    <section class="background-colored">
        <div id="particles-dots" class="particles"></div>
        <div class="container">
            <div class="heading-text text-light text-center">
                <strong>
                    <h4>OUR SERVICES</h4>
                </strong>

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
