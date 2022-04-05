<nav class="navbar navbar-expand-md navbar-light bg-primary shadow-sm pt-3 pb-3">
            <div class="container">
                <a class="navbar-brand text-light fs-3 fw-bold" href="{{ url('/posts') }}">
                    <!-- {{ config('app.name', 'mershige') }} -->
                    mershige
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                                </li>
                            @endif
                        @else


                            <li class="nav-item mr-5">
                                <a href="{{ route('mypage')}}" class="nav-link">
                                    <i class="fas fa-user mr-1 text-light"></i><label class="text-light">マイページ</label>
                                </a>
                            </li>
                            <li class="nav-item mr-5 ms-3">
                                <a href="{{route('mypage.nice')}}" class="nav-link">
                                    <i class="far fa-heart text-light"></i>
                                </a>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
