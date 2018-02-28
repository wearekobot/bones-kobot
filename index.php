<?php get_header(); ?>
			<?php 
				$page_for_posts_id =  get_option('page_for_posts');
				$post = get_post($page_for_posts_id);
				if (isset($post) && !empty($post)) {
					include('includes/block--background.php');
				}
			?>
			<section id="intro-block" class="leader-blog">
				<div class="wrap">
					<div class="block-text">
						<h1 class="page-title">News</h1>
					</div>
				</div>
			</section>
			
			<div id="content">
				<section id="page-<?php the_ID(); ?>" <?php post_class('wrap '); ?>>
					<div class="">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class('block-image_color grid'); ?> role="article">
							<div class="block-image four">
								<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
									<?php if ( has_post_thumbnail() ) : ?>
										<?php the_post_thumbnail('blog-thumb'); ?>
									<?php else: ?>
										<img src="<?php echo get_template_directory_uri(); ?>/images/blog-placeholder.jpg" alt="">
									<?php endif; ?>			
								</a>
							</div>
							<div class="block-content eight last">
								<header class="article-header">
									<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
								</header>
								<section class="entry-content">
									<?php the_excerpt(); ?>
									<p><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="btn">Read More</a></p>
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
								<h1><?php _e('Oops, Post Not Found!', 'bonestheme'); ?></h1>
							</header>
							<section class="entry-content">
								<p><?php _e('Uh Oh. Something is missing. Try double checking things.', 'bonestheme'); ?></p>
							</section>
							<footer class="article-footer">
								<p><?php _e('This is the error message in the index.php template.', 'bonestheme'); ?></p>
							</footer>
						</article>
						<?php endif; ?>
					</div>
				</section>
			</div>
<?php get_footer(); ?>
