<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php the_title(); ?> - Superdry Blog</title>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/main.css" media="screen" type="text/css" />
	<link rel="stylesheet" href="https://i.icomoon.io/public/b58cb75755/superdry/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body>
	<div class="main-header resp-small-hide">
		<div class="container">
			<div class="section-small">
				<div class="row">
					<div class="col-8">
						<a href="<?php echo get_site_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/superdry-logo.png" alt=""></a>
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
					<a href="<?php echo get_site_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/superdry-logo.png" alt=""></a>
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
						<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/" class="header-search">
							<input type="text" placeholder="SEARCH" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s">
							<button type="submit" class="primary-button"><i class="icon-search"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	// Start the loop.
	while ( have_posts() ) : the_post();
		?>
	<div class="main-content">
		<div class="container">
			<div class="row">
			
				<div class="col-8 main-content">
					<div class="section-small breadcrumbs">
						<ul>
							<li><a href="<?php echo get_site_url(); ?>">SUPERDRY</a></li>
							<li><a href=""><?php the_title(); ?></a></li>
						</ul>
					</div>
					<div class="post-content">
						<h1 class="post-title"><?php the_title(); ?></h1>
						<!-- RSS feed does not work on chrome-->
						<div class="subscribe resp-small-hide"><a href="<?php echo get_site_url().'/feed'; ?>" target="_blank"><i class="icon-feed"></i> Subscribe to RSS Feed</a></div>
						<p class="published">Published: <span class="date"><?php the_date(); ?></span></p>
						<div class="post-text">
							<?php the_content(); ?>
						</div>
						<div class="section-small">
							<div class="post-meta">
								<div class="row">
									<div class="col-7 tags">
										<ul>
										<?php
										$categories = get_the_category();
										$separator = ' ';
										$output = '';
										if($categories){
											foreach($categories as $category) {
												$output .= '<li><a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a><li>'.$separator;
											}
										echo trim($output, $separator);
										}
										?>
										</ul>
									</div>
									<div class="col-5 likes">
										<span class='st_fblike_hcount' displayText='Facebook Like'></span>
										<span class='st_twitter_hcount' displayText='Tweet'></span>
										<span class='st_googleplus_hcount' displayText='Google +'></span>
									</div>
									
								</div>
							</div>
						</div>
					</div>
					<div class="section-small pt0">
						<h2 class="look-title">Get the look</h2>
						<div class="section-tiny">
							<ul class="row products">
							<?php
							$myvals = get_post_meta($post->ID);

							foreach($myvals as $key => $val)
							{
								$valuet = trim($key);
							    if ( '_' == $valuet{0} )
							        continue;
								?>
								<li>
									<a href="<?php echo $val[1]; ?>" target="_blank">
										<img src="<?php echo $val[2]; ?>" alt="">	
										<h3><?php echo $key ?></h3>
										<span class="price"><?php echo $val[0]; ?></span>
									</a>
								</li>
							<?php
								}
							?>
							</ul>
						</div>
					</div>	
					<div class="section">
						<div id="disqus_thread"></div>
						<script type="text/javascript">
						    /* * * CONFIGURATION VARIABLES * * */
						    var disqus_shortname = 'superdryblog';
						    
						    /* * * DON'T EDIT BELOW THIS LINE * * */
						    (function() {
						        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
						        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
						        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
						    })();
						</script>
						<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
					</div>
				</div>
				
				<div class="col-4 side-content resp-small-hide">
					<div class="section-small">
						<div class="side-block">
							<h3>Related Stories</h3>
						</div>
						<?php
						$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
						if( $related ) foreach( $related as $post ) {
						setup_postdata($post);
						?>
						<a href="<?php echo get_permalink();?>">
						<div class="side-block side-post">
							<div class="post">
								<div class="img">
									<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" alt="<?php the_title(); ?>">
								</div>
								<div class="post-overlay">
									<h2 class="post-title"><?php the_title(); ?></h2>
								</div>
							</div>
						</div>
						</a>					
						<?php
						}
						wp_reset_postdata();
						?>
						<div class="side-block side-post">
						<?php dynamic_sidebar( 'sidebar-1' ); ?>
						</div>
					</div>
				</div>				
			</div>
		</div>
	</div>
	<?php // End the loop.
	endwhile;
	?>
	<div class="mobile-footer">
		<div class="container">
			<div class="section mobile-signup">
				<div class="row">
					<div class="col-12">
						<h2><i class="icon-mail"></i> Newsletter Signup</h2>
						<form action="" method="post" class="mobile-newsletter-signup">
							<input type="text" name="email" placeholder="Enter your email">
							<button action="submit">Mens</button>
							<button action="submit">Womens</button>
						</form>
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
										<a href=""><i class="icon-feed"></i> Superdry Rss Feed <i class="icon-chevron-right right"></i></a>
									</li>
									<li>
										<a href=""><i class="icon-facebook"></i> Facebook <i class="icon-chevron-right right"></i></a>
									</li>
									<li>
										<a href=""><i class="icon-twitter"></i> Twitter <i class="icon-chevron-right right"></i></a>
									</li>
									<li>
										<a href=""><i class="icon-instagram"></i> Instagram <i class="icon-chevron-right right"></i></a>
									</li>
									<li>
										<a href=""><i class="icon-pinterest"></i> Pinterest <i class="icon-chevron-right right"></i></a>
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
							<form class="newsletter-signup" action="">
								<input type="text" name="email" placeholder="Enter your email address">
								<button type="submit" class="primary-button">SIGN UP</button>
							</form>
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
<!-- Please call pinit.js only once per page -->
<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>

<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4&appId=1571134259820360";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
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
</body>
</html>
