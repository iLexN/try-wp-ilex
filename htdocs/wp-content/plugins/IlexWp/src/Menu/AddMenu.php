<?php
declare( strict_types=1 );

namespace IlexNg\WpIlex\Menu;

use IlexNg\WpIlex\DefineValue\Dir;

final class AddMenu {

	public function addMenu(): void {
		$this->addParent();
		$this->addSubMenu();
	}

	private function addParent(): void {
		add_menu_page(
			'GoGopowerranger Settings Page',
			'GoGopowerranger Settings',
			'manage_options',
			'gogGopowerranger-options',
			[ $this, 'viewSettingPage' ],
			'dashicons-smiley',
			99
		);
	}

	private function addSubMenu(): void {
		add_submenu_page(
			'gogGopowerranger-options',
			'About ranger',
			'About',
			'manage_options',
			'ranger-about',
			[ $this, 'ranger_about_page' ]
		);
		add_submenu_page(
			'gogGopowerranger-options',
			'Help ranger',
			'Help',
			'manage_options',
			'ranger-help',
			[$this, 'ranger_help_page']
		);
	}


	public function viewSettingPage(): void {
		include Dir::VIEW . '/Setting.php';
	}

	public function ranger_help_page(): void {
		include Dir::VIEW . '/help.php';
	}

	public function ranger_about_page(): void {
		include Dir::VIEW . '/about.php';
	}
}
