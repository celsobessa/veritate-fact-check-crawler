<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://veritatecrawler.wowperations.com.br
 * @since      0.1.0
 *
 * @package    Veritate_Fact_Check_Crawler
 * @subpackage Veritate_Fact_Check_Crawler/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Veritate_Fact_Check_Crawler
 * @subpackage Veritate_Fact_Check_Crawler/public
 * @author     Celso Bessa <celso.bessa@wowperations.com.br>
 */
class Veritate_Fact_Check_Crawler_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * An instance of the plugin's utilities
	 *
	 * @since    0.3.0
	 * @access   protected
	 * @var      string    $utilities    An instance of the plugin's utilities.
	 */
	protected $utilities;

	/**
	 * An instance of plugin's common class
	 *
	 * @since    0.3.0
	 * @access   protected
	 * @var      string    $common   An instance of plugin's common class.
	 */
	protected $common;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 0.1.0
	 * @param string $plugin_name       The name of this plugin.
	 * @param string $version    The version of this plugin.
	 * @since 0.3.0
	 * @param object $utilities An instance of the plugin's utilities.
	 * @param object $common    An instance of plugin's common class.
	 */
	public function __construct( $plugin_name, $version, $utilities, $common ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->utilities = $utilities;
		$this->common = $common;

	}

	/**
	 * Redirect All WordPress frontend requests to the home
	 *
	 * Redirect All WordPress frontend requests to home, except for WP Rest API endpoints.
	 * This function is also declared in Veritate API Theme as fallback and these redirection
	 * will also be declared in .htaccess/.htconfig and in reverse-proxy layer (Nginx or Cloudflare)
	 *
	 * @since 0.1.0
	 * @since 0.2.0 uses wp_safe_redirect, uses 301 redirection and don't redirect for 404 requests.
	 */
	public function veritate_headless_redirect() {
		if ( ! is_front_page() ) {
			wp_safe_redirect( home_url(), 301 );
			exit;
		}
	}

	/**
	 * Disable undesired WP Rest API Endpoints
	 *
	 * Disables some unused/undesired WP Rest API endpoints.
	 * This function is also declared in Veritate API Theme as fallback
	 *
	 * @since  0.1.0
	 * @param  array $endpoints an array with all registered REST API Endpoints.
	 *
	 * @return array $endpoints an filtered array of all registered REST API Endpoints.
	 */
	public function veritate_rest_endpoints( $endpoints ) {
		if ( isset( $endpoints['/wp/v2/users'] ) ) {
			unset( $endpoints['/wp/v2/users'] );
		}
		if ( isset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] ) ) {
			unset( $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
		}
		if ( isset( $endpoints['/wp/v2/pages'] ) ) {
			unset( $endpoints['/wp/v2/pages'] );
		}
		if ( isset( $endpoints['/wp/v2/pages/(?P<id>[\d]+)'] ) ) {
			unset( $endpoints['/wp/v2/pages/(?P<id>[\d]+)'] );
		}
		if ( isset( $endpoints['/wp/v2/media'] ) ) {
			unset( $endpoints['/wp/v2/media'] );
		}
		if ( isset( $endpoints['/wp/v2/media/(?P<id>[\d]+)'] ) ) {
			unset( $endpoints['/wp/v2/media/(?P<id>[\d]+)'] );
		}
		if ( isset( $endpoints['/wp/v2/types'] ) ) {
			unset( $endpoints['/wp/v2/types'] );
		}
		if ( isset( $endpoints['/wp/v2/types/(?P<id>[\d]+)'] ) ) {
			unset( $endpoints['/wp/v2/types/(?P<id>[\d]+)'] );
		}
		if ( isset( $endpoints['/wp/v2/statuses'] ) ) {
			unset( $endpoints['/wp/v2/statuses'] );
		}
		if ( isset( $endpoints['/wp/v2/statuses/(?P<id>[\d]+)'] ) ) {
			unset( $endpoints['/wp/v2/statuses/(?P<id>[\d]+)'] );
		}
		if ( isset( $endpoints['/wp/v2/comments'] ) ) {
			unset( $endpoints['/wp/v2/comments'] );
		}
		if ( isset( $endpoints['/wp/v2/comments/(?P<id>[\d]+)'] ) ) {
			unset( $endpoints['/wp/v2/comments/(?P<id>[\d]+)'] );
		}
		return $endpoints;
	}

	/**
	 * Filter post REST response using Veritate_Fact_Check_Crawler_Common::rest_prepare_post.
	 *
	 * A wrapper for Veritate_Fact_Check_Crawler_Common::rest_prepare_post, which filters
	 * post REST API response .
	 *
	 * @since 0.3.0
	 * @access public
	 * @param object $data    The response object.
	 * @param object $post    The original post type object.
	 * @param object $request Request used to generate the response.
	 * @return object $data The filtered response object.
	 */
	public function rest_prepare_post( $data, $post, $request ) {
		return $this->common->rest_prepare_post( $data, $post, $request );
	}

	/**
	 * Disallow all feeds
	 *
	 * Disallow all feeds (RSS, Atom, RDF), etc.
	 *
	 * @since 0.3.2
	 * @access public
	 * @return void
	 */
	function disable_feed() {
		wp_die( __( 'No feed available, please visit the <a href="'. esc_url( home_url( '/' ) ) .'">homepage</a>!', $this->plugin_name ) ); //phpcs:ignore
	}

	/**
	 * Discourage search engines indexing, except for home.
	 *
	 * This Discourage search engine all URLs indexing, except for home. By default,
	 * even if the site is set to public, only the home page will be public. This
	 * behavior can be changed by using the `veritate_discourage_search_engines`
	 * action hook to conditinally add and/or removing the wp_no_robots function.
	 * Note that this function may not be used depending on the theme used by the install.
	 *
	 * @since  0.4.0
	 * @uses wp_no_robots
	 */
	function discourage_search_engines() {
		if ( is_admin() ) {
			return;
		}

		// if the blog is public, only the homepage is public.
		if ( '1' == get_option( 'blog_public' ) ) {

			if ( ! is_home() && ! is_front_page() ) {
				add_action( 'wp_head', 'wp_no_robots', 1 );
				add_action( 'veritate_theme_robots', 'wp_no_robots', 1 );
			}
		} else {
			add_action( 'veritate_theme_robots', 'wp_no_robots', 1 );
		}

		// hook for overriding the above rules.
		do_action( 'veritate_discourage_search_engines' );
	}

}
