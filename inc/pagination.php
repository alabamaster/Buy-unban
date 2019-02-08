<?php 
require_once 'cfg.php';
require_once 'database.php';

//$perpage = '10'; # pagination// to cfg
if(isset($_GET['page']) & !empty($_GET['page']))
{
  $curpage = intval($_GET['page']);
} else
{
  $curpage = 1;
}

$pageres = $pdo->query("SELECT COUNT(*) AS count FROM '".$prefix_db."'_bans");
$result = $pageres->fetch(PDO::FETCH_ASSOC);
$count = $result['count'];

$endpage = max(ceil($count/$perpage), 1);

if($curpage > $endpage) {
  $curpage = $endpage;
}

$start = ($curpage - 1) * $perpage;

$startpage = 1;
$nextpage = $curpage + 1;
$previouspage = $curpage - 1;

$ReadSql = "SELECT * FROM '".$prefix_db."'_bans ORDER BY bid DESC LIMIT $start, $perpage";
$res = $pdo->query($ReadSql);
?>