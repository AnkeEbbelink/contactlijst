
<?php


$naamid = $_POST['naamid'];
$naam = $_POST['naam'];
$email = $_POST['email'];


try{
$conn = new PDO("mysql:host=localhost;dbname=contactlijst","root", "");
$conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




$statement = $conn ->prepare('UPDATE contacten SET naam=:fnaam, email=:femail WHERE id=:fnaamid');

$statement ->execute([
    'fnaam'=> $naam,
    'femail'=> $email,
    'fnaamid'=> $naamid
]);

}

catch(PDOExeption $e) {
    echo "connection failed: " . $e ->getMessage();

}
$conn=Null;

header("Location: index.php");
?>


