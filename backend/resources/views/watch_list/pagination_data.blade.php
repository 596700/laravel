<div class="table-responsive text-nowrap">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ウォッチリスト</th>
                <th scope="col">削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product_versions as $id => $product_version)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td title="製品/バージョン詳細"><a href="{{ route('product_version.show', ['product_version' => $id]) }}">
                            {{ $product_version }}</a>
                    </td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="submit" data-toggle="modal" data-target="#deleteConfirmationModal{{ $loop->iteration }}">
                            <i class="fas fa-trash"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteConfirmationModal{{ $loop->iteration }}" tabindex="-1" role="dialog"
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
                                            action="{{ route('watch_list.destroy', ['watch_list' => $id]) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">削除</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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