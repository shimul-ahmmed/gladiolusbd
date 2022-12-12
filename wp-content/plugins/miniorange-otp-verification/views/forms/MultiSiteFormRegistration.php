<?php

echo'	<div class="mo_otp_form" id="'.get_mo_class($handler).'"><input type="checkbox" '.esc_attr($disabled).' id="multisite_reg" class="app_enable" data-toggle="multisite_options" name="mo_customer_validation_multisite_enable" value="1"
			'.esc_attr($multisite_enabled).' /><strong>'. esc_attr($form_name) .'</strong>';


echo'		<div class="mo_registration_help_desc" '.esc_attr($multisite_hidden).' id="multisite_options">
				<b>Choose between Phone or Email Verification</b>
				<p>
					<input type="radio" '.esc_attr($disabled).' id="multisite_phone" class="app_enable" name="mo_customer_validation_multisite_contact_type" value="'.esc_attr($multisite_type_phone).'"
						'.(esc_attr($multisite_enabled_type) == esc_attr($multisite_type_phone) ? "checked" : "" ).'/>
						<strong>'. mo_( "Enable Phone Verification" ).'</strong>


				</p>
				<p>
					<input type="radio" '.esc_attr($disabled).' id="multisite_email" class="app_enable" name="mo_customer_validation_multisite_contact_type" value="'.esc_attr($multisite_type_email).'"
						'.(esc_attr($multisite_enabled_type) == esc_attr($multisite_type_email)? "checked" : "" ).'/>
						<strong>'. mo_( "Enable Email Verification" ).'</strong>
				</p>
			</div>
		</div>';
