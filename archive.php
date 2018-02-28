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
					<div class="eight">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class('block-image_color grid'); ?> role="article">
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
							<div class="searchbox">
								<?php echo bones_blogsearch('search'); ?>
							</div>
						</article>
					<?php endif; ?>
					</div>
				
					<div class="last four">
						<div class="sidebar blog-sidebar">
							<?php echo bones_blogsearch('search'); ?>
						</div>
					
						<div class="sidebar blog-sidebar">
							<h2>Categories</h2>
							<form id="category-select" class="category-select" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
								<?php
								$args = array(
									'show_option_none' => __( 'Select category' ),
									'show_count'       => 1,
									'orderby'          => 'name',
									'echo'             => 0,
								);
								?>
							
								<?php $select  = wp_dropdown_categories( $args ); ?>
								<?php $replace = "<select$1 onchange='return this.form.submit()'>"; ?>
								<?php $select  = preg_replace( '#<select([^>]*)>#', $replace, $select ); ?>
							
								<?php echo $select; ?>
							
								<noscript>
									<input type="submit" value="View" />
								</noscript>
							
							</form>
						</div>
					</div>
				</section>
			</div>
<?php get_footer(); ?>
