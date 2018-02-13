<?php
if(file_exists("img/avatar.png")) {
	$avatar = "img/avatar.png";
} else {
	$avatar = "http://i.imgur.com/pxrtoaD.png";
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Holo Protector - <?=$page['name']?></title>

<link href="css/bootstrap/bootstrap.min.css" rel="stylesheet"/>
 
 
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/libs/nanoscroller.css" type="text/css"/>
 
<link rel="stylesheet" type="text/css" href="css/compiled/layout.css">
<link rel="stylesheet" type="text/css" href="css/compiled/elements.css">
 
<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
 
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300%7CTitillium+Web:200,300,400' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->
 <style>
 .form-space {
	 margin-bottom:3px;
 }
 </style>
</head>
<body class="theme-red">
<header class="navbar" id="header-navbar">
<div class="container">
<a href="index.php" style="padding-top:16px;" class="navbar-brand">
Holo Protector
</a>
<div class="clearfix">
<button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
<span class="sr-only">Navegacion toggle</span>
<span class="fa fa-bars"></span>
</button>
<div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
<ul class="nav navbar-nav pull-left">
<li>
<a class="btn" id="make-small-nav">
<i class="fa fa-bars"></i>
</a>
</li>
</ul>
</div>
<div class="nav-no-collapse pull-right" id="header-nav">
<ul class="nav navbar-nav pull-right">
<li class="dropdown hidden-xs">
<a class="btn dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-warning"></i>
<span class="count"><?=count($notify)?></span>
</a>
<ul class="dropdown-menu notifications-list">
<li class="pointer">
<div class="pointer-inner">
<div class="arrow"></div>
</div>
</li>
<li class="item-header">Notificaciones</li>
<?php 
get_notifications($notify);
?>
<!--<li class="item-footer">
<a href="#">
Update
</a>
</li>
-->
</ul>
</li>
<li class="dropdown profile-dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<img src="<?=$avatar?>" alt=""/>
<span class="hidden-xs"><?=$_SESSION['username']?></span> <b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li><a href="?logout"><i class="fa fa-power-off"></i>Cerrar sesion</a></li>
</ul>
</li>
<li class="hidden-xxs">
<a href="?logout" class="btn">
<i class="fa fa-power-off"></i>
</a>
</li>
</ul>
</div>
</div>
</div>
</header>
<div id="page-wrapper" class="container">
<div class="row">
<div id="nav-col">
<section id="col-left" class="col-left-nano">
<div id="col-left-inner" class="col-left-nano-content">
<div id="user-left-box" class="clearfix hidden-sm hidden-xs">
<img alt="" src="<?=$avatar?>"/>
<div class="user-box">
<span class="name">
Bienvenido<br/>
<?=$_SESSION['username']?>
</span>
<span class="status">
<i class="fa fa-circle"></i> Online
</span>
</div>
</div>
<div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
<ul class="nav nav-pills nav-stacked">
<li class="<?=$active['dashboard']?>">
<a href="index.php">
<i class="fa fa-dashboard"></i>
<span>Panel de Control</span>
</a>
</li>
<li class="<?=$active['storage']?>">
<a href="storage.php">
<i class="fa fa-cloud"></i> 
<span>Almacenamiento</span>
</a>
</li>
<li class="<?=$active['security']?>">
<a href="#" class="dropdown-toggle">
<i class="fa fa-lock"></i> 
<span>Seguridad</span>
<i class="fa fa-chevron-circle-right drop-icon"></i>
</a>
<ul class="submenu">
<li> <a href="scan.php"> Escaneo </a> </li>
<li> <a href="password.php"> Generador de claves  </a> </li>
<li> <a href="hasher.php"> Generador de Hash  </a> </li>
<li> <a href="ddos-guard.php"> DDoS Guard </a> </li>
<li> <a href="bot-guard.php"> Bot Guard </a> </li>
</ul>
</li>
<li class="<?=$active['server']?>">
<a href="#" class="dropdown-toggle">
<i class="fa fa-database"></i>
<span>Servidor</span>
<i class="fa fa-chevron-circle-right drop-icon"></i>
</a>
<ul class="submenu">
<li> <a href="server.php"> Estadisitcas </a> </li>
<li> <a href="htaccess.php"> .Htaccess </a> </li>
</ul>
</li>
<li class="<?=$active['settings']?>">
<a href="settings.php">
<i class="fa fa-cog"></i> 
<span>Ajustes</span>
</a>
</li>
</ul>
</div>
</div>
</section>
</div>
<div id="content-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="row">
<div class="col-lg-12">
<ol class="breadcrumb">
<li><a href="#">Inicio</a></li>
<li class="active"><span><?=$page['name']?></span></li>
</ol>
<h1><?=$page['name']?></h1>
</div>
</div>