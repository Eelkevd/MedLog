<!-- Sidebar -->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
   <!-- Header -->
  <div class="title_app">
    <a href="{{route('homepage')}}" class="navbar-brand">
      <img src="{{asset('img/MedLogo.svg')}}" class="d-inline-block align-top" style="border-radius: 10%; height:80px; margin: 0 20px 0 20px;" alt="logo MedLog. Also return home button">

    {{ config('app.subtitle') }}
  </a>
  </div>

  <!-- responsive button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>


  <!-- menu items -->
 <div class="collapse navbar-collapse" id="navbarSupportedContent">
   <ul class="navbar-nav mr-auto" style="position: absolute; bottom:0; right:150px;">
         <li class="nav-item active">
           <a class="nav-link" href="/about">Over ons <span class="sr-only">(current)</span></a>
         </li>
         @if (auth()->user()->reader())
           <!-- topmenu for readers -->
           <li class="nav-item">
             <a href="/reader/index" class="nav-link">Uw clienten</a>
           </li>
           <!-- top menu for varified users -->
          @elseif ((auth()->user()->verified()))
          <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Dagboek</a>
               <div class="dropdown-menu" aria-labelledby="navbar2Dropdown">
                 <a class="dropdown-item" href="/overview">Overzicht</a>
                 <a href="/entries" class="dropdown-item">Nieuwe gebeurtenis</a>
                 <a href="/export" class="dropdown-item">Exporteer</a>
                 <a href="/permissions" class="dropdown-item">Meelezers</a>
              </div>
          </li>
            <li class="nav-item">
               <a href="/home/mycalendar" class="nav-link">Kalender</a>
            </li>

            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Middelen
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                 <a class="dropdown-item" href="/medicine">Medicijnen</a>
                 <a class="dropdown-item" href="/tool">Hulpmiddelen</a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="#">Nieuw middel</a>
               </div>
            </li>


         <li class="nav-item">
           <a class="nav-link" href="/account">Account</a>
         </li>
       </ul>
 @endif

 <!-- Right Side Of Navbar -->
<div class="navbar-nav ml-auto navbar-right">
 <ul class="navbar-nav">
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


</nav>
