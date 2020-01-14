<?php

/**
 * Toggle JQuery
 *
 * This is an example snippet for demonstrating how to add custom JavaScript code to your website. You can remove it, or edit it to add your own content.
 */
add_action( 'wp_footer', function () { ?>
	<script>
jQuery(document).ready(function () {
if (jQuery(".biowrapper").height() > 150) {
jQuery('.biowrapper').find('a[href="#"]').on('click', function (e) {
    e.preventDefault();
    this.expand = !this.expand;
    jQuery(this).text(this.expand?"Click to collapse":"Click to read more");
    jQuery(this).closest('.biowrapper').find('.biosmall, .biobig').toggleClass('biosmall biobig');
});
} else {
jQuery( ".biolink" ).hide();
jQuery(".biosmall").removeClass('biosmall').addClass('biobig');
}
});
jQuery(document).ready(function () {
if (jQuery(".sdwrapper").height() > 150) {
jQuery('.sdwrapper').find('a[href="#"]').on('click', function (e) {
    e.preventDefault();
    this.expand = !this.expand;
    jQuery(this).text(this.expand?"Click to collapse":"Click to read more");
    jQuery(this).closest('.sdwrapper').find('.sdsmall, .sdbig').toggleClass('sdsmall sdbig');
});
} else {
jQuery( ".sdlink" ).hide();
jQuery(".sdsmall").removeClass('sdsmall').addClass('sdbig');
}
});
jQuery(document).ready(function () {
if (jQuery(".ldwrapper").height() > 150) {
jQuery('.ldwrapper').find('a[href="#"]').on('click', function (e) {
    e.preventDefault();
    this.expand = !this.expand;
    jQuery(this).text(this.expand?"Click to collapse":"Click to read more");
    jQuery(this).closest('.ldwrapper').find('.ldsmall, .ldbig').toggleClass('ldsmall ldbig');
});
} else {
jQuery( ".ldlink" ).hide();
jQuery(".ldsmall").removeClass('ldsmall').addClass('ldbig');
}
});



	</script>
<?php } );

