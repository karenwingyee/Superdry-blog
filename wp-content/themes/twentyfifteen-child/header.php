<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<?php
function twitter_time($a) {
    //get current timestampt
    $b = strtotime("now"); 
    //get timestamp when tweet created
    $c = strtotime($a);
    //get difference
    $d = $b - $c;
    //calculate different time values
    $minute = 60;
    $hour = $minute * 60;
    $day = $hour * 24;
    $week = $day * 7;
        
    if(is_numeric($d) && $d > 0) {
        //if less then 3 seconds
        if($d < 3) return "right now";
        //if less then minute
        if($d < $minute) return floor($d) . " seconds ago";
        //if less then 2 minutes
        if($d < $minute * 2) return "about 1 minute ago";
        //if less then hour
        if($d < $hour) return floor($d / $minute) . " minutes ago";
        //if less then 2 hours
        if($d < $hour * 2) return "about 1 hour ago";
        //if less then day
        if($d < $day) return floor($d / $hour) . " hours ago";
        //if more then day, but less then 2 days
        if($d > $day && $d < $day * 2) return "yesterday";
        //if less then year
        if($d < $day * 365) return floor($d / $day) . " days ago";
        //else return more than a year
        return "over a year ago";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>SuperDry Blog</title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/main.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="https://i.icomoon.io/public/b58cb75755/superdry/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
</head>
<body>
	<div class="main-header resp-small-hide">
		<div class="container">
			<div class="section-small">
				<div class="row">
					<div class="col-8">
						<a href="<?php echo get_site_url()?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/superdry-logo.png" alt=""></a>
					</div>
					<div class="col-4">
						<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/" class="header-search">
							<input type="text" placeholder="SEARCH" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s">
							<button type="submit" class="primary-button"><i class="icon-search"></i></button>
						</form>
					</div>
				</div>
			</div>
			<div class="section-tiny pt0">
				<div class="row">
					<div class="col-7">
						<ul class="top-menu">
							<?php wp_nav_menu( array('menu' => 'Top Menu' )); ?>
						</ul>
					</div>
					<div class="col-5 newsletter-tagline resp-med-hide">
						<span>Keep up to date: <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Sign up to our newsletter</a></span>
					    <div id="light" class="white_content">
					    <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a>
					    <p>Sign up to our newsletter</p>
					    <?php
						if( function_exists( 'mc4wp_form' ) ) {
						    mc4wp_form();
						}
						?>
					    </div>
					    <div id="fade" class="black_overlay"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="mobile-header">
		<div class="container">
			<div class="row">
				<div class="menu">
					<a href="" id="menu-open"><i class="icon-menu"></i></a>
					<a href="" id="search-open"><i class="icon-search"></i></a>
				</div>
				<div class="logo">
					<a href=""><img src="<?php bloginfo('stylesheet_directory'); ?>/images/superdry-logo.png" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<div class="mobile-menu">
		<div class="container">
			<div class="section-tiny">
				<div class="row">
					<div class="col-12">
						<ul class="mobile-options">
							<?php wp_nav_menu(); ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="search-menu">
		<div class="container">
			<div class="section-tiny">
				<div class="row">
					<div class="col-12">
						<form action="" class="header-search">
							<input type="text" placeholder="SEARCH">
							<button class="primary-button"><i class="icon-search"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
