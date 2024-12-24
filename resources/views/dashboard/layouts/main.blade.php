<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - Nex Blog</title>
    <link rel="shortcut icon" href="{{ asset('/storage/logo/icons_nex_gen.png') }}" type="image/x-icon" />

    <meta content="" name="description">
    <meta content="" name="keywords">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pace.css') }}" rel="stylesheet">


    {{-- script data api visit js --}}
    <script src="{{ asset('js/dashboard/chart.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- CKEditor CDN --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <!-- Theme Styles -->
    <link href="{{ asset('css/main.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body>

    <div class="app align-content-stretch d-flex flex-wrap">

        {{-- sidebar --}}
        <div class="app-sidebar">
            @include('dashboard.partials.sidebar')
        </div>

        <div class="app-container">
            <div class="search">
                <form>
                    <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
            </div>
            {{-- header --}}
            <div class="app-header">
                @include('dashboard.partials.header')
            </div>
            <div class="app-content">
                @yield('main')
            </div>
        </div>
        @include('sweetalert::alert')

    </div>


    <!-- Javascripts -->
    <script src="{{ asset('js/dashboard/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/main.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/custom.js') }}"></script>
    {{-- <script src="{{ asset('js/dashboard/dashboard.js') }}"></script> --}}
    <script src="{{ asset('js/priview-image.js') }}"></script>
</body>

</html>
