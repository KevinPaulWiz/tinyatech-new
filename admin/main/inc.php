<?php 
session_start(); /*starting thr session*/
error_reporting(1); /*making sure errors are not displayed to user*/
// require_once 'history-logs.php'; /*file for the history logs*/
include 'config/connection.php'; /*connecting to the database for all*/
/*a list of functions @fredrick Wampamba frerickwampamba1@gmail.com,  @kevin paul kevinpaulwiz@gmail.com functions necessary in this file*/
function encryption($parameter){
  $output = md5(sha1($parameter));
  return $output;
}
/*a list of functions @fredrick Wampamba frerickwampamba1@gmail.com,  @kevin paul kevinpaulwiz@gmail.com functions necessary in this file*/
 
/*function that creates the avatars*/
function createAvatarImage($string)
{   
/*Image Name*/
$filename = "avatar.txt";
$count = file_get_contents($filename);
if ($count == null)
$count = 0;
$count++;
$handle = fopen($filename, "w+");
fwrite($handle, $count);
fclose($handle);
/*Image  path*/
$imageFilePath = "assets/images/avatars/".$count.".png";
//base avatar image that we use to center our text string on top of it.
$avatar = imagecreatetruecolor(60,60);
$colors=rand(0,255).", ".rand(0,255).", ".rand(0,255);
$bg_color = imagecolorallocate($avatar, rand(0,255), rand(0,255), rand(0,255));
imagefill($avatar,0,0,$bg_color);
$avatar_text_color = imagecolorallocate($avatar, 0, 0, 0);
// Load the gd font and write 
$font = imageloadfont('gd-font.gdf');
imagestring($avatar, $font, 10, 10, $string, $avatar_text_color);
imagepng($avatar, $imageFilePath);
imagedestroy($avatar);
return $imageFilePath; 
}

// extract the filename
$fileURLName = basename($_SERVER['SCRIPT_FILENAME'], '.php');
// replace dashes with whitespace
$titleName = str_replace('-', ' ', $fileURLName);
$titleName = str_replace('_', ' ', $fileURLName);
// check if the file is index, if so assign 'home' to the title instead of index
// capitalize all words
$titleNameFinal = ucwords($titleName);

/*classes that are to be used in the insertion to the databse*/



/*classes that are to be used in the insertion to the databse*/
 

/*this is for logining in the system*/
 if (isset($_POST['login'])) {
$user = $_POST['user'];
/*Pasword Cryprtion*/
$pwd='!?<3@l^Ai:&I';
$pwd1='!?<3o/]{iI0O';
$final_pswd=crypt(md5(crypt(sha1(md5(crypt(sha1($pwd.$_POST['pswd'].$pwd1),AP))),YU)),AA);
// Analyising Token
try {
$result = $conn->query("SELECT id, token FROM users WHERE (Email = '$user' || UserName='$user' ||  PhoneNo='$user') AND pswd='$final_pswd' AND status=1 ");
if ($result->num_rows > 0) {
while ($rows = $result->fetch_assoc()) {
$_SESSION['token']=$rows['token'];
$_SESSION['id']=$rows['id'];
// header("Location: dashboard.php");
// echo $rows['token'];

// $activity = addslashes("<code style='color:green;'> <b> ".$_SESSION['username']."</b> username accessed the system</code>");
// $historylogs = new Historylogs($rows['id'], $activity, date('Y-m-d h:i:sa'), date('Y-m-d'), date('m'), date('Y'));

echo "<script type='text/javascript'>window.location ='dashboard';</script>";
}
}else{
// $activity = addslashes("<code style='color:#ff0000;'>This username or email <b>".$user."<b> tried to access the system</code>");
// $historylogs = new Historylogs($_SESSION['id'], $activity, date('Y-m-d h:i:sa'), date('Y-m-d'), date('m'), date('Y'));
$Error= "<div class='alert alert-danger alert-dismissible' role='alert'>
<strong><i class='fa fa-exclamation-circle' aria-hidden='true'> </i></strong> <strong>ERROR:</strong> Email/UserName or Password you've entered are Incorrect...!
<a href='#' >Forgot Password?</a>
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>

</button>
</div>";
}
} catch (Exception $e) {
$Error= $e->errorMsg();
}
}



