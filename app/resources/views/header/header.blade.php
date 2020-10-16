<nav class="navbar navbar-expand-lg navbar-dark navbar-back-color">
    <div class="container">
        <a class="navbar-brand" href="/">OneCoinLunch</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto mt-4">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login.guest') }}">ゲストログインする</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item d-flex mr-5">
                    <a href="{{ route('user.myProfile') }}" class="font-weight-lighter text-light mt-2 mr-2">＠{{ \Auth::user()->name }}</a>
                    <img class="avatar-img-icon" alt="" src="{{ Auth::user()->profile_image }}">
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('restaurant.favoriteList') }}">お気に入り</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        ユーザー
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                        <a class="dropdown-item" href="{{ route('restaurant.create') }}">投稿</a>
                        <a class="dropdown-item" href="{{ route('user.myProfile') }}">マイプロフィール</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            ログアウト
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>
                    </div>
                </li>
                @endguest
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        ランチ検索
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                        <a class="dropdown-item" href='/restaurant/favoriteRank'>人気ランキング</a>
                        <a class="dropdown-item" href='/filter'>絞り込む</a>
                        <a class="dropdown-item" href='/map'>地図で探す</a>
                        <a class="dropdown-item" href='/word'>ワード検索</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.index') }}">お問い合わせ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
