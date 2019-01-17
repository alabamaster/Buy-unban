<?php
require_once 'inc/database.php';
require_once 'inc/func.php';
require_once 'cfg.php';
require_once 'inc/gip/geoip.inc';

$gi = geoip_open('inc/gip/GeoIP.dat', GEOIP_STANDARD );

$search = trim($_GET['search']);

if ( !empty($search) ) {
	$query = $pdo->query("SELECT * FROM amx_bans WHERE player_nick LIKE '%$search%' OR player_id LIKE '%$search%' OR player_ip LIKE '%$search%' ORDER BY bid ASC");
}

$tot = $query->rowCount();
if( $tot > 0 ){ ?>
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
</head>

<body>
	<div class="container">
		<div style="padding-bottom: 60px;"><?php require_once 'menu.php';?></div>
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body" style="font-size: 13px;">
						<table class="table table-hover table-sm table-bordered table-striped">
							<thead>
								<tr>
									<th>Ник</th>
									<th>Сервер</th>
									<th>Ник админа</th>
									<th>Дата</th>
									<th>Срок</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								while ( $row = $query->fetch(PDO::FETCH_ASSOC) ) { ?>
									<tr>
										<td><?php echo '<img src="flags/'.( ( !geoip_country_code_by_addr( $gi, $row['player_ip'] ) ) ? ( 'clear' ) : ( strtolower( geoip_country_code_by_addr( $gi, $row['player_ip'] ) ) ) ).'.png" title="'.(( !geoip_country_name_by_addr( $gi, $row['player_ip'] ) ) ? ( 'Unknown' ) : ( strtolower( geoip_country_name_by_addr( $gi, $row['player_ip'] ) ) ) ).'" />';?> <a href="<?=$url;?>shit.php?id=<?=$row['bid'];?>"><?=$row['player_nick'];?></a></td>
										<td><?=$row['server_name'];?></td>
										<td><?=$row['admin_nick'];?></td>
										<td><?=tm($row['ban_created']);?></td>
										<td>
											<?php 
												if ( $row['ban_length'] == -1 ) {
													echo '<div style="color: #00ad17;">Разбанен</div>';
												} elseif ( $row['expired'] == 1 ) {
													echo '<div style="color: #00ad17;">' . $row['ban_length'] . ' мин.</div>';
												} elseif ( $row['ban_length'] == 0 ) {
													echo '<div style="color: #c50000;">Навсегда</div>';
												} else {
													echo $row['ban_length'] . ' мин.';
												}
											;?>
										</td>
									</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<?php } ?>