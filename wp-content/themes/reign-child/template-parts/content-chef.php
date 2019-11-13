<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Reign
 */

global $blog_list_layout;
if (!isset($blog_list_layout)) {
    $blog_list_layout = get_theme_mod( 'reign_blog_list_layout', 'default-view' );
}
$kirki_post_types_support_class = new Reign_Kirki_Post_Types_Support();
$supported_post_types = $kirki_post_types_support_class->get_post_types_to_support();

?>
<article id="post-<?php the_ID(); ?>" <?php post_class($blog_list_layout); ?>>
<div class="wp-block-columns has-2-columns">
<div class="wp-block-column">
    <?php do_action( 'reign_post_content_begins' ); ?>
    <?php if ( ! is_singular( 'sfwd-courses' ) ) {
        if ( has_post_thumbnail() ) {
            if( is_singular() && ( 'post' === get_post_type() || !in_array( get_post_type(), array_column($supported_post_types, 'slug')) ) ) {
                if( 'post' === get_post_type() ){
                    $switch_header_image = get_theme_mod( 'reign_single_post_switch_header_image', false );
                }else{
                     $switch_header_image = get_theme_mod( 'reign_cpt_default_switch_header_image', false );
                }

                if( !$switch_header_image ) {
                    ?>
                    <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to %s', 'reign'), the_title_attribute('echo=0'))); ?>" class="entry-media rg-post-thumbnail">
                        <?php the_post_thumbnail( 'reign-featured-large' );; ?>
                    </a>
                    <?php
                }
            }
            else {
                ?>
                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to %s', 'reign'), the_title_attribute('echo=0'))); ?>" class="entry-media rg-post-thumbnail">
                    <?php the_post_thumbnail( 'reign-featured-large' );; ?>
                </a>
                <?php
            }
        }
    }    
    ?>
	</div>

    <div class="rg-post-content wp-block-column menu_item">
        <div class="entry-content">
            <?php
            if (is_singular()) { ?>
				<h1><?php the_title(); ?></h1>
				<h2 class="course"></h2>
				<p><?php the_field('cost_per_serving'); ?></p>
			<?php
                /* translators: %s: Name of current post */
                the_content(sprintf(
                    wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'reign'), array( 'span' => array( 'class' => array() ) )),
                    the_title('<span class="screen-reader-text">"', '"</span>', false)
                ));
			$s_diets = get_field('s_diets');
		
		echo '<ul class="shindig-ul">';
		foreach( $s_diets as $s_diet ): 
		if($s_diet == 'Gluten Free'){
			$diet_short = 'GF';
		}
		elseif($s_diet == 'Dairy Free'){
			$diet_short = 'DF';
		}
		elseif($s_diet == 'Vegan'){
			$diet_short = 'V';
		}
		elseif($s_diet == 'Vegetarian'){
			$diet_short = 'VEG';
		}
		elseif($s_diet == 'Nut Free'){
			$diet_short = 'NF';
		}
		elseif($s_diet == 'Corn Free'){
			$diet_short = 'CF';
		}
		else{
			$diet_short = $s_diet;
		}
		?>
			<li class="s_diet">
				<div class="tooltip"><?php echo $diet_short; ?>, 
  				<span class="tooltiptext"><?php echo $s_diet; ?></span>
				</div>
			</li>
	<?php endforeach; 
		echo '</ul>';
            } else { 
                echo '<p>';
                    the_excerpt();
                echo '</p>';
            
	
}
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'reign'),
                'after'  => '</div>',
            ));
            ?>

            <?php if (!is_singular()) { ?>
                <p class="no-margin"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to %s', 'reign'), the_title_attribute('echo=0'))); ?>" class="read-more button"><?php _e('Read More', 'reign'); ?></a></p>
            <?php } ?>

        </div><!-- .entry-content -->
    </div>
	</div>

    <?php
    if ( is_single() ) {
        do_action( 'reign_extra_info_on_single_post_end' );
    }
    ?>
</article><!-- #post-## --> 
