<?php include 'templates/header.php'; ?>

			<div class="row">
			
                    <div class="col-xs-12 col-sm-12 ">						
<div class="col-xs-12 col-sm-12 ">  
  
<?php echo "$Error"; ?>
						<div class="card mb-3">
							<div class="card-header">
								<h3><i class="fa fa-hand-pointer-o"></i> POST FORM</h3>
							</div>

          <div class="card-body">

           <form method="post" action="<?php echo htmlspecialchars($_SERVER[""]);?>" id="demo-form" data-parsley-validate  enctype="multipart/form-data">
             
          <div class=" row col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
             <div class="form-group col-sm-6">
                 <label>Date</label>
               <input type="date"  required="" name="date" class="form-control" placeholder="Enter Ending Time">
              </div>
            <div class="form-group col-sm-3">
                <label>Starting time</label>
                <input type="time"  name="start_time" class="form-control" placeholder="Enter Starting Date">
              </div>
              <div class="form-group col-sm-3">
                 <label>Ending time</label>
               <input type="time"  name="end_time" class="form-control" placeholder="Enter Ending Time">
              </div>
              <div class="form-group col-sm-12 pr-0">
                <label>Place</label>
                 <input type="text"   name="place" class="form-control" placeholder="Enter Place">
              </div> 
          </div>


          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <label for="fullname">Title <span class="text-danger">*</span> </label>
          <input type="text" required="" name="title" class="form-control" placeholder="Enter Post Title">
        </div>

          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <label for="fullname">Category <span class="text-danger">*</span></label>
          <select name="category" class="form-control " style="width: 100%;">
                  <option selected="selected" value="No category Selected">Select category</option>
                  <option value="News">News</option>
                  <option value="Event">Event</option>
                  <option value="Blog">Blog</option>
                </select>
          </div>
          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <label for="fullname">Image <span class="text-danger">*</span> </label>
          <input type="file" required="" name="file_img" class="form-control pt-0 pl-0 border-0" placeholder="Enter Post Title">
        </div>
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">  <label for="fullname">Content <span class="text-danger">*</span></label>         
          <textarea rows="3" required="" placeholder="Type Here..." class="form-control editor" name="content"></textarea>                                    
          </div>

          <div class="form-group text-right m-b-0 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <button class="btn btn-primary" name="submit_post" type="submit">
              Submit
          </button>
          <button type="reset" class="btn btn-secondary m-l-5">
              Cancel
          </button>
          </div>

          </form>

          </div>														
          </div><!-- end card-->					
          </div>

								
<?php include 'templates/footer.php'; ?>