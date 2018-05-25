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
                    <h2 class="about">Over MedBoek</h2>
                    <p>
                        MedBoek is jouw online medisch dagboek dat jou een overzicht geeft van jouw ziektebeelden en symptomen.
                        In de kalender vind je jouw afspraken en medische geschiedenis.
                        Geef je arts snel en gemakkelijk een uittreksel van je medische veranderingen.
                        Download je medisch dagboek voor eigen gebruik.<br><br>
                        Het idee voor MedBoek is ontstaan en ontwikkeld gedurende de eerste
                        <a href="https://www.codegorilla.nl/">CodeGorilla</a> bootcamp in de gemeente Groningen.
                    </p>
                    <q><em>De MedBoek website geeft gehoor aan de vraag van patiënten en hun verzorgers naar een toegankelijke website
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
                        Mail dan jouw voorstel naar <a href="mailto:tip@medboek.nl">tip@medboek.nl</a> met jouw persoonlijke gegevens
                        en wellicht passen we je voorstel toe of nemen we contact met je op voor meer
                        informatie. Heb je vragen over de website of wil je meer informatie over ons project,
                        mail dan naar <a href="mailto:info@medboek.nl">info@medboek.nl</a>.</p>
                        <strong>Adres</strong>
                        <ul class="list-unstyled">
                            <li>MedBoek. CodeGorilla</li>
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
                    <p> MedBoek, gevestigd aan Bedumerweg 78 Groningen 9716AG, is verantwoordelijk voor de verwerking van persoonsgegevens zoals weergegeven in deze privacyverklaring.

Contactgegevens:
medboek.nl
Bedumerweg 78
Groningen 9716 AG
+31 610498410


Persoonsgegevens die wij verwerken
MedBoek verwerkt geen persoonsgegevens omdat op onze site geen persoonsgegevens achter gelaten kunnen worden. Ook gebruiken we geen social media plugins.

Bijzondere en/of gevoelige persoonsgegevens die wij verwerken
Onze website en/of dienst heeft niet de intentie gegevens te verzamelen over websitebezoekers die jonger zijn dan 16 jaar. Tenzij ze toestemming hebben van ouders of voogd. We kunnen echter niet controleren of een bezoeker ouder dan 16 is. Wij raden ouders dan ook aan betrokken te zijn bij de online activiteiten van hun kinderen, om zo te voorkomen dat er gegevens over kinderen verzameld worden zonder ouderlijke toestemming. Als u er van overtuigd bent dat wij zonder die toestemming persoonlijke gegevens hebben verzameld over een minderjarige, neem dan contact met ons op via evandijk89@gmail.com, dan verwijderen wij deze informatie.

Geautomatiseerde besluitvorming
MedBoek neemt niet op basis van geautomatiseerde verwerkingen besluiten over zaken die (aanzienlijke) gevolgen kunnen hebben voor personen. Het gaat hier om besluiten die worden genomen door computerprogramma's of -systemen, zonder dat daar een mens (bijvoorbeeld een medewerker van MedBoek) tussen zit.

Delen van persoonsgegevens met derden
MedBoek verstrekt uitsluitend aan derden en alleen als dit nodig is voor de uitvoering van onze overeenkomst met u of om te voldoen aan een wettelijke verplichting.

Cookies, of vergelijkbare technieken, die wij gebruiken
MedBoek gebruikt geen cookies of vergelijkbare technieken.

Gegevens inzien, aanpassen of verwijderen
U heeft het recht om uw gegevens in te zien, te corrigeren of te verwijderen. Dit kunt u zelf doen via de persoonlijke instellingen van uw account. Daarnaast heeft u het recht om uw eventuele toestemming voor de gegevensverwerking in te trekken of bezwaar te maken tegen de verwerking van uw gegevens door ons bedrijf en heeft u het recht op gegevensoverdraagbaarheid. Dat betekent dat u bij ons een verzoek kunt indienen om de gegevens die wij van u beschikken in een computerbestand naar u of een ander, door u genoemde organisatie, te sturen.

Wilt u gebruik maken van uw recht op bezwaar en/of recht op gegevensoverdraagbaarheid of heeft u andere vragen/opmerkingen over de gegevensverwerking, stuur dan een gespecificeerd verzoek naar evandijk89@gmail.com.

Om er zeker van te zijn dat het verzoek tot inzage door u is gedaan, vragen wij u een kopie van uw identiteitsbewijs bij het verzoek mee te sturen. Maak in deze kopie uw pasfoto, MRZ (machine readable zone, de strook met nummers onderaan het paspoort), paspoortnummer en Burgerservicenummer (BSN) zwart. Dit ter bescherming van uw privacy. MedBoek zal zo snel mogelijk, maar in ieder geval binnen vier weken, op uw verzoek reageren.

MedBoek wil u er tevens op wijzen dat u de mogelijkheid hebt om een klacht in te dienen bij de nationale toezichthouder, de Autoriteit Persoonsgegevens. Dat kan via de volgende link: https://autoriteitpersoonsgegevens.nl/nl/contact-met-de-autoriteit-persoonsgegevens/tip-ons

Hoe wij persoonsgegevens beveiligen
MedBoek neemt de bescherming van uw gegevens serieus en neemt passende maatregelen om misbruik, verlies, onbevoegde toegang, ongewenste openbaarmaking en ongeoorloofde wijziging tegen te gaan. Als u de indruk heeft dat uw gegevens niet goed beveiligd zijn of er aanwijzingen zijn van misbruik, neem dan contact op met onze klantenservice of via evandijk89@gmail.com

MedBoek bewaart uw gegevens niet langer dan strikt nodig is om de doelen te realiseren waarvoor uw gegevens worden verzameld. Wij hanteren de volgende bewaartermijnen voor de volgende (categorieën) van gegevens:

(Categorie) persoonsgegevens  > Bewaartermijn > Reden

1. Anonieme zelfverstrekte gezondheidsinformatie van de gebruiker > zolang de gebruiker dat wenst > het faciliteren van een medische dagboek voor de gebruiker

                    </p>



                    <!-- <p>Persoonlijke gegevens die je via de site hebt ingevoerd, worden opgenomen in een gegevensbestand.
                        Uw naam en achternaam worden versleuteld opgeslagen.
                        Wij proberen de persoonlijke gegevens optimaal te beschermen bij het opslaan van de gegevens in
                        onze database, al is 100% veilige opslag van de persoonlijke gegevens helaas onhaalbaar.
                        De persoonlijke gegevens worden voor geen andere doeleinden gebruikt dan de gebruiker een overzicht
                    te geven van zijn of haar eigen ingevoerde informatie.</p> -->
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
