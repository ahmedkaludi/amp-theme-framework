<?php global $redux_builder_amp;  ?>
<?php amp_header(); ?>
	<main>
		<article>
			<?php do_action('ampforwp_post_before_design_elements') ?>
<?php amp_title(); ?>
<?php amp_featured_image();
amp_content(); 
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