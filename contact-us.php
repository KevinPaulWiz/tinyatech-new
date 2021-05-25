 <?php include 'main/header.php'; ?>
  <!-- Breadcrumbs -->
  <section class="breadcrumbs-custom-inset">
    <div class="breadcrumbs-custom context-dark">
      <div class="container">
        <h2 class="breadcrumbs-custom-title">Contact Us </h2>
        <ul class="breadcrumbs-custom-path">
          <li><a href="index">Home</a></li>
          <li class="active">Contact Us</li>
        </ul>
      </div>
      <div class="box-position" style="background-image: url(images/bg-breadcrumbs.jpg);"></div>
    </div>
  </section>
  
  <!-- Contact information-->
  <section class="section section-sm bg-default bg_second_cl">
    <div class="container">
      <div class="row row-30 justify-content-center">
        <div class="col-md-4 col-lg-4">
          <article class="box-contacts bg_first_cl">
            <div class="box-contacts-body">
              <div class="box-contacts-icon fl-bigmug-line-cellphone55"></div>
              <div class="box-contacts-decor"></div>
              <p class="box-contacts-link"><a href="tel:+256-784-217883">+256-784-217883 </a></p>
              <p class="box-contacts-link"><a href="tel:+256-752-963318">+256-752-963318</a></p>
            </div>
          </article>
        </div>
        <div class="col-md-4 col-lg-4">
          <article class="box-contacts bg_first_cl">
            <div class="box-contacts-body">
              <div class="box-contacts-icon fl-bigmug-line-up104"></div>
              <div class="box-contacts-decor"></div>
              <p class="box-contacts-link"><a href="#">Ntinda - Kigoowa, Kampala Uganda</a></p>
            </div>
          </article>
        </div>
        <div class="col-md-4 col-lg-4">
          <article class="box-contacts bg_first_cl">
            <div class="box-contacts-body">
              <div class="box-contacts-icon fl-bigmug-line-chat55"></div>
              <div class="box-contacts-decor"></div>
              <p class="box-contacts-link"><a href="mailto:tinyatech@gmail.com"><span class="__cf_email__" data-cfemail="#">tinyatech@gmail.com</span></a></p>
              <p class="box-contacts-link"><a href="mailto:info@tinyatechassociates.com "><span class="__cf_email__" data-cfemail="#">info@tinyatechassociates.com</span></a></p>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>
   
  <!-- Contact Form and Gmap-->
  <section class="section section-sm bg-default text-md-left">
    <div class="container">
      <div class="row row-50">
        <div class="col-lg-6 section-map-small">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15958.94265425493!2d32.6057657274475!3d0.3688086172060084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177dba40f2f1ad57%3A0x6ae60d528b6fc98b!2sKigowa%2C%20Kampala!5e0!3m2!1sen!2sug!4v1573828550950!5m2!1sen!2sug" class="col-md-12"  width="100%" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>
        <div class="col-lg-6">
         <form class="finarc-form finarc-mailform" id="form-contact" data-form-output="form-output-global" data-form-type="contact" method="post" action="#" >
          <h4 class="text-spacing-50">Contact Form</h4>
            <div class="row row-14 gutters-14">
              <div class="col-sm-6">
                <div class="form-wrap">
                  <input class="form-input" id="contact-first-name" type="text" name="name" data-constraints="@Required">
                  <label class="form-label" for="contact-first-name">Name</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-wrap">
                  <input class="form-input" id="contact-Phone-Number" type="text" name="contact-Phone-Number" data-constraints="@Required">
                  <label class="form-label" for="contact-Phone-Number">Phone Number</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-wrap">
                  <input class="form-input" id="contact-email" type="email" name="contact-email" data-constraints="@Email @Required">
                  <label class="form-label" for="contact-email">E-mail</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-wrap">
                  <label class="form-label" for="contact-message">Message</label>
                  <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required"></textarea>
                </div>
              </div>
            </div>
            <button id="post" name="post" type="submit" class="button button-secondary button-pipaluk" >Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Footer section start -->
  <?php include 'main/footer.php'; ?>