// Adding Users
if (isset($_POST['add-user'])) {
$fname = addslashes($_POST['fname']);
$lname = addslashes($_POST['lname']);
$PhoneNo = addslashes($_POST['PhoneNo']);
$Email = addslashes($_POST['Email']);
$User = addslashes($_POST['User']);
$roleId = addslashes($_POST['roleId']);
$F=substr($fname, 0,1);
$imageFilePath= createAvatarImage(ucwords($F));
$stat_date=date("Y-m-d"); 
$submitteddate=date("D dS M,Y h:i a");
$token = md5(sha1($fname.$lname.date('h:i:sa')));
/*Pasword Cryprtion*/
$pwd='!?<3@l^Ai:&I';
$pwd1='!?<3o/]{iI0O';
$final_pswd=crypt(md5(crypt(sha1(md5(crypt(sha1($pwd.$_POST['pswd'].$pwd1),AP))),YU)),AA);
// variables
$year=date("Y");
$month=date("M");
$date=date('D dS M,Y h:i a');
$results = $conn->query("SELECT Email FROM users WHERE status=1 AND Email = '".$_POST['Email']."'");
if ($results->num_rows > 0) {
$Error= "<div class='alert alert-danger alert-dismissible' role='alert'>
<i class='fa fa-exclamation-circle' aria-hidden='true'> </i> <strong>Error:</strong> Email entered already exists...!
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <i class='fa fa-remove'></i>x
  </button>
</div>";
}else{

try {
// set the PDO error mode to exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// use exec() because no results are returned
$pdo->exec("INSERT INTO `users`(`fname`, `lname`, `Email`, `UserName`, `PhoneNo`, `pswd`, `profilePic`, `roleId`, `token`) 
VALUES ('$fname','$lname','$Email','$User','$PhoneNo','$final_pswd','$imageFilePath','$roleId','$token')");

// history logs
$activity = addslashes("<code><b> ".$_SESSION['username']."</b> has <span style='color: green;'>added</span> an <b>".$roleId."</b> with username <b>".$User."</b> and email <b>".$Email."</b></code>");
$historylogs = new Historylogs($_SESSION['id'], $activity, date('Y-m-d h:i:sa'), date('Y-m-d'), date('m'), date('Y'));

$Error = "<div class='alert alert-success alert-rounded text-center'>New record created successfully
<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button>
</div>";
}
catch(PDOException $e)
{
$Error = "<div class='alert alert-danger alert-rounded'> '".$e->getMessage()."'
<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button>
</div>";
// $Error= $sql . "<br>" . $e->getMessage();
}
}


}



//add add-role
if (isset($_POST['add-role'])) {
$roleName = addslashes($_POST['roleName']);
$roleDesc = addslashes($_POST['roleDesc']);
$submitteddate = date("D dS M,Y h:i a");

include 'config/connection.php';
try {
// $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// use exec() because no results are returned
$pdo->exec("INSERT INTO `role`( `roleName`, `roleDesc`, `createdAt`) 
VALUES ('$roleName','$roleDesc','$submitteddate')");

$activity = addslashes("<code style='color: blue;'> Role ".$roleName." has been <span style='color: green;'>added</span> to the system</code>");
$historylogs = new Historylogs($_SESSION['id'], $activity, date('Y-m-d h:i:sa'), date('Y-m-d'), date('m'), date('Y'));
// $Error= "New record created successfully";
$Error= "<div class='alert alert-success alert-rounded text-center'>New record created successfully<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button> </div>";
}
catch(PDOException $e)
{
// $Error= $sql . "<br>" . $e->getMessage();
$Error= "<div class='alert alert-danger alert-rounded text-center'>".$e->getMessage()."<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button> </div>";
}
}



//add resource
if (isset($_POST['update-role'])) {
$roleId = addslashes($_POST['roleId']);
$roleName = addslashes($_POST['roleName']);
$roleDesc = addslashes($_POST['roleDesc']);
$submitteddate = date("D dS M,Y h:i a");

include 'config/connection.php';
try {
$conn = new PDO("mysql:host=$servername;dbname=$serverDatabase", $serverUsername, $serverPassword);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE `role` SET `roleName`='$roleName',`roleDesc`='$roleDesc',`updatedAt`='$submitteddate' WHERE roleId='$roleId'";
// use exec() because no results are returned
$conn->exec($sql);
// $Error= "New record created successfully";

$activity = addslashes("<code style='color: blue;'> Role with roleId ".$roleId." has been <span style='color: black;'>updated</span> to ".$roleName."</code>");
$historylogs = new Historylogs($_SESSION['id'], $activity, date('Y-m-d h:i:sa'), date('Y-m-d'), date('m'), date('Y'));


$Error= "<div class='alert alert-success alert-rounded text-center'>Record Updated successfully<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button> </div>";
}
catch(PDOException $e)
{
// $Error= $sql . "<br>" . $e->getMessage();
$Error= "<div class='alert alert-danger alert-rounded text-center'>".$e->getMessage()."<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button> </div>";
}
}

//add resource
if (isset($_POST['update-resource'])) {
$resourceId = addslashes($_POST['resourceId']);
$resourceName = addslashes($_POST['resourceName']);
$resourceDesc = addslashes($_POST['resourceDesc']);
$submitteddate = date("D dS M,Y h:i a");

include 'config/connection.php';
try {
$conn = new PDO("mysql:host=$servername;dbname=$serverDatabase", $serverUsername, $serverPassword);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE `resource` SET `resourceName`='$resourceName',`resourceDesc`='$resourceDesc',`updatedAt`='$submitteddate' WHERE resourceId='$resourceId'";
// use exec() because no results are returned
$conn->exec($sql);

$activity = addslashes("<code style='color: blue;'> Resource with resourceId".$resourceId." has been <span style='color: black;'>updated</span> to ".$resourceName."</code>");
$historylogs = new Historylogs($_SESSION['id'], $activity, date('Y-m-d h:i:sa'), date('Y-m-d'), date('m'), date('Y'));


// $Error= "New record created successfully";
$Error= "<div class='alert alert-success alert-rounded text-center'>Record Updated successfully<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button> </div>";
}
catch(PDOException $e)
{
// $Error= $sql . "<br>" . $e->getMessage();
$Error= "<div class='alert alert-danger alert-rounded text-center'>".$e->getMessage()."<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button> </div>";
}
}






//add resource
if (isset($_POST['add-resource'])) {
$resourceName = addslashes($_POST['resourceName']);
$resourceDesc = addslashes($_POST['resourceDesc']);
$submitteddate = date("D dS M,Y h:i a");

include 'config/connection.php';
try {
$conn = new PDO("mysql:host=$servername;dbname=$serverDatabase", $serverUsername, $serverPassword);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO `resource`( `resourceName`, `resourceDesc`, `createdAt`) 
VALUES ('$resourceName','$resourceDesc','$submitteddate')";
// use exec() because no results are returned
$conn->exec($sql);

$activity = addslashes("<code style='color: blue;'> Resource ".$resourceName." has been <span style='color: green;'>added</span> to the system</code>");
$historylogs = new Historylogs($_SESSION['id'], $activity, date('Y-m-d h:i:sa'), date('Y-m-d'), date('m'), date('Y'));


// $Error= "New record created successfully";
$Error= "<div class='alert alert-success alert-rounded text-center'>New record created successfully<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button> </div>";
}
catch(PDOException $e)
{
// $Error= $sql . "<br>" . $e->getMessage();
$Error= "<div class='alert alert-danger alert-rounded text-center'>".$e->getMessage()."<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button> </div>";
}
}



//add Perssions
if (isset($_POST['submit_permission'])) {
$roleId = addslashes($_POST['roleId']);
$add = addslashes($_POST['add']);
$view = addslashes($_POST['view']);
$delete = addslashes($_POST['delete']);
$update = addslashes($_POST['update']);
$resourceId = addslashes($_POST['resourceId']);
$can_approve = addslashes($_POST['can_approve']);
$userId = $_SESSION['userIdNo'];
$submitteddate = date("D dS M,Y h:i a");
    // adding role_resource
foreach ($_POST['resourceId'] as $key => $resourceId) { /*Sorting out Each variable*/
$roleNameDb = $conn->query("SELECT roleName FROM `role` where roleId = '$roleId'")->fetch_assoc();
if ($conn->query("SELECT * from role_resource where resourceId = '$resourceId' and  roleId = '$roleId'")->num_rows < 1) {
$conn->query("INSERT INTO `role_resource`(`resourceId`, `roleId`, `can_add`, `can_view`, `can_edit`, `can_delete`,  `can_approve`, `createAt`) VALUES ('$resourceId','$roleId','$add','$view','$update','$delete','$can_approve','$submitteddate')");

  $activity = addslashes("<code style='color: blue;'> Role ".$roleNameDb." added for user with userID ".$userId."</code>");
  $historylogs = new Historylogs($_SESSION['id'], $activity, date('Y-m-d h:i:sa'), date('Y-m-d'), date('m'), date('Y'));

$Error= "<div class='alert alert-success alert-rounded text-center'>New record created successfully<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button> </div>";
 $Error="none";
}else{

      try {// Updating if it exists
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Prepare statement
    $stmt = $pdo->prepare("UPDATE `role_resource` SET `can_add`='$add',`can_approve`='$can_approve',`can_view`='$view',`can_edit`='$update',`can_delete`='$delete',`updatedAt`='$submitteddate' WHERE  resourceId = '$resourceId' and  roleId = '$roleId'");
    // execute the query
    $stmt->execute();
    // echo a message to say the UPDATE succeeded
    $activity = addslashes("<code style='color: blue;'> Role ".$roleNameDb." updated for user with userID ".$userId."</code>");
    $historylogs = new Historylogs($_SESSION['id'], $activity, date('Y-m-d h:i:sa'), date('Y-m-d'), date('m'), date('Y'));
    // $Error= $stmt->rowCount() . " records UPDATED successfully";
    $Error= "<div class='alert alert-success alert-rounded text-center'>".$stmt->rowCount() . " Record UPDATED successfully<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button> </div>";

    }
catch(PDOException $e)
    {
    $Error= $Error= "<div class='alert alert-danger alert-rounded text-center'>".$e->getMessage()."<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button> </div>";
    }


}
}
    }




//add resource
if (isset($_POST['update-resource'])) {
$resourceId = addslashes($_POST['resourceId']);
$resourceName = addslashes($_POST['resourceName']);
$resourceDesc = addslashes($_POST['resourceDesc']);
$submitteddate = date("D dS M,Y h:i a");

include 'config/connection.php';
try {
$conn = new PDO("mysql:host=$servername;dbname=$serverDatabase", $serverUsername, $serverPassword);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE `resource` SET `resourceName`='$resourceName',`resourceDesc`='$resourceDesc',`updatedAt`='$submitteddate' WHERE resourceId='$resourceId'";
// use exec() because no results are returned
$conn->exec($sql);

$activity = addslashes("<code style='color: blue;'> Resource with resourceId".$resourceId." has been <span style='color: black;'>updated</span> to ".$resourceName."</code>");
$historylogs = new Historylogs($_SESSION['id'], $activity, date('Y-m-d h:i:sa'), date('Y-m-d'), date('m'), date('Y'));


// $Error= "New record created successfully";
$Error= "<div class='alert alert-success alert-rounded text-center'>Record Updated successfully<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button> </div>";
}
catch(PDOException $e)
{
// $Error= $sql . "<br>" . $e->getMessage();
$Error= "<div class='alert alert-danger alert-rounded text-center'>".$e->getMessage()."<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button> </div>";
}
}






// Next of Kin
if ($_SERVER["REQUEST_METHOD"] == "POST") {      
if (isset($_POST['Change-password'])) {
// echo "connected";
  /*Pasword Cryprtion*/
$pwd='!?<3@l^Ai:&I';
$pwd1='!?<3o/]{iI0O';
$final_pswd=crypt(md5(crypt(sha1(md5(crypt(sha1($pwd.$_POST['pswd'].$pwd1),AP))),YU)),AA);
$Old_pwd=crypt(md5(crypt(sha1(md5(crypt(sha1($pwd.$_POST['Old_pwd'].$pwd1),AP))),YU)),AA);
include 'config/connection.php';
$result = $conn->query("SELECT pswd FROM users WHERE pswd='$Old_pwd' AND id='".$_SESSION['USER_PKID']."'");
if ($result->num_rows > 0) {
try {
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Prepare statement
    $stmt = $pdo->prepare("UPDATE users SET pswd='$final_pswd' WHERE id='".$_SESSION['USER_PKID']."'");
    // execute the query
    $stmt->execute();

    $activity = addslashes("<code><b> ".$_SESSION['username']."</b> has <span style='color: green;'>changed</span> their password</code>");
    $historylogs = new Historylogs($_SESSION['id'], $activity, date('Y-m-d h:i:sa'), date('Y-m-d'), date('m'), date('Y'));

    // echo a message to say the UPDATE succeeded
    // $Error= $stmt->rowCount() . " records UPDATED successfully";
    $Error = "<div class='alert alert-success alert-rounded text-center'>Password Changed Successfully
<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button>
</div>";
    }
catch(PDOException $e)
    {
    $Error= $sql . "<br>" . $e->getMessage();
    }
}else{
  // echo $$_SESSION['USER_PKID'];
}


}
}


// error_reporting(0);
if ($_SERVER["REQUEST_METHOD"] == "POST") {      
if (isset($_POST['forgotPassword'])) {
$token = sha1(md5(uniqid(mt_rand())));
$user=addslashes($_POST['user']);
$result = $conn->query("SELECT fname,lname,Email FROM users  WHERE (Email='$user' || PhoneNo='$user' || UserName='$user')");
$row = $result->fetch_assoc();
$name=$row['fn'];
$email=$row['Email'];
try {
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Prepare statement
    $stmt = $pdo->prepare("UPDATE users SET password_token='$token' WHERE Email='$email'");
    // execute the query
    $stmt->execute();
    // echo a message to say the UPDATE succeeded
    // $Error= $stmt->rowCount() . " records UPDATED successfully";
     /*Send confirmation email*/
     // $sql = "SELECT id, firstname, lastname FROM MyGuests";

$to = "$email, ";
$subject = "Reset your Password";
$siteURL = ($_SERVER["HTTPS"] == "on")?'https://':'http://'; 
$siteURL = $siteURL.$_SERVER["SERVER_NAME"].dirname($_SERVER['REQUEST_URI']).'/';
// link to reset
$verifyLink = $siteURL.'reset-password?ALeKk01Aq9LKlrq4_B0fiQ=uHSZ06KXuAE&new_password='.$token; 
$htmlContent = '
    <html>

    <head>

        <title>$subject </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <style type="text/css">
  table {

    text-align: left;
    padding: 0;
    font-family: Google Sans,Roboto,Helvetica,Arial,sans-serif;
    font-size: 15px;
    line-height: 1.5em;
    color: #444444;
}
</style>
    </head>
    <body > 
<div style="margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;background-color:#eeeeee">
<center style="width:100%;table-layout:fixed;background-color:#eeeeee">
<div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto">

<table align="center" style="border-spacing:0;font-family:'."Montserrat".',Helvetica;color:#333333;Margin:0 auto;width:100%;max-width:600px;background-color:#ffffff">

<tbody><tr>
<td bgcolor="#eeeeee" height="0" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
</td>
</tr>


<tr>
<td bgcolor="#eeeeee" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

<table align="center" bgcolor="#ffffff" height="100" width="100%" style="border-spacing:0;border-top-left-radius:.1em;border-top-right-radius:.1em;max-width:600px;font-family:'."Montserrat".',Helvetica;color:#333333">
<tbody><tr>
<td width="100%" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;border-top-left-radius:.1em;border-top-right-radius:.1em">
<img src="https://ci5.googleusercontent.com/proxy/tBYXzmbvglI7H8bQAjsTUxYZA477BWq_2xxxhiiP8Br7dpDtAj1tjh5WJ6EZMPYThhhErvAXFtJpOhYYgwffo2KRfSK2KZUQM773YqVFruvW0WiF3V8oU9Z6AEU0zt9yoEH4GC-ZuPJyH1sbWSQ_r4l5VwSF=s0-d-e1-ft#http://link.brightermonday.co.ug/img/5a61bb50e9a8a2425b8b4d7c5f1a5c5e3cd57451b0139ec2/c97e5630.gif" width="1px" height="0" style="border-width:0" class="CToWUd">
</td>
</tr>
<tr>
<td width="100%" height="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;border-top-left-radius:.1em;border-top-right-radius:.1em">
</td>
</tr>
<tr>
<td width="100%" align="center" bgcolor="#ffffff" style="border-spacing:0;border-top-left-radius:.1em;border-top-right-radius:.1em;max-width:200px;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
<a href="http://link.brightermonday.co.ug/click/5f1a5c5e3cd57451b0139ec2/aHR0cHM6Ly93d3cuYnJpZ2h0ZXJtb25kYXkuY28udWcvP3V0bV9zb3VyY2U9dHJhbnNhY3Rpb25hbCZ1dG1fbWVkaXVtPWVtYWlsJnV0bV9jYW1wYWlnbj1yZXNldC1wYXNzd29yZA/5a61bb50e9a8a2425b8b4d7cBf1380243" style="text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://link.brightermonday.co.ug/click/5f1a5c5e3cd57451b0139ec2/aHR0cHM6Ly93d3cuYnJpZ2h0ZXJtb25kYXkuY28udWcvP3V0bV9zb3VyY2U9dHJhbnNhY3Rpb25hbCZ1dG1fbWVkaXVtPWVtYWlsJnV0bV9jYW1wYWlnbj1yZXNldC1wYXNzd29yZA/5a61bb50e9a8a2425b8b4d7cBf1380243&amp;source=gmail&amp;ust=1596181324045000&amp;usg=AFQjCNF2DsWHfaXZ3ll9AM3fBg7Prk03LA">
<img src="https://web.mdiabetesapp.com/assets/img/logo-col.png" width="200" border="0"  alt=" " class="CToWUd">
</a>
</td>
</tr>
<tr>
<td width="100%" height="15" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;border-top-left-radius:.1em;border-top-right-radius:.1em">
</td>
</tr>
</tbody></table>

</td>
</tr>


<tr>
<td bgcolor="#eeeeee" height="2" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
</td>
</tr>


<tr>
<td bgcolor="#d42b3d" height="0" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
</td>
</tr>


<tr>
<td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
<table width="100%" align="center" style="border-spacing:0;font-family:'."Montserrat".',Helvetica;color:#333333">
<tbody><tr>
<td align="center" style="padding-top:40px;padding-bottom:10px;padding-right:10px;padding-left:10px;width:100%;text-align:center">
<p align="center" style="color:#316BB3;font-size:20px;Margin:0;font-weight:bold;Margin-bottom:10px">Hello '.$name.'.</p>
<p style="Margin-right:15px;Margin-left:15px;line-height:150%;font-size:15px;Margin:0;Margin-bottom:10px">You have requested a password change for your LADA account. Click on the button below to reset your password.</p>
</td>
</tr>

<tr>
<td width="100%" bgcolor="#ffffff" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
<table align="center" border="0" cellspacing="0" cellpadding="0" width="230" style="border-spacing:0;font-family:'."Roboto".',Helvetica;color:#ffffff">
<tbody><tr>
<td height="30px" width="230" style="border-radius:3px;background-color:#4ABFEA;width:230px;height:30px;font-family:'."Roboto".',Helvetica;color:#ffffff;text-decoration:none;font-weight:bold;text-align:center;padding-top:6px;padding-bottom:6px;padding-right:0;padding-left:0">
<a href='.$verifyLink.' style="font-family:'."Roboto".',Helvetica;color:#ffffff;text-decoration:none;font-weight:bold;text-align:center;display:block;width:100%" target="_blank" data-saferedirecturl="">Reset My Password</a>
</td> 
</tr>
</tbody></table>
</td>
</tr>

<tr>
<td align="center" style="padding-top:10px;padding-bottom:10px;padding-right:10px;padding-left:10px;width:100%;text-align:center">
<p style="Margin-right:15px;Margin-left:15px;line-height:150%;font-size:13px;Margin:0;Margin-bottom:10px">If you did not request this change, please <a href="mailto:info@mdiabetesapp.com" style="color:#316BB3;text-decoration:underline" target="_blank">contact us</a> immediately to secure your account.
</p>
</td>
</tr>

<tr>
<td height="10" width="100%" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
</td>
</tr>

</tbody></table>
</td>
</tr>

<tr>
<td height="2" width="100%" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
</td>
</tr>


<tr>
<td height="5" width="100%" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
</td>
</tr>


<tr> 
<td>
<a href="http://link.brightermonday.co.ug/click/5f1a5c5e3cd57451b0139ec2/aHR0cHM6Ly93d3cuYnJpZ2h0ZXJtb25kYXkuY28udWcvY3VzdG9tZXIvYWxlcnRzP3V0bV9zb3VyY2U9dHJhbnNhY3Rpb25hbCZ1dG1fbWVkaXVtPWVtYWlsJnV0bV9jYW1wYWlnbj1jbXAtYWxlcnRzLTIwMjAtMDctMjQ/5a61bb50e9a8a2425b8b4d7cBecc65a5e" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://link.brightermonday.co.ug/click/5f1a5c5e3cd57451b0139ec2/aHR0cHM6Ly93d3cuYnJpZ2h0ZXJtb25kYXkuY28udWcvY3VzdG9tZXIvYWxlcnRzP3V0bV9zb3VyY2U9dHJhbnNhY3Rpb25hbCZ1dG1fbWVkaXVtPWVtYWlsJnV0bV9jYW1wYWlnbj1jbXAtYWxlcnRzLTIwMjAtMDctMjQ/5a61bb50e9a8a2425b8b4d7cBecc65a5e&amp;source=gmail&amp;ust=1596181324045000&amp;usg=AFQjCNFMVgzaqd_iChiHAwO_5jLCaanshw"> <img src="https://web.mdiabetesapp.com/assets/img/banner1.png" width="600" border="0" height="auto" align="center" alt="profile-bm" class="CToWUd"> </a>
</td>
</tr>

<tr>
<td height="5" width="100%" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
</td>
</tr>


<tr>
<td height="2" width="100%" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
</td>
</tr>


<tr>
<td bgcolor="#ffffff" height="5" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
</td>
</tr>
  


<tr>
<td bgcolor="#eeeeee" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

<table align="center" bgcolor="#eeeeee" width="100%" style="border-spacing:0;max-width:600px;font-family:Roboto,Helvetica;color:#333333">
<tbody><tr>
<td height="25" width="100%" bgcolor="#ffffff" style="border-spacing:0;padding-top:0px;padding-bottom:10px;padding-right:0;padding-left:0">
</td>

</tr><tr>
<td height="2" width="100%" bgcolor="#eeeeee" style="padding-top:0px;padding-bottom:0;padding-right:0;padding-left:0">
</td>
</tr>



<tr>
<td width="100%" bgcolor="#ffffff" align="center" style="padding-top:20px;padding-bottom:0;padding-right:0;padding-left:0;border-spacing:0">
<table align="center" bgcolor="#ffffff" width="165" style="border-spacing:0;font-family:'."Source Sans Pro".',sans-serif;color:#ffffff;max-width:165px">
<tbody><tr>
<td width="35" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
<a href="http://link.brightermonday.co.ug/click/5f1a5c5e3cd57451b0139ec2/aHR0cHM6Ly93d3cuZmFjZWJvb2suY29tL0JyaWdodGVyTW9uZGF5VUc_dXRtX3NvdXJjZT10cmFuc2FjdGlvbmFsJnV0bV9tZWRpdW09ZW1haWwmdXRtX2NhbXBhaWduPXJlc2V0LXBhc3N3b3Jk/5a61bb50e9a8a2425b8b4d7cB5a7da194" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://link.brightermonday.co.ug/click/5f1a5c5e3cd57451b0139ec2/aHR0cHM6Ly93d3cuZmFjZWJvb2suY29tL0JyaWdodGVyTW9uZGF5VUc_dXRtX3NvdXJjZT10cmFuc2FjdGlvbmFsJnV0bV9tZWRpdW09ZW1haWwmdXRtX2NhbXBhaWduPXJlc2V0LXBhc3N3b3Jk/5a61bb50e9a8a2425b8b4d7cB5a7da194&amp;source=gmail&amp;ust=1596181324045000&amp;usg=AFQjCNFw0BITHdTxcoPnGLIDVAuvkIZyVQ"><img src="https://ci6.googleusercontent.com/proxy/PkxfOcEU5fTEGjshRCp7SGxykZRsdgfs3IdBJhXXlALuIkV4Uxgetn_XbHJk9fna3yY8GBISgq2LsG87T11ra_brsftlQGK9d8y_=s0-d-e1-ft#https://media.sailthru.com/5na/1k3/b/7/5dc3df0093f20.png" alt="fb" height="35" width="35" class="CToWUd"></a>  
</td>
<td width="10" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
<br>
</td>
<td width="35" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
<a href="http://link.brightermonday.co.ug/click/5f1a5c5e3cd57451b0139ec2/aHR0cHM6Ly90d2l0dGVyLmNvbS9icmlnaHRlcm1vbnVnP3V0bV9zb3VyY2U9dHJhbnNhY3Rpb25hbCZ1dG1fbWVkaXVtPWVtYWlsJnV0bV9jYW1wYWlnbj1yZXNldC1wYXNzd29yZA/5a61bb50e9a8a2425b8b4d7cBe13aeab2" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://link.brightermonday.co.ug/click/5f1a5c5e3cd57451b0139ec2/aHR0cHM6Ly90d2l0dGVyLmNvbS9icmlnaHRlcm1vbnVnP3V0bV9zb3VyY2U9dHJhbnNhY3Rpb25hbCZ1dG1fbWVkaXVtPWVtYWlsJnV0bV9jYW1wYWlnbj1yZXNldC1wYXNzd29yZA/5a61bb50e9a8a2425b8b4d7cBe13aeab2&amp;source=gmail&amp;ust=1596181324045000&amp;usg=AFQjCNHS60Jg6XeW9Tou6sPXKw46m8Q3RA"><img src="https://ci3.googleusercontent.com/proxy/Nt-To4AG34s-PuJr1gmBcCVg9Ot37B6s8c7LIewrG4wQ0N3jTBYJa816w74TsjcmpW3hOHBv-SEp4ioqUoC--e35x83PZiQUDEbL=s0-d-e1-ft#https://media.sailthru.com/5na/1k3/b/7/5dc3df0ea2d5b.png" width="35" height="35" alt="Twitter.png" class="CToWUd"></a>
</td>
<td width="10" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
<br>
</td>
<td width="35" align="center" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
<a href="" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://link.brightermonday.co.ug/click/5f1a5c5e3cd57451b0139ec2/aHR0cHM6Ly93d3cuaW5zdGFncmFtLmNvbS9icmlnaHRlcm1vbmRheXVnP3V0bV9zb3VyY2U9dHJhbnNhY3Rpb25hbCZ1dG1fbWVkaXVtPWVtYWlsJnV0bV9jYW1wYWlnbj1yZXNldC1wYXNzd29yZA/5a61bb50e9a8a2425b8b4d7cB34938cc9&amp;source=gmail&amp;ust=1596181324045000&amp;usg=AFQjCNHne3PPxjYiGD9nytDztrDGGJE-Ng"><img src="https://ci6.googleusercontent.com/proxy/t9R1oOWrqUwWz1g51Jx3X8WwqnspUxd00oclFN5Ylp7TeqHtp3KPGzwJm-T9WQhy2utylHrUwUdnNCDeitKl57YnvYxj-H8ec-8K=s0-d-e1-ft#https://media.sailthru.com/5na/1k3/b/7/5dc3df0d3fdf6.png" width="35" height="35" alt="Instagram.png" class="CToWUd"></a>
</td>
</tr>
</tbody></table>
</td>
</tr>


<tr>
<td valign="top" height="100%" bgcolor="#ffffff" align="center" style="border-spacing:0;padding-top:0;text-align:center;font-size:13px;color:#ffffff;padding-bottom:0;padding-right:0;padding-left:0">
<p style="color:#555555;font-size:13px;margin-top:20px;margin-bottom:0px">You are receiving this email because you are a registered user on BrighterMonday Uganda.<br><br></p>
<p style="color:#555555;font-size:13px;margin-top:0px;margin-bottom:0px"><a href="" style="color:#555555;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://link.brightermonday.co.ug/view/5a61bb50e9a8a2425b8b4d7c5f1a5c5e3cd57451b0139ec2/b04ae413&amp;source=gmail&amp;ust=1596181324046000&amp;usg=AFQjCNEVl0IgMYDIVswGGDHhLs-L84ZGmQ">View Online Version</a> | <a href="" style="color:#555555;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://link.brightermonday.co.ug/click/5f1a5c5e3cd57451b0139ec2/aHR0cHM6Ly93d3cuYnJpZ2h0ZXJtb25kYXkuY28udWcvcHJpdmFjeT91dG1fc291cmNlPXRyYW5zYWN0aW9uYWwmdXRtX21lZGl1bT1lbWFpbCZ1dG1fY2FtcGFpZ249cmVzZXQtcGFzc3dvcmQ/5a61bb50e9a8a2425b8b4d7cB318591af&amp;source=gmail&amp;ust=1596181324046000&amp;usg=AFQjCNEgKJXZwm5kEYA3op0XWFC8m0T6kg"> Privacy Policy</a>  | <a href="" style="color:#555555;text-decoration:underline" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://link.brightermonday.co.ug/click/5f1a5c5e3cd57451b0139ec2/aHR0cHM6Ly9saW5rLmJyaWdodGVybW9uZGF5LmNvLnVnL21hbmFnZS81Zm8vcHJlZmVyZW5jZWNlbnRlcj9lbWFpbD1uc2liYW1iaWslNDBnbWFpbC5jb20mdXRtX3NvdXJjZT10cmFuc2FjdGlvbmFsJnV0bV9tZWRpdW09ZW1haWwmdXRtX2NhbXBhaWduPXJlc2V0LXBhc3N3b3Jk/5a61bb50e9a8a2425b8b4d7cB24abae5c&amp;source=gmail&amp;ust=1596181324046000&amp;usg=AFQjCNHNFM-mfa6mU1ZrI9hi9i5aaVwzHQ"> Unsubscribe</a> </p>
<p style="color:#555555;text-align:center;font-size:13px;margin-top:0px"><br>Copyright © 2020 BrighterMonday.</p><br><br>    
</td>
</tr>

</tbody></table>

</td>
</tr>
 
  
</tbody></table>

</div>
</center><div class="yj6qo"></div><div class="adL">

</div></div>
    </body>
</html>';



// Set content-type header for sending HTML email

$headers = "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";



// Additional headers

$headers .= 'From: LADA<info@mdiabetesapp.com>' . "\r\n";

$headers .= 'Cc: info@mdiabetesapp.com' . "\r\n";

$headers .= 'Bcc: info@mdiabetesapp.com' . "\r\n";



// Send email

if(mail($to,$subject,$htmlContent,$headers)):

    // $successMsg = 'Email has sent successfully.';
  $Error= "<div class='alert alert-success'>
<button type='button' class='close' data-dismiss='alert'>×</button>
<b> <i class='fa fa-check-square'></i></b> We have sent a link to your Email Address click on it to reset your Password. <br> Thank you.</div>";
else:

    $Error = 'Email sending fail.';

endif;

/*-------Sennd email to the sender-------*/
    }
catch(PDOException $e)
    {
   $Error= "<div class='alert alert-danger'>
<button type='button' class='close' data-dismiss='alert'>×</button>
<b> <i class='fa fa-exclamation-circle '></i><b>Error:</b> </b> '".$e->getMessage()."'</div>";
    }
  }
}


// Update users
if (isset($_POST['edit-account'])) {
$fname = addslashes($_POST['fname']);
$lname = addslashes($_POST['lname']);
$PhoneNo = addslashes($_POST['PhoneNo']);
$Email = addslashes($_POST['Email']);
$User = addslashes($_POST['User']);
$UserId = $_SESSION['USER_PKID'];
$roleId = addslashes($_POST['roleId']);
$stat_date=date("Y-m-d"); 
$submitteddate=date("D dS M,Y h:i a");
// variables
$year=date("Y");
$month=date("M");
$date=date('D dS M,Y h:i a');


$filetmp = $_FILES["file_img"]["tmp_name"];
$filename = $_FILES["file_img"]["name"];
$filetype = $_FILES["file_img"]["type"];
$target_dir = "dist/img/users/";
$target_file = $target_dir .date('si') . "_" .  basename($_FILES["file_img"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
try {
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($filetmp=='') {
    $sql = "UPDATE `users` SET `fname`='$fname',`lname`='$lname',`Email`='$Email',`UserName`='$User',`PhoneNo`='$PhoneNo' WHERE id='$UserId'";
}else{
   $sql = "UPDATE `users` SET `fname`='$fname',`lname`='$lname',`profilePic`='$target_file',`Email`='$Email',`UserName`='$User',`PhoneNo`='$PhoneNo' WHERE id='$UserId'";
}
    // Prepare statement
    $stmt = $pdo->prepare($sql);
    // execute the query
    $stmt->execute();

    $activity = addslashes("<code><b> ".$userId."</b> has <span style='color: blue;'>Updated the account Details</span></code>");
    $historylogs = new Historylogs($_SESSION['id'], $activity, date('Y-m-d h:i:sa'), date('Y-m-d'), date('m'), date('Y'));


// if (move_uploaded_file($_FILES["file_img"]["tmp_name"], $target_file)) {
//     // echo a message to say the UPDATE succeeded
// }
    // $Error= $stmt->rowCount() . " records UPDATED successfully";
        $Error= "<div align='center' class='alert alert-success alert-dismissible  ' role='alert'>
<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
</button>
<strong><i class='fa fa-check-circle'></i></strong> Update successfully 
</div>";
 
    }
catch(PDOException $e)
    {
     $Error= "<div align='center' class='alert alert-danger alert-dismissible ' role='alert'>
<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
</button>
<strong><i class='fa fa-exclamation-circle'></i></strong><strong> Error: </strong> Something went wrong, please try again later. 
</div>";
    // $Error= $sql . "<br>" . $e->getMessage();
    }

}

// Updating Users
if (isset($_POST['update-user-account'])) {
$fname = addslashes($_POST['fname']);
$lname = addslashes($_POST['lname']);
$PhoneNo = addslashes($_POST['PhoneNo']);
$Email = addslashes($_POST['Email']);
$User = addslashes($_POST['User']);
$roleId = addslashes($_POST['roleId']);
$userId = addslashes($_POST['userId']);
$stat_date=date("Y-m-d"); 
$submitteddate=date("D dS M,Y h:i a");
/*Pasword Cryprtion*/
$pwd='!?<3@l^Ai:&I';
$pwd1='!?<3o/]{iI0O';
$final_pswd=crypt(md5(crypt(sha1(md5(crypt(sha1($pwd.$_POST['pswd'].$pwd1),AP))),YU)),AA);
// variables
$year=date("Y");
$month=date("M");
$date=date('D dS M,Y h:i a');

try {
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // Prepare statement
  if (empty($_POST['pswd'])) {
  $stmt = $pdo->prepare("UPDATE `users` SET `fname`='$fname',`lname`='$lname',`Email`='$Email',`UserName`='$User',`PhoneNo`='$PhoneNo',`roleId`='$roleId'  WHERE id='$userId'");
}else{
    $stmt = $pdo->prepare("UPDATE `users` SET `fname`='$fname',`lname`='$lname',`Email`='$Email',`UserName`='$User',`PhoneNo`='$PhoneNo',`roleId`='$roleId', `pswd`='$final_pswd'  WHERE id='$userId'");
}
  // execute the query
  $stmt->execute();
  $activity = addslashes("<code><b> ".$userId."</b> has <span style='color: blue;'>Updated the account Details</span></code>");
    $historylogs = new Historylogs($_SESSION['id'], $activity, date('Y-m-d h:i:sa'), date('Y-m-d'), date('m'), date('Y'));
  // echo a message to say the UPDATE succeeded
  echo "<script> location.href=''; </script>";
  }
  catch(PDOException $e)
  {
  $Error= $sql . "<br>" . $e->getMessage();
  }

}

  /*this is for logining in the system*/

  /*profile update, both basic information and credentials*/
if (isset($_POST['updatelogin'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $Confirm = $_POST['Confirm'];
  $username = $_SESSION['username'];
  $phrase = '%#dE;'.$_POST['password'].'Gs^7*';
  $final_phrase = encryption($phrase);
  if ($Confirm==$password) {
    try {
      $conn->query("UPDATE users SET email = '$email',password = '$final_phrase' WHERE username = '$username'");
      $Error = "<div class='alert alert-success alert-rounded text-center'>Credentials Updated <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button> </div>";
    } catch (Exception $e) {
      echo $e->errorMsg();;
    }  
  }else{
    $Error = "<div class='alert alert-danger alert-rounded text-center'>Passwords don't match <button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>×</span> </button> </div>";
  }
}

  /*reset-password, both basic information and credentials*/
if (isset($_POST['reset-password'])) {
  $password_token = $_POST['password_token'];
  $pswd = $_POST['pswd'];
 /*Pasword Cryprtion*/
$pwd='!?<3@l^Ai:&I';
$pwd1='!?<3o/]{iI0O';
$final_pswd=crypt(md5(crypt(sha1(md5(crypt(sha1($pwd.$_POST['pswd'].$pwd1),AP))),YU)),AA);
   
try {
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Prepare statement
    $stmt = $pdo->prepare("UPDATE users SET pswd = '$final_pswd' WHERE password_token = '$pkiD'");
    // execute the query
    $stmt->execute();
    // echo a message to say the UPDATE succeeded
    $Error= $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
    $Error= $sql . "<br>" . $e->getMessage();
    }
 
}


// uploading images
if (isset($_POST['upload'])) {

$siteURL = ($_SERVER["HTTPS"] == "on")?'https://':'http://'; 
$siteURL = $siteURL.$_SERVER["SERVER_NAME"].dirname($_SERVER['REQUEST_URI']).'/';
if($_FILES["file"]["name"] != '')
{


    /*Image*/
    $filename = "imagename.txt";
    $count = file_get_contents($filename);
    if ($count == null)
    $count = 0;
    $count++;
    $handle = fopen($filename, "w+");
    fwrite($handle, $count);
    fclose($handle);
    $file_ext=strtolower(end(explode('.',$_FILES['file']['name'])));
    $newFilename = $uploadDir .$count.".".$file_ext; 
$url = $siteURL.'images/gallery/' . $newFilename;  
$location = 'images/gallery/' . $newFilename;  
// mysqli_query($conn,"insert into photo (location) values ('$location')");
try {
// set the PDO error mode to exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT into photo (location) values ('$url')";
// use exec() because no results are returned
$pdo->exec($sql);
// echo "New record created successfully";
move_uploaded_file($_FILES["file"]["tmp_name"], $location);
// move_uploaded_file($_FILES["file"]["name"], $target_file);
echo "<script type=\"text/javascript\">
alert(\"Image has been Uploaded successfully.\");
window.location = \"\"
</script>";

}
catch(PDOException $e)
{
echo $sql . "<br>" . $e->getMessage();
}
}
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (isset($_POST['submit_category'])) {
$nameArr = $_POST['name'];
$categoryArr=$_POST['category'];
$stat_date=date("Y-m-d");
$NINArr = $_POST['NIN'];
$submitteddate=date('D d M,Y h:i a');
$month=date('M');
$year=date('Y'); 

for($i = 0; $i < count($categoryArr); $i++){

if(!empty($categoryArr[$i])){
$category = $categoryArr[$i];
$s=date("s");
$d=date("d");
$rno= rand("1", "1000");
$category_id= ("$d"."$rno"."$s");
// $category_idArr = $category_id;
$filename = $type[$i];
// include 'config/connection.php'; /*Connection to the Database*/
try {
// set the PDO error mode to exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// use exec() because no results are returned
$pdo->exec("INSERT INTO `categories`(`category_id`, `category`, `submitteddate`, `submittedby`, `stat_date`, `month`, `year`) VALUES ('".$category_id."','".$category."','".$submitteddate."','".$submittedby."','".$stat_date."','".$month."','".$year."')");

$Error= "<div align='center' class='alert alert-success alert-dismissible  in text-center' role='alert'>
<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
</button>
<strong>Category Submitted successfully <i class='fa fa-check'></i></strong>
</div>";
}
catch(PDOException $e)
{
$Error= 
"<div class='alert alert-danger alert-dismissable float-left'>
<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
<b>Error :</b> <br>$sql  $e->getMessage()
'</div>";
}
//database insert query goes here
}
}
// }
}
}


if (isset($_POST['submit_post'])) {
$date=$_POST['date'];
$end_time=$_POST['end_time'];
$start_time=$_POST['start_time'];
$place=addslashes($_POST['place']);
$title=addslashes($_POST['title']);
$category=$_POST['category'];
$content=addslashes($_POST['content']);
$postedby= $_POST['postedby'];
$submitteddate=date('D d M, Y ');
// $month=date('M');
// $year=date('Y'); 
$stat_date=date('Y-m-d');
$filetmp = $_FILES["file_img"]["tmp_name"];
$filename = $_FILES["file_img"]["name"];
$filetype = $_FILES["file_img"]["type"];
$filepath = "images/posts/".$filename;
$target_file = $filepath .date('s'). basename($_FILES["file_img"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

try {
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO `post`(category, `newstitle`, `content`, `img_path`, `date`, `start_time`, `end_time`, `place`)VALUES ('$category','$title','$content','$filepath','$date','$start_time','$end_time','$place')";
// use exec() because no results are returned
$conn->exec($sql);
move_uploaded_file($filetmp, $filepath);
$Error= "<div align='center' class='alert alert-success alert-dismissible  in text-center' role='alert'>
<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
</button>
<strong>Record Submitted successfully <i class='fa fa-check'></i></strong>
</div>";
}
catch(PDOException $e)
{
$Error= $sql . "<br>" . $e->getMessage();
//     $Error= 
// "<div class='alert alert-danger alert-dismissable float-left'>
//         <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
//            <b>Error :</b> <br>$sql  $e->getMessage()
//           '</div>";
}
}
