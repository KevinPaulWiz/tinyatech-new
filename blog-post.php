 <?php include 'main/header.php'; ?>
 <?php 
if (isset($_REQUEST['details'])) {
include 'admin/config/connection.php';
$detailsId = $_REQUEST['details'];
$count = $conn->query("SELECT id FROM `post`  where id = '$detailsId'")->num_rows;
if ($count < 1) {
echo "<script>window.location='blog';</script>";
}else{
   if ($stmt = $conn->query("SELECT * FROM `post`  where id = '$detailsId'")) {
    $row = $stmt->fetch_assoc(); 
}else{
echo "<script>window.location='blog';</script>";
  }
}
    
}else{

echo "<script>window.location='blog';</script>";
}
?>
  <!-- Breadcrumbs -->
  <section class="breadcrumbs-custom-inset">
    <div class="breadcrumbs-custom context-dark">
      <div class="container">
        <h2 class="breadcrumbs-custom-title">Blog post</h2>
        <ul class="breadcrumbs-custom-path">
          <li><a href="index">Home</a></li>
          <li class="active">Blog post</li>
        </ul>
      </div>
      <div class="box-position" style="background-image: url(images/bg-breadcrumbs.jpg);"></div>
    </div>
  </section>
  
  <!-- Blog Post-->
  <section class="section section-sm bg-default text-left">
    <div class="container">
      <div class="row row-70">
        <div class="col-lg-8">
          <div class="blog-post"> 
            <!-- Post Classic-->
            <article class="post post-classic">
              <h4 class="post-classic-title"><?php echo $row['newstitle']; ?> </h4>
              <div class="post-classic-panel group-middle justify-content-start"><a class="badge badge-secondary" href="#"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16px" height="27px" viewbox="0 0 16 27" enable-background="new 0 0 16 27" xml:space="preserve">
                <path d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z"></path>
                </svg>
                <div><?php echo $row['category']; ?></div>
                </a>
                <div class="post-classic-comments"><span class="icon fa fa-comments-o"></span><a href="#">3</a></div>
                <div class="post-classic-time"><span class="icon fa fa-clock-o"></span>
                  <time datetime="2020-11-30"><?php echo date("d M, Y", strtotime($row['date'])); ?></time>
                </div>
                <div class="post-classic-author">by<a href="#">Admin</a></div>
              </div>
              <div class="post-classic-figure"><img src="admin/<?php echo $row['img_path']; ?>" alt="" width="770" height="430"/> </div>
            </article>
            <!-- Quote Classic-->
            <p><?php echo $row['content']; ?></p>
            <div class="blog-post-bottom-panel group-md group-justify">
              <div class="blog-post-tags"><a href="#">News</a><a href="#">Flooring</a><a href="#">Tips</a></div>
              <div>
                <div class="group-md group-middle"><span class="social-title">Share</span>
                  <div>
                    <ul class="list-inline list-inline-sm social-list">
                      <li><a class="icon fa fa-facebook" href="#"></a></li>
                      <li><a class="icon fa fa-twitter" href="#"></a></li>
                      <li><a class="icon fa fa-google-plus" href="#"></a></li>
                      <li><a class="icon fa fa-instagram" href="#"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="blog-post-comments">
            <h5 class="text-spacing-100 font-weight-normal">Add Your Comment</h5>
            <form class="finarc-form finarc-mailform">
              <div class="row row-14 gutters-14">
                <div class="col-sm-6">
                  <div class="form-wrap">
                    <input class="form-input" id="contact-your-name-5" type="text" name="name" data-constraints="@Required"/>
                    <label class="form-label" for="contact-your-name-5">Your Name</label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-wrap">
                    <input class="form-input" id="contact-email-5" type="email" name="email" data-constraints="@Email @Required"/>
                    <label class="form-label" for="contact-email-5">Your E-mail</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-wrap">
                    <label class="form-label" for="contact-message-5">Message</label>
                    <textarea class="form-input textarea-lg" id="contact-message-5" name="message" data-constraints="@Required"></textarea>
                  </div>
                </div>
              </div>
              <button class="button button-secondary button-pipaluk" type="submit">Submit</button>
            </form>
          </div>
        </div>
        <div class="col-lg-4"> 
          <!-- Post Sidebar-->
          <div class="post-sidebar post-sidebar-inset">
            <div class="row row-lg row-60">
              <div class="col-sm-6 col-lg-12">
                <div class="post-sidebar-item"> 
                  <!-- RD Search Form-->
                  <form class="finarc-search form-search form-post-search" action="http://malikhassan.com/blog_designer/finarc/html/search-results.html" method="GET">
                    <div class="form-wrap">
                      <label class="form-label" for="search-form">Search the blog...</label>
                      <input class="form-input" id="search-form" type="text" name="s" autocomplete="off">
                      <button class="button-search fl-bigmug-line-search74" type="submit"></button>
                    </div>
                  </form>
                </div>
                <div class="post-sidebar-item">
                  <h5>Categories</h5>
                  <div class="post-sidebar-item-inset">
                    <ul class="list list-categories">
                      <li><a class="active" href="#">All Categories</a></li>
                      <li><a href="#">Flooring</a></li>
                      <li><a href="#">Tips</a></li>
                      <li><a href="#">Trends</a></li>
                      <li><a href="#">News</a></li>
                    </ul>
                  </div>
                </div>
                <div class="post-sidebar-item">
                  <h5>Popular posts</h5>
                  <div class="post-sidebar-item-inset"> 
                    <!-- Post Minimal-->
                    <article class="post post-minimal"><a class="post-minimal-figure" href="blog-post.html"><img src="images/products/products-img-15.jpg" alt="" width="232" height="138"/></a>
                      <p class="post-minimal-title"><a href="blog-post.html">Best Laminate &amp; Hardwood Flooring Trends</a></p>
                    </article>
                    <!-- Post Minimal-->
                    <article class="post post-minimal"><a class="post-minimal-figure" href="blog-post.html"><img src="images/products/products-img-13.jpg" alt="" width="232" height="138"/></a>
                      <p class="post-minimal-title"><a href="blog-post.html">10 Floors for Every Budget</a></p>
                    </article>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-12">
                <div class="post-sidebar-item">
                  <h5>Comments</h5>
                  <div class="post-sidebar-item-inset"> 
                    <!-- Quote Minimal-->
                    <article class="quote-minimal">
                      <div class="quote-minimal-text">
                        <p class="q">Glos barbatus accola est. Bi-color, clemens particulas.</p>
                      </div>
                      <h6 class="quote-minimal-cite">Jessica Brown on<span class="quote-minimal-source"><a href="#">How to Pick floors</a></span></h6>
                    </article>
                    <!-- Quote Minimal-->
                    <article class="quote-minimal">
                      <div class="quote-minimal-text">
                        <p class="q">Mirabilis, teres elogiums solite resuscitabo de superbus!</p>
                      </div>
                      <h6 class="quote-minimal-cite">Adam Williams on<span class="quote-minimal-source"><a href="#">Best laminate flooring trends</a></span></h6>
                    </article>
                  </div>
                </div>
                <div class="post-sidebar-item">
                  <h5>Popular tags</h5>
                  <div class="post-sidebar-item-inset">
                    <div class="group-xs group-middle justify-content-start"><a class="badge badge-white" href="#"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16px" height="27px" viewbox="0 0 16 27" enable-background="new 0 0 16 27" xml:space="preserve">
                      <path d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z"></path>
                      </svg>
                      <div>Flooring</div>
                      </a><a class="badge badge-white" href="#"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16px" height="27px" viewbox="0 0 16 27" enable-background="new 0 0 16 27" xml:space="preserve">
                      <path d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z"></path>
                      </svg>
                      <div>Tips</div>
                      </a><a class="badge badge-white" href="#"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16px" height="27px" viewbox="0 0 16 27" enable-background="new 0 0 16 27" xml:space="preserve">
                      <path d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z"></path>
                      </svg>
                      <div>Stone</div>
                      </a><a class="badge badge-white" href="#"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16px" height="27px" viewbox="0 0 16 27" enable-background="new 0 0 16 27" xml:space="preserve">
                      <path d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z"></path>
                      </svg>
                      <div>Trends</div>
                      </a><a class="badge badge-white" href="#"> <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="16px" height="27px" viewbox="0 0 16 27" enable-background="new 0 0 16 27" xml:space="preserve">
                      <path d="M0,0v6c4.142,0,7.5,3.358,7.5,7.5S4.142,21,0,21v6h16V0H0z"></path>
                      </svg>
                      <div>News</div>
                      </a> </div>
                  </div>
                </div>
                <div class="post-sidebar-item">
                  <h5>Newsletter</h5>
                  <div class="post-sidebar-item-inset"> 
                    <!-- RD Mailform-->
                    <form class="finarc-form finarc-mailform" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="#">
                      <div class="form-wrap">
                        <input class="form-input" id="subscribe-form-4-email" type="email" name="email" data-constraints="@Email @Required">
                        <label class="form-label" for="subscribe-form-4-email">Enter Your E-mail</label>
                      </div>
                      <div class="form-button">
                        <button class="button button-block button-primary button-pipaluk" type="submit">Subscribe</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Footer section start -->
 <?php include 'main/footer.php'; ?>