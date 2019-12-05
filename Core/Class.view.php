<?php
/**
 * Class.view.php
 * This script defines and creates the object View class.
 */
class View {
	
	protected $view;
	
	public function __construct($view) {
		
		$this->view = $view;
	}
	
	public function getView() {
		
		if (!file_exists($this->view) {
			
			return "Error<br>Failed to parse requested file:<br>($this->view)"; // full path to Views directory!
		}
		
		// display the page
		$getview = include_once $this->view;
		
		return $getview;
	}
}