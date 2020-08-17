<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">


        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav container">
                @if (Auth::check())
                    {{-- トップページへのリンク --}}
{{--                一時的に会員登録画面へ遷移するようにしている--}}
                    <li class="nav-item col-md-4">{!!link_to_route('signup.get', '探す', [], ['class' => 'nav-link']) !!}</li>
                    {{-- 行ったライブへのリンク--}}
                    <li class="nav-item col-md-4">{!! link_to_route('users.show', '行ったライブ', ['user' => Auth::id()]) !!}</li>
{{--                    ログアウトボタン--}}
                    <li class="nav-item col-md-4">{!! link_to_route('logout', 'ログアウト', ['user' => Auth::id()]) !!}</li>
                @else
                    {{-- トップページへのリンク --}}
                    <li class="nav-item col-md-4"><a href="#" class="nav-link">探す</a></li>
                    {{-- 行ったライブへのリンク--}}
{{--                行ったライブへのリンクはログインしていないとログイン画面へ遷移する--}}
                    <li class="nav-item col-md-4">{!!link_to_route('login', '行ったライブ', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item col-md-4">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
                    {{-- 会員登録へのリンク --}}
                    <li class="nav-item col-md-4">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>
