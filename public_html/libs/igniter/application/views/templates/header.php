<?php
	// Use an abosulute path here, due to some issues with loading. 
	include_once(FCPATH.'resources/Strings.php'); 
	$rsString = new ResourceStrings();
	
	$this->load->helper('url');
	$this->load->helper('html');
		
	
	$meta = array(
		array('name' => 'robots', 'content' => 'no-cache'),
		array('name' => 'description', 'content' => $rsString::$metaStrings['DESCRIPTION']),
		array('name' => 'keywords', 'content' => $rsString::$metaStrings['KEYWORDS']),
		array('name' => 'robots', 'content' => 'no-cache'),
		array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
	);

	echo '<!DOCTYPE html>';
	echo '<html>';
    echo 	'<head>';
	
	// Echo all of the meta tags needed by the page, get the data from the controller. 
	echo meta($meta); 
	
	if(!is_null($title))
		echo '<title>'.$title.' - Do People Still Play?</title>';
	else
		echo '<title>Do People Still Play?</title>';
	
	// Echo the CSS tags that are used for the reset, normalization, framework, and master styles. 
	echo link_tag('css/reset.css');
	echo link_tag('css/normalize.css');
	echo link_tag('css/libs/skeleton.css');
	echo link_tag('css/master.css');
	
	$link = array(
		'href'	=> 'images/favicon.ico',
		'rel'	=> 'shortcut icon',
		'type'	=> 'image/x-icon',
		'media'	=> 'all'
	);
	
	echo link_tag($link);

	// Echo page specific tags here
	if(isset($css) && !is_null($css)) {
		for($i = 0; $i < count($css); $i++) {
			echo link_tag('css/'.$css[$i]);
		}
	}
	
	// Echo the jQuery Hosted library tags
	echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>';
	echo '</head>';
	echo '<body>';
	echo	'<div class="container">';
?>