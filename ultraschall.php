<?php
/*
Plugin Name: Ultraschall Theme-Integrator
Plugin URI: https://github.com/McCouman
Description: This plugin integrates the ultraschall theme functions for front-end
Version: 0.0.2
Author: Michael McCouman Jr.
Author URI: https://github.com/McCouman
License: Copyright (c) 2016 - wikibyte.org
*/

/**
 * Register: Custom Post_Types and functions.
 */
$r_cptFunctions = plugin_dir_path( __FILE__ ) . '/post-types';
require $r_cptFunctions . '/post_types.php';
require $r_cptFunctions . '/post_types-metabox.php';
require $r_cptFunctions . '/post_types-bulks.php';

/**
 * Register: Metaboxes page functions.
 */
$r_cmbFunctions = plugin_dir_path( __FILE__ ) . '/pages';
require $r_cmbFunctions . '/page-functions.php';
require $r_cmbFunctions . '/versions-functions.php';
require $r_cmbFunctions . '/features-functions.php';
require $r_cmbFunctions . '/changelogs-functions.php';

/**
 * Register: Shortcodes.
 */
$r_scFunctions = plugin_dir_path( __FILE__ ) . '/shortcodes';
require $r_scFunctions . '/us_version-download_button.php';  //[us_version] | [v_name] | [v_date]
require $r_scFunctions . '/us_rss-youtube_button.php';       //[yt_button] | [yt_channel]

/**
 * Register: Sidebar widget area.
 */
$r_Widgets = plugin_dir_path( __FILE__ ) . '/widgets';
require $r_Widgets . '/widgets.php';

/**
 * Func: User-Agent for Download Button
 */
$r_others = plugin_dir_path( __FILE__ ) . '/functions';
require $r_others . '/user-agent.php';

/**
 * Func: cookie translation
 */
require $r_others . '/cookie-translation.php';

