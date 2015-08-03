<?
	// Loads the form helper class to generate forms
	$this->load->helper('form');
	// Displays any validation errors on the forms.
	echo '<div class="form-error">'.validation_errors().'</div>';
	if(isset($failure_message)) { 
		echo '<div class="other-errors">'.$failure_message.'</div>';
	}
	
	$formAttrs = array(
		'action' => 'https://www.admin.dopeoplestillplay.com/admin/login',
		'class'  => '', 
		'id' 	 => 'admin-login', 
		'name'	 => 'admin-login',
		'value'  => set_value('admin-login'),
		'method' => 'post'
	);
	echo form_open('admin/login', $formAttrs);
	echo '<div class="row form-group">';
	echo 		'<div class="four columns">&nbsp;</div>';
	echo		'<div class="four columns">';
	echo			'<label "for="admin-username">Admin Username:</label>';
	
	$userAttrs = array(
              'name'        => 'admin-username',
              'id'          => 'admin-username',
              'value'       => set_value('admin-username'),
              'maxlength'   => '100',
            );
	echo form_input($userAttrs);
	echo		'</div>';
	echo		'<div class="four columns">&nbsp;</div>';
	echo	'</div>';
	echo 	br(1); 
	echo '<div class="row form-group">';
	echo		'<div class="four columns">&nbsp;</div>';
	echo		'<div class="four columns">';
	echo			'<label for="admin-password">Admin Password:</label>';
				
	$pwAttrs = array(
              'name'        => 'admin-password',
              'id'          => 'admin-password',
              'value'       => set_value('admin-password'),
              'maxlength'   => '100',
            );
	echo form_password($pwAttrs);
	echo 		'</div>';
	echo		'<div class="four columns">&nbsp;</div>';
	echo 	'</div>';
	echo 	br(1);
	echo 	'<input class="button-primary email-button" type="submit" value="Admin Login">';
	
	echo form_close();
?>