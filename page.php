<?php get_header(); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php include('includes/block--background.php'); ?>
				<section id="intro-block">
					<div class="wrap">
						<h1><?php the_title(); ?></h1>
					</div>
				</section>
				<section id="content">
					<div id="page-<?php the_ID(); ?>" <?php post_class('wrap'); ?>>
						<?php the_content(); ?>
					</div>
				</section>
			<?php endwhile; else : ?>
				<?php include('includes/block--not_found.php'); ?>	
			<?php endif; ?>
<?php get_footer(); ?>