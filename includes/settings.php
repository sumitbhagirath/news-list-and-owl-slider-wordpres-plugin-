<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if (!function_exists('nwowls_settings_menu')) {
	// Action to add menu
	add_action('admin_menu', 'nwowls_settings_menu');

	//Add submenu Settings under news menu in admin
	function nwowls_settings_menu(){
		add_submenu_page( 'edit.php?post_type='.NWOWLS_POST_TYPE, __('Slider Settings', 'nwowls-news'), __('Slider Settings', 'nwowls-news'), 'edit_posts', 'nwowls-settings', 'nwowls_settings' );	
	}
}

if (!function_exists('nwowls_register_settings')) {
	//action to register neews slider options
	add_action( 'admin_init', 'nwowls_register_settings' );
	//register neews slider options
	function nwowls_register_settings() { 
		register_setting( 'nwowls-settings-group', 'nwowls_news_limit');
		register_setting( 'nwowls-settings-group', 'nwowls_news_auto_play');
		register_setting( 'nwowls-settings-group', 'nwowls_news_nav');
		register_setting( 'nwowls-settings-group', 'nwowls_news_pagination');
		register_setting( 'nwowls-settings-group', 'nwowls_news_loop');
		register_setting( 'nwowls-settings-group', 'nwowls_news_autoplay_time');
		register_setting( 'nwowls-settings-group', 'nwowls_news_hover_pause');
		register_setting( 'nwowls-settings-group', 'nwowls_news_loop_length');
		register_setting( 'nwowls-settings-group', 'nwowls_news_show_category');
		register_setting( 'nwowls-settings-group', 'nwowls_news_show_date');
		register_setting( 'nwowls-settings-group', 'nwowls_news_content_word_limit');
		register_setting( 'nwowls-settings-group', 'nwowls_news_order');
		register_setting( 'nwowls-settings-group', 'nwowls_news_read_more_text');
		register_setting( 'nwowls-settings-group', 'nwowls_news_show_dots');
		register_setting( 'nwowls-settings-group', 'nwowls_news_grid');
	}
}

