

                <?php include 'templates/header.php'; ?>



            
               
 <div class="card mb-3">       
<div class="card-header">
<h3 class=" text-uppercase"><i class="fa fa-hand-pointer-o"></i>View Categories</h3>
</div>
<div class = "card-body"><div class="table-responsive">
       <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Categories</th>
                                <th scope="col">Upload Date</th>
                                <th scope="col">Categories ID</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead> <tbody>
                         <?php
                            $sql = "SELECT * FROM `category`";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                $i=0;
                                while($row = $result->fetch_assoc()) {
                                   $no = $i +1;
                               ?>
                                                                    <tr>
                                                                        <th>
                                                                        <?php echo $no; ?>
                                                                    
                                                                    </th><td>
                                                                        <?php echo $row["category_name"]; ?>
                                                                    
                                                                    </td><td>
                                                                        <?php echo $row["submitteddate"]; ?>
                                                                    
                                                                    </td><td>
                                                                        <?php echo $row["category_id"]; ?>
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