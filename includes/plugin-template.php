<?php
/*
 * Defines plugin's core
 * @link
 * @since 1.0
 *
 * @package wordpress-plugin-template
 * @subpackage wordpress-plugin-template/includes
*/

class Plugin_Template {

  // For maintaining and registering all hooks
  protected $loader;

  // Plugin unique identifier
  protected $plugin_name;

  // Plugin version
  protected $version;

  // Constructor
  public function __construct() {
      $this->plugin_name = 'wordpress-plugin-template'; // Should be replaced
      $this->Version     = '1.0';

      $this->load_dependencies();
      $this->set_locale();
      $this->define_admin_hooks();
      $this->define_public_hooks();
  }

  // Load necessary files/dependensies and create plugin Loader
  private function load_dependensies() {
    require_once plugin_dir_path(dirname(__FILE__)) . 'includes/plugin-template-loader.php';
    require_once plugin_dir_path(dirname(__FILE__)) . 'includes/plugin-template-i18n.php';
    require_once plugin_dir_path(dirname(__FILE__)) . 'admin/plugin-template-admin.php';
    require_once plugin_dir_path(dirname(__FILE__)) . 'public/plugin-template-public.php';

    $this->loader = new Plugin_Template_Loader();
  }

  // Define default locale of the plugin
  private function set_locale() {
    $plugin_i18n = new Plugin_Template_i18n();
    $this->loaded->add_action('plugin_loaded', $plugin_i18n, 'load_plugin_textdomain');
  }

  // Define handler of the hooks, which are first on the admin page
  private function define_admin_hooks() {
    $plugin_admin = new Plugin_Template_Admin();
    $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
    $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');
  }

  // Define handler of the hooks, which are first on the front page
  private function define_public_hooks() {
    $plugin_public = new Plugin_Template_Public();
    $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
    $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');
  }

  public function run() {
    $this->loader->run();
  }

  public function get_loader() {
    return $this->loader;
  }

  public function get_plugin_name() {
    return $this->plugin_name;
  }

  public function get_version() {
    return $this->version;
  }
}

?>
