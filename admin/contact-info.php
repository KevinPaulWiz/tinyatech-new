<?php include 'templates/header.php'; ?>


            
               
    <div class="card mb-3">    
<div class="card-header">
<h3 class=" text-uppercase"><i class="fa fa-hand-pointer-o"></i>View Posts</h3>
</div>
<div class = "card-body"><div class="table-responsive">
       <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Action</th>
                                <th scope="col">Date</th>
                                <th scope="col">Category</th>
                                <th scope="col">Title</th>
                                <!-- <th scope="col">Image Type</th> -->
                                <th scope="col">Views</th>
                            </tr>
                        </thead> <tbody style="font-size: 13px;">
                        <?php
                        $result123 = $conn->query("SELECT * FROM `post`");
                        $i=0;
                        while($row123 = $result123->fetch_assoc()) {
                        $no = $i +1;

                        ?>

                        <tr>
                        <th scope="row"><?php echo $no; ?></th>
                        <td> <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit_user_5"><i class="fa fa-pencil" aria-hidden="true"></i></a>
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
                        <td><?php echo $row123["date"]; ?></td>
                        <td><?php echo $row123["category"]; ?></td>
                        <td><a href=""><?php echo $row123["newstitle"]; ?></a></td>
                        <td><?php echo $row123["views"]; ?></td>

                        </tr>       

                                                        <?php 

                                                $i++;
                                             }
                                                        

                ?>
                                        
                                         
                            
                        </tbody>
                    </div>
                    </div></div></table>
    </div>

       </div>
               <!-- END container-fluid -->    
             
                        

            </div>
            <!-- END content -->

        </div>
        <?php include 'templates/footer.php'; ?>