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
	 * Initialize the class and set its properties.
	 *
	 * @since    0.1.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Redirect All WordPress frontend requests to the home
	 *
	 * Redirect All WordPress frontend requests to home, except for WP Rest API endpoints.
	 * This function is also declared in Veritate API Theme as fallback and these redirection
	 * will also be declared in .htaccess/.htconfig and in reverse-proxy layer (Nginx or Cloudflare)
	 *
	 * @since 0.1.0
	 */
	public function veritate_headless_redirect() {
		if ( ! is_front_page() ) {
			wp_redirect( home_url() );
			exit;
		}
	}

	/**
	 * Disable undesired WP Rest API Endpoints
	 *
	 * Disables some unused/undesired WP Rest API endpoints.
	 * This function is also declared in Veritate API Theme as fallback and these redirection.
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

}
