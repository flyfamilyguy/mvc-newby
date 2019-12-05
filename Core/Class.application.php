<?php
/**
 * Class.application.php
 * This script defines global variables and starts an instance of a users session.
 */
class Application {
	
	private static function run() {
		
		self::init();
	}
	
	public static function init() {
		
		// define applications root directory
		define ('ROOT', getcwd() . '\\'); // for windows development [\] Linux [/]
		define ('CORE', ROOT . 'Core\\'); // \Core\
		define ('CONFIG', ROOT . 'Configs\\'); // \Configs\
		define ('CNTRL', ROOT . 'Controllers\\'); // \Controllers\
		define ('MODEL', ROOT . 'Models\\'); // \Models\
		define ('VIEW', ROOT . 'Views\\'); // \Views\
		define ('SCRIPT', '.php'); //  file extension of our main file category
		
		// instantiate our Template class
		require 'Class.template' . SCRIPT;
		// instantiate our View class
		require 'Class.view' . SCRIPT;
		// instantiate our Controller class
		require 'Class.controller' . SCRIPT;
		
		// call controller to perform initial GET methods
		require CNTRL . 'controller' . SCRIPT
	}
}