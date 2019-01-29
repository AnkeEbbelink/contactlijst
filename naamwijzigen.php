
<?php
$naamid = $_GET ['naamid'];

try {
    $conn = new PDO("mysql:host=localhost;dbname=contactlijst", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // let op: dit nog herschrijven als prepared statement
    $statement = $conn->prepare("SELECT * FROM contacten WHERE id = :fnaamid");
    $statement->execute([
     'fnaamid' => $naamid
     ]);
     
    while ($row = $statement->fetch()) {
        $naam = $row['naam'];
        $email = $row['email'];
    }	
        
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;

	
?>
<form action= "naamupdate.php" method="POST">
    <input name="naamid" type="text"  placeholder="naamid" value="<?php echo $naamid ?>">
    <input name="naam" type="text"  placeholder="naam" value="<?php echo $naam ?>">
    <input name="email" type="text"  placeholder="email" value=<?php echo $email ?>>
   
    <button type="submit">update</button> </form>



