<?php
require_once('./data_classes/server-data.php_data_classes-core.php.php');
require_once('./data_classes/server-data.php_data_classes-session.php.php');
$maintenance2 = mysql_num_rows(mysql_query("SELECT * FROM cms_settings WHERE mantenimiento = '1'"));
$useradmin2 = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'");
$useradmin = mysql_fetch_array($useradmin2);
if($maintenance2 == '1' && $useradmin['rank'] < 5){
		header("Location: manutencao");
}
$datosPerfilSQL = mysql_query("SELECT * FROM users WHERE username='" . $_GET['pesquisa'] . "' LIMIT 1");
	$datosPerfil = mysql_fetch_array($datosPerfilSQL);
	
$palavrasbloqueadas=file_get_contents('./Files/PalavrasBloqueadas.txt');

if($_GET['excluirfavorito']!="")
{
mysql_query("DELETE FROM cms_perfil WHERE id='" . $_GET['excluirfavorito'] . "'") or die(mysql_error()); 
} 
	if($_GET['excluircomment']!="")
{
mysql_query("DELETE FROM cms_comment WHERE id='" . $_GET['excluircomment'] . "'") or die(mysql_error()); 
mysql_query("DELETE FROM cms_likes_comments WHERE id_comment='" . $_GET['excluircomment'] . "'") or die(mysql_error()); 
} 

	if($_GET['avaliacao']=="curtir")
{
	$sqlavaliacao= mysql_query("SELECT * FROM cms_perfil WHERE user_1 = '" . $useradmin['id'] . "' AND user_2 = '" . $datosPerfil['id'] . "' AND tipo != 'favorito'");
	if(mysql_num_rows($sqlavaliacao) > 0){
mysql_query("UPDATE cms_perfil SET tipo = 'curtir' WHERE user_1 = '" . $useradmin['id'] . "' AND user_2 = '" . $datosPerfil['id'] . "' AND tipo != 'favorito'"); 
mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $useradmin['id'] . "','" . $datosPerfil['id'] . "','perfil?pesquisa=" . $useradmin['username'] . "','" . time() . "','Curtiu seu perfil')");
}else{
mysql_query("INSERT INTO cms_perfil VALUES (NULL,'" . $useradmin['id'] . "','" . $datosPerfil['id'] . "','curtir')"); 
mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $useradmin['id'] . "','" . $datosPerfil['id'] . "','perfil?pesquisa=" . $useradmin['username'] . "','" . time() . "','Curtiu seu perfil')");
	}
} 

	if($_GET['avaliacao']=="gostei")
{
	$sqlavaliacao= mysql_query("SELECT * FROM cms_perfil WHERE user_1 = '" . $useradmin['id'] . "' AND user_2 = '" . $datosPerfil['id'] . "' AND tipo != 'favorito'");
	if(mysql_num_rows($sqlavaliacao) > 0){
mysql_query("UPDATE cms_perfil SET tipo = 'gostei' WHERE user_1 = '" . $useradmin['id'] . "' AND user_2 = '" . $datosPerfil['id'] . "' AND tipo != 'favorito'"); 
mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $useradmin['id'] . "','" . $datosPerfil['id'] . "','perfil?pesquisa=" . $useradmin['username'] . "','" . time() . "','Gostou do seu perfil')");
	}else{
mysql_query("INSERT INTO cms_perfil VALUES (NULL,'" . $useradmin['id'] . "','" . $datosPerfil['id'] . "','gostei')"); 
mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $useradmin['id'] . "','" . $datosPerfil['id'] . "','perfil?pesquisa=" . $useradmin['username'] . "','" . time() . "','Gostou do seu perfil')");
	}
} 

	if($_GET['avaliacao']=="favorito")
{
	$sqlavaliacao= mysql_query("SELECT * FROM cms_perfil WHERE user_1 = '" . $useradmin['id'] . "' AND user_2 = '" . $datosPerfil['id'] . "'");
	if(mysql_num_rows($sqlavaliacao) > 1){
	}else{
mysql_query("INSERT INTO cms_perfil VALUES (NULL,'" . $useradmin['id'] . "','" . $datosPerfil['id'] . "','favorito')"); 
if(mysql_num_rows(mysql_query("SELECT * FROM cms_perfil WHERE user_1 = '" . $useradmin['id'] . "' AND user_2 = '" . $datosPerfil['id'] . "'"))==0){
	mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $useradmin['id'] . "','" . $datosPerfil['id'] . "','perfil?pesquisa=" . $useradmin['username'] . "','" . time() . "','Favoritou seu perfil')");
}
	}
} 

	if($_GET['avaliacao']=="naocurti")
{
	$sqlavaliacao= mysql_query("SELECT * FROM cms_perfil WHERE user_1 = '" . $useradmin['id'] . "' AND user_2 = '" . $datosPerfil['id'] . "' AND tipo != 'favorito'");
	if(mysql_num_rows($sqlavaliacao) > 0){
mysql_query("UPDATE cms_perfil SET tipo = 'naocurti' WHERE user_1 = '" . $useradmin['id'] . "' AND user_2 = '" . $datosPerfil['id'] . "' AND tipo != 'favorito'"); 
mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $useradmin['id'] . "','" . $datosPerfil['id'] . "','perfil?pesquisa=" . $useradmin['username'] . "','" . time() . "','Não curtiu seu perfil')");
}else{
mysql_query("INSERT INTO cms_perfil VALUES (NULL,'" . $useradmin['id'] . "','" . $datosPerfil['id'] . "','naocurti')"); 
mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $useradmin['id'] . "','" . $datosPerfil['id'] . "','perfil?pesquisa=" . $useradmin['username'] . "','" . time() . "','Não curtiu seu perfil')");
	}
} 

