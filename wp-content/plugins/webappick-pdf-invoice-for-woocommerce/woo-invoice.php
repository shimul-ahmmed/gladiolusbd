<?php
/**
 * Automatic Generate PDF Invoice and attach  with order email for WooCommerce.
 *
 * @package  Woo_Invoice
 * Plugin Name:  Challan - PDF Invoice & Packing Slip for WooCommerce
 * Plugin URI:   https://webappick.com
 * Description:  Automatic Generate PDF Invoice and attach  with order email for WooCommerce.
 * Version:      3.3.1
 * Author:       WebAppick
 * Author URI:   https://webappick.com
 * License:      GPL2
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:  webappick-pdf-invoice-for-woocommerce
 * Domain Path:  /languages
 * WP Requirement & Test
 * Requires at least: 4.4
 * Tested up to: 5.8
 * Requires PHP: 5.6
 * WC requires at least: 3.2
 * WC tested up to: 5.5.2
 **/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */

define( 'WOO_INVOICE_FREE_VERSION', '3.3.1' );

if ( ! defined( 'WOO_INVOICE_FREE_FILE' ) ) {
	/**
	 * Plugin Base File
	 *
	 * @since 1.2.2
	 * @var string
	 */
	define( 'WOO_INVOICE_FREE_FILE', __FILE__ );
}

if ( ! defined( 'WOO_INVOICE_FONTS_COUNT' ) ) {
	/**
	 * Count mPDF Fonts
	 *
	 * @var string dirname( __FILE__ )
	 */
	define( 'WOO_INVOICE_FONTS_COUNT', '40' );
}

if ( ! defined( 'WOO_INVOICE_DIR' ) ) {
    /**
     * Custom Font Directory..
     *
     * @var string.
     * @since 2.3.1
     */
    $upload_dir        = wp_upload_dir();
    $base_dir          = $upload_dir['basedir'];
    $wpifw_invoice_dir = $base_dir."/WOO-INVOICE";
    define( 'WOO_INVOICE_DIR', $wpifw_invoice_dir . '/' );
    if ( ! file_exists( $wpifw_invoice_dir ) && is_writable( $base_dir ) ) {
        mkdir( $wpifw_invoice_dir, 0777, true );
        // Protect files from public access.
        touch( WOO_INVOICE_DIR . '.htaccess' );
        $content = 'deny from all';
        $fp      = fopen( WOO_INVOICE_DIR . '.htaccess', 'wb' );
        fwrite( $fp, $content );
        fclose( $fp );
    }elseif ( ! file_exists( $wpifw_invoice_dir ) && ! is_writable($wpifw_invoice_dir) && ! is_writable( $base_dir ) ) {
        add_action('admin_notices', 'woo_invoice_font_dir_notice');
    }
}

if ( ! defined( 'WOO_INVOICE_FONT_DIR' ) ) {
	/**
	 * Custom Font Directory..
	 *
	 * @var string
	 * @since 2.3.1
	 */
	$upload_dir             = wp_upload_dir();
	$base_dir               = $upload_dir['basedir'];
	$wpifw_invoice_font_dir = $base_dir."/WOO-INVOICE/WOO-INVOICE-FONTS";
	define( 'WOO_INVOICE_FONT_DIR', $wpifw_invoice_font_dir . '/' );

	if ( ! file_exists( $wpifw_invoice_font_dir ) && is_writable( $base_dir ) ) {
		mkdir( $wpifw_invoice_font_dir, 0777, true );

		// Protect files from public access.
		touch( WOO_INVOICE_FONT_DIR . '.htaccess' );
		$content = 'deny from all';
		$fp      = fopen( WOO_INVOICE_FONT_DIR . '.htaccess', 'wb' );
		fwrite( $fp, $content );
		fclose( $fp );
	}
}

