<?php
/*
Plugin Name: WP FAQ Schema automation
Plugin URI: http://zeropixel.fr/
Description: Add FAQ schema on pages.
Version: 1.0
Author: Jean-François ELIO
Author URI: https://github.com/eliojf
License: GPLv2 or later
Text Domain: zeropixel
*/

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

if (!function_exists('add_action')) {
    echo "Nothing much";
    exit;
}

define('ZEROPIXEL_WP_FAQ_SCHEMA_AUTOMATION_PLUGIN_URL', __FILE__);

include('_inc/index.php');
include('_inc/admin/index.php');

add_action('init', 'zeropixel_wp_faq_schema_automation_init');
add_action('init', 'zeropixel_wp_faq_schema_automation_admin_init');