?>
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
<div class="row">
<div class="therest" style="margin-top:20px">
<style type="text/css">
	.profile {
		position: relative;
		z-index: 5;
		width:100%;
		height: 130px;
		color:white;
		//padding: 20px;
		border-radius:5px;
		background-color:black;
	}

	.profile .bg {
		position:absolute;
		z-index:-1;
		top:0;
		bottom:0;
		left:0;
		right:0;
		background:url(<?php echo  $datosPerfil['cms_background']; ?>) center center;
		opacity:.5;
		width:100%;
		height:100%;
		border-radius:5px;
	}

	.username {
		font-size:30px;
		position:relative;
		margin-left:17%;
		top:9%;
		text-shadow:0px 3px 2px black;
	}

	.bankInfo {
		position:absolute;
		font-size:17px;
		color:white;
		margin-top:1%;
		margin-left:17.5%;
		text-shadow:0px 2px 2px black;
	}

	.avatar {
		position:absolute;
		width:110px;
		height:150px;
		background:url(https://swf-img16.habbospirata.com/avatar/avatarimage.php?figure=<?php echo $datosPerfil['look']; ?>&size=l&direction=2&head_direction=3&gesture=sml);
		margin-top:-20px;
		left:0%;
		z-index:-1;
		-webkit-filter: drop-shadow(0 1px 0 #FFF) drop-shadow(0 -1px 0 #FFF) drop-shadow(1px 0 0 #FFF) drop-shadow(-1px 0 0 #FFF);
	}

	.motto {
		position:relative;
		font-size:16px;
		margin-left:17%;
		margin-top:3px;
		text-shadow:0px 3px 2px black;
	}

	.sprites {
		display:inline-block;
		background-image:url(./template/habbokl2016/images/sprit-staff.png);
		background-color:transparent;background-repeat:no-repeat;
		}

		#image_23754860064946115_gif {
			height:18px;
			width:37px;
			background-position:-0px -0px;
		}

		#image_2965450689662248_gif {
			height:18px;
			width:40px;
			background-position:-37px -0px;
		}
