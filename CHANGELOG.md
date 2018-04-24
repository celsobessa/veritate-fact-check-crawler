# Changelog
Theme Name:  Veritate - Fact Check Crawler
Description: A under the hood plugin for crawling fact checking website in Brazil and adding it to WordPress. Part of the Veritate Initiative.
Version:     0.2.0
Author:      Celso Bessa
Author URI:  https://www.celsobessa.com.br
License:     GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt

All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/)

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