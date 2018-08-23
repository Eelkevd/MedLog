<!-- View for the account page (loads users account data) -->
<table class="table table-striped">
<!--     <thead>
        <tr>
            <th></th>
            <th></th>
        </tr>
    </thead> -->
    <tbody>
        <!-- Show email -->
        <tr>
            <td><b>{{ __('Account naam: ') }}</b></td>
            <td>{{ $user -> email }}</td>
        </tr>
    </tbody>
</table>