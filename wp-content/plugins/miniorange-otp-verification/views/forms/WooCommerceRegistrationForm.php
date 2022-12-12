<?php

use OTP\Helper\MoMessages;

echo'	<div class="mo_otp_form" id="'.esc_attr(get_mo_class($handler)).'">
	        <input  type="checkbox" '.esc_attr($disabled).' 
	                id="wc_default" 
	                data-toggle="wc_default_options" 
	                class="app_enable" 
	                name="mo_customer_validation_wc_default_enable" 
	                value="1"
		            '.esc_attr($woocommerce_registration).' />
            <strong>'.esc_attr($form_name).'</strong>';

echo'		<div class="mo_registration_help_desc" '.esc_attr($wc_hidden).' id="wc_default_options">
				<b>'. mo_( "Choose between Phone or Email Verification" ).'</b>
				<p>
				     <input type ="checkbox" '.esc_attr($disabled).' 
				            id ="wcreg_mo_view" 
				            data-toggle = "wcreg_mo_ajax_view_option" 
				            class="app_enable" 
                            name = "mo_customer_validation_wc_is_ajax_form" 
                            value= "1" '.esc_attr($is_ajax_mode_enabled).'/>
                     <Strong>'. mo_( "Do not show a popup. Validate user on the form itself." ).'</strong>
                     <div   '. (esc_attr($is_ajax_form) ? "" : "hidden") .' 
                            id="wcreg_mo_ajax_view_option" 
                            class="mo_registration_help_desc">
                        <div class="mo_otp_note" style="color:red">
                            '. mo_( "This mode does not work with Let the user choose option. ".
                                    "Please use either phone or email only." ).'
                        </div>                           
						<p>
						    <i><b>'.mo_("Verification Button text").':</b></i>
						    <input  class="mo_registration_table_textbox" 
						            name="mo_customer_validation_wc_button_text" 
						            type="text" value="'.esc_attr($wc_button_text).'">					
					    </p>
                     </div>
                </p>
				<p>
					<input  type="radio" '.esc_attr($disabled).' 
					        id="wc_phone" 
					        class="app_enable" 
					        data-toggle="wc_phone_options" 
					        name="mo_customer_validation_wc_enable_type" 
					        value="'.esc_attr($wc_reg_type_phone).'"
						    '.(esc_attr($wc_enable_type) == esc_attr($wc_reg_type_phone) ? "checked" : "" ).'/>
                    <strong>'. mo_( "Enable Phone Verification" ).'</strong>
				</p>
				<div    '.(esc_attr($wc_enable_type) != esc_attr($wc_reg_type_phone)  ? "hidden" :"").' 
                        class="mo_registration_help_desc" 
						id="wc_phone_options" >
                    <input  type="checkbox" '.esc_attr($disabled).' 
                            name="mo_customer_validation_wc_restrict_duplicates" value="1"
                            '.esc_attr($wc_restrict_duplicates).' />
                    <strong>'. mo_( "Do not allow users to use the same phone number for multiple accounts." ).'</strong>
				</div>
				<p>
					<input  type="radio" '.esc_attr($disabled).' 
					        id="wc_email" 
					        class="app_enable" 
					        name="mo_customer_validation_wc_enable_type" 
					        value="'.esc_attr($wc_reg_type_email).'"
						    '.(esc_attr($wc_enable_type) == esc_attr($wc_reg_type_email) ? "checked" : "" ).'/>
                    <strong>'. mo_( "Enable Email Verification" ).'</strong>
				</p>
				<p>
					<input  type="radio" 
					        '.esc_attr($disabled).' 
					        id="wc_both" 
					        class="app_enable" 
					        data-toggle="wc_both_options" 
					        name="mo_customer_validation_wc_enable_type" 
					        value="'.esc_attr($wc_reg_type_both).'"
						    '.(esc_attr($wc_enable_type) == esc_attr($wc_reg_type_both) ? "checked" : "" ).'/>
                    <strong>'. mo_( "Let the user choose" ).'</strong>';
                    mo_draw_tooltip(
                        MoMessages::showMessage(MoMessages::INFO_HEADER),
                        MoMessages::showMessage(MoMessages::ENABLE_BOTH_BODY)
                    );
echo '			</p>

				<div '.(esc_attr($wc_enable_type) != esc_attr($wc_reg_type_both) ? "hidden" :"").' class="mo_registration_help_desc" 
						id="wc_both_options" >
                    <input  type="checkbox" '.esc_attr($disabled).' 
                            name="mo_customer_validation_wc_restrict_duplicates" value="1"
                            '.esc_attr($wc_restrict_duplicates).' />
                    <strong>'. mo_( "Do not allow users to use the same phone number for multiple accounts." ).'</strong>
				</div>
				<div >
					<input type ="checkbox" '.esc_attr($disabled).' 
				            id ="wcreg_mo_redirect_after_registration" 
				            data-toggle = "wcreg_mo_rediect_page" 
				            class="app_enable" 
                            name = "mo_customer_validation_wcreg_redirect_after_registration" 
                            value= "1" '.esc_attr($is_redirect_after_registration_enabled).'/>
                     <Strong>'. mo_( "Redirect User to a specific page after registration." ).'</strong>
                    <p class="mo_registration_help_desc" '.esc_attr($wc_hidden).' id="wcreg_mo_rediect_page">
					<b>'. mo_( "Select page to redirect to after registration" ).': </b>';
                	wp_dropdown_pages(array("selected" => $redirect_page_id));
echo '          	</p>	
				</div>';
echo'		</div>
		</div>';