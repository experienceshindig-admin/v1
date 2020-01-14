<?php

/**
 * Toggle JQuery
 *
 * This is an example snippet for demonstrating how to add custom JavaScript code to your website. You can remove it, or edit it to add your own content.
 */
add_action( 'wp_footer', function () { ?>
	<script>
jQuery(document).ready(function($){
          
         var show_char = 1500;
         var ellipses = "... ";
         var content = $(".woocommerce-product-details__short-description").html();
          
         if (content.length > show_char) {
            var a = content.substr(0, show_char);
            var b = content.substr(show_char - content.length);
            var html = a + '<span class="truncated">' + ellipses + '<a href="" class="read-more">Read more</a></span><span class="truncated" style="display:none">' + b + '</span>';
            $(".woocommerce-product-details__short-description").html(html);
         }
 
         $(".read-more").click(function(e) {
            e.preventDefault();
            $(".woocommerce-product-details__short-description .truncated").toggle();
         });
 
      });
		jQuery(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 150;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "more &raquo;";
    var lesstext = "Show less";
    

    jQuery('.more').each(function() {
        var content = jQuery(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span><a href="" class="morelink">' + moretext + '</a></span>';
 
            jQuery(this).html(html);
        }
 
    });
 
    jQuery(".morelink").click(function(){
        if(jQuery(this).hasClass("less")) {
            jQuery(this).removeClass("less");
            jQuery(this).html(moretext);
        } else {
            jQuery(this).addClass("less");
            jQuery(this).html(lesstext);
        }
        jQuery(this).parent().prev().toggle();
        jQuery(this).prev().toggle();
        return false;
    });
});

	</script>
<?php } );

