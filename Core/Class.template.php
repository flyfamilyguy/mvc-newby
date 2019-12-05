<?php
/**
 * Class.template.php
 * This script defines and creates a template object
 */
class Template {
	
	protected $file;
	protected $values = array();
	
	// instantiate template object
	public function __construct($file) {
		
		$this->file = $file;
	}
	
	// define and set variables that will hold then be replaced with data
	public function set($key, $value) {
		
		$this->$values[$key] = $value;
	}
	
	// output results to the browser
	public function output() {
		
		/**
		 * This method should not be used in a
		 * production environement. In the case
		 * of a requested template not existing
		 * on a server, The complete path to our
		 * templates directory is displayed in the 
		 * browser. Not Good! I use this for debugging
		 * purposes only.
		 */
		 if (!file_exists($this->file) {
			 
			 return "Error:<br>Failed to parse requested file:<br>($this->file)"; // path to template directory!
		 }
		 
		 // Get the template to display
		 $output = file_get_contents($this->file);
		 
		 // define the tags that will be replaced with values
		 foreach ($this->values as $key => $value) {
			 
			 // Variable that defines the tags
			 $tagToReplace = "[$key]" // the tag '[$key = TAGS NAME]' PHP will look for.
			 // once found, replaces tag with given values
			 $output = str_replace ($tagToReplace, $value, $output);
		 }
		 
		 return $output;
	}
}