if ( ! defined( 'WOO_INVOICE_FREE_PATH' ) ) {
	/**
	 * Plugin Path with trailing slash
	 *
	 * @define  "WOO_INVOICE_FREE_PATH" "./"
	 * @var string dirname( __FILE__ )
	 */
	define( 'WOO_INVOICE_FREE_PATH', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'WOO_INVOICE_FREE_ADMIN_PATH' ) ) {
	/**
	 * Admin File Path with trailing slash
	 *
	 * @var string
	 */
	define( 'WOO_INVOICE_FREE_ADMIN_PATH', WOO_INVOICE_FREE_PATH . 'admin/' );
}
if ( ! defined( 'WOO_INVOICE_FREE_LIBS_PATH' ) ) {
	/**
	 * Admin File Path with trailing slash
	 *
	 * @var string
	 */
	define( 'WOO_INVOICE_FREE_LIBS_PATH', WOO_INVOICE_FREE_PATH . 'libs/' );
}
if ( ! defined( 'WOO_INVOICE_FREE_PLUGIN_URL' ) ) {
	/**
	 * Plugin Directory URL
	 *
	 * @var string
	 * @since 1.2.2
	 */
	define( 'WOO_INVOICE_FREE_PLUGIN_URL', trailingslashit( plugin_dir_url( __FILE__ ) ) );
}
if ( ! defined( 'WOO_INVOICE_FREE_PLUGIN_BASE_NAME' ) ) {
	/**
	 * Plugin Base name..
	 *
	 * @var string
	 * @since 1.2.2
	 */
	define( 'WOO_INVOICE_FREE_PLUGIN_BASE_NAME', plugin_basename( __FILE__ ) );
}


/**
 * Webappick Service API
 */
require WOO_INVOICE_FREE_PATH . 'includes/class-woo-invoice-webappick-api.php';
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-woo-invoice-activator.php
 */
function woo_invoice_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woo-invoice-activator.php';
	Woo_Invoice_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-woo-invoice-deactivator.php
 */
function woo_invoice_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woo-invoice-deactivator.php';
	Woo_Invoice_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'woo_invoice_activate' );
register_deactivation_hook( __FILE__, 'woo_invoice_deactivate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-woo-invoice.php';

/**
 * Challan notifications.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-notifications.php';



/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function woo_invoice_run() {
	$plugin = new Woo_Invoice();
	$plugin->run();
	Woo_Invoice_WebAppickAPI::get_instance();
}

woo_invoice_run();

// Pages.
if ( ! function_exists( 'woo_invoice_pro_vs_free' ) ) {
	/**
	 * Difference between free and premium plugin
	 */
	function woo_invoice_pro_vs_free() {
		require WOO_INVOICE_FREE_ADMIN_PATH . 'partials/woo-invoice-pro-vs-free.php';
	}
}

/**
 * Load plugin docs from WEBAPPICK API.
 */
