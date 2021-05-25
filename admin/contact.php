<?php include 'templates/header.php'; ?>

            
               
        <div class="card mb-3"> 
<div class="card-header">
<h3 class=" text-uppercase"><i class="fa fa-hand-pointer-o"></i>Message</h3>
</div>      
            <?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
           
  if (isset($_POST['submit_contact'])) {
              
/*------------------------------Members Insertion--------------------------------------*/
    date_default_timezone_set('Africa/Nairobi');
    $message = $_POST['message'];
    $phone=$_POST['phone'];
    $name = $_POST['name'];
    $email = $_POST['email'];
        $date=date("Y-m-d h:i");
      $submitteddate=date("D dS M,Y h:i:sa");
      $month=date("M");
      $year=date("Y");
      
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
     $sql = "INSERT INTO `contact_us`(`date`, `email`, `name`, `phone`, `submitteddate` , `month`, `year`, `message`) VALUES ('".$date."','".$email."','".$name."','".$phone."','".$submitteddate."','".$month."','".$year."','".$message."')";
    // use exec() because no results are returned
    $conn->exec($sql);

    $Error= "<div align='center' class='alert alert-success alert-dismissible  in text-center' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Message Submitted successfully <i class='fa fa-check'></i></strong>
                  </div>";
    }
catch(PDOException $e)
    {
   $Error= 
    "<div align='center' class='alert alert-danger alert-dismissible  in text-center' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>Message Submission Failed</strong>
                  </div>";
    }
                //database insert query goes here
            }
        }
    // }
    /*------------------------------//Members Insertion--------------------------------------*/
  
?>      
<?php echo "$Error"; ?>                 
                      
        <!-- Forms-3 -->
               <div class="card-body">
                    <form action="#" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name = "name" required="">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="email">Email<span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name = "email"  required="" >
                        </div>
                        </div>
                        
                       
                        <div class="form-row">
                            
                             <div class="form-group col-md-6">
                            <label for="phonenumber">Phone Number<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name = "phone" required="">
                        </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">  <label for="message">Message <span class="text-danger">*</span></label>         
          <textarea required="" placeholder="Type Here..." class="form-control editor" name="message">    </textarea>                                 
          </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit_contact">Send</button>
                    </form>
                </div>
                
                <!--// Forms-3 -->



                    </div></div>
    </div>

       </div>
               <!-- END container-fluid -->    
             
                        

            </div>
            <!-- END content -->

        </div>
        <?php include 'templates/footer.php'; ?>