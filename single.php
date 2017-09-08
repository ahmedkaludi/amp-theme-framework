<?php amp_header(); ?>
	<main>
		<article>
			<?php do_action('ampforwp_post_before_design_elements') ?>
					<?php amp_title(); ?>
					<?php amp_featured_image();?>
					<?php amp_content(); ?>
					<?php amp_post_pagination();?>
					<?php amp_author_box(); ?>
					<?php amp_social(array('twitter'));?>
					<?php amp_categories_list();?>
					<?php amp_tags_list();?>
					<?php amp_comments();?>
					<?php amp_post_navigation();?>
					<?php amp_related_posts(); ?>
			<?php  // this hook for comments, can be removed safely
			//do_action('ampforwp_post_after_design_elements')  ?>
		</article>
	</main>
<?php amp_footer()?>