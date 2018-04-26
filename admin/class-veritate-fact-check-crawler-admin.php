<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://veritatecrawler.wowperations.com.br
 * @since      0.1.0
 *
 * @package    Veritate_Fact_Check_Crawler
 * @subpackage Veritate_Fact_Check_Crawler/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Veritate_Fact_Check_Crawler
 * @subpackage Veritate_Fact_Check_Crawler/admin
 * @author     Celso Bessa <celso.bessa@wowperations.com.br>
 */
class Veritate_Fact_Check_Crawler_Admin {

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
	 * Register the stylesheets for the admin area.
	 *
	 * @since    0.1.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Veritate_Fact_Check_Crawler_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Veritate_Fact_Check_Crawler_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/veritate-fact-check-crawler-admin.css', array(), $this->version, 'all' );

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
	 * Register new fields for post REST API response
	 *
	 * Register new fields for post REST API response
	 *
	 * @since     0.3.0
	 * @access    public
	 * @uses      $this->return_poi_taxonomies
	 * @return    void
	 */
	public function register_post_api_hooks() {

		// Add post authors custom field to REST Endpoint.
		register_rest_field(
			'post',
			'post_authors',
			array(
				'get_callback' => function ( $object, $field_name, $request ) {
					return $this->return_post_authors( $object );
				},
			)
		);

		// Add post source url custom field to REST Endpoint.
		register_rest_field(
			'post',
			'source_url',
			array(
				'get_callback' => function ( $object, $field_name, $request ) {
					return $this->return_source_url( $object );
				},
			)
		);
	}

	/**
	 * Return Post authors custom field.
	 *
	 * Return Post authors custom field for using by REST API.
	 *
	 * @since 0.3.0
	 * @access public
	 * @param object $object The rest item original object.
	 * @return string $post_authors an string with original article authors informations.
	 */
	public function return_post_authors( $object ) {

		$post_id = $object['id'];

		$post_authors = get_post_meta( $post_id, 'authors', true );

		return $post_authors;
	}

	/**
	 * Return Post original source url field.
	 *
	 * Return Post original source url custom post field for using by REST API.
	 *
	 * @since 0.3.0
	 * @access public
	 * @param object $object The rest item original object.
	 * @return string $source_url an string with original article authors informations.
	 */
	public function return_source_url( $object ) {

		$post_id = $object['id'];

		$source_url = get_post_meta( $post_id, 'source_url', true );

		return $source_url;
	}

}
