@extends('layouts.base')

@section('content')
<style>
    .lineh2::before
    {
        background-color:white !important;
    }
</style>

<style>
    .image_full{
        background-image:url({{asset('images/background2.png')}});
       }



     @media (max-width: 640px) and (min-width: 320px){
       .image_full{
        background-image:url({{asset('images/backgroundMobile.png')}});
       }

     }

    </style>

<div class="body-inner">

    <!-- Inspiro Slider -->
    <div id="slider" class="inspiro-slider slider-fullscreen" data-height-xs="360">
        <!-- Slide 1 -->
        <div class="slide image_full">

            <div class="container">
                <div class="slide-captions">
                    <!-- Captions -->
                    {{-- <h2 class="text-light m-b-10">Pixel Perfection</h2>
                    <h4 class="m-b-40 text-light m-b-10">Set your goals high, and don't stop till you get there.</h4>
                    <a class="btn btn-light"><i class="fa fa-check"></i>Explore more</a> --}}
                    <!-- end: Captions -->
                </div>

            </div>
        </div>
        <!-- end: Slide 1 -->
    </div>
    <!--end: Inspiro Slider -->

    <!-- About us -->
    <section id="aboutus">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @foreach (@$aboutUsData as $about )

                    <div class="text-center heading-text heading-section">
                        <h2>{{ $about['title'] }}</h2>
                    </div>
                    <div>
                        {{ $about['description'] }}
                    </div>
                    @endforeach
                </div>


                <div class="col-lg-4">
                    <div class="call-to-action pt-2 call-to-action-dark">
                        <div class="m-t-30">
                            <form class="widget-contact-form" id="get-in-touch-form" novalidate role="form" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="m-0 text-center text-white heading-text heading-section">
                                        <h2 class="mb-5">Request a call back</h2>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="name" class="text-white">Name</label>
                                        <input type="text" aria-required="true" id="name" name="name" required
                                            class="form-control required name" placeholder="Enter your Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="subject" class="text-white">Phone Number</label>
                                        <input type="text" id="contact" name="contact" required
                                            class="form-control required" placeholder="Enter your Phone Number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message" class="text-white">Message</label>
                                    <textarea type="text" id="message" name="message" required rows="5"
                                        class="form-control required" placeholder="Enter your Message"></textarea>
                                </div>

                                <button class="btn btn-primary" onclick="requestCallBack()"  id="form-submit"><i class="fa fa-paper-plane"></i>&nbsp;Send message</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </section>
    <!-- end: About us -->

    <!-- SERVICES -->
    <section class="background" style="background-color: #07a8c9">
        <div class="container text-white">
            <div class="text-center heading-text heading-section" >
                <h2 class="lineh2"> Our Featured Security Services </h2>
                <div><b>Protection security group propose to respond to all requirements by providing on a twenty-four hour, seven-days week basis, a competent and uniformed guard force to accomplish the requirements of the client.</b></div>
            </div>
            <div class="row">
                @foreach (@$servicesData as $service)
                <div class="col-lg-4">
                    <div class="team-image">
                        <img src="{{ $service['image_url'] }}" width="100%">
                    </div>
                    <div class="text-center">
                        <h3>{{ $service['name'] }}</h3>
                        <p>{{ $service['description'] }}
                        </p>

                    </div>
                </div>
                @endforeach

            </div>
    </section>

    <section class="">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="text-left heading-text heading-section">
                        <h2> SCORD FACILITIES MANAGEMENT </h2>
                    </div>
                    @foreach (@$featuresData as $feature)
                    <ul class="list-icon list-icon-arrow-circle list-icon-colored">
                        <li>{{ $feature['name'] }}</li>

                    </ul>
                    @endforeach
                </div>
                <div class="col-lg-6">
                    <img alt="" src="{{asset('images/Facilities.png')}}" width="80%">
                </div>


            </div>
        </div>
    </section>
    <!-- end: SECTION GREY -->

    <section class="background-colored">
        <div id="particles-dots" class="particles"></div>
        <div class="container">
            <div class="heading-text text-light text-center">

                <strong>
                    <h4> TO DISCUSS YOUR SECURITY REQUIREMENTS</h4>
                    <a href="{{asset('scordpdf.pdf')}}" target="_blank" class="btn btn-lg btn-white mb-4"> Downlaod Manual</a>
                    <h4>CALL US NOW AT +91-{{ $contactUs->mobile_no }}</h4>
                </strong>

            </div>
        </div>
    </section>

    <!-- Client logo -->
    <section class="background-grey text-center">
        <div class="container">
            <div class="text-center heading-text heading-section">
                <h2>OUR CLIENTS</h2>
            </div>
            <div class="carousel client-logos" data-items="6" data-items-sm="4" data-items-xs="3" data-items-xxs="2"
                data-margin="30" data-arrows="false" data-autoplay="true" data-autoplay="1" data-loop="true">

                @foreach ($ourClientData as $ourClient)

                <div class="d-flex mt-5 align-items-center justify-content-center">
                    <a href="#"><img alt="" src="{{ $ourClient['image_url'] }}"> </a>
                </div>
                @endforeach


            </div>
        </div>
    </section>





    <section class="">
        <div class="container">
            <div class="text-center heading-text heading-section">
                <h2> CONTACT US</h2>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="text-uppercase">Get In Touch</h3>
                    <p>If you have any questions, or you would like to talk to us about your project,
                        we would love to hear from you.
                        We invite you to give us a call or drop us a line.
                        If you want to sit down with us for a chat,
                        we'll make sure we've got the coffee ready.</p>
                    <div class="m-t-30">
                        <form class="widget-contact-form" id="get-in-touch-form" novalidate role="form" method="POST">
                        @csrf
                        <div class="row">
                            <div class="m-0 text-center text-white heading-text heading-section">
                                {{-- <h2 class="mb-5">Request a call back</h2> --}}
                            </div>
                            <div class="form-group col-md-12">
                                <label for="name">Name</label>
                                <input type="text" aria-required="true" id="gName" name="gName" required
                                    class="form-control required name" placeholder="Enter your Name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="subject">Phone Number</label>
                                <input type="text" id="gContact" name="gContact" required
                                    class="form-control required" placeholder="Enter your Phone Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message" >Message</label>
                            <textarea type="text" id="gMessage" name="gMessage" required rows="5"
                                class="form-control required" placeholder="Enter your Message"></textarea>
                        </div>

                        <button class="btn btn-primary" onclick="getInTouch()"  id="form-submit"><i class="fa fa-paper-plane"></i>&nbsp;Send message</button>
                    </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h3 class="text-uppercase">Address & Map</h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <address>
                                <strong>SCORD </strong><br>
                                B wing, 227 Steel chamber tower, near MTNL Office,Steel market road, Kalamboli -
                                410218. <br>
                                <abbr title="Phone">P:</h4> (+91) {{ $contactUs->mobile_no }}
                            </address>
                        </div>
                    </div>
                    <!-- Google Map -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.7769956431175!2d73.10444331537515!3d19.029545908374946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7e90a8da66bbb%3A0x1d0b485553bcad39!2ssteel%20chamber%20tower!5e0!3m2!1sen!2sin!4v1630865337184!5m2!1sen!2sin"
                        width="600" height="400" style="border:0;" allowfullscreen="true" loading="lazy"></iframe>

                    <!-- end: Google Map -->
                </div>
            </div>
        </div>
    </section>


    <section class="background p-50"  style="background-color: #07a8c9">
        <div class="container text-white">
            <div class="text-center mb-0 heading-text heading-section">
                <h2 class="lineh2 mb-2">TESTIMONIALS</h2>
            </div>
            <div class="carousel arrows-visibile testimonial testimonial-single testimonial-blockquote " data-items="1" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut" data-loop="true">
                <!-- Testimonials item -->
                @foreach ($feedBackData as $key => $feedback )
                @if($feedback)
                <div class="testimonial-item pt-0">
                    <p>{{ $feedback['message'] }}</p>
                    <span>-{{ $feedback['name'] }}</span>
                    {{-- <span>CEO, Square Software</span> --}}
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section>

    <section id="feedback" class="text-dark">
        <div class="heading-text heading-section text-center">
            <h2>FEEDBACK</h2>
            <p>Give Feedback to our services so that we can serve you better.</p>
        </div>

        <div class="container">

            <div class="row ">
                <div class="col-lg-6">
                    <div class="m-t-30">
                        <form class="widget-contact-form" id="feedback_form" method="POST">
                            @csrf
                            <input type="hidden" name="_token" value="yfXzE8OYEU7NhGfZDXxqQd532do1eI1PStO3MqkX">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="fName" aria-required="true" required="" class="form-control required name"
                                    placeholder="Enter your Name" name="fName">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea type="text" required="" rows="5" class="form-control required" id="fMessage" name="fMessage"
                                    placeholder="Enter your Message"></textarea>
                            </div>

                            <button class="btn text-white btn-primary" onclick="feedBack()"  id="form-submit"><i class=" fa fa-paper-plane"></i>&nbsp;Send Feedback</button>

                            {{-- <button class="btn border-dark background-grey text-dark feedback_form_button" onclick="feedBack() type="submit"
                                id="form-submit"><i class="fa fa-paper-plane"></i>&nbsp;Send Feedback</button> --}}
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 text-center">
                    <div class=" mb-5">
                        <img src="https://windshieldcare.in/assets/Main/images/carshieldimg/feedback.png" alt=""
                            width="70%">
                    </div>
                </div>
            </div>

        </div>
    </section>



