<?php
/**
 * The file that defines the plugin utilities class
 *
 * A class definition that includes utility attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://veritatecrawler.wowperations.com.br
 * @since      0.1.0
 *
 * @package    Veritate_Fact_Check_Crawler
 * @subpackage Veritate_Fact_Check_Crawler/includes
 */

/**
 * The file that defines the plugin utilities class
 *
 * Utility attributes and functions used across both the both the
 * public-facing side of the site and the admin area.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      0.1.0
 * @package    Veritate_Fact_Check_Crawler
 * @subpackage Veritate_Fact_Check_Crawler/includes
 * @author     Celso Bessa <celso.bessa@wowperations.com.br>
 */
class Veritate_Fact_Check_Crawler_Utilities {

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    0.1.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    0.1.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since 0.1.0
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version     The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Return an instance of this class.
	 *
	 * @return object A single instance of this class.
	 */
	public static function get_instance() {
		// If the single instance hasn't been set, set it now.
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Get includes path.
	 *
	 * @return string
	 */
	public static function get_includes_path() {
		return plugin_dir_path( __FILE__ ) . 'includes/';
	}

	/**
	 * Registers Fact Check Custom Post Type
	 */
	public function register_fact_check_cpt() {

	}

	/**
	 * Populate custom post type fact check fields
	 * subclass específica para cada veículo extendendo uma "interface"?
	 *
	 * @param string $outlet the name of the media outlet for mapping item fields.
	 * @param object $item   a JSON object.
	 */
	public function map_item_fields( $outlet, $item ) {

		// calls parse_apify_json class específica do outlet.
	}

	/**
	 * Create a new fact check item
	 *
	 * @param array  $data    an array of post data mapped from item JSON.
	 * @param object $options an array of options.
	 */
	public function create_item( $data = '', $options = array(
		purge_cache => false,
	) ) {
		// gera hash do campo conteúdo.
		// cria post.
	}

	/**
	 * Process outlet results
	 *
	 * @param string $outlet_name the name of the media outlet for mapping item fields.
	 * @param object $options     an array of options.
	 */
	public function process_outlet_crawl_results( $outlet_name = '', $options = array(
		purge_cache => false,
	) ) {
		// define qual json pegar
		// pega json
		// parse json into array
		// for each item
			// checa se url está no array de OUTLETNAME_last_processed_items (10 itens)
			// se sim, return
			// se não
			// padroniza o array baseado no OUTLETNAME usando map_item_fields
			// cria objeto create_item
		// opcionalmente limpa caches usando uma classe específica que verifca o ambiente, inicialmente com WPE cache.
	}

	/**
	 * Process all outlets
	 *
	 * @param object $options     an array of options.
	 */
	public function process_outlets( $options = array(
		purge_cache => true,
	) ) {
		// chama process_outlet_crawl_results para cada $outlet_registrado
		// limpar caches usando uma classe específica que verifca o ambiente, inicialmente com WPE cache.
	}



}