function woo_invoice_docs(){

    // Enter the name of your blog here followed by /wp-json/wp/v2/posts and add filters like this one that limits the result to 2 posts.
    $response = wp_remote_get( 'https://webappick.com/wp-json/wp/v2/docs/?parent=3960&_fields=parent,title,link,id' );

    // Exit if error.
    if ( is_wp_error( $response ) ) {
        return;
    }
    // Get the body.
    $posts = json_decode( wp_remote_retrieve_body( $response ) );
    // Exit if nothing is returned.
    if ( empty( $posts ) ) {
        return;
    }
    if ( ! empty( $posts ) ) {
        $new_posts = [ $posts[3], $posts[2], $posts[4], $posts[1], $posts[0] ];
        ?>
        <div class="_winvoice_docs">
            <?php foreach ( $new_posts as $post ) {
                $boxId = ( isset( $post->title->rendered ) ) ? sanitize_title( $post->title->rendered ) : '';
                $current_screen = get_current_screen();
                ?>
                <div id="<?php echo esc_attr( $boxId ); ?>" class="postbox <?php echo esc_attr( postbox_classes( $boxId, $current_screen->id ) ); ?>">
                    <button type="button" class="handlediv" aria-expanded="true">
                        <span class="screen-reader-text">
                            <?php printf( esc_html__( 'Toggle panel: %s', 'webappick-pdf-invoice-for-woocommerce' ), esc_html( $post->title->rendered ) ); ?>
                        </span>
                        <span class="toggle-indicator" aria-hidden="true"></span>
                    </button>
                    <h2 class="hndle">
                        <span class="dashicons dashicons-sos" aria-hidden="true"></span>
                        <span><?php echo esc_html( $post->title->rendered ); ?></span>
                    </h2>
                    <div class="inside">
                        <div class="main">
                            <?php
                            $response1 = wp_remote_get( 'https://webappick.com/wp-json/wp/v2/docs/?per_page=60&parent='.$post->id.'&_fields=parent,title,link,id,doc_tag' );
                            $posts1 = json_decode( wp_remote_retrieve_body( $response1 ) );
                            ?>
                            <ul>
                                <?php
                                // For each post.
                                foreach ( $posts1 as $post ) {
                                    ?>
                                    <li style="padding-bottom: 20px;">
                                        <span class="dashicons dashicons-media-text" aria-hidden="true"></span>
                                        <a href="<?php echo esc_url( $post->link ); ?>" style="font-size: 14px;line-height: 20px" target="_blank">
                                            <?php
                                            // Add "Pro" tag if feature is only for pro plugin.
                                            if ( in_array("4128", $post->doc_tag ) ) {
                                                // Remove "- Woo Invoice".
                                                $hiphen = substr($post->title->rendered, -13, -12);
                                                if ( '-' === $hiphen ) {
                                                    $title = substr($post->title->rendered, 0, -13);
                                                }else {
                                                    $title = substr($post->title->rendered, 0, -19);
                                                }
                                                $title = esc_html($title);
                                                echo esc_html( $title ) . '- <strong>Pro</strong>';
                                            }else {
                                                // Remove "- Woo Invoice".
                                                $hiphen = substr($post->title->rendered, -13, -12);
                                                if ( '-' === $hiphen ) {
                                                    $title = substr($post->title->rendered, 0, -13);
                                                }else {
                                                    $title = substr($post->title->rendered, 0, -19);
                                                }
                                                echo esc_html($title);
                                            }?></a>                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div><!-- end ._winvoice_docs-->
        <?php
    }
}

/**
 *  Load Plugin settings page, process and save setting
 */
function woo_invoice_settings() {
	$invoice_allow  = 'wpifw_invoicing';
	$email_allow    = 'wpifw_order_email';
	$download_allow = 'wpifw_download';
	$currency_allow = 'wpifw_currency_code';
	$payment_method = 'wpifw_payment_method_show';
	$order_note     = 'wpifw_show_order_note';

	// Process settings tab form data and update.
	if ( isset( $_POST['wpifw_submit'] ) ) {

		$retrieved_nonce = isset( $_REQUEST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ) : '';
		if ( ! wp_verify_nonce( $retrieved_nonce, 'invoice_form_nonce' ) ) {
			die( 'Failed security check' );
		}
		// If checkbox is not checked then put empty value.
		if ( ! isset( $_POST[ $invoice_allow ] ) ||
			 ! isset( $_POST[ $email_allow ] ) ||
			 ! isset( $_POST[ $download_allow ] ) ||
			 ! isset( $_POST[ $currency_allow ] ) ||
			 ! isset( $_POST[ $payment_method ] )
			 || ! isset( $_POST[ $order_note ] ) ) {
			update_option( $invoice_allow, sanitize_textarea_field( '' ) );
			update_option( $email_allow, sanitize_textarea_field( '' ) );
			update_option( $download_allow, sanitize_textarea_field( '' ) );
			update_option( $currency_allow, sanitize_text_field( '' ) );
			update_option( $payment_method, sanitize_text_field( '' ) );
			update_option( $order_note, sanitize_text_field( '' ) );
		}


        // Allow to download invoice from my account base on order status.
        if ( isset( $_POST['wpifw_download'] ) && isset( $_POST['wpifw_invoice_download_check_list'] ) ) {
            $download_check_list = array();
            foreach ( $_POST['wpifw_invoice_download_check_list'] as $key => $value ) { //phpcs:ignore
                $download_check_list[ sanitize_text_field( $key ) ] = sanitize_text_field( $value );
            }
            update_option( 'wpifw_invoice_download_check_list', $download_check_list );
        } else {
            update_option( 'wpifw_invoice_download_check_list', array() );
        }
        // Attach Invoice with email based on order status.
        if ( isset( $_POST['wpifw_order_email'] ) && isset( $_POST['wpifw_email_attach_check_list'] ) ) {
            $email_check_list = array();
            foreach ( $_POST['wpifw_email_attach_check_list'] as $key => $value ) { //phpcs:ignore
                $email_check_list[ sanitize_text_field( $key ) ] = sanitize_text_field( $value );
            }
            update_option( 'wpifw_email_attach_check_list', $email_check_list );
        } else {
            update_option( 'wpifw_email_attach_check_list', array() );
        }

        foreach ( $_POST as $key => $value ) {
            if ( 'wpifw_invoice_download_check_list' !== $key && 'wpifw_email_attach_check_list' !== $key ) {
                update_option( $key, sanitize_text_field( $value ) );
            }
        }
	}

	// Process Seller & Buyer tab form data & update.
	if ( isset( $_POST['wpifw_submit_seller&buyer'] ) ) {
		$retrieved_nonce = sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) );
		if ( ! wp_verify_nonce( $retrieved_nonce, 'seller_form_nonce' ) ) {
			die( 'Failed security check' );
		}
		foreach ( $_POST as $key => $value ) {
			if ( 'wpifw_terms_and_condition' === $key || 'wpifw_other_information' === $key ) {
				update_option( $key, sanitize_textarea_field( wp_unslash( $value ) ) );
			} elseif ( 'wpifw_buyer' === $key || 'wpifw_cdetails' === $key ) {
				update_option( $key, sanitize_textarea_field( wp_unslash( $value ) ) );
			} elseif ( 'wpifw_buyer_shipping_address' === $key ) {
				update_option( $key, sanitize_textarea_field( wp_unslash( $value ) ) );
			} elseif ( 'wpifw_logo_attachment_id' === $key ) {
				$full_size_path = get_attached_file( $value );
				update_option( $key, $full_size_path );
				update_option( 'wpifw_logo_attachment_image_id', $value );
			} else {
				update_option( $key, sanitize_text_field( wp_unslash( $value ) ) );
			}
		}
	}

	// Process Localization tab form date and update.
	if ( isset( $_POST['wpifw_submit_localization'] ) ) {
		$retrieved_nonce = sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) );
		if ( ! wp_verify_nonce( $retrieved_nonce, 'localization_form_nonce' ) ) {
			die( 'Failed security check' );
		}
		foreach ( $_POST as $key => $value ) {
			update_option( $key, sanitize_text_field( wp_unslash( $value ) ) );
		}
	}

	// Process Batch Download Form data and update.
	if ( isset( $_POST['wpifw_submit_bulk_download'] ) ) {
		$retrieved_nonce = sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) );
		if ( ! wp_verify_nonce( $retrieved_nonce, 'bulk_download_form_nonce' ) ) {
			die( 'Failed security check' );
		}

		if ( isset( $_POST['wpifw_date_from'], $_POST['wpifw_date_to'] ) ) {
			$date_from = sanitize_text_field( wp_unslash( $_POST['wpifw_date_from'] ) );
			$date_to   = sanitize_text_field( wp_unslash( $_POST['wpifw_date_to'] ) );

			$args = array(
				'date_created' => $date_from . '...' . $date_to,
				'limit'        => - 1,
				'type'         => 'shop_order',
				'return'       => 'ids',
			);

			$order_ids = wc_get_orders( $args );

			if ( empty( $order_ids ) ) {
				$status = esc_html__( 'No order found with your given date range.', 'webappick-pdf-invoice-for-woocommerce' );
				wp_safe_redirect( add_query_arg( array( 'message' => $status ), admin_url( 'admin.php?page=webappick-woo-invoice' ) ) );
				exit();
			}

			$order_ids = implode( ',', $order_ids );

			$url   = wp_nonce_url( admin_url( 'admin-ajax.php' ), 'woo_invoice_ajax_nonce' );
			$param = array( 'order_ids' => $order_ids );

			// Bulk Download type checked and downloads the invoice and slip between the input dates.
			$bulk_type = isset( $_POST['wpifw_bulk_type'] ) ? sanitize_text_field( wp_unslash( $_POST['wpifw_bulk_type'] ) ) : 'WPIFW_INVOICE_DOWNLOAD';
			if ( 'WPIFW_INVOICE_DOWNLOAD' === $bulk_type ) {
				$param['action'] = 'wpifw_generate_invoice';
				wp_safe_redirect( add_query_arg( $param, $url ) );
				exit;
			} elseif ( 'WPIFW_PACKING_SLIP' === $bulk_type ) {
				$param['action'] = 'wpifw_generate_invoice_packing_slip';
				wp_safe_redirect( add_query_arg( $param, $url ) );
				exit;
			}
		}
	}

	// Start shipping label process.
	if ( isset( $_POST['wpifw_submit_delivery_address'] ) ) {
		// Verify Nonce.
		$retrieved_nonce = isset( $_REQUEST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['_wpnonce'] ) ) : '';
		if ( ! wp_verify_nonce( $retrieved_nonce, 'delivery_address_nonce' ) ) {
			die( 'Failed security check' );
		}

		// Sanitize Inputs.
		$delivery_address = array();
		foreach ( $_POST as $key => $value ) {
			if ( 'wpifw_delivery_address_buyer' === $key ) {
				$delivery_address[ $key ] = sanitize_textarea_field( $value );
			} else {
				$delivery_address[ $key ] = sanitize_text_field( $value );
			}
		}
		update_option( 'wpifw_delivery_address_buyer', $delivery_address['wpifw_delivery_address_buyer'] );
	}
	// End Shipping label process

	// Load plugin settings view.
	require plugin_dir_path( __FILE__ ) . 'admin/partials/woo-invoice-settings.php';
}

