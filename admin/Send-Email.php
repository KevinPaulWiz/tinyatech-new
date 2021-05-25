<?php include 'templates/header.php'; ?>

			<div class="row">
			
                    <div class="col-xs-12 col-sm-12 ">						
<div class="col-xs-12 col-sm-12 ">  
   <?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (isset($_POST['sendmail'])) {
      session_start();
      $submittedby=$_SESSION['id'];
      $mailto=$_POST['mailto'];
      $subject=$_POST['subject'];
      $content=$_POST['content'];
      // Retrieving each selected option 
        foreach ($_POST['mailto'] as $selectedmails) {
        // /*-------Sennd email to the sender-------*/

$to = "$selectedmails";
$subject = "$subject";
$htmlContent = "

    <html>

    <head>
        <title>$subject </title>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
        <style type='text/css'>
  div.body {

    text-align: left;
    padding: 0;
    font-family: Google Sans,Roboto,Helvetica,Arial,sans-serif;
    font-size: 15px;
    line-height: 1.5em;
    color: #444444;
    padding: 25px 30px 35px 30px;
    background-color: #ddd;
}
</style>
    </head>

    <body > 
    <table align='center'>
    <div align='center'>
     <div align='center' class='body' style='background: #ddd; '>
   <div align='right'  style='background: #fff;  width:600px;'>
     <div  style='background: #fff; padding: 25px 30px 35px 30px;' >
       <a href='https://www.facebook.com/skillingug/'><img width='30' src='http://youthskillingorg.com/images/fb.png'></a>
       <a href='https://twitter.com/youthskillingug?ref_src=twsrc%5Etfw'><img width='30' src='http://youthskillingorg.com/images/tw.png'></a>
       <a href='http://youthskillingorg.com'><img width='30' src='http://youthskillingorg.com/images/ist.png'></a>
     </div>
     <div>
     <a href=''><img  src='http://youthskillingorg.com/images/banner.png'></a>
   </div>
   <div align='left'  style='background: #fff; padding: 25px 30px 35px 30px;'>
    $content
<p>
Regards,
</p>
<p>
Youth Skilling Organization Uganda.</p>
   </div>
   </div>
   <div style='margin-top:20px; background: #fff;   width:600px;' >
   <div style='padding: 25px 30px 35px 30px;' align='center'>
   <h3>Follow Us!</h3> 
   <a href='https://www.facebook.com/skillingug/'><img width='30' src='http://youthskillingorg.com/images/fb.png'></a>
       <a href='https://twitter.com/youthskillingug?ref_src=twsrc%5Etfw'><img width='30' src='http://youthskillingorg.com/images/tw.png'></a>
       <a href=''><img width='30' src='http://youthskillingorg.com/images/ist.png'></a>
 </div>
   <div align='center'  style='padding: 25px 30px 35px 30px;' >
   <p>
   © Youth Skilling Organization Uganda. All Rights Reserved. Matugga Bombo-Rd, Wakiso. Uganda.
 </p>
 <p>
Use of this web site constitutes acceptance of the Youth Skilling Organization Uganda <a href=''>Terms</a> of Use and <a href=''>Privacy Policy</a>.
</p>
 </div>
 </div>
 </div>
 </div>
 </table>
    </body>

    </html>";



// Set content-type header for sending HTML email

$headers = "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";



// Additional headers

$headers .= 'From: Youth Skilling Organization Uganda<info@youthskillingorg.com>' . "\r\n";

$headers .= 'Cc: info@youthskillingorg.com' . "\r\n";

$headers .= 'Bcc: info@youthskillingorg.com' . "\r\n";



// Send email

if(mail($to,$subject,$htmlContent,$headers)):

    echo "<script type=\"text/javascript\">
              alert(\"Email sent successfully.\");
              window.location = \"Send-Email\"
            </script>";

else:

    $Error = 'Email sending fail.';

endif;

/*-------Sennd email to the sender-------*/

            // print "You selected $selectedmails<br/>"; 
            } 

  }
}
?>    
<?php echo "$Error"; ?>
						<div class="card mb-3">
							<div class="card-header">
								<h3 class="text-uppercase"><i class="fa fa-envelope-o"></i> <?php echo $title; ?> FORM</h3>
							</div>

          <div class="card-body">

          <form method="post" action="<?php echo htmlspecialchars($_SERVER[""]);?>" id="demo-form" data-parsley-validate  enctype="multipart/form-data">
        
<div class=" row col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
         <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <label for="fullname">Mail to: <span class="text-danger">*</span></label>
          <select name="mailto[]"  class="form-control select2 p-2" multiple style="width: 100%;">
                  <option  value="">Select</option>
                  <option  value="All">All</option>
                  <?php 
                      include 'config/connection.php';
                      $sql = "SELECT *FROM `newsletter` ORDER BY id DESC";
                      $result = $conn->query($sql);
                      ?>
                       <?php while ($rows = $result->fetch_assoc()) {?>
                           <option value="<?php echo htmlspecialchars($rows['email']) ?>">
                            <?php echo htmlspecialchars($rows['email']) ?></option>                        
                      <?php }?>
                </select>
          </div>   
          <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <label for="fullname">Subject <span class="text-danger">*</span> </label>
          <input type="text"  name="subject" class="form-control" placeholder="Enter Subject">
        </div>

          
          <!-- <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <label for="fullname">Image <span class="text-danger">*</span> </label>
          <input type="file"  name="file_img" class="form-control pt-0 pl-0 border-0" placeholder="Enter Post Title">
        </div> -->
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">  <label for="fullname">Content <span class="text-danger">*</span></label>         
          <textarea rows="3"  placeholder="Type Here..." class="form-control editor" name="content"></textarea>             </div>

          <div class="form-group text-right m-b-0 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <button class="btn btn-primary" name="sendmail" type="submit">
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
