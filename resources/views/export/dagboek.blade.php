<!-- View for the export pdf dagboek page -->
<!DOCTYPE html>
<html>
    <head>
        <title>Convert to PDF</title>
        <style type="text/css">
        table{
            width: 70%;
            margin: 0 auto;
            border:1px solid;
            border-collapse: collapse;
        }
        th{
            padding: 5px;
            border-bottom: 1px solid;
        }
        td{
            border-bottom: 1px solid;
            padding: 5px;
            width: 100px;
        }
        .int{
            width: 40px;
        }
        </style>
    </head>
    <body>
        <table>
            <caption><h1> Medlog dagboek pagina's</h1></caption>
            <thead>
                <tr>
                    <th>Datum & Tijd</th>
                    <th>Ziekte</th>
                    <th>Symptomen</th>
                    <th>Medicijnen</th>
                    <th class="int">Intensiteit</th>
                    <th>Opmerkingen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entries as $key => $entry)
                <tr>
                    <td> {{ date('d-m-Y', strtotime($entry-> timespan_date ))}} {{$entry->timespan_time}}</td>
                    <td> {{$entry->illness}} </td>
                    <td>
                        @foreach($entry->symptomes as $symptom)
                        {{ $symptom->symptom }},<br />
                        @endforeach
                    </td>
                    <td>
                        @foreach($entry->medicines as $medicine)
                        {{ $medicine->medicine }},<br/>
                        @endforeach
                    </td>
                    <td class="int"> {{$entry->intensity}} </td>
                    <td> {{ $entry->comments}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>