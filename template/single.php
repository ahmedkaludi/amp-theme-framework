<?php global $redux_builder_amp;  ?>
<!doctype html>
<html amp>
<head>
	<meta charset="utf-8">
    <link rel="dns-prefetch" href="https://cdn.ampproject.org">
	
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
	<?php $this->load_parts( array( 'style' ) ); ?>
	<?php do_action( 'amp_post_template_css', $this ); ?>
	</style>
</head>
<body class="single-post <?php
  if( is_page() )   echo 'amp-single-page';
  else              echo 'amp-single';
?>">
<?php $this->load_parts( array( 'header-bar' ) ); ?>
<?php do_action( 'ampforwp_after_header', $this ); ?>
	<main>
		<article class="amp-wp-article">
			<?php do_action('ampforwp_post_before_design_elements') ?>

<!-- Featured Image Starts -->  
<?php amp_featured_image(); ?>
<!-- Featured Image Ends -->  

<!-- Social Sharing Starts -->  
				<div class="amp-post-social-share">
					<ul>
						<li class="twitter"><a href="https://twitter.com/intent/tweet?status=<?php echo wp_kses_data( $this->get( 'post_title' ) ); ?> <?php echo wp_kses_data( get_permalink() ) . AMP_QUERY_VAR ; ?>">Tweet This</a></li> 
						<li class="facebook"><a href="https://www.facebook.com/share.php?u=<?php echo wp_kses_data( get_permalink() ) . AMP_QUERY_VAR ; ?>&t=<?php echo $this->get( 'post_title' ); ?>">Share This</a></li>
					</ul>					
				</div>
<!-- Social Sharing Ends -->  
            
<!-- Article Content Starts -->  
				<div class="amp-wp-article-content">
                    <?php do_action('ampforwp_inside_post_content_before'); 
						$amp_custom_content_enable = get_post_meta( $this->get( 'post_id' ) , 'ampforwp_custom_content_editor_checkbox', true);

						// Normal Front Page Content
						if ( ! $amp_custom_content_enable ) {
							echo $this->get( 'post_amp_content' ); // amphtml content; no kses
						} else {
							// Custom/Alternative AMP content added through post meta  
							echo $this->get( 'ampforwp_amp_content' );
						} 
						
					do_action('ampforwp_inside_post_content_after') ?>

				</div>
<!-- Article Content Ends -->  
<!-- Author -->  
<?php amp_author_box(); 
amp_social_icons(array('twitter'));
amp_categories_list();
amp_tags_list();
amp_comments();
amp_post_navigation();
amp_related_posts();
?>
 
 

			<?php do_action('ampforwp_post_after_design_elements') ?>
		</article>
	</main>
<?php $this->load_parts( array( 'footer' ) ); ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>