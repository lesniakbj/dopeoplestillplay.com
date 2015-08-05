<?
	if($this->session->userdata('logged-in') == FALSE) {
		show_error('Forbidden content. Please login to view this content.', 403, '403 Forbidden Content');
	} else {		

		echo '<div class="container tool-area">';
		
		$toolsMenu = array(
			anchor('/tools/datatools/all', 'Scrape All Data Feeds', 'title="Scrape Feeds"'),
			anchor('/tools/datatools/steam', 'Scrape Steam Data Feed', 'title="Data Feeds"'),
			anchor('/tools/datatools/steamspy', 'Scrape SteamSpy Data Feed', 'title="Database"'),
			anchor('/tools/datatools/gameinformation', 'Scrape Game Information Data Feed', 'title="Logs"'),
		);

		$toolsAttrs = array(
			'class' => ''
		);

		echo ul($toolsMenu, $toolsAttrs);
			
		echo '</div>';
	
	} // End session check
?>