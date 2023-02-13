<?php
declare( strict_types=1 );

namespace IlexNg\WpIlex;

use IlexNg\WpIlex\DefineValue\Dir;

final class UserFieldOne {
	public function init(): void {
		$this->showHook();
		$this->saveHook();
	}

	private function showHook() {
		$callback = [ $this, 'profileField' ];
		add_action( 'show_user_profile', $callback );
		add_action( 'edit_user_profile', $callback );
	}

	private function saveHook(): void {
		$callback = [ $this, 'saveProfileField' ];
		add_action( 'personal_options_update', $callback);
		add_action( 'edit_user_profile_update', $callback );
	}

	public function saveProfileField($user_id):void{
		if( ! isset( $_POST[ '_wpnonce' ] ) || ! wp_verify_nonce( $_POST[ '_wpnonce' ], 'update-user_' . $user_id ) ) {
			return;
		}

		if( ! current_user_can( 'edit_user', $user_id ) ) {
			return;
		}

		update_user_meta( $user_id, 'city', sanitize_text_field( $_POST[ 'city' ] ) );
		update_user_meta( $user_id, 'drinks', sanitize_text_field( $_POST[ 'drinks' ] ) );
	}


	public function profileField(\WP_User $user ): void {
		dump( $user );
		$user->
		// let's get custom field values
		$city = get_user_meta( $user->ID, 'city', true );
		// what about making a default value?
		$drinks = ( $drinks = get_user_meta( $user->ID, 'drinks', true ) ) ? $drinks : 'wine';
		include Dir::VIEW . '/user/user-field.php';
	}
}
