<?php
if (!defined('ABSPATH')) {
    exit();
}
function expmsap_woocommerce_page(){
?>
<div class="wrap" >
		<div class="adm-page-content">
			<?php expmsap_help_links(); ?>
			<?php settings_errors(); ?>
			<h1 class="adm-page-title"><?php esc_html_e('Expand UP - Multiple Search Ajax Popup', 'expandup-search-ajax-popup-free'); ?><span class="plugin-version">Version: <?php echo esc_html(EXPMSAP_VERSION); ?></span></h1>
			<h3 class="adm-page-subtitle"><?php esc_html_e('Woocommerce Settings', 'expandup-search-ajax-popup-free'); ?></h3>
			<form id="opt-page" method="post" action="#" >
            <table class="styled-table">
				<tr>
					<td>
						<h3><?php esc_html_e('Activate "Add to cart"', 'expandup-search-ajax-popup-free'); ?></h3>
						<p>
							<label for="expmsap_add_to_cart_activate" class="label"><?php esc_html_e('Do you want to display the buy button on woocommerece product cards in the popup?', 'expandup-search-ajax-popup-free'); ?></label>
						</p>	
					</td>
					<td><span style="color: #ff0000;">(Pro Version)</span>
						<select id="expmsap_add_to_cart_activate">
							<option value="0"><?php esc_html_e('No', 'expandup-search-ajax-popup-free'); ?></option>
							<option value="1"><?php esc_html_e('Yes', 'expandup-search-ajax-popup-free'); ?></option>							
						</select>
					</td>
				</tr>	
				<tr>
					<td>
						<h3><?php esc_html_e('Template to Add to Cart"', 'expandup-search-ajax-popup-free'); ?></h3>
						<p>
							<label for="expmsap_add_to_cart_modelo" class="label"><?php esc_html_e('Choose a template to display the add to cart button', 'expandup-search-ajax-popup-free'); ?></label>
						</p>
					</td>
					<td><span style="color: #ff0000;">(Pro Version)</span>
						<select id="expmsap_add_to_cart_modelo">
							<option value="0"><?php esc_html_e('Standard button', 'expandup-search-ajax-popup-free'); ?></option>							
						</select>
						<p><?php esc_html_e('We will soon have other options', 'expandup-search-ajax-popup-free'); ?></p>
					</td>
				</tr>				
				<tr>
					<td>
						<h3><?php esc_html_e('Action for Add to Cart"', 'expandup-search-ajax-popup-free'); ?></h3>
						<p>
							<label for="expmsap_add_to_cart_action" class="label"><?php esc_html_e('What should happen if the product is successfully added to the cart?', 'expandup-search-ajax-popup-free'); ?></label>
						</p>
					</td>
					<td><span style="color: #ff0000;">(Pro Version)</span>
						<select id="expmsap_add_to_cart_action">
							<option value="0"><?php esc_html_e('Add to cart via ajax and keep the popup open', 'expandup-search-ajax-popup-free'); ?></option>
							<option value="1"><?php esc_html_e('Add to cart via ajax and close the popup', 'expandup-search-ajax-popup-free'); ?></option>
							<option value="2"><?php esc_html_e('Add to cart via ajax and close the popup and reload page', 'expandup-search-ajax-popup-free'); ?></option>														
							<option value="3"><?php esc_html_e('Redirect to cart page', 'expandup-search-ajax-popup-free'); ?></option>							
							<option value="4"><?php esc_html_e('Redirect to checkout page', 'expandup-search-ajax-popup-free'); ?></option>							
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php esc_html_e('Text for the add to cart button', 'expandup-search-ajax-popup-free'); ?></h3>
						<p>
							<label for="expmsap_add_to_cart_text" class="label"><?php esc_html_e('Enter the text for the add to cart button, if left blank the default text "Add to cart" will be shownn', 'expandup-search-ajax-popup-free'); ?></label>
						</p>
					</td>
					<td><span style="color: #ff0000;">(Pro Version)</span>
						<input id="expmsap_add_to_cart_text" type="text" class="input-text-100" value="" readonly>
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php esc_html_e('Action for view cart link"', 'expandup-search-ajax-popup-free'); ?></h3>
						<p>
							<label for="expmsap_view_cart_action" class="label"><?php esc_html_e('Where do you want to redirect to when clicking the view cart link?', 'expandup-search-ajax-popup-free'); ?></label>
						</p>	
					</td>
					<td><span style="color: #ff0000;">(Pro Version)</span>
						<select id="expmsap_view_cart_action">
							<option value="0"><?php esc_html_e('Go to cart', 'expandup-search-ajax-popup-free'); ?></option>
							<option value="1"><?php esc_html_e('Go to checkout', 'expandup-search-ajax-popup-free'); ?></option>							
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php esc_html_e('Text for the view cart button', 'expandup-search-ajax-popup-free'); ?></h3>
						<p>
							<label for="expmsap_view_cart_text" class="label"><?php esc_html_e('Enter the text for the view cart button, if left blank the default text "View cart" will be shownn', 'expandup-search-ajax-popup-free'); ?></label>
						</p>	
					</td>
					<td><span style="color: #ff0000;">(Pro Version)</span>
						<input id="expmsap_view_cart_text" type="text" class="input-text-100" value="" readonly>
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php esc_html_e('Text to display after the product is successfully added to the cart', 'expandup-search-ajax-popup-free'); ?></h3>
						<p>
							<label for="expmsap_add_cart_success_text" class="label"><?php esc_html_e('Enter a text to display after the product is successfully added to the cart, if left blank the default text will be displayed "Product added to cart successfully"', 'expandup-search-ajax-popup-free'); ?></label>
						</p>	
					</td>
					<td><span style="color: #ff0000;">(Pro Version)</span>
						<input id="expmsap_add_cart_success_text" type="text" class="input-text-100" value="" readonly>
					</td>
				</tr>
				<tr>
					<td>
						<h3><?php esc_html_e('Colors Style', 'expandup-search-ajax-popup-free'); ?></h3>
						<p><?php esc_html_e('Choose colors to customize this button', 'expandup-search-ajax-popup-free'); ?></p>
					</td>
					<td>	
							<div class="control-colors">
								<p><?php esc_html_e('Activate custom colors?', 'expandup-search-ajax-popup-free'); ?><span style="color: #ff0000;">(Pro Version)</span></p>
								<input type="hidden" value="off" >
								<ul class="control-wrap">	        
									<li class="dimension-wrap">
										<p id="label-text-status"><?php esc_html_e('Disabled', 'expandup-search-ajax-popup-free'); ?></p>
									</li>
									<li class="dimension-wrap">
										<label class="switch">
										<input type="checkbox" value="on">
										<span class="slider round"></span>
										</label>	                
									</li>						 
									<li class="dimension-wrap">
										<p id="label-text-status"><?php esc_html_e('Activated', 'expandup-search-ajax-popup-free'); ?></p>
									</li>	
								</ul>
							</div>						
							<p><strong><?php esc_html_e('Normal', 'expandup-search-ajax-popup-free'); ?></strong></p>
							<p>
                                <label for="expmsap_add_to_cart_text_color"><?php esc_html_e('Button text color:', 'expandup-search-ajax-popup-free'); ?></label><br>
                                <input type="text" class="input-use-wp-color-picker" id="expmsap_add_to_cart_text_color" value="">
                            </p>
							<p>
                                <label for="expmsap_add_to_cart_background"><?php esc_html_e('Button background color:', 'expandup-search-ajax-popup-free'); ?></label><br>
                                <input type="text" class="input-use-wp-color-picker" id="expmsap_add_to_cart_background" value="">
                            </p>
							<p>
                                <label for="expmsap_add_to_cart_border"><?php esc_html_e('Button background color:', 'expandup-search-ajax-popup-free'); ?></label><br>
                                <input type="text" class="input-use-wp-color-picker" id="expmsap_add_to_cart_border" value="">
                            </p>
															
							<p><strong><?php esc_html_e('Hover', 'expandup-search-ajax-popup-free'); ?></strong></p>
							<p>
                                <label for="expmsap_add_to_cart_text_color_hover"><?php esc_html_e('Button text color:', 'expandup-search-ajax-popup-free'); ?></label><br>
                                <input type="text" class="input-use-wp-color-picker" id="expmsap_add_to_cart_text_color_hover" value="">
                            </p>
							<p>
                                <label for="expmsap_add_to_cart_background_hover"><?php esc_html_e('Button background color:', 'expandup-search-ajax-popup-free'); ?></label><br>
                                <input type="text" class="input-use-wp-color-picker" id="expmsap_add_to_cart_background_hover" value="">
                            </p>
							<p>
                                <label for="expmsap_add_to_cart_border_hover"><?php esc_html_e('Button background color:', 'expandup-search-ajax-popup-free'); ?></label><br>
                                <input type="text" class="input-use-wp-color-picker" id="expmsap_add_to_cart_border_hover" value="">
                            </p>
															
					</td>
				</tr>		
			</table>
				<div class="options-footer-settings">
				<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary big-size" value="Save Settings"></p>
				<p id="pro-vercion-only" style="display:none;color: red;font-size: 1.2em;"><?php esc_html_e('These options are only available in the pro version', 'expandup-search-ajax-popup-free'); ?></p>
				
				</div>
			</form>
			<?php expmsap_help_links(); ?>
		</div>	
</div>
<script>
    jQuery(document).ready(function($) {
        $('#opt-page').submit(function(event) {            
            event.preventDefault();
            $('#pro-vercion-only').show();
        });
    });
</script>
<?php 		
	} 
?>