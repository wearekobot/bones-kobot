<?php 

	$placeholder_image = get_theme_mod('placeholder_image');

	if (has_post_thumbnail()) {
		$image_id = get_post_thumbnail_id();
	} elseif((isset($placeholder_image) && !empty($placeholder_image)) ) {
		$image_id = get_placeholder_image_id($placeholder_image);
	}	
	$backgroundImageMobile = wp_get_attachment_image_src($image_id, 'hero-mobile');
	$backgroundImageIpad = wp_get_attachment_image_src($image_id, 'hero-ipad');
	$backgroundImageDesktopSmall = wp_get_attachment_image_src($image_id, 'hero-desktop-small');
	$backgroundImageDesktop = wp_get_attachment_image_src($image_id, 'hero-desktop');
	$backgroundImageDesktopLarge = wp_get_attachment_image_src($image_id, 'hero-desktop-large');  
?>
<style type="text/css" media="screen">
	#container #intro-block{
		background-image: url(<?php echo $backgroundImageMobile[0]; ?>);
	}
	@media (min-width: 768px) and (max-width: 1024px) {
		#container #intro-block{
			background-image: url(<?php echo $backgroundImageIpad[0]; ?>);
		}
	}
	@media (min-width: 1025px) {
		#container #intro-block{
			background-image: url(<?php echo $backgroundImageDesktopSmall[0]; ?>);
		}	
	}
	@media (min-width: 1441px) {
		#container #intro-block{
			background-image: url(<?php echo $backgroundImageDesktop[0]; ?>);
		}	
	}
	@media (min-width: 2000px) {
		#container #intro-block{
			background-image: url(<?php echo $backgroundImageDesktopLarge[0]; ?>);
		}	
	}
</style>
