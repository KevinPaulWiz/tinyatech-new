<?php include 'templates/header.php'; ?>

<div class="row">

<div class="col-xs-12 col-sm-12 ">	
  <!-- Produts Configuration -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['Add_Product'])) {
         $category_id = $_POST["category_id"];
         $saler_id = $_POST["saler_id"];
         $product_name = $_POST["product_name"];
         $product_price = $_POST["product_price"];
         $product_quantity = $_POST["product_quantity"];
         $product_long_desc = $_POST["product_long_desc"];
         $submitteddate=date("D dS M,Y");
         $submittedby = $_SESSION['email'];
         $filetmp = $_FILES["file_img"]["tmp_name"];
          $filename = $_FILES["file_img"]["name"];
          $filetype = $_FILES["file_img"]["type"];
          $filepath = "images/products/".$filename;
           // validating image size
          $imageFileType = pathinfo($filename,PATHINFO_EXTENSION);
  // echo "Not found";
          // Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $Error='<div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Sorry, only JPG, JPEG &  PNGfiles are allowed.
                            </div>.';
    
}else{
  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `products`(`category_id`, `product_name`, `product_price`, `product_quantity`, `product_long_desc`, `img_name`, `img_type`, `img_path`, `submittedby`, `submitteddate`) VALUES ('$category_id','$product_name','$product_price','$product_quantity','$product_long_desc','$filename','$filetype','$filepath','$submittedby','$submitteddate')";
    // use exec() because no results are returned
    $conn->exec($sql);
        
    // echo "<script> location.href='verifyaccount'; </script>";
// move_uploaded_file($filetmp2, $filepath2);
    move_uploaded_file($filetmp, $filepath);
  $Error= '<div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                New Product added Successfully.
              </div>';
    // echo "$Auto_password";
    }
catch(PDOException $e)
    {
    $Error= "<div  class='alert alert-danger ' role='alert'>
      <button  class='close' data-dismiss='alert' >
      </button>
      <b>Error</b> :'". $e->getMessage()."';
      </div>";
    }
}
  

// $conn = null;

}
}
    ?>
    <!-- Produts Configuration -->


<?php echo "$Error"; ?>			
<div class="card mb-3">
<div class="card-header">
<h3 class=" text-uppercase"><i class="fa fa-hand-pointer-o"></i> Shop category</h3>
</div>

<div class="card-body">
			
<form method="post" action="<?php echo htmlspecialchars($_SERVER[""]);?>" id="demo-form" data-parsley-validate  enctype="multipart/form-data">
<div class=" row  fieldGroup">
 <!--  <div class="form-group col-sm-6 pl-0 ml-0  mr-0 pl-0 ml-0">
                                            <label>Saler ID</label>
                                            <select required="" name="saler_id" class="form-control">
                                             
                                            </select>
                                        </div> -->
                                         <div class="form-group col-sm-12 pl-0 ml-0 mr-0 pl-0 ml-0">
                                            <label>Category </label>
                                            <select required="" name="category_id" class="form-control">
                                                <option value="">Select</option>
                                             <?php 
                                                include 'config/connection.php';  
                                                $sql = "SELECT *FROM `category` WHERE deleted !='-1'";
                                                $result = $conn->query($sql);
                                                ?>
                                                 <?php while ($rows = $result->fetch_assoc()) {?>
                                                     <option value="<?php echo htmlspecialchars($rows['category_id']) ?>"><?php echo htmlspecialchars($rows['category_name']) ?></option>                        
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12 pl-0 ml-0 mr-0 pl-0 ml-0">
                                            <label>Product Name</label>
                                            <input type="text" required="" name="product_name" placeholder="Product Name" class="form-control">

                                        </div>
                                        <div class="form-group col-sm-6 pl-0 ml-0 mr-0 pl-0 ml-0">
                                            <label>Product Price</label>
                                            <input type="number" required="" name="product_price" placeholder="Product Price" class="form-control">

                                        </div>
                                        <div class="form-group col-sm-6 pl-0 ml-0 mr-0 pl-0 ml-0">
                                            <label> Product quantity</label>
                                            <input type="number" required="" name="product_quantity" placeholder="Product quantity" class="form-control">

                                        </div>
                                         
                                        <div class="form-group col-sm-12 pl-0 ml-0 mr-0 pl-0 ml-0">
                                            <label> Product Image</label>
                                            <input type="file" required="" name="file_img" placeholder="Productname" class="form-control1 pt-0 border-none">

                                        </div>
                                        <div class="form-group col-sm-12 pl-0 ml-0 mr-0 pl-0 ml-0">
                                            <label> Product Description</label>
                                            <textarea name="product_long_desc" placeholder="Product Description..." class="form-control "></textarea>

                                        </div>
</div>


<div class="form-group pull-left text-right m-b-0">
    <button name="Add_Product" class="btn btn-primary" type="submit">
        Submit
    </button>
    <button type="reset" class="btn btn-secondary m-l-5">
        Cancel
    </button>
</div>
</form>
<div class="fieldGroupCopy"  style="display: none;">
  <div class=" row ">
    
  
  <div class="col-sm-10"> 
    <label for="userName">Category <span class="text-danger">*</span></label>
    <input type="text" name="category[]" data-parsley-trigger="change" required placeholder="Enter Category" class="form-control" Ctategory="userName">
  </div>
  <div class=" ">
     <div class="col-sm-2">
          <label for="userName" style="visibility: hidden;"> fgf</label>
<a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon fa fa-remove" aria-hidden="true"></span> </a>
     </div>
  </div>
</div>
</div>
</div>														
</div><!-- end card-->					
</div>

								
<?php include 'templates/footer.php'; ?>
<script type="text/javascript">
    $(document).ready(function(){
    //group add limit
    var maxGroup = 15;
    
    //add more fields group
    $(".addMore").click(function(){
        if($('body').find('.fieldGroup').length < maxGroup){
            var fieldHTML = '<div class="form-group fieldGroup">'+$(".fieldGroupCopy").html()+'</div>';
            $('body').find('.fieldGroup:last').after(fieldHTML);
        }else{
            alert('Maximum '+maxGroup+' groups are allowed.');
        }
    });
    
    //remove fields group
    $("body").on("click",".remove",function(){ 
        $(this).parents(".fieldGroup").remove();
    });
});
</script>