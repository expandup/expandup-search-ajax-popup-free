<?php
if (!defined('ABSPATH')) {
    exit();
}
function expmsap_content() {  
    $status= 'error';
    $msg = 'Error 404';
    $html = ''; 
    if ( isset( $_POST['expmsap_global_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['expmsap_global_nonce'] ) ), 'expmsap-global-nonce' ) ) {         
        $s = sanitize_text_field($_POST['s']);   
        $site_url = esc_url(site_url()); 
        $expmsap_popup_footer_activate = intval(get_option('expmsap_popup_footer_activate', false));

        if(!empty($s)){  
            $expandUpSearchPopup = new ExpandUpSearchPopup();              
            // Popup Header
            $html .= expmsap_html_popup_section_top($s, $site_url); 
            $slider_options = expmsap_cpt_msap_loop();

            foreach($slider_options as $key => $value) {     
                $html .= $expandUpSearchPopup->expmsap_cpt_website_html($value, $s);
            }
            // Popup Footer            
            if( $expmsap_popup_footer_activate === 1 ){
                $html .= expmsap_html_popup_footer();
            }
            $status= 'success';
            $msg = 'OK';
        }

    }
	
    $retornar['status'] = $status;
    $retornar['msg'] = $msg;
    $retornar['html'] = $html;
    
    header('Content-type: application/json');
    echo wp_json_encode($retornar);
    exit();
} 

add_action('wp_ajax_expmsap_content', 'expmsap_content'); // for logged in user
add_action('wp_ajax_nopriv_expmsap_content', 'expmsap_content'); // if user not logged in
