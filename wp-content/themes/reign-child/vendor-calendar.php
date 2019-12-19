<?php get_header()
/**
 *  Dokan Dashboard Template
 *
 *  Dokan template for vendor calendar
 *
 *  @since 2.4
 *
 *  @package dokan
 */

/**
 *  This page will pull blocked dates stored in an ACF repeater with the current user.
 *  It will then allow those dates to be removed or have a new row added. On save this
 *  will be saved with the user, and then propagated out to each of the user's shindigs
 */

?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>

<div class="dokan-dashboard-wrap">
<?php

/**
 *  dokan_dashboard_content_before hook
 *
 *  @hooked get_dashboard_side_navigation
 *
 *  @since 2.4
 */

do_action('dokan_dashboard_content_before');
?>

<div class="dokan-dashboard-content">

<?php
/**
 *  dokan_dashboard_content_before hook
 *
 *  @hooked show_seller_dashboard_notice
 *
 *  @since 2.4
 */
do_action('dokan_menu_content_inside_before');
?>
<style>
	.daterangepicker th, .daterangepicker td {
	  padding: 0;
	}
	.range-container {
		max-width:300px;
	}

</style>

<article class="menu-content-area">
	<header class="dokan-dashboard-header">
		<h1 class="entry-title">Calendar</h1>
	</header>



	<div class="contain">

<?php

$user_id = get_current_user_id();
$message = '';
$alert = '';

if ($_POST) {

    // Delete all existing rows on author
    delete_field('unavailable_dates', wp_get_current_user());

    foreach ($_POST['blocked_dates'] as $a_block) {
        if (!$a_block['to'] || strtotime($a_block['to']) == false) {
            continue;
        }
        if (!$a_block['from'] || strtotime($a_block['from']) == false) {
            continue;
        }
        // Save ACF repeater field on author
        $saved = add_row('unavailable_dates', $a_block, wp_get_current_user());
        // Prep for saving into product
        $availability[] = array(
            'type' => 'custom',
            'bookable' => 'no',
            'priority' => 10,
            'to' => date('Y-m-d', strtotime(wc_clean($a_block['to']))),
            'from' => date('Y-m-d', strtotime(wc_clean($a_block['from']))),
        );
    }

    // Save min days and max months
    update_field( 'min_days_out', $_POST['min_days_out'], wp_get_current_user());
    update_field( 'max_months_out', $_POST['max_months_out'], wp_get_current_user());

    // Get all shindigs
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'product',
        'author' => $user_id,
    );
    $shindigs = get_posts($args);

    foreach ($shindigs as $shindig) {
    	// Replace all existing blocks on shindigs
        $updated = update_post_meta($shindig->ID, '_wc_booking_availability', $availability);

        // Replace min days out
        update_post_meta($shindig->ID, '_wc_booking_min_date_unit', 'day');
        update_post_meta($shindig->ID, '_wc_booking_min_date', $_POST['min_days_out']);

        update_post_meta($shindig->ID, '_wc_booking_max_date_unit', 'month');
        update_post_meta($shindig->ID, '_wc_booking_max_date', $_POST['max_months_out']);

        // Replace max days out
    }

    $message = 'Calendar has been updated';
    $alert = 'alert-success';
}

?>

	<div id="tab-1" class="tab-content current">

<?php if ($_POST) { ?>
		<div class="alert <?=$alert?> alert-dismissible" style="margin-top: 5px">
				<strong><?=$message?></strong>
		</div>
<?php } ?>
		 <div class="add-new-cheff-section">
			<form method='POST' enctype="multipart/form-data" id="vendor_calendar">
<?php
$i = 0;
$dates = get_field('unavailable_dates', wp_get_current_user());

