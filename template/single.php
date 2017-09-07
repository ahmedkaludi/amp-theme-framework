<?php global $redux_builder_amp;  ?>
<?php amp_header(); ?>
	<main>
		<article>
			<?php do_action('ampforwp_post_before_design_elements') ?>
<?php amp_title(); ?>
<?php amp_featured_image(); ?>


            
				<div>
                    <?php do_action('ampforwp_inside_post_content_before'); 
						$amp_custom_content_enable = get_post_meta( $this->get( 'post_id' ) , 'ampforwp_custom_content_editor_checkbox', true);

						// Normal Front Page Content
						if ( ! $amp_custom_content_enable ) {
							$ampforwp_the_content = $this->get( 'post_amp_content' ); // amphtml content; no kses
						} else {
							// Custom/Alternative AMP content added through post meta  
							$ampforwp_the_content = $this->get( 'ampforwp_amp_content' );
						} 
						$ampforwp_the_content = apply_filters('ampforwp_content_filter',$ampforwp_the_content);
						echo $ampforwp_the_content;
                    do_action('ampforwp_after_post_content'); ?>

				</div>
<?php
amp_post_pagination();
    amp_author_box(); 
    amp_social(array('twitter'));
    amp_categories_list();
    amp_tags_list();
    amp_comments();
    amp_post_navigation();
    amp_related_posts();
?>
 
 

			<?php  // this hook for comments, can be removed safely
			//do_action('ampforwp_post_after_design_elements')  ?>
		</article>
	</main>
<?php amp_footer()?>