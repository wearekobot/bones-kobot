<?php
// $limit = (!empty(get_field('number_of_posts'))) ? get_field('number_of_posts') : 3;
$limit = 3;
$posts_per_page = $limit;

$sticky_posts = get_option('sticky_posts');
$stickyCount = count($sticky_posts);
?>

<div class="block block--blog">
	<h2>Blog</h2>
	<div class="grid">

		<?php
		if ($stickyCount > 0) {
			// First loop with sticky posts
			if ($stickyCount > $posts_per_page) {
				array_splice($sticky_posts, $posts_per_page, ($stickyCount - $posts_per_page));
			}
	
			$main_loop_s = array(
				'posts_per_page' => $posts_per_page,
				'post__in' => $sticky_posts,
				'ignore_sticky_posts' => true
			);
	
			// The Query
			$do_not_duplicate = array();
			$query = new WP_Query($main_loop_s);
			// The Loop
			while ($query->have_posts()) {
				$query->the_post(); 
				$do_not_duplicate[] = get_the_ID();
				include('block--article.php');
			}
		}

		if ($stickyCount < $posts_per_page) {
			$allStickys = $posts_per_page - $stickyCount;
			// Second loop with rest of posts up to $stickyCount
			$main_loop_ns = array(
				'posts_per_page' => $allStickys,
				// 'offset' => $stickyCount,
				'post__not_in' => $do_not_duplicate,
				'ignore_sticky_posts' => true
			);
	
			// The Query
			$query = new WP_Query($main_loop_ns);
			// The Loop
			while ($query->have_posts()) {
				$query->the_post();
				include('block--article.php');
			}
			wp_reset_postdata();
		}
		wp_reset_query();
		?>
	</div>
	
	<div class="cta"><a href="/blog/" class="btn">Read More Posts</a></div>
	
</div>
