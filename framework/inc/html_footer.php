<?php
if (!defined('ABSPATH')) {
    exit();
}
function expmsap_html_footer() {
    $html = '';
    $version = esc_attr(EXPMSAP_VERSION);
    $expmsap_popup_click_on_close = get_option('expmsap_popup_click_on_close', false);
    $expmsap_click_out_popup = get_option('expmsap_click_out_popup', false); 
    ?>
    <div id="expmsap-popup" data-close="<?php echo esc_attr($expmsap_popup_click_on_close); ?>" data-out="<?php echo esc_attr($expmsap_click_out_popup); ?>" style="display: none;" data-v="<?php echo esc_attr($version); ?>">Search popup content</div>
    <?php   
}