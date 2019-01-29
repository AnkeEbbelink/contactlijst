


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




echo "<table border='1'>
<tr>
<th>Naam</th>
<th>Email</th>
<th>Toevoegen</th>
<th> Verwijderen</th>
</tr>";
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
