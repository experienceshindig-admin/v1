<?php

/**
 * Product Dashboard Meta fields
 */
add_action( 'dokan_process_product_meta', 'x_add_fields_save' );
add_action( 'dokan_new_product_added', 'x_add_fields_save' );
// Save Fields
add_action( 'woocommerce_process_product_meta', 'x_add_fields_save' );
function x_add_fields_save( $post_id ){
		
	// cancellation_policy
	$cancellation_policy = $_POST['cancellation_policy'];
	if( !empty( $cancellation_policy) )
		update_post_meta( $post_id, 'cancellation_policy', esc_attr( $cancellation_policy ) );
	// communication_policy
	$communication = $_POST['communication'];
	if( !empty( $communication) )
		update_post_meta( $post_id, 'communication', esc_attr( $communication ) );
	// guests_policy
	$guests = $_POST['guests'];
	if( !empty( $guests) )
		update_post_meta( $post_id, 'guests', esc_attr( $guests ) );
	// alcohol_policy
	$alcohol = $_POST['alcohol'];
	if( !empty( $alcohol ) )
		update_post_meta( $post_id, 'alcohol', esc_attr( $alcohol ) );
	//Venue Requirements
	$venue_requirements = $_POST['venue_requirements'];
	if( !empty( $venue_requirements ) )
		update_post_meta( $post_id, 'venue_requirements', esc_attr($venue_requirements) );
		
	if ( isset( $_POST['venue_requirements'] ) ) {
        $venue_requirement['value'] = implode(', ', $_POST['venue_requirements']);
    }
	
	//Venue Requirements
	$specialty_diets = $_POST['specialty_diets'];
	if( !empty( $specialty_diets ) )
		update_post_meta( $post_id, 'specialty_diets', esc_attr($specialty_diets) );
	//serving_styles
	$serving_styles = $_POST['serving_styles'];
	if( !empty( $serving_styles ) )
		update_post_meta( $post_id, 'serving_styles', esc_attr($serving_styles) );
	//alcohol_pairings
	$alcohol_pairings = $_POST['alcohol_pairings'];
	if( !empty( $alcohol_pairings ) )
		update_post_meta( $post_id, 'alcohol_pairings', esc_attr($alcohol_pairings) );
	//other_options
	$other_options = $_POST['other_options'];
	if( !empty( $other_options ) )
		update_post_meta( $post_id, 'other_options', esc_attr($other_options) );
	
    
	
}
add_filter( 'dokan_new_product_form', 'extra_product_fields', 10, 2);
function extra_product_fields(){ 
	$cancellation = get_field( 'cancellation_policy' );
	//Cancellation ?>
<div class="dokan-form-group">
    <label for="cancellation_policy" class="form-label"><?php _e( 'Cancellation Policy', 'dokan' ); ?></label>
    <?php dokan_post_input_box( $post_id, 'cancellation_policy', array( 'value' => $cancellation,'placeholder' => __( 'Please provide a cancellation policy.', 'dokan' ) ), 'textarea' ); ?>
</div>
<?php
	$communication = get_field( 'communication' );
	//communication ?>
<div class="dokan-form-group">
    <label for="communication" class="form-label"><?php _e( 'Communication Policy', 'dokan' ); ?></label>
    <?php dokan_post_input_box( $post_id, 'communication', array( 'value' => $communication,'placeholder' => __( 'Please provide a communication policy.', 'dokan' ) ), 'textarea' ); ?>
</div>
<?php
	$guests = get_field( 'guests' );
	//guests ?>
<div class="dokan-form-group">
    <label for="guests" class="form-label"><?php _e( 'Guests Policy', 'dokan' ); ?></label>
    <?php dokan_post_input_box( $post_id, 'guests', array( 'value' => $guests,'placeholder' => __( 'Please provide a guests policy.', 'dokan' ) ), 'textarea' ); ?>
</div>
<?php
	$alcohol = get_field( 'alcohol' );
	//Cancellation ?>
<div class="dokan-form-group">
    <label for="alcohol" class="form-label"><?php _e( 'Alcohol Policy', 'dokan' ); ?></label>
    <?php dokan_post_input_box( $post_id, 'alcohol', array( 'value' => $cancellation,'placeholder' => __( 'Please provide a alcohol policy.', 'dokan' ) ), 'textarea' ); ?>
</div>
	
<?php 
//Venue Requirements
	$venue_requirements = get_field('venue_requirements');
	foreach ($venue_requirements as &$venue_requirement) {
		$venue_requirement = $venue_requirement['value']; 
} ?>

	<div class="dokan-form-group dokan-form-control">
        <label class="form-label dokan-control-label" for="venue_requirements">
            <?php _e( 'Venue Requirements', 'dokan' ); ?>
        </label>
        <div class="dokan-ck">
			<li class="dokan-ck-li"><input type="checkbox" <?php if (in_array('https://experienceshindig.com/wp-content/uploads/2019/08/oven-icon.png', $venue_requirements)) {echo 'checked="checked"';} ?> class="input-md valid" name="venue_requirements[]" id="reg_venue_requirements[]" value="https://experienceshindig.com/wp-content/uploads/2019/08/oven-icon.png"> Oven</li>
  			<li class="dokan-ck-li"><input type="checkbox" <?php if (in_array('https://experienceshindig.com/wp-content/uploads/2019/08/oven-icon-1.png', $venue_requirements)) {echo 'checked="checked"';} ?> class="input-md valid" name="venue_requirements[]" id="reg_venue_requirements[]" value="https://experienceshindig.com/wp-content/uploads/2019/08/oven-icon-1.png"> Double Oven</li>
 		    <li class="dokan-ck-li"><input type="checkbox" <?php if (in_array('https://experienceshindig.com/wp-content/uploads/2019/08/burner.png', $venue_requirements)) {echo 'checked="checked"';} ?> class="input-md valid" name="venue_requirements[]" id="reg_venue_requirements[]" value="https://experienceshindig.com/wp-content/uploads/2019/08/burner.png"> 4 Burner Stove</li>
			<li class="dokan-ck-li"><input type="checkbox" <?php if (in_array('https://experienceshindig.com/wp-content/uploads/2019/08/burner-1.png', $venue_requirements)) {echo 'checked="checked"';} ?> class="input-md valid" name="venue_requirements[]" id="reg_venue_requirements[]" value="https://experienceshindig.com/wp-content/uploads/2019/08/burner-1.png"> 6 Burner Stove</li>
			<li class="dokan-ck-li"><input type="checkbox" <?php if (in_array('https://experienceshindig.com/wp-content/uploads/2019/08/sink.png', $venue_requirements)) {echo 'checked="checked"';} ?> class="input-md valid" name="venue_requirements[]" id="reg_venue_requirements[]" value="https://experienceshindig.com/wp-content/uploads/2019/08/sink.png"> Sink</li>
			<li class="dokan-ck-li"><input type="checkbox" <?php if (in_array('https://experienceshindig.com/wp-content/uploads/2019/08/dish-washer.png', $venue_requirements)) {echo 'checked="checked"';} ?> class="input-md valid" name="venue_requirements[]" id="reg_venue_requirements[]" value="https://experienceshindig.com/wp-content/uploads/2019/08/dish-washer.png"> Dishwasher</li>
  			<li class="dokan-ck-li"><input type="checkbox" <?php if (in_array('https://experienceshindig.com/wp-content/uploads/2019/08/stand-mixer.png', $venue_requirements)) {echo 'checked="checked"';} ?> class="input-md valid" name="venue_requirements[]" id="reg_venue_requirements[]" value="https://experienceshindig.com/wp-content/uploads/2019/08/stand-mixer.png"> Stand Mixer</li>
 		    <li class="dokan-ck-li"><input type="checkbox" <?php if (in_array('https://experienceshindig.com/wp-content/uploads/2019/08/refrigerator.png', $venue_requirements)) {echo 'checked="checked"';} ?> class="input-md valid" name="venue_requirements[]" id="reg_venue_requirements[]" value="https://experienceshindig.com/wp-content/uploads/2019/08/refrigerator.png"> Refrigerator</li>
		
        </div>
    </div>
			
    <?php	
	//Specialty Diets
	$specialty_diets = get_field('specialty_diets');
	foreach ($specialty_diets as &$specialty_diet) {
		$specialty_diet = $specialty_diet['value']; 
} ?>

 <div class="dokan-form-group dokan-form-control">
        <label class="form-label dokan-control-label" for="specialty_diets">
            <?php _e( 'Specialty Diets', 'dokan' ); ?>
        </label>
        <div class="dokan-ck">
			<li class="dokan-ck-li"><input type="checkbox" <?php if (in_array('GF', $specialty_diets)) {echo 'checked="checked"';} ?> class="input-md valid" name="specialty_diets[]" id="reg_specialty_diets[]" value="GF"> Gluten Free</li>
  			<li class="dokan-ck-li"><input type="checkbox" <?php if (in_array('NF', $specialty_diets)) {echo 'checked="checked"';} ?> class="input-md valid" name="specialty_diets[]" id="reg_specialty_diets[]" value="NF"> Nut Free</li>
 		    <li class="dokan-ck-li"><input type="checkbox" <?php if (in_array('DF', $specialty_diets)) {echo 'checked="checked"';} ?> class="input-md valid" name="specialty_diets[]" id="reg_specialty_diets[]" value="DF"> Dairy Free</li>
			<li class="dokan-ck-li"><input type="checkbox" <?php if (in_array('CF', $specialty_diets)) {echo 'checked="checked"';} ?> class="input-md valid" name="specialty_diets[]" id="reg_specialty_diets[]" value="CF"> Corn Free</li>
			<li class="dokan-ck-li"><input type="checkbox" <?php if (in_array('Veg', $specialty_diets)) {echo 'checked="checked"';} ?> class="input-md valid" name="specialty_diets[]" id="reg_specialty_diets[]" value="Veg"> Vegetarian</li>
			<li class="dokan-ck-li"><input type="checkbox" <?php if (in_array('V', $specialty_diets)) {echo 'checked="checked"';} ?> class="input-md valid" name="specialty_diets[]" id="reg_specialty_diets[]" value="V"> Vegan</li>
        </div>
    </div>
    <?php		
	//Serving style
	$serving_styles = get_field('serving_styles');
	foreach ($serving_styles as &$serving_style) {
		$serving_style = $serving_style['value']; 
} ?>
 <div class="dokan-form-group dokan-form-control">
        <label class="form-label dokan-control-label" for="serving_styles">
            <?php _e( 'Serving Styles', 'dokan' ); ?>
        </label>
        <div class="dokan-ck">
			<li class="dokan-ck-li"><input type="checkbox" <?php if (in_array('Drop-off/Set-up/Pick-up', $serving_styles)) {echo 'checked="checked"';} ?> class="input-md valid" name="serving_styles[]" id="reg_serving_styles[]" value="Drop-off/Set-up/Pick-up"> Drop-off/Set-up/Pick-up</li>
  			<li class="dokan-ck-li"><input type="checkbox" <?php if (in_array('Full Service', $serving_styles)) {echo 'checked="checked"';} ?> class="input-md valid" name="serving_styles[]" id="reg_serving_styles[]" value="Full Service"> Full Service</li>
        </div>
    </div>
    <?php
	//Alcohol Pairings
	$alcohol_pairings = get_field('alcohol_pairings');
	foreach ($alcohol_pairings as &$alcohol_pairing) {
		$alcohol_pairing = $alcohol_pairing['value']; 
} ?>
 <div class="dokan-form-group">
        <label class="form-label dokan-control-label" for="alcohol_pairings">
            <?php _e( 'Alcohol Pairings', 'dokan' ); ?>
        </label>
        <div class="dokan-ck">
            <li class="dokan-ck-li"><input type="checkbox" <?php if (in_array('Wine', $alcohol_pairings)) {echo 'checked="checked"';} ?> class="input-md valid" name="alcohol_pairings[]" id="reg_alcohol_pairings[]" value="Wine"> Wine</li>
  			<li class="dokan-ck-li"><input type="checkbox" <?php if (in_array('Beer', $alcohol_pairings)) {echo 'checked="checked"';} ?> class="input-md valid" name="alcohol_pairings[]" id="reg_alcohol_pairings[]" value="Beer"> Beer</li>
 		    <li class="dokan-ck-li"><input type="checkbox" <?php if (in_array('Cocktails', $alcohol_pairings)) {echo 'checked="checked"';} ?> class="input-md valid" name="alcohol_pairings[]" id="reg_alcohol_pairings[]" value="Cocktails"> Cocktails</li>
        </div>
    </div>
    <?php
//other_options
	$other_options = get_field('other_options');
	foreach ($other_options as &$other_option) {
		$other_option = $other_option['value']; 
} ?>
 <div class="dokan-form-group dokan-form-control">
        <label class="form-label dokan-control-label" for="other_options">
            <?php _e( 'Other Options', 'dokan' ); ?>
        </label>
        <div class="dokan-ck">
			<li class="dokan-ck-li"><input type="checkbox" <?php if (in_array('https://experienceshindig.com/wp-content/uploads/2019/08/CleanDishes.png', $other_options)) {echo 'checked="checked"';} ?> class="input-md valid" name="other_options[]" id="reg_other_options[]" value="https://experienceshindig.com/wp-content/uploads/2019/08/CleanDishes.png"> Clean-Up Included</li>
  			<li class="dokan-ck-li"><input type="checkbox" <?php if (in_array('https://experienceshindig.com/wp-content/uploads/2019/08/tasks-solid.png', $other_options)) {echo 'checked="checked"';} ?> class="input-md valid" name="other_options[]" id="reg_other_options[]" value="https://experienceshindig.com/wp-content/uploads/2019/08/tasks-solid.png"> Set-Up Included</li>
        </div>
    </div>
    <?php
	}
