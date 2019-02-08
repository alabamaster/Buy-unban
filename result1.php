<?php 
	require_once ('cfg.php');
	require_once ('inc/database.php');
	require_once ('inc/func.php');

	$sign = md5($merchant_id.':'.$_REQUEST['AMOUNT'].':'.$secret_word2.':'.$_REQUEST['MERCHANT_ORDER_ID']);
	if ($sign != $_REQUEST['SIGN']) {
		die('wrong sign'); // Неправильная подпись
	}

	$player_ip = $_REQUEST['us_ip']; // nickname -__-
	$player_id = $_REQUEST['us_steamid']; // password -__-
	$player_nick = $_REQUEST['us_nick']; // дни
	$ban_id = $_REQUEST['us_bid']; // флаги доступа
	$m_cost = $_REQUEST['AMOUNT']; // цена
	$m_id = $_REQUEST['MERCHANT_ORDER_ID']; // ид заказа в магазине// он же ид админа

	if ( $price != $m_cost ) {
		echo 'Неверная сумма!';
	} else {
		echo "OK$m_id\n";
	}
	
	$sql = "UPDATE '".$prefix_db."'_bans SET ban_length = '-1' WHERE bid = :bid";
	$params = [ ':bid' => $ban_id ];
	$stmt = $pdo->prepare($sql);
	$stmt->execute($params);
?>