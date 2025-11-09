<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Codescandy" name="author">

    <title>Roots & Wings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="{{ url('/public/css/slick.css') }}" rel="stylesheet" />
    <link href="{{ url('/public/css/slick-theme.css') }}" rel="stylesheet" />
    <link href="{{ url('/public/css/tiny-slider.css') }}" rel="stylesheet" />

    <!-- Libs CSS -->
    <link href="{{ url('/public/css/bootstrap-icons.min.css') }}" rel="stylesheet" />
    <link href="{{ url('/public/css/feather-icons.css') }}" rel="stylesheet" />
    <link href="{{ url('/public/css/simplebar.min.css') }}" rel="stylesheet" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ url('/public/css/theme.min.css') }}">
    <link rel="stylesheet" href="{{ url('/public/css/fstyle.css') }}">
    <!-- Google tag (gtag.js) -->
    <script async src="{{ url('/public/js/js.js') }}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>


<body>
    <!-- Notification -->
    @include('Frontend.Partials.Notification')


    <!-- Header -->
    @include('Frontend.Partials.Header')

    <main>
        @yield('login')
        @yield('slider')
        @yield('category')
        @yield('discount')
        @yield('product')
        @yield('best_sale')
        @yield('offer')
        @yield('my_account')
        @yield('department')
    </main>

    <!-- Glubal Modal -->
    @include('Frontend.Partials.modal')

    <!-- Footer -->
    @include('Frontend.Partials.Footer')

    <!-- jquery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ url('/build/assets/app-5b731558.js') }}"></script>

    <!-- Libs JS -->
    <script src="{{ url('/public/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('/public/js/simplebar.min.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ url('/public/js/theme.min.js') }}"></script>
    <script src="{{ url('/public/js/countdown.js') }}"></script>
    <script src="{{ url('/public/js/slick.min.js') }}"></script>
    <script src="{{ url('/public/js/slick-slider.js') }}"></script>
    <script src="{{ url('/public/js/tiny-slider.js') }}"></script>
    <script src="{{ url('/public/js/tns-slider.js') }}"></script>
    <script src="{{ url('/public/js/zoom.js') }}"></script>
    <script src="{{ url('/public/js/custom.js') }}"></script>
    <script>
        window.Echo.channel('product.created')
            .listen('ProductCreated', (e) => {
                console.log(e.product);

                function showNotification(type, message) {
                    switch (type) {
                        case 'success':
                            toastr.success(message);
                            break;
                        case 'info':
                            toastr.info(message);
                            break;
                        case 'warning':
                            toastr.warning(message);
                            break;
                        case 'error':
                            toastr.error(message);
                            break;
                        default:
                            toastr.info('Default notification');
                    }
                }
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"  
                };
                showNotification('success', e.product.name);
            });
    </script>
</body>

</html>
