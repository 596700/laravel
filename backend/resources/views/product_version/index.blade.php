@extends('layouts.app')

@section('title', '製品/バージョン一覧')

@section('content')

    @include('layouts.nav')

    <div class="container">
        @include('layouts.error_card_list')
        @include('layouts.flash_message')

        <div class="d-flex justify-content-end">
            <form class="form-inline d-flex float-right md-form form-sm mt-0"
                action="{{ route('product_version.index') }}">
                <i class="fas fa-search" aria-hidden="true"></i>
                <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search"
                    name="keyword" value="{{ empty(old()) ? $keyword : old('keyword') }}">
            </form>
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('product_version.create') }}"><button type="button"
                    class="btn btn-outline-primary btn-sm">製品/バージョン登録</button></a>
        </div>

        @if ($product_versions->count())
            <div class="items">
                @include('product_version.pagination_data')
            </div>
    </div>

@else

    <div class="card-text text-left alert alert-info">
        <ul class="mb-0">
            <li>Not Found</li>
        </ul>
    </div>

    @endif

    @include('javascript.ajax')

@endsection
