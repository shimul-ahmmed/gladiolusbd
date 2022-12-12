<?php

use OTP\Helper\MoConstants;
use OTP\Helper\MoMessages;

echo'		<div class="mo_otp_form" id="'.esc_attr(get_mo_class($handler)).'">
		        <input  type="checkbox" 
		                '.esc_attr($disabled).' 
		                id="wp_client" 
		                class="app_enable" 
		                data-toggle="wp_client_options" 
		                name="mo_customer_validation_wp_client_enable" value="1"
		                '.esc_attr($wp_client_enabled).' />
                <strong>'. esc_attr($form_name) .'</strong>
                <div class="mo_registration_help_desc" '.esc_attr($wp_client_hidden).' id="wp_client_options">
					
					<b>'. mo_("Choose between Phone or Email Verification").'</b>
					<p>
					    <input  type="radio" 
					            '.esc_attr($disabled).' 
					            data-toggle="wp_client_phone_instructions" 
					            id="wp_client_phone" 
					            class="form_options app_enable" 
						        name="mo_customer_validation_wp_client_enable_type" 
						        value="'.esc_attr($wp_client_type_phone).'"
							    '.( esc_attr($wp_client_enable_type) == esc_attr($wp_client_type_phone) ? "checked" : "").' />
                        <strong>'. mo_("Enable Phone verification").'</strong>
						
						<div    '.(esc_attr($wp_client_enable_type) != esc_attr($wp_client_type_phone) ? "hidden" : "").' 
						        id="wp_client_phone_instructions" 
						        class="mo_registration_help_desc">
                                <input  type="checkbox" 
                                        '.esc_attr($disabled).' 
                                        id="mo_customer_validation_wp_client_restrict_duplicates" 
                                        name="mo_customer_validation_wp_client_restrict_duplicates" 
                                        value="1"
                                        '.esc_attr($restrict_duplicates).'/>
                                <strong>'. mo_( "Restrict Duplicate phone number to sign up." ).'</strong>
						</div>
					</p>
					<p>
					    <input  type="radio" 
					            '.esc_attr($disabled).' 
					            id="wp_client_email" 
					            class="form_options app_enable" 
						        name="mo_customer_validation_wp_client_enable_type" 
						        value="'.esc_attr($wp_client_type_email).'"
						        '.( esc_attr($wp_client_enable_type) == esc_attr($wp_client_type_email) ? "checked" : "" ).' />
						<strong>'. mo_("Enable Email verification").'</strong>
					</p>
				</div>
			</div>';