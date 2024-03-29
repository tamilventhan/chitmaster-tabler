<div>

    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Employees
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            @if(config('tablar','display_alert'))
            @include('tablar::common.alert')
            @endif

            <!-- Page Content goes here -->
            <div class="row row-deck row-cards">

                @foreach($employees as $employee)
                    
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-body p-4 text-center">
                            {{-- <span class="avatar avatar-xl mb-3 rounded"style="background-image: url({{ asset('storage/'.$employee->avatar) }})"></span> --}}
                            <img src="{{ $employee->profile_photo_url }}" alt="{{ $employee->name }}" class="avatar avatar-xl mb-3 rounded">
                            <h3 class="m-0 mb-1"><a href="#">{{ $employee->name }}</a></h3>
                            <div class="text-secondary">{{ $employee->email ??'' }}</div>
                            <div class="mt-3">
                                <span class="badge bg-purple-lt">{{ $employee->designation->name??'' }}</span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a href="#" class="card-btn">
                                <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z">
                                    </path>
                                    <path d="M3 7l9 6l9 -6"></path>
                                </svg>
                                Email
                            </a>
                            <a href="#" class="card-btn">
                                <!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                                    </path>
                                </svg>
                                Call
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="d-flex mt-4 justify-content-center">
                    {{ $employees->links('tablar::pagination') }}
                </div>
            </div>

        </div>
    </div>

</div>