<?php include 'templates/header.php'; ?>
							<div class="row">
									<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
											<div class="card-box noradius noborder bg-default">
													<i class="fa fa-users float-right text-white"></i>
													<h6 class="text-white text-uppercase m-b-20">Users</h6>
													<h1 class="m-b-20 text-white counter"><?php echo number_format($conn->query("SELECT * from users")->num_rows); ?></h1>
													<span class="text-white">0 New posts</span>
											</div>
									</div>
									
									<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
											<div class="card-box noradius noborder bg-warning">
													<i class="fa fa-envelope-o float-right text-white"></i>
													<h6 class="text-white text-uppercase m-b-20">News Letters</h6>
													<h1 class="m-b-20 text-white counter"><?php echo number_format($conn->query("SELECT * from newsletter")->num_rows); ?>></h1>
													<span class="text-white">0 New</span>
											</div>
									</div>
									
									<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
											<div class="card-box noradius noborder bg-info">
													<i class="fa fa-file-text-o float-right text-white"></i>
													<h6 class="text-white text-uppercase m-b-20">Posts</h6>
													<h1 class="m-b-20 text-white counter"><?php echo number_format($conn->query("SELECT * from posts")->num_rows); ?></h1>
													<span class="text-white">0 New Users</span>
											</div>
									</div>
									
									<div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
											<div class="card-box noradius noborder bg-danger">
													<i class="fa fa-comment-o float-right text-white"></i>
													<h6 class="text-white text-uppercase m-b-20">Events</h6>
													<h1 class="m-b-20 text-white counter"><?php echo number_format($conn->query("SELECT * from events")->num_rows); ?></h1>
													<span class="text-white">0 New Events</span>
											</div>
									</div>
							</div>
							<!-- end row -->


							
							<!-- <div class="row">
							
									<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 ">						
										<div class="card mb-3">
											<div class="card-header">
												<h3><i class="fa fa-line-chart"></i> Items Sold Amount</h3>
											</div>
												
											<div class="card-body">
												<canvas id="lineChart"></canvas>
											</div>							
											<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
										</div>					
									</div>

									<div class="col-xs-6 col-sm-6 ">						
										<div class="card mb-3">
											<div class="card-header">
												<h3><i class="fa fa-bar-chart-o"></i> Colour Analytics</h3>
												
											</div>
												
											<div class="card-body" >
												<canvas style="height: 200px;" id="pieChart"></canvas>
											</div>
											<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
										</div>				
									</div>
									
							</div> -->
							<!-- end row -->
							
							
						

            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->
                                
<?php include 'templates/footer.php'; ?>