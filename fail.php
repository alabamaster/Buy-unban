<?php 
require_once ('inc/database.php');
require_once ('inc/func.php');
require_once ('cfg.php');
require_once ('inc/pagination.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Скрипт разбана игроков">
	<title>Произошла ошибка!</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/64ff6e1601.css">
	<link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="container">
		<div style="padding-bottom: 60px;"><?php require_once ('menu.php');?></div>
		<div class="row">
			<div class="col">
				<?php
				require_once ('inc/gip/geoip.inc');
				$gi = geoip_open('inc/gip/GeoIP.dat', GEOIP_STANDARD );?>
				<div class="card">
					<div class="card-body" style="font-size: 13px;">
						<div class="alert alert-danger" role="alert">
							<h5>Произошла ошибка!</h5>
							Свяжитесь с администрацией!<br>
							Номер счета: <?=$_REQUEST['MERCHANT_ORDER_ID'];?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>