<?
	include_once('resources/Strings.php'); 
	$rsString = new ResourceStrings();
?>
<section class="header">
	<h1 class="title">Do People Still Play..?</h1>
	<h5 class="title">We are currently under construction! Find out if people are still playing your favorite games, after we launch!</h5>
</section>
		      	
<form name="user-email-info" class="construction-email" action="/forms/handle/construct-email" method="post">
	<div class="row">
   		<div class="one-third columns">
   			<p class="flavor-text"><?php echo $rsString::$homeStrings['CONSTRUCTION_TEXT'];?></p>
			<input class="email-input" name="user-email" type="email" placeholder="youremail@address.com">
			<?php echo br(1); ?>
			<input class="button-primary email-button" type="submit" value="Submit Email">
		</div>
	</div>
</form>

<div class="game-images row">
	<div class="four columns center-text game-image"><img class="game-img" src="images/game-eve-bg.jpg">Wondering if your favorite games are still being played by other players?</div>
	<div class="four columns center-text game-image"><img class="game-img" src="images/game-csgo-bg.jpg">Get statistics on games, servers, and the amount of players!</div>
	<div class="four columns center-text game-image"><img class="game-img" src="images/game-gtav-bg.jpg">Chat with other players and plan game nights!</div>
</div>