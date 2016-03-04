<?php

/*
	===============================================
	include scripts
	===============================================
*/

function hoopy_script_enqueue() {

	wp_enqueue_style('customstyle', get_template_directory_uri() . '/css/hoopy.css', array(), '1.0.0', 'all');

	wp_enqueue_script('jquery');
	wp_enqueue_script('masonry');
	wp_enqueue_script('customjs', get_template_directory_uri() . '/js/mainhoopy.js', array('jquery'), '1.0.0', true);

}

add_action('wp_enqueue_scripts', 'hoopy_script_enqueue');

/*
	===============================================
	load fonts
	===============================================
*/
// function load_fonts() {
//             wp_register_style('googleFonts', 'https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:300');
//             wp_enqueue_style( 'googleFonts');
//         }
    
//     add_action('wp_print_styles', 'load_fonts');

/*
	===============================================
	hoopy setup
	===============================================
*/
function hoopy_theme_setup() {

	//customisable background and header - is this necessary?
	add_theme_support('custom-background');
	add_theme_support('custom-header');

	// this theme uses thumbnails
	add_theme_support('post-thumbnails');

	// allow post formats
	add_theme_support('post-formats', array('image', 'video'));
	add_theme_support('title-tag');

	// register menus
	register_nav_menu('header-menu', 'Home Header Navigation');
	register_nav_menu('toggled-menu', 'Toggled Navigation Menu');

}

add_action('after_setup_theme', 'hoopy_theme_setup');

/*
	===============================================
	include walker file
	===============================================
*/
require get_template_directory() . '/inc/walker.php';

/*
	===============================================
	custom post type: portfolio
	===============================================
*/

function hoopy_custom_post_type() {

	$labels = array(
		'name' => 'Portfolio',
		'singular_name' => 'Project',
		'add_new' => 'Add Item',
		'all_items' => 'All Items',
		'add_new_item' => 'Add Item',
		'edit_item' => 'Edit Item',
		'new_item' => 'New Item',
		'view_item' => 'View Item',
		'search_item' => 'Search Portfolio',
		'not_found' => 'No items found',
		'not_found_in_trash' => 'No items found in trash',
		'parent_item_colon' => 'Parent Item'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'post-formats',
			'excerpt',
			'thumbnail',
			'revisions',
			'custom-fields'
		),
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
		'exclude_from_search' => false
	);
	register_post_type('portfolio',$args);
}
add_action('init','hoopy_custom_post_type');

/*
	===============================================
	metabox stuff
	===============================================
*/
/*
// metabox setup function ONLY FOR WHEN THIS ISN'T A PLUGIN!
function prfx_meta_box_setup() {
	add_action('add_meta_boxes', 'prfx_custom_meta');
	add_action( 'save_post', 'prfx_meta_save' );
}


function prfx_custom_meta() {
	add_meta_box( 'prfx_meta', // meta box id
		__('Custom styles', 'prfx-textdomain'), // title, internationalised
		'prfx_meta_callback', // callback function
		null // post_type
		);
}

// output the content of the meta box
function prfx_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );
	$prfx_stored_meta = get_post_meta( $post->ID );
	?>

	<p>
		<span class="prfx-row-title"><?php _e( 'Additional styles', 'prfx-textdomain' )?></span>
	    <label for="meta-checkbox-header-style">
	        <input type="checkbox" name="meta-checkbox-header-style" id="meta-checkbox-header-style" value="yes" <?php if ( isset ( $prfx_stored_meta['meta-checkbox-header-style'] ) ) checked( $prfx_stored_meta['meta-checkbox-header-style'] [0], 'yes' ); ?> />
	        <?php _e( 'Transparent header', 'prfx-textdomain' )?>
	    </label>
	</p>
	<?php
}

// save custom meta input
function prfx_meta_save( $post_id ) {

	// check save status
	$is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // exit script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    // check header style checkbox for input and saves
    if( isset( $_POST[ 'meta-checkbox-header-style' ] ) ) {
    	update_post_meta( $post_id, 'meta-checkbox-header-style', 'yes' );
	}
	else {
    	update_post_meta( $post_id, 'meta-checkbox-header-style', '' );
    }
}
add_action( 'save_post', 'prfx_meta_save' );

/*
// add meta boxes on setup function
function hoopy_post_meta_boxes_setup() {	
	// add meta boxes on the 'add_meta_boxes' hook
	add_action ('add_meta_boxes', 'hoopy_add_post_meta_boxes');

	// save post meta on the 'save_post' hook
	add_action('save_post', 'hoopy_save_post_class_meta', 10, 2);
}

// load metabox setup function on post editor
add_action('load-post.php', 'hoopy_post_meta_boxes_setup');
add_action('load-post-new.php', 'hoopy_post_meta_boxes_setup');

// create meta boxes to be displayed on post editor
function hoopy_add_post_meta_boxes() {
	add_meta_box(
		'hoopy-post-class', // unique ID
		esc_html__('Post Class', 'example'), // title
		'hoopy_post_class_meta_box', // callback function
		null, // admin page (or post type)
		'side', // context
		'default' // priority
		);
}

// display the post meta box
function hoopy_post_class_meta_box( $object, $box ) {
	wp_nonce_field( basename( __FILE__ ), 'hoopy_post_class_nonce' ); ?>

  <p>
    <span class="prfx-row-title"><?php _e( 'Additional styles', 'prfx-textdomain' )?></span>
    <div class="prfx-row-content">
        <label for="meta-checkbox">
            <input type="checkbox" name="meta-checkbox" id="meta-checkbox" value="yes" <?php if ( isset ( $prfx_stored_meta['meta-checkbox'] ) ) checked( $prfx_stored_meta['meta-checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Transparent header', 'prfx-textdomain' )?>
        </label>
    </div>
</p>

<?php }

// save the metabox post metadata
function hoopy_save_post_class_meta( $post_id, $post ) {
	
	//verify nonce before proceeding
	if ( !isset( $_POST['hoopy_post_class_nonce'] ) || !wp_verify_nonce( $_POST['hoopy_post_class_nonce'], basename( __FILE__ ) ) )
    return $post_id;
	
	//get post type object
	$post_type = get_post_type_object( $post->post_type );

	//check current user has permission to edit the post
	if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
    return $post_id;

	//get posted data and sanitize it for use as HTML class
	$new_meta_value = ( isset( $_POST['hoopy-post-class'] ) ? sanitize_html_class( $_POST['hoopy-post-class'] ) : '' );

	//get meta key
	$meta_key = 'hoopy_post_class';

	//get meta value of custom field key
	$meta_value = get_post_meta( $post_id, $meta_key, true);

	//if new meta value was added and there was no previous value, add it
	if ( $new_meta_value && '' == $meta_value )
    add_post_meta( $post_id, $meta_key, $new_meta_value, true );
	
	//if new meta value does not match old value, update
	elseif ( $new_meta_value && $new_meta_value != $meta_value )
		update_post_meta( $post_id, $meta_key, $new_meta_value );

	//if there is no new meta value but an old value exists, delete it
	elseif ( '' == $new_meta_value && $meta_value ) 
		delete_post_meta( $post_id, $meta_key, $meta_value );
}
*/

