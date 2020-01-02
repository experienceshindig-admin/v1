<?php
/**
 * The Template for displaying all single posts.
 *
 * @package dokan
 * @package dokan - 2014 1.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$store_user   = dokan()->vendor->get( get_query_var( 'author' ) );
$store_info   = $store_user->get_shop_info();
$map_location = $store_user->get_location();
$social_info   = $store_user->get_social_profiles();
$social_fields = dokan_get_social_profile_fields();

$dokan_appearance = get_option( 'dokan_appearance' );
$profile_layout   = empty( $dokan_appearance['store_header_template'] ) ? 'default' : $dokan_appearance['store_header_template'];
$store_address    = dokan_get_seller_short_address( $store_user->get_id(), false );

$general_settings = get_option( 'dokan_general', [] );

get_header( 'shop' );
?>
    <?php do_action( 'woocommerce_before_main_content' ); ?>


        <div id="dokan-left-side" class="dokan-clearfix dokan-w3 " role="complementary" style="margin-right:3%;">
            <div class="">
				<div align="center" class="profile-img profile-img-circle">
                    <?php echo get_avatar( $store_user->get_id(), 200, '', $store_user->get_shop_name() ); ?>

                </div>
				<?php dokan_get_readable_seller_rating( $store_user->get_id() ); ?>

				<?php
					echo '<ul class="fa-ul vendor-icons dokan-store-info">';

					if( !empty($store_info['years_of_experience'] )) {
						echo '<li><span class="fa-li"><i class="fa fa-check"></i></span> <strong>Years Experience:</strong> '.$store_info['years_of_experience'].'</li>';
					}
					if( !empty($store_info['certificates'] )) {
						echo '<li><span class="fa-li"><i class="fa fa-certificate"></i></span> <strong>Achievements:</strong> '.$store_info['certificates'].'</li>';
					}
					$seller_id  = (int) get_query_var( 'author' );
					echo '<li><span class="fa-li"><i class="fa fa-cutlery"></i></span><strong>Specialties:</strong> ';
					echo dokan_store_category_menu( $seller_id, $title );
					echo '</li>';

					if( !empty($store_info['response_time'] )) {
						echo '<li><span class="fa-li"><i class="fa fa-comment"></i></span> <strong>Response Time:</strong> '.$store_info['response_time'].'</li>';
					}
					if( !empty($store_info['service_type'] )) {
						echo '<li><div class="fa-li"><img src="https://experienceshindig.com/wp-content/uploads/2019/08/serving-tray.png" /></div><strong>Service Types:</strong> '.$store_info['service_type'].'</li>';
					}
					if( !empty($store_info['spec_diet'] )) {
						echo '<li><div class="fa-li"><img src="https://experienceshindig.com/wp-content/uploads/2019/08/star-solid-gray.png" /></div><strong>Dietary Offerings:</strong> '.$store_info['spec_diet'].'</li>';
					}
					if( !empty($store_info['alcohol_pairings'] )) {
						echo '<li><div class="fa-li"><img src="https://experienceshindig.com/wp-content/uploads/2019/08/glass-cheers-solid.png" /></div><strong>Alcohol Pairings:</strong> '.$store_info['alcohol_pairings'].'</li>';
					}



				do_action( 'dokan_store_header_info_fields',  $store_user->get_id() );
				echo '</ul>';

				//CHANGE INTO RADIUS & GET LAT & LNG

				?>
				<h3>Service Area</h3>

				  <?php
				if ( isset( $store_address ) && !empty( $store_address ) ) {

                 echo $store_address;
				echo '<p>Travel Distance: '.$store_info['travel_dist'].'</p>';

                } ?>


                <?php

				//NEED UPCOMING AVAILABILITY WIDGET
                ?>


            </div>
        </div><!-- #secondary .widget-area -->


    <div id="dokan-primary" class="dokan-single-store dokan-w8">
        <div id="dokan-content" class="store-page-wrap woocommerce" role="main">

            <?php if( rda_is_render_inner_store_header() ) : ?>
                <?php dokan_get_template_part( 'store-header' ); ?>
            <?php endif; ?>

            <?php do_action( 'dokan_store_profile_frame_after', $store_user->data, $store_info ); ?>
			<?php
			echo '<div class="provider-details">';
				 if ( ! empty( $store_user->get_shop_name() ) ) { ?>
                        <h1 class="store-name"><?php echo esc_html( $store_user->get_shop_name() ); ?></h1>
                    <?php }
			echo '<div class="subhead-cat">';
            echo $store_info['cuisine_spec'];
			echo '</div>';
			echo '<div class="contact-vendor">';
			echo '<a class="venobox button" data-vbtype="inline" href="#contactvendor">Contact</a>';
			echo '<div id="contactvendor" style="display:none;">';
  			echo do_shortcode('[wpforms id="10321" title="false" description="false"]');
  			echo '</div>';
			echo '</div>';
				 ?>


			<hr style="margin-top:30px;" />
                   <?php

                if ( ! empty( $store_info['vendor_biography'] )) {
					echo '<h3 class="headline">'. apply_filters( 'dokan_vendor_biography_title', __( 'About', 'dokan' ) ).'</h3>';
                    $newarr = explode("\n",$store_info['vendor_biography']);

      				foreach($newarr as $str) {
      				echo "<p>".$str."</p>";
    				}
                }
				if( !empty($store_info['company_values'] )) {
					echo '<h3>Company Values</h3>';
					echo '<p>'.$store_info['company_values'].'</p>';
				}

		/* Indiviual chefs are not wanted right now
		$chef_item_query = new WP_Query(array(
			'post_type'      	=> 'chefs',
			'posts_per_page'	=> -1,
			'author__in'     	=> $author,
			'post_status'		=> 'any',
			'orderby'        	=> 'post__in'
		   )
		);
			// The chef_item Loop
		if ( $chef_item_query->have_posts() ) {
			echo '<h3>Our Team</h3>';
			woocommerce_product_loop_start();
			while ( $chef_item_query->have_posts() ) {
				$chef_item_query->the_post();
				$chef_img = wp_get_attachment_url( get_post_thumbnail_id(get_post_field(ID)) );

				$chef_years = get_field('chef_years_of_experience');
				$chef_specs = get_field('chef_category');
				$chef_certs = get_field('chef_certificates');
				$post_slug = get_post_field( 'post_name' );
				?>
				<li class="our-chefs profile-img-circle">

				<a class="venobox" data-vbtype="inline" href="#<?php echo $post_slug; ?>">
				<img width="125px" src="<?php if($chef_img){echo $chef_img;}else{echo 'https://experienceshindig.com/wp-content/uploads/2019/06/Shindig-Logo-Favicon.png';} ?>" alt="<?php echo get_the_title(); ?>" />
				<p><?php echo get_the_title(); ?></p>


				<span class="button add_to_cart_button">Biogrpahy</span></a></li>
			<?php

				echo '<div id="'.$post_slug.'" style="display:none;">';
		?>
		<div class="wp-block-columns has-2-columns">
		<div class="wp-block-column">
		<?php

		if( $chef_img ) {

		?> <img class="chef_img aligncenter" alt="<?=get_the_title()?>" src="<?php if($chef_img){echo $chef_img;}else{echo 'https://experienceshindig.com/wp-content/uploads/2019/06/Shindig-Logo-Favicon.png';} ?>" /> <?php
		}

		?>
		</div>



		<div class="wp-block-column menu_item">
		<h1><?php the_title(); ?></h1>
		<h2 class="course">Biography</h2>

			<p><strong>Years of Experience: </strong><?php echo $chef_years; ?></p>
			<p><strong>Certifications/Awards: </strong><?php echo $chef_certs; ?></p>
			<p><strong>Specialties: </strong></p>
			<?php if( $chef_specs ): ?>
				<ul>
					<?php foreach( $chef_specs as $chef_spec ): ?>
					<p><?php echo $chef_spec->name; ?><p>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
		</div> <?php
				echo '</div>';

			}
		// Restore original Post Data
		wp_reset_postdata();
			woocommerce_product_loop_end();

		} End unwanted chef info */

					echo '</div>';
			?>
            <?php if ( have_posts() ) { ?>

                <div class="seller-items">
				<h3>Shindigs</h3>
                    <?php woocommerce_product_loop_start(); ?>

                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php wc_get_template_part( 'content', 'product' ); ?>

                        <?php endwhile; // end of the loop. ?>

                    <?php woocommerce_product_loop_end(); ?>

                </div>

                <?php dokan_content_nav( 'nav-below' ); ?>

            <?php } else { ?>

                <p class="dokan-info"><?php _e( 'No Shindigs were found of this provider!', 'dokan-lite' ); ?></p>

            <?php } ?>
			<?php

			$menu_item_query = new WP_Query(array(
				'post_type'      	=> 'menu_item',
				'posts_per_page'	=> -1,
				'author__in'     	=> $author,
				'post_status'		=> 'any',
				'orderby'        	=> 'post__in'
			   )
			);
			// The menu_item Loop
		if ( $menu_item_query->have_posts() ) {
			echo '<h3>Top Menu Items</h3>';
			woocommerce_product_loop_start();
			while ( $menu_item_query->have_posts() ) {
				$menu_item_query->the_post();

				$s_diets = get_field('s_diets');
				$post_slug = get_post_field( 'post_name' );
				$menu_img = wp_get_attachment_url( get_post_thumbnail_id(get_post_field(ID)) );
				?>
				<li class="vendor-menu-item product type-product post-<?php echo $post_slug; ?> status-publish has-post-thumbnail">
				<a class="venobox woocommerce-LoopProduct-link woocommerce-loop-product__link" data-vbtype="inline" href="#<?php echo $post_slug; ?>">
					<img width="300" height="300" src="<?php if($menu_img){echo $menu_img;}else{echo 'https://experienceshindig.com/wp-content/uploads/2019/06/Shindig-Logo-Favicon.png';} ?>" class="menu-img attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="<?php echo get_the_title(); ?>"  sizes="(max-width: 300px) 100vw, 300px">


				<h2 class="woocommerce-loop-product__title"><?php echo get_the_title(); ?></h2>

					<span class="add_to_cart_button button">Read More</span></a>
			<?php

				echo '<div id="'.$post_slug.'" style="display:none;">';
		?>
		<div class="wp-block-columns has-2-columns">
		<div class="wp-block-column">
		<?php

		if( $menu_img ) {

		?><img class="menu_img aligncenter" alt="<?=get_the_title()?>" src="<?php if($menu_img){echo $menu_img;}else{echo 'https://experienceshindig.com/wp-content/uploads/2019/06/Shindig-Logo-Favicon.png';} ?>" /><?php
		}

		?>
		</div>



		<div class="wp-block-column menu_item">
		<h1><?php the_title(); ?></h1>
		<h2 class="course"><?php the_field('course_type'); ?></h2>
		<?php $cps = get_field('cost_per_serving');
				if ($cps){ ?>
			<p><strong>Cost Per Serving:</strong> <?php the_field('cost_per_serving'); ?></p>
			<?php } ?>

		<?php
			$s_diets = get_field('s_diets');

				echo '<ul class="shindig-ul">';
				foreach( $s_diets as $s_diet ){
				if($s_diet == 'Gluten Free'){
					$diet_short = 'GF';
				}
				elseif($s_diet == 'Dairy Free'){
					$diet_short = 'DF';
				}
				elseif($s_diet == 'Vegan'){
					$diet_short = 'V';
				}
				elseif($s_diet == 'Vegetarian'){
					$diet_short = 'VEG';
				}
				elseif($s_diet == 'Nut Free'){
					$diet_short = 'NF';
				}
				elseif($s_diet == 'Corn Free'){
					$diet_short = 'CF';
				}
				else{
					$diet_short = $s_diet;
				}
				?>
					<li class="s_diet">
						<div class="tooltip"><?php echo $diet_short; ?>,
						<span class="tooltiptext"><?php echo $s_diet; ?></span>
						</div>
					</li>
			<?php }
				echo '</ul>';
		?>
		</div>
		</div> <?php
				echo '</div></li>';

			}
					/* Restore original Post Data */
		wp_reset_postdata();
			woocommerce_product_loop_end();

		}


        ?>
<hr />
			<span class="report-shindig" onclick="reportForm()">Report Problem with Provider</span>
			<div style="display:none;" id="reportForm">';
				<?php echo do_shortcode('[wpforms id="10320" title="false" description="false"]'); ?>
			</div>
				<script>
				function reportForm() {
				  var x = document.getElementById("reportForm");
				  if (x.style.display === "none") {
					x.style.display = "block";
				  } else {
					x.style.display = "none";
				  }
				}
				</script>
        </div>



    </div><!-- .dokan-single-store -->

    <div class="dokan-clearfix"></div>

    <?php do_action( 'woocommerce_after_main_content' ); ?>

<?php get_footer( 'shop' ); ?>
