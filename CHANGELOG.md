# Changelog
Theme Name:  Veritate - Fact Check Crawler
Description: A under the hood plugin for managing the Veritate Fact Check Crawler and API, part of the Veritate Initiative.
Version:     0.4.0
Author:      Celso Bessa
Author URI:  https://www.celsobessa.com.br
License:     GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt

All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/)

## 0.4.0 - 2018-09-25

### Added
- Function to remove all standard WordPress feeds for performance reasons
- Suggested Apache .htaccess rules
- Suggested robots.txt file
- Plugins constants: `VERITATE_API_VERSION`,`VERITATE_API_PLUGIN_PATH` and `VERITATE_API_PLUGIN_URL`
- Discourage Search Engines indexing: discourage_search_engines method

### Fixed
- original urls not present in REST API response

### Changed
- Improved README.md, LEIAME.md and README.txt files
- meta robots tag value changed to `noindex,nofollow` on 404.php
- meta robots tag is can be managed by using the `veritate_theme_robots` action hook.

## 0.3.1 - [2018-04-26]

### Added
- README.md, LEIAME.MD with improved information about the project

### Changed
- README.txt with improved information about the project

## 0.3.0 - [2018-04-26]

### Added
- Veritate_Fact_Check_Crawler_Common, holding all methods and properties used in both admin and public areas

### Changed
- Several unwanted fields removed from JSON response
- authors custom field added to JSON response
- source_url custom field added to JSON response
- Initial WordPress Standards revision
- Better inline documentation

### Removed
- unused css, javascript and partials

## 0.2.1 - [2018-04-24]

### Changed
- revert 404 redirection

## 0.2.0 - [2018-04-24]

### Changed
- Text on 404.html now features copyright infringment removal and project objectives information
- safer redirection with wp_safe_redirect
- better fallback management by changing veritate_headless_redirect priorities in both the MU plugin and the public class

## 0.1.0 - [2018-04-23]

### Added
- Dummy data csv and json files
- Utilities Stubs
- veritate_headless_redirect fallback, in case both Veritate - Fact Check Crawler MU Control
	must-use plugin and Veritate API Theme are not present and active
- veritate_rest_endpoints fallback, in case both Veritate - Fact Check Crawler MU Control
	must-use plugin and Veritate API Theme are not present and active
- Veritate - Fact Check Crawler MU Control must-use plugin file


### Changed
- plugin url changed to https://veritatecrawler.wowperations.com.br