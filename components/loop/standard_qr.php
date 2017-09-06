<?php
global $redux_builder_amp;
global $wpdb;
	if (get_query_var()!=null && get_query_var( 'paged' ) ) {
	    $paged = get_query_var('paged');
	} elseif ( get_query_var( 'page' ) ) {
	    $paged = get_query_var('page');
	} else {
	    $paged = 1;
	}

if ( is_single() || is_page() ) {

}
if ( is_archive() ) {
	$exclude_ids = get_option('ampforwp_exclude_post');
	$args = array(
		'post_type'           => 'post',
		'orderby'             => 'date',
		'paged'               => esc_attr($paged),
		'post__not_in' 		  => $exclude_ids,
		'has_password' 		  => false ,
		'post_status'		  => 'publish'
	);
	$filtered_args = apply_filters('ampforwp_query_args', $args);
	$amp_q = new WP_Query( $filtered_args );
}
if ( is_home() ) {
	$exclude_ids = get_option('ampforwp_exclude_post');

	$args = array(
		'post_type'           => 'post',
		'orderby'             => 'date',
		'paged'               => esc_attr($paged),
		'post__not_in' 		  => $exclude_ids,
		'has_password'		  => false ,
		'post_status'		  => 'publish'
	);
	$filtered_args = apply_filters('ampforwp_query_args', $args);
	$amp_q = new WP_Query( $filtered_args );
}

if ( is_search() ) {
	echo 'yes got';die;	
	$exclude_ids = get_option('ampforwp_exclude_post');

	$amp_q = new WP_Query( array(
		's' 				  => get_search_query() ,
		'ignore_sticky_posts' => 1,
		'paged'               => esc_attr($paged),
		'post__not_in' 		  => $exclude_ids,
		'has_password' 		  => false ,
		'post_status'		  => 'publish'
	) );
}
$ampLoopData = array();
if ( $q->have_posts() ) : 
	$key = 0;
	while ( $q->have_posts() ) : $q->the_post();
		$ampLoopData[$key]['ampforwp_amp_post_url'] = trailingslashit( get_permalink() ) . AMPFORWP_AMP_QUERY_VAR ;
		if ( has_post_thumbnail() ) {
			$thumb_id = get_post_thumbnail_id();
			$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'medium', true);
			$thumb_url = $thumb_url_array[0];
			$ampLoopData[$key]['thumbnail'] = $thumb_url;
		}

		foreach((get_the_category()) as $category) {
			$ampLoopData[$key]['category'][] =  array('id'=>$category->term_id,
													'name'=>$category->cat_name
													);
		}
		$ampLoopData[$key]['title'] =  the_title();
		if(has_excerpt()){
			$content = get_the_excerpt();
		}else{
			$content = get_the_content();
		}
		$ampLoopData[$key]['content'] =  strip_shortcodes( $content );
		
		$ampLoopData[$key]['fullContent'] = strip_shortcodes( get_the_content() );

		$post_date =  human_time_diff( 
                						get_the_time('U', get_the_ID() ), 
                						current_time('timestamp') ) .' '. ampforwp_translation( $redux_builder_amp['amp-translator-ago-date-text'],
                						'ago' );
		$post_date = apply_filters('ampforwp_modify_post_date',$post_date);
		$ampLoopData[$key]['post_date'] = $post_date;

		$key++;
	endwhile;

else :
	$ampLoopData['no_data'] = ampforwp_translation($redux_builder_amp['amp-translator-search-no-found'], 'It seems we can\'t find what you\'re looking for. ');
endif;		
wp_reset_postdata();
