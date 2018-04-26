<?php
/**
 * Functionality common for both admin public-facing area of the plugin.
 *
 * @link       https://veritatecrawler.wowperations.com.br
 * @since      0.3.0
 *
 * @package    Veritate_Fact_Check_Crawler
 * @subpackage Veritate_Fact_Check_Crawler/public
 */

/**
 * Admin and public-facing functionality of the plugin.
 *
 * Defines the plugin name, version and functionality common for both admin public-facing area of the plugin.
 *
 * @package    Veritate_Fact_Check_Crawler
 * @subpackage Veritate_Fact_Check_Crawler/includes
 * @author     Celso Bessa <celso.bessa@wowperations.com.br>
 */
class Veritate_Fact_Check_Crawler_Common {

	/**
	 * The ID of this plugin.
	 *
	 * @since    0.3.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    0.3.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    0.3.0
	 * @param string $plugin_name The name of the plugin.
	 * @param string $version     The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Filter post rest response
	 *
	 * Filters post rest response, removing certain information.
	 * TODO: move to it's own custom endpoint and make posts endpoint available only
	 * from localhost and/or admin and avoid breaking plugins/core functionality in the future.
	 *
	 * @since 0.3.0
	 * @access public
	 * @param object $data    The response object.
	 * @param object $post    The original post type object.
	 * @param object $request Request used to generate the response.
	 * @return object $data The filtered response object.
	 */
	public function rest_prepare_post( $data, $post, $request ) {
		$_data = $data->data;
		$params = $request->get_params();
		unset( $_data['guid'] );
		unset( $_data['slug'] );
		unset( $_data['status'] );
		unset( $_data['type'] );
		unset( $_data['link'] );
		unset( $_data['content'] );
		unset( $_data['excerpt'] );
		unset( $_data['author'] );
		unset( $_data['comment_status'] );
		unset( $_data['ping_status'] );
		unset( $_data['sticky'] );
		unset( $_data['template'] );
		unset( $_data['format'] );
		unset( $_data['meta'] );
		unset( $_data['_links'] );
		$data->remove_link( 'about' );
		$data->remove_link( 'author' );
		$data->remove_link( 'replies' );
		$data->remove_link( 'version-history' );
		$data->remove_link( 'https://api.w.org/featuredmedia' );
		$data->remove_link( 'https://api.w.org/attachment' );
		$data->remove_link( 'https://api.w.org/term' );
		$data->remove_link( 'curies' );
		$data->data = $_data;
		return $data;
	}

}
