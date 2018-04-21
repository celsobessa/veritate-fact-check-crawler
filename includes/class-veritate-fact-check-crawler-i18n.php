<?php
/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://veritate.wowperations.com.br
 * @since      0.1.0
 *
 * @package    Veritate_Fact_Check_Crawler
 * @subpackage Veritate_Fact_Check_Crawler/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      0.1.0
 * @package    Veritate_Fact_Check_Crawler
 * @subpackage Veritate_Fact_Check_Crawler/includes
 * @author     Celso Bessa <celso.bessa@wowperations.com.br>
 */
class Veritate_Fact_Check_Crawler_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    0.1.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'veritate-fact-check-crawler',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
