@extends('layouts.app')

@section('title', 'バージョン詳細')

@section('content')

    @include('layouts.nav')
    <div class="container">

        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">バージョン名</th>
                        <th scope="col">作成日時</th>
                        <th scope="col">更新日時</th>
                        <th scope="col">作成者</th>
                        @if ($version->user == Auth::user())
                            <th scope="col">編集</th>
                            <th scope="col">削除</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{ $version->id }}</th>
                        <td>{{ $version->version }}</td>
                        <td>{{ $version->created_at }}</td>
                        <td>{{ $version->updated_at }}</td>
                        <td>{{ $version->user->name }}</td>
                        @if ($version->user == Auth::user())
                            <td><a href="{{ route('version.edit', ['version' => $version->id]) }}"><button><i
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
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                                                    action="{{ route('version.destroy', ['version' => $version->id]) }}">
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
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
