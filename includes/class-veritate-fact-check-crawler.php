<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://veritatecrawler.wowperations.com.br
 * @since      0.1.0
 *
 * @package    Veritate_Fact_Check_Crawler
 * @subpackage Veritate_Fact_Check_Crawler/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      0.1.0
 * @package    Veritate_Fact_Check_Crawler
 * @subpackage Veritate_Fact_Check_Crawler/includes
 * @author     Celso Bessa <celso.bessa@wowperations.com.br>
 */
class Veritate_Fact_Check_Crawler {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    0.1.0
	 * @access   protected
	 * @var      Veritate_Fact_Check_Crawler_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

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
	 * An instance of the plugin's utilities
	 *
	 * @since    0.1.0
	 * @access   protected
	 * @var      string    $utilities    An instance of the plugin's utilities
	 */
	protected $utilities;

	/**
	 * An instance of plugin's common class
	 *
	 * @since    0.1.0
	 * @access   protected
	 * @var      string    $common   An instance of plugin's common class
	 */
	protected $common;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    0.1.0
	 */
	public function __construct() {

		$this->plugin_name = 'veritate-fact-check-crawler';
		$this->version = '0.3.0';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Veritate_Fact_Check_Crawler_Loader. Orchestrates the hooks of the plugin.
	 * - Veritate_Fact_Check_Crawler_i18n. Defines internationalization functionality.
	 * - Veritate_Fact_Check_Crawler_Utilities. Defines the all plugin utilities used on back and front ends.
	 * - Veritate_Fact_Check_Crawler_Admin. Defines all hooks for the admin area.
	 * - Veritate_Fact_Check_Crawler_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    0.1.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-veritate-fact-check-crawler-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-veritate-fact-check-crawler-i18n.php';

		/**
		 * The class responsible for defining all utilities used in both public and admin areas.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-veritate-fact-check-crawler-utilities.php';

		/**
		 * The class responsible for common functionalites used in both public and admin areas.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-veritate-fact-check-crawler-common.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-veritate-fact-check-crawler-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-veritate-fact-check-crawler-public.php';

		$this->utilities = new Veritate_Fact_Check_Crawler_Utilities( $this->get_plugin_name(), $this->get_version() );

		$this->common = new Veritate_Fact_Check_Crawler_Common( $this->get_plugin_name(), $this->get_version() );

		$this->loader = new Veritate_Fact_Check_Crawler_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Veritate_Fact_Check_Crawler_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    0.1.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Veritate_Fact_Check_Crawler_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Veritate_Fact_Check_Crawler_Admin( $this->get_plugin_name(), $this->get_version(), $this->get_utilities(), $this->get_common() );

		$this->loader->add_action( 'rest_api_init', $plugin_admin, 'register_post_api_hooks' );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    0.1.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Veritate_Fact_Check_Crawler_Public( $this->get_plugin_name(), $this->get_version(), $this->get_utilities(), $this->get_common() );

		$this->loader->add_action( 'template_redirect', $plugin_public, 'veritate_headless_redirect', 20 );
		$this->loader->add_action( 'rest_endpoints', $plugin_public, 'veritate_rest_endpoints' );
		$this->loader->add_filter( 'rest_prepare_post', $plugin_public, 'rest_prepare_post', 10, 3 );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    0.1.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     0.1.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     0.1.0
	 * @return    Veritate_Fact_Check_Crawler_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     0.1.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Retrieve the plugin utitlies.
	 *
	 * @since     0.1.0
	 * @return    object    Plugin utilities
	 */
	public function get_utilities() {
		return $this->utilities;
	}

	/**
	 * Retrieve the plugin common functions and methods
	 *
	 * @since     0.1.0
	 * @return    object   An instance of common class holding methods and properties used in front and backend
	 */
	public function get_common() {
		return $this->common;
	}

}
