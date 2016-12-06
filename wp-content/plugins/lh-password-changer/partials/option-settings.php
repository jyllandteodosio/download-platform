<?php




echo "<h1>" . __( 'LH Password Changer Settings', $this->namespace ) . "</h1>";

echo '<form name="lh_password_changer-admin_form" id="lh_password_changer-admin_form" method="post" action="">';


echo '<input type="hidden" name="'.$this->hidden_field_name.'" id="'.$this->hidden_field_name.'" value="Y" />';
echo '<p>
<label for="'.$this->page_id_field.'">'.__('Password Change Page Id:', $this->namespace ).'</label>';
echo '<input type="number" name="'.$this->page_id_field.'" id="'.$this->page_id_field.'" value="'.$options[ $this->page_id_field ].'" size="10" /><a href="'.get_permalink($options[ $this->page_id_field ]).'">'. __('Link', $this->namespace).'</a>
</p>';
echo '<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="'.esc_attr('Save Changes').'" />
</p>
</form>';


?>