<?php 
session_start(); /*starting thr session*/
require_once 'history-logs.php'; /*file for the history logs*/
include '../config/connection.php'; /*connecting to the database for all*/
error_reporting(0);
/*a list of functions @fredrick Wampamba frerickwampamba1@gmail.com,  @kevin paul kevinpaulwiz@gmail.com functions necessary in this file*/
 


/*a list of functions @fredrick Wampamba frerickwampamba1@gmail.com,  @kevin paul kevinpaulwiz@gmail.com functions necessary in this file*/
/*classes that are to be used in the insertion to the databse*/
/*classes that are to be used in the insertion to the databse*/
/*setting shipping order current position to startPoint value in the system.*/

// Deleting access for the user
if(isset($_POST["DeleteAccess"])){
// $query = "DELETE FROM `role_resource` WHERE resourceRoleId = '".$_POST["DeleteAccess"]."'";
//  $conn->query($query);
try {
include '../config/connection.php';
// $conn = new PDO("mysql:host=$servername;dbname=$serverDatabase", $serverUsername, $serverPassword);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // sql to delete a record
    $sql = "DELETE FROM `role_resource` WHERE resourceRoleId = '".$_POST["DeleteAccess"]."'";

    // use exec() because no results are returned
    $pdo->exec($sql);

    $activity = addslashes("<code style=\"color:red;\"> <b> ".$_SESSION['username']."</b> username has deleted a role_resource with resourceRoleId ".$_POST["DeleteAccess"]."</code>");
    $historylogs = new Historylogs($_SESSION['id'], $activity, date('Y-m-d h:i:sa'), date('Y-m-d'), date('m'), date('Y'));

    echo "Record deleted successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
  // echo $_POST["DeleteAccess"];
}




// Deleting resource for the user
if(isset($_POST["resourceId"])){

try {
include '../config/connection.php';
// $conn = new PDO("mysql:host=$servername;dbname=$serverDatabase", $serverUsername, $serverPassword);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // sql to delete a record
    $sql = "DELETE FROM `resource` WHERE resourceId = '".$_POST["resourceId"]."'";
    // use exec() because no results are returned
    $pdo->exec($sql);

    $activity = addslashes("<code style=\"color:red;\"> <b> ".$_SESSION['username']."</b> username has deleted a resource with resourceId ".$_POST["resourceId"]."</code>");
    $historylogs = new Historylogs($_SESSION['id'], $activity, date('Y-m-d h:i:sa'), date('Y-m-d'), date('m'), date('Y'));

    echo "Record deleted successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    // echo $_POST["DeleteAccess"];
}


// Task Pending status
if(isset($_POST["TaskPending"])){
 $id=$_POST["TaskPending"];
try {
// $conn = new PDO("mysql:host=$servername;dbname=$serverDatabase", $serverUsername, $serverPassword);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // sql to delete a record
    $sql = "UPDATE `tasksboard` SET `taskstatus`='0' WHERE tasksNo  = '".$id."'"; // approved
    // use exec() because no results are returned
    $pdo->exec($sql);
    $activity = addslashes("<code style=\"color:yellow;\"> <b> ".$_SESSION['username']."</b> username has set an employee with employeeID ".$_POST['approve']." with a status of <span style=\"color:green;\">approved</span></code>");
    $historylogs = new Historylogs($_SESSION['id'], $activity, date('Y-m-d h:i:sa'), date('Y-m-d'), date('m'), date('Y'));

    // echo $_POST["approve"];
    }
catch(PDOException $e)
    {
    // echo $sql . "<br>" . $e->getMessage();
    }
}




// Task Inprogress status
if(isset($_POST["TaskInprogress"])){
 $id=$_POST["TaskInprogress"];
try {
// $conn = new PDO("mysql:host=$servername;dbname=$serverDatabase", $serverUsername, $serverPassword);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // sql to delete a record
    $sql = "UPDATE `tasksboard` SET `taskstatus`='1' WHERE tasksNo  = '".$id."'"; // approved
    // use exec() because no results are returned
    $pdo->exec($sql);
    $activity = addslashes("<code style=\"color:yellow;\"> <b> ".$_SESSION['username']."</b> username has set an employee with employeeID ".$_POST['approve']." with a status of <span style=\"color:green;\">approved</span></code>");
    $historylogs = new Historylogs($_SESSION['id'], $activity, date('Y-m-d h:i:sa'), date('Y-m-d'), date('m'), date('Y'));

    // echo $_POST["approve"];
    }
catch(PDOException $e)
    {
    // echo $sql . "<br>" . $e->getMessage();
    }
    // echo $id;
}






// Task Completed status
if(isset($_POST["TaskCompleted"])){
 $id=$_POST["TaskCompleted"];
try {
// $conn = new PDO("mysql:host=$servername;dbname=$serverDatabase", $serverUsername, $serverPassword);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // sql to delete a record
    $sql = "UPDATE `tasksboard` SET `taskstatus`='2' WHERE tasksNo  = '".$id."'"; // approved
    // use exec() because no results are returned
    $pdo->exec($sql);
    $activity = addslashes("<code style=\"color:yellow;\"> <b> ".$_SESSION['username']."</b> username has set an employee with employeeID ".$_POST['approve']." with a status of <span style=\"color:green;\">approved</span></code>");
    $historylogs = new Historylogs($_SESSION['id'], $activity, date('Y-m-d h:i:sa'), date('Y-m-d'), date('m'), date('Y'));

    // echo $_POST["approve"];
    }
catch(PDOException $e)
    {
    // echo $sql . "<br>" . $e->getMessage();
    }
    // echo $id;
}



// disabling employee status
if(isset($_POST["userDisable"])){
        try {
        $date=date("D dS M,Y h:i a");
        $id = $_POST["userDisable"];
// Check for status
$result = $conn->query("SELECT status FROM users WHERE id = '$id' ");
$row_status = $result->fetch_assoc();

    // $conn = new PDO("mysql:host=$servername;dbname=$serverDatabase", $serverUsername, $serverPassword);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($row_status['status']==1) {
    $sql = "UPDATE `users` SET `status`='0' WHERE id = '".$id."'";//deactive
    $activity = addslashes("<code style=\"color:black;\"> <b> ".$_SESSION['username']."</b> username has set a user with userID ".$_POST['id']." with a status of <span style=\"color:red;\">De-actived</span></code>");
}else{
     $sql = "UPDATE `users` SET `status`='1' WHERE id = '".$id."'";//active
     $activity = addslashes("<code style=\"color:black;\"> <b> ".$_SESSION['username']."</b> username has set a user with userID ".$_POST['id']." with a status of <span style=\"color:black;\">Actived</span></code>");
}
    // Prepare statement
    $stmt = $pdo->prepare($sql);

    // execute the query
    $stmt->execute();

    $historylogs = new Historylogs($_SESSION['id'], $activity, date('Y-m-d h:i:sa'), date('Y-m-d'), date('m'), date('Y'));

// call the function
    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    // echo $_POST["DeleteAccess"];
}





// disabling employee status
if(isset($_POST["DEL_empId"])){
        try {
        $date=date("D dS M,Y h:i a");
        $id = $_POST["DEL_empId"];
// Check for status
$result = $conn->query("SELECT status FROM employees WHERE id = '$id' ");
$row_status = $result->fetch_assoc();

    // $conn = new PDO("mysql:host=$servername;dbname=$serverDatabase", $serverUsername, $serverPassword);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($row_status['status']==1) {
    $sql = "UPDATE `employees` SET `status`='0' WHERE id = '".$id."'";//deactive
    $activity = addslashes("<code style=\"color:black;\"> <b> ".$_SESSION['username']."</b> username has set a user with userID ".$_POST['id']." with a status of <span style=\"color:red;\">De-actived</span></code>");
}else{
     $sql = "UPDATE `employees` SET `status`='1' WHERE id = '".$id."'";//active
     $activity = addslashes("<code style=\"color:black;\"> <b> ".$_SESSION['username']."</b> username has set a user with userID ".$_POST['id']." with a status of <span style=\"color:black;\">Actived</span></code>");
}
    // Prepare statement
    $stmt = $pdo->prepare($sql);

    // execute the query
    $stmt->execute();

    $historylogs = new Historylogs($_SESSION['id'], $activity, date('Y-m-d h:i:sa'), date('Y-m-d'), date('m'), date('Y'));

// call the function
    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    // echo $_POST["DeleteAccess"];
}



// disabling DEL_clients status
if(isset($_POST["DEL_clients"])){
        try {
        $date=date("D dS M,Y h:i a");
        $id = $_POST["DEL_clients"];
// Check for status
$result = $conn->query("SELECT status FROM client WHERE clientId  = '$id' ");
$row_status = $result->fetch_assoc();

    // $conn = new PDO("mysql:host=$servername;dbname=$serverDatabase", $serverUsername, $serverPassword);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($row_status['status']==1) {
    $sql = "UPDATE `client` SET `status`='0' WHERE clientId  = '".$id."'";//deactive
    $activity = addslashes("<code style=\"color:black;\"> <b> ".$_SESSION['username']."</b> username has set a client with userID ".$_POST['id']." with a status of <span style=\"color:red;\">De-actived</span></code>");
}else{
     $sql = "UPDATE `client` SET `status`='1' WHERE clientId  = '".$id."'";//active
     $activity = addslashes("<code style=\"color:black;\"> <b> ".$_SESSION['username']."</b> username has set a client with userID ".$_POST['id']." with a status of <span style=\"color:black;\">Actived</span></code>");
}
    // Prepare statement
    $stmt = $pdo->prepare($sql);

    // execute the query
    $stmt->execute();

    $historylogs = new Historylogs($_SESSION['id'], $activity, date('Y-m-d h:i:sa'), date('Y-m-d'), date('m'), date('Y'));

// call the function
    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    // echo $_POST["DeleteAccess"];
}



// disabling Project status
if(isset($_POST["DEL_deploymentPlan"])){
try {
$date=date("D dS M,Y h:i a");
$id = $_POST["DEL_deploymentPlan"];
// Check for status
$result = $conn->query("SELECT status FROM deploymentplan WHERE deploymentplanId   = '$id' ");
$row_status = $result->fetch_assoc();
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($row_status['status']==1) {
    $sql = "UPDATE `deploymentplan` SET `status`='0' WHERE deploymentplanId   = '".$id."'";//deactive
    $activity = addslashes("<code style=\"color:black;\"> <b> ".$_SESSION['username']."</b> username has set a client with userID ".$_POST['id']." with a status of <span style=\"color:red;\">De-actived</span></code>");
}else{
     $sql = "UPDATE `deploymentplan` SET `status`='1' WHERE deploymentplanId   = '".$id."'";//active
     $activity = projects("<code style=\"color:black;\"> <b> ".$_SESSION['username']."</b> username has set a client with userID ".$_POST['id']." with a status of <span style=\"color:black;\">Actived</span></code>");
}
    // Prepare statement
    $stmt = $pdo->prepare($sql);

    // execute the query
    $stmt->execute();

    $historylogs = new Historylogs($_SESSION['id'], $activity, date('Y-m-d h:i:sa'), date('Y-m-d'), date('m'), date('Y'));

// call the function
    // echo a message to say the UPDATE succeeded
    echo $stmt->rowCount() . " records UPDATED successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    // echo $_POST["DeleteAccess"];
}






// <!-- Update Employee -->
if ($_POST['UPDATE_EMPid']) {
 $id = intval($_REQUEST['UPDATE_EMPid']);
$result = $conn->query("SELECT * FROM `employees` WHERE id='$id'");
while($row = $result->fetch_assoc()) {// output data of each row
$id = $row['id'];
?>
<div class="modal-body">
                <div class="row clearfix">
                    <div class="col-md-4">
                        <div class="form-group"> 
                        <label>First Name <span class="text-danger">*</span></label>                                   
                            <input type="text" required="" class="form-control"  value="<?php echo $row['Fname'] ?>" name="Fname" placeholder="Fist Name">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label>Middle Name</label>                                    
                            <input type="text" class="form-control"  value="<?php echo $row['Mname'] ?>" name="Mname" placeholder="Middle Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"> 
                        <label>Last Name <span class="text-danger">*</span></label>                                   
                            <input type="text" required="" class="form-control"  value="<?php echo $row['Lname'] ?>" name="Lname" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"> 
                        <label>Email Address <span class="text-danger">*</span></label>                                   
                            <input type="text" required="" class="form-control"  value="<?php echo $row['Email'] ?>" name="Email" placeholder="Email ID">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label>Phone Number <span class="text-danger">*</span></label>                                    
                            <input type="number" required="" class="form-control"  value="<?php echo $row['Phone'] ?>" name="Phone" placeholder="Phone Number">
                        </div>
                    </div>    
                   
                   <div class="col-md-4">
                        <div class="form-group">
                        <label>Gender <span class="text-danger">*</span></label>                                   
                          <select required="" class="form-control select2" name="Gender" style="width: 100%;">
                             <option value="">-Select-</option>
                             <option  <?php if ($row['Gender']=="M") { echo "selected"; } ?>  value="M">Male</option>
                             <option  <?php if ($row['Gender']=="F") { echo "selected"; } ?>  value="F">Female</option>
                           </select>
                        </div>
                    </div>
                    <div class="col-1">
                        <div class="form-group">                                            
                                <img width="60" src="<?php 
                                if($row['img_path']!=''){ 
                                echo $row['img_path'];
                                }else{ 
                                echo "assets/images/xs/avatar1.jpg";
                                }
                                ?>" class=" avatar" alt="">
                        </div>
                        <hr>
                    </div>
                    <div class="col-11">
                        <div class="form-group">                                            
                            <input type="file" name="file_img" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                            <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                        </div>
                        <hr>
                    </div>
                   <div class="col-md-4">
                        <div class="form-group">
                        <label>ID Number</label>                                   
                            <input type="text" class="form-control"  value="<?php echo $row['ID_No'] ?>" name="" placeholder="ID Number">
                        </div>
                    </div>
                   <div class="col-md-4">
                        <div class="form-group">
                        <label>ID Type</label>                                   
                           <select class="form-control select2" name="ID_type" style="width: 100%;">
                             <option value="">-Select-</option>
                             <option <?php if ($row['ID_type']=="National ID") { echo "selected"; } ?> value="National ID">National ID</option>
                             <option <?php if ($row['ID_type']=="Passport") { echo "selected"; } ?> value="Passport">Passport</option>
                           </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">                                    
                        <label>Date of Birth <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" required=""  value="<?php echo $row['DOB'] ?>" name="DOB" placeholder="Join Date">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group"> 
                         <label>Role <span class="text-danger">*</span></label>                                   
                            <input type="text" class="form-control" required=""  value="<?php echo $row['profession'] ?>" name="profession" placeholder="Role">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group"> 
                         <label>Address <span class="text-danger">*</span></label>                                   
                            <input type="text" class="form-control" required=""  value="<?php echo $row['Address'] ?>" name="Address" placeholder="Address">
                        </div>
                    </div>
                </div>
            </div>
 <?php    
}
}





// <!-- Update Employee -->
if ($_POST['UPDATE_clientId']) {
 $id = intval($_REQUEST['UPDATE_clientId']);
$result = $conn->query("SELECT * FROM `client` WHERE clientId='$id'");
while($row = $result->fetch_assoc()) {// output data of each row
$id = $row['clientId'];
?>
<div class="modal-body">
<div class="row clearfix">
    <div class="col-md-4">
        <div class="form-group"> 
        <label>Company Name  <span class="text-danger">*</span></label>                                   
            <input type="text" class="form-control" required="" value="<?php echo $row['companyName']; ?>" name="companyName" placeholder="Company Name">
               <input type="hidden" name="id" value="<?php echo $id; ?>">
               <input type="hidden" name="NewName" value="<?php echo $row['companyName']; ?>">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
        <label>Contact Name  <span class="text-danger">*</span> </label>                                    
            <input type="text" required="" class="form-control" value="<?php echo $row['contactName']; ?>"  name="contactName" placeholder="Contact Name">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group"> 
        <label>Phone No.  <span class="text-danger">*</span></label>                                   
            <input type="text" required="" class="form-control" value="<?php echo $row['phone']; ?>"  name="phone" placeholder="Phone No.">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group"> 
        <label>Alternative Phone No.</label>                                   
            <input type="text" class="form-control" value="<?php echo $row['Altphone']; ?>"  name="Altphone" placeholder="Alternative Phone No.">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group"> 
        <label>Email Address</label>                                   
            <input type="text" class="form-control" value="<?php echo $row['email']; ?>"  name="email" placeholder="Email Address">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
        <label>Mailing Address  <span class="text-danger">*</span></label>                                    
            <input type="text" required="" class="form-control" value="<?php echo $row['mailingaddress']; ?>"  name="mailingaddress" placeholder="Mailing Address">
        </div>
    </div>    
 
    <div class="col-md-12">
        <div class="form-group"> 
         <label>Description</label>                                   
            <textarea class="form-control"   name="description" placeholder="Type Here..."> <?php echo $row['description']; ?></textarea>
        </div>
    </div>
</div>
</div>
 <?php    
}
}
