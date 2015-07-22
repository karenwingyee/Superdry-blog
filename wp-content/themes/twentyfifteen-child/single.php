<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<?php get_header(); ?>
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
										<?php if (function_exists('synved_social_share_markup')) echo synved_social_share_markup(); ?>
									</div>																		
								</div>
							</div>
						</div>
					</div>
					<?php
						// Author bio.
						get_template_part( 'author-bio' );						
					?>
					<!-- Check there are product link to this article-->
					<?php $repeatable_field_values = simple_fields_values("product_name,product_price,product_image,product_link");
					if($repeatable_field_values != NULL)						
					{
					?>
					<div class="section-small pt0">
						<h2 class="look-title">Get the look</h2>
						<div class="section-tiny">
							<ul class="row products">							
							<?php	
							// get each product from array						
							foreach ($repeatable_field_values as $values) {
							?>
							<!-- Display product(s) -->
							<li>
								<a href="<?php echo $values["product_link"]; ?>" target="_blank">
									<img src="<?php echo $values["product_image"]["url"]; ?>" alt="">	
									<h3><?php echo $values["product_name"]; ?></h3>
									<span class="price"><?php echo $values["product_price"]; ?></span>
								</a>
							</li>
							<?php
							}
							?>
							</ul>
						</div>
					</div>
					<?php } ?>
						
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
<?php get_footer(); ?>
