<?php get_header()
/**
 *  Dokan Dashboard Template
 *
 *  Dokan Main Dahsboard template for Fron-end
 *
 *  @since 2.4
 *
 *  @package dokan
 */

?>

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<link href='<?php bloginfo("template_url") ?>/packages/core/main.css' rel='stylesheet' />
<link href='<?php bloginfo("template_url") ?>/packages/daygrid/main.css' rel='stylesheet' />
<script src='<?php bloginfo("template_url") ?>/packages/core/main.js'></script>
<script src='<?php bloginfo("template_url") ?>/packages/interaction/main.js'></script>
<script src='<?php bloginfo("template_url") ?>/packages/daygrid/main.js'></script>



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

	  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

  .fc-view-container table {
    overflow: hidden;
    height: 100%;
    /* display: block; */
    width: 100% !important;
    margin-bottom: 0px;
}

tbody.fc-body {
    display: table-row-group !important;
    overflow: hidden !important;
    position: relative;
    clear: both;
    height: 100%;
}

.fc-widget-content .fc-scroller.fc-day-grid-container {
    height: 500px !important;
}

.fc-scroller > .fc-day-grid, .fc-scroller > .fc-time-grid {
    position: relative;
    height: 100% !important;
    width: 100%;
}


.fc-dayGrid-view .fc-body .fc-row {
    min-height: 9em !important;
}

thead.fc-head {
    width: 100%;
}

