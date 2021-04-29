<div id="table" class="table-responsive-sm text-nowrap">
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
                <td title="製品/バージョン詳細"><a href="{{ route('product_version.show', ['product_version' => $product_version->id]) }}">
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