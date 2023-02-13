<?php
declare( strict_types=1 );

/**
 * Plugin Name:       IlexWp
 */

use IlexNg\WpIlex\Debug\DebugDumper;
use IlexNg\WpIlex\Menu\AddMenu;
use IlexNg\WpIlex\Menu\NewSettings;
use IlexNg\WpIlex\Menu\Settings;
use IlexNg\WpIlex\UserFieldOne;

add_action( 'plugin_loaded', function () {
	//DebugDumper::init();
} );


$addMenu = new AddMenu();
add_action( 'admin_menu', [ $addMenu, 'addMenu' ] );


$settingPage = new Settings();
$settingPage->init();

$newSettingPage = new NewSettings();
$newSettingPage->init();


$userField = new UserFieldOne();
$userField->init();

$term = new IlexNg\WpIlex\Taxonomies\Location();
$term->init();

