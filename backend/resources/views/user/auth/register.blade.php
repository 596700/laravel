@extends('layouts.app')

@section('title', '会員登録')

@section('content')

    @include('layouts.nav')

    @include('javascript.show_password_register')

    @include('layouts.error_card_list')
    <div class="container">
        <div class="row">
            <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
                <form class="border border-light p-5" method="POST" action="{{ route('user.register') }}">
                    @csrf

                    <p class="h4 mb-4 text-center">会員登録</p>

                    <div class="form-group row">
                        <input type="text" id="defaultRegisterFormUserName" class="form-control" placeholder="ユーザー名"
                            name="name" value="{{ old('name') }}" max="255" required>
                        <small id="defaultRegisterFormUserNameHelpBlock"
                            class="form-text text-muted">ユーザー名は1文字以上30文字以下で入力してください。</small>
                        <div class="valid-feedback">適切なユーザー名の形式となっています。</div>
                        <div class="invalid-feedback">ユーザー名は1文字以上30文字以下で入力してください。</div>
                    </div>

                    <div class="form-group row">
                        <input type="email" id="defaultRegisterFormEmail" class="form-control" placeholder="メールアドレス"
                            name="email" value="{{ old('email') }}" max="255" required>
                        <small id="defaultRegisterFormEmailHelpBlock"
                            class="form-text text-muted">ご自身の有効なメールアドレス(例:username@domain.xyz)を入力してください。</small>
                        <div class="valid-feedback">適切なメールアドレスの形式となっています。</div>
                        <div class="invalid-feedback">ご自身の有効なメールアドレス(例:username@domain.xyz)を入力してください。</div>
                    </div>

                    <div class="form-group row">
                        <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="パスワード"
                            aria-describedby="defaultRegisterFormPasswordHelpBlock" name="password" minlength="8" required>
                        <small id="defaultRegisterFormPasswordHelpBlock"
                            class="form-text text-muted">8文字以上の英数字記号で入力してください。</small>
                        <div class="valid-feedback">適切なパスワードとなっています。</div>
                        <div class="invalid-feedback">8文字以上の英数字記号で入力してください。</div>
                    </div>

                    <div class="form-group row">
                        <input type="password" id="defaultRegisterFormPasswordConfirmation" class="form-control"
                            placeholder="パスワード(確認)" aria-describedby="defaultRegisterFormPasswordHelpBlock"
                            name="password_confirmation" minlength="8" required>
                        <small id="defaultRegisterFormPasswordConfirmationHelpBlock"
                            class="form-text text-muted">パスワードと同じものを入力してください。</small>
                        <div class="valid-feedback">適切なパスワードとなっています。</div>
                        <div class="invalid-feedback">適切なパスワードを入力してください。</div>
                    </div>

                    <div>
                        <input type="checkbox" onClick="showPassword()">Show Password
                    </div>
                    <br />

                    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                        本サイトはポートフォリオ作品のためセキュリティの保証ができません。<br />
                        実際にご利用のメールアドレスと異なるパスワードでの登録をおすすめします。
                    </small>

                    <button class="btn btn-info my-4 btn-block" id="defaultRegisterButton" type="submit"
                        disabled>登録</button>
                    <small class="form-text text-muted mb-4">登録完了後メールアドレス宛にメールが送信されます。</small>

                </form>
            </div>
        </div>
    </div>
    @include('javascript.validate_register_user')
@endsection