</div>
@endsection

<script src="{{asset('Asset/website/js/functions.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        // Request Call Ajax

        function requestCallBack(){

            const name = $("#name").val();
            const contact = $("#contact").val();
            const message = $("#message").val();

            $.ajax({
                type: "POST",
                url: '{{ Route('store.get-in-touch') }}',
                data: {
                    "_token" : "{{ csrf_token() }}",
                    "name" : name,
                    "contact" : contact,
                    "message" : message,
                },
                success: function (data) {
                    $('#form-submit').html('<i class="fa fa-paper-plane"></i>&nbsp;Send message');
                    if(data.status){
                        $("#name").val('');
                        $("#contact").val('');
                        $("#message").val('');

                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    }

                    else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }
                },
                error: function (data) {
                    $('#form-submit').html('<i class="fa fa-paper-plane"></i>&nbsp;Send message');
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                }
            });
        }

        // GetIn Touch Ajax

        function getInTouch(){
            const gName = $("#gName").val();
            const gContact = $("#gContact").val();
            const gMessage = $("#gMessage").val();

            $.ajax({
                type: "POST",
                url: '{{ Route('store.get-in-touch') }}',
                data: {
                    "_token" : "{{ csrf_token() }}",
                    "name" : gName,
                    "contact" : gContact,
                    "message" : gMessage,
                },
                success: function (data) {
                    $('#form-submit').html('<i class="fa fa-paper-plane"></i>&nbsp;Send message');
                    if(data.status){
                        $("#gName").val('');
                        $("#gContact").val('');
                        $("#gMessage").val('');

                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    }

                    else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }
                },
                error: function (data) {
                    $('#form-submit').html('<i class="fa fa-paper-plane"></i>&nbsp;Send message');
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                }
            });
        }

        // Feedback Ajax

        function feedBack(){

            const fName = $("#fName").val();
            const fMessage = $("#fMessage").val();

            $.ajax({
                type: "POST",
                url: '{{ Route('store.feedback') }}',
                data: {
                    "_token" : "{{ csrf_token() }}",
                    "name" : fName,
                    "message" : fMessage,
                },
                success: function (data) {
                    $('#form-submit').html('<i class="fa fa-paper-plane"></i>&nbsp;Send message');
                    if(data.status){
                        $("#fName").val('');
                        $("#fMessage").val('');

                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    }

                    else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }
                },
                error: function (data) {
                    $('#form-submit').html('<i class="fa fa-paper-plane"></i>&nbsp;Send message');
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                }
            });
        }

    </script>
