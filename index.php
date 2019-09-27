<?php get_header(); ?>
			<?php 
				$page_for_posts_id =  get_option('page_for_posts');
				$post = get_post($page_for_posts_id);
				if (isset($post) && !empty($post)) {
					include('includes/block--background.php');
				}
			?>
			<?php if (have_posts()) : ?>
			<section id="intro-block" class="">
				<div class="wrap">
					<h1>Blog</h1>
				</div>
			</section>
			
			<section id="content">
				<div id="page-<?php the_ID(); ?>" <?php post_class('wrap'); ?>>
						<?php while (have_posts()) : the_post(); ?>
							<?php include('includes/block--article.php'); ?>
						<?php endwhile; ?>
							<?php if (function_exists('bones_page_navi')) : ?>
								<?php bones_page_navi(); ?>
							<?php else : ?>
								<nav class="wp-prev-next">
									<ul>
										<li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', 'bonestheme')) ?></li>
										<li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', 'bonestheme')) ?></li>
									</ul>
								</nav>
							<?php endif; ?>
				</div>
			</section>
			<?php else : ?>
				<?php include('includes/block--not_found.php'); ?>	
			<?php endif; ?>
<?php get_footer(); ?>
