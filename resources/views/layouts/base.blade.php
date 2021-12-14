<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="Scord Protection" content="Scord Protection is an ISO 9001:2008 Certified company which is registered with the office the commissioner of Police. License No. 306. Jaguar Group is one of the best security & protection company approved by government of Maharashtra. ">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="{{asset('images/Scord.png')}}" type="image/x-icon">
    <title>Scord Protection</title>
    <!-- Stylesheets & Fonts -->
    <link href="{{{asset('css/plugins.css') }}}" rel="stylesheet">
    <link href="{{{asset('css/style.css') }}}" rel="stylesheet">
</head>

<body>

    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')

    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <!--Plugins-->
    <script src="{{{asset('js/jquery.js') }}}"></script>
    <script src="{{{asset('js/plugins.js') }}}"></script>

    <!--Template functions-->
    <script src="{{{asset('js/functions.js')}}}"></script>

    <!--Particles-->
    <script src="{{{asset('plugins/particles/particles.js')}}}"></script>
    <script src="{{{asset('plugins/particles/particles-dots.js')}}}"></script>

    @yield('js')
</body>

</html>
