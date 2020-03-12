<?php
/*
Author: Eddie Machado
URL: http://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

require_once('library/bones-options.php');

// Registers ACF blocks
require_once('library/bones-blocks.php');

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
require_once('library/bones.php'); // if you remove this, bones will break

/*
2. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
require_once('library/admin.php'); // this comes turned off by default

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size('image-150', 150, 112, true);
add_image_size('image-300', 300, 225, true);
add_image_size('image-600', 600, 450, true);
add_image_size('image-800', 800, 600, true);
add_image_size('image-1200', 1200, 800, true);
add_image_size('image-1600', 1600, 1200, true);

add_image_size('image-150-no_crop', 150, 112, false);
add_image_size('image-300-no_crop', 300, 225, false);
add_image_size('image-600-no_crop', 600, 450, false);
add_image_size('image-800-no_crop', 800, 600, false);
add_image_size('image-1200-no_crop', 1200, 800, false);
add_image_size('image-1600-no_crop', 1600, 1200, false);

add_image_size('image-150-square', 150, 150, true);
add_image_size('image-300-square', 300, 300, true);
add_image_size('image-600-square', 600, 600, true);
add_image_size('image-800-square', 800, 800, true);
add_image_size('image-1200-square', 1200, 1200, true);
add_image_size('image-1600-square', 1600, 1600, true);


// these might need adjusting

add_image_size('hero-mobile', 600, 360, true);
add_image_size('hero-ipad', 1000, 650, true);
add_image_size('hero-desktop-small', 1500, 900, true);
add_image_size('hero-desktop', 2000, 1300, true);
add_image_size('hero-desktop-large', 3000, 2250, true);



/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

If true, the image will be cropped to fit
If false, images will be scaled, not cropped

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail('bones-thumb-300'); ?>
for the 600 x 100 image:
<?php the_post_thumbnail('bones-thumb-600'); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/* Add the following code in the theme's functions.php and disable any unset function as required */
function remove_default_image_sizes($sizes) {
  
  /* Default WordPress */
  unset($sizes[ 'thumbnail' ]);          // Remove Thumbnail (150 x 150 hard cropped)
  unset($sizes[ 'medium' ]);          // Remove Medium resolution (300 x 300 max height 300px)
  unset($sizes[ 'medium_large' ]);    // Remove Medium Large (added in WP 4.4) resolution (768 x 0 infinite height)
  unset($sizes[ 'large' ]);           // Remove Large resolution (1024 x 1024 max height 1024px)
  

  return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'remove_default_image_sizes');

add_filter('image_size_names_choose', 'bones_custom_image_sizes');

