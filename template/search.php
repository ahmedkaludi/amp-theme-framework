<?php global $redux_builder_amp;  ?>
<?php amp_header() ?>
<?php do_action('ampforwp_body_beginning', $this); ?>
<?php $this->load_parts( array( 'header-bar' ) ); ?>

<?php do_action( 'ampforwp_after_header', $this ); ?>



<main>
	<?php do_action('ampforwp_post_before_loop') ?>
	<?php amp_page_title(); ?>
	<?php 
	//$data['posts_per_page'] = 2;
	//call_loops_standered($data);
	 while(amp_loop('start')): ?>
			<?php amp_loop_image(); ?>
			<?php amp_loop_title(); ?>
			<?php amp_loop_excerpt(); ?>
			<?php amp_loop_category(); ?>
			<?php amp_loop_date(); ?>
		<?php amp_loop('end'); ?> 
	<?php endwhile;  ?>
	<?php amp_pagination(); ?>

    <?php
		/*if ( get_query_var( 'paged' ) ) {
	        $paged = get_query_var('paged');
	    } elseif ( get_query_var( 'page' ) ) {
	        $paged = get_query_var('page');
	    } else {
	        $paged = 1;
	    }

	    $exclude_ids = get_option('ampforwp_exclude_post');

		$q = new WP_Query( array(
			's' 				  => get_search_query() ,
			'ignore_sticky_posts' => 1,
			'paged'               => esc_attr($paged),
			'post__not_in' 		  => $exclude_ids,
			'has_password' 		  => false ,
			'post_status'		  => 'publish'
		) );*/ 
		//echo amp_loop('start');die;
		?>

     <?php /*global $redux_builder_amp; ?>
 		<h3 class="amp-wp-content page-title"><?php echo ampforwp_translation( $redux_builder_amp['amp-translator-search-text'], 'You searched for:') . '  ' . get_search_query();?>  </h3>

	<?php if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post();
		$ampforwp_amp_post_url = trailingslashit( get_permalink() ) . AMPFORWP_AMP_QUERY_VAR ; ?>

		<div class="amp-wp-content amp-loop-list">
			<?php if ( has_post_thumbnail() ) { ?>
				<?php
				$thumb_id = get_post_thumbnail_id();
				$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'medium', true);
				$thumb_url = $thumb_url_array[0];
				?>
				<div class="home-post_image"><a href="<?php echo esc_url( trailingslashit( $ampforwp_amp_post_url ) ); ?>"><amp-img layout="responsive" src=<?php echo $thumb_url ?> width=450 height=270 ></amp-img></a></div>
			<?php } ?>

			<div class="amp-wp-post-content">
                <ul class="amp-wp-tags">
					<?php foreach((get_the_category()) as $category) { ?>
             			<li class="amp-cat-<?php echo $category->term_id;?>"><?php echo $category->cat_name ?></li>
					<?php } ?>
                </ul>
				<h2 class="amp-wp-title"> <a href="<?php echo esc_url( trailingslashit( $ampforwp_amp_post_url ) ); ?>"> <?php the_title(); ?></a></h2>


				<?php
					if(has_excerpt()){
						$content = get_the_excerpt();
					}else{
						$content = get_the_content();
					}
				?>
		        <p><?php echo wp_trim_words( strip_shortcodes( $content ) , '15' ); ?></p>
                <div class="featured_time"><?php 
                	$post_date =  human_time_diff( 
                						get_the_time('U', get_the_ID() ), 
                						current_time('timestamp') ) .' '. ampforwp_translation( $redux_builder_amp['amp-translator-ago-date-text'],
                						'ago' );
                    $post_date = apply_filters('ampforwp_modify_post_date',$post_date);
                    echo  $post_date ; ?>
                  </div>

		    </div>
            <div class="cb"></div>
	</div>

	<?php endwhile;  ?>

	<div class="amp-wp-content pagination-holder">


		<div id="pagination">
			<div class="next"><?php next_posts_link( ampforwp_translation($redux_builder_amp['amp-translator-show-more-posts-text'] , 'Show more Posts'), 0 ) ?></div>
				<?php if ( $paged > 1 ) { ?>
					<div class="prev"><?php previous_posts_link( ampforwp_translation($redux_builder_amp['amp-translator-show-previous-posts-text'], 'Show previous Posts' ) ); ?></div>
				<?php } ?>
			<div class="clearfix"></div>
		</div>
	</div>
	<?php else : ?>
		<div class="amp-wp-content">
 			<?php echo ampforwp_translation($redux_builder_amp['amp-translator-search-no-found'], 'It seems we can\'t find what you\'re looking for. '); ?>
 		</div>

	<?php endif; ?>
	<?php wp_reset_postdata();*/ ?>
	<?php do_action('ampforwp_post_after_loop') ?>
</main>
<?php do_action( 'amp_post_template_above_footer', $this ); ?>
<?php $this->load_parts( array( 'footer' ) ); ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>