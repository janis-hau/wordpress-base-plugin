<?php
// File Path: wordpress/wp-content/plugins/wp-base-plugin/mnm-base-plugin.php

/**
 * Main file for the MNM Base Plugin.
 * 
 * This file includes the plugin header information and sets up the basic structure 
 * and configuration of the plugin. It defines necessary constants, loads helper functions,
 * sets up admin pages, enqueues scripts and styles, and registers custom templates.
 *
 * Plugin Name: MNM Base Plugin
 * Plugin URI: https://my-new.me
 * Description: A foundational plugin to streamline WordPress development.
 * Version: 0.0.1
 * Author: my-new.me
 * Author URI: https://my-new.me
 * License: GPL-3.0+
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html.en
 * Text Domain: mnm-base-plugin
 * Domain Path: /languages
 * Plugin Namespace: mnm_base_plugin
 */


/******************************************************************************
 * Prevent direct script access.
 */
if (!defined('WPINC')) {
    die;
}


/******************************************************************************
 * GET PLUGIN HEADERS
 * 
 * Retrieves and stores data from the plugin headers for dynamic use within the plugin.
 * This data can be accessed throughout the plugin for various purposes like 
 * setting up text domains, version checks, and more.
 * 
 * Example usage:
 *   Access the plugin's name: $mnm_plugin_data['Name']
 *   Access the plugin's version: $mnm_plugin_data['Version']
 * 
 * Additional headers can be added as needed.
 */
$mnm_plugin_headers = array(
    'Name'        => 'Plugin Name',
    'PluginURI'   => 'Plugin URI',
    'Version'     => 'Version',
    'Description' => 'Description',
    'Author'      => 'Author',
    'AuthorURI'   => 'Author URI',
    'TextDomain'  => 'Text Domain',
    'DomainPath'  => 'Domain Path',
    'Network'     => 'Network',
    'namespace'   => 'Plugin Namespace',
    // Andere Header, die du benötigen könntest...
);

$mnm_plugin_data = get_file_data(__FILE__, $mnm_plugin_headers);


/******************************************************************************
 * NAMESPACES
 * 
 * Define dynamic namespace constants for use throughout the plugin.
 */
$mnm_namespace_function = strtolower($mnm_plugin_data['namespace']);
$mnm_namespace_constant = strtoupper($mnm_plugin_data['namespace']);


/******************************************************************************
 * Helper
 * 
 * Includes files that provide helper functions and utility features for the plugin.
 */

/**
 * DYNAMIC CONSTANTS
 * 
 * Example Usage:
 *   - Define dynamic constants: mnm_define_dynamic_constant('CONST_NAME', 'CONST_VAL');
 *   - Retrieve dynamic constants: mnm_get_dynamic_constant('CONST_NAME');
 */
require_once plugin_dir_path(__FILE__) . 'includes/helper/mnm-dynamic-constants.php';

/**
 * DEBUGGING HELPERS
 * 
 * Functions for debugging and development purposes.
 * Example Usage:
 *   - Print readable array/object: mnm_pre_r($arr);
 *   - Dump variable information: mnm_pre_v($arr);
 */
require_once mnm_get_dynamic_constant($mnm_namespace_constant . '_PATH') . 'includes/helper/mnm-pre.php';

/**
 * PARTIALS LOADER
 * 
 * Function for loading partial template files with optional data parameters.
 * Example Usage:
 *   - Load a partial file: mnm_load_plugin_partial('example', array('key' => 'value'));
 *   - $data variable is passed to the partial file.
 */
require_once mnm_get_dynamic_constant($mnm_namespace_constant . '_PATH') . 'includes/helper/mnm-load-partials.php';


/******************************************************************************
 * UTILITIES
 * 
 * Include utility functions that provide additional features for the plugin.
 */

/**
 * EXCERPT UTILITY
 * 
 * Function for generating a customizable excerpt.
 * Example Usage:
 *   - Get a customized excerpt: mnm_get_excerpt(20, true, '[more]')
 *     This will generate an excerpt of 20 words ending with '[more]'.
 */
require_once mnm_get_dynamic_constant($mnm_namespace_constant . '_PATH') . 'includes/utilities/mnm-excerpts.php';


/******************************************************************************
 * CONSTANTS
 * 
 * Define global constants used throughout the plugin for easier maintenance and access.
 */

/**
 * VERSION CONSTANT
 * 
 * Defines the version of the plugin using the version information from the plugin header.
 * Helps in managing plugin updates and compatibility checks.
 */
if (!defined($mnm_namespace_constant . '_VERSION')) {
    define($mnm_namespace_constant . '_VERSION', $mnm_plugin_data['Version']);
}

/**
 * PATH CONSTANT
 * 
 * Defines the absolute path to the plugin directory.
 * Useful for including files and referencing plugin assets.
 */
if (!defined($mnm_namespace_constant . '_PATH')) {
    mnm_define_dynamic_constant($mnm_namespace_constant . '_PATH', plugin_dir_path(__FILE__));
}

/**
 * URL CONSTANT
 * 
 * Defines the URL to the root of the plugin directory.
 * Useful for linking to assets like JavaScript, CSS, and image files.
 */
if (!defined($mnm_namespace_constant . '_URL')) {
    mnm_define_dynamic_constant($mnm_namespace_constant . '_URL', plugin_dir_url(__FILE__));
}


/******************************************************************************
 * DATABASES
 * 
 * Includes files for setting up and configuring the plugin's database tables.
 * Refer to 'includes/database/_config.php' for table definitions and settings.
 */
require_once mnm_get_dynamic_constant($mnm_namespace_constant . '_PATH') . 'includes/database/_config.php';
require_once mnm_get_dynamic_constant($mnm_namespace_constant . '_PATH') . 'includes/database/_register.php';


/******************************************************************************
 * Admin-Pages
 * 
 * Includes files responsible for creating and managing admin pages.
 * Configuration details are available in 'includes/pages/_config.php'.
 */
require_once mnm_get_dynamic_constant($mnm_namespace_constant . '_PATH') . 'includes/pages/_config.php';
require_once mnm_get_dynamic_constant($mnm_namespace_constant . '_PATH') . 'includes/pages/_register.php';
require_once mnm_get_dynamic_constant($mnm_namespace_constant . '_PATH') . 'includes/pages/page_main.php';
require_once mnm_get_dynamic_constant($mnm_namespace_constant . '_PATH') . 'includes/pages/page_settings.php';


/******************************************************************************
 * Plugins & Scripts
 * 
 * Includes files for registering and enqueuing scripts and styles.
 * Check 'includes/scripts_and_styles/_config-admin.php' and 
 * '_config-frontend.php' for scripts and styles configurations.
 */
require_once mnm_get_dynamic_constant($mnm_namespace_constant . '_PATH') . 'includes/scripts_and_styles/_config-admin.php';
require_once mnm_get_dynamic_constant($mnm_namespace_constant . '_PATH') . 'includes/scripts_and_styles/_config-frontend.php';
require_once mnm_get_dynamic_constant($mnm_namespace_constant . '_PATH') . 'includes/scripts_and_styles/_register.php';


/******************************************************************************
 * TEMPLATES
 * 
 * Includes files for managing custom templates.
 * Template configurations can be found in 'includes/template/_config.php'.
 */
require_once mnm_get_dynamic_constant($mnm_namespace_constant . '_PATH') . 'includes/template/_config.php';
require_once mnm_get_dynamic_constant($mnm_namespace_constant . '_PATH') . 'includes/template/_register.php';
