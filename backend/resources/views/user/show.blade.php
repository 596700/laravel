@extends('layouts.app')

@section('title', 'プロフィール')

@section('content')

    @include('layouts.nav')
    <div class="container">
        @include('layouts.error_card_list')
        <div class="d-flex justify-content-end">
            <a href="{{ route('user.password.request') }}"><button type="button"
                    class="btn btn-outline-primary btn-sm">パスワードリセット</button></a>
            <a href="{{ route('user.verification.notice') }}"><button type="button"
                    class="btn btn-outline-primary btn-sm">メールアクティベーション</button></a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ユーザ名</th>
                        <th scope="col">メールアドレス</th>
                        @if (Auth::user()->role === 'admin' || $user == Auth::user())
                            <th scope="col">編集</th>
                            <th scope="col">退会</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @if (Auth::user()->role === 'admin' || $user == Auth::user())
                            <td><a href="{{ route('user.edit', ['user' => $user->id]) }}"><button><i
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
                                                <h5 class="modal-title" id="exampleModalLabel">退会確認</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                本当に退会しますか?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">取り消し</button>
                                                <form method="POST" name="destroy"
                                                    action="{{ route('user.destroy', ['user' => $user->id]) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">退会</button>
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
