<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Database_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function getAllDatabaseTables() {
		$this->db->select('schema_name, schema_prefix')
				 ->from('log_table_schemas');
		$queryResults = $this->db->get();	
		$results = $queryResults->result_array();
		
		for($i = 0; i < $results.size(); $i++) {
			$schema[$i['schema_name']] = $i['schema_prefix'];
		}
		print_r($schema);
	}
	
	// Queries the database for the API Key associated with
	// a game data provider. Uses this key for retrieving data
	// from various sources. 
	private function getApiKeyFor($dataProvider) {
		$this->db->select('api_key')
				 ->from('game_data_provider')
				 ->where('url_name', $dataProvider)
				 ->where('key_type', 'TESTING');		
		$queryResults = $this->db->get();
		
		if( $queryResults->num_rows() > 0) {
			foreach($queryResults->result_array() as $row) {
				$apiKey = $row['api_key'];
			}
		}
		
		return $apiKey;
	}
}