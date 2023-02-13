<?php
declare( strict_types=1 );

namespace IlexNg\WpIlex\Menu;

final class NewSettings {
	private const PLUGIN_PAGE = 'pluginPage';
	private const PLUGIN_PAGE_SECTION = 'a_pluginPage_section';
	private const OPTION_NAME = 'a_settings';

	public function init() {
		add_action( 'admin_menu', [ $this, 'settingMenu' ] );
		add_action( 'admin_init', [ $this, 'adminInit' ] );
	}

	public function settingMenu(): void {
		add_options_page(
			'WpIlex',
			'WpIlex',
			'manage_options',
			'wpilex',
			[$this,'a_options_page'],
        );
	}

	public function adminInit(): void {
		register_setting( self::PLUGIN_PAGE, self::OPTION_NAME );

		add_settings_section(
			self::PLUGIN_PAGE_SECTION,
			__( 'Your section description', 'vvv' ),
			[ $this, 'a_settings_section_callback' ],
			self::PLUGIN_PAGE,
		);

		add_settings_field(
			'a_text_field_0',
			__( 'Settings field description', 'vvv' ),
			[ $this, 'a_text_field_0_render' ],
			self::PLUGIN_PAGE,
			self::PLUGIN_PAGE_SECTION,
		);

		add_settings_field(
			'a_checkbox_field_1',
			__( 'Settings field description', 'vvv' ),
			[ $this, 'a_checkbox_field_1_render' ],
			self::PLUGIN_PAGE,
			self::PLUGIN_PAGE_SECTION,
		);

		add_settings_field(
			'a_radio_field_2',
			__( 'Settings field description', 'vvv' ),
			[ $this, 'a_radio_field_2_render' ],
			self::PLUGIN_PAGE,
			self::PLUGIN_PAGE_SECTION,
		);

		add_settings_field(
			'a_textarea_field_3',
			__( 'Settings field description', 'vvv' ),
			[ $this, 'a_textarea_field_3_render' ],
			self::PLUGIN_PAGE,
			self::PLUGIN_PAGE_SECTION
		);

		add_settings_field(
			'a_select_field_4',
			__( 'Settings field description', 'vvv' ),
			[ $this, 'a_select_field_4_render' ],
			self::PLUGIN_PAGE,
			self::PLUGIN_PAGE_SECTION
		);


	}


	public function a_text_field_0_render() {

		$options = get_option( self::OPTION_NAME );
		?>
        <input type='text' name='a_settings[a_text_field_0]' value='<?php echo $options['a_text_field_0'] ?? ''; ?>'>
		<?php

	}


	public function a_checkbox_field_1_render() {

		$options = get_option( self::OPTION_NAME );
		?>
        <input type='checkbox'
               name='a_settings[a_checkbox_field_1]' <?php checked( $options['a_checkbox_field_1'] ?? 0, 1 ); ?> value='1'>
		<?php

	}


	public function a_radio_field_2_render() {

		$options = get_option( self::OPTION_NAME );
		?>
        <input type='radio' name='a_settings[a_radio_field_2]' <?php checked( $options['a_radio_field_2'] ?? 1, 1 ); ?>
               value='1'>
		<?php

	}


	public function a_textarea_field_3_render() {

		$options = get_option( self::OPTION_NAME );
		?>
        <textarea cols='40' rows='5' name='a_settings[a_textarea_field_3]'><?php echo $options['a_textarea_field_3'] ?? 1; ?></textarea>
		<?php

	}


	public function a_select_field_4_render() {

		$options = get_option( self::OPTION_NAME );
		?>
        <select name='a_settings[a_select_field_4]'>
            <option value='1' <?php selected( $options['a_select_field_4'] ?? 1, 1 ); ?>>Option 1</option>
            <option value='2' <?php selected( $options['a_select_field_4'] ?? 1, 2 ); ?>>Option 2</option>
        </select>

		<?php

	}


	public function a_settings_section_callback() {

		echo __( 'This section description', 'vvv' );

	}


	public function a_options_page() {

		?>
        <form action='options.php' method='post'>

            <h2>WpIlex</h2>

			<?php
			settings_fields( self::PLUGIN_PAGE );
			do_settings_sections( self::PLUGIN_PAGE );
			submit_button();
			?>

        </form>
		<?php


	}
}
