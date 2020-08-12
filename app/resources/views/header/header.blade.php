<nav class="navbar fixed-top navbar-expand-lg navbar-light fixed-top mb-5">
    <div class="container">
        <a class="navbar-brand" href="/">OneCoinLunch</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        ログアウト
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                <li>
                @endguest
                <li class="nav-item">
                    <a class="nav-link" href="services.html">お気に入り</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.index') }}">お問い合わせ</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        ランチ検索
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                        <a class="dropdown-item" href='/filter'>絞り込む</a>
                        <a class="dropdown-item" href='/map'>地図で探す</a>
                        <a class="dropdown-item" href='/word'>ワード検索</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        ユーザー
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                        <a class="dropdown-item" href="{{ route('restaurant.create') }}">投稿申請</a>
                        <a class="dropdown-item" href="">投稿一覧</a>
                        <a class="dropdown-item" href="{{ route('user.myProfile') }}">プロフィール詳細</a>
                        <a class="dropdown-item" href="{{ route('user.editMyProfile') }}">プロフィール編集</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
