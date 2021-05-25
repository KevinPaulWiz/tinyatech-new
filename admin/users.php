<?php include 'templates/header.php'; ?>

            
               
        <div class="card mb-3"> 
<div class="card-header">
<h3 class=" text-uppercase"><i class="fa fa-hand-pointer-o"></i>View Posts</h3>
</div>
<div class = "card-body"><div class="table-responsive">
        <table class="table table-bordered" style="text-align: center;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Date</th>
                                <th scope="col">Reset Code</th>
                                <th scope="col">Updated Date</th>
                                <th scope="col">Submitter</th>
                            </tr>
                        </thead> <tbody style="font-size: 13px;">
                         <?php
                            $sql1234 = "SELECT * FROM `users`";
                            $result1234 = $conn->query($sql1234);
                            if ($result1234->num_rows > 0) {
                                $i=0;
                                while($row1234 = $result1234->fetch_assoc()) {
                                   $no = $i +1;

                                                        ?>

                                                            <tr>
                                                            <th scope="row"><?php echo $no; ?></th>
                                                            <td><?php echo $row1234["fullname"]; ?></td>
                                                            <td><?php echo $row1234["UserName"]; ?></td>
                                                            <td><?php echo $row1234["Email"]; ?></td>
                                                            <td><?php echo $row1234["Role"]; ?></td>
                                                            <td><?php echo $row1234["Date"]; ?></td>
                                                            <td><?php echo $row1234["resetcode"]; ?></td>
                                                            <td><?php echo $row1234["updateddate"]; ?></td>
                                                            <td><?php echo $row1234["submittedby"]; ?></td>
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
                    </div></div></table></div>
    </div>

       </div>
               <!-- END container-fluid -->    
             
                        

            </div>
            <!-- END content -->

        </div>
        <?php include 'templates/footer.php'; ?>