<!DOCTYPE html>
<html>
        <head>
		<?php
			$this->load->helper('html');
			include_once('resources/Strings.php'); 
			$rsString = new ResourceStrings();
        		
			// Echo all of the meta tags needed by the page, get the data from the controller. 
			$meta = array(
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'description', 'content' => $rsString::$metaStrings['DESCRIPTION']),
				array('name' => 'keywords', 'content' => $rsString::$metaStrings['KEYWORDS']),
				array('name' => 'robots', 'content' => 'no-cache'),
				array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
			);
			
			echo meta($meta); 
		?>
			
		<title><?php if(!is_null($title)){echo $title;} ?> - Do People Still Play..?</title>
                
		<?php
			// Echo the CSS tags that are used for the reset, normalization, framework, and master styles. 
			echo link_tag('css/reset.css');
			echo link_tag('css/normalize.css');
			echo link_tag('css/libs/skeleton.css');
			echo link_tag('css/master.css');
			
			$link = array(
				'href' => 'images/favicon.ico',
			        'rel' => 'shortcut icon',
			        'type' => 'image/x-icon',
			        'media' => 'all'
			);
			
			echo link_tag($link);
	
			// Echo page specific tags here
			if(isset($css)){
				echo link_tag('css/'.$css);
			}
			
			// Echo the jQuery Hosted library tags
			echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>'
		?>
        </head>
        <body>
			<div class="container">