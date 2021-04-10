@extends('layouts.app')

@section('title', 'ウォッチリスト登録')

@section('content')

    @include('layouts.nav')

    <div class="container">
        @include('layouts.error_card_list')
        <div class="row justify-content-center">
            <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">
                <form class="border border-light p-5" method="POST" action="{{ route('watch_list.store') }}">
                    @csrf
                    <p class="text-center">製品/バージョン一覧</p>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <select id="product_version" class="selectpicker form-control" data-live-search="true" multiple
                                data-width="fit" data-selected-text-format="count" name="product_version_id[]">
                                @foreach ($product_versions as $product_version)
                                    <option value="{{ $product_version->id }}">
                                        {{ $product_version->product->name }}/{{ $product_version->version->version }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn btn-info btn-block" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
