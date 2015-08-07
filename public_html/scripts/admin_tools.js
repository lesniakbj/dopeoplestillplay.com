var AdminTools = {

	redirectLinks: function() {
		$('.button').on('click', function(event) {
			var buttonId = event.target.id;
			
			alert(buttonId);
		});
	};

};

$( document ).ready(function() {
    AdminTools.redirectLinks();
});