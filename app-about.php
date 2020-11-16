
<?php

require_once 'website-header.php';

?>
<style>
  .u-promo-block--mheight-500 {
    min-height: 50px;
}
.img-responsive{
  width: 400px;

}
</style>


      <!-- Promo Block -->
      <section class="js-parallax u-promo-block u-promo-block--mheight-500 u-overlay u-overlay--dark text-white" style="background-image: url(<?php echo $src ?>);">
        <!-- Promo Content 
        <div class="container u-overlay__inner u-ver-center u-content-space">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="text-center">
                <h1 class="display-sm-4 display-lg-3">Jane Moris</h1>
                <p class="h6 text-uppercase u-letter-spacing-sm mb-2">UI/UX Designer, Stream</p>

              </div>
            </div>
          </div>
        </div>-->
        <!-- End Promo Content -->
      </section>
      <!-- End Promo Block -->
    </header>
    <!-- End Header -->

    <main role="main">
      <!-- About Section -->

      <iframe src="about.php" title="Log in" height="500" width="100%"></iframe>
 
          <!-- End Profile Block -->
    </main>
    <!-- End Footer -->

    <!-- Call Us Modal Window -->
    <div class="modal fade" id="callUsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <form action="#">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">We'll call you</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group mb-4">
                <input type="text" class="form-control" id="modalName" placeholder="Your Name">
              </div>
              <div class="form-group mb-4">
                <input type="tel" class="form-control" id="modalPhone" placeholder="Your Phone Number">
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">Send</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End Call Us Modal Window -->

  </body>
  <!-- End Body -->
</html>