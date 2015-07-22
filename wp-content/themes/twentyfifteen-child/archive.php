<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<div class="main-content">
	<div class="container">
		<div class="row">			
			<div class="col-8 main-content section-tiny">
				<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
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
			</div>					
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
