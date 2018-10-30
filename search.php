<?php get_header(); ?>
			<section id="intro-block" class="">
				<div class="wrap">
					<div class="block-text">
						<h1 class="archive-title"><span><?php _e('Search Results for:', 'bonestheme'); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>
					</div>
				</div>
			</section>
			<div id="content" class="wrap">	
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
						<article id="post-not-found">
							<header class="article-header">
								<h1><?php _e('Sorry, No Results.', 'bonestheme'); ?></h1>
							</header>
							
							<section class="entry-content">
								<p><?php _e('Try your search again.', 'bonestheme'); ?></p>
							</section>
							<div class="searchbox">
								<?php echo bones_blogsearch('search'); ?>
							</div>

							
						</article>
				<?php endif; ?>
			<?php //get_sidebar(); ?>
			</div>
<?php get_footer(); ?>