</style>
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="profile">
<div class="bg"></div>
<div class="avatar"></div>
<div class="username">
<?php echo $datosPerfil['username']; ?>		  	&nbsp;&nbsp;
<div class="sprites" id="image_23754860064946115_gif"><?php if($f211['online'] == 1){ ?>
<img style="margin-left:0px; margin-top: -2px;" src="Externos/img/online.gif" />
<?php } ?>
<?php if($f211['online'] == 0){ ?>
<img style="margin-left:0px; margin-top: -6px;" src="Externos/img/offline.gif" />
<?php } ?></div>		  	</div>
<div class="motto"></div>
<br>
<div class="motto">
Última visita em <?php echo date("d/m/Y", $datosPerfil['last_online']); ?> &agrave;s <?php echo date("H:i:s", $datosPerfil['last_online']); ?></div>
<div class="bankInfo">
<img style="margin-top:-3px" src="Externos/img/credit.png" />
<?php echo $datosPerfil['credits']; ?>
<img style="margin-top:-3px" src="Externos/img/duck.png" />
<?php echo $datosPerfil['activity_points']; ?>
<img style="margin-top:-3px;" src="Externos/img/diamond.png" />
<?php echo $datosPerfil['vip_points']; ?>				
</div>
</div>
<br />
<div class="panel panel-primary">
<div class="panel-heading">Últimos posts</div>
<div class="list-group" style="width:100%">
<?php
if(isset($_POST['conteudo']))
{
	

	$valor = $_POST['rank'];
$nome = $_SESSION['username'];;
	$conteudo = HoloText($_POST['conteudo']);
if($valor == 90909012){
mysql_query("INSERT INTO cms_comment (nome,comentario,id_news,titulo_noticia,type)
			VALUES ('". $nome ."','". $conteudo ."','" . $datosPerfil['id'] . "','COMENTARIO NO PERFIL','perfil')") or die(mysql_error());
			mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $useradmin['id'] . "','" . $datosPerfil['id'] . "','perfil?pesquisa=" . $datosPerfil['username'] . "','" . time() . "','Comentou na sua publicacao')");
}else{
	if(eregi(HoloText($_POST['conteudo']), $palavrasbloqueadas) == true){
		echo"<script>alert('Você digitou uma palavra bloqueada em nosso servidor.')</script>";
	}else{
	mysql_query("INSERT INTO cms_comment (nome,comentario,id_news,titulo_noticia,type)
			VALUES ('". $nome ."','". $conteudo ."','" . $datosPerfil['id'] . "','COMENTARIO NO PERFIL','perfil')") or die(mysql_error());
mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $useradmin['id'] . "','" . $datosPerfil['id'] . "','perfil?pesquisa=" . $datosPerfil['username'] . "','" . time() . "','Comentou na sua publicacao')");
		echo"<script>alert('Comentario enviado com sucesso!')</script>";
}
}
}
				
?>
<form method="post" role="form" enctype="multipart/form-data" id="userPostForm" class="facebook-share-box">
    <div style="    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
" class="panel panel-default">
<div class="panel-body">
<textarea class="form-control" rows="3" name="conteudo" id="conteudo" placeholder="Digite aqui a mensagem..." required ></textarea>
</div>
<div class="panel-footer">
<div class="pull-right">
<button class="btn btn-primary" id="pubBtn" type="submit">Publicar</button>
</div>
<div class="clearfix"></div>			
<hr>
<div style="position:relative; height:145px; z-index:1; overflow: scroll">
</br>
<?php
$i2 = 0;
$e2 = mysql_query("SELECT * FROM cms_comment WHERE type='perfil' AND id_news = '" . $datosPerfil['id'] . "' ORDER BY id ASC");
 if(mysql_num_rows($e2) == 0){
?>
<div class="media" style="margin-top:-10px;">
<center>Nenhuma mensagem...</center>
</div>
<hr style="margin: 5px 0px 5px 0px;"> 
<p style="margin: 0 0 10px;"></p>
<?php
 }else{
 while($f2 = mysql_fetch_array($e2)){ $i2 = $i2 +1;
 $e2222 = mysql_query("SELECT * FROM users WHERE username='" . $f2['nome'] . "'");
$usuario_comment = mysql_fetch_array($e2222); ?>

<div class="media" style="margin-top:-10px;">
<div class="media-left media-top">
<div style="background-image: url(https://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $usuario_comment['look']; ?>&amp;size=s&amp;direction=2&amp;head_direction=2&amp;gesture=m); background-position: -2px -7px; width:25px; height:30px;"></div></div>
<div class="media-body" style="max-width:720px"><a href="perfil?pesquisa=<?php echo $f2['nome']; ?>" ><?php echo $f2['nome']; ?></a>
<?php echo $f2['comentario']; ?>
<br>
<?php 
if($datosPerfil['username'] == $_SESSION['username'] OR $useradmin['rank'] > 4){?>
<small><a href="?pesquisa=<?php echo $datosPerfil['username']; ?>&excluircomment=<?php echo $f2['id']; ?>" onclick="doCommentLike(13393,this, 30592); return false;" style="color: #919191"> (<span id="likes">Excluir</span>)</a> &nbsp; &nbsp;</small>
<?php }?>
</div>
</div>
<hr style="margin: 5px 0px 5px 0px;"> 
<p style="margin: 0 0 10px;"></p>
<?php }} ?>
</div>
</div>
</div>
<input type="hidden" name="action" value="habbinccms_post_new_message_feed">
</form>			
</div></div>
<div class="panel panel-primary">
<div class="panel-heading">Interagiram com a Home</div>
<center>
<br>
 <img src="_images/tradeable.gif"/> <b>
