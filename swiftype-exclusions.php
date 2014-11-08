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


/**
 * Swiftype_Exclusions class. This class should ideally be used to work with the
 * public-facing side of the WordPress site.
 *
 *
 * @package Swiftype_Exclusions
 * @author  Nick Breslin <nickbreslin@gmail.com>
 */
class Swiftype_Exclusions {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 *
	 * @since   1.0.0
	 *
	 * @var     string
	 */
	const VERSION = '0.0.1';

	/**
	 * Unique identifier for your plugin.
	 *
	 *
	 * The variable name is used as the text domain when internationalizing strings
	 * of text. Its value should match the Text Domain file header in the main
	 * plugin file.
	 *
	 * @since    1.0.0
	 *
	 * @var      string
	 */
	protected $plugin_slug = 'swiftype-exclusions';

	/**
	 * Instance of this class.
	 *
	 * @since    1.0.0
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Initialize the plugin by setting localization and loading public scripts
	 * and styles.
	 *
	 * @since     1.0.0
	 */
	private function __construct() {

		// Load public-facing style sheet and JavaScript.
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );


		add_filter( 'swiftype_search_params', array($this, 'swiftype_search_params_filter' ));
		add_action( 'wp_head', array($this, 'swiftype_javascript_config' ));

	}

	/**
	 * Return the plugin slug.
	 *
	 * @since    1.0.0
	 *
	 * @return    Plugin slug variable.
	 */
	public function get_plugin_slug() {
		return $this->plugin_slug;
	}

	/**
	 * Return an instance of this class.
	 *
	 * @since     1.0.0
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Register and enqueue public-facing style sheet.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_slug . '-plugin-styles', plugins_url( 'assets/css/public.css', __FILE__ ), array(), self::VERSION );
	}

	/**
	 * Register and enqueues public-facing JavaScript files.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_slug . '-plugin-script', plugins_url( 'assets/js/public.js', __FILE__ ), array( 'jquery' ), self::VERSION );
	}



	function swiftype_search_params_filter( $params ) {
	    // Include all categories except 162
	    //$params['filters[posts][title]'] = array( '' );
	    return $params;
	}


	// autocomplete

	function swiftype_javascript_config() {
	?>
	<script type="text/javascript">
	var swiftypeConfig = {
	  filters: {
	    posts: {
	   //   title: [""]
	    }
	  }
	};
	</script>
	<?php
	}

}
