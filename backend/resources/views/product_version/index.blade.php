@extends('layouts.app')

@section('title', '製品/バージョン一覧')

@section('content')

    @include('layouts.nav')

    <div class="container">
        @include('layouts.error_card_list')

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
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">製品/バージョン</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product_versions as $product_version)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td title="製品/バージョン詳細"><a
                                        href="{{ route('product_version.show', ['product_version' => $product_version->id]) }}">
                                        {{ $product_version->product->name }}/{{ $product_version->version->version }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    {{ $product_versions->appends(request()->input())->links() }}
                </div>
            </div>
    </div>

@else

    <div class="card-text text-left alert alert-info">
        <ul class="mb-0">
            <li>Not Found</li>
        </ul>
    </div>

    @endif


@endsection
