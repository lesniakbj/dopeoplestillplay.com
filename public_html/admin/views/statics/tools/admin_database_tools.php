<?
	if($this->session->userdata('logged-in') == FALSE) {
		show_error('Forbidden content. Please login to view this content.', 403, '403 Forbidden Content');
	}	
?>
<div class="container database tools">
	<div class="tools-header">Admin Database Tools</div>
	<div id="database-tools" data-collapse="accordion">
<?
	foreach($tables AS $schema => $tablesInSchema) {
		echo '<h2>'.$schema.'</h2>';
		echo '<ul>';
		foreach($tablesInSchema AS $key => $table) {
			echo '<li>'.$table['table_name'].'</li>';
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
