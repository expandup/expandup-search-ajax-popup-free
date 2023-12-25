<?php
if (!defined('ABSPATH')) {
    exit();
}
function expandup_searchpopup_popup_footer_page(){
	ob_start();
?>
<div class="wrap" >
		<div class="adm-page-content">
			<?php echo expandup_searchpopup_help_links(); ?>
			<?php settings_errors(); ?>
			<?php
				$searchpopup_popup_footer_activate = get_option('searchpopup_popup_footer_activate', false);
				$searchpopup_popup_footer_menu01 = get_option('searchpopup_popup_footer_menu01', false);
				$searchpopup_popup_footer_menu02 = get_option('searchpopup_popup_footer_menu02', false);
				$searchpopup_popup_footer_menu03 = get_option('searchpopup_popup_footer_menu03', false);
				$searchpopup_popup_footer_title = get_option('searchpopup_popup_footer_title', false);
				$searchpopup_popup_footer_background = false;
				$searchpopup_popup_footer_text_color = false;
				$searchpopup_popup_footer_colors_style = false;
				$searchpopup_popup_footer_menu01_title = get_option('searchpopup_popup_footer_menu01_title', false);
				$searchpopup_popup_footer_menu02_title = get_option('searchpopup_popup_footer_menu02_title', false);
				$searchpopup_popup_footer_menu03_title = get_option('searchpopup_popup_footer_menu03_title', false);
			?>
			<h1 class="adm-page-title"><?php _e('Expand UP - Multiple Search Ajax Popup', 'searchpopup_textdomain'); ?><span class="plugin-version">Version: <?php echo EXPANDUP_SEARCHPOPUP_VERSION; ?></span></h1>
			<h3 class="adm-page-subtitle"><?php _e('Popup Footer', 'searchpopup_textdomain'); ?></h3>
			<form id="opt-page" method="post" action="options.php" >
            <table class="styled-table">
				<tr>
					<td>
						<h3><?php _e('Activate this section', 'searchpopup_textdomain'); ?></h3>
						<p><label for="searchpopup_popup_footer_activate" class="label"><?php _e('Do you want to activate this section?', 'searchpopup_textdomain'); ?></label></p>
					</td>
					<td>
						<select name="searchpopup_popup_footer_activate" id="searchpopup_popup_footer_activate">
							<option value="0" <?php selected( $searchpopup_popup_footer_activate, 0 ); ?>><?php _e('No', 'searchpopup_textdomain'); ?></option>
							<option value="1" <?php selected( $searchpopup_popup_footer_activate, 1 ); ?>><?php _e('Yes', 'searchpopup_textdomain'); ?></option>							
						</select>
					</td>
				</tr>	
				<tr>
					<td>
						<h3><?php _e('Menu 01', 'searchpopup_textdomain'); ?></h3>
						<p><label for="searchpopup_popup_footer_menu01" class="label"><?php _e('Choose a menu to be displayed in this position. You must create a menu in Appearances / Menus', 'searchpopup_textdomain'); ?></label></p>
					</td>
					<td>
					<p>
						<label for="searchpopup_popup_footer_menu01_title" class="label"><?php _e('Enter a title for this section. If left blank, nothing will be shown', 'searchpopup_textdomain'); ?></label>
						<br><input id="searchpopup_popup_footer_menu01_title" name="searchpopup_popup_footer_menu01_title" type="text" class="input-text" value="<?php echo $searchpopup_popup_footer_menu01_title; ?>" >
					</p>
						<?php 
							$menus = wp_get_nav_menus();
							if (!empty($menus)) {
								echo '<select name="searchpopup_popup_footer_menu01">';
								echo '<option value="">'. __('Choose a menu', 'searchpopup_textdomain') .'</option>';
								foreach ($menus as $menu) {
									$val = esc_attr($menu->term_id);
									$name = esc_html($menu->name);
									$check = selected( $searchpopup_popup_footer_menu01, $val );
									echo '<option value="' . $val . '" '.$check.' >' . $name . '</option>';
								}
								echo '</select>';								
							} else {
								_e('No menu found.', 'searchpopup_textdomain');
							}
						?>
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php _e('Menu 02', 'searchpopup_textdomain'); ?></h3>
						<p><label for="searchpopup_popup_footer_menu02" class="label"><?php _e('Choose a menu to be displayed in this position. You must create a menu in Appearances / Menus', 'searchpopup_textdomain'); ?></label></p>
					</td>
					<td>
						<p>
							<label for="searchpopup_popup_footer_menu02_title" class="label"><?php _e('Enter a title for this section. If left blank, nothing will be shown', 'searchpopup_textdomain'); ?></label>
							<br><input id="searchpopup_popup_footer_menu02_title" name="searchpopup_popup_footer_menu02_title" type="text" class="input-text" value="<?php echo $searchpopup_popup_footer_menu02_title; ?>" >
						</p>
						<?php 
							$menus = wp_get_nav_menus();
							if (!empty($menus)) {
								echo '<select name="searchpopup_popup_footer_menu02">';
								echo '<option value="">'. __('Choose a menu', 'searchpopup_textdomain') .'</option>';
								foreach ($menus as $menu) {
									$val = esc_attr($menu->term_id);
									$name = esc_html($menu->name);
									$check = selected( $searchpopup_popup_footer_menu02, $val );
									echo '<option value="' . $val . '" '.$check.' >' . $name . '</option>';
								}
								echo '</select>';								
							} else {
								_e('No menu found.', 'searchpopup_textdomain');
							}
						?>
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php _e('Menu 03', 'searchpopup_textdomain'); ?></h3>
						<p><label for="searchpopup_popup_footer_menu03" class="label"><?php _e('Choose a menu to be displayed in this position. You must create a menu in Appearances / Menus', 'searchpopup_textdomain'); ?></label></p>
					</td>
					<td>
						<p>
							<label for="searchpopup_popup_footer_menu03_title" class="label"><?php _e('Enter a title for this section. If left blank, nothing will be shown', 'searchpopup_textdomain'); ?></label>
							<br><input id="searchpopup_popup_footer_menu03_title" name="searchpopup_popup_footer_menu03_title" type="text" class="input-text" value="<?php echo $searchpopup_popup_footer_menu03_title; ?>" >
						</p>
						<?php 
							$menus = wp_get_nav_menus();
							if (!empty($menus)) {
								echo '<select name="searchpopup_popup_footer_menu03">';
								echo '<option value="">'. __('Choose a menu', 'searchpopup_textdomain') .'</option>';
								foreach ($menus as $menu) {
									$val = esc_attr($menu->term_id);
									$name = esc_html($menu->name);
									$check = selected( $searchpopup_popup_footer_menu03, $val );
									echo '<option value="' . $val . '" '.$check.' >' . $name . '</option>';
								}
								echo '</select>';								
							} else {
								_e('No menu found.', 'searchpopup_textdomain');
							}
						?>
					</td>
				</tr>	
				<tr>
					<td>
						<h3><?php _e('Section title', 'searchpopup_textdomain'); ?></h3>
						<p><label for="searchpopup_popup_footer_title" class="label"><?php _e('Enter a title for this section. If left blank, nothing will be shown', 'searchpopup_textdomain'); ?></label></p>
					</td>
					<td>
						<input id="searchpopup_popup_footer_title" name="searchpopup_popup_footer_title" type="text" class="input-text-100" value="<?php echo $searchpopup_popup_footer_title; ?>" >
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php _e('Section Colors Style', 'searchpopup_textdomain'); ?></h3>
						<p><?php _e('Choose colors to customize this section', 'searchpopup_textdomain'); ?></p>
					</td>
					<td>	
							<div class="control-colors">
								<p><?php _e('Activate custom colors?', 'searchpopup_textdomain'); ?> <span style="color: #ff0000;">(Pro Version)</span></p>
								<input type="hidden" value="off" name="searchpopup_popup_footer_colors_style">
								<ul class="control-wrap">	        
									<li class="dimension-wrap">
										<p id="label-text-status"><?php _e('Disabled', 'searchpopup_textdomain'); ?></p>
									</li>
									<li class="dimension-wrap">
										<label class="switch">
										<input type="checkbox" name="searchpopup_popup_footer_colors_style" value="on"  <?php if ($searchpopup_popup_footer_colors_style === 'on'){echo 'checked="checked"';}?>>
										<span class="slider round"></span>
										</label>	                
									</li>						 
									<li class="dimension-wrap">
										<p id="label-text-status"><?php _e('Activated', 'searchpopup_textdomain'); ?></p>
									</li>	
								</ul>
							</div>						
							<p>
                                <label for="searchpopup_popup_footer_background"><?php _e('Section background color:', 'searchpopup_textdomain'); ?></label> <span style="color: #ff0000;">(Pro Version)</span><br>
                                <input type="text" class="input-use-wp-color-picker" id="searchpopup_popup_footer_background" name="searchpopup_popup_footer_background" value="<?php echo $searchpopup_popup_footer_background; ?>">
                            </p>
							<p>
                                <label for="searchpopup_popup_footer_text_color"><?php _e('Section text color:', 'searchpopup_textdomain'); ?></label> <span style="color: #ff0000;">(Pro Version)</span><br>
                                <input type="text" class="input-use-wp-color-picker" id="searchpopup_popup_footer_text_color" name="searchpopup_popup_footer_text_color" value="<?php echo $searchpopup_popup_footer_text_color; ?>">
                            </p>								
					</td>
				</tr>		
			</table>	
			<?php // The fields are sanitized in the expandup_searchpopup_register_settings function within the class ?>				
				<?php settings_fields('expandup_searchpopup_opt_popup_footer'); ?>
				<?php do_settings_sections('expandup_searchpopup_opt_popup_footer'); ?>				
				<div class="options-footer-settings">
				<?php 
					$label = __('Save Settings', 'searchpopup_textdomain');
					$class = 'button-primary big-size';
					submit_button($label, $class); 
				?>
				</div>
			</form>
			<?php echo expandup_searchpopup_help_links(); ?>
		</div>	
</div>
<?php 
		$object = ob_get_contents();
		/* Clean buffer */
		ob_end_clean();
		/* Return the content */
		return $object;
	} 
?>