<?php
echo mysql_num_rows(mysql_query("SELECT * FROM cms_perfil WHERE tipo = 'curtir' AND user_2 = '" . $datosPerfil['id'] . "'"));
?>
 Curtidas</b>
	<img src="_images/favorite.gif"/>  <b>
<?php
echo mysql_num_rows(mysql_query("SELECT * FROM cms_perfil WHERE tipo = 'gostei' AND user_2 = '" . $datosPerfil['id'] . "'"));
?>
 likes</b>
	<img src="_images/star.gif"/>  <b>
<?php
echo mysql_num_rows(mysql_query("SELECT * FROM cms_perfil WHERE tipo = 'favorito' AND user_2 = '" . $datosPerfil['id'] . "'"));
?>
 Favoritaram</b>
<img src="_images/closed.gif"/>  <b>
<?php
echo mysql_num_rows(mysql_query("SELECT * FROM cms_perfil WHERE tipo = 'naocurti' AND user_2 = '" . $datosPerfil['id'] . "'"));
?>
 Deslikes</b>
</center>
<br>
<?php
$datosPromo2 = mysql_query("SELECT * FROM cms_perfil WHERE user_2 = '" . $datosPerfil['id'] . "' ORDER BY tipo");
$ii = 0;
if(mysql_num_rows($datosPromo2) == 0){
	echo "<center>Nenhuma avaliacao ainda...</center>";
}else{
while($datosPromo = mysql_fetch_array($datosPromo2)){
	$datosAvaliadorSQL= mysql_query("SELECT * FROM users WHERE id = '" . $datosPromo['user_1'] . "'");
	$datosAvaliador = mysql_fetch_array($datosAvaliadorSQL);
?>
<a class="list-group-item" href="perfil?pesquisa=<?php echo $datosAvaliador['username'];?>">
<div class="media">
<div class="media-body">
<div class="media-left">
<div style="background-image: url(https://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $datosAvaliador['look']; ?>&amp;size=m&amp;direction=2&amp;head_direction=2&amp;gesture=m); background-position: -2px -7px; width:50px; height:60px;"></div>
</div>
<div class="media-right">
<br><p style="line-height: 100%"><b><?php echo $datosAvaliador['username']; ?></b></br>
<?php
if($datosPromo['tipo'] == "curtir"){ ?>
<span class="glyphicon glyphicon-thumbs-up">
<?php }else if($datosPromo['tipo'] == "naocurti"){ ?>
<span class="glyphicon glyphicon-thumbs-down">
<?php }else if($datosPromo['tipo'] == "favorito"){ ?>
<span class="glyphicon glyphicon-star">
<?php }else if($datosPromo['tipo'] == "gostei"){ ?>
<span class="fa fa-heart">
<?php }?>									
</span> 
</div>
</div>
</div>
</a>  
<?php }} ?>
</div>
</div>
<div class="col-md-4">
<div class="panel panel-primary">
<div class="panel-heading"> Faze ação no perfil</div>
<div class="panel-body">
<a style='float:left;display:inline-block' href="?pesquisa=<?php echo $datosPerfil['username']; ?>&avaliacao=curtir" style="color:#FFF; margin-left: 50px;"><img src="_images/tradeable.gif"/> <b>Curti essa Home</b></a><br>
<a style='float:left;display:inline-block' href="?pesquisa=<?php echo $datosPerfil['username']; ?>&avaliacao=gostei" style="color:#FFF; margin-left: 10%;"><img src="_images/favorite.gif"/> <b>Gostei dessa Home</b></a><br>
<a style='float:left;display:inline-block' href="?pesquisa=<?php echo $datosPerfil['username']; ?>&avaliacao=favorito" style="color:#FFF; margin-left: 20%;"><img src="_images/star.gif"/> <b>Colocar como Favorito</b></a><br>
<a style='float:left;display:inline-block' href="?pesquisa=<?php echo $datosPerfil['username']; ?>&avaliacao=naocurti" style="color:#FFF; margin-left: 10%;"><img src="_images/closed.gif"/> <b>Não Gostei da Home</b></a><br>
</div>
</div>
<div class="panel panel-primary">
<div class="panel-heading">Promoções ganha (<?php echo $datosPerfil['rank_promocao']; ?>)</div>
<?php
$datosPromo2 = mysql_query("SELECT * FROM cms_userspromo WHERE nome = '" . $_GET['pesquisa'] . "'");
$ii = 0;
if(mysql_num_rows($datosPromo2) == 0){
	echo "<br><center>Nenhuma promocao ganha...</center><br>";
}else{
while($datosPromo = mysql_fetch_array($datosPromo2)){
?>
<a class="list-group-item" style="text-decoration: none;" href="noticias?id=<?php echo $datosPromo['id_news'];?>">
<div class="media">
<div class="media-body">
<span class="glyphicon glyphicon-star-empty"></span> <b><?php echo $datosPromo['promocao']; ?></b>
</div>
</div>
</a>  		
<?php }} ?>
</div>
<div class="panel panel-primary">
<?php 
$easdasaa = mysql_query("SELECT * FROM user_badges WHERE user_id='" . $datosPerfil['id'] . "' ORDER BY badge_slot DESC");
?>
<div class="panel-heading">Emblemas (<?php echo mysql_num_rows($easdasaa); ?>)</div>
<div class="panel-body">
<?php
while($fasda = mysql_fetch_array($easdasaa)){ 
?>
<div style='float:left;width:54px;height:48px;display:inline-block'><img src='./swf/c_images/album1584/<?php echo $fasda['badge_id']; ?>.gif' style='padding:2px;' />
</div>
<?php } ?>
</div>
</div>
<div class="panel panel-primary">
<div class="panel-heading">Favoritaram a Home</div>
<?php
  $datosPromo2 = mysql_query("SELECT * FROM cms_perfil WHERE tipo='favorito' AND user_1 = '" . $datosPerfil['id'] . "'");
