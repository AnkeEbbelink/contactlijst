<?php




$naam = $_POST['naam'];
$email = $_POST['email'];

try{
$conn = new PDO("mysql:host=localhost;dbname=contactlijst","root", "");
$conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




$statement = $conn ->prepare('INSERT INTO contacten (naam, email) VALUES (:fnaam, :femail )');

$statement ->execute([
    'fnaam'=> $naam,
    'femail'=> $email

]);

}

catch(PDOExeption $e) {
    echo "connection failed: " . $e ->getMessage();

}
$conn=Null;

header ("location: index.php");
?>


