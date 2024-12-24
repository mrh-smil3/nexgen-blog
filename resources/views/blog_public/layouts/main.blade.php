<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Site Metas -->
    <title>Nex-Gen Blog</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{ asset('/storage/logo/icons_nex_gen.png') }}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png" />

    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,400i,500,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet" />

    <!-- Bootstrap core CSS -->
    {{-- <link href="css/bootstrap.css" rel="stylesheet" /> --}}
    <link href="{{ asset('blog/css/bootstrap-minls.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- FontAwesome Icons core CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="{{ asset('blog/css/font-awesome.min.css') }}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    {{-- <link href="style.css" rel="stylesheet" /> --}}
    <link href="{{ asset('blog/css/style.css') }}" rel="stylesheet" />

    <!-- Responsive styles for this template -->
    {{-- <link href="css/responsive.css" rel="stylesheet" /> --}}
    <link href="{{ asset('blog/css/responsive.css') }}" rel="stylesheet" />

    <!-- Colors for this template -->
    {{-- <link href="css/colors.css" rel="stylesheet" /> --}}
    <link href="{{ asset('blog/css/colors.css') }}" rel="stylesheet" />

</head>

<body>

    <div id="wrapper">
        <div class="collapse top-search" id="collapseExample">
            <div class="card card-block">
                <div class="newsletter-widget text-center">
                    <form class="form-inline">
                        <input type="text" class="form-control" placeholder="What you are looking for?" />
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
                <!-- end newsletter -->
            </div>
        </div>
        <!-- end top-search -->

        {{-- topbar section --}}
        @include('blog_public.partials.topbar')
        {{-- end topbar --}}


        {{-- header section --}}
        @include('blog_public.partials.header')
        {{-- endheader --}}

        @yield('main')


    </div>
    <div class=" bottom-0" style="margin-top: 150px">
        {{-- section footer --}}
        @include('blog_public.partials.footer')
    </div>


    {{-- <script src="js/jquery.min.js"></script> --}}
    <script src="{{ asset('blog/js/jquery.min.js') }}"></script>
    <script src="{{ asset('blog/js/tether.min.js') }}"></script>
    <script src="{{ asset('blog/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('blog/js/custom.js') }}"></script>
</body>

</html>
