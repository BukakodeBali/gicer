<!DOCTYPE html>
<html class="{{ request()->routeIs('home') ? '' : 'global-gradient-background' }}">
<head>
    <title>{{ isset($title) ? $title." - " : "" }}Global Improvement Certification</title>
    <!-- meta and the others -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ isset($link) ? url($link) : url() }}" rel='canonical' />
    <link rel="shortcut icon" href="{{ url('assets/images/base/pavicon.png') }}">
    <meta content='website' property='og:type' />
    <meta content='Indonesia' name='geo.placename' />
    <meta content='id' name='geo.country' />
    <meta name="description" content="{{ $meta_description ?? '' }}"/>
    <meta property="og:title" content="{{ isset($title) ? $title." - Global Improvement Certification" : "Global Improvement Certification" }}"/>
    <meta property="og:description" content="{{ $meta_description ?? '' }}"/>
    <meta property="og:image" content="{{ $image ?? url('images/base/default-400.png') }}"/>

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.min.css')  }}" />
    <!-- fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/work-sans.css') }}">
    <!-- Custom Styling -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ksm-custome.css?v=0.0.1') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/uikit-sticky.css') }}">
    <!-- Flicking -->
    <link rel="stylesheet" href="https://unpkg.com/@egjs/flicking/dist/flicking.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://unpkg.com/@egjs/flicking/dist/flicking-inline.css" crossorigin="anonymous" />
    <!-- UIkit JS -->
    <script src="{{ asset('assets/js/uikit.min.js') }}"></script>
    <script src="{{ asset('assets/js/uikit-icons.min.js') }}"></script>
    <!-- Flicking -->
    <script src="https://unpkg.com/@egjs/flicking/dist/flicking.pkgd.min.js" crossorigin="anonymous"></script>
    <!-- Custom JS -->
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

