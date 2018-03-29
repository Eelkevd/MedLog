<!-- Sidebar -->
<nav id="sidebar">
   <!-- Sidebar Header -->
  <div class="sidebar-header">
      <h3>Menu</h3>
  </div>
  @if (auth()->user()->reader())
    <!-- Sidebar Links for readers -->
    <ul class="list-unstyled CTAs">
        <!-- white button -->
      <a href="reader/index" class="download">
        Uw clienten</a>
    </ul>

    <!-- only show the diary options when user has varified their email -->
   @elseif ((auth()->user()->verified()))

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
          <a href="/overview">Dagboek</a>
       </li>
       <li>
           <a href="/export">Exporteer</a>
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
 @endif

 <!-- buttons for all types of users -->
 <ul class="list-unstyled CTAs">
     <!-- blue buttons -->
     <li><a href="/account" class="article">Account</a></li>
     <li><a href="/about" class="article">Over ons</a></li>
     <li><a href="{{ URL::previous() }}" class="article">Terug</a></li>
     <li><a href="/home" class="article">Home</a></li>

 </ul>
</nav>
