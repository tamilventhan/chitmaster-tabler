@php
    $layoutData['cssClasses'] = 'navbar navbar-expand-md navbar-overlap d-print-none';
@endphp
@section('body')
    <body>
    <div class="page">
        <!-- Top Navbar -->
        @include('tablar::partials.navbar.overlap-topbar')
        <div class="page-wrapper">
            <!-- Page Content -->
            @yield('content')
            @if (isset($slot))
            <main>
                {{ $slot }}
            </main>
            @endif
            @include('tablar::partials.footer.bottom')
        </div>
    </div>
    </body>
@stop
