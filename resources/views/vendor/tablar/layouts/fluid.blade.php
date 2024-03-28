@php
    $stickyTopClass = config('tablar.sticky_top_nav_bar') ? 'sticky-top' : '';
    $layoutData['cssClasses'] =  'navbar navbar-expand-md ' . $stickyTopClass .' d-print-none';
    $fontStyle = config('tablar.font_style') ? 'Space Grotesk, sans-serif' : '';
@endphp
@section('body')
    <body class="layout-fluid" style="font-family:{{ $fontStyle }}">
    <div class="page">
        <!-- Top Navbar -->
        @include('tablar::partials.navbar.topbar')
        <div class="page-wrapper">
            <!-- Page Content -->
            @yield('content')
            @include('tablar::partials.footer.bottom')
        </div>
    </div>
    @livewireScripts
    </body>
@stop
