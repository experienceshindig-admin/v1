<?php

/**
 * Shindig Page Hooks
 */
/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_vendor_subtitle', 6 );
function woocommerce_template_single_vendor_subtitle(){ 
               global $product;
	$id = get_the_ID();
        $seller = get_post_field( 'post_author', $product->get_id());
        $author  = get_user_by( 'id', $seller );
        $store_info = dokan_get_store_info( $author->ID );
		$shindig_rating = get_post_meta( $id, '_wc_average_rating', true);
		$shindig_rating_count = get_post_meta( $id, '_wc_review_count', true);
		if ( $shindig_rating_count > 0 ) { ?>

                    <span class="sub-title-rating">
                       <?php
            /*#rbeef - duplicate star-rating
             *            echo str_repeat("<img class='rating-star' src='https://experienceshindig.com/wp-content/uploads/2019/08/star-solid-orange.png' />", $shindig_rating);
                        echo '<span class="rating-count">('.$shindig_rating_count.')</span>';
                       echo '<span class="read-reviews"><a href="#reviews">Read Reviews</a></span>';*/
                       ?>
                </span>

            <?php
            }
        if ( !empty( $store_info['store_name'] ) ) { ?>
            <span class="sub-title">
                    <?php printf( 'By <a href="%s">%s</a>', dokan_get_store_url( $author->ID ), $store_info['store_name'] ); ?>
                </span>
            <?php
}}
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_options', 11 );
function woocommerce_template_single_options($post){
	// vars	
	$id = get_the_ID();
	$specialty_diets = get_field('specialty_diets');

	$alcohol_pairings = get_field('alcohol_pairings');
	$min_person = get_post_meta( $id, '_wc_booking_min_persons_group', true);
	$max_person = get_post_meta( $id, '_wc_booking_max_persons_group', true);
	$base_cost =  get_post_meta( $id, '_wc_booking_cost', true);
	$cuisine = wc_get_product_category_list( get_the_id() );
	
if( $specialty_diets||$alcohol_pairings||$min_person||$max_person||$base_cost||$cuisine ):
	echo '<div class="shindig-options">';
endif; 
	
// check
if( !empty($base_cost )): ?>
	<div class="shindig-option">
	<div class="shindig-option-img"><?php echo '<span class="cost-per-person">$</span>'; ?></div>
	<div class="shindig-option-text"><?php echo 'Starting at $'.$base_cost.'/Person'; ?></div>
	</div>
<?php endif;
	
// check
if( $min_person||$max_person ): ?>
	<div class="shindig-option">
	<div class="shindig-option-img"><img src="https://experienceshindig.com/wp-content/uploads/2019/08/persons.png" /></div>
	<div class="shindig-option-text">
	<?php
	if ( !empty( $min_person ) ) {
		echo $min_person;
	}
	if ( !empty( $min_person && $max_person ) ) {
		echo ' to ';
	}
	if ( empty( $min_person) && !empty ($max_person) ) {
		echo 'Up to ';
	}
	if ( !empty( $max_person ) ) {
		echo $max_person;
	}
	echo ' People';
	?>
	</div></div>
<?php endif;
	
// check
if( $cuisine ): ?>
	<div class="shindig-option">
	<div class="shindig-option-img"><img src="https://experienceshindig.com/wp-content/uploads/2019/08/utensils-solid.png" /></div>
	<div class="shindig-option-text"><?php echo $cuisine; ?></div>
	</div>
<?php endif;
	
// check
if( $specialty_diets ): ?>
	<div class="shindig-option">
	<div class="shindig-option-img"><img src="https://experienceshindig.com/wp-content/uploads/2019/08/star-solid-gray.png" /></div>
	<div class="shindig-option-text">
	<ul class="shindig-ul">
	<?php foreach( $specialty_diets as $specialty_diet ): ?>
		<li>
		<div class="tooltip"><?php echo $specialty_diet['value']; ?>, 
  			<span class="tooltiptext"><?php echo $specialty_diet['label']; ?></span>
		</div>
		</li>
	<?php endforeach; ?>
	</ul>
		</div>
	</div>
<?php endif; ?>
	<div class="shindig-option">
	<div class="shindig-option-img"><img src="https://experienceshindig.com/wp-content/uploads/2019/08/serving-tray.png" /></div>
	<div class="shindig-option-text">
	<ul class="shindig-ul">

		<li>
		<div>
  			<span>Full Service</span>
		</div>
		</li>
	<?php endforeach; ?>
	</ul>
	</div></div>
<?php 

// check
if( $alcohol_pairings ): ?>
	<div class="shindig-option">
	<div class="shindig-option-img"><img src="https://experienceshindig.com/wp-content/uploads/2019/08/glass-cheers-solid.png" /></div>
	<div class="shindig-option-text">
	<ul class="shindig-ul">
	<?php foreach( $alcohol_pairings as $alcohol_pairing ): ?>
		<li>
		<div>
  			<span><?php echo $alcohol_pairing['label']; ?>, </span>
		</div>
		</li>
	<?php endforeach; ?>
	</ul>
		</div>
	</div>
<?php endif;?>
	<div class="shindig-option">
	<div class="shindig-option-img"><img src="https://experienceshindig.com/wp-content/uploads/2019/08/tasks-solid.png" /></div>
	<div class="shindig-option-text">
	<ul class="shindig-ul">

		<li>
		<div>
  			<span>Set-Up Included</span>
		</div>
		</li>
	<?php endforeach; ?>
	</ul>
	</div></div>
	?>
	<div class="shindig-option">
	<div class="shindig-option-img"><img src="https://experienceshindig.com/wp-content/uploads/2019/08/CleanDishes.pngg" /></div>
	<div class="shindig-option-text">
	<ul class="shindig-ul">

		<li>
		<div>
  			<span>Full Service</span>
		</div>
		</li>
	<?php endforeach; ?>
	</ul>
	</div></div>
<?php endif; 
if( $specialty_diets||$alcohol_parings||$min_person||$max_person||$base_cost||$cuisine ):
	echo '</div>';
endif; 
	}

