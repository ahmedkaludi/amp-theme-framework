<?php global $redux_builder_amp;  ?>
<?php amp_header() ?>
<?php $this->load_parts( array( 'header-bar' ) ); ?>

<div class="amp-wp-article ampforwp-custom-index amp-wp-home">

<?php do_action('ampforwp_post_before_design_elements') ?>

    
  <?php amp_page_title(); ?>

    <?php while(amp_loop('start')): ?>
			<?php amp_loop_image(); ?>
			<?php amp_loop_title(); ?>
			<?php amp_loop_excerpt(); ?>
			<?php amp_loop_category(); ?>
			<?php amp_loop_date(); ?>
		<?php amp_loop('end'); endwhile;  ?>
	<?php amp_pagination(); ?>








		<?php /*if ( get_query_var( 'paged' ) ) {
		        $paged = get_query_var('paged');
		    } elseif ( get_query_var( 'page' ) ) {
		        $paged = get_query_var('page');
		    } else {
		        $paged = 1;
		    }

		    $exclude_ids = get_option('ampforwp_exclude_post');

			$args = array(
				'post_type'           => 'post',
				'orderby'             => 'date',
				'paged'               => esc_attr($paged),
				'post__not_in' 		  => $exclude_ids,
        'has_password' => false ,
        'post_status'=> 'publish'
			);
			$filtered_args = apply_filters('ampforwp_query_args', $args);
			$q = new WP_Query( $filtered_args ); ?>

			<?php if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post(); ?>
	        <div class="amp-wp-content amp-wp-article-header amp-loop-list">
	        	<div class="amp-wp-content-loop">

					<?php $ampforwp_post_url = get_permalink();
					if ( has_post_thumbnail() ) { 
						$thumb_id = get_post_thumbnail_id();
						$big_thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);  ?>
						<div class="home-post-image-big">
							<a href="<?php  echo trailingslashit($ampforwp_post_url) . AMP_QUERY_VAR ;?>">
								<amp-img
								    src="<?php echo $big_thumb_url_array[0] ?>"		   
								    width="<?php echo $big_thumb_url_array[1] ?>"
								    height="<?php echo $big_thumb_url_array[2] ?>"
								    layout="responsive"
								    alt="an image">
								</amp-img>							 
							</a>
						</div> <?php
					}
					if( has_excerpt() ){
						$content = get_the_excerpt();
					} else {
						$content = get_the_content();
					} ?>

		        	<h2 class="amp-wp-title">
			            <a href="<?php  echo trailingslashit($ampforwp_post_url) . AMP_QUERY_VAR ;?>"><?php the_title() ?></a>
			        </h2> 
		          	<p><?php echo wp_trim_words( $content , '15'); ?></p>			

				</div>
			</div>
		    <?php endwhile;  ?>
<!-- Loop Ends -->  

<!-- Pagination Starts -->  
		    <div class="amp-wp-content pagination-holder">
		        <div id="pagination">
		            <div class="next"><?php next_posts_link( $redux_builder_amp['amp-translator-next-text']. ' &raquo;', 0 ) ?></div>
		            <div class="prev"><?php previous_posts_link( '&laquo; '. $redux_builder_amp['amp-translator-previous-text'] ); ?></div>
		            <div class="clearfix"></div>
		        </div>
		    </div>
<!-- Pagination Ends -->  

		<?php endif;*/ ?>

</div>

<?php $this->load_parts( array( 'footer' ) ); ?>

<?php do_action( 'amp_post_template_footer', $this ); ?>

</body>
</html>