<?php
/**
 * Widget template. This template can be overriden using the "sp_template_image-widget_widget.php" filter.
 * See the readme.txt file for more info.
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

echo $before_widget;
?>
<h3>Product Spotlight</h3>
<div class="product-spotlight">
	<img src="<?php echo $imageurl ?>" alt="<?php echo $title; ?>">
	<h2><?php echo $title; ?></h2>
	<p><?php echo wpautop( $description ); ?></p>
	<a href="<?php echo $link ?>" target="_blank" class="primary-button">Buy Now</a>
</div>
<?php
/*if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }

echo $this->get_image_html( $instance, true );

if ( !empty( $description ) ) {
	echo '<div class="'.$this->widget_options['classname'].'-description" >';
	echo wpautop( $description );
	echo "</div>";
}*/
echo $after_widget;
?>