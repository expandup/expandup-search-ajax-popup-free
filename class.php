<?php
if (!defined('ABSPATH')) {
    exit();
}
class ExpandUpSearchPopup{

	private $options;		
	
	public function __construct() { 
		add_action('init', 'expmsap_register_msap_cpt');
		add_action('admin_menu', array($this, 'expmsap_admin_menu'), 9999);
		if( EXPMSAP_ACTIVE === 1 ) {	
			add_action('wp_footer', array($this, 'expmsap_add_popup_html_to_footer'));
			add_action('wp_enqueue_scripts', array($this, 'expmsap_front_scripts'));	
		}
		add_action('admin_init', array($this, 'expmsap_register_settings'));
		$expmsap_popup_smart_images_settings = intval(get_option( 'expmsap_popup_smart_images_settings', false ));
		if($expmsap_popup_smart_images_settings === 1){
			add_image_size('expmsap_thumb', 360, 360, true);
		}
		add_action('admin_enqueue_scripts', array($this, 'expmsap_admin_scripts'));
	}	
	
	// Add Pages admin
    public function expmsap_admin_menu() {  
		add_submenu_page( 'edit.php?post_type=msap', __('Popup General', 'expandup-search-ajax-popup-free'), __('Popup General', 'expandup-search-ajax-popup-free'), 'manage_options', 'expmsap_popup_general', array( $this, 'expmsap_popup_general' ) );
		add_submenu_page( 'edit.php?post_type=msap', __('Popup Header', 'expandup-search-ajax-popup-free'), __('Popup Header', 'expandup-search-ajax-popup-free'), 'manage_options', 'expmsap_popup_header', array( $this, 'expmsap_popup_header' ) );
		add_submenu_page( 'edit.php?post_type=msap', __('Popup Footer', 'expandup-search-ajax-popup-free'), __('Popup Footer', 'expandup-search-ajax-popup-free'), 'manage_options', 'expmsap_popup_footer', array( $this, 'expmsap_popup_footer' ) );
		add_submenu_page( 'edit.php?post_type=msap', __('WooCommerce', 'expandup-search-ajax-popup-free'), __('WooCommerce', 'expandup-search-ajax-popup-free'), 'manage_options', 'expmsap_woocommerce', array( $this, 'expmsap_woocommerce' ) );		
		add_submenu_page( 'edit.php?post_type=msap', __('Shortcodes'), __('Shortcodes'), 'manage_options', 'expmsap_shortcode', array( $this, 'expmsap_shortcode' ) );		
    }

	public function expmsap_popup_general() {
		expmsap_popup_general_page(); 
	}
	public function expmsap_popup_header() {
		expmsap_popup_header_page(); 
	}
	
	public function expmsap_popup_footer() {
		expmsap_popup_footer_page(); 
	}

	public function expmsap_woocommerce() {
		expmsap_woocommerce_page(); 
	}

	public function expmsap_shortcode() {
		expmsap_shortcode_page();
	}

	// Register general settings
	public function expmsap_register_settings() {
		expmsap_settings();		
	}

	// Frontend styles and scripts
	public function expmsap_front_scripts() {
		$expmsap_add_to_cart_activate = intval(get_option('expmsap_add_to_cart_activate', false));	
		// code CSS
		wp_enqueue_style( 'expmsap-style', esc_url(EXPMSAP_URL).'assets/css/expmsap.css', array(), esc_html(EXPMSAP_VERSION) );
		wp_enqueue_style( 'expmsap-swiper-style', esc_url(EXPMSAP_URL).'assets/css/swiper-bundle.min.css', array(), esc_html(EXPMSAP_VERSION) );
		$custom_css = self::expmsap_inline_styles();	
		wp_add_inline_style('expmsap-style', $custom_css);			
		
		// code JS
		wp_enqueue_script('jquery');		
		wp_enqueue_script( 'expmsap-swiper', esc_url(EXPMSAP_URL).'assets/js/swiper-bundle.min.js', array(), esc_html(EXPMSAP_VERSION), true );	
		wp_enqueue_script( 'expmsap', esc_url(EXPMSAP_URL).'assets/js/expmsap.js', array(), esc_html(EXPMSAP_VERSION), true );			
		wp_localize_script( 'expmsap', 'expmsap_ajax', array(
			'ajax_url' => admin_url( 'admin-ajax.php' )
		) );
		$expmsap_where_to_use = get_option('expmsap_where_to_use');			
		if(!empty( $expmsap_where_to_use)) {			
			wp_localize_script('expmsap', 'searchPopupWhereToUse', explode(",",$expmsap_where_to_use));			
			wp_localize_script('expmsap', 'expmsap_nonce_vars', array('nonce' => wp_create_nonce('expmsap-global-nonce'),));
		}
		if($expmsap_add_to_cart_activate === 1) {			
			wp_localize_script('expmsap', 'expmsap_add_to_cart_vars', array('nonce' => wp_create_nonce('expmsap_add_to_cart_nonce'),));
		}		
	}

	// Frontend style inline 
	public function expmsap_inline_styles() {		
		$alpha = get_option('expmsap_popup_transparency', '0.9');
		$alpha = empty($alpha) ? '0.9' : $alpha;
		$custom_css = '';
		
		// Popup General						
		$expmsap_preloader_icon_color = get_option('expmsap_preloader_icon_color', false);
		$expmsap_popup_background = get_option('expmsap_popup_background', false);			
			
		$expmsap_popup_colors_style = get_option('expmsap_popup_colors_style', false);	
		if($expmsap_popup_colors_style === 'on') {
			$bg_color = expmsap_convertColorToRGBA($expmsap_popup_background, $alpha) ;
			$custom_css .= "			
			.sbl-circ-path { color: $expmsap_preloader_icon_color; }
			#expmsap-popup { background-color: $bg_color; }						
			";
		}

		return $custom_css;
	}
	
