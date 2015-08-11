<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Database_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function getAllDatabaseTables() {
		$schemas = $this->getDatabaseSchemas();		
		foreach($schemas AS $name => $prefix) {
			// Get list of tables that belong to that DB prefix
			$tables['prefix'] = $prefix;
			$tables[$name] = $this->getTablesInSchema($prefix);
		}
		
		echo '<pre>';
		print_r($tables);
		echo '</pre>';
		return $tables;
	}
	
	private function getDatabaseSchemas() {
		$this->db->select('schema_name, schema_prefix')
				 ->from('log_table_schemas');
		$queryResults = $this->db->get();	
		$results = $queryResults->result_array();
		
		for($i = 0; $i < count($results); $i++) {
			$schemaName = $results[$i]['schema_name'];
			$schemaPrefix = $results[$i]['schema_prefix'];
			
			$dbSchemas[$schemaName] = $schemaPrefix;
		}		
		return $dbSchemas;
	}
	
	private function getTablesInSchema($shcemaPrefix) {
		$this->db->select('table_name')
		         ->from('information_schema.tables')
				 ->where('table_type = "Base Table"')
			     ->where('1 NOT IN (SELECT table_name FROM admin_db_table_exclusions)')
			     ->like('table_name', $shcemaPrefix, 'after');
		$queryResults = $this->db->get();
		$tables = $queryResults->result_array();
		
		return $tables;
	}
}