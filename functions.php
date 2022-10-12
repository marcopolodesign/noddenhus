<?php
/**
 * Noddenhus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Noddenhus
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'noddenhus_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function noddenhus_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Noddenhus, use a find and replace
		 * to change 'noddenhus' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'noddenhus', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'noddenhus' ),
				'menu-2' => esc_html__( 'Mobile', 'noddenhus' ),

			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'noddenhus_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
		
		if( class_exists( 'WooCommerce' ) ){
			// Include custom plugin for side cart
			require get_template_directory() . '/inc/side-cart-woocommerce/wsc.php';
		}
	}
endif;
add_action( 'after_setup_theme', 'noddenhus_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function noddenhus_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'noddenhus_content_width', 640 );
}
add_action( 'after_setup_theme', 'noddenhus_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function noddenhus_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'noddenhus' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'noddenhus' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'noddenhus_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function noddenhus_scripts() {
	wp_enqueue_style( 'noddenhus-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'noddenhus-style', 'rtl', 'replace' );

	wp_enqueue_style('noddenhus-tachyons', get_template_directory_uri() . '/css/tachyons.css');

	wp_enqueue_style('noddenhus-marcopolo', get_template_directory_uri() . '/css/marcopolo.css');

	wp_enqueue_style('noddenhus-custom', get_template_directory_uri() . '/css/custom.css');




	// wp_enqueue_style('noddenhus-custom-woo', get_template_directory_uri() . '/css/woocommerce-custom.css');



	wp_enqueue_script( 'noddenhus-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}




	// wp_enqueue_script( 'noddenhus-barba', get_template_directory_uri() . '/js/barba.js',  array( 'jquery' ), '0.5.2' , true);

	// wp_enqueue_script( 'noddenhus-prefetch', get_template_directory_uri() . '/js/barba-prefetch.js',  array( 'jquery' ), '0.5.2' , true);

	wp_enqueue_script( 'noddenhus-gsap', get_template_directory_uri() . '/js/gsap.js',  array( 'jquery' ), '0.5.2' , true);

	wp_enqueue_script( 'noddenhus-gsap-text', get_template_directory_uri() . '/js/gsap-text.js',  array( 'jquery' ), '0.5.2' , true);


	if (is_checkout()) {
			wp_enqueue_script( 'autofill-checkout', get_template_directory_uri() . '/js/autofill-checkout.js',  array( 'jquery' ), '1.3');
	}


	wp_enqueue_script( 'noddenhus-main', get_template_directory_uri() . '/js/main.js',  array( 'jquery' ), '0.5.2' , true);

	
}
add_action( 'wp_enqueue_scripts', 'noddenhus_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// To change add to cart text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
function woocommerce_custom_single_add_to_cart_text() {
		return __( 'Agregar al Carrito', 'woocommerce' ); 
}

// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
function woocommerce_custom_product_add_to_cart_text() {
    return __( 'Comprar', 'woocommerce' );
}



remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating', 10);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_price', 10);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta', 40);

remove_action ('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs',10 );

function autofill_checkout_fields_by_postcode(){

	global $wpdb;
	$postcode = $_POST['postcode'];
    $results = $wpdb->get_results( "SELECT provincia, codigo, localidad FROM {$wpdb->prefix}localidades WHERE cp = " . $postcode );
    
    if ($results){
        // Asumiendo que un CP solo corresponde a una provincia. El primer valor ya es suficiente.
        $provincia = $results[0]->provincia;
        $codigo = $results[0]->codigo;
        $data = [];
        array_push($data,$provincia,$codigo);
        foreach ( $results as $row )
            {
               array_push($data,$row->localidad);
            }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }
    
    die();
}

add_action( 'wp_ajax_nopriv_autofill_checkout_fields_by_postcode', 'autofill_checkout_fields_by_postcode' );
add_action( 'wp_ajax_autofill_checkout_fields_by_postcode', 'autofill_checkout_fields_by_postcode' );



add_action( 'woocommerce_cart_calculate_fees', 'discount_based_on_user_role', 20, 1 );
function discount_based_on_user_role( $cart ) {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
        return; // Exit

    // Only for 'company' user role
    if ( ! current_user_can('administrator') )
        return; // Exit

    // HERE define the percentage discount
    $percentage = 100;

    $discount = $cart->get_subtotal() * $percentage / 100; // Calculation

    // Applying discount
    $cart->add_fee( sprintf( __("Discount (%s)", "woocommerce"), $percentage . '%'), -$discount, true );
}


add_action( 'woocommerce_thankyou', 'letsgo_auto_processing_orders');
function letsgo_auto_processing_orders( $order_id ) {
if ( ! $order_id )
return;
$order = wc_get_order( $order_id );
//ID’s de las pasarelas de pago a las que afecta
$paymentMethods = array( 'woo-mercado-pago-basic' );
if ( !in_array( $order->payment_method, $paymentMethods ) ) return;
// If order is “pending” update status to “processing”
if( $order->has_status( 'pending' ) ) {
$order->update_status( 'processing' );
} }

add_filter('woocommerce_update_order_review_fragments', 'order_fragments_split_shipping', 10, 1);
function order_fragments_split_shipping($order_fragments) {

	if (is_checkout){
		ob_start();
		woocommerce_order_review_shipping_split();
		$woocommerce_order_review_shipping_split = ob_get_clean();
		$order_fragments['.checkout-review-shipping-table'] =$woocommerce_order_review_shipping_split;
		return $order_fragments;
	}

}

function woocommerce_order_review_shipping_split( $deprecated = false ) {
	wc_get_template( 'checkout/shipping-review.php', array( 'checkout' => WC()->checkout() ) );
}

add_filter('gettext', 'woo_translations', 20, 3);
add_filter('ngettext', 'woo_translations', 20, 3);
function woo_translations( $translation, $text, $domain ) {
        
    $custom_text = array(
        'Ingresá tu dirección para ver las opciones de envío.' => '',
    );

    if( array_key_exists( $translation, $custom_text ) ) {
        $translation = $custom_text[$translation];
    }
    return $translation;
}

function implement_ajax_apply_coupon() {

    global $woocommerce;

    //$code = $_REQUEST['coupon_code'];
    $code = filter_input( INPUT_POST, 'coupon_code', FILTER_DEFAULT );

    if( empty( $code ) || !isset( $code ) ) {
        $response = array(
            'result'    => 'error',
            'message'   => 'Code text field can not be empty.'
        );

        header( 'Content-Type: application/json' );
        echo json_encode( $response );

        exit();
    }

    $coupon = new WC_Coupon( $code );

    if( ! $coupon->id && ! isset( $coupon->id ) ) {
        $response = array(
            'result'    => 'error',
            'message'   => 'Código invalido. Por favor reintente.'
        );

        header( 'Content-Type: application/json' );
        echo json_encode( $response );

        exit();

    } else {
          if ( ! empty( $code ) && ! WC()->cart->has_discount( $code ) ){
            WC()->cart->add_discount( $code );
            $response = array(
                'result'    => 'success',
                'message'   => 'Se agregó correctamente.'
            );

            header( 'Content-Type: application/json' );
            echo json_encode( $response );

            exit();
        }
    }
}

add_action('wp_ajax_ajaxapplycoupon', 'implement_ajax_apply_coupon');
add_action('wp_ajax_nopriv_ajaxapplycoupon', 'implement_ajax_apply_coupon');

add_filter( 'woocommerce_package_rates', 'rates_by_zone_weight', 10, 2 );
function rates_by_zone_weight($rates, $package)
{
	global $woocommerce;
	
	// REGIONES
	$regional = array('C', 'B', 'S', 'X');
	$nacional = array('K', 'H', 'W', 'E', 'P', 'Y', 'L', 'F', 'M', 'N', 'A', 'J', 'D', 'G', 'T', 'U', 'R', 'Z', 'V');

	// TOTALES CARRITO
	$total = WC()->cart->cart_contents_total;
	$peso_total = WC()->cart->get_cart_contents_weight();
	
	// COSTO CAJA
	if ($peso_total > 15){ // CAJA HASTA 20KG
		$costo_caja = 265; 
	} else if ($peso_total > 10){ // CAJA HASTA 15KG
 		$costo_caja = 215;
	} else if ($peso_total > 5){ // CAJA HASTA 10KG
		$costo_caja = 125;
	} else if ($peso_total > 2){ // CAJA HASTA 5KG
		$costo_caja = 75;
	} else if ($peso_total > 1){ // CAJA HASTA 2KG
		$costo_caja = 65;
	} else if ($peso_total > 0){ // CAJA HASTA 1KG
		$costo_caja = 55;
	}
	
	// TARIFAS REGIONAL
	if (in_array(WC()->customer->get_shipping_state(), $regional)) {
		if ($peso_total > 20 && $peso_total < 25){ // HASTA 25KG
			$tarifa = 1620; 
		} else if ($peso_total > 15){ // HASTA 20KG
			$tarifa = 1330;
		} else if ($peso_total > 10){ // HASTA 15KG
			$tarifa = 1110;
		} else if ($peso_total > 5){ // HASTA 10KG
			$tarifa = 910;
		} else if ($peso_total > 1){ // HASTA 5KG
			$tarifa = 730;
		} else if ($peso_total > 0){ // HASTA 1KG
			$tarifa = 600;
		}
	// TARIFAS NACIONAL
	} else if (in_array(WC()->customer->get_shipping_state(), $nacional)){
		if ($peso_total > 20 && $peso_total < 25){ // HASTA 25KG
			$tarifa = 2370; 
		} else if ($peso_total > 15){ // HASTA 20KG
			$tarifa = 1970;
		} else if ($peso_total > 10){ // HASTA 15KG
			$tarifa = 1680;
		} else if ($peso_total > 5){ // HASTA 10KG
			$tarifa = 1360;
		} else if ($peso_total > 1){ // HASTA 5KG
			$tarifa = 1020;
		} else if ($peso_total > 0){ // HASTA 1KG
			$tarifa = 830;
		}
	}
	
	foreach ($rates as $rate) {
		if ($rate->label == 'Envío a domicilio por Correo Argentino') {
			$rate->cost = $tarifa + $costo_caja;
		}
	}

	return $rates;
}

add_action( 'woocommerce_before_cart', 'bbloomer_print_cart_weight' );
function bbloomer_print_cart_weight() {
   $notice = 'Your cart weight is: ' . WC()->cart->get_cart_contents_weight() . get_option( 'woocommerce_weight_unit' );
   if ( is_cart() ) {
      wc_print_notice( $notice, 'notice' );
   } else {
      wc_add_notice( $notice, 'notice' );
   }
}
