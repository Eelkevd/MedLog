<div>
    <!-- Show username -->
    <div>
        <div ><b>{{ __('Gebruikersnaam: ') }}</b>
              {{ $user -> username }}
        </div>
    </div>
    
    <!-- Show email -->
    <div>
        <div ><b>{{ __('Emailadres: ') }}</b>
              {{ $user -> email }}
        </div>
    </div>
                
    <!-- Show firstname -->
    <div>
        <div ><b>{{ __('Voornaam: ') }}</b>
                {{ $user -> firstname }}
        </div>
    </div>
                
    <!-- Show middlename -->
    <div>
        <div ><b>{{ __('Tussenvoegsel: ') }}</b>
                {{ $user -> middlename }}
        </div>
    </div>
    
    <!-- Show lastname -->
    <div>
        <div ><b>{{ __('Achternaam: ') }}</b>
                {{ $user -> lastname }}
        </div>
    </div>
    
    <!-- Show BSN -->
    <div>
        <div ><b>{{ __('Burger service nummer: ') }}</b>
                {{ $user -> bsn }}
        </div>
    </div>
    
    <!-- Show street -->
    <div>
        <div ><b>{{ __('Straat: ') }}</b>
                {{ $user -> street }}
        </div>
    </div>
                
    <!-- Show housenumber -->
    <div>
        <div ><b>{{ __('Huisnummer: ') }}</b>
                {{ $user -> housenumber }}
        </div>
    </div>
    
    <!-- Show housenumbersuffix -->
    <div>
        <div ><b>{{ __('Huisnummer toevoeging: ') }}</b>
                {{ $user -> housenumbersuffix }}
        </div>
    </div>
    
    <!-- Show town -->
    <div>
        <div ><b>{{ __('Woonplaats: ') }}</b>
                {{ $user -> town }}
        </div>
    </div>
    
    <!-- Show postal code -->
    <div>
        <div ><b>{{ __('Postcode: ') }}</b>
                {{ $user -> postalcode }}
        </div>
    </div>

</div>