//ADD TO CART WRAP (will need to revise once calendar is updated to list. Add "if" available what dates. Also, need if date pre selected.)
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_wrap_start_add_to_cart', 29 );
function woocommerce_template_single_wrap_start_add_to_cart(){ 

		<h1>Upcoming Availability</h1>
	
<?php }
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_wrap_end_add_to_cart', 31 );
function woocommerce_template_single_wrap_end_add_to_cart(){
	global $product;
        $seller = get_post_field( 'post_author', $product->get_id());
        $author  = get_user_by( 'id', $seller );
        $store_info = dokan_get_store_info( $author->ID );
if ( !empty( $store_info['store_name'] ) ) { ?>
            <span class="sub-title">
                    <?php printf( 'Not finding the date you want?<br />Contact <a href="%s">%s</a>.', dokan_get_store_url( $author->ID ), $store_info['store_name'] ); ?>
                </span>
            <?php }
	
}

//ADD DATE & CTA

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_vendor_info', 33 );
function woocommerce_template_single_vendor_info() { 
               global $product;
		$id = get_the_ID();
        $seller = get_post_field( 'post_author', $product->get_id());
        $author  = get_user_by( 'id', $seller );
        $store_info = dokan_get_store_info( $author->ID );
		$company_bio = $store_info['vendor_biography'];
		$years_of_experience = get_user_meta($author->id, 'years_of_experience', true);	
		$certifications = get_user_meta($author->id, 'certifications', true);
		$response_time = get_user_meta($author->id, 'response_time', true);
		$location = get_user_meta($author->id, 'location', true);
		$vendor_gravatar = $store_info['gravatar_id'];
		$vendor_img = wp_get_attachment_image( $vendor_gravatar, $size = 'thumbnail', $icon = true );
		$vendor_rating = get_post_meta( $id, ' ', true);
		$vendor_rating_count = get_post_meta( $id, ' ', true);
		
        if ( !empty( $store_info['store_name'] ) ) { 
      		echo '<h1>About '.$store_info['vendor_biography'].'</h1>';
		 }
			echo '<div class="shindig-vendor">';
			echo '<div class="vendor-details">';
					
				if ( ! empty( $store_info['vendor_biography'] )) {
                    
					echo '<div class="more">';
      				echo wp_strip_all_tags($store_info['vendor_biography']);
					echo '</div>';
                }
					
					echo '<div class="vendor-icons">';
					
					if( !empty($store_info['years_of_experience'] )) { 
						echo '<div><i class="fa fa-check"></i> <strong>Years Experience:</strong> '.$store_info['years_of_experience'].'</div>';
					}
					if( !empty($store_info['response_time'] )) { 
						echo '<div><i class="fa fa-comment"></i> <strong>Response Time:</strong> '.$store_info['response_time'].'</div>';
					}
					
					
					echo '</div>';
					if( !empty($store_info['certificates'] )) { 
						echo '<div><i class="fa fa-certificate"></i> <strong>Achievements:</strong> '.$store_info['certificates'].'</div>';
					} 
					echo '</div></div>';
}

