<?php
/**
 * Swiftype_Exclusions
 *
 * @package   Swiftype_Exclusions
 * @author    Nick Breslin <nickbreslin@gmail.com>
 * @license   MIT
 * @link      http://www.woolclad.com
 * @copyright 2014 Nick Breslin
 *
 *
 * @wordpress-plugin
 * Plugin Name:       Swiftype Exclusions
 * Plugin URI:        http://www.woolclad.com
 * Description:       Wordpress plugin to configure exclusions for Swiftype.
 * Version:           0.0.1
 * Author:            Nick Breslin
 * Author URI:        http://www.nickbreslin.com
 * Text Domain:       swiftype-exclusions
 * License:           MIT
 * GitHub Plugin URI: nickbreslin/swiftype-exclusions-wordpress
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once( plugin_dir_path( __FILE__ ) . '/public/class-swiftype-exclusions.php' );
require_once( plugin_dir_path( __FILE__ ) . '/includes/class-fieldmap.php' );




/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*.
 */
if (is_admin()) {

	//require_once( plugin_dir_path( __FILE__ ) . 'admin/class-swiftype-exclusion-admin.php' );
}