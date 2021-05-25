<?php include 'templates/header.php'; ?>


			
			
						<div class="row">
									
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">						
			<!-- User Insertion -->
 <?php 
session_start();
    include 'config/connection.php'; 
             ?>
          <?php 
          // include 'config/connection.php';
          if(isset($_POST['submit_user'])){
            // echo "connected";
            // variables
            $year=date("Y");
            $date=date("D dS M,Y ");
            $fullname=$_POST['name'];
            // $lastname=$_POST['lastname'];
            $UserName=$_POST['UserName'];
            $role=$_POST['role'];
            $Email=$_POST['email'];
              $cal_date=date("Y-m-d"); 
            $user_pass=$_POST['password'];
            $submittedby=$_SESSION['email'];
           $pswdcrypt='^%#?&*';
           $pswrd = $pswdcrypt.$user_pass.$pswdcrypt;
           $pswrd1=md5($pswrd);
           $pswrd2 = sha1($pswrd1);
           $pswrd3= crypt($pswrd2,TS);
          // echo "$Date";
 // echo "$date";
include 'config/connection.php'; 
$sql = "SELECT * FROM `users` WHERE Email='$Email' WHERE deleted!='-1'";
    $results = $conn->query($sql);
    // output data of each row
   if ($results->num_rows < 1) {


            $sql = "INSERT INTO `users`(`Date`, `fullname`, `UserName`, `Email`,`Role`, `Password`,submittedby) VALUES ('$date','$fullname','$UserName','$Email','$role','$pswrd3','$submittedby')";

            if ($conn->query($sql) === TRUE) {



               $Error= "<div align='center' class='alert alert-success alert-dismissible fade in text-center' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>New record created successfully <i class='fa fa-check'></i></strong>
                  </div>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }else{
          $Error= "<div align='center' class='alert alert-danger alert-dismissible fade in text-center' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                    </button>
                    <strong>The Email Address Entered Already Exists <i class='fa fa-check'></i></strong>
                  </div>";
          }
        }
?>			
				
								<div class="card mb-3">
								
									<div class="card-header">
									<span class="pull-right"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_add_user"><i class="fa fa-user-plus" aria-hidden="true"></i> Add new user</button></span>
									<div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-labelledby="modal_add_user" aria-hidden="true" id="modal_add_user">
							<div class="modal-dialog">
								<div class="modal-content">
									
									<form action="#" method="post" enctype="multipart/form-data">

													
									<div class="modal-header">
									<h5 class="modal-title">Add new user</h5>
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>          	
									</div>
										
									<div class="modal-body">                
														
										<div class="row">
											<div class="col-lg-12">
											<div class="form-group">
											<label>Full name (required)</label>
											<input class="form-control" placeholder="surname othername" name="name" type="text" required />
											</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-lg-6">
											<div class="form-group">
											<label>Valid Email (required)</label>
											<input class="form-control" name="email" type="email" required />
											</div>
											</div>  
											
											
                                            <div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Username (optional)</label>
                                            <input class="form-control" name="UserName" type="text" />
                                            </div>
                                            </div>  
										</div>
										
										<div class="row">
										
											<div class="col-lg-6">
											<div class="form-group">
											<label>Role</label>
											<select name="role" class="form-control" required>
											<option value="">- select -</option>
											<optgroup label="Staff member">
																	<option value="Administrator">Administrator</option>
																		<option value="Manager">Manager</option>
																		<!-- <option value="3">Author</option> -->
																	</optgroup>
											
											<optgroup label="Registered member">
																	<option value="User">User</option>
																	</optgroup>
											</select>
											</div>
											</div>					               
										<div class="col-lg-6">
                                            <div class="form-group">
                                            <label>Password (required)</label>
                                            <input class="form-control" name="password" type="password" required />
                                            </div>
                                            </div> 
											 				
										</div>
										
										
										<div class="form-group">
										<label>Avatar image (optional):</label> <br />
										<input type="file" name="image">
										</div>
										
									</div>             
									
									<div class="modal-footer">
										<button type="submit" name="submit_user" class="btn btn-primary">Add user</button>
									</div>
										
									</form>	
									
								</div>
							</div>
						</div> 
									<h3><i class="fa fa-user"></i> All users (<?php echo "$count2"; ?>)</h3>								
									</div>
									<!-- end card-header -->	
												
									<div class="card-body">
														
														
                            <div class="table-responsive">
                           <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                            <th style="width:50px">ID</th>
                            <th>User details</th>
                            <th style="width:130px">Submitted By</th>
                            <th style="width:150px">Submitted date</th>
                            <th style="width:120px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
<?php     $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                                    $sql_query = "SELECT *FROM `users` WHERE deleted !='-1' ORDER BY `users`.`id` ASC";
                                    $fetch_query = $pdo->query($sql_query);
                                    $fetch_query->setFetchMode(PDO::FETCH_ASSOC);
                                    while ($rows = $fetch_query->fetch()): 
                                    ?>
                            <tr >
                            <th>
                               <?php echo $rows['id']; ?>
                            </th>

                            <td>
                            <span style="float: left; margin-right:10px;"><img alt="image" style="max-width:40px; height:auto;" src="assets/images/avatars/avatar1.png" /></span>
                            <strong><?php echo $rows['fullname']; ?></strong>							<br />
                            <small><?php echo $rows['Email']; ?></small>
                            </td>

                            <td><?php echo $rows['submittedby']; ?></td>


                            <td><?php echo $rows['Date']; ?></td>

                            <td>
                            <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit_user_5"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="javascript:deleteRecord_5('5');" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            <script>
                            function deleteRecord_5(RecordId)
                            {
                            if (confirm('Confirm delete')) {
                            window.location.href = '#';
                            }
                            }
                            </script>
                            </td>
                            </tr>
                        <?php endwhile;?>
                            </tbody>
                            </table>
                            </div>	
																			
														
									</div>	
									<!-- end card-body -->								
										
								</div>
								<!-- end card -->					

							</div>
							<!-- end col -->	
																
						</div>
						<!-- end row -->	

            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->
<?php include 'templates/footer.php'; ?>