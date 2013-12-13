<?php
/*
Plugin Name: Admin Bar Color
Plugin URI: http://github.com/eduardozulian/admin-bar-color
Description: Use your favourite Dashboard color scheme on the front end admin bar.
Version: 1.0
Author: Eduardo Zulian
Author URI: http://flutuante.com.br
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: admin-bar-color
Domain Path: /languages
*/

function admin_bar_color () {

	if ( is_admin_bar_showing() ) {
		$user_color = get_user_option( 'admin_color' );

		if ( isset( $user_color ) ) {
			$suffix = is_rtl() ? '-rtl' : '';
	    	$suffix .= defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
			wp_enqueue_style( $user_color, admin_url( 'css/colors/' . $user_color . '/colors' . $suffix . ' .css' ) );
		}
	}
	
}
add_action( 'wp_enqueue_scripts', 'admin_bar_color' );
?>