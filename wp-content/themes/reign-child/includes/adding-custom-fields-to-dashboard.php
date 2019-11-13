<?php

/**
 * Adding Custom Fields to Dashboard "Add Shindig"
 */
## ---- 1. Backend ---- ##

// Add the content to the custom tab in edit product page settings
add_action( 'woocommerce_product_options_general_product_data', 'product_data_fields' );
function product_data_fields() {
    global $post;

    echo '<style>fieldset.form-field._input_radio_field > legend{float:none;}</style>
        <div id="shipping_costs_product_data" class="panel woocommerce_options_panel">';

    // Checkbox field 1
    woocommerce_wp_checkbox( array(
        'id'            => '_input_checkbox1',
        'wrapper_class' => 'show_if_simple',
        'label'         => __( 'Input checkbox Label 1' ),
        'description'   => __( 'Input checkbox Description 1' )
    ) );

    // Checkbox field 2
    woocommerce_wp_checkbox( array(
        'id'            => '_input_checkbox2',
        'wrapper_class' => 'show_if_simple',
        'label'         => __( 'Input checkbox Label 2' ),
        'description'   => __( 'Input checkbox Description 2' )
    ) );

    // Checkbox field 3
    woocommerce_wp_checkbox( array(
        'id'            => '_input_checkbox3',
        'wrapper_class' => 'show_if_simple',
        'label'         => __( 'Input checkbox Label 3' ),
        'description'   => __( 'Input checkbox Description 3' )
    ) );

    // Radio Buttons field
    woocommerce_wp_radio( array(
        'id'            => '_input_radio',
        'wrapper_class' => 'show_if_simple',
        'label'         => __('Delivery Period'),
        'description'   => __( 'Delivery Period Description' ).'<br>',
        'options'       => array(
            '-5 days'       => __('Less than 5 days'),
            '10 days'       => __('10 days'),
            '15 days'       => __('15 days'),
            '30 days'       => __('30 days'),
        )
    ) );

    echo '</div>';
}

// Save the data of the custom tab in edit product page settings
add_action( 'woocommerce_process_product_meta',   'shipping_costs_process_product_meta_fields_save' );
function shipping_costs_process_product_meta_fields_save( $post_id ){
    // save the checkbox field 1 data
    $wc_checkbox = isset( $_POST['_input_checkbox1'] ) ? 'yes' : 'no';
    update_post_meta( $post_id, '_input_checkbox1', $wc_checkbox );

    // save the checkbox field 2 data
    $wc_checkbox = isset( $_POST['_input_checkbox2'] ) ? 'yes' : 'no';
    update_post_meta( $post_id, '_input_checkbox2', $wc_checkbox );

    // save the checkbox field 3 data
    $wc_checkbox = isset( $_POST['_input_checkbox3'] ) ? 'yes' : 'no';
    update_post_meta( $post_id, '_input_checkbox3', $wc_checkbox );

    // save the radio button field data
    $wc_radio = isset( $_POST['_input_radio'] ) ? $_POST['_input_radio'] : '';
    update_post_meta( $post_id, '_input_radio', $wc_radio );
}


## ---- 2. Front end ---- ##

// Add a custom tab in single product pages
add_filter( 'woocommerce_product_tabs', 'custom_product_tab' );
function custom_product_tab( $tabs ) {

    $tabs['cust_tab'] = array(
        'title'     => __( 'Extra Product Info', 'woocommerce' ),
        'priority'  => 50,
        'callback'  => 'custom_product_tab_content',
    );

    return $tabs;
}

// Add the content inside the custom tab in single product pages
function custom_product_tab_content()  {
    global $post;

    $output = '<div class="custom-data">';

    ## 1. The Chekboxes (3)

    $checkbox1 = get_post_meta( $post->ID, '_input_checkbox1', true ); // Get the data - Checbox 1
    if( ! empty( $checkbox1 ) && $checkbox1 == 'yes' )
        $text_to_display = __('is "Selected"');
    else
        $text_to_display = __('is "NOT Selected"');
    $output .= '<p>'. __('Input checkbox:').' <span style="color:#96588a;">'.$text_to_display.'</span></p>';

    $checkbox2 = get_post_meta( $post->ID, '_input_checkbox2', true ); // Get the data - Checbox 2
    if( ! empty( $checkbox2 ) && $checkbox2 == 'yes' )
        $text_to_display = __('is "Selected"');
    else
        $text_to_display = __('is "NOT Selected"');
    $output .= '<p>'. __('Input checkbox:').' <span style="color:#96588a;">'.$text_to_display.'</span></p>';

    $checkbox3 = get_post_meta( $post->ID, '_input_checkbox3', true ); // Get the data - Checbox 3
    if( ! empty( $checkbox3 ) && $checkbox3 == 'yes' )
        $text_to_display = __('is "Selected"');
    else
        $text_to_display = __('is "NOT Selected"');
    $output .= '<p>'. __('Input checkbox:').' <span style="color:#96588a;">'.$text_to_display.'</span></p>';

    ## 2. Radio buttons

    $radio = get_post_meta( $post->ID, '_input_radio', true ); // Get the data
    if( ! empty( $radio ) )
        $output .= '<p>'. __('Delivery Period: ').'<span style="color:#96588a;">'.$radio.'</span></p>';
    else
        $output .= '<p>'. __('Delivery Period: ').'<span style="color:#96588a;">'.__('Not defined').'</span></p>';

    echo $output.'</div>';
}
