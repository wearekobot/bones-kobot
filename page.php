<?php get_header(); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php include('includes/block--background.php'); ?>
				<section id="intro-block">
					<div class="wrap">
						<h1><?php the_title(); ?></h1>
					</div>
				</section>
				<div id="content">
					<section id="page-<?php the_ID(); ?>" <?php post_class('wrap'); ?>>
						<?php the_content(); ?>
					</section>
				</div>
			<?php endwhile; else : ?>
				<section id="intro-block">
					<div class="wrap">
						<h1><?php _e('Oops, Post Not Found!', 'bonestheme'); ?></h1>
					</div>
				</section>
				<div id="content">
					<section class="wrap">
						<p><?php _e('Uh Oh. Something is missing. Try double checking things.', 'bonestheme'); ?></p>
					</section>
				</div>
				<section id="post-not-found">
				</section>
			<?php endif; ?>
<?php get_footer(); ?>