if (!function_exists('nwowls_settings')) {
	function nwowls_settings(){
	?>
		<div class="wrap">
			<div>
				<div class="post-box-container">
					<div id="poststuff">
						<div id="post-body" class="metabox-holder columns-2">
							<!--How it workd HTML -->
							<div id="post-body-content">
								<div class="metabox-holder">
									<div class="meta-box-sortables ui-sortable">
										<div class="postbox">								
											<h3 class="hndle">
												<span><?php _e( 'News Settings', 'nwowls-news' ); ?></span>
											</h3>								
											<div class="inside">
												<form method="post" action="options.php" style="clear: both" id="nwowls_settings_form">
													<?php settings_fields('nwowls-settings-group');?>
													<?php do_settings_sections('nwowls-settings-group');?>
												<table class="form-table">
													<tbody>
														<tr valign="top">
															<th>
																<h1><b>List Setting</b></h1>
															</th>
														</tr>
														<tr valign="top">
															<th scope="row">
																<label for="nwowls_news_limit">
																	<?php esc_html_e("Limit", 'nwowls-news'); ?>
																</label>
															</th>
															<td>
																<input type="number" name="nwowls_news_limit" id="nwowls_news_limit"
																value="<?php form_option('nwowls_news_limit'); ?>" />
															</td>
															<td>
																<span class="description"><?php esc_html_e("in list how many news want to show per page ", 'nwowls-news'); ?>
																</span>
															</td>
														</tr>
														<tr valign="top">
															<th>
																<h1><b>Slider Setting</b></h1>
															</th>
														</tr>
														<tr valign="top">
															<th scope="row">
																<label for="nwowls_news_auto_play">
																	<?php esc_html_e("Auto Play", 'nwowls-news'); ?>
																</label>
															</th>
															<td>
																<label> 
																	<input type="radio"
																		name="nwowls_news_auto_play" value="1" <?php  if(get_option('nwowls_news_auto_play') == 1) echo 'checked="checked"'; ?>/>
																		<?php esc_html_e("Yes", 'default'); ?>
																</label> 
																<label> 
																	<input type="radio"
																		name="nwowls_news_auto_play" value="0" <?php  if(get_option('nwowls_news_auto_play') == 0) echo 'checked="checked"'; ?>/>
																		<?php esc_html_e("No", 'default'); ?>
																</label>
															</td>
														</tr>
														<tr valign="top">
															<th scope="row">
																<label for="nwowls_news_nav">
																	<?php esc_html_e("Show Nav", 'nwowls-news'); ?>
																</label>
															</th>
															<td>
																<label> 
																	<input type="radio"
																		name="nwowls_news_nav" value="1" <?php  if(get_option('nwowls_news_nav') == 1) echo 'checked="checked"'; ?>/>
																		<?php esc_html_e("Yes", 'default'); ?>
																</label> 
																<label> 
																	<input type="radio"
																		name="nwowls_news_nav" value="0" <?php  if(get_option('nwowls_news_nav') == 0) echo 'checked="checked"'; ?>/>
																		<?php esc_html_e("No", 'default'); ?>
																</label>
															</td>
														</tr>
														<tr valign="top">
															<th scope="row">
																<label for="nwowls_news_loop">
																	<?php esc_html_e("Loop News", 'nwowls-news'); ?>
																</label>
															</th>
															<td>
																<label> 
																	<input type="radio"
																		name="nwowls_news_loop" value="1" <?php  if(get_option('nwowls_news_loop') == 1) echo 'checked="checked"'; ?>/>
																		<?php esc_html_e("Yes", 'default'); ?>
																</label> 
																<label> 
																	<input type="radio"
																		name="nwowls_news_loop" value="0" <?php  if(get_option('nwowls_news_loop') == 0) echo 'checked="checked"'; ?>/>
																		<?php esc_html_e("No", 'default'); ?>
																</label>
															</td>
														</tr>
														<tr valign="top">
															<th scope="row">
																<label for="nwowls_news_autoplay_time">
																	<?php esc_html_e("Auto Play Time", 'nwowls-news'); ?>
																</label>
															</th>
															<td>
																<input type="number" name="nwowls_news_autoplay_time" id="nwowls_news_autoplay_time"
																value="<?php form_option('nwowls_news_autoplay_time'); ?>" />
															</td>
														</tr>
														<tr valign="top">
															<th scope="row">
																<label for="nwowls_news_hover_pause">
																	<?php esc_html_e("On hover pause", 'nwowls-news'); ?>
																</label>
															</th>
															<td>
																<label> 
																	<input type="radio"
																		name="nwowls_news_hover_pause" value="1" <?php  if(get_option('nwowls_news_hover_pause') == 1) echo 'checked="checked"'; ?>/>
																		<?php esc_html_e("Yes", 'default'); ?>
																</label> 
																<label> 
																	<input type="radio"
																		name="nwowls_news_hover_pause" value="0" <?php  if(get_option('nwowls_news_hover_pause') == 0) echo 'checked="checked"'; ?>/>
																		<?php esc_html_e("No", 'default'); ?>
																</label>
															</td>
														</tr>
														<tr valign="top">
															<th scope="row">
																<label for="nwowls_news_loop_length">
																	<?php esc_html_e("Loop length", 'nwowls-news'); ?>
																</label>
															</th>
															<td>
																<input type="number" name="nwowls_news_loop_length" id="nwowls_news_loop_length"
																value="<?php form_option('nwowls_news_loop_length'); ?>" />
															</td>
														</tr>
														<tr valign="top">
															<th>
																<h1><b>Common Setting</b></h1>
															</th>
														</tr>
														<tr valign="top">
															<th scope="row">
																<label for="nwowls_news_grid">
																	<?php esc_html_e("Grid Item Number", 'nwowls-news'); ?>
																</label>
															</th>
															<td>
																<input type="number" name="nwowls_news_grid" id="nwowls_news_grid"
																value="<?php form_option('nwowls_news_grid'); ?>" />
															</td>
														</tr>
														<tr valign="top">
															<th scope="row">
																<label for="nwowls_news_show_category">
																	<?php esc_html_e("Show Catgeory", 'nwowls-news'); ?>
																</label>
															</th>
															<td>
																<label> 
																	<input type="radio"
																		name="nwowls_news_show_category" value="1" <?php  if(get_option('nwowls_news_show_category') == 1) echo 'checked="checked"'; ?>/>
																		<?php esc_html_e("Yes", 'default'); ?>
																</label> 
																<label> 
																	<input type="radio"
																		name="nwowls_news_show_category" value="0" <?php  if(get_option('nwowls_news_show_category') == 0) echo 'checked="checked"'; ?>/>
																		<?php esc_html_e("No", 'default'); ?>
																</label>
															</td>
														</tr>
														<tr valign="top">
															<th scope="row">
																<label for="nwowls_news_show_date">
																	<?php esc_html_e("Show Date", 'nwowls-news'); ?>
																</label>
															</th>
															<td>
																<label> 
																	<input type="radio"
																		name="nwowls_news_show_date" value="1" <?php  if(get_option('nwowls_news_show_date') == 1) echo 'checked="checked"'; ?>/>
																		<?php esc_html_e("Yes", 'default'); ?>
																</label> 
																<label> 
																	<input type="radio"
																		name="nwowls_news_show_date" value="0" <?php  if(get_option('nwowls_news_show_date') == 0) echo 'checked="checked"'; ?>/>
																		<?php esc_html_e("No", 'default'); ?>
																</label>
															</td>
														</tr>
														<tr valign="top">
															<th scope="row">
																<label for="nwowls_news_content_word_limit">
																	<?php esc_html_e("Content Word Limit", 'nwowls-news'); ?>
																</label>
															</th>
															<td>
																<input type="number" name="nwowls_news_content_word_limit" id="nwowls_news_content_word_limit"
																value="<?php form_option('nwowls_news_content_word_limit'); ?>" />
															</td>
														</tr>
														<tr valign="top">
															<th scope="row">
																<label for="nwowls_news_order">
																	<?php esc_html_e("Order", 'nwowls-news'); ?>
																</label>
															</th>
															<td>
																<select name="nwowls_news_order" id="nwowls_news_order">
																	<option value="ASC" <?php  if(get_option('nwowls_news_order') == "ASC") echo 'selected="selected"'; ?>>ASC</option>
																	<option value="DESC" <?php  if(get_option('nwowls_news_order') == "DESC") echo 'selected="selected"'; ?>>DESC</option>
																</select>
															</td>
														</tr>
														<tr valign="top">
															<th scope="row">
																<label for="nwowls_news_read_more_text">
																	<?php esc_html_e("Read More Text", 'nwowls-news'); ?>
																</label>
															</th>
															<td>
																<input type="text" name="nwowls_news_read_more_text" id="nwowls_news_read_more_text"
																value="<?php form_option('nwowls_news_read_more_text'); ?>" />
															</td>
														</tr>	
														<tr valign="top">
															<th scope="row">
																<label for="nwowls_news_show_dots">
																	<?php esc_html_e("Show Dots After Content", 'nwowls-news'); ?>
																</label>
															</th>
															<td>
																<label> 
																	<input type="radio"
																		name="nwowls_news_show_dots" value="1" <?php  if(get_option('nwowls_news_show_dots') == 1) echo 'checked="checked"'; ?>/>
																		<?php esc_html_e("Yes", 'default'); ?>
																</label> 
																<label> 
																	<input type="radio"
																		name="nwowls_news_show_dots" value="0" <?php  if(get_option('nwowls_news_show_dots') == 0) echo 'checked="checked"'; ?>/>
																		<?php esc_html_e("No", 'default'); ?>
																</label>
															</td>
														</tr>										
													</tbody>
												</table>
												<p class="submit">
													<input type="submit" class="button-primary"
														value="<?php esc_html_e('Save Changes', 'nwowls-news') ?>" />
												</p>
												</form>
											</div><!-- .inside -->
										</div><!-- #general -->
									</div><!-- .meta-box-sortables ui-sortable -->
								</div><!-- .metabox-holder -->
							</div><!-- #post-body-content -->
						</div><!-- #post-body -->
					</div><!-- #poststuff -->
				</div><!-- #post-box-container -->
			</div>
		</div>
	<?php
	}
}?>