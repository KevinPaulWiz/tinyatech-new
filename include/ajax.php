<?php
include '../admin/config/connection.php';
if (isset($_POST['subscribe-form-5-email'])) {
// echo "connected";
date_default_timezone_set('Africa/Nairobi');
//display the date and time
$Email_newsletter= $_POST['subscribe-form-5-email'];
$year=date("Y");
$month=date("M");
$stat_date=date("Y-m-d"); 
try {
// set the PDO error mode to exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// use exec() because no results are returned
$pdo->exec("INSERT INTO `newsletter`(`country`, `city`, `email`) VALUES ('$country','$city','$Email_newsletter')");
echo "New record created successfully";
echo "successfully";
}
catch(PDOException $e)
{
echo $sql . "<br>" . $e->getMessage();
}


}
// echo "try";

if (isset($_POST['contact-Phone-Number'])) {
//display the date and time
$message=addslashes($_POST['message']);
$phone=$_POST['contact-Phone-Number'];
$name=addslashes($_POST['name']);
$Email_contact=$_POST['contact-email'];
$year=date("Y");
$month=date("M");
$stat_date=date("Y-m-d"); 
try {
// set the PDO error mode to exception
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// use exec() because no results are returned
$pdo->exec("INSERT INTO `contact_us`(`name`, `phone`,  `email`,`message`) VALUES ('$name','$phone','$Email_contact','$message')");
// echo "New record created successfully";

$row = $conn->query("SELECT * FROM `email_settings` ")->fetch_assoc();
/*-------Sennd email to the sender-------*/
$result = $conn->query("SELECT email FROM  	notification ");
    // output data of each row
    while($rows = $result->fetch_assoc()) {
$to = $rows_notification['email'];
$subject = $row['name'];
// Other variabkles
$htmlContent = "Name: $name\n";
$htmlContent .= "Phone  Number: $phone\n";
$htmlContent .= "Email Address: $Email_contact\n";
$htmlContent .= "Message: $message\n";
// Set content-type header for sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// Additional headers
$headers .= 'From:  '.$row['name'].'<'.$row['contactemail1'].'>' . "\r\n";
$headers .= 'Cc: '.$row['contactemail1'].'' . "\r\n";
$headers .= 'Bcc:'.$row['contactemail1'].'' . "\r\n";
// Send email
if(mail($to,$subject,$htmlContent,$headers)):
$successMsg = 'Email has sent successfully.';
else:
$errorMsg = 'Email sending fail.';
endif;
       
    }





}
catch(PDOException $e)
{
echo $sql . "<br>" . $e->getMessage();
}


}