<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
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
					<div class="section-small breadcrumbs">
						<ul>
							<li><a href="<?php echo get_site_url(); ?>">SUPERDRY</a></li>
							<li><a href=""><?php the_title(); ?></a></li>
						</ul>
					</div>
					<div class="post-content">
						<?php
						// Start the loop.
						while ( have_posts() ) : the_post();

							// Include the page content template.
							get_template_part( 'content', 'page' );							

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
