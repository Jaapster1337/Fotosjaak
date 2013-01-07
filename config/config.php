<?php
$database = 0;

switch ($database)
{
	case 0:
		define('SERVERNAME', 'localhost');
		define('USERNAME', 'root');
		define('PASSWORD', '');
		define('DATABASE', 'fotosjaak');
		date_default_timezone_set("Europe/Amsterdam");
		break;
	case 1:
		break;
	case 2:
		break;
	default:
		break;
}
?>