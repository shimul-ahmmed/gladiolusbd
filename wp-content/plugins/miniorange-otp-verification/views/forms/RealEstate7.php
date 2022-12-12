<?php

echo'	<div class="mo_otp_form" id="'.get_mo_class($handler).'"><input type="checkbox" '.esc_attr($disabled).' id="realestate_reg" class="app_enable" 
            data-toggle="realestate_options" name="mo_customer_validation_realestate_enable" value="1"
			'.esc_attr($realestate_enabled).' /><strong>'. esc_attr($form_name) .'</strong>';

echo'		<div class="mo_registration_help_desc" '.esc_attr($realestate_hidden).' id="realestate_options">
				<b>Choose between Phone or Email Verification</b>
				<p>
					<input type="radio" '.esc_attr($disabled).' id="realestate_phone" class="app_enable" 
					    name="mo_customer_validation_realestate_contact_type" value="'.esc_attr($realestate_type_phone).'"
						'.(esc_attr($realestate_enabled_type) == esc_attr($realestate_type_phone) ? "checked" : "" ).'/>
						<strong>'. mo_( "Enable Phone Verification" ).'</strong>
				</p>
				<p>
					<input type="radio" '.esc_attr($disabled).' id="realestate_email" class="app_enable" 
					    name="mo_customer_validation_realestate_contact_type" value="'.esc_attr($realestate_type_email).'"
						'.(esc_attr($realestate_enabled_type) == esc_attr($realestate_type_email)? "checked" : "" ).'/>
						<strong>'. mo_( "Enable Email Verification" ).'</strong>
				</p>
			</div>
		</div>';
