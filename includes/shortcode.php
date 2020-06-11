<?php
if ( !defined( 'ABSPATH' ) ) {
	exit;	// Exit if accessed directly
}
// Shortcode function
if (!function_exists('nwowls_slider')) {
	function nwowls_slider( $atts, $content = null ){
		// setup the query
		extract(shortcode_atts(array(
			"limit"                 => get_option('nwowls_news_limit'),	
			"category"              => '',
			"grid"                  => get_option('nwowls_news_grid'),
			"show_date"             => get_option('nwowls_news_show_date'),
			"show_category_name"    => get_option('nwowls_news_show_category'),
			"show_content"          => 'true',
			"show_full_content"     => get_option('nwowls_news_show_full_content'),
			"title_words_limit"     => get_option('nwowls_news_title_word_limit'),
			"content_words_limit"   => get_option('nwowls_news_content_word_limit'),
			"order"					=> strtolower(get_option('nwowls_news_order')),
			"orderby"				=> 'date',
			"pagination_type"       => 'numeric',
			"type"					=> ''
		), $atts, 'nwowls-news'));
		// Define variables 
		$posts_per_page 	= !empty($limit)?$limit: 10;	
		$cat 				= (!empty($category))?explode(',', $category):'';	
		$gridcol 			= !empty($grid)?$grid:1;
		$showDate 			= ($show_date == '0')? 'false':'true';
		$showCategory 		= ($show_category_name == '0')?'false': 'true';	
		$showContent 		= ($show_content == 'false')?'false':'true';
		$showFullContent   	= ($show_full_content == '0')?'false':'true';	
		$title_words_limit 	= (!empty($title_words_limit))?$title_words_limit:15;
		$words_limit 		= (!empty($content_words_limit))?$content_words_limit:20;
		$pagination_type   	= ($pagination_type == 'numeric')?'numeric':'next-prev';	
		$order 				= (strtolower($order) == 'asc')? 'ASC':'DESC';
		$orderby 			= !empty($orderby)? $orderby:'date';
		ob_start();	
		global $paged;	
		if(is_home() || is_front_page()) {
			  $paged = get_query_var('page');
		} else {
			 $paged = get_query_var('paged');
		}
		$post_type 		= NWOWLS_POST_TYPE;
		$args = array ( 
			'post_type'      => $post_type,
			'post_status'    => array( 'publish' ),
			'orderby'        => $orderby,
			'order'          => $order,
			'posts_per_page' => $posts_per_page,
			'paged'          => $paged,
		);
		if($cat != "") {
			$args['tax_query'] = array(
				array(
					'taxonomy'  => NWOWLS_CAT,
					'field'     => 'term_id',
					'terms'     => $cat
				));
		}
		$query = new WP_Query($args);
		global $post;
		$post_count = $query->post_count;
		$count = 0;
		if(strtolower($type) == 'slider'){ echo '<div class="owl-carousel owl-theme">'; }
		else{echo '<div class="nwowlsfree-plugin news-clearfix">';}
		?>
			
				<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();		
					$count++;
					$terms 		= get_the_terms( $post->ID, NWOWLS_CAT );
					$news_links = array();
					if($terms) {
						foreach ( $terms as $term ) {
							$term_link = get_term_link( $term );
							$news_links[] = '<a href="' . esc_url( $term_link ) . '">'.$term->name.'</a>';
						}
					}		
					$cate_name = join( ", ", $news_links );
					$css_class="nwowls-news-post";
					if ( ( is_numeric( $grid ) && ( $grid > 0 ) && ( 0 == ($count - 1) % $grid ) ) || 1 == $count ) { $css_class .= ' nwowls-first'; }
					if ( ( is_numeric( $grid ) && ( $grid > 0 ) && ( 0 == $count % $grid ) ) || $post_count == $count ) { $css_class .= ' nwowls-last'; }
					if($showDate == 'true'){ $date_class = "has-date"; } else { $date_class = "has-no-date";} ?>
		        <?php if(strtolower($type) == 'slider'){ 
		        	echo '<div class="item">'; 
		        	$classextra = "";
		        }else{
		        	$classextra = "news-col-".$gridcol." ".$css_class." ".$date_class;
		        }?>
		          <div id="post-<?php the_ID(); ?>" class="news type-news <?php echo $classextra;?>">
						<div class="news-inner-wrap-view news-clearfix <?php  if ( !has_post_thumbnail()) { echo 'nwowls-news-no-image'; } ?>">	
							<?php  if ( has_post_thumbnail()) { ?>
							<div class="news-thumb">    			
							<?php if($gridcol == '1'){ ?>    					
										<div class="grid-news-thumb">  				    
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
										</div>
									<?php } else if($gridcol > '2') { ?>
									 	<div class="grid-news-thumb">				    
											<a href="<?php the_permalink(); ?>">	<?php the_post_thumbnail('medium_large'); ?></a>
										</div>
									<?php	} else { ?>        			    
										<div class="grid-news-thumb">        				
											<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium_large'); ?></a>
										</div>
									<?php }  ?>
							</div>	
							<?php }  ?>	
							<div class="news-content">    			
								<?php if($gridcol == '1') {                    
									if($showDate == 'true'){ ?>        				
										<div class="date-post">            			
											<h2><span><?php echo get_the_date('j'); ?></span></h2>
											<p><?php echo get_the_date('M y'); ?></p>
										</div>
									<?php }?>
								<?php } else {  ?>    				
									<div class="grid-date-post">        			
										<?php echo ($showDate == "true")? get_the_date() : "" ;?>                    
										<?php echo ($showDate == "true" && $showCategory == "true" && $cate_name != '') ? " / " : "";?>                    
										<?php echo ($showCategory == 'true' && $cate_name != '') ? $cate_name : ""?>
									</div>
								<?php  } ?>    			
								<div class="post-content-text">    
									<?php 
										$dots = get_option('nwowls_news_show_dots');
										$dotsContent = '...';
										if($dots == '0'){
											$dotsContent = '';
										}
										$title_excerpt = get_the_title();
										$title_a =  nwowls_content_limit( $post->ID, $title_excerpt, $title_words_limit, $dotsContent); 
									?>				
									<h3 class="news-title"><a href="<?php echo esc_url( get_permalink() );?>" rel="bookmark"><?php echo $title_a;?></a></h3>  			    
									<?php if($showCategory == 'true' && $gridcol == '1'){ ?>
										<div class="news-cat">                        
											<?php echo $cate_name; ?>
										</div>
									<?php }?>
									<?php if($showContent == 'true'){?>        			 
										<div class="news-content-excerpt">
											<?php  if($showFullContent == "false" ) {
												$excerpt = get_the_content(); ?>
												<div class="news-short-content">
													<?php 
														$dots = get_option('nwowls_news_show_dots');
														$dotsContent = '...';
														if($dots == '0'){
															$dotsContent = '';
														}
														echo nwowls_content_limit( $post->ID, $excerpt, $words_limit, $dotsContent); ?>
												</div>                				
												<a href="<?php the_permalink(); ?>" class="news-more-link"><?php _e( get_option('nwowls_news_read_more_text'), 'nwowls-news' ); ?></a>	
											<?php } else { 									
												the_content();
											} ?>
										</div><!-- .entry-content -->
									<?php }?>
								</div>
							</div>
						</div><!-- #post-## -->
				  </div><!-- #post-## -->
		        <?php if(strtolower($type) == 'slider'){ echo '</div>'; }?>
		        <?php  endwhile; endif; ?>
			</div>
			<?php if($type == "list"){
			?>
				<div class="news_pagination">        
					<?php if($pagination_type == 'numeric'){ 
						echo nwowls_list_pagination( array( 'paged' => $paged , 'total' => $query->max_num_pages ) );
					} else { ?>
						<div class="button-news-p"><?php next_posts_link( __('Next', 'nwowls-news').' &raquo;', $query->max_num_pages ); ?></div>    		
						<div class="button-news-n"><?php previous_posts_link( '&laquo; '.__('Previous', 'nwowls-news') ); ?></div>
					<?php } ?>
				</div>
			<?php }elseif($type == "slider"){?>
				<script>
					$(document).ready(function() {
					  var owl = $('.owl-carousel');
					  owl.owlCarousel({
					    margin: 10,
					    nav: <?php if(get_option('nwowls_news_nav') == '1'){ echo 'true';}else{echo 'false';}?>,
					    loop: <?php if(get_option('nwowls_news_loop') == '1'){ echo 'true';}else{echo 'false';}?>,
					    autoplay:<?php if(get_option('nwowls_news_auto_play') == '1'){ echo 'true';}else{echo 'false';}?>,
					    autoplayTimeout: <?php echo get_option('nwowls_news_autoplay_time');?>,
					    autoplayHoverPause:<?php if(get_option('nwowls_news_hover_pause') == '1'){ echo 'true';}else{echo 'false';}?>,
					    autoHeight:true,
					    //autoWidth:true,
					    responsive: {
					      	0:{
							    items:1
							},
							600:{
							    items:2
							},            
							960:{
							    items:<?php echo $gridcol;?>
							},
							1200:{
							    items:<?php echo $gridcol;?>
							}
					    }
					  })
					})
				</script>
		<?php
		}		
		wp_reset_postdata();				
		return ob_get_clean();
	}
	add_shortcode('news_slider','nwowls_slider');
}
?>