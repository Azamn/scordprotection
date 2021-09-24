@extends('layouts.base')

@section('content')
<div class="body-inner">

    <!-- Inspiro Slider -->
    <div id="slider" class="inspiro-slider dots-creative" data-height-xs="360">
        <!-- Slide 1 -->
        <div class="slide" style="background-image:url('images/scordimg/bg.jpg');">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="slide-captions text-center text-light">
                    <!-- Captions -->
                    <h2>SCORD</h2>
                    <!-- end: Captions -->
                </div>
            </div>
        </div>

    </div>
    <!--end: Inspiro Slider -->

    <!-- About us -->
    <section>
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
                            <form class="widget-contact-form" data-success-message-delay="40000" novalidate
                                action="include/contact-form.php" role="form" method="post">
                                <div class="row">
                                    <div class="m-0 text-center text-white heading-text heading-section">
                                        <h2 class="mb-5">Request a call back</h2>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="name" class="text-white">Name</label>
                                        <input type="text" aria-required="true" name="widget-contact-form-name" required
                                            class="form-control required name" placeholder="Enter your Name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="subject" class="text-white">Phone Number</label>
                                        <input type="text" name="widget-contact-form-subject" required
                                            class="form-control required" placeholder="Enter your Phone Number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="message" class="text-white">Message</label>
                                    <textarea type="text" name="widget-contact-form-message" required rows="5"
                                        class="form-control required" placeholder="Enter your Message"></textarea>
                                </div>

                                <button class="btn btn-primary" type="submit" id="form-submit"><i
                                        class="fa fa-paper-plane"></i>&nbsp;Send message</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </section>
    <!-- end: About us -->

    <!-- SERVICES -->
    <section class="background-grey">
        <div class="container-fluid">
            <div class="text-center heading-text heading-section">
                <h2> Our Featured Security Services </h2>
                <div><b>Protection security group propose to respond to all requirements by providing on a twenty-four hour, seven-days week basis, a competent and uniformed guard force to accomplish the requirements of the client.</b></div>
            </div>
            <div class="row">
                <div class="offset-md-2 col-lg-2">
                    <div class="team-image">
                        <img src="{{{asset('images/scordimg/4.jpeg')}}}" width="100%">
                    </div>
                    <div class="text-center">
                        <h3>Door frame Detectors</h3>
                        <p>The most happiest time of the day!. Praesent tristique hendrerit ex ut laoreet.
                        </p>

                    </div>
                </div>
                <div class="offset-md-1 col-lg-2">
                    <div class="team-image">
                        <img src="{{{asset('images/scordimg/4.jpeg')}}}" width="100%">
                    </div>
                    <div class="text-center">
                        <h3>Door frame Detectors</h3>
                        <p>The most happiest time of the day!. Praesent tristique hendrerit ex ut laoreet.
                        </p>

                    </div>
                </div>
                <div class=" offset-md-1 col-lg-2">
                    <div class="team-image">
                        <img src="{{{asset('images/scordimg/4.jpeg')}}}" width="100%">
                    </div>
                    <div class="text-center">
                        <h3>Door frame Detectors</h3>
                        <p>The most happiest time of the day!. Praesent tristique hendrerit ex ut laoreet.
                        </p>

                    </div>
                </div>

            </div>
    </section>

    <section class="">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="text-left heading-text heading-section">
                        <h2> SCORD FACILITIES MANAGEMENT </h2>
                    </div>
                    <ul class="list-icon list-icon-arrow-circle list-icon-colored">
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Integer molestie lorem at massa</li>
                        <li>Facilisis in pretium nisl aliquet</li>
                        <li>Faucibus porta lacus fringilla vel</li>
                        <li>Aenean sit amet erat nunc</li>
                        <li>Eget porttitor lorem</li>
                        <li>Beautiful nature, and rare feathers!</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <img alt="" src="{{asset('images/Facilities.png')}}" width="80%">
                </div>


            </div>
        </div>
    </section>
    <!-- end: SECTION GREY -->

    <!-- Particle 1 -->
    <section class="background-colored">
        <div id="particles-dots" class="particles"></div>
        <div class="container">
            <div class="heading-text text-light text-center">
                <!-- <h5 class="text-uppercase">The connected
                        <thead></thead>
                    </h5> -->
                <!-- <h2 class="fw-800">Dots</h2> -->
                <strong>
                    <p>CALL US NOW AT +91-8452857451 TO DISCUSS YOUR SECURITY REQUIREMENTS</p>
                </strong>
                <!-- <a href="#" class="btn btn-light btn-roundeded">Read More</a> -->
            </div>
        </div>
    </section>
    <!-- end: Particle 1 -->

    <!-- Client logo -->
    <section class="background-grey text-center">
        <div class="container-fluid">
            <div class="carousel client-logos" data-items="6" data-items-sm="4" data-items-xs="3" data-items-xxs="2"
                data-margin="30" data-arrows="false" data-autoplay="true" data-autoplay="1" data-loop="true">
                <div class="d-flex mt-5 align-items-center justify-content-center">
                    <a href="#"><img alt="" src="{{{asset('images/scordimg/1.jpeg')}}}"> </a>
                </div>
                <div class="text-center">
                    <a href="#"><img alt="" src="{{{asset('images/scordimg/2.jpeg')}}}"> </a>
                </div>
                <div class="text-center">
                    <a href="#"><img alt="" src="{{{asset('images/scordimg/3.jpeg')}}}"> </a>
                </div>
                <div class="text-center">
                    <a href="#"><img alt="" src="{{{asset('images/scordimg/4.jpeg')}}}"> </a>
                </div>
                <div class="text-center">
                    <a href="#"><img alt="" src="{{{asset('images/scordimg/5.jpeg')}}}"> </a>
                </div>
                <div class="text-center">
                    <a href="#"><img alt="" src="{{{asset('images/scordimg/6.jpeg')}}}"> </a>
                </div>
                <div class="text-center">
                    <a href="#"><img alt="" src="{{{asset('images/scordimg/7.jpeg')}}}"> </a>
                </div>
                <div class="text-center">
                    <a href="#"><img alt="" src="{{{asset('images/scordimg/8.jpeg')}}}"> </a>
                </div>
                <div class="text-center">
                    <a href="#"><img alt="" src="{{{asset('images/scordimg/9.jpeg')}}}"> </a>
                </div>
                <div class="d-flex mt-5 align-items-center justify-content-center">
                    <a href="#"><img alt="" src="{{{asset('images/scordimg/10.jpeg')}}}"> </a>
                </div>
                <div class="d-flex mt-5 align-items-center justify-content-center">
                    <a href="#"><img alt="" src="{{{asset('images/scordimg/11.jpeg')}}}"> </a>
                </div>
                <div class="text-center">
                    <a href="#"><img alt="" src="{{{asset('images/scordimg/12.jpeg')}}}"> </a>
                </div>
                <div class="text-center">
                    <a href="#"><img alt="" src="{{{asset('images/scordimg/13.jpeg')}}}"> </a>
                </div>
                <div class="text-center">
                    <a href="#"><img alt="" src="{{{asset('images/scordimg/14.jpeg')}}}"> </a>
                </div>
                <div class="text-center">
                    <a href="#"><img alt="" src="{{{asset('images/scordimg/15.jpeg')}}}"> </a>
                </div>
                <div class="text-center">
                    <a href="#"><img alt="" src="{{{asset('images/scordimg/16.jpeg')}}}"> </a>
                </div>
                <div class="text-center">
                    <a href="#"><img alt="" src="{{{asset('images/scordimg/17.jpeg')}}}"> </a>
                </div>
                <div class="text-center">
                    <a href="#"><img alt="" src="{{{asset('images/scordimg/18.jpeg')}}}"> </a>
                </div>
                <div class="text-center">
                    <a href="#"><img alt="" src="{{{asset('images/scordimg/19.jpeg')}}}"> </a>
                </div>
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
                    <p>The most happiest time of the day!. Suspendisse condimentum porttitor cursus. Duis nec nulla
                        turpis. Nulla lacinia laoreet odio, non lacinia nisl malesuada vel. Aenean malesuada
                        fermentum bibendum.</p>
                    <div class="m-t-30">
                        <form class="widget-contact-form" data-success-message-delay="40000" novalidate
                            action="include/contact-form.php" role="form" method="post">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" aria-required="true" name="widget-contact-form-name" required
                                        class="form-control required name" placeholder="Enter your Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" aria-required="true" name="widget-contact-form-email" required
                                        class="form-control required email" placeholder="Enter your Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="subject">Your Subject</label>
                                    <input type="text" name="widget-contact-form-subject" required
                                        class="form-control required" placeholder="Subject...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea type="text" name="widget-contact-form-message" required rows="5"
                                    class="form-control required" placeholder="Enter your Message"></textarea>
                            </div>

                            <button class="btn btn-primary" type="submit" id="form-submit"><i
                                    class="fa fa-paper-plane"></i>&nbsp;Send message</button>
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
                                <abbr title="Phone">P:</h4> (+91) 84528 57451
                            </address>
                        </div>
                    </div>
                    <!-- Google Map -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.7769956431175!2d73.10444331537515!3d19.029545908374946!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7e90a8da66bbb%3A0x1d0b485553bcad39!2ssteel%20chamber%20tower!5e0!3m2!1sen!2sin!4v1630865337184!5m2!1sen!2sin"
                        width="600" height="450" style="border:0;" allowfullscreen="true" loading="lazy"></iframe>

                    <!-- end: Google Map -->
                </div>
            </div>
        </div>
    </section>


    <section class="background-grey p-50">
        <div class="container">
            <div class="text-center heading-text heading-section">
                <h2>TESTIMONIALS</h2>
            </div>
            <div class="carousel arrows-visibile testimonial testimonial-single testimonial-blockquote " data-items="1" data-autoplay="true" data-animate-in="fadeIn" data-animate-out="fadeOut" data-loop="true">
                <!-- Testimonials item -->
                <div class="testimonial-item pt-0">
                    <p>Polo is by far the most amazing template out there! I literally could not be happier that I chose to buy this template!</p>
                    <span>Alan Monre</span>
                    <span>CEO, Square Software</span>
                </div>
                <!-- end: Testimonials item-->
                <!-- Testimonials item -->
                <div class="testimonial-item pt-0">
                    <p>Polo is by far the most amazing template out there! I literally could not be happier that I chose to buy this template!</p>
                    <span>Alan Monre</span>
                    <span>CEO, Square Software</span>
                </div>
                <!-- end: Testimonials item-->
                <!-- Testimonials item -->
                <div class="testimonial-item pt-0">
                    <p>The world is a dangerous place to live; not because of the people who are evil, but because of the people who don't do anything about it.</p>
                    <span>Alan Monre</span>
                    <span>CEO, Square Software</span>
                </div>
                <!-- end: Testimonials item-->
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
                        <form class="widget-contact-form" id="feedback_form">
                            <input type="hidden" name="_token" value="yfXzE8OYEU7NhGfZDXxqQd532do1eI1PStO3MqkX">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" aria-required="true" required="" class="form-control required name"
                                    placeholder="Enter your Name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea type="text" required="" rows="5" class="form-control required" name="body"
                                    placeholder="Enter your Message"></textarea>
                            </div>

                            <button class="btn border-dark background-grey text-dark feedback_form_button" type="submit"
                                id="form-submit"><i class="fa fa-paper-plane"></i>&nbsp;Send Feedback</button>
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
