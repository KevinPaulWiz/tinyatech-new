<?php include 'config/connection.php'; 
 
 $id = intval($_REQUEST['id']);
// $id='1';
 // echo $id;
$sql = "SELECT * FROM  newsletter WHERE  deleted !='-1' AND id='$id'";
$result = $conn->query($sql);
// output data of each row
while($row = $result->fetch_assoc()) {
$id = $row['id'];
?>
 
   
<div class="form-group">
<div class="card mx-auto mt-3">
      <!-- <div class="card-header">
        <p><h5 class="text-uppercase"><b>UPDATE <?php //echo $row['title']; ?>'S Record </b></h5></p>
      </div> -->
      <div class="card-body">
        <form method="POST" action="#" name="form1"  data-parsley-validate>


           <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" name = "email" value="<?php echo $row['email']; ?>" required="">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" name = "country" value="<?php echo $row['country']; ?>" required="" >
                        </div>
                        </div>
                        
                       
                        <div class="form-row">
                            
                             <div class="form-group col-md-6">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name = "city" value="<?php echo $row['city']; ?>" required="">
                        </div>
                            <div class="form-group col-md-6">
                                <label for="state">State</label>
                                <input type="text" class="form-control" name = "state" value="<?php echo $row['state']; ?>" required="">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="updateMember">Submit</button>
        </form>
 </div>
      </div>
   <!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- <script src="assets/parsleyjs/parsley.min.js"></script> -->
 </div>

 <?php    
}
// }
?>

