<?php include 'templates/header.php'; ?>
<div class="content-page">
    
        <!-- Start content -->
        <div class="content">
            
            <div class="container-fluid">


            <div class="row">
                    <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                    <h1 class="main-title float-left text-uppercase">Shop Management System </h1>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item">Home</li>
                                        <li class="breadcrumb-item active">Form validation</li>
                                    </ol>
                                    <div class="clearfix"></div>
                            </div>
                    </div>
            </div>
            <!-- end row -->
<div class="row">

<div class="col-xs-12 col-sm-12 ">	
   <?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
           
  if (isset($_POST['submit_purchases'])) {
              $y=date("y");
              $d=date("d");
              $m=date("m");
              $s=date("s");
              $rno= rand("1", "1000");
              $a=substr($class, 0,1);
              $b=substr($class, 1,1);
              $ab=("$a"."$b");
              $n=substr($nationality, 0,1);
              $v=substr($y, 1,1);
              $c=substr($City, 0,1);
              $vm=substr($y, 1,1);
              $lm=substr($y, 0,1);
              // $rand=substr($rno, 2,2
              $purchaseID= ("$d"."$rno"."$s");
              $date=$_POST['date'];
              $reciept_no=$_POST['reciept_no'];
              $seller_name=$_POST['seller_name'];
              $qty=$_POST['qty'];
              $particular=$_POST['particular'];
              $amount=$_POST['amount'];
              $total_amount=$qty*$amount;
              $cal_date=date("Y-m-d");
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `purchases`(`date`, `purchaseID`, `reciept_no`, `seller_name`, `qty`, `particular`, `amount`, `total_amount`, `cal_date`) VALUES ('$date','$purchaseID','$reciept_no','$seller_name','$qty','$particular','$amount','$total_amount','$cal_date')";
    // use exec() because no results are returned
    $conn->exec($sql);
     $Error= "<div align='center' class='alert alert-success alert-dismissible  in text-center' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Record Submitted successfully <i class='fa fa-check'></i></strong>
                  </div>";
    }
catch(PDOException $e)
    {
    // echo $sql . "<br>" . $e->getMessage();
        $Error= 
    "<div class='alert alert-danger alert-dismissable float-left'>
            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
               <b>Error :</b> <br>$sql  $e->getMessage()
              '</div>";
    }
  }
}
?>		
<?php echo "$Error"; ?>			
<div class="card mb-3">
<div class="card-header">
<h3 class=" text-uppercase"><i class="fa fa-hand-pointer-o"></i> Shop Purchases</h3>
</div>

<div class="card-body">
			
<form method="post" action="<?php echo htmlspecialchars($_SERVER[""]);?>" id="demo-form" data-parsley-validate  enctype="multipart/form-data">
<div class="form-group">
    <label for="userName">Ctategory<span class="text-danger">*</span></label>
    <input type="date" name="date" data-parsley-trigger="change" required placeholder="Enter Ctategory" class="form-control" id="userName">
</div>

<div class="form-group text-right m-b-0">
    <button name="submit_purchases" class="btn btn-primary" type="submit">
        Submit
    </button>
    <button type="reset" class="btn btn-secondary m-l-5">
        Cancel
    </button>
</div>

</form>

</div>														
</div><!-- end card-->					
</div>

								
<?php include 'templates/footer.php'; ?>