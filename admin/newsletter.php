<?php include 'templates/header.php'; ?>

            
               
        <div class="card mb-3">
<div class="card-header">
<h3 class=" text-uppercase"><i class="fa fa-hand-pointer-o"></i>View News Letters</h3>
</div>
<div class = "card-body"><div class="table-responsive">
       <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Email</th>
                                <th scope="col">City</th>
                                <th scope="col">Date</th>
                                <th scope="col">Country</th>
                                <th scope="col">State</th>
                                
                                <!-- <th scope="col">Co-ordinates</th> -->
                                <th scope="col">Action</th>
                            </tr>
                        </thead> <tbody style="font-size: 13px;">
                         <?php
                            $sql11 = "SELECT * FROM `newsletter` where deleted != -1";
                            $result11 = $conn->query($sql11);
                            if ($result11->num_rows > 0) {
                                $i=0;
                                while($row11 = $result11->fetch_assoc()) {
                                   $no = $i +1;
                                                                    ?>
                                                                      <tr><th>
                                                                    <?php echo $no; ?>
                                                                    </th><td>
                                                                   <?php  echo $row11["email"]; ?>
                                                                    </td><td>
                                                                    <?php echo $row11["city"]; ?>
                                                                    </td><td>
                                                                   <?php  echo $row11["datetime"]; ?>
                                                                    </td><td>
                                                                    <?php echo $row11["country"]; ?>
                                                                    </td><td>
                                                                   <?php  echo $row11["state"]; ?>
                                                                   <!-- </td><td>
                                                                    <?php //echo $row11["coordinates"]; ?> -->
                                                                    </td><td>
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
                                                                    </td></tr>
                                                                    <?php 
                                                                    $i++;
                                         }
                            
                }else
                {
                    echo "<br> 0 records</br>";
                }
                                                                     ?>
                                                                    
                                        
                                         
                                    
                                                 </tbody>
                    </div></div>
    </div></table></div>

       </div>
               <!-- END container-fluid -->    
             
                        

            </div>
            <!-- END content -->

        </div>
        <?php include 'templates/footer.php'; ?>