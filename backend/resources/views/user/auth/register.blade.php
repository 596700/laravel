@extends('layouts.app')

@section('title', 'ユーザー登録')

    @include('layouts.nav')

@section('content')

@include('layouts.error_card_list')
    <div class="container">
        <div class="row">
            <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
                <form class="border border-light p-5" method="POST" action="{{ route('user.register') }}">
                    @csrf

                    <p class="h4 mb-4 text-center">ユーザー登録</p>

                    <div class="form-group row">
                        <input class="form-control" id="defaultRegisterFormUserName" type="text" placeholder="ユーザー名"
                            name="name" value="{{ old('name') }}">
                    </div>

                    <div class="form-group row">
                        <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="メールアドレス"
                            name="email" value="{{ old('email') }}">
                    </div>

                    <div class="form-group row">
                        <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="パスワード"
                            aria-describedby="defaultRegisterFormPasswordHelpBlock" name="password">
                    </div>

                    <div class="form-group row">
                        <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="パスワード(確認)"
                            aria-describedby="defaultRegisterFormPasswordHelpBlock" name="password_confirmation">
                    </div>

                    <div class="form-group row">
                        <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">Minimal 8 characters
                            lenght</small>
                    </div>

                    <button class="btn btn-info my-4 btn-block" type="submit">登録</button>

                </form>
            </div>
        </div>
    </div>
@endsection
