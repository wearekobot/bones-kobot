<section id="intro-block">
	<div class="wrap">
		<h1><?php _e('Page Not Found', 'bonestheme'); ?></h1>
		<h2 class="tagline">404</h2>
	</div>
</section>
<section id="content">
	<div id="page-<?php the_ID(); ?>" <?php post_class('wrap'); ?>>
		<p><?php _e('Uh Oh. Something is missing. Try double checking things.', 'bonestheme'); ?></p>
		<?php include('block--search_box.php'); ?>	
	</div>
</section>