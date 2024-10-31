<?php
/*
Plugin Name: Noor Responsive Tab
Plugin URI: http://www.bolobd.com/
Description: Noor Responsive Tab is ultimate wordpress tab plugin. You can customize lot of things such as tab title color, tab fonts with font-awesome icons, tab width, tab background, tab active color, tab hover color. Its support categories so you can easily create multiple tabs with multiple settings.
Author: Noor-E-Alam
Author URI: http://bolobd.com
Version: 1.0
*/


// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

//Loading CSS and Scripts
function rs_touch_tab_scripts() {
	
	wp_enqueue_script('jquery');
	wp_enqueue_style('rs_touch_tab_style_main', plugins_url( '/css/style.css' , __FILE__ ) );
	wp_enqueue_style('rs_touch_tab_bootstrap', plugins_url( '/css/bootstrap.min.css' , __FILE__ ) );
	wp_enqueue_script('rs_touch_tab_bootstrap_js', plugins_url( '/js/bootstrap.min.js' , __FILE__ ) );
	//wp_enqueue_script('rs_touch_tab_ui_js', plugins_url( '/js/jquery-ui.js' , __FILE__ ) );
	//wp_enqueue_script('rs_touch_tab_main_js', plugins_url( '/js/main.js' , __FILE__ ) );

}

add_action( 'wp_enqueue_scripts', 'rs_touch_tab_scripts' );




/**
* Enqueue Font Awesome Stylesheet from MaxCDN
*
*/
add_action( 'wp_enqueue_scripts', 'rs_touch_load_font_awesome', 99 );
function rs_touch_load_font_awesome() {
if ( ! is_admin() ) {
 
wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css', null, '4.0.1' );
 
}
 
}


// Setup Contants
defined( 'VP_TAB_VERSION' ) or define( 'VP_TAB_VERSION', '2.0' );
defined( 'VP_TAB_URL' )     or define( 'VP_TAB_URL', plugin_dir_url( __FILE__ ) );
defined( 'VP_TAB_DIR' )     or define( 'VP_TAB_DIR', plugin_dir_path( __FILE__ ) );
defined( 'VP_TAB_FILE' )    or define( 'VP_TAB_FILE', __FILE__ );

// Load Languages
add_action('plugins_loaded', 'rs_tab_load_textdomain');

function rs_tab_load_textdomain()
{
	load_plugin_textdomain( 'vp_textdomain', false, dirname( plugin_basename( __FILE__ ) . '/framework/lang/' ) ); 
}

// Lood Bootstrap
require_once 'framework/bootstrap.php';




// Registering Custom Post
add_action( 'init', 'rs_touch_tab_custom_post' );
function rs_touch_tab_custom_post() {
	register_post_type( 'rstab',
		array(
			'labels' => array(
				'name' => __( 'Tabs' ),
				'singular_name' => __( 'tab' ),
				'add_new_item' => __( 'Add New tab' )
			),
			'public' => true,
			'supports' => array('title'),
			'has_archive' => true,
			'rewrite' => array('slug' => 'tab'),
			'menu_icon' => '',
			'menu_position' => 20,
		)
	);
	
}

// Registering Custom post's category
add_action( 'init', 'rs_touch_tab_custom_post_taxonomy'); 
function rs_touch_tab_custom_post_taxonomy() {
	register_taxonomy(
		'tab_cat',  
		'rstab',
		array(
			'hierarchical'          => true,
			'label'                         => 'Tabs Category',
			'query_var'             => true,
			'show_admin_column'             => true,
			'rewrite'                       => array(
				'slug'                  => 'tab-category',
				'with_front'    => true
				)
			)
	);
}
  
require_once 'admin/metabox/icon.php';



// Load Metaboxes 

new VP_Metabox(array
(
			'id'          => 'addsmeta',
			'types'       => array('rstab'),
			'title'       => __('Tab Titles and Contents Section ', 'vp_textdomain'),
			'priority'    => 'high',
			'template' => VP_TAB_DIR . '/admin/metabox/addsmeta.php'
));

