<article id="post-<?php the_ID(); ?>" <?php post_class('block grid grid-top'); ?> role="article">
	<div class="block--image five four_m four_t">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail('blog-thumb'); ?>
			<?php else: ?>
				<img src="<?php echo get_template_directory_uri(); ?>/images/blog-placeholder.png" alt="">
			<?php endif; ?>			
		</a>
	</div>
	<div class="block--content seven eight_m eight_t last">
		<header class="article-header">
			<p class="supertitle"><?php
				printf(__('<time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')));
			?></p>
			<h2 class="repeat_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
		</header>
		<section class="entry-content">
			<?php the_excerpt(); ?>
		</section>
	</div>
</article>