<!DOCTYPE HTML>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=0" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
    <script src="<?php echo get_template_directory_uri(); ?>/js/cufon.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/cufon-fonts.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/cufon-settings.js" type="text/javascript"></script>
	<?php wp_head(); ?>
    <script src="<?php echo get_template_directory_uri(); ?>/js/slp-widget.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/mapSearch.js?v=6" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/ie.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/mobile-nav.js" type="text/javascript"></script>
    <link type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" />
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css" rel="stylesheet" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/youtube-popup.js"></script>
	<script type="text/javascript">
		jQuery(function () {
			jQuery(".youtube").YouTubePopup({ autoplay: 1 });

		});
	</script>
    <link href='http://fonts.googleapis.com/css?family=Lora:700' rel='stylesheet' type='text/css'>
    <script src="<?php echo get_template_directory_uri(); ?>/js/bgr-talk.js" type="text/javascript"></script>
    
</head>

<body <?php body_class(); ?>>
	<header id="site-header">
    	<div class="navigation-wrapper">
            <h1 id="logo">
                <a href="<?php echo bloginfo('url') ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Burger 21 - Crafted Burgers and Shakes" /></a>
                <span class="hide">Burger 21</span>
            </h1>
            <div class="nav-control">
                	<a href="#nav">Navigation</a>
                </div>
            <nav id="top-navigation">
            	<span class="top-nav">
                	<?php 
						$menuParameters = array('theme_location' => 'top' ,'container' => false,'echo' => false,'items_wrap' => '%3$s', 'depth' => 0,);
						echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
					?>
                    <a class="nav-link facebook" href="http://www.facebook.com/burger21" target="_blank">Facebook</a>
                    <a class="nav-link twitter" href="http://twitter.com/myburger21" target="_blank">Twitter</a>
            	</span>   
            </nav>
            
            <nav id="navigation">
            	
            	<span class="main-nav">
                	<?php 
						$menuParameters = array('theme_location' => 'primary' ,'container' => false,'echo' => false,'items_wrap' => '%3$s', 'depth' => 0,);
						echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
					?>
            	</span>   
            </nav>
            <div id="search-box">
            	<div class="widget_slpwidgetbasic">
            	<form onsubmit="search_slp_now(); return false;">
                	<a href="<?php echo bloginfo('url') ?>/locations"><label>Find Your Burger 21</label></a>
            		<input type="text" name="search" id="address_input" />
                    <input id='radiusSelect' value="50" type="hidden">
					<input id='searchboxtest' value="test" type="hidden">
                    <input type="submit" name="search" class="slp-widget-submit" />
                </form>
                </div>
            </div>
		</div>
	</header>
    <div id="main-wrapper">