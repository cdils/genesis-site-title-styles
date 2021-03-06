<?php
/**
 * Genesis Site Title Styles
 *
 * Read more about why we created this plugin at http://savvyjackiedesigns.com/genesis-site-title-styles-plugin/
 *
 * @package           Genesis_Site_Title_Styles
 * @author            Jackie D'Elia and Ginger Coolidge
 * @license           GPL-2.0+
 * @link              http://www.savvyjackiedesigns.com
 * @copyright         2015 Jackie D'Elia and Ginger Coolidge
 *
 * Plugin Name:       Genesis Site Title Styles
 * Plugin URI:        https://github.com/savvyjackie/genesis-site-title-styles
 * Description:       Adds a span tag to each word in the site title for separate styling with css using the nth-child() selector.
 * Version:           0.2
 * Author:            Jackie D'Elia and Ginger Coolidge
 * Author URI:        http://www.savvyjackiedesigns.com
 * Text Domain:       genesis-site-title-styles
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/savvyjackie/genesis-site-title-styles
 * GitHub Branch:     master
 */


// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

// Filter the site title
add_filter( 'genesis_seo_title', 'sjd_genesis_site_title' );

/**
 * Add additional markup to site title.
 * 
 * Wrap each word of the title in a span tag, so that users can target that word specifically
 * via CSS by utilizing the nth-of-type() selector.
 *
 * @since 0.1
 */
function sjd_genesis_site_title( $title ) {
        
    // Assign site title to a variable
    $custom_title = esc_attr( get_bloginfo( 'name' ) );
    
    // Add span tag to each word in title
    $custom_title = preg_replace( '([a-zA-Z.,!?0-9]+(?![^<]*>))', '<span>$0</span>', $custom_title );
   
    // Don't change the rest of this
    $inside = sprintf( '<a href="%s" title="%s">%s</a>', trailingslashit( home_url() ), esc_attr( get_bloginfo( 'name' ) ), $custom_title );
    $title = '<h1 class="site-title" itemprop="headline">'. $inside .'</h1>';
    return $title;
    
}
?>
