@extends('layouts.auth')

@section('content')
<div class="login-wrapper">
    <div class="login-card row g-0">

        {{-- KIRI --}}
        <div class="col-md-5 login-left d-flex align-items-center justify-content-center">
            <img src="{{ asset('logo.png') }}" alt="Logo TK">
        </div>

        {{-- KANAN --}}
        <div class="col-md-7 login-right">
            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf

                <input type="text"
                       name="username"
                       class="form-control input-custom"
                       placeholder="Username"
                       required>

                <input type="password"
                       name="password"
                       class="form-control input-custom"
                       placeholder="Password"
                       required>

                <button class="btn btn-login">
                    Log In
                </button>

                @if(session('error'))
                    <div class="login-error">
                        {{ session('error') }}
                    </div>
                @endif
            </form>
        </div>

    </div>
</div>
@endsection
