<?php
/*
Author: Eddie Machado
URL: http://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once( 'library/bones.php' ); // if you remove this, bones will break

/*
2. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
require_once( 'library/admin.php' ); // this comes turned off by default

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
	return array_merge($sizes, array(
		'bones-thumb-600' => '600px by 150px',
		'bones-thumb-300' => '300px by 100px',
	));
}

/*
The function above adds the ability to use the dropdown menu to select 
the new images sizes you have just created from within the media manager 
when you add media to your content blocks. If you add more image sizes, 
duplicate one of the lines in the array and name it according to your 
new image size.
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
}

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	
	$commentHtml = '';
	$commentHtml .= '<li ' . comment_class('', null, null, false) . '>';
	$commentHtml .= '<article id="comment-' . get_comment_ID() . '">';
	$commentHtml .= '<header class="comment-author vcard">';
	/*
		this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
		echo get_avatar($comment,$size='32',$default='<path_to_url>' );
	*/
	$bgauthemail = get_comment_author_email();
	$commentHtml .= '<img data-gravatar="http://www.gravatar.com/avatar/' . md5($bgauthemail) . '?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="'. get_template_directory_uri() .'/images/nothing.gif" />';
	$commentHtml .= '<cite class="fn">' . get_comment_author_link() .'</cite>';
	$commentHtml .= '<time datetime="' . get_comment_time('Y-m-j') . '"><a href="' . htmlspecialchars(get_comment_link($comment->comment_ID)) . '">' . get_comment_time('F jS, Y') . '</a></time>';
	$commentHtml .= get_edit_comment_link('(Edit)', '  ', '');
	$commentHtml .= '</header>';
	if ($comment->comment_approved == '0') {
		$commentHtml .= '<div class="alert alert-info"><p>Your comment is awaiting moderation.</p></div>';
	}
	$commentHtml .= '<section class="comment_content">';
	$commentHtml .= get_comment_text();
	$commentHtml .= '</section>';
	$commentHtml .= get_comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'])));
	$commentHtml .= '</article>';
	return $commentHtml;
}

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
	<label class="screen-reader-text" for="s">' . __( 'Search for:', 'bonestheme' ) . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__( 'Search the Site...', 'bonestheme' ) . '" />
	<input type="submit" id="searchsubmit" value="' . esc_attr__( 'Search' ) .'" />
	</form>';
	return $form;
}


// When we're on custom post type archive-{}.php or single-{}.php pages
// wordpress likes to add the "current_page_parent" class to the blog index
// which is just plain *wrong*. This fixes that
function is_blog() {
	global $post;
	$posttype = get_post_type($post);
	return (($posttype == 'post') && (is_home() || is_single() || is_archive() || is_category() || is_tag() || is_author())) ? true : false;
}

function fix_blog_link_on_cpt( $classes, $item, $args ) {
	if (!is_blog()) {
		$blog_page_id = intval(get_option('page_for_posts'));
		if ($blog_page_id != 0 && $item->object_id == $blog_page_id)
			unset($classes[array_search('current_page_parent', $classes)]);
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'fix_blog_link_on_cpt', 10, 3);


// Add Page Slug Body Class
function add_slug_body_class($classes) {
	global $post;
	if (isset($post)) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}
add_filter('body_class', 'add_slug_body_class');

//remove stuff from admin bar
function remove_admin_bar_links() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');          // Remove the WordPress logo
	$wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
	$wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
	$wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
	$wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
	$wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
	// $wp_admin_bar->remove_menu('site-name');        // Remove the site name menu
	// $wp_admin_bar->remove_menu('view-site');        // Remove the view site link
	$wp_admin_bar->remove_menu('updates');          // Remove the updates link
	$wp_admin_bar->remove_menu('comments');         // Remove the comments link
	$wp_admin_bar->remove_menu('new-content');      // Remove the content link
	$wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
	// $wp_admin_bar->remove_menu('my-account');       // Remove the user details tab
}
add_action( 'wp_before_admin_bar_render', 'remove_admin_bar_links' );

//remove comments from admin menu
add_action( 'admin_menu', 'my_remove_menu_pages' );

function my_remove_menu_pages() {
	remove_menu_page('edit-comments.php');  
}
