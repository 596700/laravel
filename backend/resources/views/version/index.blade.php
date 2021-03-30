@extends('layouts.app')

@section('title', 'バージョン一覧')

@section('content')

    @include('layouts.nav')

    <div class="container">
        @include('layouts.error_card_list')

        <form class="form-inline d-flex float-right md-form form-sm mt-0" action="{{ route('version.index') }}">
            <i class="fas fa-search" aria-hidden="true"></i>
            <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search"
                name="keyword" value="{{ empty(old()) ? $keyword : old('keyword') }}">
        </form>

        @if ($versions->count())
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">バージョン名</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($versions as $version)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><a href="{{ route('version.show', ['version' => $version->id]) }}">
                                        {{ $version->version }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    {{ $versions->appends(request()->input())->links() }}
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
