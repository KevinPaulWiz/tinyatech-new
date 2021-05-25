<?php
   include 'config/connection.php';
   if (isset($_POST['upload'])) {
      if($_FILES["file"]["name"] != '')
{
    $newFilename = time() . "_" . $_FILES["file"]["name"];
    $location = 'images/gallery/' . $newFilename;  
    
    
    // mysqli_query($conn,"insert into photo (location) values ('$location')");
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT into photo (location) values ('$location')";
    // use exec() because no results are returned
    $conn->exec($sql);
    // echo "New record created successfully";
    move_uploaded_file($_FILES["file"]["tmp_name"], $location);
    // move_uploaded_file($_FILES["file"]["name"], $target_file);
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
}
   }

?>