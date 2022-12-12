<?php
/**
 * Used to generate PDF Document
 *
 * @link  https://webappick.com
 * @since 1.0.0
 *
 * @package    Woo_Invoice_PDF
 * @subpackage Woo_Invoice_PDF/includes
 */

/**
 * User: Md Ohidul Islam
 * Email: wahid0003@gmail.com
 * Date: 4/7/20
 * Time: 8:58 PM
 */
class Woo_Invoice_PDF
{

    /**
     * PDF document html content.
     *
     * @var $html
     */
    private $html;
    /**
     * Document Size.
     *
     * @var $paper_size
     */
    private $paper_size;
    /**
     * PDF document template type.
     *
     * @var $template
     */
    private $template;
    /**
     * PDF document file name.
     *
     * @var $file_name
     */
    private $file_name;
    /**
     * PDF document html content.
     *
     * @var $html
     */
    private $order_id;
    /**
     * PDF document html content.
     *
     * @var $html
     */
    private $config = array();

    /**
     * Woo_Invoice_PDF constructor.
     *
     * @param string  $html       Document Content.
     * @param string  $file_name  Document Name.
     * @param integer $order_id   Order Id.
     * @param string  $template   Template Type.
     * @param string  $paper_size Document size.
     */
    public function __construct( $html, $file_name, $order_id, $template, $paper_size ) {
        $this->html       = $html;
        $this->template   = $template;
        $this->file_name  = $file_name;
        $this->paper_size = $this->paper_size($paper_size);
        $this->order_id   = $order_id;
        $this->mpdf_config();
    }

    /**
     * MPDF Library settings.
     */
    public function mpdf_config() {
        // Temporary Directory.
        $upload                  = wp_upload_dir();
        $base_dir                = $upload['basedir'];

        $extra_fonts = array(
			'sun-exta' => 'Sun-ExtA.ttf',
			'sun-extb' => 'Sun-ExtB.ttf',
			'unbatang' => 'UnBatang_0613.ttf',
        );

        $default_config          = ( new Mpdf\Config\ConfigVariables() )->getDefaults();
        $font_dirs               = $default_config['fontDir'];
        $this->config['fontDir'] = $font_dirs;

        // Add custom font dir for extra fonts.
        if ( file_exists(wp_upload_dir()['basedir'] . '/WOO-INVOICE/WOO-INVOICE-FONTS') ) {
            $font_dirs = array_merge(
                $font_dirs,
                array(
					wp_upload_dir()['basedir'] . '/WOO-INVOICE/WOO-INVOICE-FONTS',
                )
            );
        }
        $this->config['fontDir'] = $font_dirs;
        $default_font_config = ( new Mpdf\Config\FontVariables() )->getDefaults();
	    $font_data           = $default_font_config['fontdata'];
        foreach ( $extra_fonts as $key => $value ) {
            if ( file_exists(wp_upload_dir()['basedir'] . '/WOO-INVOICE/WOO-INVOICE-FONTS/' . $value) ) {
                if ( 'sun-exta' === $key ) {
                    $this->config['fontdata']['sun-exta'] = array(
						'R'       => 'Sun-ExtA.ttf',
						'sip-ext' => 'sun-extb', /* SIP=Plane2 Unicode (extension B) */
                    );
                } elseif ( 'sun-extb' === $key ) {
                    $this->config['fontdata']['sun-extb'] = array(
						'R' => 'Sun-ExtB.ttf',
                    );
                } elseif ( 'unbatang' === $key ) {
                    $this->config['fontdata']['unbatang'] = array(/* Korean */
						'R' => 'UnBatang_0613.ttf',
                    );
                }
            }
        }

        $challan_defualt_fonts = '';
        $this->config['fontdata']                 = apply_filters('woo_invoice_pdf_font_data', $font_data, $this->template);
        $this->config['allowCJKoverflow']         = true;
        $this->config['allow_charset_conversion'] = true;
        $this->config['autoLangToFont']           = true;
        $this->config['mode']                     = 'utf-8';
        $this->config['format']                   = $this->paper_size;
	    $this->config['default_font'] = apply_filters('woo_invoice_default_fonts_name', $challan_defualt_fonts);

        return apply_filters('woo_invoice_mpdf_settings', $this->config);
    }

    /**
     * Generate PDF Document
     *
     * @return string
     * @throws \Mpdf\MpdfException // phpcs:ignore.
     */
    public function generate_pdf() {
        try {
            $mpdf                     = new \Mpdf\Mpdf($this->config);
              $mpdf->autoScriptToLang = true;// phpcs:ignore
              $mpdf->baseScript       = 1;// phpcs:ignore
              $mpdf->autoVietnamese   = true; // phpcs:ignore
              $mpdf->autoArabic       = true; // phpcs:ignore
            // $mpdf->fonttrans['freeserif'] = true;
            $mpdf->debug = get_option('wpifw_pdf_invoice_debug_mode') === '1' ? true : false;

            // Add Background Image.
            $water_mark = $this->get_watermark();
            if ( $water_mark ) {
                $mpdf->SetWatermarkImage(
                    $water_mark['background'],
                    $water_mark['opacity'],
                    'P',
                    'P'
                );
                      $mpdf->showWatermarkImage = true; // phpcs:ignore
            }

            $template = ucwords(str_replace('_', ' ', $this->template));
            $order_id = '-' . $this->order_id;
            if ( strpos($order_id, ',') !== false ) {
                $order_id = '';
                $template = $template . 's';
            }

            $mpdf->WriteHTML($this->html);
            $invoice_no = woo_invoice_get_invoice_number($order_id);
            if ( 'save' === $this->template ) { // Save Invoice before email.
                $filename = 'Invoice-' . $invoice_no;
                $filename = apply_filters('woo_invoice_file_name', $filename, $template, $order_id);
                return $mpdf->Output(WOO_INVOICE_DIR . $filename . '.pdf', 'F');
            } else {
                $filename = $template . $order_id;
                $filename = apply_filters('woo_invoice_file_name', $filename, $template, $order_id);
                if ( 'download' === get_option('wpifw_pdf_invoice_button_behaviour') ) {
                    $mpdf->Output($filename . '.pdf', 'D');
                } else {
                    $mpdf->Output($filename . '.pdf', 'I');
                }
            }
            exit;
        } catch ( \Mpdf\MpdfException $e ) { // Note: safer fully qualified exception name used for catch.
            // Process the exception, log, print etc.
            if ( 'save' !== $this->template ) {
                $pdf_error_message = esc_attr($e->getMessage());
                if ( strpos($pdf_error_message, 'Cannot find TTF') !== false ) {
                    $doc_link = '<a target="_blank" href="https://webappick.com/docs/woo-invoice/installation-setup/font-installation/">' .esc_html('Click Here').'</a>'; //phpcs:ignore
                    echo esc_attr($e->getMessage()) . '<b>' . __(' Please read the doc to download your missing fonts.'.$doc_link, 'webappick-pdf-invoice-for-woocommerce') . '</b>'; //phpcs:ignore
                } else {

                    echo esc_attr($e->getMessage());
                }
            }
        }
    }

