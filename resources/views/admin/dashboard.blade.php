<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{{asset('Admin/assets/images/favicon.png')}}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{{asset('Admin/assets/images/favicon.png')}}}" type="image/x-icon">
    <title>Cuba - Premium Admin Template</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{{asset('Admin/assets/css/fontawesome.css')}}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{{asset('Admin/assets/css/vendors/icofont.css')}}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{{asset('Admin/assets/css/vendors/themify.css')}}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{{asset('Admin/assets/css/vendors/flag-icon.css')}}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{{asset('Admin/assets/css/vendors/feather-icon.css')}}}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{{asset('Admin/assets/css/vendors/animate.css')}}}">
    <link rel="stylesheet" type="text/css" href="{{{asset('Admin/assets/css/vendors/chartist.css')}}}">
    <link rel="stylesheet" type="text/css" href="{{{asset('Admin/assets/css/vendors/date-picker.css')}}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{{asset('Admin/assets/css/vendors/bootstrap.css')}}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{{asset('Admin/assets/css/style.css')}}}">
    <link id="color" rel="stylesheet" href="{{{asset('Admin/assets/css/color-1.css')}}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{{asset('Admin/assets/css/responsive.css')}}}">
</head>

<body onload="startTime()">
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper row m-0">
                <form class="form-inline search-full" action="#" method="get">
                    <div class="form-group w-100">
                        <div class="Typeahead Typeahead--twitterUsers">
                            <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                    placeholder="Search Cuba .." name="q" title="" autofocus>
                                <div class="spinner-border Typeahead-spinner" role="status"><span
                                        class="sr-only">Loading...</span></div><i class="close-search"
                                    data-feather="x"></i>
                            </div>
                            <div class="Typeahead-menu"></div>
                        </div>
                    </div>
                </form>
                <div class="header-logo-wrapper">
                    <div class="logo-wrapper"><a href="index.html"><img class="img-fluid"
                                src="{{{asset('images/logo.jpeg')}}}" alt=""></a></div>
                    <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle"
                            data-feather="sliders"></i></div>
                </div>
                <div class="left-header col horizontal-wrapper pl-0">
                    <ul class="horizontal-menu">


                    </ul>
                </div>
                <div class="nav-right col-8 pull-right right-header p-0">
                    <ul class="nav-menus">


                        <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                                    data-feather="maximize"></i></a></li>
                        <li class="profile-nav onhover-dropdown p-0 mr-0">
                            <div class="media profile-media"><img class="b-r-10"
                                    src="{{{asset('Admin/assets/images/dashboard/profile.jpg')}}}" alt="">
                                <div class="media-body"><span>Emay Walter</span>
                                    <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div">
                                <li><a href="#"><i data-feather="user"></i><span>Account </span></a></li>
                                <li><a href="#"><i data-feather="mail"></i><span>Inbox</span></a></li>
                                <li><a href="#"><i data-feather="file-text"></i><span>Taskboard</span></a></li>
                                <li><a href="#"><i data-feather="settings"></i><span>Settings</span></a></li>
                                <li><a href="#"><i data-feather="log-in"> </i><span>Log in</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <script class="result-template" type="text/x-handlebars-template">
                    <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">name</div>
            </div>
            </div>
          </script>
                <script class="empty-template" type="text/x-handlebars-template">
                    <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div>
                </script>
            </div>
        </div>
        <!-- Page Header Ends                              -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper sidebar-icon">
            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper">
                <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light"
                            src="{{{asset('Admin/assets/images/logo/logo.png')}}}" alt=""><img
                            class="img-fluid for-dark" src="{{{asset('Admin/assets/images/logo/logo_dark.png')}}}"
                            alt=""></a>
                    <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                    <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i>
                    </div>
                </div>
                <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid"
                            src="{{{asset('Admin/assets/images/logo/logo-icon.png')}}}" alt=""></a></div>




                <nav class="sidebar-main">
                    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                    <div id="sidebar-menu">
                        <ul class="sidebar-links custom-scrollbar">
                            <li class="back-btn"><a href="index.html"><img class="img-fluid"
                                        src="{{{asset('images/logo.jpeg')}}}" alt=""></a>
                                <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2"
                                        aria-hidden="true"></i></div>
                            </li>
                            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="faq.html"><i
                                        data-feather="help-circle"> </i><span>Dashboard</span></a></li>

                            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                    href="knowledgebase.html"><i data-feather="sunrise">
                                    </i><span>Requests</span></a></li>
                            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                    href="support-ticket.html"><i data-feather="users"> </i><span>Complete
                                        Requests</span></a></li>
                            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                    href="support-ticket.html"><i data-feather="users"> </i><span>Feedback</span></a>
                            </li>
                            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                href="support-ticket.html"><i data-feather="users"> </i><span>Contact</span></a>
                        </li>
                            <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                                href="support-ticket.html"><i data-feather="users"> </i><span>Logout</span></a>
                        </li>
                        </ul>
                    </div>
                    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                </nav>

            </div>


            <!-- Page Sidebar Ends-->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Default</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"> <i data-feather="home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <li class="breadcrumb-item active">Default </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="row second-chart-list third-news-update">
                        <div class="col-xl-4 col-lg-12 xl-50 morning-sec box-col-12">
                            <div class="card o-hidden profile-greeting">
                                <div class="card-body">
                                    <div class="media">
                                        <div class="badge-groups w-100">
                                            <div class="badge f-12"><i class="mr-1" data-feather="clock"></i><span
                                                    id="txt"></span></div>
                                        </div>
                                    </div>
                                    <div class="greeting-user text-center">
                                        <div class="profile-vector"><img class="img-fluid"
                                                src="{{{asset('Admin/assets/images/dashboard/welcome.png')}}}" alt="">
                                        </div>
                                        <h4 class="f-w-600"><span id="greeting">Good Morning</span> <span
                                                class="right-circle"><i
                                                    class="fa fa-check-circle f-14 middle"></i></span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 xl-50 chart_data_right box-col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body right-chart-content">
                                            <h4>$95,900<span class="new-box">Hot</span></h4><span>Purchase Order
                                                Value</span>
                                        </div>
                                        <div class="knob-block text-center">
                                            <input class="knob1" data-width="10" data-height="70" data-thickness=".3"
                                                data-angleoffset="0" data-linecap="round" data-fgcolor="#7366ff"
                                                data-bgcolor="#eef5fb" value="60">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body right-chart-content">
                                            <h4>$95,900<span class="new-box">Hot</span></h4><span>Purchase Order
                                                Value</span>
                                        </div>
                                        <div class="knob-block text-center">
                                            <input class="knob1" data-width="10" data-height="70" data-thickness=".3"
                                                data-angleoffset="0" data-linecap="round" data-fgcolor="#7366ff"
                                                data-bgcolor="#eef5fb" value="60">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 xl-50 chart_data_right box-col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body right-chart-content">
                                            <h4>$95,900<span class="new-box">Hot</span></h4><span>Purchase Order
                                                Value</span>
                                        </div>
                                        <div class="knob-block text-center">
                                            <input class="knob1" data-width="10" data-height="70" data-thickness=".3"
                                                data-angleoffset="0" data-linecap="round" data-fgcolor="#7366ff"
                                                data-bgcolor="#eef5fb" value="60">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body right-chart-content">
                                            <h4>$95,900<span class="new-box">Hot</span></h4><span>Purchase Order
                                                Value</span>
                                        </div>
                                        <div class="knob-block text-center">
                                            <input class="knob1" data-width="10" data-height="70" data-thickness=".3"
                                                data-angleoffset="0" data-linecap="round" data-fgcolor="#7366ff"
                                                data-bgcolor="#eef5fb" value="60">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-9 xl-100 chart_data_left box-col-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="row m-0 chart-main">
                                        <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                            <div class="media align-items-center">
                                                <div class="hospital-small-chart">
                                                    <div class="small-bar">
                                                        <div class="small-chart flot-chart-container"></div>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="right-chart-content">
                                                        <h4>1001</h4><span>purchase </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                            <div class="media align-items-center">
                                                <div class="hospital-small-chart">
                                                    <div class="small-bar">
                                                        <div class="small-chart1 flot-chart-container"></div>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="right-chart-content">
                                                        <h4>1005</h4><span>Sales</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                            <div class="media align-items-center">
                                                <div class="hospital-small-chart">
                                                    <div class="small-bar">
                                                        <div class="small-chart2 flot-chart-container"></div>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="right-chart-content">
                                                        <h4>100</h4><span>Sales return</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                            <div class="media border-none align-items-center">
                                                <div class="hospital-small-chart">
                                                    <div class="small-bar">
                                                        <div class="small-chart3 flot-chart-container"></div>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="right-chart-content">
                                                        <h4>101</h4><span>Purchase ret</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <!-- Container-fluid Ends-->
            </div>
            <!-- footer start-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 footer-copyright text-center">
                            <p class="mb-0">Copyright 2020 © Cuba theme by pixelstrap </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- latest jquery-->
    <script src="{{{asset('Admin/assets/js/jquery-3.5.1.min.js')}}}"></script>
    <!-- Bootstrap js-->
    <script src="{{{asset('Admin/assets/js/bootstrap/popper.min.js')}}}"></script>
    <script src="{{{asset('Admin/assets/js/bootstrap/bootstrap.js')}}}"></script>
    <!-- feather icon js-->
    <script src="{{{asset('Admin/assets/js/icons/feather-icon/feather.min.js')}}}"></script>
    <script src="{{{asset('Admin/assets/js/icons/feather-icon/feather-icon.js')}}}"></script>
    <!-- Sidebar jquery-->
    <script src="{{{asset('Admin/assets/js/config.js')}}}"></script>
    <!-- Plugins JS start-->
    <script src="{{{asset('Admin/assets/js/sidebar-menu.js')}}}"></script>
    <script src="{{{asset('Admin/assets/js/chart/chartist/chartist.js')}}}"></script>
    <script src="{{{asset('Admin/assets/js/chart/chartist/chartist-plugin-tooltip.js')}}}"></script>
    <script src="{{{asset('Admin/assets/js/chart/knob/knob.min.js')}}}"></script>
    <script src="{{{asset('Admin/assets/js/chart/knob/knob-chart.js')}}}"></script>
    <script src="{{{asset('Admin/assets/js/chart/apex-chart/apex-chart.js')}}}"></script>
    <script src="{{{asset('Admin/assets/js/chart/apex-chart/stock-prices.js')}}}"></script>
    <script src="{{{asset('Admin/assets/js/notify/bootstrap-notify.min.js')}}}"></script>
    <script src="{{{asset('Admin/assets/js/dashboard/default.js')}}}"></script>
    <script src="{{{asset('Admin/assets/js/notify/index.js')}}}"></script>
    <script src="{{{asset('Admin/assets/js/datepicker/date-picker/datepicker.js')}}}"></script>
    <script src="{{{asset('Admin/assets/js/datepicker/date-picker/datepicker.en.js')}}}"></script>
    <script src="{{{asset('Admin/assets/js/datepicker/date-picker/datepicker.custom.js')}}}"></script>
    <script src="{{{asset('Admin/assets/js/typeahead/handlebars.js')}}}"></script>
    <script src="{{{asset('Admin/assets/js/typeahead/typeahead.bundle.js')}}}"></script>
    <script src="{{{asset('Admin/assets/js/typeahead/typeahead.custom.js')}}}"></script>
    <script src="{{{asset('Admin/assets/js/typeahead-search/handlebars.js')}}}"></script>
    <script src="{{{asset('Admin/assets/js/typeahead-search/typeahead-custom.js')}}}"></script>
    <script src="{{{asset('Admin/assets/js/tooltip-init.js')}}}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{{asset('Admin/assets/js/script.js')}}}"></script>
    <script src="{{{asset('Admin/assets/js/theme-customizer/customizer.js')}}}"></script>
    <!-- login js-->
    <!-- Plugin used-->
</body>

</html>
