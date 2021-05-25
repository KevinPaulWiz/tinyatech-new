<?php include 'config/connection.php'; 
 
 $id = intval($_REQUEST['id']);
// $id='1';
 // echo $id;
$sql = "SELECT * FROM  post WHERE  deleted !='-1' AND id='$id'";
$result = $conn->query($sql);
// output data of each row
while($row = $result->fetch_assoc()) {
$id = $row['id'];
?>
 
   
<div class="form-group">
<div class="card mx-auto mt-3">
      <div class="card-header">
        <p><h5 class="text-uppercase"><b>UPDATE <?php echo $row['title']; ?>'S Record </b></h5></p>
      </div>
      <div class="card-body">
        <form method="POST" action="#" name="form1"  data-parsley-validate>


          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <label for="fullname">Title <span class="text-danger">*</span> </label>
          <input type="text"  name="title" class="form-control" value="<?php echo $row['title']; ?>" >
        </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <label for="fullname">Category <span class="text-danger">*</span></label>
          <select name="category_id" class="form-control" required="" style="width: 100%;">
                            <option value="">Choose </option>
                    <?php 
                        include 'config/connection.php'; 
                    $sql = "SELECT *FROM `categories` WHERE deleted!='-1'";
                    $result = $conn->query($sql);
                    ?>
                    <?php while ($rows = $result->fetch_assoc()) {?>
                         <option value="<?php echo $rows['category_id']; ?>"><?php echo htmlspecialchars($rows['category']) ?></option>
                                                    
                    <?php }?>
                          </select>
          </div>
          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <!-- <label for="fullname">Image <span class="text-danger">*</span> </label> -->
          <!-- <input type="file" name="file_img" class="form-control pt-0 pl-0 border-0" value="<?php //echo $row['img_path']; ?>" > -->
          <input type="hidden" name="id" value = "<?php echo $row["id"] ?>">
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">  <label for="fullname">Content <span class="text-danger">*</span></label>         
          <textarea rows="3" class="form-control editor" value = "<?php echo $row["content"]; ?>" required="" name="content"></textarea>                                    
          </div>

          <div class="form-group text-right m-b-0 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <button class="btn btn-primary" name="updateMember" type="submit">
              Submit
          </button>
          <button type="reset" class="btn btn-secondary m-l-5">
              Cancel
          </button>
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

