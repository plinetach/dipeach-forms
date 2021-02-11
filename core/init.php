<?php
session_save_path(getcwd()."/session");
session_start();

?>

<?php
$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => '127.0.0.1',
		'username' => 'admin',
		'password' => 'admin',
		'db' => 'admin_db'
	),
	'mail' => array(
		'username' => '',
		'password' => ''
	)
);

spl_autoload_register('myAutoLoader');

function myAutoLoader($className) {
	
	$url = $_SERVER['REQUEST_URI'];
	//έλεγχος αν είμαι στο root φάκελο αλλιώς ανέβα ένα directory για το path
	
	if (strpos($url, 'admin') == true) {
		$path = '/../classes/';
	}
	else {
		$path = './classes/';
	}
	
	$extension = '.class.php';
	
	require_once $path.$className.$extension;
	
}


require_once "functions/sanitize.php";


