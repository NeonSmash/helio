<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'helio_usr');
define('DB_PASSWORD', '5Zdq3CosH6uB78Wj');
define('DB_NAME', 'helio');
 
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($mysqli === false){
    die("Hiba: Nem lehet csatlakozni. " . $mysqli->connect_error);
}
?>