@extends('layouts.app')

@section('title', 'ログイン')

@section('content')

@include('layouts.nav')

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
                                <label class="custom-control-label" for="defaultLoginFormRemember">パスワードを記憶させる</label>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('user.password.request') }}">パスワードを忘れた方はこちら</a>
                        </div>
                    </div>

                    <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

                    <div class="text-center">
                        <p>
                            <a href="{{ route('user.register') }}">会員登録</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
