@extends('layouts.auth')
@section('title-content', 'Forgot Password')
@section('body-class', 'login-page')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('login') }}"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                @session('status')
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endsession
                <form action="{{ route('password.email') }}" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" value="{{ old('email') }}" />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <!--begin::Row-->
                    <div class="row">
                        <!-- /.col -->
                        <div class="">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Send me link</button>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!--end::Row-->
                </form>
                <!-- /.social-auth-links -->
                <p class="mb-1 text-center"><a href="{{ route('login') }}">Go to login</a></p>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection