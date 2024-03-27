@extends('tablar::auth.layout')
@section('content')
@section('title', 'Forgot Password')
<div class="container py-5">
    <div class="col-md-6 offset-md-3">
        <x-authentication-card>
            <x-slot name="logo">
                {{--
                <x-authentication-card-logo /> --}}
            </x-slot>

            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a
                password reset link that will allow you to choose a new one.') }}
            </div>

            @session('status')
            <div class="mb-4 font-medium text-sm text-green">
                {{ $value }}
            </div>
            @endsession

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" type="email" name="email" :value="old('email')"
                        required autofocus autocomplete="username" />
                </div>

                <div class="mt-4 d-lg-flex justify-content-lg-between">
                    <x-button>
                        {{ __('Email Password Reset Link') }}
                    </x-button>
                    <a href="{{ route('login') }}">back to Login</a>
                    
                </div>
            </form>
        </x-authentication-card>
    </div>
</div>
@endsection