add_action( 'woocommerce_after_single_product_summary', 'woocommerce_template_single_menu', 5 );
function woocommerce_template_single_menu(){ 
$menus = get_field('menu');
if( $menus ){ ?>
<div class="clear"></div>
		 <h1>Menu</h1>

	<ul class="menu">
	<?php
					
$savory_query = new WP_Query(array(
	'post_type'      	=> 'menu_item',
	'posts_per_page'	=> -1,
	'post__in'			=> $menus,
	'post_status'		=> 'any',
	'orderby'        	=> 'post__in',
	'meta_query' => array(
       array(
           'key' => 'course_type',
           'value' => 'Savory',
           'compare' => '=',
       )
   )
));
$drinks_query = new WP_Query(array(
	'post_type'      	=> 'menu_item',
	'posts_per_page'	=> -1,
	'post__in'			=> $menus,
	'post_status'		=> 'any',
	'orderby'        	=> 'post__in',
	'meta_query' => array(
       array(
           'key' => 'course_type',
           'value' => 'Drinks',
           'compare' => '=',
       )
   )
));
$sweet_query = new WP_Query(array(
	'post_type'      	=> 'menu_item',
	'posts_per_page'	=> -1,
	'post__in'			=> $menus,
	'post_status'		=> 'any',
	'orderby'        	=> 'post__in',
	'meta_query' => array(
       array(
           'key' => 'course_type',
           'value' => 'Sweet',
           'compare' => '=',
       )
   )
));
		
add_filter( 'jetpack_lazy_images_blacklisted_classes', 'exclude_menu_img_class_from_lazy_load', 999, 1 );
             
function exclude_menu_img_class_from_lazy_load( $classes ) {
   $classes[] = 'menu_img';
   return $classes;
}											
											
// The Savory Loop
if ( $savory_query->have_posts() ) {
	echo '<li>';
	echo '<h2 class="course">Savory</h2>';
    echo '<ul class="menu-items">';
    while ( $savory_query->have_posts() ) {
        $savory_query->the_post();
		$s_diets = get_field('s_diets');
    	$post_slug = get_post_field( 'post_name' );
		
        echo '<li>';
		echo '<a class="venobox" data-vbtype="inline" href="#'.$post_slug.'"><h3 class="menu-item-title">' . get_the_title() . '</h3></a>';

		echo '<ul class="shindig-ul">';
		foreach( $s_diets as $s_diet ){
		?>
			<li>
				<div class="tooltip"><?php echo $s_diet['value']; ?>, 
  				<span class="tooltiptext"><?php echo $s_diet['label']; ?></span>
				</div>
			</li>
	<?php } 
		echo '</ul>';
		echo '<div id="'.$post_slug.'" style="display:none;">';
?>
<div class="wp-block-columns has-2-columns">
<div class="wp-block-column">
<?php 
$menu_img = wp_get_attachment_url( get_post_thumbnail_id(get_post_field(ID)) );
if( $menu_img ) {

    ?><img class="menu_img aligncenter" alt="<?=get_the_title()?>" src="<?php if($menu_img){echo $menu_img;}else{echo 'https://experienceshindig.com/wp-content/uploads/2019/06/Shindig-Logo-Favicon.png';} ?>" /><?php
    }

?>
</div>



<div class="wp-block-column menu_item">
<h1><?php the_title(); ?></h1>
<h2 class="course"><?php the_field('course_type'); ?></h2>
<?php 
		echo '<ul class="shindig-ul">';
		foreach( $s_diets as $s_diet ){
		?>
			<li>
				<div class="tooltip"><?php echo $s_diet['value']; ?>, 
  				<span class="tooltiptext"><?php echo $s_diet['label']; ?></span>
				</div>
			</li>
	<?php } 
		echo '</ul>';
?>
</div>
</div> <?php
		echo '</div>';
		echo '</li>';
    }
    echo '</ul>';
	echo '</li>';
}
/* Restore original Post Data */
wp_reset_postdata(); 
	// The Drinks Loop
if ( $drinks_query->have_posts() ) {
		
	echo '<li>';
	echo '<h2 class="course">Drinks</h2>';
    echo '<ul class="menu-items">';
    while ( $drinks_query->have_posts() ) {
        $drinks_query->the_post();
		$post_id = get_the_id();
		$s_diets = get_field('s_diets');
    	$post_slug = get_post_field( 'post_name' );
        echo '<li>';
		echo '<a class="venobox" data-vbtype="inline" href="#'.$post_slug.'"><h3 class="menu-item-title">' . get_the_title(). '</h3></a>';

		echo '<ul class="shindig-ul">';
		foreach( $s_diets as $s_diet ){
		?>
			<li>
				<div class="tooltip"><?php echo $s_diet['value']; ?>, 
  				<span class="tooltiptext"><?php echo $s_diet['label']; ?></span>
				</div>
			</li>
	<?php } 
		echo '</ul>';
		echo '<div id="'.$post_slug.'" style="display:none;">';
?>
<div class="wp-block-columns has-2-columns">
<div class="wp-block-column">
<?php 
$menu_img = wp_get_attachment_url( get_post_thumbnail_id(get_post_field(ID)) );
if( $menu_img ) {

    ?><img class="menu_img aligncenter" alt="<?=get_the_title()?>" src="<?php if($menu_img){echo $menu_img;}else{echo 'https://experienceshindig.com/wp-content/uploads/2019/06/Shindig-Logo-Favicon.png';} ?>" /><?php
    }
?>
</div>



<div class="wp-block-column menu_item">
<h1><?php the_title(); ?></h1>
<h2 class="course"><?php the_field('course_type'); ?></h2>
<?php 
		echo '<ul class="shindig-ul">';
		foreach( $s_diets as $s_diet ){
		?>
			<li>
				<div class="tooltip"><?php echo $s_diet['value']; ?>, 
  				<span class="tooltiptext"><?php echo $s_diet['label']; ?></span>
				</div>
			</li>
	<?php } 
		echo '</ul>';
?>
</div>
</div> <?php
		echo '</div>';
		echo '</li>';
    }
    echo '</ul>';
	echo '</li>';
}
/* Restore original Post Data */
wp_reset_postdata(); 
	// The Sweet Loop
if ( $sweet_query->have_posts() ) {
	echo '<li>';
	echo '<h2 class="course">Sweet</h2>';
    echo '<ul class="menu-items">';
    while ( $sweet_query->have_posts() ) {
        $sweet_query->the_post();
		$s_diets = get_field('s_diets');
    	$post_slug = get_post_field( 'post_name' );
        echo '<li>';
		echo '<a class="venobox" data-vbtype="inline" href="#'.$post_slug.'"><h3 class="menu-item-title">' . get_the_title() . '</h3></a>';

		echo '<ul class="shindig-ul">';
		foreach( $s_diets as $s_diet ){
		?>
			<li>
				<div class="tooltip"><?php echo $s_diet['value']; ?>, 
  				<span class="tooltiptext"><?php echo $s_diet['label']; ?></span>
				</div>
			</li>
	<?php } 
		echo '</ul>';
		echo '<div id="'.$post_slug.'" style="display:none;">';
?>
<div class="wp-block-columns has-2-columns">
<div class="wp-block-column">
<?php 
$menu_img = wp_get_attachment_url( get_post_thumbnail_id(get_post_field(ID)) );
if( $menu_img ) {

    ?><img class="menu_img aligncenter" alt="<?=get_the_title()?>" src="<?php if($menu_img){echo $menu_img;}else{echo 'https://experienceshindig.com/wp-content/uploads/2019/06/Shindig-Logo-Favicon.png';} ?>" /><?php
    }

?>
</div>



<div class="wp-block-column menu_item">
<h1><?php the_title(); ?></h1>
<h2 class="course"><?php the_field('course_type'); ?></h2>
<?php 
		echo '<ul class="shindig-ul">';
		foreach( $s_diets as $s_diet ){
		?>
			<li>
				<div class="tooltip"><?php echo $s_diet['value']; ?>, 
  				<span class="tooltiptext"><?php echo $s_diet['label']; ?></span>
				</div>
			</li>
	<?php } 
		echo '</ul>';
?>
</div>
</div><?php
		echo '</div>';
		echo '</li>';
    }
    echo '</ul>';
	echo '</li>';
}
/* Restore original Post Data */
wp_reset_postdata(); ?>
	</ul>
<div class="clear"></div>
			 
<?php	}}
add_action( 'woocommerce_single_product_summary', 'custom_single_product_summary', 2 );
function custom_single_product_summary(){
    global $product;

    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

}
    add_action( 'woocommerce_after_single_product_summary', 'custom_single_excerpt', 6 );
