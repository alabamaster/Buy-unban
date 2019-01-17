<?php require_once 'cfg.php';?>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">HERE BUY UNBAN <i class="fa fa-user-times" aria-hidden="true"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?=$url;?>">Список банов <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Пункт 2</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Пункт 3</a>
      </li>
    </ul>
  </div>
  <form method="GET" action="<?=$url;?>search.php" class="form-inline my-2 my-lg-0" style="padding-right: 20px;">
      <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="SteamID, Nickname, IP" id="search" name="search" value="" required="" aria-label="Search" autocomplete="off" size="25" maxlength="25" minlength="4">
      <button class="btn btn-sm btn-secondary my-2 my-sm-0" type="submit">Найти</button>
    </form>
  <div class="menu">
  <a class="navbar-brand text-right" href="#" target="_blank">
    <i class="fa fa-vk" aria-hidden="true"></i>
  </a>
  <a class="navbar-brand text-right" href="#"  target="_blank">
    <i class="fa fa-steam" aria-hidden="true"></i>
  </a>
  <a class="navbar-brand text-right" href="#"  target="_blank">
    <i class="fa fa-youtube-play" aria-hidden="true"></i>
  </a>
  <a class="navbar-brand text-right" href="#"  target="_blank">
    <i class="fa fa-twitch" aria-hidden="true"></i>
  </a>
  </div>
</nav>