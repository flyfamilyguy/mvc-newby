<?php
/**
 * controller.php
 * This script performs a check [GET] method
 * to retrieve the ?target= parameters
 * found within the URL, then directs the browser
 * to the appropriate controller.
 */
// clear variables
$target = "";
if (!isset($_GET['target'])) {
	
	$target = "home"; // if no URL parameters found.
}
else
{
	$target = htmlspecialchars($_GET['target']); // if URL parameters found, stores it in $target variable.
}

// direct to appropriate controller.
require CNTRL . $target . SCRIPT;
