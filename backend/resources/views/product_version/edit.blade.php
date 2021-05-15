@extends('layouts.app')

@section('title', '製品/バージョン編集')

@section('content')

    @include('layouts.nav')

    <div class="container">
        @include('layouts.error_card_list')
        <div class="row justify-content-center">
            <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">


                <form class="border border-light p-5" method="POST"
                    action="{{ route('product_version.update', ['product_version' => $product_version->id]) }}">
                    @method('PATCH')
                    @csrf

                    <p class="h4 mb-4 text-center">製品/バージョン編集</p>

                    <p class="text-center">
                        現在の製品/バージョン:
                        <strong>{{ $product_version->product->name }}</strong>/<strong>{{ $product_version->version->version }}</strong>
                    </p>

                    <div class="form-group row">
                        <select class="browser-default custom-select" id="defaultUpdateFormProduct" name="product_id"
                            required>
                            <option value="" disabled>製品</option>
                            @foreach ($products as $product)
                                @if ($product->id === $product_version->product->id)
                                    <option value="{{ $product->id }}" selected>
                                        {{ $product_version->product->name }}</option>
                                @else
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <small id="defaultUpdateFormProductHelpBlock" class="form-text text-muted">製品を選択してください。</small>
                        <div class="valid-feedback">製品が選択されました。</div>
                    </div>

                    <div class="form-group row">
                        <select class="browser-default custom-select" id="defaultUpdateFormVersion" name="version_id"
                            required>
                            <option value="" disabled>バージョン</option>
                            @foreach ($versions as $version)
                                @if ($version->id === $product_version->version->id)
                                    <option value="{{ $version->id }}" selected>{{ $version->version }}</option>
                                @else
                                    <option value="{{ $version->id }}">{{ $version->version }}</option>
                                @endif
                            @endforeach
                        </select>
                        <small id="defaultUpdateFormVersionHelpBlock" class="form-text text-muted">バージョンを選択してください。</small>
                        <div class="valid-feedback">バージョン選択されました。</div>
                    </div>

                    <button class="btn btn-info btn-block" type="submit" id="defaultUpdateButton">Update</button>

                </form>

            </div>
        </div>
    </div>

    @include('javascript.validate_update_product_version')

@endsection
