<?php
	   include 'config/connection.php';
	if(isset($_POST['fetch'])){
	?>
 <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th scope="col"  width="200">Image</th>
                                <th scope="col">Image link</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead> 
<?php
$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$sql_query = "SELECT * from photo WHERE deleted !='-1' ORDER BY id DESC";
$fetch_query = $pdo->query($sql_query);
$fetch_query->setFetchMode(PDO::FETCH_ASSOC);
$i=0;
$no = $i +1;
while ($rows = $fetch_query->fetch()): 
?>
                        <tbody>


                        	<tr>
                        		<td width="200"><div class="col-lg-12"><img style="width: 200px;" class="img-responsive img-fluid" src="<?php echo $rows['location']?>" ></div> </td>
                        		<td>rk-admin/<?php echo $rows['location']?></td>
                        		<td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_edit_user_5"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <a href="javascript:deleteRecord_5('5');" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                        	</tr>



</tbody><?php
endwhile;
?>
                    </table>

<?php
	}

?>
