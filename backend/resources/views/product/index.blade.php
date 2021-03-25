@extends('layouts.app')

@section('title', '製品一覧')

@section('content')

    @include('layouts.nav')

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
                        <td><a href="{{ route('product.show', ['product' => $product->id]) }}"> {{ $product->name }}</a></td>
                        <td><a href="{{ $product->vendor_url }}">{{ $product->vendor_url }}</a></td>
                        <td>{{ $product->part }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
