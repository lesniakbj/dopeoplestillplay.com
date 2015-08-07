var AdminTools = {

	redirectLinks: function() {
		$('.button').on('click', function(event) {
			event.preventDefault();
			var buttonId = event.target.id;
			// To do, use the ajax function to scrape the data provider based on button presses
			
			AdminTools.ajaxGetData("http://admin.dopeoplestillplay.com/tools/datatools/gameinformation");
			alert(buttonId);
		});
	},
	
	ajaxGetData: function(urlVar) {
		$.ajax({
  			url: urlVar
		})
  		.done(function( data ) {
  			$('.data-information').append(data);
    			if ( console && console.log ) {
      				console.log( "Sample of data:", data);
			}
  		});
	}

};

$( document ).ready(function() {
    AdminTools.redirectLinks();
});