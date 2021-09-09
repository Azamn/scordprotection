@extends('layouts.base')

@section('content')

<div class="body-inner">

    <section id="page-title" data-bg-parallax="images/parallax/5.jpg">
        <div class="container">
            <div class="page-title">
                <h1>Contact Us</h1>
                <span>The most happiest time of the day!.</span>
            </div>
            <div class="breadcrumb">
                <ul>
                    <li><a href="#">Home</a> </li>
                    <li><a href="#">Pages</a> </li>
                    <li class="active"><a href="scordcontactus.html">Contact Us</a> </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- end: Page title -->
    <!-- CONTENT -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="text-uppercase">Get In Touch</h3>
                    <p>The most happiest time of the day!. Suspendisse condimentum porttitor cursus. Duis nec nulla
                        turpis. Nulla lacinia laoreet odio, non lacinia nisl malesuada vel. Aenean malesuada fermentum
                        bibendum.</p>
                    <div class="m-t-30">
                        <form class="widget-contact-form" action="include/contact-form-attachment.php" role="form"
                            method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" aria-required="true" name="widget-contact-form-name"
                                        class="form-control name" placeholder="Enter your Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" aria-required="true" required name="widget-contact-form-email"
                                        class="form-control email" placeholder="Enter your Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="subject">Your Subject</label>
                                    <input type="text" name="widget-contact-form-subject" class="form-control"
                                        placeholder="Subject...">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea type="text" name="widget-contact-form-message" rows="5" class="form-control "
                                    placeholder="Enter your Message"></textarea>
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
                                <strong>SCORD PROTECTION FORCE</strong><br>
                                B wing, 227 Steel chamber tower, near MTNL Office,Steel market road, Kalamboli -
                                410218. <br>
                                <abbr title="Phone">P:</h4> (+91) 12345-67890
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
</div>
@endsection
