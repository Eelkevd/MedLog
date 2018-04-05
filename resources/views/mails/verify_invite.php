<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Activeer je dagboek</h2>

        <div>
            Je hebt je geregistreerd op MedLog, de webapplicatie waarmee je jouw medisch dagboek kunt bijhouden.
            Volg onderstaande link om jouw dagboek te activeren.
            {{ URL::to('register/verify/' . $confirmation_code) }}.<br/>

        </div>

    </body>
</html>
