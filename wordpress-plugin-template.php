<?php
/*
Plugin Name: The name of the Plugin
Plugin Uri: https://github.com/alnever/wordpress-plugin-template
Description: This is a template of the WordPress Plugin
Version: 1.0
Author: Alex Neverov
Author URI: http://alneverov.ru
*/

namespace PluginTemplate;

//
class PluginStart {

  public function __construct() {
    // if the file is calles directly - abort
    if (!defined('WPINC')) {
      die;
    }

    register_activation_hook(__FILE__, array($this, 'activate_plugin'));
    register_deactivation_hook(__FILE__, array($this, 'deactivate_plugin'));
    register_uninstall_hook(__FILE__, array($this, 'uninstall_plugin'));
  }

  public function activate_plugin() {
    require_once plugin_dir_path(__FILE__) . "includes/plugin-template-activator.php";
    Plugin_Template_Activator::activate();
  }

  public function dectivate_plugin() {
    require_once plugin_dir_path(__FILE__) . "includes/plugin-template-deactivator.php";
    Plugin_Template_Deactivator::activate();
  }

  public function uninstall_plugin() {
    require_once plugin_dir_path(__FILE__) . "includes/plugin-template-uninstaller.php";
    Plugin_Template_Uninstaller::uninstall();
  }

  public function run() {
    require_once plugin_dir_path(__FILE__) . "includes/plugin-template.php";
    $plugin = new Plugin_Template();
    $plugin->run();
  }
}

(new PluginStart)->run();






?>