$ii = 0;
if(mysql_num_rows($datosPromo2) == 0){
	echo "<br><center>Nenhum favorito ainda...</center><br>";
}else{
while($datosPromo = mysql_fetch_array($datosPromo2)){
	$datosAvaliadorSQL= mysql_query("SELECT * FROM users WHERE id = '" . $datosPromo['user_2'] . "'");
	$datosAvaliador = mysql_fetch_array($datosAvaliadorSQL);
?>
<div class="panel-body">
<div class="list-group-item" href="perfil?pesquisa=<?php echo $datosAvaliador['username'];?>">

<div style="margin-top:-10px;margin-left:-10px;background-image: url(https://www.habbo.com/habbo-imaging/avatarimage?figure=<?php echo $datosAvaliador['look']; ?>&amp;size=m&amp;direction=2&amp;head_direction=2&amp;gesture=m); background-position: -2px -7px; width:50px; height:60px;">
</div>
<div style="margin-left:50px;margin-top:-45px;" href="perfil?pesquisa=<?php echo $datosAvaliador['username'];?>"><p style="line-height: 100%"><b><?php echo $datosAvaliador['username']; ?></b></div>
<a style="margin-left:50px;margin-top:-45px;" href="perfil?pesquisa=<?php echo $datosPerfil['username'];?>&excluirfavorito=<?php echo $datosPromo['id']; ?>"><b style="color: #919191"> (<span id="likes">Remover</span>)</b></a>							
</span> 
</div>
<?php }} ?>
</div>
</div>
</div>
</section><!--/#bottom-->
<?php include_once("Pagina/Foorte.php"); ?>