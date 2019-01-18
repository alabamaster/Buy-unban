<?php 
require_once 'database.php';

$time = time();

function tm($time=NULL){ 
	if ($time == NULL)$time = time(); 
	$timep="".date("j/M/Y", $time)."";    
	$time_p[0]=date("j/n/Y", $time);  
	$time_p[1]=date("H:i", $time); 
	if ($time_p[0] == date("j n Y"))$timep = date("H:i", $time); 
	if ($time_p[0] == date("j n Y", time()-60*60*24))$timep = "$time_p[1]";    
	$timep=str_replace("Jan","01",$timep); 
	$timep=str_replace("Feb","02",$timep); 
	$timep=str_replace("Mar","03",$timep); 
	$timep=str_replace("May","04",$timep); 
	$timep=str_replace("Apr","05",$timep); 
	$timep=str_replace("Jun","06",$timep); 
	$timep=str_replace("Jul","07",$timep); 
	$timep=str_replace("Aug","08",$timep); 
	$timep=str_replace("Sep","09",$timep); 
	$timep=str_replace("Oct","10",$timep); 
	$timep=str_replace("Nov","11",$timep); 
	$timep=str_replace("Dec","12",$timep); 
	return $timep; 
}

function fch($sql, $params = array()) {
	global $pdo;
	$stmt = $pdo -> prepare($sql);
	$stmt -> execute($params);
	$stmt = $stmt->fetch();
	return $stmt;
}

function acc($sql, $params = array()) {
	global $pdo;
	$stmt = $pdo -> prepare($sql);
	$stmt -> execute($params);
	$stmt = $stmt->FetchAll(PDO::FETCH_ASSOC);
	return $stmt;
}