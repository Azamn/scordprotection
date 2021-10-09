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
                        width="600" height="400" style="border:0;" allowfullscreen="true" loading="lazy"></iframe>
                    <!-- end: Google Map -->
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

<script src="{{asset('Asset/website/js/functions.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

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

</script>
