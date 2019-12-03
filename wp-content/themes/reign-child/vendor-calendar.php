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

?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<div class="dokan-dashboard-wrap">
		<?php



				/**
				 *  dokan_dashboard_content_before hook
				 *
				 *  @hooked get_dashboard_side_navigation
				 *
				 *  @since 2.4
				 */

				do_action( 'dokan_dashboard_content_before' );
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
						do_action( 'dokan_menu_content_inside_before' );
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

	 if($_POST){
	 	// Format dates into ranges

	 	// Delete all existing rows on author

	 	// Save ACF repeater field on author

	 	// Get all shindigs

	 	// Delete all existing blocks on shindigs

	 	// Add new blocks from posted data


					 $data = array(
								'post_title'  => $_POST['chef_name'],
								'post_content'  => $_POST['chef_bio'],
								'post_type'  => 'chefs',
								'post_category' =>   $post_cat,
								'post_status'  => 'publish'
								);

					 $post_id = wp_insert_post($data);
					 update_field( 'availability', $_POST['chef_date_from'], $post_id );
					 update_field( 'to', $_POST['chef_date_to'], $post_id );

					 $message = 'Chef has been inserted';
					 $alert = 'alert-success';
	 }
		 if($_GET && isset($_GET['destroy_post'])){
				wp_delete_post($_GET['destroy_post']);
					$message = 'Chef has been deleted';
					$alert = 'alert-success';
		}
	 //GET POST DATA
	 $args = array(
			 'posts_per_page' => -1 ,
			 'post_type'      => 'chefs',
			 'author' => $user_id
			 );
		$chef_data = get_posts( $args );
		//GET POST DATA
	 ?>

	<div id="tab-1" class="tab-content current">

			<?php
			if($_POST){
			?>
			<div class="alert <?=$alert?> alert-dismissible" style="margin-top: 5px">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong><?=$message?></strong>
				</div>
				<?php
			}
			?>
		 <div class="add-new-cheff-section">
				 <form method='POST' enctype="multipart/form-data" id="vendor_calendar">
				 	<?php
				 	$i = 0;
				 	$dates = get_field( 'unavailable_dates', wp_get_current_user() );
				 	if($dates) {
				 		$sortable_dates = array();
				 		$date_now = new DateTime();
				 		foreach ($dates as $a_date) {
				 			$date2 = new DateTime($a_date['to']);
			 				if($date2 >= $date_now ) {
			 					$sortable_dates[$a_date['from']] = $a_date['to'];
			 				}
			 			}
			 			ksort($sortable_dates);
			 			if(!empty($sortable_dates)) {
				 		?>
				 			<h4>Existing Blocked Dates</h4>
				 			<?php
				 			foreach ($sortable_dates as $date_from => $date_to) {
				 				$i++;
				 				$from_formatted = date("m/d/Y", strtotime($date_from));
				 				$to_formatted = date("m/d/Y", strtotime($date_to));
				 				?>
					 			<div class='dokan-form-group range-container'>
					 				<input type='hidden' name='wc_booking_availability_dates[<?=$i?>][from]' class='from from-<?=$i?>' value='<?php echo $date_from ?>' />
					 				<input type='hidden' name='wc_booking_availability_dates[<?=$i?>][to]' class='to to-<?=$i?>' value='<?php echo $date_to ?>' />
					 				<input style='display:inline;' type='text' class='dokan-form-control daterange' data-i="<?=$i?>" value='<?php echo "{$from_formatted} - {$to_formatted}"?> ' />
					 				<a href='#' title='Remove'>X</a>
					 			</div>
				 			<?php } ?>
				 	<?php } ?>

					<?php } ?>
						  <div class="">
						 		<label>Add new blocked dates</label>
						 		 <div class='dokan-form-group range-container'>
						 				<input type='hidden' name='wc_booking_availability_dates[<?=$i?>][from]' />
						 				<input type='hidden' name='wc_booking_availability_dates[<?=$i?>][to]' />
						 				<input type='text' class="dokan-form-control daterange">
						 		 </div>
						  </div>
						  <input type='submit' value='Save' />
				 </form>
		 </div>
	</div>

</div><!-- container -->

<script>
					$('.daterange').daterangepicker({
					    "autoApply": true,
					    "parentEl": "body",
					    "minDate": moment(),
					    "opens": "left"
					}, function(start, end, label) {
					  console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
					});

</script>


				</article><!-- .dashboard-content-area -->

				 <?php
						/**
						 *  dokan_dashboard_content_inside_after hook
						 *
						 *  @since 2.4
						 */
						do_action( 'dokan_dashboard_content_inside_after' );
				?>


		</div><!-- .dokan-dashboard-content -->

		<?php
				/**
				 *  dokan_dashboard_content_after hook
				 *
				 *  @since 2.4
				 */
				do_action( 'dokan_dashboard_content_after' );
		?>

</div><!-- .dokan-dashboard-wrap -->

</div>


<?php get_footer(); ?>
