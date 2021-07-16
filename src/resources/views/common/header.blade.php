@section('header')
<header class="mb-2">
    <nav class="navbar navbar-expand-md navbar-light shadow-sm bg-success">

        <a class="navbar-brand text-white font-weight-bold nav-logo" href="{{ url('/') }}">Yanbaru Qiita</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.create') }}"><i class="fas fa-pen mr-2"></i>投稿する</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.show') }}">マイページ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        ログアウト
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>
@endsection
