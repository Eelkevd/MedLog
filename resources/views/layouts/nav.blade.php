
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
          <div class="container-fluid">

              <div class="navbar-header">
                  <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn hidemenu">
                      <i class="glyphicon glyphicon-chevron-left"></i>
                      <span>Verberg Menu</span>
                  </button>
              </div>

              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="title_app">
                    <h1> <img src="{{asset('img/MedLogo.svg')}}" height="150" width="300">
                    </h1>
                    <h2>
                          {{ config('app.subtitle') }}
                    </h2>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

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
        </nav>
