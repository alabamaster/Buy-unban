<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Скрипт разбана игроков">
	<title>Разбан игроков</title>

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

	<!-- My JavaScript -->
	<!--<script src="my_js.js"></script>-->

	<!-- PHP Includes -->
	<?php #require ('func.php');?>
</head>

<body>
	<div class="container">
		<div style="padding-bottom: 60px;"><?php require 'menu.php';?></div>
		<div class="row">
			<div class="col">
				<?php require 'inc/list_bans.php';?>
			</div>
		</div>
	</div>
</body>
</html>