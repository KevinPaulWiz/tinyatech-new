<?php 
// session_start(); /*starting thr session*/
// error_reporting(1); /*making sure errors are not displayed to user*/
include 'main/inc.php';
include 'config/connection.php';
// extract the filename
$Url = basename($_SERVER['SCRIPT_FILENAME'], '.php');
// replace dashes with whitespace
$title = str_replace('-', ' ', $Url);
$title = str_replace('_', ' ', $Url);
// check if the file is index, if so assign 'home' to the title instead of index
// capitalize all words
$title = ucwords($title);

if (!$_SESSION['token']) { /*Preventing one to access the system when a session has not been created*/
	echo "<script>window.location='logout';</script>";/*Redirecting to the login page*/
}else{
	$results_user = $conn->query("SELECT *
	FROM users WHERE users.status=1 AND users.token='".$_SESSION['token']."' ");
	if ($results_user->num_rows > 0) { 
		$row_user = $results_user->fetch_assoc();
		$User_User = $row_user["UserName"];
		$User_fname = $row_user["fname"];
		$User_lname= $row_user["lname"];
		$User_Email = $row_user["Email"];
		$User_img_path = $row_user["profilePic"];
		$User_year = $row_user["year"];
		$User_PhoneNo = $row_user["PhoneNo"];
		$User_roleId = $row_user["roleId"];
		$User_RoleName= $row_user["RoleName"];
		$User_Id= $row_user["id"];
		$_SESSION['USER_PKID']= $row_user["id"];

		// // accessing the URL Form The database
		$results = $conn->query("SELECT resourceName,resourceId FROM resource WHERE resourceName='$Url'");
			if ($results->num_rows > 0) { 
				$row_res = $results->fetch_assoc();
				// // check autuorization
				$sql_check = "SELECT users.roleId, users.id, role_resource . * FROM users RIGHT JOIN role_resource ON users.roleId = role_resource.roleId WHERE `users`.`roleId` ='$User_roleId'AND `role_resource`.`resourceId` ='".$row_res['resourceId']."'"; $access_sql = $conn->query($sql_check);
				if ($access_sql->num_rows > 0) { 
				// $pageAccess="1";
					$row_access = $access_sql->fetch_assoc();
				}else{
				// echo "<script type='text/javascript'>window.location ='access-denied';</script>";
				}
			}else{
				// echo "<script type='text/javascript'>window.location ='access-denied';</script>";/*Redirecting to the login page*/ 
			}
		
	}else{
		echo "<script type='text/javascript'>window.location ='logout';</script>";/*Redirecting to the login page*/ 
	}
} 

?>