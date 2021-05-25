<?php include 'templates/header.php'; ?>


            
               
        <div class="card mb-3"> 
<div class="card-header">
<h3 class=" text-uppercase"><i class="fa fa-hand-pointer-o"></i>News Letters</h3>
</div>      
            <?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
           
  if (isset($_POST['submit_newsletter'])) {
              
/*------------------------------Members Insertion--------------------------------------*/
    date_default_timezone_set('Africa/Nairobi');
    $city = $_POST['city'];
    $country=$_POST['country'];
    $state = $_POST['state'];
    $email = $_POST['email'];
   
      $datetime=date("D dS M,Y h:i a");
      $month=date("M");
      $year=date("Y");
      
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
     $sql = "INSERT INTO `newsletter`(`datetime`, `country`, `state`, `city`, `email` , `month`, `year`) VALUES ('".$datetime."','".$country."','".$state."','".$city."','".$email."','".$month."','".$year."')";
    // use exec() because no results are returned
    $conn->exec($sql);

    $Error= "<div align='center' class='alert alert-success alert-dismissible  in text-center' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>News Letter Submitted successfully <i class='fa fa-check'></i></strong>
                  </div>";
    }
catch(PDOException $e)
    {
   $Error= 
    "<div align='center' class='alert alert-danger alert-dismissible  in text-center' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>News Letter Submission Failed</strong>
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
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" name = "email" required="">
                            </div>
                            <div class="form-group col-md-6">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" name = "country"  required="" >
                        </div>
                        </div>
                        
                       
                        <div class="form-row">
                            
                             <div class="form-group col-md-6">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name = "city" required="">
                        </div>
                            <div class="form-group col-md-6">
                                <label for="state">State</label>
                                <input type="text" class="form-control" name = "state" required="">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit_newsletter">Submit</button>
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