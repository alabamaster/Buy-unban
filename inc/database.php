<?php

# ошибки php
# 0 - off | 1 - on
ini_set('display_errors', 1);
error_reporting(E_ALL);

// database
$driver = 'mysql';
$host = '127.0.0.1'; // host
$db_name = 'csbans'; // name
$db_user = ''; // user
$db_pass = ''; // password
$charset = 'latin1'; // or utf8
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
	$pdo = new PDO( "$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass, $options );
} catch(PDOException $e) {
	die('Не могу подключиться к базе данных database.php');
}
