<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto navbar-right">
                    <!-- Authentication Links -->
                    @guest
                    <!--<li><a class="nav-link" href="{{ route('login') }}">{{ __('Login or Register') }}</a></li>-->
                    <!--<li><a class="nav-link" href="{{ route('login') }}">{{ __('Register') }}</a></li>-->
                    @else
                    <li class="nav-item">
                        <a href="#">
                            {{ Auth::user()->username }}
                        </a>
                        <div class="">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>