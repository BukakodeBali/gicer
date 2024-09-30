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
    <meta property="og:title" content="{{ isset($title) ? $title." - Karya Sinergi Manajemen" : "Karya Sinergi Manajemen" }}"/>
    <meta property="og:description" content="{{ $meta_description ?? '' }}"/>
    <meta property="og:image" content="{{ $image ?? url('images/base/default-400.png') }}"/>

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.min.css')  }}" />
    <!-- fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/overpass.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chivo.css') }}">
    <!-- Custome Styling -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ksm-custome.css?v=1') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/uikit-sticky.css') }}">
    <!-- UIkit JS -->
    <script src="{{ asset('assets/js/uikit.min.js') }}"></script>
    <script src="{{ asset('assets/js/uikit-icons.min.js') }}"></script>
    <script src="{{ asset('assets/js/uikit-custome.js') }}"></script>
    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1224625218688616');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=1224625218688616&ev=PageView&noscript=1"
    />
    </noscript>
    <!-- End Meta Pixel Code -->
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

