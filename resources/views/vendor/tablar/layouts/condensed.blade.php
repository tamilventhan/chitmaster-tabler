@php
    $stickyTopClass = config('tablar.sticky_top_nav_bar') ? 'sticky-top' : '';
    $layoutData['cssClasses'] = 'navbar navbar-expand-md ' . $stickyTopClass . ' d-print-none';
    $fontStyle = config('tablar.font_style') ? 'Space Grotesk, sans-serif' : '';
@endphp
@section('body')
    <body style="font-family:{{ $fontStyle }}">
    <div class="page">
        <!-- Top Navbar -->
        @include('tablar::partials.navbar.condensed-top')
        <div class="page-wrapper">
            <!-- Page Content -->
            @yield('content')
            @include('tablar::partials.footer.bottom')
        </div>
    </div>
    </body>
@endsection