/**
 * Add extra settings link in plugins page
 *
 * @param array $links Action links.
 *
 * @return array
 */
function woo_invoice_plugin_action_links( $links ) {
	$links[] = '<a style="color:#8e44ad;" href="' . admin_url( 'admin.php?page=webappick-woo-invoice' ) . '" target="_blank">' . __( 'Settings', 'webappick-pdf-invoice-for-woocommerce' ) . '</a>';
	$links[] = '<a style="color:green;" href="https://webappick.com/plugin/woocommerce-pdf-invoice-packing-slips/?utm_source=customer_site&utm_medium=free_vs_pro&utm_campaign=woo_invoice_free" target="_blank">' . __( '<b>Get Pro</b>', 'webappick-pdf-invoice-for-woocommerce' ) . '</a>';
	$links[] = '<a style="color:#8e44ad;" href="https://webappick.com/docs/" target="_blank">' . __( 'Documentation', 'webappick-pdf-invoice-for-woocommerce' ) . '</a>';

	return $links;
}

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'woo_invoice_plugin_action_links' );

/**
 * Add or Get invoice number
 *
 * @param integer $order_id Order Id.
 *
 * @return mixed|string
 */
function woo_invoice_get_invoice_number( $order_id ) {

    $invoice_no = get_post_meta( $order_id, 'wpifw_invoice_no', true );

    if ( empty($invoice_no) || '' == $invoice_no ) {

        $invoice_no = $order_id;

        // Get Prefix.
        $prefix = get_option( 'wpifw_invoice_no_prefix' );
        $prefix = ! empty( $prefix ) ? $prefix : '';

        // Get Suffix.
        $suffix = get_option( 'wpifw_invoice_no_suffix' );
        $suffix = ! empty( $suffix ) ? $suffix : '';

        // Generate Invoice Number.
        $invoice_no = $prefix . $order_id . $suffix;

        $invoice_no = woo_invoice_process_date_macros( $order_id, $invoice_no );

        update_post_meta( $order_id, 'wpifw_invoice_no', $invoice_no );
    }

    return $invoice_no;
}

