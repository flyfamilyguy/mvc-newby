<?php
/**
 * Class.controller.php
 * This script creates an object of the Controller class
 */
class Controller {
	
	protected $controller;
	
	public function __construct($controller) {
		
		$this->controller = $controller;
	}
	
	public function getController() {
		
		if (!file_exists($this->controller) {
			
			return "Error:<br>Failed to parse requested file:<br>($this->controller)"; // absolute path to directory!
		}
		
		$getcontroller = include_once $this->controller;
		
		return $getcontroller;
	}
}