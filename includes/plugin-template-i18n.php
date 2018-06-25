<?php
/*
 * Internationalization
 * @link
 * @since 1.0
 *
 * @package wordpress-plugin-template
 * @subpackage wordpress-plugin-template/includes
*/

class Plugin_Template_i18n {
	public function load_plugin_textdomain() {
		load_plugin_textdomain(
			'wordpress-plugin-template',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);
	}
}
