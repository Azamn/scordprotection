<footer id="footer" style="background-color:#07a8c9">
    <div class="footer-content text-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="widget">

                        <div class="widget-title">SCORD PROTECTION FORCE</div>
                        <p class="mb-5">SCORD PROTECTION FORCE is an ISO 9001:2015 Certified <br>
                            company which is registered with the office commissioner <br>
                            of Police. Scord Protection Force is one of the best security <br>& protection company approved by government of Maharashtra.</p>
                        <!-- <a href="https://themeforest.net/item/polo-responsive-multipurpose-html5-template/13708923" class="btn btn-inverted" target="_blank">Purchase Now</a> -->
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="widget">
                                <div class="widget-title">Menu</div>
                                <ul class="list">
                                    <li><a href={{ route('index') }}>Home</a></li>
                                    <li><a href="#aboutus">About Us</a></li>
                                    <li><a href="#">Our Services</a></li>
                                    <li><a href={{ route('contact-us') }}>Contact Us</a></li>
                                    <li><a href={{ route('get.our-clients') }}>Our Clients</a></li>
                                    <!-- <li><a href="#">Customers</a></li> -->
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="widget">
                                <div class="widget-title">Our Services</div>
                                <ul class="list" id="footer-list">
                                </ul>
                            </div>
                        </div>


                        <div class="col-lg-6">
                            <div class="widget">
                                <div class="widget-title">Contact Us</div>
                                <ul class="list">
                                    <li><a href="#">Address : B wing, 227 Steel chamber tower, near MTNL Office,Steel market road, Kalamboli - 410218. </a>
                                    </li>
                                    <li><a href="#">Call Us : (+91) 9967797555 </a></li>
                                    <li><a href="#">Mail Us : info@scordprotection.in</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="copyright-content">
        <div class="container">
            <div class="copyright-text text-center"> &copy; 2021 Scord Protection. All Right Reserved. </div>
        </div>
    </div>
</footer>
<script>
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
                    $('#footer-list').append(
                        '<li><a href="/api/admin/get-single/service/'+item.id+'">'+item.name+'</a></li>'
                        //'<li class="service-page" id="serviceData" value='+item.id+' type="submit" ><a href="/api/admin/get-single/service/'+item.id+'">'+item.name+'</a></li>'
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
</script>
