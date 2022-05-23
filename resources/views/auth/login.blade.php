@extends('layouts.guest')

@section('content')
<div class="col-12">
    <div class="text-lg mb-4">
        <img class="mr-2 float-left" src="{{ asset('assets/img/logo.svg') }}" height="50" />
        <div>
            <strong class="d-block">Pojok Pajak</strong>
            <span class="text-xs d-block">Sistem Informasi Perpajakan</span>
        </div>
    </div>
    <form class="user" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <input autofocus required type="number" name="npwp" class="form-control form-control-user"
                placeholder="NPWP">
        </div>
        <div class="form-group">
            <input required type="password" name="password" class="form-control form-control-user"
                placeholder="Password">
        </div>
        <div class="form-group">
            <div class="custom-control custom-checkbox small">
                <input type="checkbox" class="custom-control-input" name="remember" id="remember">
                <label class="custom-control-label" for="remember">Ingat saya</label>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Login
            </button>
        </div>
        @if (Route::has('password.request'))
        <div class="form-group text-center mb-0">
            Lupa password? <a href="{{ route('password.request') }}">Reset di sini</a>
        </div>
        @endif
    </form>
</div>
@endsection