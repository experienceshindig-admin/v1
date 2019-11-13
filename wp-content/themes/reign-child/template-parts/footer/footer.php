<footer itemscope="itemscope" itemtype="http://schema.org/WPFooter">
	<?php
	if ( is_active_sidebar( 'footer-widget-area' ) ) {
		?>
		<div class="footer-wrap">
			<div class="container">
				<aside id="footer-area" class="widget-area footer-widget-area" role="complementary">
					<div class="widget-area-inner">
						<div class="wb-grid">
							<?php dynamic_sidebar( 'footer-widget-area' ); ?>
						</div>
					</div>
				</aside>
			</div>
		</div>
		<?php
	}
	?>
	<?php
	$reign_footer_bottom = get_theme_mod( 'reign_footer_bottom', true );
	if ( $reign_footer_bottom ) {
		$reign_footer_copyright_text = get_theme_mod( 'reign_footer_copyright_text', '&copy; '. date( 'Y' ) .' - Experience Shindig' );
		?>
	
<!-- Footer -->

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-logo">

        <!-- LOGO Content -->
        <img width="652" height="347" src="https://i1.wp.com/experienceshindig.com/wp-content/uploads/2019/06/Experience-Shindig-Logo-01-01.png?fit=652%2C347&amp;ssl=1" class="attachment-full size-full jetpack-lazy-image jetpack-lazy-image--handled" alt="" srcset="https://i1.wp.com/experienceshindig.com/wp-content/uploads/2019/06/Experience-Shindig-Logo-01-01.png?w=652&amp;ssl=1 652w, https://i1.wp.com/experienceshindig.com/wp-content/uploads/2019/06/Experience-Shindig-Logo-01-01.png?resize=300%2C160&amp;ssl=1 300w, https://i1.wp.com/experienceshindig.com/wp-content/uploads/2019/06/Experience-Shindig-Logo-01-01.png?resize=600%2C319&amp;ssl=1 600w" data-lazy-loaded="1" sizes="(max-width: 652px) 100vw, 652px">

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-links">

        <!-- Links -->
        <h3 class="text-uppercase font-weight-bold white-text">HOW IT WORKS</h3>
        <hr class="red-orange accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="<?php echo home_url(); ?>">About Us</a>
        </p>
        <p>
          <a href="/terms/">Terms &amp; Conditions</a>
        </p>
        <p>
          <a href="/learn-more/">FAQs</a>
        </p>
        <p>
          <a href="/contact/">Contact</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-links">

        <!-- Links -->
        <h3 class="text-uppercase font-weight-bold white-text">BECOME A CHEF</h3>
        <hr class="red-orange accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="/vendor-registration-form/">Sign Up</a>
        </p>
        <p>
          <a href="/for-chefs/">Learn How</a>
        </p>
	</div>
	<div class="col-links">
		<h3 class="text-uppercase font-weight-bold white-text">FIND A CHEF</h3>
        <hr class="red-orange accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="/find-a-chef/">Host an Event</a>
        </p>
        <p>
          <a href="/learn-more/">Learn More</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-links">

        <!-- Links -->
        <h3 class="text-uppercase font-weight-bold white-text">ACCOUNT</h3>
        <hr class="red-orange accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="/dashboard/">Dashboard</a>
        </p>
        <p>
          <a href="/cart/">Cart</a>
        </p>
		    <?php if ( !is_user_logged_in() ) { ?> 
        <p>
          <a href="/my-account/">Login/Register</a>
        </p>
      <?php } ?>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
	
<div style="background-color: #181818;">
    <div class="container">

      <!-- Grid row-->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-6 copyright">
          <?php echo '&copy; '. date( 'Y' ) .' - Experience Shindig'; ?>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 social-icons">

          <!-- Facebook -->
          <a class="fb-ic" href="https://www.facebook.com/experienceshindig/">
            <i class="fa fa-facebook-f white-text"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic" href="https://twitter.com/seattleshindig">
            <i class="fa fa-twitter white-text"> </i>
          </a>
          
          <!--Instagram-->
          <a class="ins-ic" href="https://www.instagram.com/experienceshindig/">
            <i class="fa fa-instagram white-text"> </i>
          </a>
			
		   <!--Email-->
          <a class="em-ic" href="mailto:hello@experienceshindig.com">
			<i class="fa fa-envelope white-text"> </i> 
          </a>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>

  <!-- Copyright -->
<?php
	}
	?>
</footer>