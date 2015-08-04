<?
	// Check the sessions to see if we are already logged-in,
	// if we are redirect to admin_home
	if($this->session->userdata('logged-in') == TRUE) {
		$url = 'http://admin.dopeoplestillplay.com/admin/home';
		$perm = FALSE;
		if(!headers_sent()) {
			header('Location:'.$url, true, ($perm === TRUE) ? 301 : 302);
		}		
		die();
	}
	
	// Displays any validation/authentication errors on the forms.
	if(isset($failure_message)) { 
		if($failure_type == "auth") {
			echo '<div class="other-errors">'.$failure_message.'</div>';
		} else {
			echo '<div class="other-errors">Please refresh your browser and try again.</div>';
		}	
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
	echo 			form_label('Admin Username:', 'admin-username');
	
	$userAttrs = array(
	  'name'        => 'admin-username',
	  'id'          => 'admin-username',
	  'value'       => set_value('admin-username'),
	  'maxlength'   => '100',
	);
	echo 			form_input($userAttrs);
	echo		'</div>';
	echo		'<div class="four columns">&nbsp;</div>';
	echo	'</div>';
	echo 	br(1); 
	echo '<div class="row form-group">';
	echo		'<div class="four columns">&nbsp;</div>';
	echo		'<div class="four columns">';
	echo 			form_label('Admin Password:', 'admin-password');
				
	$pwAttrs = array(
              'name'        => 'admin-password',
              'id'          => 'admin-password',
              'value'       => set_value('admin-password'),
              'maxlength'   => '100',
            );
	echo 			form_password($pwAttrs);
	echo 		'</div>';
	echo		'<div class="four columns">&nbsp;</div>';
	echo 	'</div>';
	echo 	br(1);
	echo 	'<input class="button-primary email-button" type="submit" value="Admin Login">';
	echo form_close();
?>