<!DOCTYPE html>
<html lang="en">

<head>
    @notifyCss
    <style>
        .notify {
            z-index: 1000000;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <link rel="stylesheet" href="{{url('/public/css/bootstrap-icons.min.css')}}"/>
    <link rel="stylesheet" href="{{url('/public/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{url('/public/css/bootstraps.min.css')}}"/>
    <link rel="stylesheet" href="{{url('/public/css/style.css')}}"/>
</head>

<body>
    <x-notify::notify />
    @include('Backend.Partials.Header')


    @yield('Slider_Pro')


    <!-- Content -->

    <div class="container">
        @yield('Container')
    </div>


    <!-- Footer -->
    @include('Backend.Partials.Footer')


    <script src="{{url('/public/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('/public/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{url('/public/js/custom.js')}}"></script>
    @notifyJs
</body>

</html>