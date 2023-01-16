<div>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <!-- Uncomment below if you prefer to use an image logo -->
           <a href="/" class="logo"><img src="{{asset('assets/frontend/img/logo.svg')}}" alt="" class="img-fluid"></a>

            <nav id="navbar" class="navbar">
                <!-- Right Side Of Navbar -->
                <ul>
                    <li><a class="nav-link " href="/">Blog</a></li>
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li><a class="nav-link " href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        @endif

                        @if (Route::has('register'))
                            <li><a class="nav-link " href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @endif
                    @else
                        <li class="dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <ul>
                                <li><a href="{{route('dashboard.dashboard')}}">Dashboard</a></li>
                                <li><a class="dropdown"
                                       href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->



        </div>
    </header><!-- End Header -->

    <div class="hero hero-single route bg-image" style="background-color:#1e293b">
        <div class="hero-content display-table">
            <div class="table-cell">
                <div class="container">
                    <h1 class="text-white mb-4">AppBuilderMS Blog</h1>
                </div>
            </div>
        </div>
    </div>

</div>
