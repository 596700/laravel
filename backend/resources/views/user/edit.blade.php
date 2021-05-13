@extends('layouts.app')

@section('title', 'プロフィール編集')

@section('content')

    @include('layouts.nav')

    <div class="container">
        @include('layouts.error_card_list')
        <div class="row justify-content-center">
            <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">


                <form class="border border-light p-5" method="POST"
                    action="{{ route('user.update', ['user' => $user->id]) }}">
                    @method('PATCH')
                    @csrf

                    <p class="h4 mb-4 text-center">プロフィール編集</p>

                    <div class="form-group row">
                        <input type="text" id="defaultUpdateFormUserName" class="form-control" placeholder="ユーザ名"
                            value="{{ $user->name }}" name="name" required>
                        <small id="defaultUpdateFormUserNameHelpBlock"
                            class="form-text text-muted">ユーザー名は1文字以上30文字以下で入力してください。</small>
                        <div class="valid-feedback">適切なユーザー名の形式となっています。</div>
                        <div class="invalid-feedback">ユーザー名は1文字以上30文字以下で入力してください。</div>
                    </div>

                    <div class="form-group row">
                        <input type="text" id="defaultUpdateFormEmail" class="form-control" placeholder="メールアドレス"
                            value="{{ $user->email }}" name="email" required>
                        <small id="defaultUpdateFormEmailHelpBlock"
                            class="form-text text-muted">ご自身の有効なメールアドレス(例:username@domain.xyz)を入力してください。</small>
                        <div class="valid-feedback">適切なメールアドレスの形式となっています。</div>
                        <div class="invalid-feedback">ご自身の有効なメールアドレス(例:username@domain.xyz)を入力してください。</div>
                    </div>


                    <button class="btn btn-info btn-block" type="submit" id="defaultUpdateButton">Update</button>

                </form>

            </div>
        </div>
    </div>
    @include('javascript.validate_update_user')

@endsection
