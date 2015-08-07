var AdminTools = {

	redirectLinks: function() {
		$('.button').on('click', function(event) {
			event.preventDefault();
			var buttonId = event.target.id;
			// To do, use the ajax function to scrape the data provider based on button presses
			switch(buttonId) {
				case 'info-tool':
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