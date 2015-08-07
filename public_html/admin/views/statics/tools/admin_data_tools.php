<?
	if($this->session->userdata('logged-in') == FALSE) {
		show_error('Forbidden content. Please login to view this content.', 403, '403 Forbidden Content');
	} else {		

		echo '<div class="container tool-area tools">';
		echo 	'<div class="tools-header">Admin Data Tools</div>';
		
		$toolsMenu = array(
			anchor('/tools/datatools/all', 'Scrape All Data Feeds', 'title="Scrape Feeds" id="all-tools" class="button"'),
			anchor('/tools/datatools/steam', 'Scrape Steam Data Feed', 'title="Data Feeds" id="steam-tool" class="button"'),
			anchor('/tools/datatools/steamspy', 'Scrape SteamSpy Data Feed', 'title="Database" id="steamspy-tool" class="button"'),
			anchor('/tools/datatools/gameinformation', 'Scrape Game Information Data Feed', 'title="Logs" id="info-tool" class="button"'),
		);

		$toolsAttrs = array(
			'class' => 'admin-actions'
		);

		echo ul($toolsMenu, $toolsAttrs);
			
		echo '</div>';		
		echo '<div class="container tool-area data-feed">';
		echo 	'<div class="tools-header">Data Viewer</div>';
		echo		'<div class="data-information">';
						// TODO: Echo any information related to the data scrape here:
						//		 Where the information came from, how long it took to scrape
						//		 the URL of the scrape, etc. 
		echo		'</div>';					
		echo '</div>';	
	} // End session check
?>