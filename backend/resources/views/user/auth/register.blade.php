@extends('layouts.app')

@section('title', 'ユーザー登録')

@section('content')

    @include('layouts.nav')

    @include('layouts.error_card_list')
    <div class="container">
        <div class="row">
            <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
                <form class="border border-light p-5" method="POST" action="{{ route('user.register') }}">
                    @csrf

                    <p class="h4 mb-4 text-center">会員登録</p>

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
                        <small id="defaultRegisterFormPasswordHelpBlock"
                            class="form-text text-muted mb-4">パスワードは8文字以上の英数字記号にしてください<br />
                            本サイトはポートフォリオ作品のためセキュリティの保証ができません<br />
                            実際にご利用のメールアドレスと異なるパスワードでの登録をおすすめします
                        </small>
                    </div>




                    <button class="btn btn-info my-4 btn-block" type="submit">登録</button>
                    <small class="form-text text-muted mb-4">登録完了後メールアドレス宛にメールが送信されます</small>

                </form>
            </div>
        </div>
    </div>
@endsection
