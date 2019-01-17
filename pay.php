<?php 
	require_once "cfg.php";
	require_once "inc/func.php";
	require_once "inc/database.php";

	$data = $_POST;
/*
	$sql = "UPDATE amx_bans SET ban_length = '-1' WHERE bid = ".$data['us_bid']."";
	$params = [ ':bid' => $data['us_bid'] ];
	$stmt = $pdo->prepare($sql);
	$stmt->execute($params);
*/	
	echo '
	<html> 
	<head>
		<title>Переадресация на сайт платёжной системы...</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta http-equiv="Content-Language" content="ru">
		<meta http-equiv="Pragma" content="no-cache">
		<meta name="robots" content="noindex,nofollow">
	</head>
	<body onload="setTimeout(function() { document.form1337.submit() }, 1000)">';
	$sign = md5($merchant_id.':'.$price.':'.$secret_word1.':'.$data['us_bid']);
	echo '<center><h3>Переадресация на сайт платёжной системы...</h3></center><br>
	<form method="GET" action="http://www.free-kassa.ru/merchant/cash.php" name="form1337">
		<input type="hidden" name="s" value="'.$sign.'">
        <input type="hidden" name="o" value="'.$data['us_bid'].'">
        <input type="hidden" name="m" value="'.$merchant_id.'">
		<input type="hidden" name="oa" value="'.$price.'">
		<input type="hidden" name="us_ip" value="'.$data['us_ip'].'">
		<input type="hidden" name="us_steamid" value="'.$data['us_steamid'].'">
		<input type="hidden" name="us_nick" value="'.$data['us_nick'].'">
		<input type="hidden" name="us_bid" value="'.$data['us_bid'].'">
	</form>';
	echo '</body></html>';
?>