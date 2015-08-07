var AdminTools = {

	redirectLinks: function() {
		$('.button').on('click', function(event) {
			event.preventDefault();
			var buttonId = event.target.id;
			
			switch(buttonId) {
				case 'info-tool':
					// Instead of calling the data scrape directly, display a form to enter data we want from the scrape.
					AdminTools.ajaxGetData("http://admin.dopeoplestillplay.com/tools/datatools/gameinformation");
					break;
				default:
					alert('Tool not implemented yet!');
			}			
		});
	},
	
	ajaxGetData: function(urlVar) {
		$.ajax({
  			url: urlVar
		})
  		.done(function( data ) {
  			$('.data-information').append(data);
			if ( console && console.log ) {
				console.log(data);
			}
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