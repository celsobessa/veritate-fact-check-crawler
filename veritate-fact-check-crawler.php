<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://veritate.wowperations.com.br
 * @since             0.1.0
 *
 * @wordpress-plugin
 * Plugin Name:       Veritate - Fact Check Crawler
 * Plugin URI:        https://veritate.wowperations.com.br
 * Description:       A under the hood plugin for crawling fact checking website in Brazil and adding it to WordPress. Part of the Veritate Initiative.
 * Version:           0.1.0
 * Author:            Celso Bessa
 * Author URI:        https://veritate.wowperations.com.br
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       veritate-fact-check-crawler
 * Domain Path:       /languages
 *
 *
 * Veritate - Fact Check Crawler is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * WooCommerce PagSeguro Tinker is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with WooCommerce PagSeguro. If not, see
 * <https://www.gnu.org/licenses/gpl-2.0.txt>.
 *
 * @package Veritate_Fact_Check_Crawler
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! class_exists( 'Veritate_Fact_Check_Crawler' ) ) {

    /**
     * WooCommerce PagSeguro Tinker main class.
     */
    class Veritate_Fact_Check_Crawler {

        /**
         * Plugin version.
         *
         * @var string
         */
        protected $version = '0.1.0';

        /**
         * Plugin slug.
         *
         * @var string
         */
        protected $plugin_name = 'veritate-fact-check-crawler';

        /**
         * Instance of this class.
         *
         * @var object
         */
        protected static $instance = null;

        /**
         * Initialize the plugin public actions.
         */
        private function __construct() {
            // Load plugin text domain.
            add_action( 'init', array( $this, 'load_plugin_textdomain' ) );
            add_action( 'wp_enqueue_scripts', array( $this, 'manage_public_assets') );

            // TODO
            //add_filter( 'wc_get_template', array( $this, 'filter_pagseguro_payment_method_markup') 20, 5 );


        }

        /**
         * Return an instance of this class.
         *
         * @return object A single instance of this class.
         */
        public static function get_instance() {
            // If the single instance hasn't been set, set it now.
            if ( null === self::$instance ) {
                self::$instance = new self;
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
         * Load the plugin text domain for translation.
         */
        public function load_plugin_textdomain() {
            load_plugin_textdomain( 'veritate-fact-check-crawler', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
        }

        /**
         * Registers Fact Check Custom Post Type
         */
        public function register_fact_check_cpt() {


        }

        /**
         * populate custom post type fact check fields
         * subclass específica para cada veículo extendendo uma "interface"?
         */
        public function map_item_fields( $outlet , $item) {

            // calls parse_apify_json class específica do outlet
        }

        /**
         * Create a new fack check item
         */
        public function create_item( $data) {
            // gera hash do campo conteúdo
            // cria post

        }

        /**
         * Process outlet results
         */
        public function process_outlet_crawl_results( $outlet_name) {
            // define qual json pegar
            // pega json
            // parse json into array
            // for each item
                // checa se url está no array de OUTLETNAME_last_processed_items (10 itens)
                // se sim, return
                // se não
                // padroniza o array baseado no OUTLETNAME usando map_item_fields
                // cria objeto create_item
            // limpar caches usando uma classe específica que verifca o ambiente, inicialmente com WPE cache

        }

        /**
         * Process all outlets
         */
        public function process_outlet( $outlet_name) {
            // define qual json pegar
            // pega json
            // parse json into array
            // for each item
                // checa se url está no array de OUTLETNAME_last_processed_items (10 itens)
                // se sim, return
                // se não
                // padroniza o array baseado no OUTLETNAME usando map_item_fields
                // cria objeto create_item
            // limpar caches usando uma classe específica que verifca o ambiente, inicialmente com WPE cache

        }




    }

    add_action( 'plugins_loaded', array( 'Veritate_Fact_Check_Crawler', 'get_instance' ) );

}