<?php
/**
 * Template Name: Front Page Template
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
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/main.css" media="screen" type="text/css" />
	<link rel="stylesheet" id="ajax-load-more-css" href="http://localhost/superdry-blog/wp-content/plugins/ajax-load-more/core/css/ajax-load-more.css?ver=4.2.2" type="text/css" media="all">
	<link rel="stylesheet" href="https://i.icomoon.io/public/b58cb75755/superdry/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	
</head>
<body>
	<div class="main-header resp-small-hide">
		<div class="container">
			<div class="section-small">
				<div class="row">
					<div class="col-8">
						<a href=""><img src="<?php bloginfo('template_directory'); ?>/images/superdry-logo.png" alt=""></a>
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
							<li>
								<a href="">Categories</a>
							</li>
							<li>
								<a href="">International</a>
							</li>
							<li>
								<a href="">Superdry.com</a>
							</li>
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
					<a href=""><img src="<?php bloginfo('template_directory'); ?>/images/superdry-logo.png" alt=""></a>
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
							<li><a href="">Categories <i class="icon-chevron-right"></i></a></li>
							<li><a href="">International<i class="icon-chevron-right"></i></a></li>
							<li><a href="">Superdry.com<i class="icon-chevron-right"></i></a></li>
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
	<div class="section-tiny home-content">
		<div class="container">
			<div class="featured-content row">
				<div class="col-8 slider">
					<?php
					$recentpost = new WP_Query("showposts=3"); 
					while($recentpost->have_posts()) : $recentpost->the_post(); 
					?>					
					<div class="post">	
						<a href="<?php echo get_permalink();?>">									 
							<div class="img">
								<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" alt="">
							</div>
							<div class="post-overlay">							
								<h2 class="post-title"><?php the_title(); ?></h2>
								<p class="post-author">By <?php the_author(); ?></p>
								<p class="post-excerpt"><?php the_excerpt(); ?></p>							
							</div>	
						</a>					
					</div>					
					<?php endwhile; ?>				
				</div>
				<div class="col-4 selector resp-small-hide">
				<?php
				 global $post;
				 $myposts = get_posts('numberposts=3');
				 foreach($myposts as $post) :
				 ?>
					
					<div class="post">
					<a href="<?php echo get_permalink();?>">
						<div class="img">
							<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" alt="">
						</div>
						<div class="post-overlay">
							<h2 class="post-title"><?php the_title(); ?></h2>
						</div>
					</a>
					</div>
									
				<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>
	<div class="page-content">
		<div class="container">
			<div class="row">
				<div class="col-8 main-content">
					<div class="masonry">
						<div class="grid-sizer"></div>
						<div class="gutter-sizer"></div>
						<?php
						global $post;
						$myposts = get_posts(array(
												    'offset'    =>  3,
												    'numberposts'   =>  12,
												));
						foreach($myposts as $post) :
							setup_postdata($post);
				 		?>	
				 		
						<div class="post">
						<a href="<?php echo get_permalink();?>">
							<div class="img">
								<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" alt="">
							</div>
							<div class="post-overlay">
								<h2 class="post-title"> <?php the_title(); ?> </h2>
								<p class="post-author">By <?php the_author(); ?> - <?php echo get_the_date(); ?></p>
								<p class="post-excerpt"><?php echo get_the_excerpt(); ?></p>
								<a href="<?php echo get_permalink();?>" class="read-more">Read More</a>
							</div>
						</a>
						</div>
						
						<?php endforeach; wp_reset_postdata();?>
											</div>
					<div class="section pagination tac">
						<div class="hidden">
							
						</div>
						<?php echo do_shortcode('[ajax_load_more post_type="post" offset="12" pause="true" scroll="false" button_label="Load More"]'); ?>

						<div class="resp-small-hide">
							<a href="" class="primary-button">Load More</a>

						</div>
					</div>
				</div>
				<div class="col-4 side-content resp-small-hide">
					<div class="side-block">
						<h3>Twitter <span class="follow"><a href="https://twitter.com/intent/follow?screen_name=superdry" data-show-count="false">Follow us </a><i class="icon-circle-plus"></i></span></h3>
						
						<div class="tweets">
							<ul>
								<?php $tweets = kebo_twitter_get_tweets(); ?>

								<?php $i = 0; ?>

								<?php if ( isset( $tweets->{0}->created_at ) ) : ?>

								    <?php foreach ($tweets as $tweet) : ?>

								        <li>
								        	<div class="tweet-head">
								        	
								        	<img src="<?php echo $tweet->user->profile_image_url_https; ?>" alt="">
											<span class="name"><?php echo $tweet->user->name; ?></span>
											<?php
											$date = DateTime::createFromFormat('M j H:i:s P Y', $tweet->created_at);
											
											?>
											<span class="username">@<?php echo $tweet->user->screen_name; ?> - <?php echo twitter_time($tweet->created_at); ?></span>
										</div>
										<div class="text">
											<?php
											// make a URL in text link
											if(substr( $tweet->text, 0, 2 ) === "RT")	
											{
												$text = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]","<a href=\"\\0\">\\0</a>", $tweet->text);

												$text = preg_replace('/(@(\w+))/', '<a href="http://twitter.com/\2">\1</a>', $text);
											}	
											else{
												$text = $tweet->text;
											}										
											?>
											<p><?php echo $text; ?></p>
										</div>
								        <li>

								        <?php if (++$i == 3) break; ?>

								    <?php endforeach; ?>

								<?php else : ?>

								    <p>Sorry, the Tweet data is not in the expected format.</p>

								<?php endif; ?>
								
							</ul>
						</div>
					</div>
					<div class="side-block">
						<h3>Instagram <span class="follow"><a href="https://instagram.com/superdryglobal/?hl=en" onclick="PopupCenter('https://instagram.com/superdryglobal/?hl=en', 'newwindow', '500', '350'); return false;">Follow us <i class="icon-circle-plus"></i></a></span></h3>
						<div class="instas">
							<?php
							//user info
							$userid = "234454678";
							$accessToken = "234454678.1657423.4005355916b0481a8923a2f6bfd6c052";

							//amount 
							$count = "4";
							        
							// Gets our data
					        function fetchData($url){
					             $ch = curl_init();
					             curl_setopt($ch, CURLOPT_URL, $url);
					             curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					             curl_setopt($ch, CURLOPT_TIMEOUT, 20);
					             // using HTTPs URL, you need to enable this parameter
					             curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					             $result = curl_exec($ch);
					             curl_close($ch); 
					             return $result;
					        }

					        // Pulls and parses data.
					        $result = fetchData("https://api.instagram.com/v1/users/$userid/media/recent/?access_token=$accessToken&count=$count");
					        $result = json_decode($result);
						    ?>
						    <ul>
						    <?php foreach ($result->data as $post): ?>
						        <li>
						        	<!--Link only works on non-private accounts -->
									<a href="<?php echo $post->link ?>" target="_blank" title="<?php echo $post->caption->text ?>"><img src="<?php echo $post->images->standard_resolution->url ?>" alt="<?php echo $post->caption->text ?>" /></a>
								</li>
						    <?php endforeach ?>	
						    </ul>			
						</div>
						<?php
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="mobile-footer">
		<div class="container">
			<div class="section mobile-signup">
				<div class="row">
					<div class="col-12">
						<h2><i class="icon-mail"></i> Newsletter Signup</h2>
						<!-- <form action="" method="post" class="mobile-newsletter-signup">
							<input type="text" name="email" placeholder="Enter your email">
							<button action="submit">Mens</button>
							<button action="submit">Womens</button>
						</form> -->
						<?php
						if( function_exists( 'mc4wp_form' ) ) {
						    mc4wp_form();
						}
						?>
					</div>
				</div>
			</div>
			<div class="section mobile-footer-menu">
				<div class="row">
					<div class="col-12">
						<ul class="mobile-footer-list">
							<li>
								<a href="" class="sub-open">FOLLOW US ON <i class="icon-plus right"></i></a>
								<ul class="sub-menu">
									<li>
										<!-- RSS feed does not work on chrome-->
										<a href="<?php echo get_site_url().'/feed'; ?>"><i class="icon-feed"></i> Superdry Rss Feed <i class="icon-chevron-right right"></i></a>
									</li>
									<li>
										<a href="https://m.facebook.com/Superdry" onclick="PopupCenter('https://m.facebook.com/Superdry', 'newwindow', '500', '500'); return false;"><i class="icon-facebook"></i> Facebook <i class="icon-chevron-right right"></i></a>
									</li>
									<li>
										<a href="https://twitter.com/intent/follow?screen_name=superdry" data-show-count="false"><i class="icon-twitter"></i> Twitter <i class="icon-chevron-right right"></i></a>
									</li>
									<li>
										<a href="https://instagram.com/superdryglobal/?hl=en" onclick="PopupCenter('https://instagram.com/superdryglobal/?hl=en', 'newwindow', '500', '500'); return false;"><i class="icon-instagram"></i> Instagram <i class="icon-chevron-right right"></i></a>
									</li>
									<li>
										<a href="https://www.pinterest.com/superdryglobal/" onclick="PopupCenter('http://www.pinterest.com/superdryglobal/pins/follow/?guid=jSQwSin82cSS-0', 'newwindow', '800', '500'); return false;"><i class="icon-pinterest"></i> Pinterest <i class="icon-chevron-right right"></i></a>
									</li>
								</ul>
							</li>
							<li>
								<a href="" class="sub-open">Shop at superdry.com <i class="icon-plus right"></i></a>
								<ul class="sub-menu">
									<li>
										<a href=""><i class="icon-feed"></i> Superdry Rss Feed</a>
									</li>
									<li>
										<a href=""><i class="icon-facebook"></i> Facebook</a>
									</li>
									<li>
										<a href=""><i class="icon-twitter"></i> Twitter</a>
									</li>
									<li>
										<a href=""><i class="icon-instagram"></i> Instagram</a>
									</li>
									<li>
										<a href=""><i class="icon-pinterest"></i> Pinterest</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="" class="sub-open">Customer Services<i class="icon-plus right"></i></a>
								<ul class="sub-menu">
									<li>
										<a href=""><i class="icon-feed"></i> Superdry Rss Feed</a>
									</li>
									<li>
										<a href=""><i class="icon-facebook"></i> Facebook</a>
									</li>
									<li>
										<a href=""><i class="icon-twitter"></i> Twitter</a>
									</li>
									<li>
										<a href=""><i class="icon-instagram"></i> Instagram</a>
									</li>
									<li>
										<a href=""><i class="icon-pinterest"></i> Pinterest</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="" class="sub-open">The Brand <i class="icon-plus right"></i></a>
								<ul class="sub-menu">
									<li>
										<a href=""><i class="icon-feed"></i> Superdry Rss Feed</a>
									</li>
									<li>
										<a href=""><i class="icon-facebook"></i> Facebook</a>
									</li>
									<li>
										<a href=""><i class="icon-twitter"></i> Twitter</a>
									</li>
									<li>
										<a href=""><i class="icon-instagram"></i> Instagram</a>
									</li>
									<li>
										<a href=""><i class="icon-pinterest"></i> Pinterest</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="" class="sub-open">Information <i class="icon-plus right"></i></a>
								<ul class="sub-menu">
									<li>
										<a href=""><i class="icon-feed"></i> Superdry Rss Feed</a>
									</li>
									<li>
										<a href=""><i class="icon-facebook"></i> Facebook</a>
									</li>
									<li>
										<a href=""><i class="icon-twitter"></i> Twitter</a>
									</li>
									<li>
										<a href=""><i class="icon-instagram"></i> Instagram</a>
									</li>
									<li>
										<a href=""><i class="icon-pinterest"></i> Pinterest</a>
									</li>
								</ul>
							</li>
						</ul>
						<div class="country-select">
							<h2>SELECT YOUR COUNTRY</h2>
							<select name="" id="">
								<option value="">England</option>
								<option value="">France</option>
								<option value="">Sweden</option>
							</select>
						</div>
						
					</div>

				</div>
			</div>
		</div>
	</div>
	<div class="main-footer resp-small-hide">
		<div class="container">
			<div class="section">
				<div class="row">
					<div class="col-5">
						<div class="newsletter-tagline">
							<span>Keep up to date: <a href="">Sign up to our newsletter</a></span>
								<?php
								if( function_exists( 'mc4wp_form' ) ) {
								    mc4wp_form();
								}
								?>
							<div class="follow">
								<h4>Follow us on</h4>
								<!-- RSS feed does not work on chrome-->
								<a href="<?php echo get_site_url().'/feed'; ?>"><i class="icon-feed"></i></a>
							
								<a href="https://m.facebook.com/Superdry" onclick="PopupCenter('https://m.facebook.com/Superdry', 'newwindow', '500', '500'); return false;"><i class="icon-facebook"></i></a>
							
								<a href="https://twitter.com/intent/follow?screen_name=superdry" data-show-count="false"><i class="icon-twitter"></i></a>
							
								<a href="https://instagram.com/superdryglobal/?hl=en" onclick="PopupCenter('https://instagram.com/superdryglobal/?hl=en', 'newwindow', '500', '500'); return false;"><i class="icon-instagram"></i></a>

								<a href="https://www.pinterest.com/superdryglobal/" onclick="PopupCenter('http://www.pinterest.com/superdryglobal/pins/follow/?guid=jSQwSin82cSS-0', 'newwindow', '800', '500'); return false;"><i class="icon-pinterest"></i></a>
							</div>
							
						</div>
					</div>
					<div class="col-7">
						<div class="row">
							<div class="col-4">
								<h4>Customer Services</h4>
								<ul>
									<li><a href="">FAQS</a></li>
									<li><a href="">CONTACT US</a></li>
								</ul>
							</div>
							<div class="col-4">
								<h4>The Brand</h4>
								<ul>
									<li><a href="">ABOUT US</a></li>
									<li><a href="">CORPORATE</a></li>
									<li><a href="">RECRUITMENT</a></li>
									<li><a href="">SUPERDRY PLAYER</a></li>
								</ul>
							</div>
							<div class="col-4">
								<h4>Information</h4>
								<ul>
									<li><a href="">Terms & Conditions</a></li>
									<li><a href="">Privacy Policy</a></li>
									<li><a href="">Store Directory</a></li>
									<li><a href="">Cookie Consent</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">
	$('.slider .post:first-child').css('display','inline-block');
	var currentIndex = 0,
	  items = $('.slider .post'),
	  itemAmt = items.length;

	function cycleItems() {
	  var item = $('.slider .post').eq(currentIndex);
	  items.hide();
	  item.css('display','inline-block');
	}

	var autoSlide = setInterval(function() {
	  currentIndex += 1;
	  if (currentIndex > itemAmt - 1) {
	    currentIndex = 0;
	  }
	  cycleItems();
	}, 4000);

	$('.next').click(function() {
	  clearInterval(autoSlide);
	  currentIndex += 1;
	  if (currentIndex > itemAmt - 1) {
	    currentIndex = 0;
	  }
	  cycleItems();
	});

	$('.prev').click(function() {
	  clearInterval(autoSlide);
	  currentIndex -= 1;
	  if (currentIndex < 0) {
	    currentIndex = itemAmt - 1;
	  }
	  cycleItems();
	});
</script>

<script src="<?php bloginfo('template_directory'); ?>/js/masonry.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/imagesloaded.min.js"></script>
<script type="text/javascript">

	// get masonry container
	var $container = $('.masonry');

	$container.imagesLoaded(function() {
		
		$container.masonry(
		{
			itemSelector: '.post',
			columnWidth: '.grid-sizer',
	    	gutter: '.gutter-sizer',
		});
		$('.sub-open').click(function(event)
		{	

			// prevent default
			event.preventDefault();

			// open sub menu
			$(this).parent('li').children('.sub-menu').toggleClass('active');

		});
		$('#menu-open').click(function(event)
		{	

			// prevent default
			event.preventDefault();

			// open close menu
			$('.mobile-menu').toggleClass('active');

			// close search menu
			$('.search-menu').removeClass('active');

		});
		$('#search-open').click(function(event)
		{	

			// prevent default
			event.preventDefault();

			// open/close menu
			$('.search-menu').toggleClass('active');

			// close main menu
			$('.mobile-menu').removeClass('active');

		});

	});
	
</script>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
</script>
<script>
function PopupCenter(url, title, w, h) {
    // Fixes dual-screen position                         Most browsers      Firefox
    var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
    var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

    width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
    height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

    var left = ((width / 2) - (w / 2)) + dualScreenLeft;
    var top = ((height / 2) - (h / 2)) + dualScreenTop;
    var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

    // Puts focus on the newWindow
    if (window.focus) {
        newWindow.focus();
    }
}
</script>
<script src="<?php bloginfo('template_directory'); ?>/js/ajax-load-more.min.js"></script>
</body>
<?php wp_footer(); ?>
</html>