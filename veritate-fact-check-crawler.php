<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://veritatecrawler.wowperations.com.br
 * @since             0.1.0
 * @package Veritate_Fact_Check_Crawler
 *
 * @wordpress-plugin
 * Plugin Name:       Veritate - Fact Check Crawler
 * Plugin URI:        https://veritatecrawler.wowperations.com.br
 * Description:       A under the hood plugin for managing the Veritate Fact Check Crawler and API, part of the Veritate Initiative.
 * Version:           0.3.1
 * Author:            Celso Bessa
 * Author URI:        https://veritatecrawler.wowperations.com.br
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
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Plugin constants.
 */
define( 'VERITATE_API_VERSION', '0.4.0' );
define( 'VERITATE_API_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'VERITATE_API_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-veritate-fact-check-crawler-activator.php
 */
function activate_plugin_name() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-veritate-fact-check-crawler-activator.php';
	Veritate_Fact_Check_Crawler_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-veritate-fact-check-crawler-deactivator.php
 */
function deactivate_plugin_name() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-veritate-fact-check-crawler-deactivator.php';
	Veritate_Fact_Check_Crawler_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_plugin_name' );
register_deactivation_hook( __FILE__, 'deactivate_plugin_name' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-veritate-fact-check-crawler.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1.0
 */
function run_plugin_name() {

	$plugin = new Veritate_Fact_Check_Crawler();
	$plugin->run();

}
run_plugin_name();
