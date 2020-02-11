<?php

require 'vendor/autoload.php';
require 'environment.php';

$config = array();
if(ENVIRONMENT == 'development') {
	// Offline - Localhost
	define("BASE_URL", "http://stackpower.local/");
	$config['dbname'] = 'bd_nuite';
	$config['host']   = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	// Caso esteja no Servidor Online
	define("BASE_URL", "http://sarcsegurancapresente.com/nuinth/");
	$config['dbname'] = 'bd_nuite';
	$config['host'] = 'localhost:3306';
	$config['dbuser'] = 'sddias';
	$config['dbpass'] = '*clny1109';
}

global $db;
try {
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo "ERRO: ".$e->getMessage();
	exit;
}