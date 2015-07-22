<?php
/**
 * Template Name: Front Page Template
 */
?>
<?php get_header(); ?>

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
				 $i = 0;
				 foreach($myposts as $post) :
				 	$i++;
				 ?>
					
					<div class="post">
						<div class="img">
							<img class="<?php echo $i; ?>" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>" alt="">
						</div>
						<div class="post-overlay">
							<h2 class="post-title"><?php the_title(); ?></h2>
						</div>
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
												    'numberposts'   =>  9,
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
					<div class="section pagination tac" id="load">
						<div class="hidden">
							
						</div>
						<div class="resp-small-hide">
							<a id="more_posts" href="#" class="primary-button">Load More</a>							
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

								    <?php foreach ($tweets as $tweet) :?>
								    
								        <li>
								        
								        	<div class="tweet-head">									        					        	
									        	<img src="<?php echo $tweet->user->profile_image_url_https; ?>" alt="">
												<span class="name"><a href="https://twitter.com/<?php echo $tweet->user->screen_name; ?>" target="_blank"><?php echo $tweet->user->name; ?></a></span>
												<?php
												$date = DateTime::createFromFormat('M j H:i:s P Y', $tweet->created_at);											
												?>
												<span class="username"><a href="https://twitter.com/<?php echo $tweet->user->screen_name; ?>" target="_blank">@<?php echo $tweet->user->screen_name; ?></a> - <?php echo twitter_time($tweet->created_at); ?></span>								
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
												<a href="<?php echo 'https://twitter.com/Fact365/status/'.$tweet->id_str; ?>" target="_blank">View tweet</a>
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
<?php get_footer(); ?>
