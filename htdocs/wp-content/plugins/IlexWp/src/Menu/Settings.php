<?php
declare( strict_types=1 );

namespace IlexNg\WpIlex\Menu;

final class Settings {

	private const PLUGIN_PAGE = 'pluginPage4';
	private const PLUGIN_PAGE_SECTION = 'section4';
	private const OPTION_NAME = 'section4';

	public function init() {
		add_action( 'admin_menu', [ $this, 'settingMenu' ] );
		add_action( 'admin_init', [ $this, 'adminInit' ] );
	}

	public function settingMenu() {
		// mean under setting
		add_options_page(
			'section 2 title',
			'section 2 menu title',
			'manage_options',
			'section2-slug-a',
			[ $this, 'optionPage' ]
		);
	}

	public function adminInit() {
		$args = array(
			'type'              => 'array',
			'sanitize_callback' => [ $this, 'validateOptions' ],
			'default'           => [
				'name'         => 'default name',
				'company_name' => 'default company name',
			]
		);

		register_setting( self::PLUGIN_PAGE, self::OPTION_NAME, $args );

		//add a settings section
		add_settings_section(
			self::PLUGIN_PAGE_SECTION,
			__( 'Your section description', 'vvv' ),
			[ $this, 'sectionText' ],
			self::PLUGIN_PAGE,
		);

		//create our settings field for name
		add_settings_field(
			'name',
			'Your Name',
			[ $this, 'settingName' ],
			self::PLUGIN_PAGE,
			self::PLUGIN_PAGE_SECTION,
		);

		add_settings_field(
			'company_name',
			'Your Company name',
			[ $this, 'settingCompanyName' ],
			self::PLUGIN_PAGE,
			self::PLUGIN_PAGE_SECTION,
		);
	}

	public function optionPage(): void {
		?>
        <div class="wrap">
            <h2>plugin</h2>
            <form action="options.php" method="post">
				<?php
				settings_fields( self::PLUGIN_PAGE );
				do_settings_sections( self::PLUGIN_PAGE );
				submit_button();
				?>
            </form>
        </div>
		<?php
	}

	public function sectionText(): void {
		echo '<p>來往這裡來阿斯</p>';
	}

	public function settingCompanyName(): void {
		$options     = get_option( self::OPTION_NAME );
		$companyName = $options['company_name'];
		echo "<input id='company_name' name='" . self::OPTION_NAME . "[company_name]'
        type='text' value='" . esc_attr( $companyName ) . "' />";
	}

// 印出所有的field
	public function settingName(): void {

		// 從資料庫取回gogopowerranger_plugin_options
		$options = get_option( self::OPTION_NAME );
		$name    = $options['name'];

		// 把這個資料當預設值印出來
		echo "<input id='name' name='" . self::OPTION_NAME . "[name]'
        type='text' value='" . esc_attr( $name ) . "' />";

	}

// 在這裡驗證輸入的資料是否正確，你可能需要學過一點正規表達式，不過意思是只能有英文
	public function validateOptions( $input ): array {

		$valid         = array();
		$valid['name'] = preg_replace(
			'/[^a-zA-Z\s]/',
			'',
			$input['name'] );
        $valid['company_name'] = $input['company_name'];
		return $valid;

	}
}
