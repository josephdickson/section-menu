<?php 
/*

Plugin Name: Section Menu
Plugin URI: pitweb.pitzer.edu
Description: A simple plugin to create accordion style "section" menus for Foundation 4. Seperate menus will need be created for each "section" but can be added via widgets.
Version: 1.5.1
Author: Joseph Dickson
Author URI: pitweb.pitzer.edu
Date Created: July 2, 2014
Modified: September 17, 2014 -- added if statement to disable on an incompatible blog that features this plugin built into functions.php --
*/

add_filter('site_option_active_sitewide_plugins', 'modify_sitewide_plugins_section_menu');

function modify_sitewide_plugins_section_menu($value) {
    global $current_blog;
/*
	if( $current_blog->blog_id == 65 ) {
        unset($value['section-menu/section-menu.php']);
    }
*/
    return $value;
}

register_sidebar(array(
 'name' => 'Section Menu',
 'id' => 'section-menu',
 'before_title' => '<p class="title" data-section-title>',
 'after_title' => '</p>',
 'before_widget' => '<div id="section-menu" class="section-container accordion" data-section="accordion"><section>',
 'after_widget'  => '</section></div>',
 ));

/*
 * enqueue script
 */

function section_menu() {
  	wp_enqueue_script( 'foundation-section', plugins_url() . '/section-menu/foundation.section.js', array ('jquery'),'',true );
	wp_enqueue_script( 'active-section', plugins_url() . '/section-menu/section-menu.js', array ('jquery'),'',true );
	wp_enqueue_style ( 'style-section', plugins_url() . '/section-menu/section-menu.css' );
}


add_action( 'wp_enqueue_scripts', 'section_menu');

?>