new VP_Metabox(array
(
			'id'          => 'customize',
			'types'       => array('rstab'),
			'title'       => __('Tab Settings Section', 'vp_textdomain'),
			'priority'    => 'high',
			'template' => VP_TAB_DIR . '/admin/metabox/settingsmeta.php'
));



// Register Shortcode
function rs_touch_tab_shortcode($atts){
	extract( shortcode_atts( array(
	
		'category' => '',	
		
	), $atts) );
	
	
	    $q = new WP_Query(
        array('posts_per_page' => -1, 'post_type' => 'rstab', 'tab_cat' => $category)
        );
	
		while($q->have_posts()) : $q->the_post();
		//$id = get_the_ID();	

		
		
		$tabs = vp_metabox('addsmeta.tab_info', false);
		$hor_ver = vp_metabox('customize.settings.0.hor_ver', false);
		$style = vp_metabox('customize.settings.0.style', false);
		$color_title = vp_metabox('customize.settings.0.color_title', false);
		$color_active = vp_metabox('customize.settings.0.color_active', false);
		$color_bg = vp_metabox('customize.settings.0.color_bg', false);
		$width = vp_metabox('customize.settings.0.width', false);
		
		

		$output ='<div class="wrapper">

				<div id="main">
				
				<div class="container">
              	
                <div class="row">
			  
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                
				<div class="'.$hor_ver.' '.$style.'">';
                    

				
			$output .='<ul class="nav nav-tabs">';
				
			foreach ($tabs as $tab) {
				
				
			$output .='
		
			<li class="'.$tab['tab_active'].'"><a href="#'.$tab['id'].'" data-toggle="tab"><i class="fa '.$tab['fonta'].'"></i>'.$tab['title'].'</a></li>
                   
				   ';
		}
					
			$output .='</ul>';
			
			$output .='<div class="tab-content">';
         
		 
			foreach ($tabs as $tab) {           
			
			$output .='<div class="tab-pane fade in '.$tab['tab_active'].'" id="'.$tab['id'].'"><p>'.$tab['content'].'</p></div>';
		

		}
	
		$output .='</div>';
		endwhile;
		$output .= '</div></div></div></div></div>';
		$output .= '<style> 
		
					.nav-tabs li {
						  background-color:'.$color_bg.';
						}	
					.nav-tabs > li > a {
						  color: '.$color_title.';
						  font-size: 12px;
						}
						
						
						.nav-tabs > li.active > a, .nav-tabs > li > a:hover, nav-tabs > li > a:focus {
						
								color: '.$color_active.' !important;
						}
						
						.hor-tab {
							  max-width: '.$width.'%;
							}
									
					</style>';
		
		wp_reset_query();
		return $output;
}

add_shortcode('rstab', 'rs_touch_tab_shortcode');	


add_filter('widget_text', 'do_shortcode');


//Tinymce Button Add

add_action('admin_head', 'rs_touch_tab_tc_button');

function rs_touch_tab_tc_button() {
    global $typenow;
    // check user permissions
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
   	return;
    }
    // verify the post type
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return;
	// check if WYSIWYG is enabled
	if ( get_user_option('rich_editing') == 'true') {
		add_filter("mce_external_plugins", "rs_touch_tab_tc_button_add_tinymce_plugin");
		add_filter('mce_buttons', 'rs_touch_tab_tc_button_add_tinymce_plugin_register_my_tc_button');
	}
}

function rs_touch_tab_tc_button_add_tinymce_plugin($plugin_array) {
   	$plugin_array ['rstab_tc_button'] = plugins_url( '/admin/tinymce/button.js', __FILE__ );
   	return $plugin_array;
}


function rs_touch_tab_tc_button_add_tinymce_plugin_register_my_tc_button($buttons) {
   array_push($buttons, "rstab_tc_button");
   return $buttons;
}
?>