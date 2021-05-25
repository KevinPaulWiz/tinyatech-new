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
<div class="col-xs-12 col-sm-12 ">  
   <?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
           
  if (isset($_POST['submit_sales'])) {
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
              $salesID= ("$rno"."$d"."$s");
              $date=$_POST['date'];
              $month=$_POST['month'];
              $year=$_POST['year'];
              $qty=$_POST['qty'];
              $particular=$_POST['particular'];
              $amount=$_POST['amount'];
              $total_amount=$qty*$amount;
               $cal_date=date("Y-m-d");
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `sales`(`date`, `salesID`, `month`, `year`, `amount`, `cal_date`) VALUES ('$date','$salesID','$month','$year','$amount','$cal_date')";
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
								<h3><i class="fa fa-hand-pointer-o"></i> Form validator</h3>
							</div>

          <div class="card-body">

          <form method="post" action="<?php echo htmlspecialchars($_SERVER[""]);?>" id="demo-form" data-parsley-validate  enctype="multipart/form-data">

          <div class="form-group">
          <label for="userName">Date<span class="text-danger">*</span></label>
          <input type="date" name="date" data-parsley-trigger="change" required placeholder="Enter Date" class="form-control" id="userName">
          </div>
          <div class="form-group">
          <label for="fullname">Month * </label>
          <select required="" name="month" class="form-control  " style="width: 100%;">
          <option value="">Select</option>
          <?php for( $m=1; $m<=12; ++$m ) { 
          $month_label = date('F', mktime(0, 0, 0, $m, 1));
          ?>
          <option value="<?php echo $month_label; ?>"><?php echo $month_label; ?></option>
          <?php } ?>
          </select>
          </div>
          <div class="form-group">
          <label for="heard">Year *</label>
          <select required="" id="year" name="year" class="form-control" >
          <!-- <option value="">Choose..</option> -->
          <?php 
          $year = date('Y');
          $min = $year - 10;
          $max = $year;
          for( $i=$max; $i>=$min; $i-- ) {
          echo '<option value='.$i.'>'.$i.'</option>';
          }
          ?>
          </select>
          </div>
          
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">           
            <div class="card mb-3">
              <div class="card-header">
                <h3><i class="fa fa-file-o"></i> WYSIWYG editor example</h3>
                Editor and generated code are optimized for HTML5 support. Compatible with all recents browsers like IE9+, Chrome, Opera and Firefox.
              </div>
                
              <div class="card-body">
                                
                    <textarea rows="3" class="form-control editor" name="content"></textarea>
                    
              </div>                            
            </div><!-- end card-->          
                    </div>
          
          <div class="form-group">
          <label for="passWord2">Amount <span class="text-danger">*</span></label>
          <input  type="number" name="amount" min="0" required placeholder="Enter Amount" class="form-control" >
          </div>

          <div class="form-group text-right m-b-0">
          <button class="btn btn-primary" name="submit_sales" type="submit">
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