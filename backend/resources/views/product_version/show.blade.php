@extends('layouts.app')

@section('title', '製品/バージョン詳細')

@section('content')

    @include('layouts.nav')
    <div class="container">
        <div class="row justify-content-center">
            <div class="mx-auto col col-12 col-sm-11 col-md-9 col-lg-7 col-xl-6">

                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">製品/バージョン名</th>
                                <th scope="col">作成日時</th>
                                <th scope="col">更新日時</th>
                                <th scope="col">作成者</th>
                                @auth
                                    @if (Auth::user()->role === 'admin' || $product_version->user == Auth::user())
                                        <th scope="col">編集</th>
                                        <th scope="col">削除</th>
                                    @endif
                                @endauth
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{ $product_version->id }}</th>
                                <td>{{ $product_version->product->name }}/{{ $product_version->version->version }}</td>
                                <td>{{ $product_version->created_at }}</td>
                                <td>{{ $product_version->updated_at }}</td>
                                <td>{{ $product_version->user->name }}</td>
                                @auth
                                    @if (Auth::user()->role === 'admin' || $product_version->user == Auth::user())
                                        <td><a
                                                href="{{ route('product_version.edit', ['product_version' => $product_version->id]) }}"><button><i
                                                        class="fas fa-edit"></i></button></a></td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="submit" data-toggle="modal" data-target="#deleteConfirmationModal">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">削除確認</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            本当に削除しますか?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">取り消し</button>
                                                            <form method="POST" name="destroy"
                                                                action="{{ route('product_version.destroy', ['product_version' => $product_version->id]) }}">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger">削除</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    @endif
                                @endauth
                            </tr>
                            <tr>
                                <th colspan="7">
                                    以下の脆弱性の影響を受けています
                                </th>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    @if (!empty($vulnerabilities))
                                        @foreach ($vulnerabilities as $vulnerability)
                                            <a
                                                href="{{ route('vulnerability.show', ['vulnerability' => $vulnerability->id]) }}">{{ $vulnerability->cve_id }}</a>
                                        @endforeach
                                    @endif

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
