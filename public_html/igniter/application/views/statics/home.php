<?php 
	include('resources/Strings.php'); 
	$rsString = new ResourceStrings();
?>
<section class="header">
	<h2 class="title">Do People Still Play..?</h2>
	<h5 class="title">We are currently under construction! Find out if people are still playing your favorite games, after we launch!</h5>
</section>
		      	
<form name="user-email-info" class="construction-email" action="/forms/info_email" method="post">
	<div class="row">
   		<div class="one-third columns">
   			<p class="flavor-text"><?php echo $rsString::$homeStrings['CONSTRUCTION_TEXT'];?></p>
			<input class="email-input" name="user-email" type="email" placeholder="youremail@address.com" id="construction-email">
			<?php echo br(1); ?>
			<input class="button-primary email-button" type="submit" value="Submit">
		</div>
	</div>
</form>