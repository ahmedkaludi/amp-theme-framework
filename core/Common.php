<?php
add_action("amp_search", "get_AMP_search");

function get_AMP_search(){
	echo getComponent('search');
}