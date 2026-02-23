<?php
/**
 * Plugin Name: World of Warcraft (WoW) Recruitment
 * Plugin URI: https://gordian-knot.eu
 * Description: Display your guild recruitment priorities for World of Warcraft classes and specs in a sidebar widget.
 * Version: 2.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Author: Athlios
 * Author URI: https://a-wd.eu
 * Text Domain: world-of-warcraft-wow-recruitment
 * License: GPL-3.0-or-later
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Group help and bug report URLs and icon paths for easier maintenance.
 */
define('WR_HELP_URL', 'https://github.com/Athliara/World-of-Warcraft-WoW-Recruitment');
define('WR_BUG_URL', 'https://github.com/Athliara/World-of-Warcraft-WoW-Recruitment/issues');

define('WR__FILE__', __FILE__);

define('WR_BUG_ICON_URL', plugins_url('images/ic_bug_report.svg', WR__FILE__));
define('WR_INFO_ICON_URL', plugins_url('images/ic_info_outline.svg', WR__FILE__));

/**
 * Add function to widgets_init that loads our widget.
 *
 * @since 1.0
 */
add_action('widgets_init', 'athlios_wow_recruit_load_widgets');

/**
 * install/uninstall hooks
 *
 * @since 1.2
 */
register_activation_hook(WR__FILE__, 'athlios_wow_recruit_widget_install');
register_deactivation_hook(WR__FILE__, 'athlios_wow_recruit_widget_deactivate');

include_once plugin_dir_path(__FILE__) . 'inc/hooks.php';
include_once plugin_dir_path(__FILE__) . 'inc/config.php';
include_once plugin_dir_path(__FILE__) . 'inc/widget.php';

if (is_admin()) {
    include_once plugin_dir_path(__FILE__) . 'inc/admin.php';
}