  <?php include 'main/header.php'; ?>
  <!-- Breadcrumbs -->
  <section class="breadcrumbs-custom-inset">
    <div class="breadcrumbs-custom context-dark">
      <div class="container">
        <h2 class="breadcrumbs-custom-title"> gallery</h2>
        <ul class="breadcrumbs-custom-path">
          <li><a href="index">Home</a></li>
          <!-- <li><a href="#">Pages</a></li> -->
          <li class="active"> gallery</li>
        </ul>
      </div>
      <div class="box-position" style="background-image: url(images/bg-breadcrumbs.jpg);"></div>
    </div>
  </section>
  <section class="section section-sm bg-default text-center isotope-wrap">
    <div class="container">
      <div class="isotope-filters isotope-filters-horizontal">
        <button class="isotope-filters-toggle button button-md button-icon button-icon-right button-default-outline button-wapasha" data-custom-toggle="#isotope-8" data-custom-toggle-hide-on-blur="true"><span class="icon fa fa-caret-down"></span>Filter</button>
        <ul class="isotope-filters-list" id="isotope-8">
          <li><a class="active" href="#" data-isotope-filter="*" data-isotope-group="gallery">All</a></li>
          <li><a href="#" data-isotope-filter="Type 1" data-isotope-group="gallery">Architectural Designs</a></li>
          <li><a href="#" data-isotope-filter="Type 2" data-isotope-group="gallery">Structural Designs & Analysis</a></li>
          <li><a href="#" data-isotope-filter="Type 3" data-isotope-group="gallery">Construction</a></li>
          <li><a href="#" data-isotope-filter="Type 4" data-isotope-group="gallery">Others</a></li>
        </ul>
      </div>
      <div class="row row-30 isotope" data-lightgallery="group">
        <div class="col-sm-4 col-lg-3 isotope-item" data-filter="Type 3"> 
          <!-- Thumbnail Classic-->
          <article class="thumbnail thumbnail-mary thumbnail-xs">
            <div class="thumbnail-mary-figure"><img src="images/gallery/gallery-2.jpg" alt="" width="270" height="300"/> </div>
            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery/gallery-2.jpg" data-lightgallery="item"><img src="images/gallery/gallery-2.jpg" alt="" width="270" height="300"/></a>
              <h5 class="thumbnail-mary-title"><a href="single-project.html">Project #1</a></h5>
            </div>
          </article>
        </div>
        <div class="col-sm-8 col-lg-6 isotope-item" data-filter="Type 2"> 
          <!-- Thumbnail Classic-->
          <article class="thumbnail thumbnail-mary thumbnail-lg thumbnail-custom-mobile">
            <div class="thumbnail-mary-figure"><img src="images/gallery/gallery-1.jpg" alt="" width="570" height="300"/> </div>
            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery/gallery-1.jpg" data-lightgallery="item"><img src="images/gallery/gallery-1.jpg" alt="" width="570" height="300"/></a>
              <h5 class="thumbnail-mary-title"><a href="single-project.html">Project #2</a></h5>
            </div>
          </article>
        </div>
        <div class="col-sm-4 col-lg-3 isotope-item" data-filter="Type 1"> 
          <!-- Thumbnail Classic-->
          <article class="thumbnail thumbnail-mary thumbnail-xs">
            <div class="thumbnail-mary-figure"><img src="images/gallery/gallery-3.jpg" alt="" width="270" height="300"/> </div>
            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery/gallery-3.jpg" data-lightgallery="item"><img src="images/gallery/gallery-3.jpg" alt="" width="270" height="300"/></a>
              <h5 class="thumbnail-mary-title"><a href="single-project.html">Project #3</a></h5>
            </div>
          </article>
        </div>
        <div class="col-sm-8 col-lg-6 isotope-item" data-filter="Type 3"> 
          <!-- Thumbnail Classic-->
          <article class="thumbnail thumbnail-mary thumbnail-lg thumbnail-custom-mobile">
            <div class="thumbnail-mary-figure"><img src="images/gallery/gallery-4.jpg" alt="" width="570" height="300"/> </div>
            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery/gallery-4.jpg" data-lightgallery="item"><img src="images/gallery/gallery-4.jpg" alt="" width="570" height="300"/></a>
              <h5 class="thumbnail-mary-title"><a href="single-project.html">Project #4</a></h5>
            </div>
          </article>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 isotope-item" data-filter="Type 2"> 
          <!-- Thumbnail Classic-->
          <article class="thumbnail thumbnail-mary thumbnail-xs">
            <div class="thumbnail-mary-figure"><img src="images/gallery/gallery-5.jpg" alt="" width="270" height="300"/> </div>
            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery/gallery-5.jpg" data-lightgallery="item"><img src="images/gallery/gallery-5.jpg" alt="" width="270" height="300"/></a>
              <h5 class="thumbnail-mary-title"><a href="single-project.html">Project #5</a></h5>
            </div>
          </article>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 isotope-item" data-filter="Type 1"> 
          <!-- Thumbnail Classic-->
          <article class="thumbnail thumbnail-mary thumbnail-xs">
            <div class="thumbnail-mary-figure"><img src="images/gallery/gallery-6.jpg" alt="" width="270" height="300"/> </div>
            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/gallery/gallery-6.jpg" data-lightgallery="item"><img src="images/gallery/gallery-6.jpg" alt="" width="270" height="300"/></a>
              <h5 class="thumbnail-mary-title"><a href="single-project.html">Project #6</a></h5>
            </div>
          </article>
        </div>
      </div>
      <div class="button-wrap">
        <button class="button button-md button-default-outline button-wapasha">Load More</button>
      </div>
    </div>
  </section>
  
  <!-- Footer section start -->
   <?php include 'main/footer.php'; ?>