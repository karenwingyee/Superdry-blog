<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}


//edit excerpt length
function custom_excerpt_length( $length ) {
	return 10;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//add class to mailchimp form
add_filter( 'mc4wp_form_css_classes', function( $classes ) { 
	$classes[] = 'newsletter-signup';
	return $classes;
});

//image widget - select file to replace the default format of plugin
//instead of change the plugin files, because they will change then you update plugin
//where as now the format will not change when plugin is updated
add_filter('sp_template_image-widget_widget.php', 'my_template_filter');
function my_template_filter($template) {
    return get_stylesheet_directory() . '/custom-image-widget.php';
}

function more_post_ajax(){
    $offset = $_POST["offset"];
    $ppp = $_POST["ppp"];
    header("Content-Type: text/html");

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $ppp,
        'offset' => $offset,
    );

    $loop = new WP_Query($args);
    while ($loop->have_posts()) { $loop->the_post(); 
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
    }

    exit; 
}

add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax'); 
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');

?>