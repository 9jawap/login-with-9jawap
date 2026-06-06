<?php
/**
 * WordPress Dashboard Option Mapping Submenu Screen Setup Module Control Panel Panel Layout Presentation
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class NJW_Admin_Settings {

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
		add_action( 'admin_init', array( $this, 'register_settings_fields' ) );
	}

	public function add_settings_page() {
		add_options_page(
			__( '9jawap Login Settings', 'login-with-9jawap' ),
			__( '9jawap Login', 'login-with-9jawap' ),
			'manage_options',
			'login-with-9jawap',
			array( $this, 'render_settings_html' )
		);
	}

	public function register_settings_fields() {
		// 🚀 FIXED: Wrapped the callback inside an explicit modern argument array structure to pass strict Plugin Check rules
		register_setting( 
			'njw_login_group', 
			'njw_login_settings', 
			array(
				'type'              => 'array',
				'sanitize_callback' => array( $this, 'sanitize_settings_payload' ),
				'default'           => array(),
			)
		);

		add_settings_section(
			'njw_main_section',
			__( 'OAuth 2.0 Credentials Key Configuration Setup Sizing Parameters', 'login-with-9jawap' ),
			null,
			'login-with-9jawap'
		);

		add_settings_field(
			'system_url',
			__( '9jawap Base Platform URL Target Host Link Segment Source Map', 'login-with-9jawap' ),
			array( $this, 'render_url_input' ),
			'login-with-9jawap',
			'njw_main_section'
		);

		add_settings_field(
			'app_id',
			__( 'App ID (Identity Signature Key)', 'login-with-9jawap' ),
			array( $this, 'render_appid_input' ),
			'login-with-9jawap',
			'njw_main_section'
		);

		add_settings_field(
			'app_secret',
			__( 'App Secret (Cryptographic Token Access Token Phrase Configuration)', 'login-with-9jawap' ),
			array( $this, 'render_secret_input' ),
			'login-with-9jawap',
			'njw_main_section'
		);
	}

	/**
	 * Clean and sanitize administrative option inputs explicitly
	 */
	public function sanitize_settings_payload( $input ) {
		$sanitized = array();
		
		if ( ! is_array( $input ) ) {
			return $sanitized;
		}

		if ( isset( $input['system_url'] ) ) {
			$sanitized['system_url'] = esc_url_raw( trim( $input['system_url'] ) );
		}
		if ( isset( $input['app_id'] ) ) {
			$sanitized['app_id'] = sanitize_text_field( trim( $input['app_id'] ) );
		}
		if ( isset( $input['app_secret'] ) ) {
			$sanitized['app_secret'] = sanitize_text_field( trim( $input['app_secret'] ) );
		}
		return $sanitized;
	}

	public function render_url_input() {
		$options = get_option( 'njw_login_settings' );
		$val     = isset( $options['system_url'] ) ? esc_url( $options['system_url'] ) : 'https://9jawap.net';
		echo '<input type="url" name="njw_login_settings[system_url]" value="' . esc_attr( $val ) . '" class="regular-text" placeholder="https://9jawap.net">';
	}

	public function render_appid_input() {
		$options = get_option( 'njw_login_settings' );
		$val     = isset( $options['app_id'] ) ? sanitize_text_field( $options['app_id'] ) : '';
		echo '<input type="text" name="njw_login_settings[app_id]" value="' . esc_attr( $val ) . '" class="regular-text">';
	}

	public function render_secret_input() {
		$options = get_option( 'njw_login_settings' );
		$val     = isset( $options['app_secret'] ) ? sanitize_text_field( $options['app_secret'] ) : '';
		echo '<input type="password" name="njw_login_settings[app_secret]" value="' . esc_attr( $val ) . '" class="regular-text">';
	}

	public function render_settings_html() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			
			<form action="options.php" method="POST" style="background: #ffffff; border: 1px solid #ccd0d4; padding: 20px 30px; border-radius: 8px; margin-top: 20px; max-width: 800px; box-shadow: 0 1px 3px rgba(0,0,0,0.04);">
				<?php
				settings_fields( 'njw_login_group' );
				do_settings_sections( 'login-with-9jawap' );
				submit_button();
				?>
			</form>

			<div class="njw-developer-guide-card" style="background: #f0f6f0; border-left: 4px solid #008000; padding: 20px; border-radius: 4px; margin-top: 25px; max-width: 800px; box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, sans-serif;">
				<h3 style="margin: 0 0 8px 0; color: #1e293b; font-size: 15px; font-weight: 700; display: flex; align-items: center; gap: 8px;">
					<span>⚙️</span> <?php esc_html_e( 'Need API credentials configuration parameters?', 'login-with-9jawap' ); ?>
				</h3>
				<p style="margin: 0 0 15px 0; color: #475569; font-size: 13px; line-height: 1.6;">
					<?php esc_html_e( 'In order to integrate social logins with your main application ecosystem endpoints safely, you must register this client instance mapping layer context rules inside your portal registry.', 'login-with-9jawap' ); ?>
				</p>
				<a href="https://9jawap.net/developers/apps" target="_blank" class="button button-secondary" style="border-color: #008000; color: #008000; font-weight: 600; padding: 0 14px; height: 34px; line-height: 32px; display: inline-flex; align-items: center; gap: 6px; text-decoration: none; border-radius: 6px; background: #ffffff; transition: all 0.2s;">
					<span>🚀</span> <?php esc_html_e( 'Click here to Create App ID & Secret', 'login-with-9jawap' ); ?>
				</a>
			</div>
		</div>

		<script>
			// Added interactive hover styling for the notice button to keep it feeling native
			document.addEventListener("DOMContentLoaded", function() {
				const linkBtn = document.querySelector(".njw-developer-guide-card .button-secondary");
				if (linkBtn) {
					linkBtn.addEventListener("mouseover", () => {
						linkBtn.style.background = "#008000";
						linkBtn.style.color = "#ffffff";
					});
					linkBtn.addEventListener("mouseout", () => {
						linkBtn.style.background = "#ffffff";
						linkBtn.style.color = "#008000";
					});
				}
			});
		</script>
		<?php
	}
}