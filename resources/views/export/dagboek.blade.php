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
  }
  </style>
</head>

<body>
  <table>
    <caption><h1> Medlog dagboek pagina's</h1></caption>
     <thead>
     <tr>
       <th> Datum </th>
       <th> Tijd </th>
       <th> Ziekte </th>
       <th> intensity </th>
     </tr>
     </thead>
     <tbody>
       @foreach ($entries as $key => $entry)
       <tr>
         <td> {{$entry->timespan_date}} </td>
         <td> {{$entry->timespan_time}} </td>
         <td> {{$entry->illness_id}} </td>
         <td> {{$entry->intensity}} </td>
       </tr>
       @endforeach
     </tbody>
  </table>
</body>
</html>
