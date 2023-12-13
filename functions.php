<?php
/**
 * MyFirstTheme's functions and definitions
 *
 * @package MyFirstTheme
 * @since MyFirstTheme 1.0
 */

/**
 * First, let's set the maximum content width based on the theme's
 * design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
 
 
 
 
 
// Prevent direct access to this file.
if (!defined('ABSPATH')) {
    exit;
}






// Enqueue theme stylesheets and scripts
function theme_enqueue_scripts() {
	
	// Enqueue main stylesheet
	wp_enqueue_style( 'style', get_stylesheet_uri() );

}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');





function enqueue_fancybox() {
    // Enqueue Fancybox script
    wp_enqueue_script(
        'fancybox-js', // Unique handle for your script
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js', // URL to the script file
        array(), // No dependencies
        false // No version number
    );

    // Enqueue Fancybox style
    wp_enqueue_style(
        'fancybox-css', // Unique handle for your style
        'https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css', // URL to the CSS file
        array(), // No dependencies
        false // No version number
    );
}
add_action('wp_enqueue_scripts', 'enqueue_fancybox');






?>
