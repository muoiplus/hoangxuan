<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  xmlns:og="http://ogp.me/ns#"
      xmlns:fb="https://www.facebook.com/2008/fbml" <?php language_attributes();?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type') ?>;charset=<?php bloginfo('charset'); ?>" />
<meta name='viewport' content='width=device-width, user-scalable=no,
    initial-scale=1, maximum-scale=1, minimum-scale=1'/>
<?php if(is_home()){?>
<title><?php bloginfo('name');?></title>
<?php }elseif(is_single()){?>
<title><?php $actual_link = "$_SERVER[REQUEST_URI]";
$fullCurrentCat = explode('/',$actual_link);
wp_title('');
echo " - ".get_category_by_slug($fullCurrentCat[2])->name;
?></title>
<?php } else {?>
<title><?php wp_title('');?></title>
<?php }?>
<link rel="shortcut icon" type="image/png" href="<?php bloginfo('template_url')?>/images/favicon.png"/>
<!--[if IE]>
<style type="text/css">
</style>
<![endif]-->
<!-- CSS file -->
<link href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" rel="stylesheet">
<link href="<?php bloginfo('template_url')?>/css/substyle.css" rel="stylesheet" type="text/css">
<link href="<?php bloginfo('template_url')?>/css/select.css" rel="stylesheet" type="text/css">
<link href="<?php bloginfo('template_url')?>/css/colorbox.css" rel="stylesheet" type="text/css">
<link href="<?php bloginfo('template_url')?>/css/mobile.css" type="text/css" rel="stylesheet" media="only screen and (max-width : 768px)">
<link href="<?php bloginfo('template_url')?>/css/320.css" type="text/css" rel="stylesheet" media="only screen and (max-width : 480px)">
<?php wp_head();?>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<!--<script type="text/javascript" src="<?php// echo(includes_url()); ?>js/jquery/jquery.js"></script>-->
<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/jquery.selectBoxIt.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/jquery.hoverIntent.minified.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/aarmi.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/aarmi-mobile.js"></script>
<script type="text/javascript">
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-51809075-1', 'aamri.org.au');
  ga('send', 'pageview');
</script>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
	<div id="header">
    	<div class="inner">
    	<div class="logo"><div class="logo_inner"><a href="<?php bloginfo('home') ?>"><img src="<?php bloginfo('template_url')?>/images/logo.png" alt="logo" title="Aamri"/></a></div></div>
    	<!--<div class="top_menu">
        	<ul><li><a href="/">Home</a></li>
            	<li><a href="#content">Skip to content</a></li>
                <li><a href="javascript:window.print()">Print</a></li>
                <li class="text_size"><span>Text size</span><a href="javascript:increaseFontSize();">+</a><a href="javascript:decreaseFontSize();">-</a> </li>
                </ul>
                <div class="search_bar"><?php /*get_search_form(); */?></div>
            	<div class="twitter_icon"><a href="http://twitter.com/AAMRI_Aus" target="_blank"><img src="<?php /*bloginfo('template_url')*/?>/images/twitter_blue.png"></a></div>
        </div>-->
            <div class="right-header">
                <ul class="languages">
                    <li class="en"><a href="#">English</a></li>
                    <li class="vi"><a href="#">Tiếng Việt</a></li>
                </ul>
                <div class="search_bar"><?php get_search_form(); ?></div>
                <div class="contact-header">
                    <p class="email-header">info@password.edu.vn</p>
                    <p class="phone-header">0979.958.351</p>
                </div>
            </div>
        <div class="menu_icon"><a id="mobile_icon_menu" href="#2">Menu</a></div>
        <div class="clear"></div>
        </div>
        <div class="main_menu">
        	<div class="inner">
        	<?php wp_nav_menu(array(
    		'theme_location' => 'top',
    		'container' => '',
    		'menu_id' => '',
    		'menu_class' => 'main-menu'
    	)); ?> <div class="clear"></div></div>
        <div class="clear"></div>
        </div>
          <div class="mobile_menu">
            <div class="search_mobile"><form role="search" method="get" id="searchform-mobile" action="<?php echo home_url( '/' ); ?>">
    <div><label class="screen-reader-text" for="s">Search for:</label>
        <input type="text" class="input_text" maxlength="35" placeholder="Search AAMRI" value="" name="s" id="s2" />
        <input type="submit" id="searchsubmit" class="button" value="Search" />
    </div>
</form></div>
            <?php wp_nav_menu(array(
            'theme_location' => 'top',
            'container' => '',
            'menu_id' => '',
            'menu_class' => 'mobile-menu'
        )); ?>
        <a href="http://twitter.com/AAMRI_Aus" target="_blank" class="fb_mobile_mn"><img src="<?php bloginfo('template_url')?>/images/tw.png" width="36"/></a>
        </div>
    </div>
