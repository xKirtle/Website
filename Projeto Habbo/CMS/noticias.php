<?php
require_once('./data_classes/server-data.php_data_classes-core.php.php');
require_once('./data_classes/server-data.php_data_classes-session.php.php');
$maintenance2 = mysql_num_rows(mysql_query("SELECT * FROM cms_settings WHERE mantenimiento = '1'"));
$useradmin2 = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'");
$useradmin = mysql_fetch_array($useradmin2);
$notiadmin2 = mysql_query("SELECT * FROM cms_newsint WHERE idnoti = '".$_GET['id']."'");
$notiadmin = mysql_fetch_array($notiadmin2);
if($maintenance2 == '1' && $useradmin['rank'] < 5){
		header("Location: manutencao");
}


if($_GET['id'] != "")
{
$news_id= $_GET['id'];
}else{
	$sql21231231 = mysql_query("SELECT * FROM cms_news ORDER BY id DESC LIMIT 1"); 
	$f2121312 = mysql_fetch_array($sql21231231);
	$locationss= $f2121312['id'];
header("location: $path/noticias?id=$locationss");
}

						$sql2 = mysql_query("SELECT * FROM cms_news ORDER BY id DESC"); 
						$sql232 = mysql_query("SELECT * FROM cms_news ORDER BY id DESC"); 
			$e = mysql_query("SELECT * FROM cms_news WHERE id='".$_GET['id']."'");
							$f = mysql_fetch_array($e);
			$e2 = mysql_query("SELECT * FROM cms_news WHERE id='".$_GET['id']."'");
							$fa2 = mysql_fetch_array($e2);
							
?>
<?php mysql_query("UPDATE cms_news SET visitas = visitas + '1' WHERE id = '".$_GET['id']."'"); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="shortcut icon" href="/favicon.ico">
<title>Habbz ~ O melhor dos melhores</title>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-4290021342870547",
    enable_page_level_ads: true
  });
</script>
<meta name="description" content="Habbz agora com função de beijar na boca, Efeito tirar roupa, Raros Limitados, Eventos diariamente e promoções, 99999 Créditos e Topázios."/>
<meta name="keywords" content="habbo hotel, hotel, Habbzhotel, Habbz, habblet, jogos online, habbo"/>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- CSS DA CMS -->
<link rel="stylesheet" href="/Externos/css/me/index.css" type="text/css"/>
<link href="/Externos/css/bootstrap.css" rel="stylesheet" type="text/css" /> 
<link href="/Externos/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
<link href="/Externos/css/me/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="/Externos/css/me/bootstrap.theme.min.css" rel="stylesheet" type="text/css"/>
<link href="/Externos/css/me/bootstrap-notifications.min.css" rel="stylesheet" type="text/css"/>
<link href="/Externos/css/me/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<!-- JS DA CMS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/script"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js" type="text/script"></script>
</head>
<body>
        <style type="text/css">
            body { 
                padding:0; 
                margin:0px;
                background: url(/Externos/img/bg-site.png);
            }

            .container {
                max-width: 1024px;
            }

            .titleNews {
                margin-top:10px;
                margin-left:10px;
                color: #fff;
                text-shadow: 0px 0px 5px rgba(0, 0, 0, 0.75);
            }

            .panel {
                margin-top:0px;
                margin-bottom:15px;
            }


            .onlineUsersNumber {
                font-size:22px;
                font-weight:bold;
                color:#474747;
                font-family:sans-serif;

                -webkit-animation: change-color 4s linear 0s infinite normal ;
                animation: change-color 4s linear 0s infinite normal ;
            }


            @-webkit-keyframes change-color {
                0%{
                    color:#474747;
                }
                52%{
                    color:#d6d6d6;
                }
                100%{
                    color:#474747;
                }
            }

            @keyframes change-color {
                0%{
                    color:#474747;
                }
                52%{
                    color:#d6d6d6;
                }
                100%{
                    color:#474747;
                }
            }

            .panel {
                margin:3px;
                margin-bottom:10px;
                border-left:0px;
                border-right:0px;
            }

            .my-column {
                padding: 0px;
            }
            .my-column:first-child {
                padding-left:0px;
            }
            .my-column:last-child {
                padding-right:0px;
            }

