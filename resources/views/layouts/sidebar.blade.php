<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
   <!-- Header -->
  <div class="title_app">
    <a href="{{route('homepage')}}" class="navbar-brand">
      <img src="{{asset('img/MedLogo.svg')}}" class="d-inline-block align-top logo" alt="logo MedLog. Also return home button">
      {{ config('app.subtitle') }}
    </a>
  </div>

  <!-- responsive button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav" style="position: absolute; bottom:0; right:0px;">
  @guest
      <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login or Register') }}</a></li>
      <li class="nav-item"><a class="nav-link" href="/about">Over MedLog</a></li>
    </ul>
  @endguest

  @auth
  <!-- menu items -->
         @if (auth()->user()->reader())
           <!-- topmenu for readers -->
           <li class="nav-item">
             <a href="/reader/index" class="nav-link">Uw clienten</a>
           </li>
           <!-- top menu for varified users -->
          @elseif ((auth()->user()->verified()))
          <li class="nav-item active">
            <a class="nav-link" href="/entries">Nieuwe gebeurtenis <span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbar2Dropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Dagboek</a>
               <div class="dropdown-menu" aria-labelledby="navbar2Dropdown">
                 <a class="dropdown-item" href="/overview">Overzicht</a>
                 <a href="/export" class="dropdown-item">Exporteer</a>
                 <a href="/permissions" class="dropdown-item">Meelezers</a>
                 <div class="dropdown-divider"></div>
                 <a href="/entries" class="dropdown-item">Nieuw</a>
              </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Kalender
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a href="/home/mycalendar" class="dropdown-item">Kalender</a>
                  <a href="/home/mycalendar/search" class="dropdown-item">Zoek in Kalender</a>
                </div>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Middelen
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <a class="dropdown-item" href="/medicine">Medicijnen</a>
                 <a class="dropdown-item" href="/tool">Hulpmiddelen</a>
               </div>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="AboutDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Account
               </a>
               <div class="dropdown-menu" aria-labelledby="AboutDropdown">
                 <a class="dropdown-item" href="/account">Uw gegevens</a>
                 <a class="dropdown-item" href="/thema">Uw thema</a>
                 <a class="dropdown-item" href="/about">Over MedLog</a>
              </div>
            </li>

        @endif

        <!-- Authentication Links -->
          <li class="nav-item">
          <div class="">
              <a class="nav-link" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
      </li>

      </ul>
    </div>


@endauth
</nav>
