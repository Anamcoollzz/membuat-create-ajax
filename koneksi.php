<?php 
$_config_db = require('config/database.php');
try {
	$con = new PDO("mysql:host=".$_config_db['host'].";dbname=".$_config_db['db_name'], $_config_db['user'], $_config_db['pass']);
} catch (PDOException $e) {
	echo $e->getMessage();
}