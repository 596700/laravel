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


                    <input type="text" id="defaultSaveFormUserName" class="form-control" placeholder="ユーザ名"
                        value="{{ $user->name }}" name="name">

                    <input type="text" id="defaultSaveFormEmail" class="form-control" placeholder="メールアドレス"
                        value="{{ $user->email }}" name="email">


                    <button class="btn btn-info btn-block" type="submit">Save</button>

                </form>

            </div>
        </div>
    </div>

@endsection
