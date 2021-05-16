@extends('layouts.app')

@section('title', 'ウォッチリスト一覧')

@section('content')

    @include('layouts.nav')

    <div class="container">
        @include('layouts.error_card_list')
        @include('layouts.flash_message')

        <div class="d-flex justify-content-end">
            <a href="{{ route('watch_list.create') }}"><button type="button" class="btn btn-outline-primary btn-sm">ウォッチリスト登録</button></a>
        </div>

        @if ($product_versions)
        <div class="items">
            @include('watch_list.pagination_data')
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
