<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
	<div class="main-content">
		<div class="container">
			<div class="row">
			
				<div class="col-8 main-content">
					
						<?php if ( have_posts() ) : ?>
							<header class="page-header">
								<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'twentyfifteen' ), get_search_query() ); ?></h1>
							</header><!-- .page-header -->
							<div class="masonry">
								<div class="grid-sizer"></div>
								<div class="gutter-sizer"></div>						
								
								<?php
								// Start the loop.
								while ( have_posts() ) : the_post();
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
								<?php
								// End the loop.
								endwhile;
								?>										
							</div>	
							<?php
							// Previous/next page navigation.
							the_posts_pagination( array(
								'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
								'next_text'          => __( 'Next page', 'twentyfifteen' ),
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
							) );

						// If no content, include the "No posts found" template.
						else :
							get_template_part( 'content', 'none' );

						endif;
						?>
					</div>		
				
				<?php get_sidebar(); ?>					
			</div>
		</div>
	</div>

<?php get_footer(); ?>
