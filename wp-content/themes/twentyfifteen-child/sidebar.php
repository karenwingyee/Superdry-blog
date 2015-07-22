<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<div class="col-4 side-content resp-small-hide section-tiny">
	<div class="side-block section-tiny">
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
	<div class="side-block clearfix">
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
	<div class="side-block side-post">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</div>
