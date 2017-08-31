<?php global $redux_builder_amp;  ?>
<!doctype html>
<html amp <?php echo AMP_HTML_Utils::build_attributes_string( $this->get( 'html_tag_attributes' ) ); ?>>
<head>
<meta charset="utf-8">
<link rel="dns-prefetch" href="https://cdn.ampproject.org">
<?php
global $redux_builder_amp;
if ( is_home() || is_front_page()  || ( is_archive() && $redux_builder_amp['ampforwp-archive-support'] ) ){
    global $wp;
    $current_archive_url = home_url( $wp->request );
    $amp_url 	= trailingslashit($current_archive_url);
    $remove 	= '/'. AMP_QUERY_VAR;
    $amp_url 	= str_replace($remove, '', $amp_url) ;
} ?>
	<link rel="canonical" href="<?php echo $amp_url ?>">
	
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
		<?php $this->load_parts( array( 'style' ) ); ?>
		<?php do_action( 'amp_post_template_css', $this ); ?>
	</style>
</head>

<body class="amp-archive">

<?php $this->load_parts( array( 'header-bar' ) ); ?>

<div class="amp-wp-article ampforwp-custom-index amp-wp-home">

<?php do_action('ampforwp_post_before_design_elements') ?>

    
  <?php if ( is_archive() ) {
    the_archive_title( '<h3 class="archive-page-title">', '</h3>' );
    the_archive_description( '<div class="taxonomy-description">', '</div>' );
  } ?>
<!-- Loop Starts -->  
		<?php
			if ( get_query_var( 'paged' ) ) {
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

		<?php endif; ?>

</div>

<?php $this->load_parts( array( 'footer' ) ); ?>

<?php do_action( 'amp_post_template_footer', $this ); ?>

</body>
</html>