    /**
     * Add water mark to PDF
     *
     * @return array|bool
     */
    private function get_watermark() {
        $background = '';
        $opacity    = '';
        if ( 'invoice' === $this->template ) {
            if ( get_option('wpifw_enable_invoice_background') ) {
                $opacity = ( get_option('wpifw_invoice_background_opacity') ) ? get_option('wpifw_invoice_background_opacity') : .3;
                if ( get_option('wpifw_enable_invoice_background') ) {
                    $background = get_option('wpifw_invoice_background_attachment_id');
                }
            }
        } elseif ( 'packing_slip' === $this->template ) {
            if ( get_option('wpifw_enable_packingslip_background') ) {
                $opacity = ( false !== get_option('wpifw_packingslip_background_opacity') && ! empty('wpifw_packingslip_background_opacity') ) ? get_option('wpifw_packingslip_background_opacity') : 1;
                if ( false !== get_option('wpifw_enable_packingslip_background') && ! empty(get_option('wpifw_packingslip_background_attachment_id')) ) {
                    $background = get_option('wpifw_packingslip_background_attachment_id');
                }
            }
        }
       // Custom filter to change invoice and packing slip background.
	    $watermark_image = apply_filters('woo_invoice_background_watermark', $background, $this->template);
	    $watermark_opacity = apply_filters('woo_invoice_background_watermark_opacity', $opacity, $this->template);
        if ( ! empty($watermark_image) ) {
            return array(
				'background' => $watermark_image,
				'opacity'    => $watermark_opacity,
            );
        }
        return false;

    }

    /**
     * Set Paper size to the PDF Document
     *
     * @param string|array $paper_size PDF size.
     */
    private function paper_size( $paper_size ) {
        if ( 'invoice' === $this->template ) {
            if ( false !== get_option('wpifw_invoice_paper_size') && ! empty(get_option('wpifw_invoice_paper_size')) && 'custom' !== get_option('wpifw_invoice_paper_size') ) {
                $this->paper_size = get_option('wpifw_invoice_paper_size');
            } elseif ( false !== get_option('wpifw_invoice_paper_size') && ! empty(get_option('wpifw_invoice_paper_size')) && 'custom' === get_option('wpifw_invoice_paper_size') ) {
                $this->paper_size = array();
                array_push($this->paper_size, get_option('wpifw_invoice_custom_paper_wide'));
                array_push($this->paper_size, get_option('wpifw_invoice_custom_paper_height'));
            } else {
                $this->paper_size = 'A4';
            }
        } elseif ( 'packing_slip' === $this->template ) {
            if ( false !== get_option('wpifw_invoice_paper_size') && ! empty(get_option('wpifw_invoice_paper_size')) && 'custom' !== get_option('wpifw_invoice_paper_size') ) {
                $this->paper_size = get_option('wpifw_invoice_paper_size');
            } elseif ( false !== get_option('wpifw_invoice_paper_size') && ! empty(get_option('wpifw_invoice_paper_size')) && 'custom' === get_option('wpifw_invoice_paper_size') ) {
                $this->paper_size = array();
                array_push($this->paper_size, get_option('wpifw_pickingslip_custom_paper_wide'));
                array_push($this->paper_size, get_option('wpifw_pickingslip_custom_paper_height'));
            } else {
                $this->paper_size = 'A4';
            }
        } elseif ( 'label' === $this->template ) {
            $paper_sizes = array( 'A3', 'A4', 'A5', 'Letter' );
            if ( in_array($paper_size, $paper_sizes, true) ) {
                $this->paper_size = $paper_size;
            } else {
                $this->paper_size = explode(',', $paper_size);
            }
        }
        return apply_filters('woo_invoice_paper_size', $this->paper_size, $this->template);
    }
}

/**
 * Initialize Woo_Invoice_PDF class into this function.
 *
 * @param  string  $html       Document Content.
 * @param  string  $file_name  Document Name.
 * @param  integer $order_id   Order Id.
 * @param  string  $template   Template Type.
 * @param  string  $paper_size Document size.
 * @return Woo_Invoice_PDF
 */
function woo_invoice_pdf( $html, $file_name, $order_id, $template, $paper_size = 'A4' ) {
    return new Woo_Invoice_PDF($html, $file_name, $order_id, $template, $paper_size);
}
