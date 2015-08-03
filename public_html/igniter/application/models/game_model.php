<?php
class Game_model extends CI_Model {
	var $gameTitle   = ''; 				// SteamSpy - Name, Steam - Title, 
	var $appId = ''; 					// SteamSpy - appid, Steam - appid
	var $description = ''; 				// 
	
    var $totalOwners = ''; 				// SteamSpy - owners
	
	var $averageRecentPlayercount = '';
	var $averageRecentPlaytime = '';
	
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
}
/*
	URL = steamspy.com/api.php?request=all
	
	Important Data from SteamSpy:
		- Appid / Game Name (name, appid)
		- Owners of the Game (owners)
		- Average 2 weeks Players Count = Average Recent Playercount (players_2weeks)
		- Average 2 Weeks Playtime = Average Recent Playtime (average_2weeks)
		- Median 2 Weeks Playtime = Median Recent Playtime (median_2weeks)
		
		"570": {	
			"appid":570,
			"name":"Dota 2",
			"owners":54048858,
			"players_2weeks":8670085,
			"average_2weeks":1360,
			"median_2weeks":745
		}
*/