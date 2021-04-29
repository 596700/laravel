<div class="table-responsive-sm text-nowrap">
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
                    <td title="バージョン詳細"><a href="{{ route('version.show', ['version' => $version->id]) }}">
                            {{ $version->version }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="container">
    <div class="row justify-content-center" id="id-checkbox">
        {{ $versions->appends(request()->input())->links() }}
    </div>
</div>
