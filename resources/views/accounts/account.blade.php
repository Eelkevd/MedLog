<!-- View for the account page (loads users account data) -->

<table class="table table-striped">
    <thead>
      <tr>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>

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
</table>
