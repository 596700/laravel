@extends('layouts.app')

@section('title', 'ログイン')

    @include('layouts.nav')

@section('content')
    <div class="container">
        <div class="row">
            <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
                <form class="border border-light p-5" method="POST" action="{{ route('user.login') }}">
                    @csrf

                    <p class="h4 mb-4 text-center">Sign in</p>

                    <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="メールアドレス" name="email" value="{{ old('email') }}">

                    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="パスワード" name="password">

                    <div class="d-flex justify-content-between">
                        <div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember" name="remember">
                                <label class="custom-control-label" for="remember">Remember me</label>
                            </div>
                        </div>
                        <div>
                            <a href="">Forgot password?</a>
                        </div>
                    </div>

                    <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

                    <div class="text-center">
                        <p>Not a member?
                            <a href="{{ route('user.register') }}">Register</a>
                        </p>

                        <p>or sign in with:</p>
                        <a type="button" class="light-blue-text mx-2">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a type="button" class="light-blue-text mx-2">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a type="button" class="light-blue-text mx-2">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a type="button" class="light-blue-text mx-2">
                            <i class="fab fa-github"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
