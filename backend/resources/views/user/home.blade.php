@extends('layouts.app')

@section('title', 'CVE Database')

@section('content')

    @include('layouts.nav')

    <img src="images/top.jpeg" class="img-fluid d-block mx-auto" alt="Responsive image"
        style="width: 100%; object-fit: cover;">

    <div class="container">
        @include('layouts.flash_message')

        <div class="row justify-content-center">
            <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">

                <p class="text-left">最新のCVE情報</p>

                <div class="d-flex">
                    <a class="twitter-timeline" data-width="50%" data-height="800" data-theme="dark"
                        href="https://twitter.com/CVEnew?ref_src=twsrc%5Etfw">Tweets by CVEnew</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

                    <a class="twitter-timeline" data-width="50%" data-height="800" data-theme="dark"
                        href="https://twitter.com/CVEannounce?ref_src=twsrc%5Etfw">Tweets by
                        CVEannounce</a>
                    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>

                <br />
                @if ($products->count())
                    <p class="text-left">最近登録された製品(最大5件)</p>
                    <div class="table-responsive-sm">
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
                                        <td title="製品詳細"><a
                                                href="{{ route('product.show', ['product' => $product->id]) }}">
                                                {{ $product->name }}</a>
                                        </td>
                                        <td title="URLへジャンプ"><a
                                                href="{{ $product->vendor_url }}">{{ $product->vendor_url }}</a>
                                        </td>
                                        <td>{{ $product->part }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                @if ($versions->count())
                    <p class="text-left">最近登録されたバージョン(最大5件)</p>
                    <div class="table-responsive-sm">
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
                                        <td title="バージョン詳細"><a
                                                href="{{ route('version.show', ['version' => $version->id]) }}">
                                                {{ $version->version }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                @if ($product_versions->count())
                    <p class="text-left">最近登録された製品/バージョン(最大10件)</p>
                    <div class="table-responsive-sm">
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
                @endif

                @if ($vulnerabilities->count())
                    <p class="text-left">最近登録されたCVE(最大20件)</p>
                    <div class="table-responsive-xl">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">CVE</th>
                                    <th scope="col">Base Score</th>
                                    <th scope="col">脆弱性の分類</th>
                                    <th scope="col">概要</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vulnerabilities as $vulnerability)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td title="CVE詳細"><a
                                                href="{{ route('vulnerability.show', ['vulnerability' => $vulnerability->id]) }}">
                                                {{ $vulnerability->cve_id }}</a>
                                        </td>
                                        <td>
                                            <span class="base_score">{{ $vulnerability->base_score }}</span>
                                        </td>
                                        <td>
                                            {{ $vulnerability->cwe }}
                                        </td>
                                        <td>
                                            {!! nl2br(e(Str::limit($vulnerability->overview, 100))) !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

                @if (isset($vulnerability))
                    @include('javascript.index_base_score')
                @endif


            </div>
        </div>
    </div>
@endsection
