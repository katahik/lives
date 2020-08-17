<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">


        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav container">
                @if (Auth::check())
                    @can('system-only') {{-- システム管理者権限のみに表示される --}}
{{--            ここにユーザー一覧リンクが入る--}}
{{--                    <li class="nav-item"><a class="nav-link" href="">ユーザー一覧</a></li>--}}
                    <li class="nav-item">{!!link_to_route('users.index', 'ユーザー一覧', [],['class' => 'nav-link']) !!}</li>

                    @endcan
                    @can('admin-higher')　{{-- 管理者権限以上に表示される --}}
                    <li class="nav-item"><a class="nav-link" href="">ライブ一覧</a></li>
{{--            ここにライブ一覧リンクが入る--}}
                    @endcan
                    @can('user-higher') {{-- 一般権限以上に表示される --}}
                {{-- トップページへのリンク --}}
                    <li class="nav-item">{!!link_to_route('signup.get', '探す', [],['class' => 'nav-link']) !!}</li>
                {{-- 行ったライブへのリンク--}}
                    <li class="nav-item">{!! link_to_route('users.show', '行ったライブ', ['user' => Auth::id()],['class' => 'nav-link']) !!}</li>
                {{--ログアウトボタン--}}
                    <li class="nav-item">{!! link_to_route('logout', 'ログアウト', ['user' => Auth::id()],['class' => 'nav-link']) !!}</li>
                    @endcan
                @else
                    {{-- トップページへのリンク --}}
                    <li class="nav-item col-md-4"><a href="/" class="nav-link">探す</a></li>
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