if ($dates) {
    $sortable_dates = array();
    $date_now = new DateTime();
    foreach ($dates as $a_date) {
        $date2 = new DateTime($a_date['to']);
        if ($date2 >= $date_now) {
            $sortable_dates[$a_date['from']] = $a_date['to'];
        }
    }
    ksort($sortable_dates);
    if (!empty($sortable_dates)) {  ?>
		<h4>Existing Blocked Dates</h4>
<?php
foreach ($sortable_dates as $date_from => $date_to) {
    $from_formatted = date("m/d/Y", strtotime($date_from));
    $to_formatted = date("m/d/Y", strtotime($date_to));
    ?>
		<div class='dokan-form-group range-container range-container-<?=$i?>'>
			<input type='hidden' name='blocked_dates[<?=$i?>][from]' class='from from-<?=$i?>' value='<?php echo $date_from ?>' />
			<input type='hidden' name='blocked_dates[<?=$i?>][to]' class='to to-<?=$i?>' value='<?php echo $date_to ?>' />
			<input style='display:inline;' type='text' class='dokan-form-control daterange' data-i="<?=$i?>" value='<?php echo "{$from_formatted} - {$to_formatted}" ?> ' />
			<a href='#' title='Remove' class='remove_date' data-i="<?=$i?>">X</a>
		</div>
<?php
$i++;
        }
    }
} ?>
				<div class="">
					<label>Add new blocked dates</label>
					<div class='dokan-form-group range-container'>
						<input type='hidden' name='blocked_dates[<?=$i?>][from]' />
						<input type='hidden' name='blocked_dates[<?=$i?>][to]' />
						<input type='text' class="dokan-form-control daterange" data-i="<?=$i?>">
					</div>
				</div>
<?php
	$min_days_out = get_field('min_days_out', wp_get_current_user());
	$max_months_out = get_field('max_months_out', wp_get_current_user());
?>
				<div>
					<label style='display:block;'>Minimum notice required for booking?</label>
					<input type='number' class='dokan-form-control' name='min_days_out' min='0' max='31' step='1' style='width:65px; display:inline;' value='<?=$min_days_out ? $min_days_out : '7' ?>' /> Days
				</div>
				<div>
					<label style='display:block;'>How far out do you take bookings?</label>
					<input type='number' class='dokan-form-control' name='max_months_out' min='1' max='24' step='1' style='width:65px; display:inline;' value='<?=$max_months_out ? $max_months_out : '12' ?>' /> Months
				</div>
				<input style='margin-top:1em;' type='submit' value='Save' />
			</form>
		 </div>
	</div>

</div><!-- container -->

<script>
	// Iniitalize date range picker
	$('.daterange').daterangepicker({
	    "autoApply": true,
	    "parentEl": "body",
	    "minDate": moment(),
	    "opens": "left"
	}, function(start, end, label) {
	  // console.log('New date range selected: ' + start.format('YYYYMMDD') + ' to ' + end.format('YYYYMMDD') + ' (predefined range: ' + label + ')');
	});

	// On applying a range, populate the separate hidden fields
	// Using the data-i attribute to target the correct inputs
	$('.daterange').on('apply.daterangepicker', function(ev, picker) {
		var i = $(this).data('i');
		$('input[name="blocked_dates['+i+'][from]"]').val(picker.startDate.format('YYYYMMDD'));
		$('input[name="blocked_dates['+i+'][to]"]').val(picker.endDate.format('YYYYMMDD'));
	});

	// Deleting just removes from the DOM
	$('.remove_date').click(function(e) {
		e.preventDefault();
		var i = $(this).data('i');
		$('.range-container-'+i).fadeOut(300, function() {
			$(this).remove();
		});
	});

</script>


</article><!-- .dashboard-content-area -->

<?php
/**
 *  dokan_dashboard_content_inside_after hook
 *
 *  @since 2.4
 */
do_action('dokan_dashboard_content_inside_after');
?>
</div><!-- .dokan-dashboard-content -->

<?php
/**
 *  dokan_dashboard_content_after hook
 *
 *  @since 2.4
 */
do_action('dokan_dashboard_content_after');
?>

</div><!-- .dokan-dashboard-wrap -->

</div>


<?php get_footer();?>
