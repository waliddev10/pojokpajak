@extends('layouts.guest')

@section('content')
<div class="col-12">
    <div class="mb-4">
        <img class="mr-2 float-left" src="{{ asset('assets/img/logo.svg') }}" height="40" />
        <div>
            <strong class="d-block">Pojok Pajak</strong>
            <span class="text-xs d-block">Sistem Informasi Perpajakan</span>
        </div>
    </div>
    <form class="user" method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="form-group text-lg text-center">
            <strong>Reset Password</strong>
        </div>
        <div class="form-group">
            <input required type="email" name="email" class="form-control form-control-user" placeholder="Alamat Email"
                value={{ old('email', $request->email) }}>
        </div>
        <div class="form-group">
            <input required type="password" name="password" class="form-control form-control-user"
                placeholder="Password Baru">
        </div>
        <div class="form-group">
            <input required type="password" name="password_confirmation" class="form-control form-control-user"
                placeholder="Konfirmasi Password Baru">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Ubah Password
            </button>
        </div>
        <div class="form-group text-center mb-0">
            Perlu masuk? <a href="{{ route('login') }}">Login</a>
        </div>
    </form>
</div>
@endsection

{{-- <form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <label for="email" :value="__('Email')" />

        <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
            autofocus />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <label for="password" :value="__('Password')" />

        <input id="password" class="block mt-1 w-full" type="password" name="password" required
            autocomplete="current-password" />
    </div>

    <!-- Remember Me -->
    <div class="block mt-4">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox"
                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                name="remember">
            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
    </div>

    <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
        </a>
        @endif

        <button type="submit" class="ml-3">
            {{ __('Log in') }}
        </button>
    </div>
</form> --}}