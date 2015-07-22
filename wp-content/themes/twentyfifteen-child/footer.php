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
									<?php wp_nav_menu( array('menu' => 'Shop at superdry.com' )); ?>
								</ul>
							</li>
							<li>
								<a href="" class="sub-open">Customer Services<i class="icon-plus right"></i></a>
								<ul class="sub-menu">
									<?php wp_nav_menu( array('menu' => 'Cutomer Services' )); ?>
								</ul>
							</li>
							<li>
								<a href="" class="sub-open">The Brand <i class="icon-plus right"></i></a>
								<ul class="sub-menu">
									<?php wp_nav_menu( array('menu' => 'The Brand' )); ?>
								</ul>
							</li>
							<li>
								<a href="" class="sub-open">Information <i class="icon-plus right"></i></a>
								<ul class="sub-menu">
									<?php wp_nav_menu( array('menu' => 'Info' )); ?>
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
									<?php wp_nav_menu( array('menu' => 'Cutomer Services' )); ?>
								</ul>
							</div>
							<div class="col-4">
								<h4>The Brand</h4>
								<ul>
									<?php wp_nav_menu( array('menu' => 'The Brand' )); ?>
								</ul>
							</div>
							<div class="col-4">
								<h4>Information</h4>
								<ul>
									<?php wp_nav_menu( array('menu' => 'Info' )); ?>
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

    var ajaxUrl = "<?php echo admin_url('admin-ajax.php')?>";
    var page = 1; // What page we are on.
    var ppp = 3; // Post per page

    $("#more_posts").on("click",function(){ // When btn is pressed.
        $("#more_posts").attr("disabled",true); // Disable the button, temp.
        $.post(ajaxUrl, {
            action:"more_post_ajax",
            offset: (page * ppp) + 9,
            ppp: ppp
        }).success(function(posts){
            page++;
            $(".masonry").append(posts); // CHANGE THIS!
            $("#more_posts").attr("disabled",false);
        });

   });
</script>
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

	$('.1').click(function() {
	  clearInterval(autoSlide);
	  currentIndex = 0;
	  
	  cycleItems();
	});

	$('.2').click(function() {
	  clearInterval(autoSlide);
	  currentIndex = 1;
	  
	  cycleItems();
	});
	$('.3').click(function() {
	  clearInterval(autoSlide);
	  currentIndex = 2;
	  
	  cycleItems();
	});
</script>

<script src="<?php bloginfo('stylesheet_directory'); ?>/js/masonry.min.js"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/imagesloaded.min.js"></script>
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

</body>
<?php wp_footer(); ?>
</html>