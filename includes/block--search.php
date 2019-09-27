<article id="post-<?php the_ID(); ?>" <?php post_class("search-result");?> role="article">
	<div class="block--content">
		<header class="block--content_header">
			<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
			<p class="subtitle">
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_permalink() ?></a></p>
		</header>
		<section class="block--content_excerpt">
			<?php the_excerpt(); ?>
		</section>
	</div>
</article>