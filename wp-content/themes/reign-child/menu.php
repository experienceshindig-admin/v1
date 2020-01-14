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
	
	.add-new-menu-section-popup .form-group {
    display: block;
    overflow: hidden;
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
		
		.add-new-menu-section form .form-group {
    overflow: hidden;
    margin-top: 20px;
}

.add-new-menu-section form .form-group label {
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
    		<h1 class="entry-title">Menu &amp; Service Items</h1>
		</header>
		
	
		
          		<div class="contain">

	<ul class="tabs">
		<li class="button tab-link current" data-tab="tab-1"><button>Menu/Service Item Listing</button></li>
		<li class="button tab-link" data-tab="tab-2"><button>Add New Menu/Service Item</button></li>
	</ul>
	
	 <?php
	 $user_id = get_current_user_id();
	 $message = '';
	 $alert = '';

	 if($_POST){
	     if($_POST && isset($_POST['menu_submit'])){
			 $post_cat = $_POST['cat'];
        	 $data = array(
                'post_title'  => $_POST['menu_name'],
                'post_content'  => $_POST['ingredients'],
                'post_type'  => 'menu_item',
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
			 update_field( 's_diets', $_POST['s_diets'], $post_id );
			 update_field( 'course_type', $_POST['course_type'], $post_id );
			 
        	 $message = 'Menu Item has been inserted';
        	 $alert = 'alert-success';
	     }elseif($_POST && isset($_POST['menu_submit_edit'])){
			 $post_cat = $_POST['cat'];
	         $data = array(
	            'ID' => $_POST['post_id'],
                'post_title'  => $_POST['menu_name_edit'],
                'post_content'  => $_POST['ingredients_edit'],
				 'post_category' =>   $post_cat,
                'post_type'  => 'menu_item',
                'post_status'  => 'publish'
                );
        	 $post_id = wp_update_post($data);
        	 update_field( 's_diets_edit', $_POST['s_diets'], $post_id );
			 update_field( 'course_type_edit', $_POST['course_type'], $post_id );
			  
        	 $message = 'Menu/Service Item has been updated';
        	 $alert = 'alert-success';
	     }
	 }
     if($_GET && isset($_GET['destroy_post'])){
	      wp_delete_post($_GET['destroy_post']);
          $message = 'Menu/Service Item has been deleted';
          $alert = 'alert-success';
	  }	 
	 //GET POST DATA
	 $args = array( 
	     'posts_per_page' => -1 ,
	     'post_type'      => 'menu_item',
	     'author' => $user_id
	     );
    $menu_data = get_posts( $args );
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
                    <th>Menu/Service Item Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
				
                 $dataArr = array();
                if(count($menu_data)>0){
                    foreach($menu_data as $value){
						$sds = get_field('s_diets', $value->ID);
							foreach ($sds as &$sd) {
								$sd = $sd['value']; 
								}
						$s_diet = implode(',', $sds);
						$course = get_field('course_type', $value->ID);
						$thumb = get_post_thumbnail_id( $value->ID );
						$img = wp_get_attachment_image($thumb);
						$img_url = wp_get_attachment_url($thumb);
						$cat_id = $value->post_category;
						
						
						$cats = '"'.implode('","', $cat_id).'"';
                        
						
                ?>
                <tr>
                    <td><div class="dash-menu-img"><?=$img?></div><?=ucwords($value->post_title)?></td>
                    <td><a class="ajax-edit" data-toggle="modal" data-target="#myModal" data-post="<?=$value->ID?>" data-title="<?=$value->post_title?>" data-ing="<?=$value->post_content?>" data-img="<?=$img_url?>" data-diet="<?=$s_diet?>" data-course-type="<?=$course?>" data-cat='[<?=$cats?>]' style="color:green;cursor:pointer">Edit</a> | 
                    <a href="https://experienceshindig.com/dashboard/menus/?destroy_post=<?=$value->ID?>" class="delete-post" onclick="return confirm('Are you sure you want to delete this menu/service item?');" style="color:red;cursor:pointer">Delete</a>
                    </td>
                </tr>
                <?php
                    }
                    $v = json_encode($dataArr);
                }else{
                ?>
                 <tr>
                    <td colspan="2" style="text-align: center;"><h3>No Menu/Service Items Found!</h3></td>
                 </tr>
                <?php
                }
                ?>
            </tbody>
		</table>
	</div>
	<div id="tab-2" class="tab-content">
		 <div class="add-new-menu-section">
		     <form method='POST' enctype="multipart/form-data" id="menu_form">
		         <div class="form-group">
		             <div class="col-md-2">
		                 <label>Menu/Service Item Name *</label>
		             </div>
		             <div class="col-md-10"> 
		                 <input type="text" placeholder="Menu Item Name" name="menu_name" class="form-control input_field" required/>
		             </div>
		         </div>
		         <div class="form-group">
		             <div class="col-md-2">
		                 <label>Ingredients / Description</label>
		             </div>
		             <div class="col-md-10">
		                <textarea rows="15" cols="15" name="ingredients"></textarea>
		             </div>
		         </div>
				 <div class="form-group">
		             <div class="col-md-2">
		                 <label for="images">Menu/Service Item Picture *</label>
						 
		             </div>
		             <div class="col-md-10">
		                <input type="file" name="menu_picture" id="menu_picture" size="50" required>
						 <span class="helper-text">**Please upload a square image for best results.</span>
		             </div>
		         </div>
		         
				 <div class="form-group">
		             <div class="col-md-2">
		                 <label>Course</label>
		             </div>
		             <div class="col-md-10">
		              <select name="course_type" id="course_type">
						<option value="Savory"> Savory</option>
						<option value="Sweet"> Sweet</option>
						<option value="Drinks"> Drinks</option>
					</select>  
		             </div>
		         </div>
				 <div class="form-group">
		             <div class="col-md-2">
		                 <label>Dietary Offering</label>
		             </div>
		             <div class="col-md-10">
		                <ul class="menu-dash-list">
		     <li class="dokan-ck-li"><input type="checkbox" class="input-md valid" name="s_diets[]" id="reg_s_diets[]" value="GF"> Gluten Free</li>
  			<li class="dokan-ck-li"><input type="checkbox" class="input-md valid" name="s_diets[]" id="reg_s_diets[]" value="NF"> Nut Free</li>
 		    <li class="dokan-ck-li"><input type="checkbox" class="input-md valid" name="s_diets[]" id="reg_s_diets[]" value="DF"> Dairy Free</li>
			<li class="dokan-ck-li"><input type="checkbox" class="input-md valid" name="s_diets[]" id="reg_s_diets[]" value="CF"> Corn Free</li>
			<li class="dokan-ck-li"><input type="checkbox" class="input-md valid" name="s_diets[]" id="reg_s_diets[]" value="Veg"> Vegetarian</li>
			<li class="dokan-ck-li"><input type="checkbox" class="input-md valid" name="s_diets[]" id="reg_s_diets[]" value="V"> Vegan</li>
					</ul>
		             </div>
		         </div>
		           <div class="form-group">
		             <div class="col-md-2">
		                 <label>Cuisine</label>
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
		                 <input type="submit" class="submit" name="menu_submit" value="Submit"/>
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
          <h4 class="modal-title">Edit Menu/Service Item</h4>
        </div>
        <div class="modal-body">
           <div class="add-new-menu-section-popup">
		     <form method='POST' enctype="multipart/form-data" id="menu_form_edit">
		         <div class="form-group">
		             <div class="col-md-4">
		                 <label>Menu/Service Item Name *</label>
		             </div>
		             <div class="col-md-8"> 
		                 <input type="text" placeholder="Menu Item Name" id="edit-title" name="menu_name_edit" class="form-control input_field" required/>
		             </div>
		         </div>
		         <div class="form-group">
		             <div class="col-md-4">
		                 <label>Ingredients / Description</label>
		             </div>
		             <div class="col-md-8">
		                <textarea rows="5" cols="5" id="edit-ing" name="ingredients_edit"></textarea>
		             </div>
		         </div>
				 <div class="form-group">
		             <div class="col-md-4">
		                 <label>Menu/Service Item's Picture</label>
						 <div class="dash-menu-img"><img id="edit-img" /></div>
		             </div>
		             <div class="col-md-8">
						  <input type="file" name="menu_picture" id="menu_picture" size="50">
						 <span class="helper-text">**Please upload a square image for best results.</span>
						 
		             </div>
		         </div>
		         
				 <div class="form-group">
		             <div class="col-md-4">
		                 <label>Course</label>
		             </div>
		             <div class="col-md-8">
						 <select name="course_type" id="edit-course">
							<option value="Savory">Savory</option>
							<option value="Sweet">Sweet</option>
							<option value="Drinks">Drinks</option>
						</select> 
		             </div>
		         </div>
				 <div class="form-group">
		             <div class="col-md-4">
		                 <label>Dietary Offerings</label>
		             </div>
		             <div class="col-md-8">
						 <ul class="menu-dash-list">
		     <li class="dokan-ck-li"><input type="checkbox" class="input-md valid" name="s_diets[]" id="reg_s_diets[]" value="GF"> Gluten Free</li>
  			<li class="dokan-ck-li"><input type="checkbox" class="input-md valid" name="s_diets[]" id="reg_s_diets[]" value="NF"> Nut Free</li>
 		    <li class="dokan-ck-li"><input type="checkbox" class="input-md valid" name="s_diets[]" id="reg_s_diets[]" value="DF"> Dairy Free</li>
			<li class="dokan-ck-li"><input type="checkbox" class="input-md valid" name="s_diets[]" id="reg_s_diets[]" value="CF"> Corn Free</li>
			<li class="dokan-ck-li"><input type="checkbox" class="input-md valid" name="s_diets[]" id="reg_s_diets[]" value="Veg"> Vegetarian</li>
			<li class="dokan-ck-li"><input type="checkbox" class="input-md valid" name="s_diets[]" id="reg_s_diets[]" value="V"> Vegan</li>
					</ul>
		             </div>
		         </div>
		           <div class="form-group">
		             <div class="col-md-4">
		                 <label>Cuisine</label>
		             </div>
		             <div class="col-md-8">
<!-- post Category -->
			<fieldset class="category">
				<?php $select_cats = wp_dropdown_categories( array( 'echo' => 0, 'taxonomy' => 'category', 'orderby' => 'name', 'order' => 'asc', 'hide_empty' => 0 ) );
		$select_cats = str_replace( "name='cat' id=", "name='cat[]' multiple='multiple' id='edit-cat'", $select_cats );
		echo $select_cats; ?>

			</fieldset>
					   </div>
		         </div>
		          <div class="form-group">
		             <div class="col-md-12">
		                 <input type="hidden" name="post_id" id="edit-text">
		                 <input type="submit" class="submit" name="menu_submit_edit" value="Submit" style="float: right;"/>
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
		var ing = jQuery(this).data('ing');
		var course = jQuery(this).data('course-type');
		var diet = jQuery(this).data('diet');
		var img = jQuery(this).data('img');
		var cat = jQuery(this).data('cat');
		var thumb = jQuery(this).data('thumb');
        $('#edit-text').val(post_id);
		$("#edit-img").attr("src", img);
        $('#edit-title').val(title);
		$('#edit-course').val(course);
		$('#edit-ing').val(ing);
		$('#menu_form_edit').attr('class', post_id);
		$('#edit-thumb').val(thumb);
		
	});
	jQuery('.delete-post').click(function(){
       jQuery("form[name='deform']").submit();
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