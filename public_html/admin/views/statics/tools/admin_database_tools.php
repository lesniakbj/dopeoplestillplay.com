<?
	if($this->session->userdata('logged-in') == FALSE) {
		show_error('Forbidden content. Please login to view this content.', 403, '403 Forbidden Content');
	}	
?>
<div class="container tool-area tools">
	<div class="tools-header">Admin Database Tools</div>
	<div id="database-tools" data-collapse="accordion">
<?
	// Loop through all the schemas passed in from the controller,
	// and display their related databases. 
	foreach($tables AS $schema => $tablesInSchema) {
		// If there are no tables in a schema, do nothing
		// and continue on. $schema++
		if(empty($tablesInSchema)) {
			continue;
		}		
		echo '<h2>'.$schema.'</h2>';
		echo '<ul>';
		foreach($tablesInSchema AS $key => $table) {
			echo '<div class="db-item" data-collapse>';
			echo 	'<li class="db-table-name">'.$table['table_name'].'</li>';
			echo 	'<div class="db-actions">';
			echo		'<ul>';
			echo			'<li>View Data</li>';
			echo			'<li>View Table Summary</li>';
			echo		'</ul>';
			echo	'</div>';
			echo '</div>';
		}
		echo '</ul>';
	}
?>
	</div>
</div>
<div class="container tool-area data-feed">
	<div class="loading-overlay">
		<img src="/images/ajax-loader.gif" alt="Fetching Data..." id="loading-data">
	</div>
	<div class="tools-header">Data Viewer</div>
	<div class="data-information">
		<div class="data-tool"></div>
	</div>					
</div>	