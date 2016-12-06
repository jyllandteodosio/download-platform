<?php

$content .= '<form name="lh_password_changer-form" id="lh_password_changer-form" action="'.$action.'" method="post">';

$content = apply_filters('lh_password_changer_form_above_fields', $content, $userobject, $post);

$content .= '<p>
<label for="lh_password_changer-password1">'. __('New Password', $this->namespace).'</label>
<input type="password" name="lh_password_changer-password1" id="lh_password_changer-password1" placeholder="'. __('New Password', $this->namespace).'"  class="input" value="" size="15"  pattern=".{5,15}" required="required" title="5 to 15 characters" />
</p>';


$content .= '<p>
<label for="lh_password_changer-password2">'.__('Confirm Password', $this->namespace).'</label>
<input type="password" name="lh_password_changer-password2" id="lh_password_changer-password2" placeholder="'. __('Confirm Password', $this->namespace).'" class="input" value="" size="15"  pattern=".{5,15}" required="required" title="5 to 15 characters" />
</p>';

$content .= '<span id="lh_password_changer-confirmMessage" class="confirmMessage"></span>';

$content = apply_filters('lh_password_changer_form_below_fields', $content, $userobject, $post);

$content .= '<input name="lh_password_changer-form-nonce" id="lh_password_changer-form-nonce" value="'.wp_create_nonce( 'lh_password_changer-change_password'.$userobject->ID ).'" type="hidden" />';

$content .= '<p><input type="submit" name="lh_password_changer-form-submit" id="lh_password_changer-form-submit" class="button-primary" value="'. esc_attr('Submit').'" /></p>';

$content .= '</form>';


wp_enqueue_script('lh_password_changer-script', plugins_url( '/scripts/lh-password-changer.js' , __FILE__ ), array(), '0.13', true  );






?>