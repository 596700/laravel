@extends('layouts.app')

@section('title', 'バージョン登録')

@section('content')

    @include('layouts.nav')

    <div class="container">
        @include('layouts.error_card_list')
        <div class="row justify-content-center">
            <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">

                <form class="border border-light p-5" method="POST" action="{{ route('version.store') }}">
                    @csrf

                    <p class="h4 mb-4 text-center">バージョン登録</p>

                    <div class="form-group row">
                        <input type="text" id="defaultSaveFormVersionName" class="form-control" placeholder="バージョン名"
                            value="{{ old('version') }}" name="version">
                        <small id="defaultSaveFormVersionHelpBlock"
                            class="form-text text-muted mb-4">バージョン名は英数字記号(-.)にしてください。</small>
                        <div class="valid-feedback">適切なバージョン名の形式となっています。</div>
                        <div class="invalid-feedback">バージョン名は半角英数字記号(-.)にしてください。</div>
                    </div>
                    <button class="btn btn-info btn-block" type="submit" id="defaultSaveButton" disabled>Save</button>
                </form>
            </div>
        </div>
    </div>
    @include('javascript.validate_create_version')

@endsection