	public function expmsap_admin_scripts() {
		global $pagenow;
		global $typenow;
		$currentScreen = get_current_screen();
		$var = $currentScreen->id;
		$pages = array(			
			'msap_page_expmsap_popup_general',
			'msap_page_expmsap_popup_header',
			'msap_page_expmsap_popup_footer',
			'msap_page_expmsap_woocommerce',
			'msap_page_expmsap_popup_api_page'
	);
		if ( in_array( $var, $pages) || $typenow === 'msap') {
			wp_enqueue_style('wp-color-picker');
			wp_enqueue_style( 'expmsap-admin-style', esc_url(EXPMSAP_URL).'assets/css/expmsap-admin.css', array(), esc_html(EXPMSAP_VERSION) );
			wp_enqueue_script('jquery');        
        	wp_enqueue_script('wp-color-picker');
			wp_enqueue_script( 'expmsap-admin-script', esc_url(EXPMSAP_URL) . 'assets/js/expmsap-admin.js', array('jquery'), esc_html(EXPMSAP_VERSION), true );
		}						
	}
	
	public function expmsap_add_popup_html_to_footer() {		
		expmsap_html_footer();
	}	

	public function expmsap_cpt_website_html($args, $s) {
		// variables
		$not_found = intval($args['not_found']);		
		$layout_slider_hide_items = $args['layout_slider_hide_items'];
		$items = array(
			'thumbnail',
			'title',
			'resume',
			'price',
			'category',
			'date'
		);		
		$text_latest = false;		
		$c = '';

		$posts_results = expmsap_loop_cpt($s, $args['cpt'], $args['categories'], $args['qty']);		
		if (!empty($posts_results) && is_array($posts_results) && array_key_exists('itens', $posts_results) && array_key_exists('total', $posts_results)) {
			$posts = $posts_results['itens'];
			$total = $posts_results['total'];			
		} elseif(empty($posts_results) && $not_found === 1) {			
			$posts_itens = expmsap_loop_cpt_latest($args['cpt'], $args['categories'], $args['qty']);
			$posts = $posts_itens['itens'];
			$total = $posts_itens['total'];
			$text_latest = esc_html__("We didn't find anything in this search, but the items below may interest you.", 'expandup-search-ajax-popup-free');
		} else {
			$posts = false;
			$total = false;
		}	
		if (empty($posts) && $not_found === 0) {  			
			
				$c .= '<div class="swiper-slide">';
				$c .= '<div class="expmsap-card-item">';
				$c .= '<p class="s-error">'. esc_html__('Nothing found in this search', 'expandup-search-ajax-popup-free').'</p>';           
				$c .= '</div>';
				$c .= '</div>';
           
        } elseif(empty($posts) && $not_found === 2) {

				return false;

		} else {
            foreach ($posts as $post) {	
				
				$c .= expmsap_html_card_cpt($args, $post);							
                
            }
        }

		// ************ HTML ***********************

		$html = ''; 

		$html .= '<div id="row-section_'.$args['slider'].'" class="row row-section_'.$args['slider'].' rom-slider">';
		$html .= '<div class="expmsap-popup-content">';
				
		$html .= '<div class="expmsap-popup-content-cpt">';
		$hide_div = '';
		if( empty($args['title']) && empty($args['btn_link']) ) {
			$hide_div = 'style="display: none;"';
		}
		$html .= '<div class="expmsap-popup-content-header" '.$hide_div.'>';		
		if(!empty($args['title'])) {
			$html .= '<h3>'.$args['title'].'</h3>';
		}		
		if(!empty($args['btn_link'])) {
			$html .= '<a class="btn-more" href="'.$args['btn_link'].'">'.$args['btn_text'].'</a>';
		}		
		$html .= '</div>'; // end expmsap-popup-content-header
		$html .= '<div class="results">';
		if($text_latest) {
			$html .= '<p class="alert-latest">'.$text_latest.'</p>';
		}
		$html .= '<div class="swiper-container" data-id="'.$args['slider'].'">';
		$html .= '<div class="swiper-wrapper">'.$c.'</div>';
		if (!empty($posts && !in_array('pagination', $layout_slider_hide_items))) {
			$html .= '<div class="swiper-pagination"></div>';
		}        
		$html .= '</div>'; // end swiper-container
		$html .= '</div>'; // end results  
		$html .= '</div>'; // end expmsap-popup-content-cpt

		if (!empty($posts) && !in_array('navigation', $layout_slider_hide_items)) {	
			$html .= '<div class="swiper-button-prev swiper-button-prev-'.$args['slider'].'"></div><div class="swiper-button-next swiper-button-next-'.$args['slider'].'"></div>';			
		}	

		$html .= '</div>'; // end expmsap-popup-content
			
		if ($total > $args['qty'] && $args['btn_more'] === 1) {
			// Exiba o link "Veja todos os resultados" com a URL da página de expmsap
			$search_url = home_url("/?s=" . urlencode($s)).'&post_type='.$args['cpt']; // URL da página de expmsap com a palavra expmsapda
			$html .= '<div class="expmsap-popup-content-header" style="text-align: center;">';	
			
			if( !empty($args['btn_more_text']) ){ $btn_more_text = $args['btn_more_text']; } else { $btn_more_text = 'See all results'; }
			$html .= '<a href="' . esc_url($search_url) . '" class="btn-more-posts">'.$btn_more_text.'</a>';
			$html .= '</div>';
		}

		$html .= '</div>'; // row
		
		return $html;
	}	
}
new ExpandUpSearchPopup();

