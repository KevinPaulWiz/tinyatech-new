<?php include 'templates/header.php'; ?>


            
               
     
<!--Action Request-->
     <?php 
    if (isset($_REQUEST['action'])) {
      $action = $_REQUEST['action'];
      switch ($action) {
        case 'saleorder_details_Mk5eQOIRqBMO6':
          saleorder_details_Mk5eQOIRqBMO6();
        break;
        case 'MkWe9EsDFmnYo_Invoice':
          MkWe9EsDFmnYo_Invoice();
          break;
          case 'saleorder_Mk5eQOIRqBMO6_update':
                    saleorder_Mk5eQOIRqBMO6_update();
                    break;

                    case 'volunteer_details_a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3':
                    volunteer_details_a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3();
                    break;

        default:
          echo "Action not Found";
          break;
      }
    }else{
  ?>
<!--Action Request-->
         <div class="card mb-3">    
<div class="card-header">
<h3 class=" text-uppercase"><i class="fa fa-hand-pointer-o"></i>View Posts</h3>
</div>
<div class = "card-body">
    <div class="table-responsive"> 
       <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Action</th>
                                <th scope="col">App No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email Address</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Street Address</th>
                                <th scope="col">Sex</th>
                                <th scope="col">Program</th>
                            </tr>
                        </thead> <tbody style="font-size: 13px;">
                         <?php
                            $sql123 = "SELECT * FROM `volunteer`";
                            $result123 = $conn->query($sql123);
                            if ($result123->num_rows > 0) {
                                $i=0;
                                while($row123 = $result123->fetch_assoc()) {
                                   $no = $i +1;
                                   $id=$row123['id'];
                                   ?>
                                <tr>
                                <th scope="row"><?php echo $no; ?></th>
                                <td>
                                     <a href="?action=volunteer_details_a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3&id=<?php echo $id; ?>" data-toggle="tooltip" title="View Details" class="btn btn-sm btn-dark access_level tr_level" ><i class="fa  fa-eye"> </i></a>
                                 <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit_user_5"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a href="javascript:deleteRecord_5('5');" class="btn btn-danger btn-sm" data-placement="top"  data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                <script>
                                function deleteRecord_5(RecordId)
                                {
                                if (confirm('Confirm delete')) {
                                window.location.href = '#';
                                }
                                }
                                </script>
                                </td>
                                <td><?php echo $row123["idno"]; ?></td>
                                <td><?php echo $row123["fname"]." ".$row123["mname"]." ".$row123["lname"]; ?></td>
                                <td><?php echo $row123["email"]; ?></td>
                                <td><?php echo $row123["phone"]; ?></td>
                                <td><?php echo $row123["streetaddress"]; ?></td>
                                <td><?php echo $row123["sex"]; ?></td>
                                <td><?php echo $row123["streetaddress"]; ?></td>
                                </tr>       

                                <?php 
                                        $i++;
                                     }                         
                                 }else
                                {
                                    echo "<br> 0 records</br>";
                                }

                                ?>

                                 

                                </tbody>
                                </table>
<?php } ?>
                    </div>
                    </div></div>
    </div>

       </div>
               <!-- END container-fluid -->    
             
                        

            </div>
            <!-- END content -->

        </div>


