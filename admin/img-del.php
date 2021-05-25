<?php 
 session_start();
        
include 'config/connection.php';
        $date=date("D dS M, Y h:i a");
        $email = $_SESSION['email'];
        $user_id = $_SESSION['id'];
        $id = $_POST["id"];
        $stat_date=date('Y-m-d');

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to delete a record
    $sql = "DELETE FROM photo WHERE id='$id'";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Record deleted successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
?>