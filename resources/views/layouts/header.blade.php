<header id="header" class="light header-logo-center">
    <div class="header-inner background-grey">
        <div class="container">
            <div class="header-extras">
                <ul>
                    <li class="mr-3 d-sm-block d-lg-none d-xl-none ">
                        <a class="btn btn-sm text-white" href="tel:+918452857451"> <i class="icon-phone mr-1"></i> Call
                            Us</a>
                    </li>
                    <li class="mr-3">
                        <a href="https://mywa.link/3zfe8xgi" target="_blank"
                            style="background-color:#3fe75d; border-style:none" class="btn  btn-sm text-white"> <i
                                class="fab fa-whatsapp mr-1"></i> Whatsapp</a>
                    </li>
                    <li class="mr-3">
                        <a class="btn btn-sm text-white" target="_blank"
                            style="background-color:#e34133; border-style:none"
                            href="https://mail.google.com/mail/?view=cm&amp;fs=1&amp;tf=1&amp;to=info@scordprotection.in"><i
                                class="fa fa-envelope mr-1"></i>email</a>
                    </li>
                </ul>
            </div>


            <div id="mainMenu-trigger">
                <a class="lines-button x"><span class="lines"></span></a>
            </div>


            <div id="mainMenu" style="min-height: 0px;" class="">
                <div class="container">
                    <nav>

                        <ul>
                            <li class="mr-3"><img src="{{{asset('images/Scord.png')}}}" alt="" width="120px"></li>
                            <li class="mt-3"><a href={{ route('index') }}>Home</a></li>
                            <li class="mt-3"><a href="#aboutus">About Us</a>

                            </li>

                            <li class="dropdown mt-3"><a href={{ route('home') }}>Our Services</a>
                                <ul class="dropdown-menu">
                                    {{-- <li><a href="header-topbar.html">Light</a></li>
                                    <li><a href="header-topbar-dark.html">Dark</a></li>
                                    <li><a href="header-topbar-transparent.html">Transparent</a></li>
                                    <li><a href="header-topbar-colored.html">Colored</a></li>
                                    <li><a href="header-topbar-fullwidth.html">Fullwidth</a></li> --}}
                                </ul>
                            </li>
                            <li class="mt-3"><a href={{ route('contact-us') }}>Contact Us</a>

                            </li>
                            <li class="mt-3"><a href={{ route('get.our-clients') }}>Our Clients</a>

                            </li>
                            <li class="mt-3"><a href="{{asset('scordpdf.pdf')}}" target="_blank">Our Manual</a>

                            </li>
                        </ul>

                        <ul>

                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>

    <script src="{{asset('Asset/website/js/functions.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
// var $ = jQuery;
$(document).ready(function() {

    fetchService();

    function fetchService(){
        $.ajax({
            type:"GET",
            url: "{{ Route('get.dropDownService') }}",
            dataType: "json",
            data: {
                "_token" : "{{ csrf_token() }}",
            },
            success: function(response){
                // console.log(response.data);
                $.each(response.data, function (key, item){
                    $('.dropdown-menu').append(

                        '<li class="service-page" id="serviceData" value='+item.id+' type="submit" ><a href="/api/admin/get-single/service/'+item.id+'">'+item.name+'</a></li>'
                        //'<li class="service-page" id="serviceData" data-id='+item.id+' type="submit"><a  href="api/admin/get-single/service/'+item.id+'">'+item.name+'</a></li>'

                    );
                    // $('.service-page').on('click',function(){
                    //     pageRedirect(item.id);
                    // });
                })
            }
        });
    }

    // single data for sevice




});



// function pageRedirect(id) {
//     var myURL = document.location;
//       window.location.href = myURL + "api/admin/get-single/service/"+id;
//     }



// function servicePage(id){
//     //debugger;
//     var queryParams = new URLSearchParams(window.location.search);
//     var myURL = document.location;
//     // var host = myUrl.host;
//     // var pathName = myUrl.pathname;
//     //document.location = myURL + "api/admin/get-single/service/"+id;
//     window.location.href = '';
//     window.location.href = myURL + "api/admin/get-single/service/"+id;


//     //window.history.replaceState(null, null, myURL + "api/admin/get-single/service/"+id);

// }

</script>

</header>



