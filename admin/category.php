<?php include 'templates/header.php'; ?>

<div class="row">

<div class="col-xs-12 col-sm-12 ">  
   <?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
           
  if (isset($_POST['submit_category'])) {
    $nameArr = $_POST['name'];
    $categoryArr=$_POST['category'];
    $stat_date=date("Y-m-d");
    $NINArr = $_POST['NIN'];
      $submittedby=$_SESSION["id"];
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
include 'config/connection.php'; /*Connection to the Database*/
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
     $sql = "INSERT INTO `category`(`category_name`, `submitteddate`, `submittedby`, `stat_date`, `month`, `year`) VALUES ('".$category."','".$submitteddate."','".$submittedby."','".$stat_date."','".$month."','".$year."')";
    // use exec() because no results are returned
    $conn->exec($sql);

    // $Error= "<div align='center' class='alert alert-success alert-dismissible  in text-center' role='alert'>
    //                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
    //                 </button>
    //                 <strong>Category Submitted successfully <i class='fa fa-check'></i></strong>
    //               </div>";
      echo "<script type=\"text/javascript\">
              alert(\"Record has been added successfully.\");
              window.location = \"\"
            </script>";
                  
    }
catch(PDOException $e)
    {
     $Error= "<div  class='alert alert-danger ' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
      <b>Error</b> :'". $e->getMessage()."';
      </div>";
    }
                //database insert query goes here
            }
        }
    // }
    /*------------------------------//Members Insertion--------------------------------------*/
  }
}
?>    
<?php echo "$Error"; ?>     
<div class="card mb-3">
<div class="card-header">
<h3 class=" text-uppercase"><i class="fa fa-hand-pointer-o"></i>category</h3>
</div>

<div class="card-body">
      
<form method="post" action="<?php echo htmlspecialchars($_SERVER[""]);?>" id="demo-form" data-parsley-validate  enctype="multipart/form-data">
<div class=" row  fieldGroup">
  <div class="col-sm-10"> 
    <label for="userName">Category <span class="text-danger">*</span></label>
    <input type="text" name="category[]" data-parsley-trigger="change" required placeholder="Enter Category" class="form-control" Ctategory="userName">
  </div>
  <div class="form-group  ">
     <div class="col-sm-2">
          <label for="userName" style="visibility: hidden;"> fgf</label>
<a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon fa fa-plus" aria-hidden="true"></span> </a>
     </div>
  </div>
</div>


<div class="form-group pull-left text-right m-b-0">
    <button name="submit_category" class="btn btn-primary" type="submit">
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
    <input type="text" name="category[]" data-parsley-trigger="change" placeholder="Enter Category" class="form-control" Ctategory="userName">
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
<script type="text/javascript">
    $(document).ready(function(){
    //group add limit
    var maxGroup = 15;
    
    //add more fields group
    $(".addMore").click(function(){
      // alert('Error');
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
                
<?php include 'templates/footer.php'; ?>