<!-- ###################### View Details ####################### -->   
<?php 
function volunteer_details_a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3(){
  $id=$_REQUEST['id'];
  $year=date('Y');
  include 'config/connection.php';
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $sql_query = "SELECT *FROM `volunteer` WHERE id='$id' ";
  $fetch_query = $pdo->query($sql_query);
  $fetch_query->setFetchMode(PDO::FETCH_ASSOC);
   while ($rows = $fetch_query->fetch()):

  ?>
    <div class="card mb-3">    
<div class="card-header">
<h3 class=" text-uppercase"><i class="fa fa-hand-pointer-o"></i>View Posts</h3>
</div>
<div class = "card-body">
    <div class="table-responsive"> 
            <!-- /.box-header -->
            <div class="box-body" id="el">
              <div class="p-2">
                <div style="border: 6px double #777;" class="p-4">
                <table class="table p-0 m-0">
                  <tr>
                    <td rowspan="2" class="border-0"><div class="float-left pl-0 mr-2"><img width="100" src="../images/logo-icon.png"></div><h4 class="pt-0 pb-0 text-uppercase">Youth Skilling Organisation</h4>
                    Matugga Bombo-Rd, Wakiso. Uganda <br /><em>Tel: +256 784 858493 / +256 785 562536<br> Email Address: info@youthskillingorg.com  <br>Website: www.youthskillingorg.com  </div></td>
                    <td class="float-right border-0"><h3 class="text-uppercase">volunteer Details </h3><div class="float-left text-left"><b>Full Name</b> - <?php echo $rows['fname']." ".$rows['lname']; ?><br><b> Email</b>  - <?php echo $rows['email']; ?><br><b> Phone No.</b>  - <?php echo $rows['phone']; ?><br> <b>ID No</b> - <?php echo $rows['idno']; ?></div></td>
                  </tr>
                  <tr>
                    <td class="border-0"></td>
                  </tr>
                </table>
                <div style="border-bottom: 5px double #777;" class="mb-5 pt-0 mt-0 "></div>
  <table class="table">
    <tr>
<div class=" border-bottom"><h3 class="text-uppercase text-left p-0 m-0 border-bottom">Bio Data</h3></div>
  </tr>
  <tr>
    <td class="border-0">NAME <b> : </b><br><h5 class="p-0 m-0"><b><?php echo $rows['fname']." ".$rows['lname']; ?></b></h5></td>
    <td class="border-0">APP ID <b> : </b><br><h5 class="p-0 m-0"><b><?php echo $rows['idno']; ?></b></h5></td>
    <td class="border-0">PHONE NO <b> : </b><br><h5 class="p-0 m-0"><b><?php echo $rows['phone']; ?></b></h5></td>
  </tr>
  
  <tr>
    <td class="border-0">EMAIL ADDRESS <b> : </b><br><h5 class="p-0 m-0"><b><?php echo $rows['email']; ?></b></h5></td>
    <td class="border-0">Gender <b> : </b><br><h5 class="p-0 m-0"><b><?php echo $rows['sex']; ?></b></h5></td>
    <td class="border-0">Date of Birth <b> : </b><br><h5 class="p-0 m-0"><b><?php echo $rows['dob']; ?></b></h5></td>
  </tr>
  <tr>
    <td class="border-0">Country <b> : </b><br><h5 class="p-0 m-0"><b><?php echo $rows['country']; ?></b></h5></td>
    <td class="border-0">City <b> : </b><br><h5 class="p-0 m-0"><b><?php echo $rows['city']; ?></b></h5></td>
    <td class="border-0">Address <b> : </b><br><h5 class="p-0 m-0"><b><?php echo $rows['streetaddress']; ?></b></h5></td>
  </tr>
 </table>
 <table class="table">
  <tr>
    <b><div class=" border-bottom"><h3 class="text-uppercase text-left  p-0 m-0 border-bottom">volunteer Details</h3></div></b>
  </tr>
  <tr>
    <td class="border-0">Program  <b> : </b><br><h5 class="p-0 m-0"><b><?php echo $rows['program']; ?></b></h5></td>
    <td class="border-0">Starting Date <b> : </b><br><h5 class="p-0 m-0"><b><?php echo $rows['startingdate']; ?></b></h5> </td>
    <td class="border-0">Ending Date <b> : </b><br><h5 class="p-0 m-0"><b><?php echo $rows['ending_date']; ?></b></h5></td>
  </tr>
<tr>
    <td class="border-0">Major Skill  <b> : </b><br><h5 class="p-0 m-0"><b><?php echo $rows['highqualication']; ?></b></h5></td>
  </tr>
</table> 
<table class="table">
    <tr>
        <td class="border-0">Other Skills  <b> : </b><br><h5 class="p-0 m-0"><b><?php echo $rows['otherqualication']; ?></b></td>
    </tr>
    <tr>
        <td class="border-0">Benefits <b> : </b><br><h5 class="p-0 m-0"><b><?php echo $rows['benefits']; ?></b></td>
    </tr>
</table>  
              </div>
              </div>
              </div>
              </div>
              </div>
              </div>
  <?php endwhile;
   } ?>     
<!-- ###################### View Details ####################### -->        
        <?php include 'templates/footer.php'; ?>