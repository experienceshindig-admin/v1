<?php

/**
 * Vendor Form
 */
/*Extra field on the seller settings and show the value on the store banner -Dokan*/

// Add extra field in seller settings

add_filter( 'dokan_settings_form_bottom', 'extra_fields', 10, 2);

function extra_fields( $current_user, $profile_info ){
	//URL 
$seller_url= isset( $profile_info['seller_url'] ) ? $profile_info['seller_url'] : '';
?>
 <div class="dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="seller_url">
            <?php _e( 'Website', 'dokan' ); ?>
        </label>
        <div class="dokan-w5">
            <input type="text" class="dokan-form-control input-md valid" name="seller_url" id="reg_seller_url" value="<?php echo $seller_url; ?>" />
        </div>
    </div>
    <?php
	//Distance Radius
	$travel_dist = isset( $profile_info['travel_dist'] ) ? $profile_info['travel_dist'] : '';
?>
 <div class="dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="travel_dist">
            <?php _e( 'Service Distance (miles)', 'dokan' ); ?>
        </label>
        <div class="dokan-w5">
            <input type="number" class="dokan-form-control input-md valid" name="travel_dist" id="reg_travel_dist" value="<?php echo $travel_dist; ?>" />
        </div>
    </div>
    <?php	
			
	//Cuisine Specialties
	$cuisine_spec= isset( $profile_info['cuisine_spec'] ) ? $profile_info['cuisine_spec'] : '';
?>
 <div class="dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="cuisine_spec">
            <?php _e( 'Cuisine Specialties', 'dokan' ); ?>
        </label>
        <div class="dokan-w5">
            <textarea style="white-space: pre-wrap; min-height:150px;" class="input-md valid" name="cuisine_spec" id="reg_cuisine_spec" value="<?php echo $cuisine_spec; ?>"><?php echo $cuisine_spec; ?></textarea>
        </div>
    </div>
    <?php	
			
	//Years of Experience
	$business_since= isset( $profile_info['business_since'] ) ? $profile_info['business_since'] : '';
?>
 <div class="dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="business_since">
            <?php _e( 'Doing Business Since', 'dokan' ); ?>
        </label>
        <div class="dokan-w5">
            <input type="number" class="dokan-form-control input-md valid" name="business_since" id="reg_business_since" value="<?php echo $business_sincev; ?>" />
        </div>
    </div>
    <?php
			
	//Certificates
	$certificates = isset( $profile_info['certificates'] ) ? $profile_info['certificates'] : '';
?>
 <div class="dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="certificates">
            <?php _e( 'Certificates', 'dokan' ); ?>
        </label>
        <div class="dokan-w5">
            <textarea style="min-height:150px;"class="input-md valid" name="certificates" id="reg_certificates" value="<?php echo $certificates; ?>" ><?php echo $certificates; ?></textarea>
        </div>
    </div>
    <?php

	//Response Time
	$response_time = isset( $profile_info['response_time'] ) ? $profile_info['response_time'] : '';
?>
 <div class="dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="response_time">
            <?php _e( 'Response Time', 'dokan' ); ?>
        </label>
        <div class="dokan-w5">
            <input type="text" class="dokan-form-control input-md valid" name="response_time" id="reg_response_time" value="<?php echo $response_time; ?>" />
        </div>
    </div>
    <?php	
	//Service Type
	$service_types = isset( $profile_info['service_type'] ) ? $profile_info['service_type'] : '';
	$service_types_ar = explode(', ', $service_types);
?>
 <div class="dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="service_type">
            <?php _e( 'Service Types', 'dokan' ); ?>
        </label>
        <div class="dokan-w5">
            <input type="checkbox" <?php if (in_array('Drop-off/Set-up/Pick-up', $service_types_ar)) {echo 'checked="checked"';} ?> class="input-md valid" name="service_type[]" id="reg_service_type[]" value="Drop-off/Set-up/Pick-up"> Drop-off/Set-up/Pick-up<br>
  			<input type="checkbox" <?php if (in_array('Full Service', $service_types_ar)) {echo 'checked="checked"';} ?> class="input-md valid" name="service_type[]" id="reg_service_type[]" value="Full Service"> Full Service<br>

        </div>
    </div>
    <?php	
	//Specialty Diets
	$spec_diet = isset( $profile_info['spec_diet'] ) ? $profile_info['spec_diet'] : '';
	$spec_diet_ar = explode(', ', $spec_diet);
?>
 <div class="dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="spec_diet">
            <?php _e( 'Specialty Diets', 'dokan' ); ?>
        </label>
        <div class="dokan-w5">
			<input type="checkbox" <?php if (in_array('Gluten Free', $spec_diet_ar)) {echo 'checked="checked"';} ?> class="input-md valid" name="spec_diet[]" id="reg_spec_diet[]" value="Gluten Free"> Gluten Free<br>
  			<input type="checkbox" <?php if (in_array('Nut Free', $spec_diet_ar)) {echo 'checked="checked"';} ?> class="input-md valid" name="spec_diet[]" id="reg_spec_diet[]" value="Nut Free"> Nut Free<br>
 		    <input type="checkbox" <?php if (in_array('Dairy Free', $spec_diet_ar)) {echo 'checked="checked"';} ?> class="input-md valid" name="spec_diet[]" id="reg_spec_diet[]" value="Dairy Free"> Dairy Free<br>
			<input type="checkbox" <?php if (in_array('Vegetarian', $spec_diet_ar)) {echo 'checked="checked"';} ?> class="input-md valid" name="spec_diet[]" id="reg_spec_diet[]" value="Vegetarian"> Vegetarian<br>
				<input type="checkbox" <?php if (in_array('Vegan', $spec_diet_ar)) {echo 'checked="checked"';} ?> class="input-md valid" name="spec_diet[]" id="reg_spec_diet[]" value="Vegan"> Vegan<br>
        </div>
    </div>
    <?php	
	//Alcohol Pairings
	$alcohol_pairings = isset( $profile_info['alcohol_pairings'] ) ? $profile_info['alcohol_pairings'] : '';
	$alcohol_pairings_ar = explode(', ', $alcohol_pairings);
?>
 <div class="dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="alcohol_pairings">
            <?php _e( 'Alcohol Pairings', 'dokan' ); ?>
        </label>
        <div class="dokan-w5">
            <input type="checkbox" <?php if (in_array('Wine', $alcohol_pairings_ar)) {echo 'checked="checked"';} ?> class="input-md valid" name="alcohol_pairings[]" id="reg_alcohol_pairings[]" value="Wine"> Wine<br>
  			<input type="checkbox" <?php if (in_array('Beer', $alcohol_pairings_ar)) {echo 'checked="checked"';} ?> class="input-md valid" name="alcohol_pairings[]" id="reg_alcohol_pairings[]" value="Beer"> Beer<br>
 		    <input type="checkbox" <?php if (in_array('Cocktails', $alcohol_pairings_ar)) {echo 'checked="checked"';} ?> class="input-md valid" name="alcohol_pairings[]" id="reg_alcohol_pairings[]" value="Cocktails"> Cocktails<br>
        </div>
    </div>
    <?php	

	//Company Values
	$company_values= isset( $profile_info['company_values'] ) ? $profile_info['company_values'] : '';
?>
 <div class="dokan-form-group">
        <label class="dokan-w3 dokan-control-label" for="company_values">
            <?php _e( 'Company Values', 'dokan' ); ?>
        </label>
        <div class="dokan-w5">
            <textarea style="white-space: pre-wrap; min-height:150px;" class="input-md valid" name="company_values" id="reg_company_values" value="<?php echo $company_values; ?>" ><?php echo $company_values; ?></textarea>
        </div>
    </div>
    <?php
}
    //save the field value
