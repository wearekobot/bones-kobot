<?php get_header(); ?>
			<?php 
				$page_for_posts_id =  get_option('page_for_posts');
				$post = get_post($page_for_posts_id);
				if (isset($post) && !empty($post)) {
					include('includes/block--background.php');
				}
			?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<section id="intro-block" class="leader-blog">
				<div class="wrap">
					<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
				</div>
			</section>
			
			<section id="content">
				<section class="wrap grid">
					<article id="post-<?php the_ID(); ?>" <?php post_class('eight'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						<?php if (has_post_thumbnail()) : ?>
						<div class="blog-image">
							<?php the_post_thumbnail('large'); ?>
						</div>
						<?php endif; ?>
						<section class="blog-entry" itemprop="articleBody">		
							<?php the_content(); ?>
						</section>
						
						<div class="blog-footer">
							<p class="byline vcard"><?php
								printf(__('Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')));
							?></p>
							<p class="post-category"><?php
								printf(__('%1$s.', 'bonestheme'), get_the_category_list(' '));
							?></p>
							<?php the_tags('<p class="tags"><span class="tags-title">' . __('Tags:', 'bonestheme') . '</span> ', ', ', '</p>'); ?>
						</div>
					</article>
					<div class="four last">
						<div class="sidebar blog-sidebar">
							<?php echo bones_blogsearch('search'); ?>
						</div>
					</div>
				</section>
			</section>
			
			<?php endwhile; ?>
			<?php else : ?>
				<section id="intro-block" class="leader-blog">
					<div class="wrap">
						<h2>Blog</h2>
					</div>
				</section>
				<section id="content">
					<?php include('includes/block--not_found.php'); ?>	
				</section>
			<?php endif; ?>

<?php get_footer(); ?>
