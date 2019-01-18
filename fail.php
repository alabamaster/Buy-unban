<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<title>Покупка привилегий онлайн</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="https://use.fontawesome.com/64ff6e1601.css">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Arimo" rel="stylesheet">

	<!-- My CSS -->
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="container" style="max-width: 600px;">
		<div class="content">
			<div class="faicon_fail">
				<h4 class="text-center" style="margin-top: -35px;">Оплата прошла неудачно :(</h3>
			</div>
			<hr>
			<div class="col-sm-12" style="font-size: 15px;">	
				Обратитесь к администрации, отправив номер заказа<br>
				<?php 
				if ($_REQUEST['MERCHANT_ORDER_ID'] == true) {
					echo 'Номер заказа: <b>' . $_REQUEST['MERCHANT_ORDER_ID'] . '</b>';
				} else {
					echo 'Номер заказа не найден!';
				}
				?>
			</div>
		</div>
	</div>
</body>
</html>