/**
 * Process macros for custom order or invoice number
 *
 * @param int    $order_id Order Unique Id.
 * @param string $order_no Custom Order Number.
 *
 * @return mixed
 */
function woo_invoice_process_date_macros( $order_id, $order_no ) {
	$order_created = get_the_date( 'Y-m-d', $order_id );
	if ( false !== strpos( $order_no, '{{day}}' ) ) {
		$order_no = str_replace( '{{day}}', date( 'd', strtotime( $order_created ) ), $order_no ); //phpcs:ignore
	}
	if ( false !== strpos( $order_no, '{{month}}' ) ) {
		$order_no = str_replace( '{{month}}', date( 'm', strtotime( $order_created ) ), $order_no ); //phpcs:ignore
	}
	if ( false !== strpos( $order_no, '{{year}}' ) ) {
		$order_no = str_replace( '{{year}}', date( 'Y', strtotime( $order_created ) ), $order_no ); //phpcs:ignore
	}

	return $order_no;
}

/**
 * Admin Notice if not writable uploads directory.
 */
function woo_invoice_font_dir_notice(){ ?>
    <div class="notice notice-error is-dismissible">
        <p>
            <?php
            _e('<h1>Woo Invoice</h1>  <b>Your uploads folder is not writable. Please make <code style="color: red;">wp-content/uploads</code> folder writable to generate and save invoices.</b>', 'webappick-pdf-invoice-for-woocommerce'); //phpcs:ignore
            ?>
        </p>
    </div> <?php
}


if ( ! function_exists( 'woo_invoice_hide_promotion' ) ) {
    /**
     * Update option to hide promotion.
     *
     * @param int _ajax_nonce nonce number.
     *
     * @since 5.1.7
     */
    function woo_invoice_hide_promotion() {
        if ( isset( $_REQUEST['_ajax_nonce'] ) ) {
            $hide_promotion = update_option('woo_invoice_hide_promotion', 1);
            $data = array(
                'msg' => 'Hide promotion updated successfully.',
            );
            if ( $hide_promotion ) {
                wp_send_json_success( $data );
            }else {
                wp_send_json_error( esc_html__( 'Something is wrong.', 'webappick-pdf-invoice-for-woocommerce' ) );
            }
        } else {
            wp_send_json_error( esc_html__( 'Invalid Request.', 'webappick-pdf-invoice-for-woocommerce' ) );
        }
        wp_die();
    }
}
add_action('wp_ajax_woo_invoice_hide_promotion', 'woo_invoice_hide_promotion');
