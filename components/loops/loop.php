<?php
function amp_loop($selection,$data=array()){
	if ( have_posts() ) :
		switch($selection){
			case 'start':
				amp_start_loop();
			break;	
			case 'end':
				amp_end_loop();
			break;		
		}
		
	else : // If no posts exist.
		echo (isset($data['loop_donot_have_data'])? $data['loop_donot_have_data']: '');
	endif; // End loop.
}
function amp_loop_title($data=array()){
	$data = array_filter($data);
	if(isset($data['start']) && $data['start']!=""){
		echo $data['start'];
	}else{echo '<h2 class="amp-wp-title">';  }

	if(isset($data['link']) || $data['link']!="false"){
		echo '<a href="'. esc_url( trailingslashit( $ampforwp_amp_post_url ) ) .'"> '.the_title().'</a></h2>';
	}
	if(isset($data['end']) && $data['end']!=""){
		echo $data['end'];
	}else{echo '</h2>';  }
} 

function amp_loop_date(){
	echo '<div class="featured_time">'.human_time_diff( get_the_time('U', get_the_ID() ), current_time('timestamp') ) .' '. ampforwp_translation( $redux_builder_amp['amp-translator-ago-date-text'],'ago' );
	echo the_date();
	echo  $post_date .'</div>'
}

function amp_loop_excerpt($no_of_words=15){
	if(has_excerpt()){
		$content = get_the_excerpt();
	}else{
		$content = get_the_content();
	}
	echo '<p>'. wp_trim_words( strip_shortcodes( $content ) , $no_of_words ) .'</p>';
}

function amp_loop_parmalink($amp_query_var ='amp'){
	return $ampforwp_amp_post_url = trailingslashit( get_permalink() ) . $amp_query_var ;
}
function amp_loop_image(){
	if ( has_post_thumbnail() ) { 

		$thumb_id = get_post_thumbnail_id();
		$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'medium', true);
		$thumb_url = $thumb_url_array[0];
		
		echo '<div class="home-post_image"><a href="'. esc_url( trailingslashit( amp_loop_parmalink() ) ).'"><amp-img layout="responsive" src="'. $thumb_url .'" width=450 height=270 ></amp-img></a></div>';
     } 
} 

function amp_loop_exce(){
	echo the_post_thumbnail(); 
} 

function amp_start_loop(){
	while ( have_posts() ) : the_post();
}
function amp_end_loop(){
	endwhile; // End of one post.
}

function amp_loop_title(){

}








/**
 * Parameter Data : Array
 * Inside Data we get all types of data as Key & value pairs We described as delow here
 * ELSE CASE: loop_donot_have_data
 * before_loop
 * before_loop_start
 * loop_header
 * before_loop_content
 * loop_content
**/
function amp_loop_selecter($data=array()){
	if ( have_posts() ) :
		echo (isset($data['before_loop'])? $data['before_loop']: '');
		while ( have_posts() ) : the_post();
			echo (isset($data['before_loop_start'])? $data['before_loop_start']: '');
			//Loop Content Started from here
			echo "<article>";
				echo (isset($data['loop_header'])? $data['loop_header']: '');
				echo (isset($data['before_loop_content'])? $data['before_loop_content']: '');
				echo (isset($data['loop_content'])? $data['loop_content']: '');
				echo (isset($data['after_loop_content'])? $data['after_loop_content']: '');
			echo "</article>";
			echo (isset($data['after_loop_start'])? $data['after_loop_start']: '');

	else : // If no posts exist.
		echo (isset($data['loop_donot_have_data'])? $data['loop_donot_have_data']: '');
	endif; // End loop.
}
/*

function amp_loop($data){
	if ( have_posts() ) :
			$amp_loop_data['amp_have_posts'] = true;
	else : // If no posts exist.
		$amp_loop_data['amp_have_posts'] = true;
		echo (isset($data['loop_donot_have_data'])? $data['loop_donot_have_data']: '');
	endif; // End loop.
}*/