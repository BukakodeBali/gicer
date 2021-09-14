<!DOCTYPE html>
<html>
<head>
    <title>{{ isset($title) ? $title." - " : "" }}Karya Sinergi Manajemen</title>
    <!-- meta and the others -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ isset($link) ? url($link) : url() }}" rel='canonical' />
    <link rel="shortcut icon" href="{{ url('assets/images/base/pavicon.png') }}">
    <meta content='website' property='og:type' />
    <meta content='Indonesia' name='geo.placename' />
    <meta content='id' name='geo.country' />
    <meta name="description" content="{{ $meta_description ?? '' }}"/>

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.min.css')  }}" />
    <!-- fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/overpass.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chivo.css') }}">
    <!-- Custome Styling -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ksm-custome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/uikit-sticky.css') }}">
    <!-- UIkit JS -->
    <script src="{{ asset('assets/js/uikit.min.js') }}"></script>
    <script src="{{ asset('assets/js/uikit-icons.min.js') }}"></script>
    <script src="{{ asset('assets/js/uikit-custome.js') }}"></script>

</head>
<body>
<div id="body-outer" style="min-height: 100%">
    <div class="body-main">
        <!-- navbar -->
        @stack('menu')
        <!-- end of navbar -->
        @yield('content')
        @stack('quick-contact')
    </div>
    @stack('footer')
</div>
@stack('offcanvas')
@stack('page-script')
</body>
</html>