td.fc-head-container.fc-widget-header {
    width: 100% !important;
}

	.add-new-cheff-section-popup .form-group {
    display: block;
    overflow: hidden;
}

        #availability_4969 {
    background: #eee;
    color: #111111;
    background-color: #fcfcfc;
    border-color: #e4e4e4;
    border: 1px solid #e4e4e5;
    max-width: 600px !important;
    width: 316px;
    height: 41px;
    padding: 5px;
}
.datepicker {
  padding: 4px;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  direction: ltr;
}
.datepicker-inline {
  width: 220px;
}
.datepicker.datepicker-rtl {
  direction: rtl;
}
.datepicker.datepicker-rtl table tr td span {
  float: right;
}
.datepicker-dropdown {
  top: 0;
  left: 0;
}
.datepicker-dropdown:before {
  content: '';
  display: inline-block;
  border-left: 7px solid transparent;
  border-right: 7px solid transparent;
  border-bottom: 7px solid #999999;
  border-top: 0;
  border-bottom-color: rgba(0, 0, 0, 0.2);
  position: absolute;
}
.datepicker-dropdown:after {
  content: '';
  display: inline-block;
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-bottom: 6px solid #ffffff;
  border-top: 0;
  position: absolute;
}
.datepicker-dropdown.datepicker-orient-left:before {
  left: 6px;
}
.datepicker-dropdown.datepicker-orient-left:after {
  left: 7px;
}
.datepicker-dropdown.datepicker-orient-right:before {
  right: 6px;
}
.datepicker-dropdown.datepicker-orient-right:after {
  right: 7px;
}
.datepicker-dropdown.datepicker-orient-bottom:before {
  top: -7px;
}
.datepicker-dropdown.datepicker-orient-bottom:after {
  top: -6px;
}
.datepicker-dropdown.datepicker-orient-top:before {
  bottom: -7px;
  border-bottom: 0;
  border-top: 7px solid #999999;
}
.datepicker-dropdown.datepicker-orient-top:after {
  bottom: -6px;
  border-bottom: 0;
  border-top: 6px solid #ffffff;
}
.datepicker > div {
  display: none;
}
.datepicker table {
  margin: 0;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.datepicker td,
.datepicker th {
  text-align: center;
  width: 20px;
  height: 20px;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  border: none;
}
.table-striped .datepicker table tr td,
.table-striped .datepicker table tr th {
  background-color: transparent;
}
.datepicker table tr td.day:hover,
.datepicker table tr td.day.focused {
  background: #eeeeee;
  cursor: pointer;
}
.datepicker table tr td.old,
.datepicker table tr td.new {
  color: #999999;
}
.datepicker table tr td.disabled,
.datepicker table tr td.disabled:hover {
  background: none;
  color: #999999;
  cursor: default;
}
.datepicker table tr td.highlighted {
  background: #d9edf7;
  border-radius: 0;
}
.datepicker table tr td.today,
.datepicker table tr td.today:hover,
.datepicker table tr td.today.disabled,
.datepicker table tr td.today.disabled:hover {
  background-color: #fde19a;
  background-image: -moz-linear-gradient(to bottom, #fdd49a, #fdf59a);
  background-image: -ms-linear-gradient(to bottom, #fdd49a, #fdf59a);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#fdd49a), to(#fdf59a));
  background-image: -webkit-linear-gradient(to bottom, #fdd49a, #fdf59a);
  background-image: -o-linear-gradient(to bottom, #fdd49a, #fdf59a);
  background-image: linear-gradient(to bottom, #fdd49a, #fdf59a);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#fdd49a', endColorstr='#fdf59a', GradientType=0);
  border-color: #fdf59a #fdf59a #fbed50;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
  color: #000;
}
.datepicker table tr td.today:hover,
.datepicker table tr td.today:hover:hover,
.datepicker table tr td.today.disabled:hover,
.datepicker table tr td.today.disabled:hover:hover,
.datepicker table tr td.today:active,
.datepicker table tr td.today:hover:active,
.datepicker table tr td.today.disabled:active,
.datepicker table tr td.today.disabled:hover:active,
.datepicker table tr td.today.active,
.datepicker table tr td.today:hover.active,
.datepicker table tr td.today.disabled.active,
.datepicker table tr td.today.disabled:hover.active,
.datepicker table tr td.today.disabled,
.datepicker table tr td.today:hover.disabled,
.datepicker table tr td.today.disabled.disabled,
.datepicker table tr td.today.disabled:hover.disabled,
.datepicker table tr td.today[disabled],
.datepicker table tr td.today:hover[disabled],
.datepicker table tr td.today.disabled[disabled],
.datepicker table tr td.today.disabled:hover[disabled] {
  background-color: #fdf59a;
}
.datepicker table tr td.today:active,
.datepicker table tr td.today:hover:active,
.datepicker table tr td.today.disabled:active,
.datepicker table tr td.today.disabled:hover:active,
.datepicker table tr td.today.active,
.datepicker table tr td.today:hover.active,
.datepicker table tr td.today.disabled.active,
.datepicker table tr td.today.disabled:hover.active {
  background-color: #fbf069 \9;
}
.datepicker table tr td.today:hover:hover {
  color: #000;
}
.datepicker table tr td.today.active:hover {
  color: #fff;
}
.datepicker table tr td.range,
.datepicker table tr td.range:hover,
.datepicker table tr td.range.disabled,
.datepicker table tr td.range.disabled:hover {
  background: #eeeeee;
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0;
}
.datepicker table tr td.range.today,
.datepicker table tr td.range.today:hover,
.datepicker table tr td.range.today.disabled,
.datepicker table tr td.range.today.disabled:hover {
  background-color: #f3d17a;
  background-image: -moz-linear-gradient(to bottom, #f3c17a, #f3e97a);
  background-image: -ms-linear-gradient(to bottom, #f3c17a, #f3e97a);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#f3c17a), to(#f3e97a));
  background-image: -webkit-linear-gradient(to bottom, #f3c17a, #f3e97a);
  background-image: -o-linear-gradient(to bottom, #f3c17a, #f3e97a);
  background-image: linear-gradient(to bottom, #f3c17a, #f3e97a);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f3c17a', endColorstr='#f3e97a', GradientType=0);
  border-color: #f3e97a #f3e97a #edde34;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0;
}
.datepicker table tr td.range.today:hover,
.datepicker table tr td.range.today:hover:hover,
.datepicker table tr td.range.today.disabled:hover,
.datepicker table tr td.range.today.disabled:hover:hover,
.datepicker table tr td.range.today:active,
.datepicker table tr td.range.today:hover:active,
.datepicker table tr td.range.today.disabled:active,
.datepicker table tr td.range.today.disabled:hover:active,
.datepicker table tr td.range.today.active,
.datepicker table tr td.range.today:hover.active,
.datepicker table tr td.range.today.disabled.active,
.datepicker table tr td.range.today.disabled:hover.active,
.datepicker table tr td.range.today.disabled,
.datepicker table tr td.range.today:hover.disabled,
.datepicker table tr td.range.today.disabled.disabled,
.datepicker table tr td.range.today.disabled:hover.disabled,
.datepicker table tr td.range.today[disabled],
.datepicker table tr td.range.today:hover[disabled],
.datepicker table tr td.range.today.disabled[disabled],
.datepicker table tr td.range.today.disabled:hover[disabled] {
  background-color: #f3e97a;
}
.datepicker table tr td.range.today:active,
.datepicker table tr td.range.today:hover:active,
.datepicker table tr td.range.today.disabled:active,
.datepicker table tr td.range.today.disabled:hover:active,
.datepicker table tr td.range.today.active,
.datepicker table tr td.range.today:hover.active,
.datepicker table tr td.range.today.disabled.active,
.datepicker table tr td.range.today.disabled:hover.active {
  background-color: #efe24b \9;
}
.datepicker table tr td.selected,
.datepicker table tr td.selected:hover,
.datepicker table tr td.selected.disabled,
.datepicker table tr td.selected.disabled:hover {
  background-color: #9e9e9e;
  background-image: -moz-linear-gradient(to bottom, #b3b3b3, #808080);
  background-image: -ms-linear-gradient(to bottom, #b3b3b3, #808080);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#b3b3b3), to(#808080));
  background-image: -webkit-linear-gradient(to bottom, #b3b3b3, #808080);
  background-image: -o-linear-gradient(to bottom, #b3b3b3, #808080);
  background-image: linear-gradient(to bottom, #b3b3b3, #808080);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#b3b3b3', endColorstr='#808080', GradientType=0);
  border-color: #808080 #808080 #595959;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
  color: #fff;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}
.datepicker table tr td.selected:hover,
.datepicker table tr td.selected:hover:hover,
.datepicker table tr td.selected.disabled:hover,
.datepicker table tr td.selected.disabled:hover:hover,
.datepicker table tr td.selected:active,
.datepicker table tr td.selected:hover:active,
.datepicker table tr td.selected.disabled:active,
.datepicker table tr td.selected.disabled:hover:active,
.datepicker table tr td.selected.active,
.datepicker table tr td.selected:hover.active,
.datepicker table tr td.selected.disabled.active,
.datepicker table tr td.selected.disabled:hover.active,
.datepicker table tr td.selected.disabled,
.datepicker table tr td.selected:hover.disabled,
.datepicker table tr td.selected.disabled.disabled,
.datepicker table tr td.selected.disabled:hover.disabled,
.datepicker table tr td.selected[disabled],
.datepicker table tr td.selected:hover[disabled],
.datepicker table tr td.selected.disabled[disabled],
.datepicker table tr td.selected.disabled:hover[disabled] {
  background-color: #808080;
}
.datepicker table tr td.selected:active,
.datepicker table tr td.selected:hover:active,
.datepicker table tr td.selected.disabled:active,
.datepicker table tr td.selected.disabled:hover:active,
.datepicker table tr td.selected.active,
.datepicker table tr td.selected:hover.active,
.datepicker table tr td.selected.disabled.active,
.datepicker table tr td.selected.disabled:hover.active {
  background-color: #666666 \9;
}
.datepicker table tr td.active,
.datepicker table tr td.active:hover,
.datepicker table tr td.active.disabled,
.datepicker table tr td.active.disabled:hover {
  background-color: #006dcc;
  background-image: -moz-linear-gradient(to bottom, #0088cc, #0044cc);
  background-image: -ms-linear-gradient(to bottom, #0088cc, #0044cc);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0044cc));
  background-image: -webkit-linear-gradient(to bottom, #0088cc, #0044cc);
  background-image: -o-linear-gradient(to bottom, #0088cc, #0044cc);
  background-image: linear-gradient(to bottom, #0088cc, #0044cc);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0088cc', endColorstr='#0044cc', GradientType=0);
  border-color: #0044cc #0044cc #002a80;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
  color: #fff;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}
.datepicker table tr td.active:hover,
.datepicker table tr td.active:hover:hover,
.datepicker table tr td.active.disabled:hover,
.datepicker table tr td.active.disabled:hover:hover,
.datepicker table tr td.active:active,
.datepicker table tr td.active:hover:active,
.datepicker table tr td.active.disabled:active,
.datepicker table tr td.active.disabled:hover:active,
.datepicker table tr td.active.active,
.datepicker table tr td.active:hover.active,
.datepicker table tr td.active.disabled.active,
.datepicker table tr td.active.disabled:hover.active,
.datepicker table tr td.active.disabled,
.datepicker table tr td.active:hover.disabled,
.datepicker table tr td.active.disabled.disabled,
.datepicker table tr td.active.disabled:hover.disabled,
.datepicker table tr td.active[disabled],
.datepicker table tr td.active:hover[disabled],
.datepicker table tr td.active.disabled[disabled],
.datepicker table tr td.active.disabled:hover[disabled] {
  background-color: #0044cc;
}
.datepicker table tr td.active:active,
.datepicker table tr td.active:hover:active,
.datepicker table tr td.active.disabled:active,
.datepicker table tr td.active.disabled:hover:active,
.datepicker table tr td.active.active,
.datepicker table tr td.active:hover.active,
.datepicker table tr td.active.disabled.active,
.datepicker table tr td.active.disabled:hover.active {
  background-color: #003399 \9;
}
.datepicker table tr td span {
  display: block;
  width: 23%;
  height: 54px;
  line-height: 54px;
  float: left;
  margin: 1%;
  cursor: pointer;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
}
.datepicker table tr td span:hover {
  background: #eeeeee;
}
.datepicker table tr td span.disabled,
.datepicker table tr td span.disabled:hover {
  background: none;
  color: #999999;
  cursor: default;
}
.datepicker table tr td span.active,
.datepicker table tr td span.active:hover,
.datepicker table tr td span.active.disabled,
.datepicker table tr td span.active.disabled:hover {
  background-color: #006dcc;
  background-image: -moz-linear-gradient(to bottom, #0088cc, #0044cc);
  background-image: -ms-linear-gradient(to bottom, #0088cc, #0044cc);
  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0044cc));
  background-image: -webkit-linear-gradient(to bottom, #0088cc, #0044cc);
  background-image: -o-linear-gradient(to bottom, #0088cc, #0044cc);
  background-image: linear-gradient(to bottom, #0088cc, #0044cc);
  background-repeat: repeat-x;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0088cc', endColorstr='#0044cc', GradientType=0);
  border-color: #0044cc #0044cc #002a80;
  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
  filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
  color: #fff;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
}
.datepicker table tr td span.active:hover,
.datepicker table tr td span.active:hover:hover,
.datepicker table tr td span.active.disabled:hover,
.datepicker table tr td span.active.disabled:hover:hover,
.datepicker table tr td span.active:active,
.datepicker table tr td span.active:hover:active,
.datepicker table tr td span.active.disabled:active,
.datepicker table tr td span.active.disabled:hover:active,
.datepicker table tr td span.active.active,
.datepicker table tr td span.active:hover.active,
.datepicker table tr td span.active.disabled.active,
.datepicker table tr td span.active.disabled:hover.active,
.datepicker table tr td span.active.disabled,
.datepicker table tr td span.active:hover.disabled,
.datepicker table tr td span.active.disabled.disabled,
.datepicker table tr td span.active.disabled:hover.disabled,
.datepicker table tr td span.active[disabled],
.datepicker table tr td span.active:hover[disabled],
.datepicker table tr td span.active.disabled[disabled],
.datepicker table tr td span.active.disabled:hover[disabled] {
  background-color: #0044cc;
}
.datepicker table tr td span.active:active,
.datepicker table tr td span.active:hover:active,
.datepicker table tr td span.active.disabled:active,
.datepicker table tr td span.active.disabled:hover:active,
.datepicker table tr td span.active.active,
.datepicker table tr td span.active:hover.active,
.datepicker table tr td span.active.disabled.active,
.datepicker table tr td span.active.disabled:hover.active {
  background-color: #003399 \9;
}
.datepicker table tr td span.old,
.datepicker table tr td span.new {
  color: #999999;
}
.datepicker .datepicker-switch {
  width: 145px;
}
.datepicker .datepicker-switch,
.datepicker .prev,
.datepicker .next,
.datepicker tfoot tr th {
  cursor: pointer;
}
.datepicker .datepicker-switch:hover,
.datepicker .prev:hover,
.datepicker .next:hover,
.datepicker tfoot tr th:hover {
  background: #eeeeee;
}
.datepicker .cw {
  font-size: 10px;
  width: 12px;
  padding: 0 2px 0 5px;
  vertical-align: middle;
}
.input-append.date .add-on,
.input-prepend.date .add-on {
  cursor: pointer;
}
.input-append.date .add-on i,
.input-prepend.date .add-on i {
  margin-top: 3px;
}
.input-daterange input {
  text-align: center;
}
.input-daterange input:first-child {
  -webkit-border-radius: 3px 0 0 3px;
  -moz-border-radius: 3px 0 0 3px;
  border-radius: 3px 0 0 3px;
}
.input-daterange input:last-child {
  -webkit-border-radius: 0 3px 3px 0;
  -moz-border-radius: 0 3px 3px 0;
  border-radius: 0 3px 3px 0;
}
.input-daterange .add-on {
  display: inline-block;
  width: auto;
  min-width: 16px;
  height: 18px;
  padding: 4px 5px;
  font-weight: normal;
  line-height: 18px;
  text-align: center;
  text-shadow: 0 1px 0 #ffffff;
  vertical-align: middle;
  background-color: #eeeeee;
  border: 1px solid #ccc;
  margin-left: -5px;
  margin-right: -5px;
}


		.menu-content-area .wpuf-dashboard-container h2, .menu-content-area .wpuf-author {
    		display: none;
		}

		ul.tabs{
			margin: 0px;
			padding: 0px;
			list-style: none;
		}
		ul.tabs li{
			background: none;
			color: #222;
			display: inline-block;
			padding: 10px 15px;
			cursor: pointer;
		}

		.tabs button {
   color: #fff;
    padding: 0px 35px;
    border-radius: 0px;
    text-transform: uppercase;
}

		ul.tabs li.current{

		}

		.tab-content{
			display: none;


		}

		div#tab-1 table {
    margin-top: 20px;
}

div#tab-1 table thead {
    background: #eee;
    padding: 10px !important;
}

div#tab-1 {}

div#tab-1 table thead tr th,div#tab-1 table tbody tr td {
    padding: 10px !important;
    border: 1px solid #aeaaaa;
}

		.add-new-cheff-section form .form-group {
    overflow: hidden;
    margin-top: 20px;
}

.add-new-cheff-section form .form-group label {
    padding-top: 9px;
}
	.modal-content {
    top: 50px;
}


		.tab-content.current{
			display: inherit;
		}
	</style>
        <article class="menu-content-area">
        <header class="dokan-dashboard-header">
    		<h1 class="entry-title">Our Chefs</h1>
		</header>



          		<div class="contain">

	<ul class="tabs">
		<li class="button tab-link current" data-tab="tab-1"><button>Chefs Listing</button></li>
		<li class="button tab-link" data-tab="tab-2"><button>Add New Chef</button></li>
		<li class="button tab-link" data-tab="tab-3"><button>Calender</button></li>
	<!--	<li class="button tab-link" data-tab="tab-4"><button>Manage Resource</button></li>-->
	</ul>

	 <?php
	 // Function to get all the dates in given range
function getDatesFromRange($start, $end, $format = 'Y-m-d') {

		if(strtotime($start) === false || strtotime($end) === false) {
			return array();
		}

    // Declare an empty array
    $array = array();

    // Variable that store the date interval
    // of period 1 day
    $interval = new DateInterval('P1D');

    $realEnd = new DateTime($end);
    $realEnd->add($interval);

    $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

    // Use loop to store date into array
    foreach($period as $date) {
        $array[] = $date->format($format);
    }

    // Return the array elements
    return $array;
}


	 $user_id = get_current_user_id();
	 $message = '';
	 $alert = '';

	 if($_POST){
	     if($_POST && isset($_POST['chef_submit'])){
			 $post_cat = $_POST['cat'];
        	 $data = array(
                'post_title'  => $_POST['chef_name'],
                'post_content'  => $_POST['chef_bio'],
                'post_type'  => 'chefs',
				'post_category' =>   $post_cat,
                'post_status'  => 'publish'
                );

        	 $post_id = wp_insert_post($data);
			 if ($_FILES) {
    foreach ($_FILES as $file => $array) {
    $newupload = insert_attachment($file,$post_id);
    // $newupload returns the attachment id of the file that
    // was just uploaded. Do whatever you want with that now.
    }
}
        	 update_field( 'availability', $_POST['chef_date_from'], $post_id );
        	 update_field( 'to', $_POST['chef_date_to'], $post_id );
			 update_field( 'chef_years_of_experience', $_POST['chef_years_of_experience'], $post_id );
			 update_field( 'chef_certificates', $_POST['chef_certificates'], $post_id );

        	 $message = 'Chef has been inserted';
        	 $alert = 'alert-success';
	     }elseif($_POST && isset($_POST['chef_submit_edit'])){
			 $post_cat = $_POST['cat'];
	         $data = array(
	            'ID' => $_POST['post_id'],
                'post_title'  => $_POST['chef_name_edit'],
                'post_content'  => $_POST['chef_bio_edit'],
				 'post_category' =>   $post_cat,
                'post_type'  => 'chefs',
                'post_status'  => 'publish'
                );
        	 $post_id = wp_update_post($data);
        	 update_field( 'availability', $_POST['chef_date_from_edit'], $_POST['post_id']);
        	 update_field( 'to', $_POST['chef_date_to_edit'], $_POST['post_id']);
			  update_field( 'chef_years_of_experience', $_POST['chef_years_of_experience_edit'], $_POST['post_id']);
			  update_field( 'chef_certificates', $_POST['chef_certificates_edit'], $_POST['post_id']);

        	 $message = 'Chef has been updated';
        	 $alert = 'alert-success';
	     }
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
		<table>
            <thead>
                <tr>
                    <th>Chef Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php

                 $dataArr = array();
                if(count($chef_data)>0){
                    foreach($chef_data as $value){
                        $acf = get_field('availability', $value->ID);
                        $to = get_field('to', $value->ID);
						$certs = get_field('chef_certificates', $value->ID);
						$years = get_field('chef_years_of_experience', $value->ID);
						$thumb = get_post_thumbnail_id( $value->ID );
						$cats = implode(',', $value->post_category);
                        /*$dates = explode(',', $acf);
                        foreach($dates as $date){
                           $date = date_create($date);
                           $date = date_format($date,"Y-m-d");
                           $data['title'] = $value->post_title;
                           $data['start'] = $date;

                           $dataArr[] = $data;
                        }*/
						// Function call with passing the start date and end date
                        $dates = getDatesFromRange($acf, $to);
                        foreach($dates as $date){
                           $data['title'] = $value->post_title;
                           $data['start'] = $date;
                           $dataArr[] = $data;
                        }
                ?>
                <tr>
                    <td><?='<div class="dash-chef-img">'.wp_get_attachment_image($thumb).'</div>'?><?=ucwords($value->post_title)?></td>
                    <td><a class="ajax-edit" data-toggle="modal" data-target="#myModal" data-post="<?=$value->ID?>" data-title="<?=$value->post_title?>" data-bio="<?=$value->post_content?>" data-years="<?=$years?>" data-certs="<?=$certs?>" data-cat="<?=$cats?>" data-date="<?=$acf?>" data-to="<?=$to?>" style="color:green;cursor:pointer">Edit</a> |
                    <a href="https://experienceshindig.com/dashboard/chefs/?destroy_post=<?=$value->ID?>" class="delete-post" onclick="return confirm('Are you sure you want to delete this chef?');" style="color:red;cursor:pointer">Delete</a>
                    </td>
                </tr>
                <?php
                    }
                    $v = json_encode($dataArr);
                }else{
                ?>
                 <tr>
                    <td colspan="2" style="text-align: center;"><h3>No Data Found!</h3></td>
                 </tr>
                <?php
                }
                ?>
            </tbody>
		</table>
	</div>
	<div id="tab-2" class="tab-content">
		 <div class="add-new-cheff-section">
		     <form method='POST' enctype="multipart/form-data" id="chef_form">
		         <div class="form-group">
		             <div class="col-md-2">
		                 <label>Chef Name *</label>
		             </div>
		             <div class="col-md-10">
		                 <input type="text" placeholder="Chef Name" name="chef_name" class="form-control input_field" required/>
		             </div>
		         </div>
		         <div class="form-group">
		             <div class="col-md-2">
		                 <label>Chef Bio</label>
		             </div>
		             <div class="col-md-10">
		                <textarea rows="15" cols="15" name="chef_bio"></textarea>
		             </div>
		         </div>
				 <div class="form-group">
		             <div class="col-md-2">
		                 <label for="images">Chef's Picture *</label>

		             </div>
		             <div class="col-md-10">
		                <input type="file" name="chef_picture" id="chef_picture" size="50" required>
						 <span class="helper-text">**Please upload a square image for best results.</span>
		             </div>
		         </div>
		         <div class="form-group">
		             <div class="col-md-2">
		                 <label>Availability *</label>
		             </div>
		             <div class="col-md-5">
		                 <label>From *</label>
	                    <input type="date" class="form-control" name="chef_date_from" placeholder="Pick the multiple dates" required>
		             </div>
		             <div class="col-md-5">
		                 <label>To *</label>
	                    <input type="date" class="form-control" name="chef_date_to" placeholder="Pick the multiple dates" required>
		             </div>
		         </div>
				 <div class="form-group">
		             <div class="col-md-2">
		                 <label>Years of Experience</label>
		             </div>
		             <div class="col-md-10">
		                <input type="number" min="0" name="chef_years_of_experience" class="form-control input_field" />
		             </div>
		         </div>
				 <div class="form-group">
		             <div class="col-md-2">
		                 <label>Certificates / Certifications / Awards</label>
		             </div>
		             <div class="col-md-10">
		                <textarea rows="15" cols="15" name="chef_certificates"></textarea>
		             </div>
		         </div>
		           <div class="form-group">
		             <div class="col-md-2">
		                 <label>Chef Specialty</label>
		             </div>
		             <div class="col-md-10">
<!-- post Category -->
			<fieldset class="category">
				<?php $select_cats = wp_dropdown_categories( array( 'echo' => 0, 'taxonomy' => 'category', 'hide_empty' => 0 ) );
		$select_cats = str_replace( "name='cat' id=", "name='cat[]' multiple='multiple' id=", $select_cats );
		echo $select_cats; ?>

			</fieldset>

		             </div>
		         </div>
		          <div class="form-group">
		             <div class="col-md-12">
		                 <input type="submit" class="submit" name="chef_submit" value="Submit"/>
		             </div>
		         </div>

		     </form>
		 </div>
	</div>
	<div id="tab-3" class="tab-content">
		  <div id='calendar'></div>
	</div>
	<div id="tab-4" class="tab-content">
		 <?php
		// include get_home_path().'wp-content/plugins/dokan-pro/includes/modules/booking/templates/booking/resources/resources.php';
		 ?>
	</div>

</div><!-- container -->


<div class="container">



  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Chef</h4>
        </div>
        <div class="modal-body">
           <div class="add-new-cheff-section-popup">
		     <form method='POST' enctype="multipart/form-data" id="chef_form_edit">
		         <div class="form-group">
		             <div class="col-md-4">
		                 <label>Chef Name *</label>
		             </div>
		             <div class="col-md-8">
		                 <input type="text" placeholder="Chef Name" id="edit-title" name="chef_name_edit" class="form-control input_field" required/>
		             </div>
		         </div>
		         <div class="form-group">
		             <div class="col-md-4">
		                 <label>Chef Bio</label>
		             </div>
		             <div class="col-md-8">
		                <textarea rows="5" cols="5" id="edit-bio" name="chef_bio_edit"></textarea>
		             </div>
		         </div>
				 <div class="form-group">
		             <div class="col-md-4">
		                 <label>Chef's Picture</label>

		             </div>
		             <div class="col-md-8">
						  <input type="file" name="chef_picture" id="chef_picture" size="50">
						 <span class="helper-text">**Please upload a square image for best results.</span>

		             </div>
		         </div>
		         <div class="form-group">
		             <div class="col-md-4">
		                 <label>Booking Dates *</label>
		             </div>
		             <div class="col-md-4">
		                 <label>From *</label>
	                    <input type="date" class="form-control" id="from" name="chef_date_from_edit" placeholder="Pick the multiple dates" required>
		             </div>
		             <div class="col-md-4">
		                 <label>To *</label>
	                    <input type="date" class="form-control" id="to" name="chef_date_to_edit" placeholder="Pick the multiple dates" required>
		             </div>
		         </div>
				 <div class="form-group">
		             <div class="col-md-4">
		                 <label>Years of Experience</label>
		             </div>
		             <div class="col-md-8">
		                <input type="number" min="0" id="edit-years" name="chef_years_of_experience_edit" class="form-control input_field" value="" />
		             </div>
		         </div>
				 <div class="form-group">
		             <div class="col-md-4">
		                 <label>Certificates &amp; Awards</label>
		             </div>
		             <div class="col-md-8">
		                <textarea rows="15" cols="15" id="edit-certs" name="chef_certificates_edit"></textarea>
		             </div>
		         </div>
		           <div class="form-group">
		             <div class="col-md-4">
		                 <label>Chef Specialty</label>
		             </div>
		             <div class="col-md-8">
<!-- post Category -->
			<fieldset class="category">
				<?php $select_cats = wp_dropdown_categories( array( 'echo' => 0, 'taxonomy' => 'category', 'hide_empty' => 0 ) );
		$select_cats = str_replace( "name='cat' id=", "name='cat[]' multiple='multiple' id=", $select_cats );
		echo $select_cats; ?>

			</fieldset>
					   </div>
		         </div>
		          <div class="form-group">
		             <div class="col-md-12">
		                 <input type="hidden" name="post_id" id="edit-text">
		                 <input type="submit" class="submit" name="chef_submit_edit" value="Submit" style="float: right;"/>
		             </div>
		         </div>

		     </form>
		 </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

</div>

      	<script>
	jQuery(document).ready(function(){

	jQuery('ul.tabs li').click(function(){
		var tab_id = jQuery(this).attr('data-tab');

		jQuery('ul.tabs li').removeClass('current');
		jQuery('.tab-content').removeClass('current');

		jQuery(this).addClass('current');
		jQuery("#"+tab_id).addClass('current');
	});

	jQuery('.ajax-edit').click(function(){
		var post_id = jQuery(this).data('post');
		var title = jQuery(this).data('title');
		var bio = jQuery(this).data('bio');
		var date = jQuery(this).data('date');
		var to = jQuery(this).data('to');
		var years = jQuery(this).data('years');
		var certs = jQuery(this).data('certs');
		var cat = jQuery(this).data('cat');
		var thumb = jQuery(this).data('thumb');
        $('#edit-text').val(post_id);
        $('#edit-title').val(title);
        $('#edit-bio').val(bio);
        $('#from').val(date);
        $('#to').val(to);
		$('#edit-years').val(years);
		$('#edit-certs').val(certs);
		$('#edit-cat').val(cat);
		$('#edit-thumb').val(thumb);
	});
	jQuery('.delete-post').click(function(){
       jQuery("form[name='deform']").submit();
	});
    jQuery('#availability_4969').attr("type","date");

    var today = new Date();
    jQuery('.date').datepicker({
      multidate: true,
	  format: 'dd-mm-yyyy',
	  minDate: today,
   });


});



</script>

<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid' ],
      defaultDate: '<?=date('Y-m-d')?>',
      editable: false,
      eventLimit: true, // allow "more" link when too many events
      events: <?=$v?>
    });

    calendar.render();
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