function bones_custom_image_sizes($sizes) {
	return array_merge($sizes, array(
		'image-150' => 'Small',
		'image-600' => ' Medium',
		'image-1200' => ' Large',
		'image-150-no_crop' => 'Small_Uncropped',
		'image-600-no_crop' => ' Medium Uncropped',
		'image-1200-no_crop' => ' Large Uncropped',
		'image-150-square' => 'Small Square',
		'image-600-square' => ' Medium Square',
		'image-1200-square' => ' Large Square'
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
		'name' => __('Sidebar 1', 'bonestheme'),
		'description' => __('The first (primary) sidebar.', 'bonestheme'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
}

/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	
	$commentHtml = '';
	$commentHtml .= '<li ' . comment_class('', null, null, false) . '>';
	$commentHtml .= '<article id="comment-' . get_comment_ID() . '">';
	$commentHtml .= '<header class="comment-author vcard">';
	/*
		this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
		echo get_avatar($comment,$size='32',$default='<path_to_url>');
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
	$form = '<form role="search" method="get" id="searchform" action="' . home_url('/') . '" >
	<label class="screen-reader-text" for="s">' . __('Search for:', 'bonestheme') . '</label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__('Search the Site...', 'bonestheme') . '" />
	<input type="submit" id="searchsubmit" value="' . esc_attr__('Search') .'" />
	</form>';
	return $form;
}

// search the blog

// Search Form
function bones_blogsearch($form) {
	$form = '<form role="search" method="get" id="searchform" action="' . home_url('/') . '" >
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__('Search the Blog', 'bonestheme') . '" />
	<input type="submit" id="searchsubmit" value="' . esc_attr__('Search') .'" />
	</form>';
	return $form;
}


// limiting search

function searchfilter($query) {
 
    if ($query->is_search && !is_admin()) {
        $query->set('post_type',array('post'));
    }
 
return $query;
}


// When we're on custom post type archive-{}.php or single-{}.php pages
// wordpress likes to add the "current_page_parent" class to the blog index
// which is just plain *wrong*. This fixes that
function is_blog() {
	global $post;
	$posttype = get_post_type($post);
	return (($posttype == 'post') && (is_home() || is_single() || is_archive() || is_category() || is_tag() || is_author())) ? true : false;
}

function bones_fix_blog_link_on_cpt($classes, $item, $args) {
	if (!is_blog()) {
		$blog_page_id = intval(get_option('page_for_posts'));
		if ($blog_page_id != 0 && $item->object_id == $blog_page_id)
			unset($classes[array_search('current_page_parent', $classes)]);
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'bones_fix_blog_link_on_cpt', 10, 3);


// Add Page Slug Body Class
function bones_add_slug_body_class($classes) {
	global $post;
	if (isset($post)) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}
add_filter('body_class', 'bones_add_slug_body_class');

//remove stuff from admin bar
function bones_remove_admin_bar_links() {
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
add_action('wp_before_admin_bar_render', 'bones_remove_admin_bar_links');

//remove comments from admin menu
add_action('admin_menu', 'bones_remove_menu_pages');

function bones_remove_menu_pages() {
	remove_menu_page('edit-comments.php');  
}

function bones_div_maker($atts, $content = '&nbsp;') {
	extract(
		shortcode_atts(
			array(
				'class' => '', 
				'id' => '', 
			), 
			$atts
		)
	);
	$classHtml = (!empty($class)) ? ' class="' . $class .'" ': '';
	$idHtml = (!empty($id)) ? ' id="' . $id .'"': '';
	return '<div' . $classHtml . $idHtml . '>' . do_shortcode($content) . '</div>';
}
add_shortcode('div', 'bones_div_maker');

function bones_section_maker($atts, $content = '&nbsp;') {
	extract(
		shortcode_atts(
			array(
				'class' => '', 
				'id' => '', 
			), 
			$atts
		)
	);
	$classHtml = (!empty($class)) ? ' class="' . $class .'" ': '';
	$idHtml = (!empty($id)) ? ' id="' . $id .'"': '';
	return '<section' . $classHtml . $idHtml . '>' . do_shortcode($content) . '</section>';
}
add_shortcode('section', 'bones_section_maker');




/**
 * Get an attachment ID given a URL.
 * 
 * @param string $url
 *
 * @return int Attachment ID on success, 0 on failure
 */
function bones_get_attachment_id($url) {
	$attachment_id = 0;
	$dir = wp_upload_dir();
	if (false !== strpos($url, $dir['baseurl'] . '/')) { // Is URL in uploads directory?
		
		$file = basename($url);
		
		$query_args = array(
			'post_type'   => 'attachment',
			'post_status' => 'inherit',
			'fields'      => 'ids',
			'meta_query'  => array(
				array(
					'value'   => $file,
					'compare' => 'LIKE',
					'key'     => '_wp_attachment_metadata',
				),
			)
		);
		
		$query = new WP_Query($query_args);
		
		if ($query->have_posts()) {
			foreach ($query->posts as $post_id) {
				$meta = wp_get_attachment_metadata($post_id);
				$original_file       = basename($meta['file']);
				$cropped_image_files = wp_list_pluck($meta['sizes'], 'file');
				
				if ($original_file === $file || in_array($file, $cropped_image_files)) {
					$attachment_id = $post_id;
					break;
				}
			}
		}
	}
	return $attachment_id;
}
// gutenberg wide images
add_theme_support('align-wide');

// image generator for blog articles, and other index stuff
function generate_thumbnail_for_article($image_size){
	$placeholder_image = get_theme_mod('placeholder_image');
	if (has_post_thumbnail()) {
		the_post_thumbnail($image_size);
	} elseif((isset($placeholder_image) && !empty($placeholder_image))) {
		$image_id = bones_get_attachment_id($placeholder_image);
		echo wp_get_attachment_image($image_id, $image_size);
	} else {
		echo '<img src="' . get_template_directory_uri() . '/images/blog-placeholder.jpg" alt="">';
	}
}



add_action('admin_menu', 'linked_url');
function linked_url() {
	add_menu_page('linked_url', 'Reusable Blocks', 'read', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 22);
}