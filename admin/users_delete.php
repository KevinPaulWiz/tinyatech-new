<?php 
 session_start();
    // if (!$_SESSION['schdb'] && !$_SESSION['email'] && !$_SESSION['user_pass']) {
    //     # code...
    //     header('Location:logout.php');
    // } 
include 'config/connection.php';
date_default_timezone_set('Africa/Nairobi');
        try {
        $date=date("D dS M,Y h:i a");
        $email = $_SESSION['Email'];
        $id = $_POST["id"];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $sql = "UPDATE `post` SET `deleted`=-1 WHERE `id` = '$id'";
    $sql = "UPDATE `users` SET `deleted`='-1' WHERE id = '".$id."'";
    $sql1 = "UPDATE `users` SET `deleteddate`='$date' WHERE id ='".$id."'";
    $sql2 = "UPDATE `users` SET `deletedby`= '$email' WHERE id = '".$id."'";


    // Prepare statement
    $stmt = $conn->prepare($sql);
    $stmt1 = $conn->prepare($sql1);
    $stmt2 = $conn->prepare($sql2);

    // execute the query
    $stmt->execute();
    $stmt1->execute();
    $stmt2->execute();

// call the function
    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    // }
// }

?>
