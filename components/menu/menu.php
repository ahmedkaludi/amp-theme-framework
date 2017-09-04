<?php
if(!isset($loadComponent['AMP-menu']) ) {
	return false;
}
function meue_html(){
	 wp_nav_menu( array(
            'theme_location' => 'amp-menu',
            'container'=>'aside',
            'menu'=>'ul',
            'menu_class'=>'nav nav--vertical',
            
            //'walker' => new AMPforWP_Menu_Walker()
        ) );
}