<form name="admin-login" class="" action="AdminHome/login" method="post">
	<div class="row form-group">
		<div class="four columns">&nbsp;</div>
		<div class="four columns">
			<label "for="admin-username">Admin Username:</label>
			<input name="admin-username" type="text">
		</div>
		<div class="four columns">&nbsp;</div>
	</div>
	<?php echo br(1); ?>
	<div class="row form-group">
		<div class="four columns">&nbsp;</div>
		<div class="four columns">
			<label for="admin-password">Admin Password:</label>
			<input name="admin-password" type="text">
		</div>
		<div class="four columns">&nbsp;</div>
	</div>
	<?php echo br(1); ?>
	<input class="button-primary email-button" type="submit" value="Submit Email">
</form>