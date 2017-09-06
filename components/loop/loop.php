<?php
global $redux_builder_amp;
global $ampLoopData;
global $wpdb, $wp_query;
$counterOffset = 0;
require_once AMP_FRAMEWORK_COMOPNENT_DIR_PATH."/loop/standard_qr.php";
	function amp_loop($selection,$data=array()){
		global $ampLoopData;
		if ( !isset($ampLoopData['no_data']) ) :
			switch($selection){
				case 'start':
					return amp_start_loop();
				break;	
				case 'end':
					return amp_end_loop();
				break;		
			}
		else : // If no posts exist.
			 return false;
		endif; // End loop.
	}

	function amp_loopnoData(){
		echo $ampLoopData['no_data'];
	}

	function amp_start_loop(){
		global $ampLoopData,$counterOffset;
		if($counterOffset==count($ampLoopData)-1 && $counterOffset<=count($ampLoopData)-1){
			return true;
		}
		return false;
	}
	function amp_end_loop(){
		global $ampLoopData, $counterOffset;
		$counterOffset++;
		/*if($counterOffset==count($ampLoopData)-1){
			unset($ampLoopData);
		}else{
			amp_start_loop();
		}*/
	}

	function amp_loop_title($data=array()){
		global $ampLoopData,$counterOffset;
		$data = array_filter($data);
		$tag = 'h2';
		if(isset($data['tag']) && $data['tag']!=""){
			$tag = $data['tag'];
		}
		$attributes = 'class="amp-wp-title"';
		if(isset($data['attributes']) && $data['attributes']!=""){
			$attributes = $data['attributes'];
		}
		echo '<'.$tag.' '.$attributes.'>';
			if(isset($data['link']) || $data['link']!="false"){
				echo '<a href="'. $ampLoopData[$counterOffset]['ampforwp_amp_post_url'] .'">';
			}
		echo $ampLoopData[$counterOffset]['title'];
		
			if(isset($data['link']) || $data['link']!="false"){
				echo  '</a>';
			}
		echo '</'.$tag.'>';
	} 

function amp_loop_date(){
	global $ampLoopData,$counterOffset;
	
	echo '<div class="featured_time">'.$ampLoopData[$counterOffset]['post_date'] .'</div>';
}

function amp_loop_excerpt($no_of_words=15,$tag = 'p'){
	global $ampLoopData,$counterOffset;
	echo '<'.$tag.'>'. wp_trim_words(  $ampLoopData[$key]['content'], $no_of_words ) .'</'.$tag.'>';
}
function amp_loop_all_content($tag = 'p'){
	global $ampLoopData,$counterOffset;
	echo '<'.$tag.'>'. $ampLoopData[$key]['fullContent'] .'</'.$tag.'>';
}

function amp_loop_parmalink($amp_query_var ='amp'){
	global $ampLoopData,$counterOffset;
	echo $ampLoopData[$counterOffset]['ampforwp_amp_post_url'];
}
function amp_loop_image($data=array()){
	global $ampLoopData,$counterOffset;
	if (isset($ampLoopData[$counterOffset]['thumbnail'])  ) { 
		$tag = 'div';
		$tagClass = '';
		$imageClass = 'class =';
		if(isset($data['tag']) && $data['tag']!=""){
			$tag = $data['tag'];
		}
		if(isset($data['tag_class']) && $data['tag_class']!=""){
			$tag_class = $data['tag_class'];
		}
		if(isset($data['image_class']) && $data['image_class']!=""){
			$imageClass .= '"'.$data['image_class'].'"';
		}
		echo '<'.$tag.' class="home-post_image '.$tag_class.'">';
		echo '<a href="'. $ampLoopData[$counterOffset]['ampforwp_amp_post_url'].'">';
		echo '<amp-img '.$imageClass.' layout="responsive" src="'. $ampLoopData[$counterOffset]['thumbnail'] .'" width=450 height=270 ></amp-img>';
		echo '</a>';
		echo '</'.$tag.'>';
     } 
} 

function amp_loop_exce(){
	echo the_post_thumbnail(); 
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
		endwhile;
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