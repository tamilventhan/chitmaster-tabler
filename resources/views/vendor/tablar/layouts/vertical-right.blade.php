@php
    $layoutData['cssClasses'] =  'navbar navbar-vertical navbar-right navbar-expand-lg';
    $fontStyle = config('tablar.font_style') ? 'Space Grotesk, sans-serif' : '';
@endphp
@section('body')
    <body style="font-family:{{ $fontStyle }}">
    <div class="page">
        <!-- Sidebar -->
        @include('tablar::partials.navbar.sidebar')
        <div class="page-wrapper">
            <!-- Page Content -->
            @yield('content')
            @include('tablar::partials.footer.bottom')
        </div>
    </div>
    </body>
@stop
