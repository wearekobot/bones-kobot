<?php get_header(); ?>
	<?php include('includes/block--background.php'); ?>
	<section id="intro-block" class="leader-default">
		<div class="wrap">
			<div class="block-text">
				<h1><?php _e('Page Not Found', 'bonestheme'); ?></h1>
				<h2 class="tagline">404</h2>
			</div>

		</div>
	</section>
	
	<div id="content">
		<section id="page-<?php the_ID(); ?>" <?php post_class('page wrap'); ?>>
				<section class="entry-content">
					<p>The page you were looking for was not found, but maybe try looking again!</p>
				</section>
				<section class="search">
					<p><?php get_search_form(); ?></p>
					<p>&nbsp;</p>
				</section>
		</section>
	</div>
<?php get_footer(); ?>
