<?php
function meue_html(){
	 wp_nav_menu( array(
            'theme_location' => 'amp-menu',
            'container'=>'aside',
            'menu'=>'ul',
            'menu_class'=>'nav nav--vertical',
        ) );
}

//Load styling for Menu
add_action('amp_post_template_css','amp_menu_styles',11); 
function amp_menu_styles(){ ?>
	            /*Menu styles above*/
            aside {
              width: 150px;
            }
            .nav--vertical {
              list-style-type: none;
              margin: 0;
              padding: 0;
            }
            .nav--vertical a {
              color: #333;
            }
            .nav--vertical a:hover {
              color: #000 ;
            }
            .nav--vertical li {
              position: relative;
              display: block;
            }
            .nav--vertical li.menu-item-has-children ul {
              display: none;
            }
            .nav--vertical li.menu-item-has-children:hover > ul {
              display: block ;
            }
            .nav--vertical li.menu-item-has-children > ul > li {
              padding-left: 10px ;
            }
            .nav--vertical li.menu-item-has-children:after {
                content: "";
                position: absolute;
                padding: 10px;
                right: 0;
                background: red;
                top: 0;
                z-index: 10000;
                border-top: 4px solid transparent;
                border-bottom: 4px solid transparent;
                border-left: 4px solid #53c0ad;
            }
            .nav--vertical > li a {
              text-decoration: none;
              padding: 7px 10px;
              display: block;
              margin-bottom: 1px;
            }
            .nav--vertical > li ul {
              list-style-type: none;
              margin: 0;
              padding: 0;
              position: relative;
              /* left: 100%; */
            }
            .nav--vertical > li ul, .nav--vertical > li ul {
              /*min-width: 150px;
              top: 0;*/
              border-left: 1px solid #fff;
            }

            .nav--vertical li a {
              -webkit-transition: all 0.2s ease-in-out;
              -moz-transition: all 0.2s ease-in-out;
              transition: all 0.2s ease-in-out;
            }
            .nav--vertical > li > a {
              background: #e5e5e5;
            }
            .nav--vertical > li > li a {
              background: #e5e5e5;
            }
            .nav--vertical > li > li a {
              background: #e5e5e5;
            }

            .nav--vertical li:hover a {
              background: #ccc;
            }
            .nav--vertical li:hover li:hover > a {
              background: #ccc;
            }
<?php }