<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       cfeveck.com
 * @since      1.0.0
 *
 * @package    Refined_Form
 * @subpackage Refined_Form/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Refined_Form
 * @subpackage Refined_Form/admin
 * @author     Christopher Feveck <christopher.feveck@gmail.com>
 */
class Refined_Form_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Refined_Form_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Refined_Form_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/refined-form-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Refined_Form_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Refined_Form_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/refined-form-admin.js', array('jquery'), $this->version, false);
	}
	//create refined-form admin menu method
	public function refined_form_menu()
	{
		add_menu_page("Refined Plugin", "Refined Plugin", "manage_options", "refined-form-plugin", array($this, "refined_form_plugin"), null, 2);
		add_submenu_page("refined-form-plugin", "Forms List", "Forms List", "manage_options", "refined-form-dashboard", array($this, "refined_form_dashboard"), 1);
		add_submenu_page("refined-form-plugin", "Create Form", "Create Form", "manage_options", "refined-form-create", array($this, "refined_form_create"), 2);
	}
	//Parent menu callback
	public function refined_form_plugin()
	{
		global $wpdb;
		$user_email = $wpdb->get_var("select user_email from wp_users where ID = 1");
		$user_data = $wpdb->get_row("select * from wp_users where ID = 1", ARRAY_A);
		echo "<pre>" . print_r($user_data) . "</pre>" . "<h3>Welcome to plugin menu</h3>" . "<div>" . $user_email . "</div>";
	}
	//Sub menu callback function 
	public function refined_form_dashboard()
	{
		echo "<h3>Welcome to plugin sub menu</h3>";
	}

	//Sub menu callback function 
	public function refined_form_create()
	{
		echo "<h3>Welcome to plugin create menu</h3>";
	}
}