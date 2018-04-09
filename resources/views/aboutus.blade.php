<!-- View for the about us page -->
@extends('layouts.master')

@section('content')

<!-- Button to go to about us page-->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @guest
          <div class="card">
              <div class="card-header">
                  <form action="/" >
                      <button type="submit" class="btn btn-primary">Registreer</button>
                  </form>
              </div>
          </div>
          <hr>
          @endguest

          <div class="card">
                <div class="card-header"><h5><center>Over ons</center></h5></div>
                    <div class="card-body">

                    <h2 class="about">Over MedLog</h2>
                    <p>
                    MedLog is jouw online medisch dagboek dat jou een overzicht geeft van jouw ziektebeelden en symptomen.
                    In de kalender vind je jouw afspraken en medische geschiedenis.
                    Geef je arts snel en gemakkelijk een uittreksel van je medische veranderingen.
                    Download je medisch dagboek voor eigen gebruik.<br><br>
                    Het idee voor MedLog is ontstaan en ontwikkeld gedurende de eerste
                    <a href="https://www.codegorilla.nl/">CodeGorilla</a> bootcamp in de gemeente Groningen.
                  </p>
                    <q><em>De MedLog website geeft gehoor aan de vraag van patiënten en hun verzorgers naar een toegankelijke website
                    voor een zo breed mogelijke groep gebruikers met uiteenlopende ziektebeelden.
                  </em></q>
                    <hr>

                    <h2 class="about">Ons team</h2>
                    <ul class="list-unstyled">
                    <li>Eelke van Dijk</li>
                    <li>Esmeralda Tijhoff</li>
                    <li>Jorik de Boer</li>
                    </ul>
                    <hr>

                    <h2 class="about">Contact</h2>
                    <p>Heb je een tip, verbetering of aanvulling voor onze website?
                      Mail dan jouw voorstel naar tip@medlog.nl met jouw persoonlijke gegevens
                      en wellicht passen we je voorstel toe of nemen we contact met je op voor meer
                      informatie. Heb je vragen over de website of wil je meer informatie over ons project,
                      mail dan naar <a href="mailto:info@medlog.nl">info@medlog.nl</a>.</p>

                    <strong>Adres</strong>
                    <ul class="list-unstyled">
                      <li>MedLog. CodeGorilla</li>
                    <li>Achterweg 1</li>
                    <li>9725 BM Groningen</li>
                    </ul>
                  </p>

                    <strong>Online</strong>
                    <ul class="list-unstyled">
                    <li><a href="https://www.codegorilla.nl/2018/03/19/medisch-dagboek-eindproject/">Blog over ons op de CodeGorilla website.</a></li>
                    </ul>

                    <hr>

                    <h2 class="about">Disclaimer</h2>
                    <p>Wij besteden continue zorg en aandacht aan de samenstelling van de inhoud op onze website.
                    Toch is het mogelijk dat de informatie of functionaliteiten die op de website worden gepubliceerd
                    onvolledig zijn of onjuistheden bevatten. Het is niet altijd mogelijk fouten te voorkomen.
                    Wij sluiten alle aansprakelijkheid uit voor enigerlei directe of indirecte schade, van welke
                    aard dan ook, die voortvloeien uit het gebruik van onze website.</p>

                    <hr>
                    <h2 class="about">Privacy-statement</h2>
                  <p>Persoonlijke gegevens die je via de site hebt ingevoerd, worden opgenomen in een gegevensbestand.
                    Uw naam en achternaam worden versleuteld opgeslagen.
                    Wij proberen de persoonlijke gegevens optimaal te beschermen bij het opslaan van de gegevens in
                    onze database, al is 100% veilige opslag van de persoonlijke gegevens helaas onhaalbaar.
                    De persoonlijke gegevens worden voor geen andere doeleinden gebruikt dan de gebruiker een overzicht
                    te geven van zijn of haar eigen ingevoerde informatie.</p>

                    <hr>
                    <h2 class="about">Met dank aan</h2>
                    <p>We bedanken onze testgroep voor het uitvoerig testen van de website en het geven van feedback.
                      We bedanken ook alle CodeGorilla coaches en in het bijzonder CodeGorilla coach Wouter voor het
                      begeleiden van het project, zijn advies over de database structuur en het belangeloos creeën van beeldmateriaal.
                      Tenslotte bedanken we de handmodellen voor hun medewerking bij het tot stand komen van dit beeldmateriaal.
                    </p>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
