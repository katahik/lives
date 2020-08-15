<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">

{{--            micropostsにはあったコード--}}
{{--        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}

        <div class="collapse navbar-collapse" id="nav-bar">
            {{--micropostsにはあったコード--}}
            {{--<ul class="navbar-nav mr-auto"></ul>--}}
            <ul class="navbar-nav container">
                @if (Auth::check())
                    {{-- トップページへのリンク --}}
                    <li class="nav-item col-md-4"><a href="#" class="nav-link">探す</a></li>
                    {{-- 行ったライブへのリンク--}}
                    <li class="nav-item col-md-4"><a href="#" class="nav-link">行ったライブ</a></li>
                @else
                    <li class="nav-item col-md-4"><a href="#" class="nav-link">探す</a></li>
                    {{-- 行ったライブへのリンク--}}
                    <li class="nav-item col-md-4"><a href="#" class="nav-link">行ったライブ</a></li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item col-md-4">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
                    {{-- 会員登録へのリンク --}}
                    <li class="nav-item col-md-4">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>
