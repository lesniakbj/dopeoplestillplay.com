<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
|	DATA-NOTES:
|		STEAM SPY:
|			URL = steamspy.com/api.php?request=all
|		
|			Important Data from SteamSpy:
|				- Appid / Game Name (name, appid)
|				- Owners of the Game (owners)
|				- Average 2 weeks Players Count = Average Recent Playercount (players_2weeks)
|				- Average 2 Weeks Playtime = Average Recent Playtime (average_2weeks)
|				- Median 2 Weeks Playtime = Median Recent Playtime (median_2weeks)
|				- Concurrent Users = lastConcurrentUsers (ccu)
|			
|				"570": {	
|					"appid":570,
|					"name":"Dota 2",
|					"owners":54048858,
|					"players_2weeks":8670085,
|					"average_2weeks":1360,
|					"median_2weeks":745
					"ccu":292
|				}
*/
class Gamedata_model extends CI_Model {
	// Table: game_data_feeds_steam
	var $gameTitle   				= '';	// SteamSpy - Name, Steam - Title, 
	var $appId 						= ''; 	// SteamSpy - appid, Steam - appid
	var $description 				= ''; 	// Steam (most likely)
	
	// Table: game_stats | game_data_feeds_steamspy
	var $totalOwners 				= '';	// SteamSpy - owners
	var $averageRecentPlayercount 	= '';	// SteamSpy - players_2weeks
	var $averageRecentPlaytime 		= '';	// SteamSpy - average_2weeks
	var $mediaRecentPlaytime 		= '';	// SteamSpy - median_2weeks
	var $lastConcurrentUsers 		= '';	// SteamSpy - ccu
	
	// Table: game_data_feeds_videogameinformation
	var $websitesScraped			= '';	// Video Game Information - websites
	var $gameGenres					= '';	// Video Game Information - genres
	var $gameDeveloper				= '';	// Video Game Information - developer
	var $gamePlatforms				= '';	// Video Game Information - availablePlatform
	var $gamePublisher				= '';	// Video Game Information - publisher
	var $gameReviewScore			= '';	// Video Game Information - averageScore
	var $gameName					= '';	// Video Game Information - name
	var $gameRating					= ''; 	// Video Game Information - rating
	var $ratingReason				= ''; 	// Video Game Information - reasonForRating
	var $gameThumbnailUrl			= '';	// Video Game Information - thumbnail
	var $gameReleaseDate			= '';	// Video Game Information - rlsdate
	
	public function __construct() {
		parent::__construct();
		$this->load->database();
		
		require_once '/home/dopelsha/public_html/libs/unirest/src/Unirest.php';
	}
	
	public function getGameInformation($dataProvider) {
		switch($dataProvider) {
			case 'gameinformation':
				// TODO: Grab all exisiting games, and update their descriptions based on title
				// for now, doing a sample scrape of a game.
				// TODO: Grab API keys from the database game_data_provider based on $dataProvider
				// TODO: Change the request string to inclued the parameters from somewhere else
				$apiKey = $this->getApiKeyFor($dataProvider);
				var_dump($apiKey);
				$response = Unirest\Request::get("https://ahmedakhan-game-review-information-v1.p.mashape.com/api/v1/information?console=xbox+360&game_name=call+of+duty+black+ops",
					array(
						"X-Mashape-Key" => "bkGYyf0bIEmshUzOP5tc8HqEByPzp1EFgDhjsngSuYPIRFqHus",
						"Accept" => "application/json"
					)
				);
				
				var_dump($response);
				break;
			
			default:
				print_r($dataProvider);
				break;
		}
		
	}
	
	private function getApiKeyFor($dataProvider) {
		$this->db->select('api_key')
				 ->from('game_data_provider')
				 ->where('url_name = '.$dataProvider);
		
		$queryResults = $this->db->get();
		if( $queryResults->num_rows() > 0) {
			return $queryResults->results();
		}
	}
	
	public function selectAllGameData($orderByString) {
		if(! isset($orderBy)) {
			$orderByString = 'title DESC';
		}
		
		// Setup and run the query, results get put into $queryResults
		$this->db->from('game_game')
			 ->order_by($orderByString);
		
		$queryResults = $this->db->query();
		
		if( $queryResults->num_rows() > 0) {
			return $queryResults->results();
		}
		
		return "Query Failed - No game data!";
	}
	
	public function insertNewGameData() { 
		// Set the POST/GET data to the class variables
		// then use that model to insert to the DB (db->insert())
	}
}
