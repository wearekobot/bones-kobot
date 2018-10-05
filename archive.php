<?php get_header(); ?>
			<section id="intro-block" class="">
				<div class="wrap">
					<div class="block-text">
						<?php if (is_category()) : ?>
							<h1 class="page-title"><span><?php _e('Posts Categorized:', 'bonestheme'); ?></span> <?php single_cat_title(); ?></h1>
						<?php elseif (is_tag()) : ?>
							<h1 class="page-title"><span><?php _e('Posts Tagged:', 'bonestheme'); ?></span> <?php single_tag_title(); ?>	</h1>
						<?php elseif (is_author()) : ?>
							<?php 
								global $post;
								$author_id = $post->post_author;
							?>
							<h1 class="page-title"><span><?php _e('Posts By:', 'bonestheme'); ?></span> <?php the_author_meta('display_name', $author_id); ?></h1>
						<?php elseif (is_day()) : ?>
							<h1 class="page-title"><span><?php _e('Daily Archives:', 'bonestheme'); ?></span> <?php the_time('l, F j, Y'); ?></h1>
						<?php elseif (is_month()) : ?>
							<h1 class="page-title"><span><?php _e('Monthly Archives:', 'bonestheme'); ?></span> <?php the_time('F Y'); ?></h1>
						<?php elseif (is_year()) : ?>
							<h1 class="page-title"><span><?php _e('Yearly Archives:', 'bonestheme'); ?></span> <?php the_time('Y'); ?></h1>
						<?php endif; ?>
					</div>
				</div>
			</section>
			
			<div id="content">
				<section id="page-<?php the_ID(); ?>" <?php post_class('wrap grid'); ?>>
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
								<h1><?php _e('Oops, Post Not Found!', 'bonestheme'); ?></h1>
							</header>
							<section class="entry-content">
								<p><?php _e('Uh Oh. Something is missing. Try double checking things.', 'bonestheme'); ?></p>
							</section>
							<div class="searchbox">
								<?php echo bones_blogsearch('search'); ?>
							</div>
						</article>
					<?php endif; ?>
				</section>
			</div>
<?php get_footer(); ?>
