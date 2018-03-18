<!-- View for the account page (loads users account data) -->

<table class="table table-striped">
    <thead>
      <tr>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>

        <!-- Show username -->
      <tr>
        <td><b>{{ __('Gebruikersnaam: ') }}</b></td>
        <td>{{ $user -> username }}</td>
      </tr>

      <!-- Show email -->
      <tr>
        <td><b>{{ __('Emailadres: ') }}</b></td>
        <td>{{ $user -> email }}</td>
      </tr>

      <!-- Show full name  -->
      <tr>
        <td><b>{{ __('Naam: ') }}</b></td>
        <td>{{ $user -> firstname }}
          @if (!empty( $user -> middlename ))
            {{ $user -> middlename }}
          @endif  
             {{ $user -> lastname }}</td>
      </tr>

      <!-- Show street housenumber and housenumbersuffix-->
      <tr>
          <td><b>{{ __('Adres: ') }}</b></td>
          <td>{{ $user -> street }} {{ $user -> housenumber }} {{ $user -> housenumbersuffix }}</td>
      </tr>

      <!-- Show town -->
      <tr>
        <td><b>{{ __('Woonplaats: ') }}</b></td>
        <td>{{ $user -> town }} {{ $user -> housenumbersuffix }}</td>
    </tr>

    <!-- Show postal code -->
    <tr>
        <td><b>{{ __('Postcode: ') }}</b></td>
        <td>{{ $user -> postalcode }}</td>
    </tr>

</table>
