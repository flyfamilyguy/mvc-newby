<?php
/**
 * Class.model.php
 * This script creates an object of Model class.
 * The Model class connects to, communicates with,
 * stores and retrieves data from the MYSQL database.
 */
class Model {
	
	protected $model;
	
	public function __construct($model) {
		
		$this->model = $model;
	}
	
	public function getModel() {
		
		if (!file_exists($this->model) {
			
			return "Error:<br>Failed to parse the requested file:<br>($this->model)"; // absolute path to directory!
		}
		
		$getmodel = include_once $this->model;
		
		return $getmodel;
	}
}