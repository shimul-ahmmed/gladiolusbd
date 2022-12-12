<?php

echo'	<div class="mo_otp_form" id="'.get_mo_class($handler).'"><input type="checkbox" '.esc_attr($disabled).' id="pmpro_reg" class="app_enable" data-toggle="pmpro_options" name="mo_customer_validation_pmpro_enable" value="1"
			'.esc_attr($pmpro_enabled).' /><strong>'. esc_attr($form_name) .'</strong>';

echo'		<div class="mo_registration_help_desc" '.esc_attr($pmpro_hidden).' id="pmpro_options">
				<b>Choose between Phone or Email Verification</b>
				<p>
					<input type="radio" '.esc_attr($disabled).' id="pmpro_phone" class="app_enable" name="mo_customer_validation_pmpro_contact_type" value="'.esc_attr($pmpro_type_phone).'"
						'.(esc_attr($pmpro_enabled_type) == esc_attr($pmpro_type_phone) ? "checked" : "" ).'/>
						<strong>'. mo_( "Enable Phone Verification" ).'</strong>
				</p>
				<p>
					<input type="radio" '.esc_attr($disabled).' id="pmpro_email" class="app_enable" name="mo_customer_validation_pmpro_contact_type" value="'.esc_attr($pmpro_type_email).'"
						'.(esc_attr($pmpro_enabled_type) == esc_attr($pmpro_type_email)? "checked" : "" ).'/>
						<strong>'. mo_( "Enable Email Verification" ).'</strong>
				</p>
			</div>
		</div>';
