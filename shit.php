<?php
include_once 'inc/database.php';
include_once 'inc/func.php';
require_once 'cfg.php';

$id = abs( ( int ) $_GET['id'] );

$sql = "SELECT * FROM '".$prefix_db."'_bans WHERE bid = :id LIMIT 1";
$params = [ ':id' => $id ];
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Скрипт разбана игроков">
	<title>Игрок - <?=$stmt['player_nick'];?></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
	<div class="container">
		<div style="padding-bottom: 60px;">
		<?php require_once 'menu.php';?></div>
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body" style="font-size: 13px;">
						<!-- -->
						<div class="bd-callout bd-callout-danger">
							<h4 id="cross-browser-compatibility">Купить разбан</h4>

							<p>После оплаты и смены карты на сервере бан будет снят<br>
								Если после этого вас снова забанят, вы не должны предъявлять какие то претензии  типа <i>'я купил разбан да как вы смеете меня банить... и ко-ко-ко'</i>, помните, вы никто :)<br>
								<b>Цена: <?=$price;?> руб.</b>
							</p>
							<form action="pay.php" method="POST">
								<input type="hidden" name="us_ip" value="<?=$stmt['player_ip'];?>">
								<input type="hidden" name="us_steamid" value="<?=$stmt['player_id'];?>">
								<input type="hidden" name="us_nick" value="<?=$stmt['player_nick'];?>">
								<input type="hidden" name="us_bid" value="<?=$stmt['bid'];?>">
								<input style="max-width: 400px;" class="btn btn-lg btn-block btn-info" type="submit" value="Оплатить" name="submit">
							</form>
						</div>
						<!-- -->

						<div class="col">
							<div class="row">
								<table style="text-align: left" class="table table-hover table-sm table-bordered table-striped"><tbody>
								<tr><th>IP игрока</th><td><?=$stmt['player_ip'];?></td></tr>
								<tr><th>Steam  игрока</th><td><?=$stmt['player_id'];?></td></tr>
								<tr><th>Ник игрока</th><td><?=$stmt['player_nick'];?></td></tr>
								<tr><th>Админ</th><td><?=$stmt['admin_nick'];?></td></tr>
								<tr><th>Причина</th><td><?=$stmt['ban_reason'];?></td></tr>
								<tr><th>Дата</th><td><?=tm($stmt['ban_created']);?></td></tr>
								<tr><th>Срок бана</th><td>
									<?php 
										if ( $stmt['ban_length'] == -1 ) {
											echo '<div style="color: #00ad17;">Разбанен</div>';
										} elseif ( $stmt['expired'] == 1 ) {
											echo '<div style="color: #00ad17;">' . $stmt['ban_length'] . ' мин.</div>';
										} elseif ( $stmt['ban_length'] == 0 ) {
											echo '<div style="color: #c50000;">Навсегда</div>';
										} elseif ( ($stmt['ban_created'] + $stmt['ban_length'] * 60) < time() ) {
											echo '<div style="color: #00ad17;">' . $stmt['ban_length'] . ' мин.</div>';
										} else {
											echo $stmt['ban_length'] . ' мин.';
										}
									;?>
								</td></tr>
								<tr><th>Название сервера</th><td><?=$stmt['server_name'];?></td></tr>
								<tr><th>Кики</th><td><?=$stmt['ban_kicks'];?></td></tr>
								</tbody></table>

								<!-- povtor start -->
								<h5>История банов</h5>
								<table class="table table-sm table-bordered"><thead>
								<tr><th>Ник игрока</th><th>Steam  игрока</th><th>IP игрока</th><th>Дата</th><th>Причина</th><th>Срок бана</th></tr>
								</thead><tbody>
								<?php 
									$query = $pdo->query("SELECT * FROM '".$prefix_db."'_bans WHERE player_id = '".$player['player_id']."' OR player_ip = '".$player['player_ip']."'");
									$count = $query->rowCount();
									if ( $count > 1 ) {
										while ( $row = $query->fetch(PDO::FETCH_ASSOC) ) { ?>
											<tr>
											<td><?=$row['player_nick']?></td>
											<td><?=$row['player_id']?></td>
											<td><?=$row['player_ip']?></td>
											<td><?=tm($row['ban_created'])?></td>
											<td><?=$row['ban_reason']?></td>
											<td>
												<?php 
													if ( $row['ban_length'] == -1 ) {
														echo '<div style="color: #00ad17;">Разбанен</div>';
													} elseif ( $row['expired'] == 1 ) {
														echo '<div style="color: #00ad17;">' . $row['ban_length'] . ' мин.</div>';
													} elseif ( $row['ban_length'] == 0 ) {
														echo '<div style="color: #c50000;">Навсегда</div>';
													} elseif ( ($row['ban_created'] + $row['ban_length'] * 60) < time() ) {
														echo '<div style="color: #00ad17;">' . $row['ban_length'] . ' мин.</div>';
													} else {
														echo $row['ban_length'] . ' мин.';
													}
												;?>
											</td>
											</tr>
										<?php }
									}
								;?>
								</tbody></table>
								<!-- povtor end -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>