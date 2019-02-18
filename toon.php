<head>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link href="https://fonts.googleapis.com/css?family=Gruppo|Pacifico" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Gruppo|Pacifico" rel="stylesheet">
</head>
<tbody>
<?php

if(isset ($_GET ['naamfilter']))
{
    $naamfilter= $_GET ['naamfilter'];
}
else{
    $naamfilter = '';

}

// voorwaarden: pdo  ( niet met SQL, mysql (i))

// connectie database.
$conn = new PDO ("mysql:host=localhost;dbname=contactlijst","root", "");

// stuur SQL QUERY naar de database server
//$stmt = $conn->query('SELECT * FROM deelnemers');
// $stmt = $conn->query('SELECT * FROM deelnemers WHERE aantalkopjes >= 1');
$stmt = $conn->query("SELECT * FROM contacten WHERE naam like '%$naamfilter%'");




echo "<table>

<tr>

<th>Naam</th>
<th>Email</th>
<th>Toevoegen</th>
<th> Verwijderen</th>
</tr> "
;
// antwoord van databse server opvragen
// door het antwoord lopen,

while ($row= $stmt -> fetch()){
      echo "<tr>";
      echo "<td>" . $row['naam'] . "</td>";
      echo "<td>" . $row['email'] . "</td>";
      echo "<td>" . "<a href='naamwijzigen.php?naamid=" . $row['id'] . "'> wijzigen</a>" . "</td>"; 
      echo "<td>" . "<a href='naamverwijderen.php?naamid=" . $row['id'] . "'> verwijderen</a>" . "</td>"; 
      echo "</tr>";
      echo "</tr>";
}

{
    echo "<tr>";
   
   
    }
    echo "</table>";
    

//verbreek verbinding met database server.
$conn =null;

?>
<tbody>