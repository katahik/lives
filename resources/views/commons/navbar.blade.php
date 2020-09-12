<header>
    <!-- Header Start -->
    <div class="header-area header-transparent">
        <div class="main-header">
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">

                            <div class="logo">
                                <a href="/">Lives</a>
                            </div>

                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-8">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        @if (Auth::check())
                                            @can('system-only') {{-- システム管理者権限のみに表示される --}}
                                            <li class="nav-item">{!!link_to_route('users.index', 'ユーザー一覧', [],['class' => 'nav-link']) !!}</li>

                                            @endcan
                                            @can('admin-higher') {{-- 管理者権限以上に表示される --}}
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
                                </nav>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
