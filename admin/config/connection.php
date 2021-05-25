<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tinyatech";
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "tinyatech"; /* Database name */


$con = mysqli_connect($host, $user, $password,$dbname);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
//set timezones
date_default_timezone_set('Africa/Nairobi');

$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// error_reporting(0);



?>