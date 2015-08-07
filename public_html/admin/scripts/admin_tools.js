var AdminTools = {

	redirectLinks: function() {
		$('.button').on('click', function(event) {
			event.preventDefault();
			var buttonId = event.target.id;
			
			AdminTools.ajaxLoadTool("http://admin.dopeoplestillplay.com/tools/datatools/" + buttonId);		
		});
	},
	
	ajaxLoadTool: function(urlVar) {
		$.ajax({
  			url: urlVar
		})
  		.done(function( data ) {
  			$('.data-information').append(data);
  		});
	}

};

$( document ).ready(function() {
    AdminTools.redirectLinks();
});

$( document ).ajaxStart(function() {
  $('#loading-data').show();
});

$( document ).ajaxStop(function() {
  $('#loading-data').hide();
});