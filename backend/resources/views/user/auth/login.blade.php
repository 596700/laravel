@extends('layouts.app')

@section('title', 'ログイン')

@section('content')

    @include('layouts.nav')

    @include('javascript.show_password_login')

    <div class="container">
        @include('layouts.error_card_list')
        <div class="row">
            <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
                <form class="border border-light p-5" method="POST" action="{{ route('user.login') }}">
                    @csrf

                    <p class="h4 mb-4 text-center">Sign in</p>

                    <div class="form-group row">
                        <input type="email" id="defaultLoginFormEmail" class="form-control" placeholder="メールアドレス"
                            name="email" value="{{ old('email') }}">
                        <small id="defaultLoginFormEmailHelpBlock"
                            class="form-text text-muted">ご自身の有効なメールアドレス(例:username@domain.xyz)を入力してください。</small>
                    </div>

                    <div class="form-group row">
                        <input type="password" id="defaultLoginFormPassword" class="form-control" placeholder="パスワード"
                            name="password">
                        <small id="defaultLoginFormPasswordHelpBlock" class="form-text text-muted">パスワードを入力してください。</small>
                    </div>

                    {{-- <div class="d-flex align-items-start"> --}}
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="defaultLoginShowPassword"
                            onClick="showPassword()">
                        <label class="custom-control-label" for="defaultLoginShowPassword">パスワードを表示させる</label>
                    </div>
                    {{-- </div> --}}

                    {{-- <div class="d-flex align-items-start"> --}}
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember" name="remember">
                        <label class="custom-control-label" for="defaultLoginFormRemember">パスワードを記憶させる</label>
                    </div>
                    {{-- </div> --}}

                    <button class="btn btn-info btn-block my-4" type="submit" id="defaultLoginButton" disabled>Sign
                        in</button>

                    <div class="text-center">
                        <p>
                            <a href="{{ route('user.register') }}">会員登録</a>
                        </p>
                        <a href="{{ route('user.password.request') }}">パスワードを忘れた方はこちら</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('javascript.validate_login_user')

@endsection