.box-avatar{text-align:center;width:36px;height:36px;border-radius:100px;overflow:hidden;float:left;margin:4px}
.box-avatar.no{background-color:#8a2525;border:2px solid #B31F17}
.box-avatar.yes{background-color:#0b7350;border:2px solid #4EA11F}
.btn-circle{width:30px;height:30px;text-align:center;padding:6px 0;font-size:12px;line-height:1.428571429;border-radius:15px}.btn-circle.btn-lg{width:50px;height:50px;padding:10px 16px;font-size:18px;line-height:1.33;border-radius:25px}.btn-circle.btn-xl{width:70px;height:70px;padding:10px 16px;font-size:24px;line-height:1.33;border-radius:35px}.btn-circle.positivo.active,.btn-circle.positivo:active{border-color:#53B11E}.btn-circle.positivo.hover,.btn-circle.positivo:hover{border-color:#85BB66}.btn-circle.negativo.active,.btn-circle.negativo:active{border-color:#901C16}.btn-circle.negativo.hover,.btn-circle.negativo:hover{border-color:#A22620}.box-avatar >img{margin-left:-16px;margin-top:-30px;border-radius:100px;-webkit-transition:all .8s cubic-bezier(.190,1.000,.220,1.000);-moz-transition:all .8s cubic-bezier(.190,1.000,.220,1.000);-ms-transition:all .8s cubic-bezier(.190,1.000,.220,1.000);-o-transition:all .8s cubic-bezier(.190,1.000,.220,1.000);transition:all .8s cubic-bezier(.190,1.000,.220,1.000)}.box-avatar:hover >img{margin-top:-20px;-webkit-transition:all .8s cubic-bezier(.190,1.000,.220,1.000);-moz-transition:all .8s cubic-bezier(.190,1.000,.220,1.000);-ms-transition:all .8s cubic-bezier(.190,1.000,.220,1.000);-o-transition:all .8s cubic-bezier(.190,1.000,.220,1.000);transition:all .8s cubic-bezier(.190,1.000,.220,1.000)}
.voto-positivo{
width: 100%;
height: 100%;
padding:5px;
margin-bottom: 2px;
background-color: #6dcc69;
font-family: Questrial;
box-shadow: inset 0 5px rgba(255, 255, 255, 0.2), inset 0 -5px rgba(0, 0, 0, 0.1), inset 0 0 0 1px rgba(0, 0, 0, 0.2), 0 4px rgba(0, 0, 0, 0.1);
text-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);
color: white;
}
.voto-negativo{
width: 100%;
height: 100%;
padding:5px;
margin-bottom: 2px;
background-color: #cc6969;
font-family: Questrial;
box-shadow: inset 0 5px rgba(255, 255, 255, 0.2), inset 0 -5px rgba(0, 0, 0, 0.1), inset 0 0 0 1px rgba(0, 0, 0, 0.2), 0 4px rgba(0, 0, 0, 0.1);
text-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);
color: white;
}
.reacties {
  padding: 7px;
  background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)), url(Externos/img/background-news-comments.gif) center center;
  margin-bottom: 10px;
  color: #828282;
  border-radius: 5px;
  border: 1px solid #ccc;
  box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), inset 0 -1px rgba(0, 0, 0, 0.1), inset 0 0 0 1px rgba(0, 0, 0, 0.2), 0 2px rgba(0, 0, 0, 0.1);
  }
  /* line 751, input/global.scss */
  .reacties .title {
    background: transparent;
    font-weight: bold;
    padding: 10px;
    border-radius: 4px;
    color: #FFF;
    text-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 5px rgba(255, 255, 255, 0.2), inset 0 -5px rgba(0, 0, 0, 0.1), inset 0 0 0 1px rgba(0, 0, 0, 0.2), 0 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 11px; }
    /* line 762, input/global.scss */
    .reacties .title.white {
      background-color: #ffffff; }
    /* line 762, input/global.scss */
    .reacties .title.red {
      background-color: #d32f2f; }
    /* line 762, input/global.scss */
    .reacties .title.pink {
      background-color: #C2185B; }
    /* line 762, input/global.scss */
    .reacties .title.purple {
      background-color: #7B1FA2; }
    /* line 762, input/global.scss */
    .reacties .title.deeppurple {
      background-color: #512DA8; }
    /* line 762, input/global.scss */
    .reacties .title.indigo {
      background-color: #303F9F; }
    /* line 762, input/global.scss */
    .reacties .title.blue {
      background-color: #1976D2; }
    /* line 762, input/global.scss */
    .reacties .title.lightblue {
      background-color: #0288D1; }
    /* line 762, input/global.scss */
    .reacties .title.cyan {
      background-color: #0097A7; }
    /* line 762, input/global.scss */
    .reacties .title.teal {
      background-color: #00796B; }
    /* line 762, input/global.scss */
    .reacties .title.green {
      background-color: #388E3C; }
    /* line 762, input/global.scss */
    .reacties .title.lightgreen {
      background-color: #689F38; }
    /* line 762, input/global.scss */
    .reacties .title.lime {
      background-color: #AFB42B; }
    /* line 762, input/global.scss */
    .reacties .title.yellow {
      background-color: #FBC02D; }
    /* line 762, input/global.scss */
    .reacties .title.amber {
      background-color: #FFA000; }
    /* line 762, input/global.scss */
    .reacties .title.orangehtml {
      background-color: #F57C00; }
    /* line 762, input/global.scss */
    .reacties .title.deeporange {
      background-color: #E64A19; }
    /* line 762, input/global.scss */
    .reacties .title.brown {
      background-color: #5D4037; }
    /* line 762, input/global.scss */
    .reacties .title.grey {
      background-color: #616161; }
    /* line 762, input/global.scss */
    .reacties .title.bluegrey {
      background-color: #455A64; }
    /* line 762, input/global.scss */
    .reacties .title.background {
      background-color: #f3f3f3; }
    /* line 762, input/global.scss */
    .reacties .title.black {
      background-color: #000000; }
    /* line 762, input/global.scss */
    .reacties .title.menu {
      background-color: #535353; }
    /* line 762, input/global.scss */
    .reacties .title.turquoise {
      background-color: #1abc9c; }
    /* line 762, input/global.scss */
    .reacties .title.greensea {
      background-color: #16a085; }
    /* line 762, input/global.scss */
    .reacties .title.sunflower {
      background-color: #f1c40f; }
    /* line 762, input/global.scss */
    .reacties .title.orange {
      background-color: #f39c12; }
    /* line 762, input/global.scss */
    .reacties .title.emerald {
      background-color: #2ecc71; }
    /* line 762, input/global.scss */
    .reacties .title.nephritis {
      background-color: #27ae60; }
    /* line 762, input/global.scss */
    .reacties .title.carrot {
      background-color: #e67e22; }
    /* line 762, input/global.scss */
    .reacties .title.pumpkin {
      background-color: #d35400; }
    /* line 762, input/global.scss */
    .reacties .title.peterriver {
      background-color: #3498db; }
    /* line 762, input/global.scss */
    .reacties .title.belizehole {
      background-color: #2980b9; }
    /* line 762, input/global.scss */
    .reacties .title.alizarin {
      background-color: #e74c3c; }
    /* line 762, input/global.scss */
    .reacties .title.pompegranate {
      background-color: #c0392b; }
    /* line 762, input/global.scss */
    .reacties .title.amethyst {
      background-color: #9b59b6; }
    /* line 762, input/global.scss */
    .reacties .title.wisteria {
      background-color: #8e44ad; }
    /* line 762, input/global.scss */
    .reacties .title.clouds {
      background-color: #ecf0f1; }
    /* line 762, input/global.scss */
    .reacties .title.silver {
      background-color: #bdc3c7; }
    /* line 762, input/global.scss */
    .reacties .title.wetasphalt {
      background-color: #34495e; }
    /* line 762, input/global.scss */
    .reacties .title.midnightblue {
      background-color: #2c3e50; }
    /* line 762, input/global.scss */
    .reacties .title.concrete {
      background-color: #95a5a6; }
    /* line 762, input/global.scss */
    .reacties .title.asbestos {
      background-color: #7f8c8d; }
    /* line 762, input/global.scss */
    .reacties .title.header {
      background-color: #dfdfdf; }
    /* line 762, input/global.scss */
    .reacties .title.rightcontent {
      background-color: #efefef; }
    /* line 762, input/global.scss */
    .reacties .title.clientbar {
      background-color: #32322e; }
    /* line 762, input/global.scss */
    .reacties .title.clienttop {
      background-color: #61605e; }
    /* line 762, input/global.scss */
    .reacties .title.userbackground {
      background-color: #549daf; }
    /* line 762, input/global.scss */
    .reacties .title.usertop {
      background-color: #73daf9; }
    /* line 762, input/global.scss */
    .reacties .title.userstats {
      background-color: #3d3d3d; }
  /* line 770, input/global.scss */
  .reacties .itemNews img {
    -webkit-filter: drop-shadow(0 1px 0 #FFF) drop-shadow(0 -1px 0 #FFF) drop-shadow(1px 0 0 #FFF) drop-shadow(-1px 0 0 #FFF) drop-shadow(0 0 10px transparent); }
  /* line 777, input/global.scss */
  .reacties .itemNews .nwolk {
    margin-left: 4px;
    position: relative;
    padding: 13px 10px 10px 10px;
    background-color: #fff;
    box-shadow: inset 0px 0px 0px 1px rgba(0, 0, 0, 0.05);
    border-radius: 6px;
    color: rgba(0, 0, 0, 0.5);
    border-bottom: 2px solid #e6e6e6;
    display: inline-block;
    width: 424px;
    margin-bottom: -20px;
    /* max-height: 60px; */
    overflow: hidden;
    }
	</style>

    <section id="bottom">
<style>
a{
color: #000;
font-weight: bold /* negrito no texto */
-webkit-transition: 0.5s ease-in;
-moz-transition: 0.5s ease-in;
-o-transition: 0.5s ease-in;
transition: 0.5s ease-in;
}

a:hover {
color: #000;
font-weight: bold /* negrito no texto */
transition-duration: 0.5s;
transition-timing-function: ease-in;
transition-property: all;
}
span:hover {
color: #505050;
font-weight: bold /* negrito no texto */
transition-duration: 0.5s;
transition-timing-function: ease-in;
transition-property: all;
}
</style>	
	<style>
@-webkit-keyframes header_color {
  0% { background-color: #a94c4c; }
  12% { background-color: #a97e4c; }
  24% { background-color: #a9a84c; }
  36% { background-color: #69a94c; }
  48% { background-color: #4ca978; }
  60% { background-color: #4ca2a9; }
  72% { background-color: #4c5ea9; }
  84% { background-color: #764ca9; }
  96% { background-color: #a94c93; }
  100% { background-color: #a94c4c; }
}
@keyframes  header_color {
  0% { background-color: #a94c4c; }
  12% { background-color: #a97e4c; }
  24% { background-color: #a9a84c; }
  36% { background-color: #69a94c; }
  48% { background-color: #4ca978; }
  60% { background-color: #4ca2a9; }
  72% { background-color: #4c5ea9; }
  84% { background-color: #764ca9; }
  96% { background-color: #a94c93; }
  100% { background-color: #a94c4c; }
}

/* Ocultar botón radio */
input[id^="spoiler"] {
display: none;
}
/* Estilo botón clicable */
input[id^="spoiler"] + label {
display: block;
width: 200px;
margin: 0 auto;
padding: 5px 20px;
background: #e1a;
cursor: pointer;
}
/* Estilo botón cuando su INPUT está seleccionado */
input[id^="spoiler"]:checked + label {
color: #333;
background: #ccc;
}
/* Estilo caja SPOILER (inicialmente oculto) */
input[id^="spoiler"] ~ .spoiler {
width: 90%;
height: 0;
overflow: hidden;
opacity: 0;
margin: 10px auto 0; 
}
/* Estilo caja SPOILER cuando su INPUT está seleccionado */
input[id^="spoiler"]:checked + label + .spoiler {
height: auto;
opacity: 1;
}
</style>
<div id="landing">
<div class="top_sectionthiago" style="background:url(/themes/images/fondo.png) repeat-x fixed bottom;animation: header_color 25s infinite; 
-webkit-animation: header_color 25s infinite;" >
<div class="background_leftthiago" 
"></div>
<div class="background_top">
<div id="contain">
<img style="margin-top:10px; left:5%; position: relative;" src="Externos/img/logo.gif" alt="logo"/>
<div class="logo_placeholderthiago">
<div class=""></div></div>
<span class="online_status" style="position:relative; z-index:60;left:-8.2%;">
<span class="online_status_icon"></span>
<span class="glyphicon glyphicon-user"></span> <span id='Online'><?php echo $UsersOnline; ?></span> Usu&aacute;rios Conectados</span>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>    
<div style="position:fixed; right:20px; top:20px; width:80px;">
<div id="resultado"></div>
<div id="bot_mod"><a href="/client" title="Entra no hotel">Entra</div></a>
<script type="text/javascript">
    $('.dropdown-menu').click(function (e) {
        e.stopPropagation();
    });
</script><br>
<li class="dropdown">
<div id="bot_mod" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Configuraçães">Conf</div>
<ul class="dropdown-menu" style="margin-left:-80%; margin-top:35%;">
<li><a href="/settings">Configurações</a></li>
<li role="separator" class="divider"></li>
<li><a href="#">...</a></li>
<li><a href="#">...</a></li>
</ul>
</li>
<div id="bot_mod"><a href="/perfil?pesquisa=<?php echo $_SESSION['username']; ?>" title="Seu perfil">Perfil</div></a>
<?php 
if($useradmin['rank'] > 4){?>
<div id="bot_mod"><a href="<?php echo $hkthiago; ?>" title="Hk do hotel">HK</div></a>
<?php }?>
<div id="bot_mod"><a href="logout" title="Sair do hotel :(">Sair</div></a>
</div>
</div></div></div>
<nav class="navbar navbar-default navbar-static-top">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<li><a href="/me"><span class="glyphicon glyphicon-home"></span> &nbsp;Página Inicial</a></li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-plus"></span> &nbsp;Comunidade<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="/vip.php"><i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp;Planos Vips</a></li>
<li><a href="/viprank"><i class="fa fa-id-card" aria-hidden="true"></i> &nbsp;Vips do Hotel</a></li>
<li><a href="/noticias?id="><i class="fa fa-newspaper-o" aria-hidden="true"></i> &nbsp;Notícias</a></li>
<li><a href="/hall"><span class="glyphicon glyphicon-star"></span> &nbsp;Hall da Fama</a></li>
<li><a href="/staff"><span class="glyphicon glyphicon-briefcase"></span> &nbsp;Equipe</a></li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-gamepad"></span> &nbsp;Interatividade<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="/jogo"><i class="fa fa-flag" aria-hidden="true"></i> &nbsp;Jogo de Carros</a></li>
<li><a href="/ranking"><span class="fa fa-info-circle"></span> &nbsp;Ranking do Jogo</a></li>
<li><a href="/referidos"><span class="fa fa-trophy"></span> &nbsp;Sobre os Referidos</a></li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-shopping-basket"></span> &nbsp;Loja Habbz<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="/loja"><i class="fa fa-shopping-basket" aria-hidden="true"></i> &nbsp;Loja em geral</a></li>
<!---<li><a href="/diamantes"><i class="fa fa-diamond" aria-hidden="true"></i> &nbsp;Loja de Diamantes</a></li>-->
<!---<li><a href="/boias"><span class="fa fa-life-ring"></span> &nbsp;Loja de Boias</a></li>-->
<!---<li><a href="/moedas"><span class="fa fa-circle"></span> &nbsp;Loja de Moedas</a></li>-->
<!---<li><a href="/prancha"><span class="fa fa-circle"></span> &nbsp;Loja de Prancha</a></li>-->
</ul>
</li>
<li><a href="/client" target="habbinc_client"><b><span class="glyphicon glyphicon-log-in"></span> &nbsp;Entrar no Hotel</b></a></li>
</ul>
<div class="dropdown-footer text-center">
</div>
</li>
</nav>
<div class="container wow" data-wow-duration="1000ms" data-wow-delay="600ms">
<div class="content-wrapper">	
<div class="row">
<div class="col-md-4">
<div class="panel panel-default">
<div class="panel-heading"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Ultimas noticias</div>

<?php while($row32 = mysql_fetch_array($sql2)){ ?>
<li class="
<?php if($row32['id']==$fa2['id']){
echo "list-group-item active";
}else{
echo "list-group-item";    
		       }
		       ?> "
		       style="<?php if($row32['id']==$fa2['id']){
				echo "z-index: 2; color: #000; background: linear-gradient(135deg, #18bbf7 0%, #2fbcef);";
		       }else{
			   echo "";    
		       } ?> "
		       > <a style="<?php if($row32['id']==$fa2['id']){
				echo "color:#fff;";
		       }else{
			   echo "";    
		       }?>" class="link-text-color" href="./noticias?id=<?php echo $row32['id'];?>"><?php echo $row32['title']; ?> »</a></li> 
<?php } ?>
</div>
</div>
<div class="col-md-8">
<div class="panel panel-default">
<div class="panel-heading" style="color:#FFF; background-color: #75caeb;">
<span class="glyphicon glyphicon-plus"></span> Título: <b> <?php echo $fa2['title']; ?> </b> <div style="float: right;" ><img src="Externos/img/n-info.gif"> <?php 
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Brasilia');
// Caso não queira letras maiúsculas no início de algumas palavras, pode ser usado apenas assim:
echo utf8_encode(strftime('%A, %d, de %B de %Y', $fa2['date']))
?> </div>
</div>
<div class="panel-body">
<?php echo $fa2['longstory']; ?>				   
</div>
<?php 
if(isset($_POST['curtir'])){
{
	$iiiii = mysql_query("SELECT * FROM cms_news WHERE id = '" . $f['id'] . "' LIMIT 1");
	$faa = mysql_fetch_array($iiiii);
	$iiiii2 = mysql_query("SELECT * FROM cms_likes_news WHERE id_news = '" . $fa2['id'] . "'");
	$faa2 = mysql_fetch_array($iiiii2);
	if($faa2['nome'] != $_SESSION['username']){
mysql_query("INSERT INTO cms_likes_news (nome,id_news) VALUES ('" . $_SESSION['username'] . "','" . $fa2['id'] . "');"); 
mysql_query("UPDATE cms_news SET curtidas=curtidas + 1 WHERE id = '" . $fa2['id'] . "'") or die(mysql_error()); 

?>
<meta HTTP-EQUIV="refresh" CONTENT="0;URL=noticias?id=<?php echo $f['id']; ?>">
<?php 
}else{}
}
}
?>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>

        <h4 class="modal-title">Formul&aacute;rio: <?php echo $fa2['title']; ?></h4>

      </div>
      <div class="modal-body">
<?php
ob_start();
	require_once 'global.php';
	$TplClass->SetParam('title', 'Pedidos da Rádio');
	$TplClass->SetParam('zone', 'Pedidos da Rádio');
	
	$users = $db->query("SELECT * FROM users WHERE username = '{$_SESSION['username']}' AND password = '{$_SESSION['password']}'");
	$user = $users->fetch_array();
	$action = $Functions->FilterText($_GET['action']);
	$id = $Functions->FilterText($_GET['id']);

	if($_POST['addpromo']){
		if(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['longcontent']) && isset($_POST['image'])){
			$title = $Functions->FilterText($_POST['title']);
			$content = $_POST['shortstory'];
			$author = $_POST['author'];
			$type = $_POST['type'];
			$longcontent = $_POST['longcontent'];
			$image = $Functions->FilterText($_POST['image']);
{
				$dbQuery= array();
				$dbQuery['title'] = $title;
				$dbQuery['shortstory'] = $content;
				$dbQuery['longstory'] = $longcontent;
				$dbQuery['image'] = $image;
				$dbQuery['author'] = $author;
				$dbQuery['type'] = $type;
				$dbQuery['date'] = time();
				$query = $db->insertInto('cms_formulario', $dbQuery);
				echo "<script>alert('Enviado com exito!');location.href='$path/noticias?id=$locationss';</script>";
			}
		}
	}
	
define("show_plugin_menu", true);
ob_end_flush(); 
?>
<form action="" method="post">
<input type="hidden" name="acao" value="formulario1">
  <div class="form-group">
    <label for="textNome" class="control-label">Nick / Dupla</label>
    <input id="nomes" name="title" class="form-control" placeholder="Digite seus Nomes..." type="text">
  </div>
  
  <div class="form-group">
    <label for="inputEmail" class="control-label">Texto( Se necessário )</label>
    <input id="texto" name="longcontent" class="form-control" style="margin: 0px -1px 0px 0px; height: 87px; width: 658px;" placeholder="Insira o texto aqui, caso necessário" type="text">
  </div>
  
   <div class="form-group">
    <label for="inputEmail" class="control-label">Link da imagem</label>
    <input id="image" name="image" class="form-control" placeholder="Insira o link da imagem" type="text">
  </div>
  
       <div class="form-group">
    <label for="inputEmail" class="control-label">Nome da promo</label>
    <input readonly="readonly" id="content" name="content" class="form-control"  value="<?php echo $fa2['title']; ?>">
  </div>
   
     <div class="form-group">
    <label for="inputEmail" class="control-label">Envia para</label>
    <input readonly="readonly" id="author" name="author" class="form-control"  value="<?php echo $fa2['author']; ?>">
  </div>
  
       <div class="form-group">
    <label for="inputEmail" class="control-label">Id da notícia</label>
    <input readonly="readonly" id="type" name="type" class="form-control"  value="<?php echo $fa2['id']; ?>">
  </div>
  
  <input type="submit" value="Enviar formulário" name="addpromo" id="doregister" class="btn btn-primary" >
<input type="hidden" id="addpromo" size="35" name="addpromo" value="sendToken"> 
  </form>
      </div>

      <div class="modal-footer">
	 
      </div>
    </div>

  </div>
</div>
<?php 
if($fa2['formulario'] == 1){?>
<br>
<a class="dropdown-toggle" href="#" data-toggle="modal" data-target="#myModal">
<p type="button" style="margin-left:20px;" class="btn btn-success btn-lg" id="formulario" name="formulario" style="color:white; cursor:pointer;">Formulário</p>	
<br>
<?php } ?>
</a> 
</br>
</div>
<div class="reacties">
<div class="panel-heading">
<div class="row">
<div class="col-sm-7">
<div class="media v-middle">
<div class="media-left text-center">
<?php
$e = mysql_query("SELECT username,look,credits,id FROM users WHERE username='" . $fa2['author'] . "' ORDER BY credits DESC LIMIT 5");
while($f = mysql_fetch_array($e)){
?>
<img class="head" title="<?php echo $f['username']; ?>" data-original-title="<?php echo $f['username']; ?>" src="	http://www.avatar-retro.com/habbo-imaging/avatarimage?hb=img&figure=<?php echo $f['look']; ?>&amp;direction=3&amp;head_direction=3&amp;gesture=sml&amp;headonly=1" style="    -webkit-filter: drop-shadow(0 1px 0 #FFF) drop-shadow(0 -1px 0 #FFF) drop-shadow(1px 0 0 #FFF) drop-shadow(-1px 0 0 #FFF) drop-shadow(0 0 10px transparent);">              
<?php } ?>
</div>
<div class="media-body" style="display: table-cell;vertical-align: top;width: 10000px;border-bottom: 2px solid rgba(0, 0, 0, 0.15);border-left: 2px solid rgba(0, 0, 0, 0.04);/* border-right: 2px solid rgba(0, 0, 0, 0.04); *//* border-top: 2px solid rgba(0, 0, 0, 0.02); */background: rgba(0, 0, 0, 0.6);border-radius: 5px;padding: 5px 15px;/* float: left; *//* font-size: 14px; *//* font-weight: bold; */text-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);overflow: hidden;color: white;zoom: 1;">
<p style=" margin: 0 0 1px; ">Autor: 
<b>
<a style="color: #35b6f2" href="/perfil?pesquisa=<?php echo $fa2['author']; ?>"><?php echo $fa2['author']; ?>                      </a>
</b>
<br> <?php echo $fa2['visitas']; ?> Visualizações </br>
</p>
<p style="/* float: right; */"><img src="Externos/img/ultimologin.png"> <?php 
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Brasilia');
// Caso não queira letras maiúsculas no início de algumas palavras, pode ser usado apenas assim:
echo utf8_encode(strftime('%A, %d, de %B de %Y', $fa2['date']))
?>
</p>
</div>               
</div>
</div>
<?php
$datosnewsSQL = mysql_query("SELECT * FROM cms_news WHERE id='".$_GET['id']."' LIMIT 1");
	$datosnews = mysql_fetch_array($datosnewsSQL);
$datosPerfilSQL = mysql_query("SELECT * FROM users WHERE username='" . $fa2['author'] . "' LIMIT 1");
	$datosPerfil = mysql_fetch_array($datosPerfilSQL);
	
if($_POST['curtir']){
	echo "<script>alert('Você curtiu a notícia com exito!');</script>";
	$sqlavaliacao= mysql_query("SELECT * FROM cms_newsint WHERE user_1 = '" . $useradmin['id'] . "' AND user_2 = '" . $datosnews['id'] . "' AND tipo != 'favorito'");
	if(mysql_num_rows($sqlavaliacao) > 0){
mysql_query("UPDATE cms_newsint SET tipo = 'curtir' WHERE user_1 = '" . $useradmin['id'] . "' AND user_2 = '" . $datosnews['id'] . "' AND tipo != 'favorito'"); 
mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $useradmin['id'] . "','" . $datosnews['id'] . "','perfil?pesquisa=" . $useradmin['username'] . "','" . time() . "','Curtiu sua notícia')");
}else{
mysql_query("INSERT INTO cms_newsint VALUES (NULL,'" . $useradmin['id'] . "','" . $datosnews['id'] . "','curtir','" . $datosnews['id'] . "')"); 
mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $useradmin['id'] . "','" . $datosnews['id'] . "','perfil?pesquisa=" . $useradmin['username'] . "','" . time() . "','Curtiu sua notícia')");
	}
}  

if($_POST['naocurti']){
	echo "<script>alert('Você não curtiu a notícia com exito!');</script>";
	$sqlavaliacao= mysql_query("SELECT * FROM cms_newsint WHERE user_1 = '" . $useradmin['id'] . "' AND user_2 = '" . $datosnews['id'] . "' AND tipo != 'favorito'");
	if(mysql_num_rows($sqlavaliacao) > 0){
mysql_query("UPDATE cms_newsint SET tipo = 'naocurti' WHERE user_1 = '" . $useradmin['id'] . "' AND user_2 = '" . $datosnews['id'] . "' AND tipo != 'favorito'"); 
mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $useradmin['id'] . "','" . $datosnews['id'] . "','perfil?pesquisa=" . $useradmin['username'] . "','" . time() . "','Não curtiu sua notícia')");
}else{
mysql_query("INSERT INTO cms_newsint VALUES (NULL,'" . $useradmin['id'] . "','" . $datosnews['id'] . "','naocurti','" . $datosnews['id'] . "')");
mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $useradmin['id'] . "','" . $datosnews['id'] . "','perfil?pesquisa=" . $useradmin['username'] . "','" . time() . "','Não curtiu sua notícia')");
	}
} 

?>
<div class="col-sm-5">
<div class="media-body" style="display: table-cell;vertical-align: top;width: 10000px;border-bottom: 2px solid rgba(0, 0, 0, 0.15);border-left: 2px solid rgba(0, 0, 0, 0.04);background: rgba(0, 0, 0, 0.6);border-radius: 5px;padding: 5px 15px;text-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);overflow: hidden;color: white;zoom: 1;">
<form method='post'>
<input name='curtir' type='submit' value='Gostei' class='voto-positivo' style='background-color: #6dcc69;' />
<br>
<input name='naocurti' type='submit' value='N&atilde;o Gostei' class='voto-negativo' style='background-color: #cc6969;' />
</form>	</div>
</div>
</div>
</div>
<div class="panel-heading">
<div style="width: 100%; height:auto; overflow:hidden; padding:5px 0px 5px 7px" id="avaliar_noticias">
<?php
$datosPromo2 = mysql_query("SELECT * FROM cms_newsint WHERE user_2 = '" . $datosnews['id'] . "' ORDER BY tipo");
$ii = 0;
if(mysql_num_rows($datosPromo2) == 0){
	echo "<center>Nenhuma avaliacao ainda...</center>";
}else{
while($datosPromo = mysql_fetch_array($datosPromo2)){
	$datosAvaliadorSQL= mysql_query("SELECT * FROM users WHERE id = '" . $datosPromo['user_1'] . "'");
	$datosAvaliador = mysql_fetch_array($datosAvaliadorSQL);
?>
<?php
if($datosPromo['tipo'] == "curtir"){ ?>
<div data-toggle="tooltip" data-placement="right" title="" class="box-avatar yes" title="<?php echo $datosAvaliador['username']; ?>" data-original-title="<?php echo $datosAvaliador['username']; ?>">
<img title="<?php echo $datosAvaliador['username']; ?>" src="http://www.avatar-retro.com/habbo-imaging/avatarimage?hb=img&figure=<?php echo $datosAvaliador['look']; ?>&amp;action=std&amp;direction=2&amp;head_direction=3&amp;gesture=sml&amp;size=b"></div>
<?php }else if($datosPromo['tipo'] == "naocurti"){ ?>
<div data-toggle="tooltip" data-placement="right" title="" class="box-avatar no" title="<?php echo $datosAvaliador['username']; ?>" data-original-title="<?php echo $datosAvaliador['username']; ?>">
<img title="<?php echo $datosAvaliador['username']; ?>" src="http://www.avatar-retro.com/habbo-imaging/avatarimage?hb=img&figure=<?php echo $datosAvaliador['look']; ?>&amp;action=std&amp;direction=2&amp;head_direction=3&amp;gesture=sml&amp;size=b"></div>
<?php }?>
<?php }} ?>
</div>
</div>
<?php
						
$palavrasbloqueadas=file_get_contents('./Files/PalavrasBloqueadas.txt');	
if(isset($_POST['conteudo']))
{
if(eregi(HoloText($_POST['conteudo']), $palavrasbloqueadas) == true){
		echo"<script>alert('Você digitou uma palavra bloqueada em nosso servidor.')</script>";
	}else{
$nome = $_SESSION['username'];;
	$conteudo = HoloText($_POST['conteudo']);
	$id_noticia = $fa2['id'];
	$titulo_noticia = $fa2['title'];
	$type="noticia";
mysql_query("INSERT INTO cms_comment (nome,comentario,id_news,titulo_noticia,type) VALUES ('". $nome ."','". $conteudo ."','". $id_noticia ."','". $titulo_noticia ."','". $type ."')") or die(mysql_error());
}
}
?>
<div class="panel panel-default">
<div class="panel-heading">
<span class="glyphicon glyphicon-envelope"></span> Postar Comentário
</div>
<div class="panel-footer">
<form method="POST">
<textarea class="form-control" name = "conteudo" rows="3" placeholder="Escreva aqui..."></textarea>
<div class="panel-footer">
<div class="pull-right">
<button class="btn btn-primary" id="comentar" type="submit">Comentar</button>
</div>
<div class="clearfix"></div>
</div>
</form>
</div>
</div>
<?php
$e231 = mysql_query("SELECT * FROM cms_comment WHERE id_news = '" . $news_id . "' AND type='noticia' ORDER BY id DESC");
 while($f2222 = mysql_fetch_array($e231)){ $i = $i +1; 
 $e222121 = mysql_query("SELECT * FROM users WHERE username='" . $f2222['nome'] . "'");
$usuario_post = mysql_fetch_array($e222121);
 $id = $f2222['id'];
 ?>
<!-- comentario -->
<div class="panel panel-default">
<div class="panel-heading"><i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i> <?php echo $f2222['nome']; ?> fez um comentário</div>
<div class="media-left media-top">
<div style="background-image: url(http://www.habbo.com.br/habbo-imaging/avatarimage?figure=<?php echo $usuario_post['look']; ?>&amp;size=m&amp;direction=2&amp;head_direction=2&amp;gesture=sml); background-position: -2px -17px; width:50px; height:50px;">
</div>
</div>
<div class="media-body">
<small><a href="./perfil?pesquisa=<?php echo $f2222['nome']; ?>" target="_blank"><b><?php echo $f2222['nome']; ?></b></a> comentou em <b><?php echo $f2222['titulo_noticia']; ?></b>
</small>
<br>
<div class="more-less" onmouseover="resize(this)">
<div class="more-block"><?php echo $f2222['comentario']; ?></div>
</div>
</div>
</div>

<?php } ?>
</div>
</div>	
</div>	
</div>
</section><!--/#bottom-->
<?php include_once("Pagina/Foorte.php"); ?>