<header class="mb-4">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="collapse navbar-collapse" id="nav-bar">
            <a class="navbar-brand js-scroll-trigger" href="/">Lives</a>
            <ul class="navbar-nav text-uppercase ml-auto">
                @if (Auth::check())
                    @can('system-only') {{-- システム管理者権限のみに表示される --}}
                    <li class="nav-item">{!!link_to_route('users.index', 'ユーザー一覧', [],['class' => 'nav-link']) !!}</li>

                    @endcan
                    @can('admin-higher')　{{-- 管理者権限以上に表示される --}}
                        <li class="nav-item">{!!link_to_route('lives.index', 'ライブ一覧', [],['class' => 'nav-link']) !!}</li>
                    @endcan
                    @can('user-higher') {{-- 一般権限以上に表示される --}}
                    {{-- 行ったライブへのリンク--}}
                    <li class="nav-item">{!! link_to_route('users.show', '行ったライブ', ['user' => Auth::id()],['class' => 'nav-link']) !!}</li>
                    {{--ログアウトボタン--}}
                    <li class="nav-item">{!! link_to_route('logout', 'ログアウト', ['user' => Auth::id()],['class' => 'nav-link']) !!}</li>
                    @endcan
                @else
                    {{--行ったライブへのリンクはログインしていないとログイン画面へ遷移する--}}
                    <li class="nav-item">{!!link_to_route('login', '行ったライブ', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
                    {{-- 会員登録へのリンク --}}
                    <li class="nav-item">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>

