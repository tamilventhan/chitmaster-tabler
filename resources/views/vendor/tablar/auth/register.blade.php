@extends('tablar::auth.layout')
@section('title', 'Register')
@section('content')
<div class="container container-tight py-4">
    <div class="text-center mb-1 mt-5">
        <a href="" class="navbar-brand navbar-brand-autodark">
            <img src="{{asset(config('tablar.auth_logo.img.path','assets/logo.svg'))}}" height="36" alt=""></a>
    </div>
    <form class="card card-md" action="{{route('register')}}" method="post" autocomplete="off" novalidate>
        @csrf
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Create new account</h2>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    placeholder="Enter name">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Enter email">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group input-group-flat">
                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Password" autocomplete="off">
                        <div class="input-group-text">
                            <a href="#" class="link-secondary" id="showPasswordToggle">
                                <span id="showPassword" title="Show password"
                                    data-bs-toggle="tooltip">@include('icons.eye')</span>
                                <span id="HidePassword" class="d-none" title="Hide password"
                                    data-bs-toggle="tooltip">@include('icons.eye-off')</span>
                            </a>
                        </div>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <div class="input-group input-group-flat">
                    <input type="password" id="confirmPassword" name="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Password"
                        autocomplete="off">
                        <div class="input-group-text">
                            <a href="#" class="link-secondary" id="showConfirmPasswordToggle">
                                <span id="showConfirmPassword" title="Show password"
                                    data-bs-toggle="tooltip">@include('icons.eye')</span>
                                <span id="HideConfirmPassword" class="d-none" title="Hide password"
                                    data-bs-toggle="tooltip">@include('icons.eye-off')</span>
                            </a>
                        </div>
                    @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" />
                    <span class="form-check-label">Agree the <a href="#" tabindex="-1">terms and policy</a>.</span>
                </label>
            </div>
            <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Create new account</button>
            </div>
        </div>
    </form>
    <div class="text-center text-muted mt-3">
        Already have account? <a href="{{route('login')}}" tabindex="-1">Sign in</a>
    </div>
</div>
@endsection
