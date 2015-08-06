<?
	if($this->session->userdata('logged-in') == FALSE) {
		show_error('Forbidden content. Please login to view this content.', 403, '403 Forbidden Content');
	} else {		

		echo '<div class="container tool-area">';
		
		$toolsMenu = array(
			'<button>'.anchor('/tools/datatools/all', 'Scrape All Data Feeds', 'title="Scrape Feeds"').'</button>',
			'<button>'.anchor('/tools/datatools/steam', 'Scrape Steam Data Feed', 'title="Data Feeds"').'</button>',
			'<button>'.anchor('/tools/datatools/steamspy', 'Scrape SteamSpy Data Feed', 'title="Database"').'</button>',
			'<button>'.anchor('/tools/datatools/gameinformation', 'Scrape Game Information Data Feed', 'title="Logs"').'</button>',
		);

		$toolsAttrs = array(
			'class' => 'admin-actions'
		);

		echo ul($toolsMenu, $toolsAttrs);
			
		echo '</div>';
	
	} // End session check
?>