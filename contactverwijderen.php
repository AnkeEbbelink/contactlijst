<?php
$productid = $_GET['naamid'];
try {
    $conn = new PDO("mysql:host=localhost;dbname=contactlijst", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $conn->prepare('DELETE FROM contacten WHERE ID=:fid');
    $statement->execute([
    'fid' => $naamid
    ]);
	
}

catch(PDOExeption $e) {
    echo "connection failed: " . $e ->getMessage();

}
$conn=Null;

header ("location: index.php");
?>

  
