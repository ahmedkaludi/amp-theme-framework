<?php 
// Social Icons component
function amp_social_icons($social_icons=""){
	global $loadComponent;
	$amp_social_icons = array();
	//Supported social icons	 
	$amp_social_icons = array('twitter','facebook','pinterest','google-plus','linkedin','youtube','instagram','reddit','VKontakte','snapchat','tumblr');
	if(isset($loadComponent['AMP-social-icons']) && $loadComponent['AMP-social-icons']==true){
		if($social_icons!=null){
		 ampforwp_framework_get_social_icons($social_icons);
		}
		else 
		 ampforwp_framework_get_social_icons($amp_social_icons);
	}
}
function ampforwp_framework_get_social_icons($selected_social_icons){ 
	global $redux_builder_amp;
	$social_icons_names = array();
	foreach ($selected_social_icons as $key => $value) {
	 	$social_icons_names[] = $key;
	 } ?>	
	<div class="social_icons">
	     <ul>
	        <?php if(in_array('twitter', $social_icons_names)){ ?> 
	        <a href="<?php echo $selected_social_icons['twitter']  ?>" target ="_blank"><li class="icon-twitter"></li></a>
	        <?php } ?>

	        <?php if(in_array('facebook', $social_icons_names)){ ?>
	        <a href="<?php echo $selected_social_icons['facebook']  ?>" target ="_blank"><li class="icon-facebook"></li></a>
	        <?php } ?> 

	        <?php if(in_array('pinterest', $social_icons_names)){ ?>
	        <a href="<?php echo $selected_social_icons['pinterest']  ?>" target ="_blank"><li class="icon-pinterest"></li></a>
	        <?php } ?>

	        <?php if(in_array('google-plus', $social_icons_names)){ ?>
	        <a href="<?php echo $selected_social_icons['google-plus']  ?>" target ="_blank"><li class="icon-google-plus"></li></a>
	        <?php } ?> 

	        <?php if(in_array('linkedin', $social_icons_names)){ ?>
	        <a href="<?php echo $selected_social_icons['linkedin']  ?>" target ="_blank"><li class="icon-linkedin"></li></a>
	        <?php } ?> 

	        <?php if(in_array('youtube', $social_icons_names)){ ?>
	        <a href="<?php echo $selected_social_icons['youtube']  ?>" target ="_blank"><li class="icon-youtube-play"></li></a>
	        <?php } ?> 

	        <?php if(in_array('instagram', $social_icons_names)){ ?>
	        <a href="<?php echo $selected_social_icons['instagram']  ?>" target ="_blank">  <li class="icon-instagram"></li></a>
	        <?php } ?> 

	        <?php if(in_array('reddit', $social_icons_names)){ ?> 
	        <a href="<?php echo $selected_social_icons['reddit']  ?>" target ="_blank"><li class="icon-reddit-alien"></li></a>
	        <?php } ?> 

	        <?php if(in_array('VKontakte', $social_icons_names)){ ?>
	        <a href="<?php echo $selected_social_icons['VKontakte']  ?>" target ="_blank"><li class="icon-vk"></li></a>
	        <?php } ?> 

	        <?php if(in_array('snapchat', $social_icons_names)){ ?>
	        <a href="<?php echo $selected_social_icons['snapchat']  ?>" target ="_blank"><li class="icon-snapchat-ghost"></li></a>
	        <?php } ?> 

 			<?php if(in_array('tumblr', $social_icons_names)){ ?>
	        <a href="<?php echo $selected_social_icons['tumblr']  ?>" target ="_blank"><li class="icon-tumblr"></li></a>
	        <?php } ?> 
	        </ul>
	  	</div>	
<?php 
}

//Load styling for social icons
add_action('amp_post_template_css','amp_social_icons_styles',11); 
function amp_social_icons_styles(){ ?>

/* Social icons */
@font-face {
  font-family: 'icomoon';
  src:  url('<?php echo plugin_dir_url(__FILE__) ?>fonts/icomoon.eot?b9qrme');
  src:  url('<?php echo plugin_dir_url(__FILE__) ?>fonts/icomoon.eot?b9qrme#iefix') format('embedded-opentype'),
    url('<?php echo plugin_dir_url(__FILE__) ?>fonts/icomoon.ttf?b9qrme') format('truetype'),
    url('<?php echo plugin_dir_url(__FILE__) ?>fonts/icomoon.woff?b9qrme') format('woff'),
    url('<?php echo plugin_dir_url(__FILE__) ?>fonts/icomoon.svg?b9qrme#icomoon') format('svg');
  font-weight: normal;
  font-style: normal;
}

[class^="icon-"], [class*=" icon-"]{ font-family: 'icomoon'; speak: none; font-style: normal; font-weight: normal; font-variant: normal; text-transform: none; line-height: 1;

  /* Better Font Rendering =========== */
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.icon-twitter:before{ content: "\f099";background:#1da1f2 }
.icon-facebook:before{ content: "\f09a";background:#3b5998 }
.icon-facebook-f:before{ content: "\f09a";background:#3b5998 }
.icon-pinterest:before{ content: "\f0d2";background:#bd081c }
.icon-google-plus:before{ content: "\f0d5";background:#dd4b39 }
.icon-linkedin:before{ content: "\f0e1";background:#0077b5 }
.icon-youtube-play:before{ content: "\f16a";background:#cd201f }
.icon-instagram:before{ content: "\f16d";background:#c13584 }
.icon-tumblr:before{ content: "\f173";background:#35465c }
.icon-vk:before{ content: "\f189";background:#45668e }
.icon-whatsapp:before{ content: "\f232";background:#075e54 }
.icon-reddit-alien:before{ content: "\f281";background:#ff4500 }
.icon-snapchat-ghost:before{ content: "\f2ac"; background:#fffc00 }
.social_icons{ font-size: 15px; display: inline-block; }
.social_icons ul{ list-style-type:none; padding:0;margin:0; text-align:center }
.social_icons li{ box-sizing: initial; display:inline-block; margin:5px; }
.social_icons li:before{ box-sizing: initial; color:#fff; padding: 10px; display: inline-block; border-radius: 70px; width: 18px; height: 18px; line-height: 20px; text-align: center; }

<?php }