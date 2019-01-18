<?php
require_once ('database.php');
require_once ('func.php');
require_once ('cfg.php');
require_once 'pagination.php';

# флаги стран
require_once ('inc/gip/geoip.inc');
$gi = geoip_open('inc/gip/GeoIP.dat', GEOIP_STANDARD );?>
<div class="card">
	<div class="card-body" style="font-size: 13px;">
		<table class="table table-hover table-sm table-bordered table-striped">
			<thead>
				<tr>
					<th>Ник</th>
					<th>Причина</th>
					<th>Ник админа</th>
					<th>Дата</th>
					<th>Срок</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$count = $res->rowCount();
				if ($count > 0) {
					while ( $row = $res->fetch(PDO::FETCH_ASSOC) ) { ?>
					<tr>
						<td style="padding:8px;"><?php echo '<img src="flags/'.( ( !geoip_country_code_by_addr( $gi, $row['player_ip'] ) ) ? ( 'clear' ) : ( strtolower( geoip_country_code_by_addr( $gi, $row['player_ip'] ) ) ) ).'.png" title="'.(( !geoip_country_name_by_addr( $gi, $row['player_ip'] ) ) ? ( 'Unknown' ) : ( strtolower( geoip_country_name_by_addr( $gi, $row['player_ip'] ) ) ) ).'" />';?> <a href="<?=$url;?>shit.php?id=<?=$row['bid'];?>"><?=$row['player_nick'];?></a></td>
						<td style="padding:8px;"><?=$row['ban_reason']?></td>
						<td style="padding:8px;"><?=$row['admin_nick'];?></td>
						<td style="padding:8px;"><?=tm($row['ban_created']);?></td>
						<td style="padding:8px;">
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
						<?php
					}
				} else {
					echo '<div class="alert alert-danger">Банлист пуст!</div>';
				}
				?>
			</tbody>
		</table>
		<nav>
  <ul class="pagination pagination-sm">
    <?php if($curpage != $startpage){ ?>
    <li class="page-item">
      <a class="page-link" style="font-size: 12px;" href="?page=<?php echo $startpage ?>" tabindex="-1"">
        <span>&laquo;</span>
        <span>Первая</span>
        </a>
    </li>
    <?php } ?>

    <?php if($curpage >= 2){ ?>
    <li class="page-item">
      <a class="page-link" style="font-size: 12px;" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a>
    </li>

    <?php } ?>
    <li class="page-item">
     <a class="page-link" style="font-size: 12px;background-color: #2d33493d;" href="?page=<?php echo $curpage ?>"><?php echo $curpage ?></a>
    </li>

    <?php if($curpage != $endpage){ ?>
    <li class="page-item">
      <a class="page-link" style="font-size: 12px;" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a>
    </li>

    <li class="page-item">
    <a class="page-link" style="font-size: 12px;" href="?page=<?php echo $endpage ?>">
      <span>&raquo;</span>
      <span>Последняя</span>
    </a>
    </li>
    <?php } ?>
  </ul>
</nav>
	</div>
</div>