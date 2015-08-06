<?
	if($this->session->userdata('logged-in') == FALSE) {
		show_error('Forbidden content. Please login to view this content.', 403, '403 Forbidden Content');
	} else {		

		echo '<div class="container tool-area">';
		
		$toolsMenu = array(
			anchor('/tools/datatools/all', 'Scrape All Data Feeds', 'title="Scrape Feeds" class="button"'),
			anchor('/tools/datatools/steam', 'Scrape Steam Data Feed', 'title="Data Feeds" class="button"'),
			anchor('/tools/datatools/steamspy', 'Scrape SteamSpy Data Feed', 'title="Database" class="button"'),
			anchor('/tools/datatools/gameinformation', 'Scrape Game Information Data Feed', 'title="Logs" class="button"'),
		);

		$toolsAttrs = array(
			'class' => 'admin-actions'
		);

		echo ul($toolsMenu, $toolsAttrs);
			
		echo '</div>';
	
	} // End session check
?>