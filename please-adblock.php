<?php
/*
Plugin Name: please adblock
Plugin URI: https://git.antagonismo.org/guido/please-adblock
Description: If reader is not using an adblocker, it suggest the use of one.
Author: guido
Author URI: https://dis.tur.bio
version: 0.1
*/


function init_js_please_adblock() {
	wp_enqueue_script( 'fuck-adblock-js', plugins_url( '/js/fuckadblock.js', __FILE__ ), array('jquery'));
	wp_enqueue_script( 'please-adblock-js', plugins_url( '/js/pleaseadblock.js', __FILE__ ));
}

class please_adblock extends WP_Widget {

	function please_adblock() {
		parent::WP_Widget(false, $name = __('Please Adblock', 'wp_widget_plugin') );
	}

	function widget($args, $instance) {
		extract( $args );

		$title = apply_filters('widget_title', __('It looks that you are not using an Adblocker'));

		$text = __('For privacy and security reasons (and a nicer and lighter navigation) it is recommended to use and Adblocker, like <a href="https://github.com/gorhill/uBlock#installation">uBlock Origin</a>.');

		echo $before_widget;
		echo '<div class="widget-text wp_widget_plugin_box security_first">';

		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		if( $text ) {
			echo '<p class="wp_widget_plugin_text">'.$text.'</p>';
		}

		echo '</div>';
		echo $after_widget;
	}
}

add_action('wp_enqueue_scripts','init_js_please_adblock');
add_action('widgets_init', create_function('', 'return register_widget("please_adblock");'));

?>