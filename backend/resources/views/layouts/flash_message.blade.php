@if (session('flash_message'))
    <div class="card-text text-left success alert-success">
        <ul class="m-3">
            <!-- フラッシュメッセージ -->
            <li>{{ session('flash_message') }}</li>
        </ul>
    </div>
@endif
