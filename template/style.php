<?php add_action('amp_post_template_css', 'ampforwp_custom_style', 11);
function ampforwp_custom_style() {  
	global $redux_builder_amp;
	$get_customizer = new AMP_Post_Template( $post_id );
?>
/********************************************
    AMP Theme Framework Stylesheet 
*********************************************/
/* Generic WP styling */
    html { }
    body {
		font-family: 'Source Sans Pro', serif;
		font-size: 18px;
		line-height:1.4;
    }
    p,
    ol,
    ul,
    figure {
        margin: 0 0 1em;
        padding: 0;
    }
    a, a:active, a:visited {
        color:#d82370;  
        text-decoration: none 
    }
    a:hover,
    a:active,
    a:focus {
    }
    pre {
        white-space: pre-wrap;
    }
    .hidden{ display:none }
    .clearfix{ clear:both }
    /* Quotes */
    blockquote {
        background: rgba(127,127,127,.125);
        margin: 8px 0 24px 0;
        padding: 16px;
    }
    blockquote p:last-child {
        margin-bottom: 0;
    }
    .amp-wp-enforced-sizes {
        max-width: 100%;
        margin: 0 auto;
    }
    .amp-wp-unknown-size img {
        object-fit: contain;
    }

    /* Image Alignment */
    .alignright {
        float: right;
    }
    .alignleft {
        float: left;
    }
    .aligncenter {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    amp-iframe { max-width: 100%; margin-bottom : 20px; }
    .amp-wp-content,
    .amp-wp-title-bar div {
         margin: 0 auto;
     }

    /* Header */
    .amp-header{}

     /* Article */
    .amp-wp-article {
        font-weight: 400;
        margin: 1.5em auto;
        max-width: 840px;
        overflow-wrap: break-word;
        word-wrap: break-word;
    }
    /* Article Header */
    .amp-wp-article-header {
        align-items: center;
        align-content: stretch;
        margin: 1.5em 16px 1.5em;
    }
    .amp-wp-title {
        display: block;
        flex: 1 0 100%;
        font-weight: 900;
        margin: 0;
        width: 100%;
    }
    /* Article Meta */
    .amp-wp-meta {
        display: inline-block;
        flex: 2 1 50%;
        font-size: .875em;
        line-height: 1.7em;
        margin: 0;
        padding: 0;
    } 

    .amp-wp-article-header .amp-wp-meta:last-of-type {
        text-align: right;
    }
    .amp-wp-article-header .amp-wp-meta:first-of-type {
        text-align: left;
    }

    /* Featured image */
    .amp-wp-article-featured-image {
        margin: 1.5em 16px 1.5em;
    }
    .amp-wp-article-featured-image amp-img {
        margin: 0 auto;
    }
    .amp-wp-article-featured-image.wp-caption .wp-caption-text {
        margin: 0 18px;
    }
    /* Front page */
    .amp-wp-frontpage .the_content {
        padding: 10px;
    }
    .amp-wp-frontpage .ampforwp-title {
        margin-left:10px;
    }
    /* Article Content */
    .amp-wp-article a{
        text-decoration:none
    }
    .amp-wp-article-content {
        margin: 0 16px;
    }
    .amp-wp-article-content ul,
    .amp-wp-article-content ol {
        margin-left: 1em;
    }
    .amp-wp-article-content amp-img {
        margin: 0 auto;
    }
    .amp-wp-article-content amp-img.alignright {
        margin: 0 0 1em 16px;
    }
    .amp-wp-article-content amp-img.alignleft {
        margin: 0 16px 1em 0;
    }
    /* Captions */
    .wp-caption {
        padding: 0;
    }
    .wp-caption-text {
        font-size: 12px;
        line-height: 1.5em;
        margin: 0;
        padding: .66em 10px .75em;
        text-align: center;
    }
    /* AMP Media */
    amp-iframe,
    amp-youtube,
    amp-instagram,
    amp-vine {
        margin: 0 -16px 1.5em;
    }
    .amp-wp-article-content amp-carousel amp-img {
        border: none;
    }
    amp-carousel > amp-img > img {
        object-fit: contain;
    }
    .amp-wp-iframe-placeholder {
        background-size: 48px 48px;
        min-height: 48px;
    }
    /* Article Footer Meta */
    .amp-wp-article-footer .amp-wp-meta {
        display: block;
    }
    .amp-wp-tax-category span{
        margin-right:5px;
    }
    .amp-wp-tax-category,
    .amp-wp-tax-tag {
        font-size: .875em;
        line-height: 1.5em;
        margin: 1.5em 16px;
    }
    .ampforwp-comment-button {
        margin-bottom:20px;
    }
    .page-title {
        margin: 0 15px;
    }
    /* AMP Footer */
    .amp-wp-footer {
        margin: calc(1.5em - 1px) 0 0;
        padding-bottom:25px;
    }
    .amp-wp-footer div {
        margin: 0 auto;
        max-width: calc(840px - 32px);
        padding: 1.25em 16px 1.25em;
        position: relative;
    }
    .amp-wp-footer h2 {
        font-size: 1em;
        line-height: 1.375em;
        margin: 0 0 .5em;
    }
    .amp-wp-footer p {
        font-size: .8em;
        line-height: 1.5em;
        margin: 0 15px 0 0;
    }
    .amp-wp-footer a {
        text-decoration: none;
    }
    .copyright_txt{ float:left }
    .back-to-top { float:right }
	/* Header */

	.toggle-text  {
		position: absolute;
		right: 0;
        height: 22px;
        width: 28px;
	}
	.toggle-text span  {
        display: block;
        position: absolute;
        height: 2px;
        width: 25px;
        background: #ffffff;
        border-radius: 19px;
        opacity: 1;
        left: 0;
    }
    .toggle-text span:nth-child(2){
        top: 7px;
    }
    .toggle-text span:nth-child(3){
        top:14px;
    }

	/* Homepage */
    .amp-wp-home .amp-wp-meta{
        margin:5px 0px
    }
	.amp-wp-home .amp-wp-content p {
		display: inline-block;
		width: 100%;
	}
	.ampforwp-custom-index .amp-wp-title a {
		text-decoration: none;
	}
	.amp-wp-meta {
		display: flex;
	}

	.ampforwp-custom-index .amp-wp-content {
		margin-bottom: 30px;
	}
    /* Home Pagination */
    .pagination-holder{
        margin: 1.5em 16px 1.5em
    }
    #pagination .next {
        display: inline-block;
        float: right
    }
    #pagination .prev {
        display: inline-block;
    }
    .amp-wp-home .amp-wp-content p {
        display: inline;
    }

	/* Single */
	.amp-wp-article-content amp-img {
		max-width : 100%;
	}
	.amp-wp-meta.amp-wp-tax-category,
	.amp-wp-meta.amp-wp-tax-tag {
		margin : 0
	}
	.amp-wp-meta.amp-wp-tax-tag  {
		display : initial
	}

	/* Comments */
    .amp-disqus-comments {
        padding: 15px;
    }
    .amp-disqus-comments amp-iframe{
        background: none;
    }
    .comments_list{
        margin: 2.5em 16px 2.5em
    }
	main .amp-wp-content.comments_list {
		background: none;
		box-shadow: none;
		max-width: 1030px;
	}
	.comments_list div{
	    display:inline-block;
	}
	.comments_list ul{
	    margin:0;
	    padding:0
	}
	.comments_list ul.children{
	    padding-bottom:10px;
		margin-left: 4%;
		width: 96%;
	}
	.comments_list ul li p{
        margin: 0;
        font-size: 14px;
        clear: both;
        padding-top: 5px;
	}

    .comments_list ul li .says{
        margin-right: 4px;
    }
	.comments_list ul li .comment-body{
	    padding: 10px 0px 15px 0px;
	}
	.comment-author{ float:left }
	.single-post footer.comment-meta{
		padding-bottom: 0;
	}
	.comments_list li li{
	    margin: 20px 20px 10px 20px;
	    background: #f7f7f7;
	    box-shadow: none;
	    border: 1px solid #eee;
	}
	.comments_list li li li{
	    margin:20px 20px 10px 20px
	}
	/* Slide Navigation code */
	amp-sidebar {
	  width: 250px;
	}
	.amp-sidebar-close{
	    font-size: 12px;
        font-family: sans-serif;
	    background: rgba(0, 0, 0, 0.25);
	    letter-spacing: 1px;
	    display: inline-block;
	    padding: 10px;
	    border-radius: 100px;
	    line-height: 8px;
	    margin: 14px;
	    left: 191px;
	    color: #fff;
	}

	.toggle-navigation ul{
	    list-style-type: none;
	    margin: 0;
	    padding: 0;
	    display: inline-block;
	    width: 100%
	}

	.toggle-navigation ul li{
	    font-size: 13px;
	    border-bottom: 1px solid rgba(0, 0, 0, 0.11);
	    padding: 11px 0px;
	    width: 25%;
	    float: left;
	    text-align: center;
	    margin-top: 6px
	}
	.toggle-navigation ul ul{
	    display: none
	}
	.toggle-navigation ul li a{
	    color: #eee;
	    padding: 15px;
	}
	.toggle-navigation{
	    display: none;
	    background: #444;
	}
	/* Notifications */
    #amp-user-notification1 p {
        display: inline-block;
    }
    amp-user-notification {
        padding: 5px;
        text-align: center;
        background: #fff;
        border-top: 1px solid;
    }
    amp-user-notification button {
        padding: 8px 10px;
        margin-left: 5px;
            border: 0;
    }
    amp-user-notification button:hover {
        cursor: pointer
    }
    /* Advertisement */
    .amp-ad-wrapper {
        text-align: center
    }
    /* Sticky Social bar in Single */
    <?php if( $redux_builder_amp['enable-single-social-icons'] == true && is_single() ) { ?>
        body { padding-bottom: 43px; }
    <?php } ?>

 
    .amp-wp-tax-category span:first-child:after {
        content: ' ';
    }
    .amp-wp-tax-category span:after,
    .amp-wp-tax-tag span:after {
        content: ', ';
    }
    .amp-wp-tax-category span:last-child:after,
    .amp-wp-tax-tag span:last-child:after  {
        content: ' ';
    }





	.amp-loop-list {
		border-bottom: 1px solid #ededed;
		padding-bottom: 40px;
	} 
	.ampforwp-custom-index .amp-wp-content {
		margin-bottom: 30px;
		margin-top: 0;
		padding-bottom: 25px;
	}

	.amp-wp-title {	 
		color: #000 ;
		font-weight: 600;
		font-size: 30px;
		font-family: 'Source Serif Pro', serif;
		line-height: 36px;
		margin-bottom: 10px;
	}

    /* Archive */
    .archive-page-title{
        margin:25px 25px 10px 25px;
    }

    <?php  // Custom CSS Editor from Options panel
    echo $redux_builder_amp['css_editor']; ?>
    
    <?php // RTL Language CSS
    if( is_rtl() ) { ?>
    <?php } ?>
<?php } ?>