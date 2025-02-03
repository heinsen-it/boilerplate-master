<?php
/*
Plugin Name: Plugin Boilerplate
Plugin URI: https://heinsen-it.de/
Description: Vorlage für unsere Plugins
Author: Heinsen-IT
Version: 0.0.0.0
Letztes Update: 2025-02-01 20:00:00
Author URI: https://heinsen-it.de/
MINIMAL WP: 6.4.0
MINIMAL PHP: 8.2.0
Tested WP: 6.7.1
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$basename = 'boilerplate-master';

define( 'BOILERPLATE_VERSION', '0.0.0.0' );
define( 'BOILERPLATE_MIN_PHP',   '8.2.0' );
define( 'BOILERPLATE_MIN_WP',    '6.4.0' );
define( 'BOILERPLATE_TESTED_WP',    '6.7.1' );
define( 'BOILERPLATE_DIRPATH', plugin_dir_path( __FILE__ ) );
define( 'BOILERPLATE_BASEURL',plugin_dir_url(dirname(__FILE__)).$basename.'/');


if(file_exists(BOILERPLATE_DIRPATH.'config.php')) {
    require_once BOILERPLATE_DIRPATH.'config.php';
}
if(file_exists(BOILERPLATE_DIRPATH.'autoload.php')) {
    require_once BOILERPLATE_DIRPATH.'autoload.php';
}



/** OPTIONAL */
if(file_exists(BOILERPLATE_DIRPATH.'lib/plugin-update-checker/plugin-update-checker.php')) {
    require BOILERPLATE_DIRPATH . 'lib/plugin-update-checker/plugin-update-checker.php';
}


  use YahnisElsts\PluginUpdateChecker\v5p4\PucFactory;

    $plugin_updateurl = "https://meineupdates.heinsen-it.de/updates/" . $basename . "/";
if(class_exists('PucFactory')) {
// Update Service
    $MyUpdateChecker = PucFactory::buildUpdateChecker(
        $plugin_updateurl,
        __FILE__, //Full path to the main plugin file.
        $basename //Plugin slug. Usually it's the same as the name of the directory.
    );
}


/** OPTIONAL */



function BOILERPLATE_deactivate() {
// Alles was ausgeführt werden soll, sobald das Plugin deaktiviert wird.
}
register_deactivation_hook( __FILE__, 'BOILERPLATE_deactivate' );

function BOILERPLATE_activate() {
// Alles was ausgeführt werden soll, sobald das Plugin aktiviert wird.
}
register_activation_hook( __FILE__, 'BOILERPLATE_activate' );

function BOILERPLATE_uninstall() {
// Alles was ausgeführt werden soll, sobald das Plugin deinstalliert wird.
}
register_uninstall_hook( __FILE__, 'BOILERPLATE_uninstall' );


// Starten der Plugin Funktionen
if (class_exists('main')) {
    $plugin = new main();
    $plugin->init();
}