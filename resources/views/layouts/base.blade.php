<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="INSPIRO" />
    <meta name="description" content="Themeforest Template Polo, html template">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Document title -->
    <title>SCORD PROTECTION</title>
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
