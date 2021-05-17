@extends('templates.auth')
@section('content')
<!-- Outer Row -->
<div class="row justify-content-center mt-5 pt-lg-5">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-lg-5 p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                        @if (\Session::has('failed'))
    <div class="alert alert-danger">
            {!! \Session::get('failed') !!}
    </div>
@endif
                        <form method = "post" action="/login">
            {{ csrf_field() }}
                            <div class="text-center mb-4">
                                <h1 class="h4 text-gray-900">Aplikasi Pengadaan Barang</h1>
                                <span class="text-muted">Login</span>
                            </div>
                            <div class="form-group">
                                <input autofocus="autofocus" autocomplete="off" value="" type="text" name="username" class="form-control form-control-user" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Login
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop