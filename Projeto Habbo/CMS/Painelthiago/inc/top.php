<?php
require_once('./data_classes/server-data.php_data_classes-core.php.php');
require_once('./data_classes/server-data.php_data_classes-session.php.php');
// COLOCA ESSAS 5 linhas abaixo para não dar erro (SEMPRE NO TOPO DA PÁGINA)
$maintenance2 = mysql_num_rows(mysql_query("SELECT * FROM cms_settings WHERE mantenimiento = '1'"));
$useradmin2 = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'");
$useradmin = mysql_fetch_array($useradmin2);
$palavrasbloqueadas=file_get_contents('Externos/PalavrasBloqueadas.txt');
	
if($_GET['excluircomment']!="")
{
mysql_query("DELETE FROM cms_comment WHERE id='" . $_GET['excluircomment'] . "'") or die(mysql_error()); 
mysql_query("DELETE FROM cms_likes_comments WHERE id_comment='" . $_GET['excluircomment'] . "'") or die(mysql_error()); 
} 
	
// INSERE O QUE FOR NECESSÁRIO AO POSTAR ... (NÃO ALTERE ISSO POIS FOI FEITO PARA EVITAR BURLAGENS E FOI UNICO JEITO QUE FUNCIONOU!!!!!!!!)

if(isset($_POST['comment']))
{
	$valor = $_POST['rank'];
$nome = $_SESSION['username'];;
	$conteudo = HoloText($_POST['comment']);
	
	if(eregi(HoloText($_POST['comment']), $palavrasbloqueadas) == true){
		echo"<script>alert('Você digitou uma palavra bloqueada em nosso servidor.')</script>";
	}else{
		
mysql_query("INSERT INTO cms_comment (nome,comentario,id_news,titulo_noticia,type)
			VALUES ('". $nome ."','". $conteudo ."','" . $_GET['id_post'] . "','POSTAGEM','post')") or die(mysql_error());
			
			$postsaasdSQL= mysql_query("SELECT * FROM cms_posts WHERE id='" . $_GET['id_post'] . "'");
			$postsaasd = mysql_fetch_array($postsaasdSQL);
mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $useradmin['id'] . "','" . $postsaasd['nome'] . "','postagem?id=" . $_GET['id_post'] . "','" . time() . "','Comentou na sua publicação')");
			header("Location: principal");
}
}

// INSERE O QUE FOR NECESSÁRIO AO CURTIR UM COMENTÁRIO ... (NÃO ALTERE ISSO POIS FOI FEITO PARA EVITAR BURLAGENS E FOI UNICO JEITO QUE FUNCIONOU!!!!!!!!)
	if($_GET['likecomment']!="")
{
	$iiiii = mysql_query("SELECT * FROM cms_comment WHERE id = '" . $_GET['likecomment'] . "' LIMIT 1");
	$faa22 = mysql_fetch_array($iiiii);
	
	$iiiii2 = mysql_query("SELECT * FROM cms_likes_comments WHERE id_comment = '" . $faa22['id'] . "'");
	$faa2 = mysql_fetch_array($iiiii2);
	
	if($faa2['nome'] != $_SESSION['username']){
mysql_query("INSERT INTO cms_likes_comments (nome,id_comment) VALUES ('" . $_SESSION['username'] . "','" . $faa22['id'] . "')"); 
mysql_query("UPDATE cms_comment SET curtidas=curtidas + 1 WHERE id = '" . $faa22['id'] . "'") or die(mysql_error()); 
mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $useradmin['id'] . "','" . $faa2['nome'] . "','postagem?id=" . $faa22['id_post'] . "','" . time() . "','Curtiu seu comentário')");
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=principal'>";
	}else{
		
	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=principal'>";
	}
	} 
