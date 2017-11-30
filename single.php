<?php get_header(); ?>
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php //include('includes/block--background.php'); ?>
			<section id="intro-block" class="">
				<div class="wrap">
					<div class="block-text">
						<header class="article-header">
							<h2>News</h2>					
						</header>
					</div>
				</div>
			</section>
			
			<div id="content">
				<section class="wrap">
					<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						<?php 
						if ( has_post_thumbnail() ) : ?>
						<div class="blog-image">
							<?php the_post_thumbnail('large'); ?>
						</div>
						<?php endif;
						?>
						
						<section class="entry-content" itemprop="articleBody">

							<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>		
							<?php the_content(); ?>
						</section>
						
						<footer class="article-footer">
							<p class="byline vcard"><?php
								printf(__('Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')));
							?></p>
							<p class="post-category"><?php
								printf(__('%1$s.', 'bonestheme'), get_the_category_list(' '));
							?></p>
							<?php the_tags('<p class="tags"><span class="tags-title">' . __('Tags:', 'bonestheme') . '</span> ', ', ', '</p>'); ?>
						</footer>
						
						<?php //comments_template(); ?>
						
						<div class="footer--social">
							<?php if (function_exists('sharing_display')) { echo sharing_display(); } ?>
						</div>
					</article>
				</section>
			</div>
			
			<?php endwhile; ?>
			<?php else : ?>
			<div id="content">
				<section class="wrap grid">
					<div class="twelve">
						<article id="post-not-found">
							<header class="article-header">
								<h1><?php _e('Oops, Post Not Found!', 'bonestheme'); ?></h1>
							</header>
							<section class="entry-content">
								<p><?php _e('Uh Oh. Something is missing. Try double checking things.', 'bonestheme'); ?></p>
							</section>
							<footer class="article-footer">
								<p><?php _e('This is the error message in the single.php template.', 'bonestheme'); ?></p>
							</footer>
						</article>
					</div>
				</setion>
			</div>
			<?php endif; ?>

<?php get_footer(); ?>
