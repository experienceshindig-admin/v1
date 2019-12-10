jQuery(function($){
	$('.product-categories .cat-parent').click(function(e){
		e.preventDefault();
	})
	$('.related.products > h2').text('Related Shindigs');
	$('li.store-tab-common.store-tab-products a span').text('Shindigs');
	$('.dokan-dashboard-menu li.booking a').html('<i class="fa fa-calendar"></i> Shindigs');
	$('.dokan-dashboard-menu li.seo a').html('<i class="fa fa-globe"></i> Portfolio SEO');
	$('li#tab-title-more_seller_product a span').text('Other Shindigs');
	$('li#tab-title-seller a span').text('Chef Info');
	$('.product_meta .rda-sold-by').html('By: '+$('.product_meta .rda-sold-by .sold-by').html());
	$('ul.dokan_tabs li:first-child a').text('My Shindigs');
	$('.dokan-booking-wrapper span.dokan-add-product-link a').html('<i class="fa fa-plus"></i> Add a Shindig');
	$('.dokan-product-listing-area span.dokan-add-product-link a').html('<i class="fa fa-plus"></i> Add a Shindig');
	$('.dokan-dashboard .dokan-dashboard-content.dokan-dashboard-content article.dashboard-content-area .dashboard-widget.products .widget-title').html('<i class="fa fa-calendar" aria-hidden="true"></i> Shindigs<span class="pull-right"><a href="https://experienceshindig.com/dashboard/new-product/">+ Add New Shindig</a></span>');
	
	$('.wc-bookings-booking-form-button').text('Request Booking');

    $('#toggle-mobile-menu').click(function () {
        var parentBlock = $(this).parents('.dokan-dash-sidebar');
        if ($('#toggle-mobile-menu').is(':checked')){
            parentBlock.addClass('dokan-dash-sidebar__rb_style');
        } else {
            parentBlock.removeClass('dokan-dash-sidebar__rb_style');
        }
    });
})
