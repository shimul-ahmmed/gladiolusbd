<?php

echo'	<div class="mo_otp_form" id="'.get_mo_class($handler).'">'.
            '<input type="checkbox" 
                    '.esc_attr($disabled).' 
                    id="edumalog_default" 
                    class="app_enable" 
                    data-toggle="edumalog_options" 
                    name="mo_customer_validation_edumalog_enable" 
                    value="1"
			        '.esc_attr($edumalog_enabled).' />
            <strong>'. esc_attr($form_name) .'</strong>';

echo'		<div class="mo_registration_help_desc" '.esc_attr($edumalog_hidden).' id="edumalog_options">
				<b>'. mo_( "Choose between Phone or Email Verification" ).'</b>
				<p>
					<input  type="radio" 
					        '.esc_attr($disabled).' 
					        id="edumalog_phone" 
					        class="app_enable" 
					        data-toggle="edumalog_phone_options" 
					        name="mo_customer_validation_edumalog_enable_type" 
					        value="'.esc_attr($edumalog_type_phone).'"
						    '.(esc_attr($edumalog_enabled_type) == esc_attr($edumalog_type_phone)  ? "checked" : "" ).'/>
                    <strong>'. mo_( "Enable Phone Verification" ).'</strong>
				<li>'. mo_( "Enter the phone User Meta Key" );
		echo'		<input    class="mo_registration_table_textbox"
                                        id="mo_customer_validation_wpf_login_phone_field_key"
                                        name="mo_customer_validation_edumalog_phone_field_key"
                                        type="text"
                                        value="'.esc_attr($edumalog_phone_field_key).'">
                            <div class="mo_otp_note" style="margin-top:1%">
                                '.mo_( "If you don't know the metaKey against which the phone number ".
                                        "is stored for all your users then put the default value as phone." ).'
                            </div>
				</li>
                                   
                        <li>'. mo_( "Click on the Save Button to save your settings." ).'</li>
                    </ol>
                   </p> 
				<p>
					<input  type="radio" '.esc_attr($disabled).' 
					        id="edumalog_email" 
					        class="app_enable" 
					        name="mo_customer_validation_edumalog_enable_type" 
					        value="'.esc_attr($edumalog_type_email).'"
						    '.(esc_attr($edumalog_enabled_type) == esc_attr($edumalog_type_email)? "checked" : "" ).'/>
                    <strong>'. mo_( "Enable Email Verification" ).'</strong>
				</p>
				<p>
                            <input  type="checkbox" '.esc_attr($disabled).'
                                   class="app_enable"
                                   data-toggle="mo_send_bypss_password"
                                   name="mo_customer_validation_edumalog_bypass_admin"
                                   value="1" '.esc_attr($edumalog_log_bypass).' />
                               <strong>'. mo_( "Bypass the admin from OTP Verification." ).'</strong>
                   </p>           
			</div>
		</div>';