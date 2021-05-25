<?php include 'templates/header.php'; ?>
    <?php
   include 'config/connection.php';
   if (isset($_POST['upload'])) {
      if($_FILES["file"]["name"] != '')
{
    $newFilename = time() . "_" . $_FILES["file"]["name"];
    $location = 'images/gallery/' . $newFilename;  
    // mysqli_query($conn,"insert into photo (location) values ('$location')");
    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT into photo (location) values ('$location')";
    // use exec() because no results are returned
    $conn->exec($sql);
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

?>        
               
        <div class="card mb-3">
<div class="card-header">
<h3 class=" text-uppercase"><i class="fa fa-upload"></i> Upload Images</h3>
</div>
<div class = "card-body">
<form id="img_form" method="post" enctype="multipart/form-data">
        <!-- <h2 align="center" style="color:blue">Image Upload using AJAX in PHP/MySQLi</h2> -->
        <div class="form-group">
        <label>Select Image:</label>
        <input type="file" required="" class="form-control pl-0 pt-0 border-0" name="file" id="file"><br>
        <button type="submit" id="upload_button" name="upload" class="btn btn-primary">Upload</button>
        </div>
      </form>
       </div>
            </div>       
        <div class="card mb-3">
<div class="card-header">
<h3 class=" text-uppercase"><i class="fa fa-file-o"></i> View Images</h3>
</div>
<div class = "card-body">
<div >
      <div id="modal-loader" style="display: none; text-align: center;">
           <!-- ajax loader -->
           <img src="loading.gif">
           </div>
      <div id="image_area"><table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col"  width="200">Image</th>
                                <th scope="col">Image link</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead> 
<?php
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$sql_query = "SELECT * from photo WHERE deleted !='-1' ORDER BY id DESC";
$fetch_query = $pdo->query($sql_query);
$fetch_query->setFetchMode(PDO::FETCH_ASSOC);
$i=0;
$no = $i +1;
while ($rows = $fetch_query->fetch()):
$id = $rows["id"]; 
?>
                        <tbody>

  <tr class="delete_mem<?php echo $id ?>" id="<?php echo $id ?>" >
                            <td width="100"><div class="col-lg-12"><img style="width: 100px;" class="img-responsive img-fluid" src="<?php echo $rows['location']?>" ></div> </td>
                            <td>rk-admin/<?php echo $rows['location']?></td>
                            <td>
                              <!-- <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit_user_5"><i class="fa fa-pencil" aria-hidden="true"></i></a> -->
                            <a data-toggle="tooltip" data-placement="top" title="Delete Record" href="javascript:void(0);" class="btn btn-danger btn-sm access_level tr_level" data-role="deleted" data-id="<?php echo $id; ?>" id="<?php echo $id; ?>"><i class="fa  fa-trash-o"> </i></a></td>
                          </tr>



</tbody><?php
endwhile;
?>
                    </table></div>
  </div>
       </div>
            </div>
            <!-- END content -->

        </div>       
<script type="text/javascript">
    $(document).ready(function() {
      //  append values in input fields
      $(document).on('click','a[data-role=deleted]',function(){
            var id = $(this).attr("id");
            if (confirm("Are you sure you want to delete this record?")) {
                $.ajax({
                    type: "POST",
                    url: "img-del.php",
                    data: ({
                        id: id
                    }),
                    cache: false,
                    success: function(html) {
                        $(".delete_mem" + id).fadeOut('slow');
                    }
                });
            } else {
                return false;
            }
            
        });
    });
</script>
        <?php include 'templates/footer.php'; ?>