?>
<?php 
// FORMATA A DATA PARA ano x, mes x, etc ... (NÃO ALTERE ISSO POIS FOI FEITO PARA EVITAR BURLAGENS E FOI UNICO JEITO QUE FUNCIONOU!!!!!!!!)
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Brasilia');
function time_elapsed_B($secs){
    $bit = array(
        '  semana'        => $secs / 604800 % 52,
        '  dia'        => $secs / 86400 % 7,
        '  hora'        => $secs / 3600 % 24,
        '  minuto'    => $secs / 60 % 60,
        );
        
    foreach($bit as $k => $v){
        if($v > 1)$ret[] = $v . $k . "'s";
        if($v == 1)$ret[] = $v . $k;
        }
		if($secs / 60 % 60){
    $ret[] = 'atr&aacute;s.';	
		}else{
    $ret[] = 'Agora.';	
		}
    
    return join(' ', $ret);
    }
	?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Painel Habbz - By Thiago Araujo</title>
<link href="css/bootstrap/bootstrap.min.css" rel="stylesheet"/>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/libs/nanoscroller.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="css/compiled/layout.css">
<link rel="stylesheet" type="text/css" href="css/compiled/elements.css">
<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300%7CTitillium+Web:200,300,400' rel='stylesheet' type='text/css'>
 <style>
 .form-space {
	 margin-bottom:3px;
 }
 
 #aviso-cont {
position:relative
}

#aviso-cont, #emblemas {
    width: 61px;
    height: 61px;
}
#emblemas, .aviso {
    -webkit-transition: all .3s ease-in-out;
    -moz-transition: all .3s ease-in-out;
    -ms-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    -webkit-border-radius: 3px;
}
#emblemas {
    margin-right: 5px;
    margin-top: 5px;
    line-height: 60px;
    float: left;
    cursor: default;
    text-align: center;
    background-position: center center;
    background-repeat: no-repeat;
    background-color: rgba(0,0,0,.1);
    border-radius: 3px;
    transition: all .3s ease-in-out;
    -webkit-box-shadow: inset 0 0 0 1px rgba(0,0,0,.1), inset 0 2px 8px 0 rgba(0,0,0,.1);
    box-shadow: inset 0 0 0 1px rgba(0,0,0,.1), inset 0 2px 8px 0 rgba(0,0,0,.1);
}
.aviso {
    line-height: 15px;
    margin: 0 0 40px -16px;
    color: rgba(255,255,255,1);
    font-size: 12px;
    background: rgba(0,0,0,1);
    opacity: 0;
    visibility: hidden;
    position: absolute;
    bottom: 5px;
    left: 50%;
    z-index: 99;
    transition: all .3s ease-in-out;
    border-radius: 3px;
}
.aviso-dentro {
    font-family: Verdana;
    font-size: 11px;
    padding: 10px;
    letter-spacing: 0;
    position: relative;
    z-index: 999;
}
.aviso-dentro-seta {
    width: 10px;
    height: 10px;
    bottom: 2px;
    margin-bottom: -5px;
    background: rgba(0,0,0,1);
    position: absolute;
    margin-left: 10px;
    -webkit-transform: rotate(-45deg);
    -moz-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    -o-transform: rotate(-45deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
}

.home-content {  
    border-radius: 6px;
    box-shadow: 0px 0px 20px #888;  
    text-decoration: none;
}

.home-reaction {
    background: rgba(78, 78, 78, 0.59);
    zoom: 1;
    width: 100%;
    height: 40px;
    color: #FFF;
    padding:8px;
    margin-top:-40px;
    border-bottom-right-radius: 6px;
    border-bottom-left-radius: 6px;
    border-bottom: 2px solid rgba(0, 0, 0, 0.15);
}

.home-avatar-fundo {
    margin-top:-30px;
    margin-left: -10px;
    background: url('/rocketinc/extra/alb/img/fundo-home.png');
    background-position-x: -40px;
    background-position-y: -20px;
}

.home-avatar-bg {
    margin-left: 43%;
    border: 3px solid #ffffff;
    overflow: hidden;
    background-color:#363636;
    width:120px;
    height:120px;
    position:relative;
}

h2.title-box{
  font-family: Billabong;
  margin-bottom:10px;
  margin-top:0px;
  text-transform: inherit;
  position:relative;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, .2);
}
 </style>
