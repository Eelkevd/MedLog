<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
  </head>
  <body>
    <h1>
      Welkom bij MedBoek.
    </h1>
    <div>
        <p><strong>
          Iemand heeft u uitgenodigd zijn/haar medisch dagboek te bekijken op MedBoek.
        </strong></p>
        <p>
          MedBoek is een webapplicatie waarmee je een medisch dagboek kunt bijhouden.
          Dit dagboek kan gedeeld worden met behandelaars en andere betrokkenen.</p>
        <p>
          Maak een wachtwoord aan op MedBoek voor uw emailadres om als meelezer het
          medisch dagboek
        </p>
        <button type="button">
        <a href="{{ URL::to('password/reset/' . $token) }}" alt="maak een wachtwoord aan op MedBoek">
          klik hier om uw wachtwoord aan te maken op MedBoek</a>
        </button>



    </div>
  </body>
</html>
