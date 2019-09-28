<article id="post-<?php the_ID(); ?>" <?php post_class("card card_blog side-by-side card_image");?> role="article">
	<div class="block--image">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
			<?php generate_thumbnail_for_article('image-600') ?>
		</a>
	</div>
	<div class="block--content">
		<header class="block--content_header">
			<p class="supertitle"><?php
				printf(__('<time class="updated" datetime="%1$s" pubdate>%2$s</time>', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')));
			?></p>
			<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
		</header>
		<section class="block--content_excerpt">
			<?php the_excerpt(); ?>
			<p><a href="<?php the_permalink() ?>" class="excerpt-read-more" rel="bookmark" title="<?php the_title_attribute(); ?>">Read more</a></p>
		</section>
	</div>
</article>