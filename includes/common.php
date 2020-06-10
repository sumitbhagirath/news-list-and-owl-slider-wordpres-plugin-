<?php
if ( !defined( 'ABSPATH' ) ) {
	exit;	// Exit if accessed directly
}
if (!function_exists('nwowls_content_limit')) {
	function nwowls_content_limit( $post_id = null, $content = '', $word_length = '55', $more = '...' ) {
		$has_excerpt  = false;
		$word_length    = !empty($word_length) ? $word_length : '55';
		// If post id is passed
		if( !empty($post_id) ) {
			if (has_excerpt($post_id)) {
				$has_excerpt    = true;
				$content        = get_the_excerpt();
			} else {
				$content = !empty($content) ? $content : get_the_content();
			}
		}
		if( !empty($content) && (!$has_excerpt) ) {
			$content = strip_shortcodes( $content ); // Strip shortcodes
			$content = wp_trim_words( $content, $word_length, $more );
		}
		return $content;
	}
}

if (!function_exists('nwowls_list_pagination')) {
	function nwowls_list_pagination($args = array()){    
		$big = 999999999; // need an unlikely integer
		$paging = apply_filters('news_blog_paging_args', array(
			'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'    => '?paged=%#%',
			'current'   => max( 1, $args['paged'] ),
			'total'     => $args['total'],
			'prev_next' => true,
			'prev_text' => __('« Previous', 'nwowls-news'),
			'next_text' => __('Next »', 'nwowls-news'),
		));	
		echo paginate_links($paging);
	}
}
