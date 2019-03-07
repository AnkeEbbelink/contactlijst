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
<style>
</style>

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

<div class="wijzigen">

    <form action= "naamupdate.php" method="POST">
        <div class="form-group col-lg-8">
            <input name="naamid" type="text" class= "form-control"  placeholder="naamid" value="<?php echo $naamid ?>">
        </div>
        <div class="form-group col-lg-8">
            <input name="naam" class= "form-control" type="text"  placeholder="naam" value="<?php echo $naam ?>">
        </div>
        <div class="form-group col-lg-8">
            <input name="email" class= "form-control" type="text" placeholder="email" value="<?php echo $email ?>">
        </div>
        <br><br><br>
   
        <button type="submit" class="buttonupdate">update</button> 
    </form>
</div>