add_action( 'dokan_store_profile_saved', 'save_extra_fields', 15 );
function save_extra_fields( $store_id ) {
	//URL
    $dokan_settings = dokan_get_store_info($store_id);
    if ( isset( $_POST['seller_url'] ) ) {
        $dokan_settings['seller_url'] = $_POST['seller_url'];
	}
	//Travel Distance

    if ( isset( $_POST['travel_dist'] ) ) {
        $dokan_settings['travel_dist'] = $_POST['travel_dist'];
	}
		//Cuisine Specialties

    if ( isset( $_POST['cuisine_spec'] ) ) {
        $dokan_settings['cuisine_spec'] = $_POST['cuisine_spec'];
	}

		//Company Values

    if ( isset( $_POST['company_values'] ) ) {
        $dokan_settings['company_values'] = $_POST['company_values'];
	}
		//Years of Experience

    if ( isset( $_POST['business_since'] ) ) {
        $dokan_settings['business_since'] = $_POST['business_since'];
	}
		//Certificates

    if ( isset( $_POST['certificates'] ) ) {
        $dokan_settings['certificates'] = $_POST['certificates'];
	}
		//Response Time

    if ( isset( $_POST['response_time'] ) ) {
        $dokan_settings['response_time'] = $_POST['response_time'];
    }
		//Service Types

    if ( isset( $_POST['service_type'] ) ) {
        $dokan_settings['service_type'] = implode(', ', $_POST['service_type']);
    }
		//Specialty Diets

    if ( isset( $_POST['spec_diet'] ) ) {
        $dokan_settings['spec_diet'] = implode(', ', $_POST['spec_diet']);
    }
		//Alcohol Pairings

    if ( isset( $_POST['alcohol_pairings'] ) ) {
        $dokan_settings['alcohol_pairings'] = implode(', ', $_POST['alcohol_pairings']);
    }
	
 update_user_meta( $store_id, 'dokan_profile_settings', $dokan_settings );
}
   
