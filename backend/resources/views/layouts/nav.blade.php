<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark info-color">
    <a class="navbar-brand" href="{{ route('home') }}">CVE Database</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
        aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about') }}">About
                </a>
            </li>
    </div>
    </li>
    </ul>
    @guest
        <div class="d-flex align-items-center text-white">
            こんにちは、Guestさん
            会員登録は<a href="{{ route('user.register') }}">こちら</a>
        </div>
    @endguest
    @auth
        <div class="d-flex align-items-center text-white">
            こんにちは、{{ Auth::user()->name }}さん
        </div>
    @endauth
    <ul class="navbar-nav ml-auto nav-flex-icons">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">メニュー
            </a>
            <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                <a class="dropdown-item" href="{{ route('product.index') }}">製品一覧</a>
                <a class="dropdown-item" href="{{ route('version.index') }}">バージョン一覧</a>
                <a class="dropdown-item" href="{{ route('product_version.index') }}">製品/バージョン一覧</a>
                <a class="dropdown-item" href="{{ route('vulnerability.index') }}">CVE一覧</a>
            </div>
        </li>
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.login') }}">ログイン</a>
            </li>
        @endguest
        @auth
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-default"
                    aria-labelledby="navbarDropdownMenuLink-333">
                    <a class="dropdown-item" href="{{ route('user.show', ['user' => Auth::id()]) }}">プロフィール</a>
                    <a class="dropdown-item" href="{{ route('watch_list.index') }}">ウォッチリスト</a>
                    <form method="POST" name="logout" action="{{ route('user.logout') }}">
                        @csrf
                        <a class="dropdown-item" href="javascript:logout.submit()">ログアウト</a>
                    </form>
                </div>
            </li>
        @endauth
    </ul>
    </div>
</nav>
<!--/.Navbar -->
