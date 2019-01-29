


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

// antwoord van databse server opvragen
// door het antwoord lopen,
while ($row= $stmt -> fetch()){
      echo "<LI>" . $row ['naam'] . " : " . $row ['email']; 
      echo "<a href='naamverwijderen.php?naamid=" . $row['id'] . "'> Verwijder</a>"; 
      echo "<a href='naamwijzigen.php?naamid=" . $row['id'] . "'> wijzigen</a>"; 
      echo "</li>";
}


//verbreek verbinding met database server.
$conn =null;

?>
