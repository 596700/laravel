@extends('layouts.app')

@section('title', 'バージョン編集')

@section('content')

    @include('layouts.nav')

    <div class="container">
        @include('layouts.error_card_list')
        <div class="row justify-content-center">
            <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">


                <form class="border border-light p-5" method="POST"
                    action="{{ route('version.update', ['version' => $version->id]) }}">
                    @method('PATCH')
                    @csrf

                    <p class="h4 mb-4 text-center">バージョン編集</p>

                    <input type="text" id="defaultUpdateFormVersionName" class="form-control" placeholder="バージョン名"
                        value="{{ $version->version }}" name="version">
                    <small id="defaultUpdateFormVersionNameHelpBlock"
                        class="form-text text-muted mb-4">バージョン名は英数字記号(-.)にしてください。</small>
                    <div class="valid-feedback">適切なバージョン名の形式となっています。</div>
                    <div class="invalid-feedback">バージョン名は半角英数字記号(-.)にしてください。</div>


                    <button class="btn btn-info btn-block" type="submit" id="defaultUpdateButton">Update</button>

                </form>

            </div>
        </div>
    </div>
    @include('javascript.validate_update_version')

@endsection
