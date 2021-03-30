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
                        <select class="browser-default custom-select" id="select" name="product_id" required>
                            <option value="" disabled selected>製品を選択してください</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group row">
                        <select class="browser-default custom-select" id="select" name="version_id" required>
                            <option value="" disabled selected>バージョンを選択してください</option>
                            @foreach ($versions as $version)
                                <option value="{{ $version->id }}">{{ $version->version }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-info btn-block" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>

@endsection
