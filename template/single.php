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

<?php do_action( 'ampforwp_after_header', $this ); ?>
	<main>
		<article class="amp-wp-article">
			<?php do_action('ampforwp_post_before_design_elements') ?>

<!-- Featured Image Starts -->  
				<?php if ( has_post_thumbnail() ) { 
						$thumb_id = get_post_thumbnail_id();
						$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'large', true);
						$thumb_url = $thumb_url_array[0]; ?>
						<div class="ampforwp-featured-holder">
							<amp-img
							    src="<?php echo $thumb_url ?>"		   
							    width="<?php echo $thumb_url_array[1] ?>"
							    height="<?php echo $thumb_url_array[2] ?>"
							    layout="responsive"
							    alt="an image">
							</amp-img>
							<header class="amp-wp-article-header ampforwp-title">
                                <h1 class="amp-wp-title"><?php echo wp_kses_data( $this->get( 'post_title' ) ); ?></h1>
								<?php $post_author = $this->get( 'post_author' ); if ( $post_author ) : ?>
									<div class="ampforwp-meta-info">							
										<span>
                                            By <?php echo esc_html( $post_author->display_name ); ?>
                                        </span>
									</div>
								<?php endif; ?>
							</header>
						</div><?php } ?>
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

<!-- Related Posts Start -->  
				<div class="ampforwp-custom-related-post">
					<?php $this->load_parts( array( 'ampforwp-related-posts' ) ); ?>
				</div>
<!-- Related Posts End -->  

<!-- Comment Button Start -->  
				<?php if ( comments_open() ) { ?>
					<div class="comment-button-wrapper">
				    	<a href="<?php echo get_permalink().'#commentform' ?>"> Leave a Comment </a>
					</div>
				<?php } ?>
<!-- Comment Button End -->  


			<?php do_action('ampforwp_post_after_design_elements') ?>
		</article>
	</main>
<?php $this->load_parts( array( 'footer' ) ); ?>
<?php do_action( 'amp_post_template_footer', $this ); ?>
</body>
</html>