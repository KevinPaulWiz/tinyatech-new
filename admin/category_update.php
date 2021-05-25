<?php 
 $id = intval($_REQUEST['id']);
// $id='1';
include 'config/connection.php';  
$sql = "SELECT * FROM  categories WHERE  deleted !='1' AND id='$id'";
$result = $conn->query($sql);
// output data of each row
while($row = $result->fetch_assoc()) {
$id = $row['id'];
?>
 
   
 <div class="table-responsive">
<div class="card mx-auto mt-3">
      <div class="card-header">
        <p><h5 class="text-uppercase"><b>UPDATE <?php echo $row['category']; ?>'S Record </b></h5></p>
      </div>
      <div class="card-body">
        <form method="POST" action="#" name="form1"  data-parsley-validate>
          <div class="col-md-12 row p-0">
            <div  class="form-group col-md-4">
            <label >category</label>
            <input required="" class="form-control" type="text" name="category" value="<?php echo $row['category'];?>" >
          </div>
          </div>
          
        <div class="form-group col-md-4">
          
            <input type="hidden" name="id" value="<?php echo $id;?>">
          </div>
<div class="form-group col-md-12 pt-3">
            <div class="form-row">
              <div class="col-md-4">
        <input class="btn btn-primary " name="updateMember" type="submit" value="Submit Form">
                              </div>
              
            </div>
          </div>

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

