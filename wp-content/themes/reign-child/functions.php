<?php


require_once(__DIR__.'/includes/search_shortcode.php');
require_once(__DIR__.'/includes/add-category-to-shop-loop.php');
require_once(__DIR__.'/includes/adding-custom-fields-to-dashboard.php');
require_once(__DIR__.'/includes/change-add-to-cart-text.php');
require_once(__DIR__.'/includes/shindig-page-hooks.php');
require_once(__DIR__.'/includes/toggle-jquery.php');
require_once(__DIR__.'/includes/edits-to-vendor-dashboard-menu.php');
require_once(__DIR__.'/includes/vendor-form.php');


add_action( 'wp_enqueue_scripts', 'reign_child_enqueue_styles' );
function reign_child_enqueue_styles() {
    $parent_style = 'reign_style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/assets/css/main.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    wp_register_script('custom', get_stylesheet_directory_uri().'/js/custom.js');
    wp_enqueue_script('custom');
}
function alter_on_board($steps) {
	// var_dump($_GET);
	if(isset($_GET['page']) && $_GET['page'] === 'dokan-seller-setup'){
		echo 'on onboarding';
	}
	return $steps;
}
add_filter('dokan-seller-setup', 'alter_on_board');
// add_action( 'admin_head', 'alter_on_board' );


function shindig_add_product_to_search($form) {
	$form = substr($form, 0, -7 ). "<input type='hidden' name='post_type' value='product'/></form>";
	return $form;
}
add_filter('get_search_form', 'shindig_add_product_to_search');

function shindig_hide_onboarding_callback($content){
	ob_start();
	?>
	<style>
		input.dokan-form-control[name="settings[bank][swift]"],
		input.dokan-form-control[name="settings[bank][iban]"]{
			display:none;
		}
	</style>
	<?php
	$style = ob_get_clean();
	echo $style;
	return $content;
}

add_filter( 'dokan_withdraw_methods', 'shindig_hide_onboarding_callback', 12 );

//add Dokan Tab for Menu

add_filter( 'dokan_query_var_filter', 'dokan_load_document_menu' );
function dokan_load_document_menu( $query_vars ) {
    $query_vars['menus'] = 'menus';
	$query_vars['chefs'] = 'chefs';

	$query_vars['calendar'] = 'calendar';
    return $query_vars;

}
add_filter( 'dokan_get_dashboard_nav', 'dokan_add_menus_menu' );
function dokan_add_menus_menu( $urls ) {
    $urls['menus'] = array(
        'title' => __( 'Menu & Services', 'dokan'),
        'icon'  => '<i class="fa fa-cutlery"></i>',
        'url'   => dokan_get_navigation_url( 'menus' ),
        'pos'   => 51
    );
 
/*  Not using Per-Chef functionality right now, currently broken
	$urls['chefs'] = array(
        'title' => __( 'Our Chefs', 'dokan'),
        'icon'  => '<i class="fa fa-users"></i>',
        'url'   => dokan_get_navigation_url( 'chefs' ),
        'pos'   => 51
    );*/
	$urls['calendar'] = array(
        'title' => __( 'Calendar', 'dokan'),
        'icon'  => '<i class="fa fa-calendar"></i>',
        'url'   => dokan_get_navigation_url( 'calendar' ),
        'pos'   => 51
    );

    return $urls;
}
add_action( 'dokan_load_custom_template', 'dokan_load_template' );
function dokan_load_template( $query_vars ) {
    if ( isset( $query_vars['menus'] ) ) {
        require_once dirname( __FILE__ ). '/menu.php';

    }

	if ( isset( $query_vars['chefs'] ) ) {
        require_once dirname( __FILE__ ). '/vendor-chefs.php';
        exit();
    }
	if ( isset( $query_vars['calendar'] ) ) {
        require_once dirname( __FILE__ ). '/vendor-calendar.php';
        exit();
    }
}
/**
 * Removes the original author meta box and replaces it
 * with a customized version.
 */
add_action( 'add_meta_boxes', 'wpse_replace_post_author_meta_box' );
function wpse_replace_post_author_meta_box() {
    $post_type = get_post_type();
    $post_type_object = get_post_type_object( $post_type );

    if ( post_type_supports( $post_type, 'author' ) ) {
        if ( is_super_admin() || current_user_can( $post_type_object->cap->edit_others_posts ) ) {
            remove_meta_box( 'authordiv', $post_type, 'core' );
            add_meta_box( 'authordiv', __( 'Author', 'text-domain' ), 'wpse_post_author_meta_box', null, 'normal' );
        }
    }
}

/**
 * Display form field with list of authors.
 * Modified version of post_author_meta_box().
 *
 * @global int $user_ID
 *
 * @param object $post
 */

function wpse_post_author_meta_box( $post ) {
    global $user_ID;
?>
<label class="screen-reader-text" for="post_author_override"><?php _e( 'Author', 'text-domain' ); ?></label>
<?php
    wp_dropdown_users( array(
        'role__in' => [ 'administrator', 'author', 'vendor', 'seller' ], // Add desired roles here.
        'name' => 'post_author_override',
        'selected' => empty( $post->ID ) ? $user_ID : $post->post_author,
        'include_selected' => true,
        'show' => 'display_name_with_login',
    ) );
}
function insert_attachment($file_handler,$post_id,$setthumb='false') {
    // check to make sure its a successful upload
    if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();
    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');
    $attach_id = media_handle_upload( $file_handler, $post_id );
    if ($setthumb) update_post_meta($post_id,'_thumbnail_id',$attach_id);
    return $attach_id;
}


/*14-11-2019 NN Start*/

/* Bypass logout confirmation.*/
function iconic_bypass_logout_confirmation() {
	global $wp;

	if ( isset( $wp->query_vars['customer-logout'] ) ) {
		wp_redirect( str_replace( '&amp;', '&', wp_logout_url( wc_get_page_permalink( 'myaccount' ) ) ) );
		exit;
	}
}

add_action( 'template_redirect', 'iconic_bypass_logout_confirmation' );

/*14-11-2019 NN end*/

add_action( 'customize_register', 'prefix_remove_css_section', 15 );
/**
 * Remove the additional CSS section, introduced in 4.7, from the Customizer.
 * @param $wp_customize WP_Customize_Manager
 */
function prefix_remove_css_section( $wp_customize ) {
	// $wp_customize->remove_section( 'custom_css' );
}

add_filter( 'woocommerce_product_tabs', '_remove_reviews_tab', 98 );
function _remove_reviews_tab( $tabs ) {
    unset( $tabs[ 'reviews' ] );
    return $tabs;
}

add_action( 'woocommerce_after_single_product_summary', '_show_reviews', 15 );
function _show_reviews() {
    comments_template();
}
