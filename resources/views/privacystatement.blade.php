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
                <div class="card-header"><h5><center>Privacystatement</center></h5></div>
                <div class="card-body">
                    <h2 class="about">MedBoek Algemeen</h2>
                    <p> MedBoek, gevestigd aan Bedumerweg 78 Groningen 9716 AG, is verantwoordelijk voor de verwerking van persoonsgegevens
                        zoals weergegeven in deze privacyverklaring. Voor verdere contactgegevens, kijk onder het kopje "Over MedBoek".
                    </p>

                    <h2 class="about">Persoonsgegevens die wij verwerken</h2>
                    <p> MedBoek verwerkt geen persoonsgegevens omdat op onze site geen persoonsgegevens achter gelaten kunnen worden.
                        Ook gebruiken we geen social media plugins.
                    </p>

                    <h2 class="about">Bijzondere en/of gevoelige persoonsgegevens die wij verwerken</h2>
                    <p> Onze website en/of dienst heeft niet de intentie gegevens te verzamelen over websitebezoekers die jonger zijn dan 16 jaar.
                        Tenzij ze toestemming hebben van ouders of voogd. We kunnen echter niet controleren of een bezoeker ouder dan 16 is.
                        Wij raden ouders dan ook aan betrokken te zijn bij de online activiteiten van hun kinderen, om zo te voorkomen dat er gegevens
                        over kinderen verzameld worden zonder ouderlijke toestemming. Als u er van overtuigd bent dat wij zonder die toestemming persoonlijke
                        gegevens hebben verzameld over een minderjarige, neem dan contact met ons op via evandijk89@gmail.com, dan verwijderen wij deze informatie.
                    </p>

                    <h2 class="about">Geautomatiseerde besluitvorming</h2>
                    <p> MedBoek neemt niet op basis van geautomatiseerde verwerkingen besluiten over zaken die (aanzienlijke) gevolgen kunnen hebben voor personen.
                        Het gaat hier om besluiten die worden genomen door computerprogramma's of -systemen, zonder dat daar een mens (bijvoorbeeld een medewerker van MedBoek)
                        tussen zit.
                    </p>

                    <h2 class="about">Delen van persoonsgegevens met derden</h2>
                    <p> MedBoek verstrekt uitsluitend aan derden en alleen als dit nodig is voor de uitvoering van onze overeenkomst met u of om te voldoen aan een wettelijke verplichting.
                    </p>

                    <h2 class="about">Cookies, of vergelijkbare technieken, die wij gebruiken</h2>
                    <p> MedBoek gebruikt geen cookies of vergelijkbare technieken.
                    </p>

                    <h2 class="about">Gegevens inzien, aanpassen of verwijderen</h2>
                    <p> U heeft het recht om uw gegevens in te zien, te corrigeren of te verwijderen. Dit kunt u zelf doen via de persoonlijke instellingen van uw account.
                        Daarnaast heeft u het recht om uw eventuele toestemming voor de gegevensverwerking in te trekken of bezwaar te maken tegen de verwerking van uw
                        gegevens door ons bedrijf en heeft u het recht op gegevensoverdraagbaarheid. Dat betekent dat u bij ons een verzoek kunt indienen om de gegevens
                        die wij van u beschikken in een computerbestand naar u of een ander, door u genoemde organisatie, te sturen.
                    </p>
                    <p> Wilt u gebruik maken van uw recht op bezwaar en/of recht op gegevensoverdraagbaarheid of heeft u andere vragen/opmerkingen over de gegevensverwerking,
                        stuur dan een gespecificeerd verzoek naar evandijk89@gmail.com. Om er zeker van te zijn dat het verzoek tot inzage door u is gedaan, vragen wij u een
                        kopie van uw identiteitsbewijs bij het verzoek mee te sturen. Maak in deze kopie uw pasfoto, MRZ (machine readable zone, de strook met nummers onderaan
                        het paspoort), paspoortnummer en Burgerservicenummer (BSN) zwart. Dit ter bescherming van uw privacy. MedBoek zal zo snel mogelijk, maar in ieder geval
                        binnen vier weken, op uw verzoek reageren.
                    </p>
                    <p> MedBoek wil u er tevens op wijzen dat u de mogelijkheid hebt om een klacht in te dienen bij de nationale toezichthouder, de Autoriteit Persoonsgegevens.
                        Dat kan via de volgende link: <a href="https://autoriteitpersoonsgegevens.nl/nl/contact-met-de-autoriteit-persoonsgegevens/tip-ons">
                        <em>Contacteer de  autoriteit persoonsgegevens</em></a>
                    </p>
                    <h2 class="about">Hoe wij persoonsgegevens beveiligen</h2>
                    <p> MedBoek neemt de bescherming van uw gegevens serieus en neemt passende maatregelen om misbruik, verlies, onbevoegde toegang, ongewenste openbaarmaking
                        en ongeoorloofde wijziging tegen te gaan. Als u de indruk heeft dat uw gegevens niet goed beveiligd zijn of er aanwijzingen zijn van misbruik, neem dan
                        contact op met onze klantenservice of via evandijk89@gmail.com
                    </p>
                    <p> MedBoek bewaart uw gegevens niet langer dan strikt nodig is om de doelen te realiseren waarvoor uw gegevens worden verzameld. Wij hanteren de volgende
                        bewaartermijnen voor de volgende (categorieën) van gegevens:
                    </p>
                    <p> (Categorie) persoonsgegevens  > Bewaartermijn > Reden.
                        1. Anonieme zelfverstrekte gezondheidsinformatie van de gebruiker > zolang de gebruiker dat wenst > het faciliteren van een medische dagboek voor de
                        gebruiker.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
