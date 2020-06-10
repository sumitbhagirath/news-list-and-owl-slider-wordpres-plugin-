<?php
if ( !defined( 'ABSPATH' ) ) {
	exit;	// Exit if accessed directly
}

if (!function_exists('nwowls_admin_init')) {
	if (is_admin()){ // admin actions
		add_action( 'admin_init', 'nwowls_admin_init' );
	}
	function nwowls_admin_init(){
		add_option( 'nwowls_news_limit',10);
		add_option( 'nwowls_news_auto_play','1');
		add_option( 'nwowls_news_nav','1');
		add_option( 'nwowls_news_pagination','1');
		add_option( 'nwowls_news_loop','1');
		add_option( 'nwowls_news_autoplay_time',1500);
		add_option( 'nwowls_news_hover_pause','1');
		add_option( 'nwowls_news_loop_length',10);
		add_option( 'nwowls_news_show_category','0');
		add_option( 'nwowls_news_show_date','1');
		add_option( 'nwowls_news_show_dots','1');
		add_option( 'nwowls_news_content_word_limit',150);
		add_option( 'nwowls_news_order','ASC');
		add_option( 'nwowls_news_read_more_text','Read More');
		add_option( 'nwowls_news_grid',1);
	}
}