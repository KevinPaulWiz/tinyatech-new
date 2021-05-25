  <?php include 'main/header.php'; ?>
  <!-- Breadcrumbs -->
  <section class="breadcrumbs-custom-inset">
    <div class="breadcrumbs-custom context-dark">
      <div class="container">
        <h2 class="breadcrumbs-custom-title">blog</h2>
        <ul class="breadcrumbs-custom-path">
          <li><a href="#">Home</a></li>
          <li class="active">blog</li>
        </ul>
      </div>
      <div class="box-position" style="background-image: url(images/bg-breadcrumbs.jpg);"></div>
    </div>
  </section>
  
  <!-- Grid blog-->
  <section class="section section-sm bg-default text-md-left">
    <div class="container">
      <div class="row row-30">
      <?php 
include 'admin/config/connection.php';
$i=1;
$result = $conn->query("SELECT * FROM `post` ORDER BY `post`.`id` DESC LIMIT 6 ");
while($row = $result->fetch_assoc()) {
$no=$i++;
?>
        <div class="col-sm-6 col-lg-4"> 
<!-- Post Modern-->
<article class="post post-modern"><a class="post-modern-figure" href="blog-post?details=<?php echo $row['id']; ?>"><img src="admin/<?php echo $row['img_path']; ?>" alt="" width="370" height="307"/>
  <div class="post-modern-time">
    <time datetime="2018-07-17"><span class="post-modern-time-number"><?php echo date("d", strtotime($row['date'])); ?></span><span class="post-modern-time-month"><?php echo date("M", strtotime($row['date'])); ?></span></time>
  </div>
  </a>
  <h5 class="post-modern-title"><a href="blog-post?details=<?php echo $row['id']; ?>"><?php echo $row['newstitle']; ?></a></h5>
  <div id="<?php echo $no; ?>">
  <p class="post-modern-text" ><?php echo $row['content']; ?></p>
  </div>
</article>
</div>
      <?php } ?>
      </div>
      <div class="pagination-wrap"> 
        <!-- Bootstrap Pagination-->
       <!--  <nav aria-label="Page navigation">
          <ul class="pagination">
            <li class="page-item page-item-control disabled"><a class="page-link" href="#" aria-label="Previous"><span class="icon" aria-hidden="true"></span></a></li>
            <li class="page-item active"><span class="page-link">1</span></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item page-item-control"><a class="page-link" href="#" aria-label="Next"><span class="icon" aria-hidden="true"></span></a></li>
          </ul>
        </nav> -->
      </div>
    </div>
  </section>
  
  <!-- Footer section start -->
  <?php include 'main/footer.php'; ?>

  <!-- Insertion Newsletter -->
<script type="text/javascript">
$(document).ready(function() {


$(function(){
$("#1").each(function () {
len=$(this).text().length;
str= $(this).text().substr(0,175);
lastIndexOf = str.lastIndexOf(" "); 
if(len>175) {
$(this).text(str.substr(0, lastIndexOf) + '…');
}
});
});

$(function(){
$("#2").each(function () {
len=$(this).text().length;
str= $(this).text().substr(0,175);
lastIndexOf = str.lastIndexOf(" "); 
if(len>175) {
$(this).text(str.substr(0, lastIndexOf) + '…');
}
});
});

$(function(){
$("#3").each(function () {
len=$(this).text().length;
str= $(this).text().substr(0,175);
lastIndexOf = str.lastIndexOf(" "); 
if(len>175) {
$(this).text(str.substr(0, lastIndexOf) + '…');
}
});
});

$(function(){
$("#4").each(function () {
len=$(this).text().length;
str= $(this).text().substr(0,175);
lastIndexOf = str.lastIndexOf(" "); 
if(len>175) {
$(this).text(str.substr(0, lastIndexOf) + '…');
}
});
});

$(function(){
$("#5").each(function () {
len=$(this).text().length;
str= $(this).text().substr(0,175);
lastIndexOf = str.lastIndexOf(" "); 
if(len>175) {
$(this).text(str.substr(0, lastIndexOf) + '…');
}
});
});

$(function(){
$("#6").each(function () {
len=$(this).text().length;
str= $(this).text().substr(0,175);
lastIndexOf = str.lastIndexOf(" "); 
if(len>175) {
$(this).text(str.substr(0, lastIndexOf) + '…');
}
});
});

});
</script>