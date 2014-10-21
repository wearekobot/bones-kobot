<?php get_header(); ?>
			<div id="content">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<section id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="page-title"><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</section>
				<?php endwhile; else : ?>
				<section id="post-not-found" class="hentry">
					<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
					<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
				</section>
				<?php endif; ?>
				<?php // get_sidebar(); ?>
			</div>
<?php get_footer(); ?>
