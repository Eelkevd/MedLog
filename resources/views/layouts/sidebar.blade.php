    <!-- Sidebar -->
  <nav id="sidebar">
      <!-- Sidebar Header -->
     <div class="sidebar-header">
         <h3>Menu</h3>
     </div>

     <!-- buttons -->
     <ul class="list-unstyled CTAs">
         <!-- white button -->
         <li>
           <a href="/entries" class="download">
           Nieuwe gebeurtenis
          </a>
        </li>
     </ul>

     <!-- Sidebar Links -->
     <ul class="list-unstyled components">

       <li><!-- Link with dropdown items -->
           <a href="#kalenderSubmenu" data-toggle="collapse" aria-expanded="false" role="button">
             Aankomende afspraken</a>
           <ul class="collapse list-unstyled" id="kalenderSubmenu">
               <!--<li><a href="/kalender/afspraak1">12-04-2018 Doktersafspraak</a></li>
               <li><a href="/kalender/afspraak1">05-06-2018 Doktersafspraak</a></li>
               <li><a href="/kalender/afspraak1">31-07-2018 Doktersafspraak</a></li>
               <li><a href="/kalender/afspraak1">01-08-2018 Doktersafspraak</a></li>
               <li><a href="/kalender/afspraak1">12-12-2018 Doktersafspraak</a></li> -->
               @foreach($events as $event)
                 <li>
                 {{ $event -> title }} <br>
                 {{ $event -> start_date }} <br><br>
               </li>
               @endforeach
           </ul>
        </li>

        <li>
           <a href="/home/mycalendar">Kalender</a>
        </li>
         <li>
           <a href="/entries/create_entry">Dagboek</a>
        </li>
        <li>
            <a href="/entries/create_entry">Export</a>
        </li>
         <li><!-- Link with dropdown items -->
             <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">
               Middelen</a>
             <ul class="collapse list-unstyled" id="homeSubmenu">
                 <li><a href="/medicijnen">Medicijnen</a></li>
                 <li><a href="/hulpmiddelen">Hulpmiddelen</a></li>
             </ul>
          </li>
    </ul>
    <!-- buttons -->
    <ul class="list-unstyled CTAs">
        <!-- blue buttons -->
        <li><a href="/account" class="article">Account</a></li>
        <li><a href="/about" class="article">About</a></li>
        <li><a href="{{ URL::previous() }}" class="article">Terug</a></li>
        <li><a href="/home" class="article">Home</a></li>

    </ul>
  </nav>
