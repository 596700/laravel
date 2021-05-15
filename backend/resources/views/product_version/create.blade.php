@extends('layouts.app')

@section('title', '製品/バージョン登録')

@section('content')

    @include('layouts.nav')

    <div class="container">
        @include('layouts.error_card_list')
        <div class="row justify-content-center">
            <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">

                <form class="border border-light p-5" method="POST" action="{{ route('product_version.store') }}">
                    @csrf

                    <p class="h4 mb-4 text-center">製品/バージョン登録</p>

                    <div class="form-group row">
                        <select class="browser-default custom-select" id="defaultSaveFormProduct" name="product_id"
                            required>
                            <option value="" disabled selected>製品</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        <small id="defaultSaveFormProductHelpBlock" class="form-text text-muted">製品を選択してください。</small>
                        <div class="valid-feedback">製品が選択されました。</div>
                    </div>

                    <div class="form-group row">
                        <select class="browser-default custom-select" id="defaultSaveFormVersion" name="version_id"
                            required>
                            <option value="" disabled selected>バージョン</option>
                            @foreach ($versions as $version)
                                <option value="{{ $version->id }}">{{ $version->version }}</option>
                            @endforeach
                        </select>
                        <small id="defaultSaveFormVersionHelpBlock" class="form-text text-muted">バージョンを選択してください。</small>
                        <div class="valid-feedback">バージョン選択されました。</div>
                    </div>

                    <button class="btn btn-info btn-block" type="submit" id="defaultSaveButton" disabled>Save</button>
                </form>
            </div>
        </div>
    </div>

    @include('javascript.validate_create_product_version')
    

@endsection
