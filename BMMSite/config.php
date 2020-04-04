<?php
/*  This code  written for the connetc with data Base
(user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'webdatabase');
 
/* THIS is for the check mysql connect */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection write or wrong
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
	echo('Cant Enter');
}

		

?>