<?php
/**
 * Plugin Name: Veritate - Fact Check Crawler MU Control
 * Description: Short description of your plugin here.
 * Author:      your name here
 * License:     GNU General Public License v3 or later
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * Must Use Plugin Functions for Veritate API
 * Copy this file to /wp-content/mu-plugins/ directory
 * @link       https://veritatecrawler.wowperations.com.br
 * @since      0.1.0
 * @package    Veritate_Fact_Check_Crawler
 * @subpackage Veritate_Fact_Check_Crawler/includes
 */

// Basic security, prevents file from being loaded directly.
defined( 'ABSPATH' ) || die( 'Cheatin&#8217; uh?' );

/**
 * Redirect All WordPress frontend requests to the home
 *
 * Redirect All WordPress frontend requests to home, except for WP Rest API endpoints.
 * This function is also declared in Veritate API Theme as fallback and these redirection
 * will also be declared in .htaccess/.htconfig and in reverse-proxy layer (Nginx or Cloudflare)
 *
 * @since 0.1.0
 */
function veritate_headless_redirect() {
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
function veritate_rest_endpoints( $endpoints ) {
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
add_action( 'template_redirect', 'veritate_headless_redirect' );
add_filter( 'rest_endpoints', 'veritate_rest_endpoints', 99 );
