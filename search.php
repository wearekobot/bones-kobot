<?php get_header(); ?>
			<section id="intro-block" class="">
				<div class="wrap">
					<h1 class="archive-title"><span><?php _e('Search Results for:', 'bonestheme'); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>
				</div>
			</section>
			<section id="content">	
				<div class="wrap">
					<?php include('includes/block--search_box.php'); ?>	
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
					<?php else : ?>
						<?php include('includes/block--not_found.php'); ?>	
					<?php endif; ?>
				</div>
			</section>
<?php get_footer(); ?>