function custom_single_excerpt(){
    global $post, $product;

    $short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );

    if ( ! $short_description )
        return;
	echo '<div class="clear"></div>';
	echo '<h1>About Event</h1>';
    echo '<div class="woocommerce-product-details__short-description">';
	echo '<div class="more">' . strip_tags($short_description) . '</div>'; // WPCS: XSS ok.
    echo '</div>';
    
}
// Add Calendar 7
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_template_single_additional_info', 8 );

function woocommerce_template_single_additional_info(){
echo '<div class="clear"></div>';
	
	echo '<div class="add-info">';
	echo '<h1>Terms</h1>';
	echo '<div class="more">';
	echo wp_strip_all_tags( get_the_content() );
	echo '</div>';
	 ?>
 
<div class="policy">
<h2>How far out can I book? </h2>
<div class="more">All bookings can be booked from 5 days to 12 months in the future. For last-minute bookings, contact our team at <a href="hello@experienceshindig.com">hello@experienceshindig.com</a> or the provider with the contact button above. </div>
</div>
<div class="policy">
<h2>Cancellations</h2>
<div class="more">Cancelations before 3 weeks of the event, will receive a full refund. Cancellations within 7 days out may forfeit their deposit. Cancellations within 48 hours of the event may be subject to forfeiting the entire cost of the booking. If you are in this situation, please email us directly so we can better assist you (<a href="hello@experienceshindig.com">hello@experienceshindig.com</a>).
</div>
</div>
<div class="policy">
<h2>Headcount Lock-in</h2>
<div class="more">Prices are generally determined per person. If you need to change the number of people attending, please do so prior to 7 days of the event by emailing us at <a href="hello@experienceshindig.com">hello@experienceshindig.com</a> and we can make the appropriate changes to the reservation. </div>
</div>
<div class="policy">
<h2>Deposit & Payment</h2>
<div class="more">At the time of booking, we will hold 50% of the cost of the booking until the provider confirms the reservation. The remaining balance will be collected on the morning of the event. Gratuity is not required. If you feel so inclined, you are welcome to give cash directly to the provider at the event. By booking, you are agreeing to our complete <a href="http://www.experienceshindig.com/terms">terms of use</a> and <a href="http://www.experienceshindig.com/policy">privacy policy</a>.</div>
</div>

	<div class="policy"><h2>Venue Requirements</h2>
	<ul class="shindig-venue_requirements">
			<li>
			<img src="https://experienceshindig.com/wp-content/uploads/2019/08/oven-icon.png" />
  			<span>Oven</span>
			</li>
			<li>
			<img src="<https://experienceshindig.com/wp-content/uploads/2019/08/sink.png" />
  			<span>Sink</span>
			</li>
			<li>
			<img src="https://experienceshindig.com/wp-content/uploads/2019/12/refrigerator.png" />
  			<span>Refrigerator</span>
			</li>
	</ul>
	</div>
</div>
<div class="clear"></div>

<?php }

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
function woo_remove_product_tabs( $tabs ) {
    unset( $tabs['reviews'] );  // Removes the reviews tab
    unset( $tabs['additional_information'] );  // Removes the additional information tab
	unset( $tabs['seller'] );
	unset( $tabs['more_seller_product'] );
    return $tabs;
}
/*#rbeef - this function is called in functions.php
add_action( 'woocommerce_after_single_product_summary', 'my_plugin_comment_template', 9 );
function my_plugin_comment_template( $comment_template ) {
     global $product;
	$count = $product->get_review_count();
     if ($count>0){
         woocommerce_get_template( 'single-product-reviews.php' );
	 }
}
*/
/*remove tabs remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 ); */
add_action( 'woocommerce_after_single_product', 'report_shindig', 10 );
function report_shindig() {	
	echo '<hr />';
	echo '<span class="report-shindig" onclick="reportForm()">Report Problem with Shindig</span>';
echo '<div style="display:none;" id="reportForm">';
	echo do_shortcode('[weforms id="5898"]');
echo '</div>';

?>
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
<?php

}

