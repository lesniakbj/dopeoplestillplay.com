<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Database_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	
	public function getAllDatabaseTables() {
		// First, we need to know all of the database "schemas"
		// MySQL, I hate you for making me have to do this
		$schemas = $this->getDatabaseSchemas();		
		foreach($schemas AS $name => $prefix) {
			// Get list of tables that belong to that DB prefix
			// ... essentially using the prefix like SQL Server's
			// schema name spaces
			$tables[$name] = $this->getTablesInSchema($prefix);
		}
		
		return $tables;
	}
	
	private function getDatabaseSchemas() {
		// Get the names of the current DB "schemas", which are just
		// table prefixes, from the log table. 
		$this->db->select('schema_name, schema_prefix')
				 ->from('log_table_schemas');
		$queryResults = $this->db->get();	
		$results = $queryResults->result_array();
		
		// With each result, get the schema name and prefix,
		// and pack into an associative array. 
		for($i = 0; $i < count($results); $i++) {
			$schemaName = $results[$i]['schema_name'];
			$schemaPrefix = $results[$i]['schema_prefix'];
			
			$dbSchemas[$schemaName] = $schemaPrefix;
		}		
		return $dbSchemas;
	}
	
	private function getTablesInSchema($shcemaPrefix) {
		// From a view on the information schema, get the base admin tables,
		// filtering on each prefix passed into it.
		$this->db->select('table_name')
		         ->from('v_admin_tables')
			 ->like('table_name', $shcemaPrefix, 'after');
		$queryResults = $this->db->get();
		$tables = $queryResults->result_array();
		
		return $tables;
	}
}