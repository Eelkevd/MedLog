<!-- View for the about us page -->
@extends('layouts.htmlheader_index')

@section('content')
<hr>
<!-- Button to go to about us page-->
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <form action="/" >
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>

<hr>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Over ons</div>
                    <div class="card-body">

                    <b>Over MedLog</b><br>
                    MedLog is jouw online medisch dagboek dat jou een overzicht geeft van jouw ziektes en bijbehorende symptomen, je een kalender geeft met jouw afspraken en medische geschiedenis en je een schema geeft van je medicijnen en hulpmiddelen. Geef je arts snel en gemakkelijk een uittreksel van je medische veranderingen en vergeet nooit meer cruciale medische informatie.<br><br>
                    Het idee voor MedLog is ontstaan en ontwikkeld gedurende de eerste <a href="https://www.codegorilla.nl/">CodeGorilla</a> bootcamp in de gemeente Groningen. De MedLog website is geïnspireerd op de website en applicatie <a href="https://medapp.nu/">Medapp</a> en geeft gehoor aan de vraag van patiënten naar een toegankelijke website voor een zo breed mogelijke groep gebruikers met uiteenlopende ziektebeelden. Gedurende vier weken van de bootcamp in maart 2018 hebben we in een team van drie deelnemers een eerste werkende versie van de website gemaakt om wellicht later te perfectioneren en aan te bieden aan zorgorganisaties en patientenorganisaties in heel Nederland.
                    <hr>

                    <b>Ons team</b>
                    <ul>
                    <li>Eelke van Dijk</li>
                    <li>Esmeralda Tijhoff</li>
                    <li>Jorik de Boer</li>
                    </ul>
                    <hr>

                    <b>Contact</b><br>
                    Heb je een tip, verbetering of aanvulling voor onze website? Mail dan naar tip@medlog.nl met jouw persoonlijke gegevens en voorstellen en wellicht passen we je voorstel toe of nemen we contact met je op voor meer informatie. Heb je vragen over de website of wil je meer informatie over ons project, mail dan naar info@medlog.nl. Vermeld altijd het telefoonnummer waar je op te bereiken bent.<br><br>

                    Adres
                    <ul>
                    <li>Achterweg 1</li>
                    <li>9725 BM Groningen</li>
                    <li>050-12345678</li>
                    </ul>

                    Online
                    <ul>
                    <li><a href="https://github.com/Eelkevd/MedLog">Github pagina</a></li>
                    <li><a href="https://trello.com/b/0KKvNyAv/medlog">Trello pagina</a></li>
                    </ul>
                    <hr>

                    <b>Disclaimer</b><br>
                    Wij besteden continue zorg en aandacht aan de samenstelling van de inhoud op onze website. Het is mogelijk dat de informatie of functionaliteiten die op de website worden gepubliceerd onvolledig zijn of onjuistheden bevatten. Het is niet altijd mogelijk fouten te voorkomen. Wij sluiten alle aansprakelijkheid uit voor enigerlei directe of indirecte schade, van welke aard dan ook, die voortvloeit uit het gebruik van onze website.

                    <hr>
                    <b>Privacy-statement</b><br>
                    Persoonlijke gegevens die je via de site hebt ingevoerd, worden opgenomen in een gegevensbestand. Wij proberen de persoonlijke gegevens optimaal te beschermen bij het opslaan van de gegevens in onze database, al is 100 procent veilige opslag van de persoonlijke gegevens helaas onhaalbaar. De persoonlijke gegevens worden voor geen andere doeleinden gebruikt dan de gebruiker een overzicht te geven van zijn of haar eigen ingevoerde informatie. Naast door jou verstrekte gegevens worden ook gegevens verzameld met betrekking tot het bezoek van onze websites. Deze gegevens worden enerzijds gebruikt voor anoniem, statistisch onderzoek en anderzijds om de websites zoveel mogelijk op de voorkeuren van onze bezoeker af te stemmen. Dit laatste gebeurt onder meer door het gebruik van cookies. Je kunt je browser zo instellen dat het gebruik van cookies niet mogelijk is. Voor analyse-doeleinden maken we gebruik van Google Analytics-cookies.
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
