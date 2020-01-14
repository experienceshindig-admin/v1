<?php

/**
 * Toggle JQuery
 *
 * This is an example snippet for demonstrating how to add custom JavaScript code to your website. You can remove it, or edit it to add your own content.
 */
add_action( 'wp_footer', function () { ?>
	<script>
jQuery(document).ready(function($){
          
         var show_char = 150;
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
	jQuery(document).ready(function($){
          
         var show_char = 150;
         var ellipses = "... ";
         var content = $(".more").html();
          
         if (content.length > show_char) {
            var a = content.substr(0, show_char);
            var b = content.substr(show_char - content.length);
            var html = a + '<span class="truncated">' + ellipses + '<a href="" class="read-more">Read more</a></span><span class="truncated" style="display:none">' + b + '</span>';
            $(".more").html(html);
         }
 
         $(".read-more").click(function(e) {
            e.preventDefault();
            $(".more .truncated").toggle();
         });
 
      });

	</script>
<?php } );

