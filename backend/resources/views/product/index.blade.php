@extends('layouts.app')

@section('title', '製品一覧')

@section('content')

    @include('layouts.nav')

    <form class="form-inline d-flex float-right md-form form-sm mt-0" action="{{ route('product.index') }}">
        <i class="fas fa-search" aria-hidden="true"></i>
        <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search"
            name="keyword" value="{{ empty(old()) ? $keyword : old('keyword') }}">
    </form>

    @include('layouts.error_card_list')

    @if ($products->count())
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">製品名</th>
                        <th scope="col">ベンダURL</th>
                        <th scope="col">種別</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><a href="{{ route('product.show', ['product' => $product->id]) }}">
                                    {{ $product->name }}</a>
                            </td>
                            <td><a href="{{ $product->vendor_url }}">{{ $product->vendor_url }}</a></td>
                            <td>{{ $product->part }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                {{ $products->links() }}
            </div>
        </div>

    @else
        <p>Not Found</p>
    @endif


@endsection
