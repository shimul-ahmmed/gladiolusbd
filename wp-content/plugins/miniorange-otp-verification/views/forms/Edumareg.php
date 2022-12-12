<?php

echo'	<div class="mo_otp_form" id="'.get_mo_class($handler).'">'.
            '<input type="checkbox" 
                    '.esc_attr($disabled).' 
                    id="edumareg_default" 
                    class="app_enable" 
                    data-toggle="edumareg_options" 
                    name="mo_customer_validation_edumareg_enable" 
                    value="1"
			        '.esc_attr($edumareg_enabled).' />
            <strong>'. esc_attr($form_name) .'</strong>';

echo'		<div class="mo_registration_help_desc" '.esc_attr($edumareg_hidden).' id="edumareg_options">
				<b>'. mo_( "Choose between Phone or Email Verification" ).'</b>
				<p>
					<input  type="radio" 
					        '.esc_attr($disabled).' 
					        id="edumareg_phone" 
					        class="app_enable" 
					        data-toggle="edumareg_phone_options" 
					        name="mo_customer_validation_edumareg_enable_type" 
					        value="'.esc_attr($edumareg_type_phone).'"
						    '.(esc_attr($edumareg_enabled_type) == esc_attr($edumareg_type_phone)  ? "checked" : "" ).'/>
                    <strong>'. mo_( "Enable Phone Verification" ).'</strong>
				</p>
				<p>
					<input  type="radio" '.esc_attr($disabled).' 
					        id="edumareg_email" 
					        class="app_enable" 
					        name="mo_customer_validation_edumareg_enable_type" 
					        value="'.esc_attr($edumareg_type_email).'"
						    '.(esc_attr($edumareg_enabled_type) == esc_attr($edumareg_type_email)? "checked" : "" ).'/>
                    <strong>'. mo_( "Enable Email Verification" ).'</strong>
				</p>
			</div>
		</div>';  