<?php
// session_start();
//     // if (!$_SESSION['trustassests'] && !$_SESSION['email'] && !$_SESSION['user_pass']) {
//     //     # code...
//     //     header('Location:index.php');
//     // }


//Include GP config file
session_start();
//Unset token and user data from session
session_unset();
//Destroy entire session
session_destroy();

//Redirect to homepage
header("Location:index");
?>

