<?
	if($this->session->userdata('logged-in') == FALSE) {
		show_error('Forbidden content. Please login to view this content.', 403, '403 Forbidden Content');
	}	

	echo '<div class="container tool-area tools">';
	echo 	'<div class="tools-header">Admin Data Tools</div>';
	
	$toolsMenu = array(
		anchor('/tools/datatools/all', 'Scrape All Data Feeds', 'title="Scrape Feeds" id="all" class="button"'),
		anchor('/tools/datatools/steam', 'Scrape Steam Data Feed', 'title="Data Feeds" id="steam" class="button"'),
		anchor('/tools/datatools/steamspy', 'Scrape SteamSpy Data Feed', 'title="Database" id="steamspy" class="button"'),
		anchor('/tools/datatools/gameinformation', 'Scrape Game Information Data Feed', 'title="Logs" id="gameinformation" class="button"'),
	);

	$toolsAttrs = array(
		'class' => 'admin-actions'
	);

	echo ul($toolsMenu, $toolsAttrs);
	echo '</div>';
?>			
<div class="container tool-area data-feed">
	<div class="loading-overlay">
		<img src="/images/ajax-loader.gif" alt="Fetching Data..." id="loading-data">
	</div>
	<div class="tools-header">Data Viewer</div>
	<div class="data-information">
		<div class="data-tool"></div>
	</div>					
</div>	
