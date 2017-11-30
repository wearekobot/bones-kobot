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
					<article id="post-<?php the_ID(); ?>" <?php post_class('grid'); ?> role="article">
						<div class="block-image four">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
								<?php if ( has_post_thumbnail() ) : ?>
									<?php the_post_thumbnail('blog-thumb'); ?>
								<?php else: ?>
									<img src="<?php echo get_template_directory_uri(); ?>/images/placeholder.jpg" alt="">
								<?php endif; ?>
								
							</a>
						</div>
						<div class="block-content eight last">
							<header class="article-header">
								<p class="post-category"><?php
									printf(__('%1$s.', 'bonestheme'), get_the_category_list(', '));
								?></p>
								<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
							</header>
							
							<section class="entry-content">
								<?php the_excerpt(); ?>
								<p><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">Read More</a></p>
							</section>
						</div>
					</article>
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