</head>
<body class="theme-red">
<header class="navbar" id="header-navbar">
<div class="container">
<a href="index.php" style="padding-top:16px;" class="navbar-brand">
Painel Habbz
</a>
<div class="clearfix">
<button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
<span class="sr-only">Alternância de navegação</span>
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
<?php 
$notificacaoSQL=mysql_query("SELECT * FROM notificacao WHERE recebedor = '" . $useradmin['id'] . "'");
$notificacao = mysql_fetch_array($notificacaoSQL);
?>
<div class="nav-no-collapse pull-right" id="header-nav">
<ul class="nav navbar-nav pull-right">
<li class="dropdown hidden-xs">
<a class="btn dropdown-toggle" data-toggle="dropdown">
<i class="fa fa-warning"></i>
<span class="count"><?php $numnotificacao = mysql_num_rows(mysql_query("SELECT * FROM notificacao WHERE recebedor = '" . $useradmin['id'] . "' AND visto='nao'")); ?> <?php echo $numnotificacao; ?></span>
</a>
<ul class="dropdown-menu notifications-list">
<li class="pointer">
<div class="pointer-inner">
<div class="arrow"></div>
</div>
</li>
<li class="item-header">Notificação</li>
<?php 
if ($numnotificacao == 0) {
?>
Nenhuma notifica&ccedil;&atilde;o...
<?php }else{ 
$fSQL=mysql_query("SELECT * FROM notificacao WHERE recebedor = '" . $useradmin['id'] . "' ORDER BY id DESC");
while($f = mysql_fetch_array($fSQL)){			
$query = mysql_query("SELECT * FROM users WHERE id ='". $f['criador'] ."'") or die(mysql_error()); 
$data = mysql_fetch_assoc($query);			
?>
<a class="list-group-item" href="<?php echo $f['url']; ?>" style="text-decoration: none;">
<div class="media">
<div class="media-left" style="padding-right: 0px; display: table-cell; vertical-align: top;">
<div style="background-image: url(http://habbo.com.br/habbo-imaging/avatarimage?figure=<?php echo $data['look']; ?>&amp;size=s&amp;direction=2&amp;head_direction=2&amp;gesture=sml); width:30px; height:35px;">
</div>
</div>
<div class="media-body" style="display: table-cell;
vertical-align: top;
width: 10000px;
overflow: hidden;
zoom: 1;">
<b><h6><?php echo $data['username']; ?>: <?php echo $f['texto']; ?></h6></b>
<h6><?php echo time_elapsed_B(time()-$f['data']); ?></h6>
</div>
</div>
</a>
<?php }} ?>
</ul>
</li>
<li class="dropdown profile-dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<img src="https://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $useradmin['look']; ?>&action=std&direction=2&head_direction=3&img_format=png&gesture=std&headonly=1&size=l" alt=""/>
<span class="hidden-xs"></span> <b class="caret"></b>
</a>
<ul class="dropdown-menu">
<li><a href="/principal"><i class="fa fa-power-off"></i>Sair do Painel</a></li>
</ul>
</li>
<li class="hidden-xxs">
<a href="/principal" class="btn">
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
<img style="margin-left:50px;" src="https://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $useradmin['look']; ?>&action=std&direction=2&head_direction=3&img_format=png&gesture=std&headonly=1&size=l" src=""/>
<div class="user-box">
<span class="name">
Bem-vindo(a)!<br/>
<?=$_SESSION['username']?>
</span>
<span class="status">
<i class="fa fa-circle"></i> Online
</span>
</div>
</div>
<div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
<ul class="nav nav-pills nav-stacked">
<li class="">
<a href="dashboard.php">
<i class="fa fa-dashboard"></i>
<span>Início do Painel</span>
</a>
</li>
<?php if($useradmin['rank'] > 4){?>
<li class="">
<a href="storage.php">
<i class="fa fa-cloud"></i> 
<span>Informações</span>
</a>
</li>
<?php }?>
<?php if($useradmin['rank'] > 4){?>
<li class="">
<a href="notifica.php">
<i class="fa fa-question-circle"></i> 
<span>Notifica</span>
</a>
</li>
<?php }?>
<?php if($useradmin['rank'] > 6){?>
<li class="">
<a href="#" class="dropdown-toggle">
<i class="fa fa-newspaper-o"></i>
<span>Promoções</span>
<i class="fa fa-chevron-circle-right drop-icon"></i>
</a>
<ul class="submenu">
<li> <a href="promos.php"> Posta / Eidta promos </a> </li>
<li> <a href="formularios.php"> Formulario das Promo </a> </li>
<li> <a href="premiapromo.php"> Premiar ganhado </a> </li>
</ul>
</li>
<?php }?>
<?php if($useradmin['rank'] > 4){?>
<li class="">
<a href="#" class="dropdown-toggle">
<i class="fa fa-level-down"></i> 
<span>Coloca no Hotel</span>
<i class="fa fa-chevron-circle-right drop-icon"></i>
</a>
<ul class="submenu">
<li> <a href="hospemblema.php"> ADS de quartos </a> </li>
<li> <a href="subir.php"> Emblemas </a> </li>
<li> <a href="#"> Icones  </a> </li>
<li> <a href="#"> Mega Oferta </a> </li>
<li> <a href="#"> Imagens </a> </li>
</ul>
</li>
<?php }?>
<?php if($useradmin['rank'] > 7){?>
<li class="">
<a href="#" class="dropdown-toggle">
<i class="fa fa-plus-square"></i> 
<span>Logs</span>
<i class="fa fa-chevron-circle-right drop-icon"></i>
</a>
<ul class="submenu">
<li> <a href="logscms.php"> Logs da CMS </a> </li>
<li> <a href="logsemu.php"> Logs do Emulador </a> </li>
</ul>
</li>
<?php }?>
<li class="">
<a href="#" class="dropdown-toggle">
<i class="fa fa-microphone"></i> 
<span>Locução</span>
<i class="fa fa-chevron-circle-right drop-icon"></i>
</a>
<ul class="submenu">
<li> <a href="pedidos.php"> Pedidos </a> </li>
<li> <a href="kikar-dj.php"> Kick Dj </a> </li>
<li> <a href="entraradio.php"> Entra ao vivo </a> </li>
<li> <a href="horario.php"> Marca Horarios </a> </li>
<li> <a href="vinhetas.php"> Vinhetas </a> </li>
<li> <a href="dadosradio.php"> Dados da Rádio </a> </li>
<li> <a href="addlocutor.php"> Adicionar Locutor </a> </li>
<li> <a href="codpre.php"> Criar código de presença </a> </li>
</ul>
</li>
<?php if($useradmin['rank'] > 4){?>
<li class="">
<a href="#" class="dropdown-toggle">
<i class="fa fa-users"></i> 
<span>Usuários</span>
<i class="fa fa-chevron-circle-right drop-icon"></i>
</a>
<ul class="submenu">
<li> <a href="bans.php"> Banir / Desbanir </a> </li>
<li> <a href="clones.php"> Clones de Usuários </a> </li>
<li> <a href="badges.php"> Dar é Tira Emblemas  </a> </li>
<li> <a href="ranks.php"> Dar é tira Cargo </a> </li>
<li> <a href="users.php"> Edita Usuário </a> </li>
</ul>
</li>
<?php }?>
<?php if($useradmin['rank'] > 8){?>
<li class="">
<a href="#" class="dropdown-toggle">
<i class="fa fa-database"></i>
<span>Servidor</span>
<i class="fa fa-chevron-circle-right drop-icon"></i>
</a>
<ul class="submenu">
<li> <a href="server.php"> Estatisticas </a> </li>
<li> <a href="ddos-guard.php"> Ante DDoS </a> </li>
<li> <a href="CoreDev.php"> CoreDev </a> </li>
</ul>
</li>
<?php }?>
<?php if($useradmin['rank'] > 8){?>
<li class="">
<a href="configs.php">
<i class="fa fa-cog"></i> 
<span>Ajustes do Hotel</span>
</a>
</li>
<?php }?>
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
<li><a href="/Painelthiago/dashboard.php">Inicio</a></li>
<li class="active"><span><?php echo $_SESSION['username']; ?></span></li>
</ol>
<h1>Painel Habbz V1. By: Thiago Araujo</h1>
</div>
</div>
</div>