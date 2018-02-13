<?php
header("Content-Type: text/html; charset=utf-8",true); 
require_once('./data_classes/server-data.php_data_classes-core.php.php');
require_once('./data_classes/server-data.php_data_classes-session.php.php');
// COLOCA ESSAS 5 linhas abaixo para n&atilde;o dar erro (SEMPRE NO TOPO DA P&aacute;GINA)
$maintenance2 = mysql_num_rows(mysql_query("SELECT * FROM cms_settings WHERE mantenimiento = '1'"));
$useradmin2 = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'");
$useradmin = mysql_fetch_array($useradmin2);
$palavrasbloqueadas=file_get_contents('./Files/PalavrasBloqueadas.txt');
if($maintenance2 == '1' && $useradmin['rank'] < 5){
		header("Location: manutencao");
}
	
if($_GET['excluircomment']!="")
{
mysql_query("DELETE FROM cms_comment WHERE id='" . $_GET['excluircomment'] . "'") or die(mysql_error()); 
mysql_query("DELETE FROM cms_likes_comments WHERE id_comment='" . $_GET['excluircomment'] . "'") or die(mysql_error()); 
} 
	
// INSERE O QUE FOR NECESS&aacute;RIO AO POSTAR ... (N&atilde;O ALTERE ISSO POIS FOI FEITO PARA EVITAR BURLAGENS E FOI UNICO JEITO QUE FUNCIONOU!!!!!!!!)

if(isset($_POST['comment']))
{
	$valor = $_POST['rank'];
$nome = $_SESSION['username'];;
	$conteudo = HoloText($_POST['comment']);
	
	if(eregi(HoloText($_POST['comment']), $palavrasbloqueadas) == true){
		echo"<script>alert('Voc&ecirc; digitou uma palavra bloqueada em nosso servidor.')</script>";
	}else{
		
mysql_query("INSERT INTO cms_comment (nome,comentario,id_news,titulo_noticia,type)
			VALUES ('". $nome ."','". $conteudo ."','" . $_GET['id_post'] . "','POSTAGEM','post')") or die(mysql_error());
			
			$postsaasdSQL= mysql_query("SELECT * FROM cms_posts WHERE id='" . $_GET['id_post'] . "'");
			$postsaasd = mysql_fetch_array($postsaasdSQL);
mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $useradmin['id'] . "','" . $postsaasd['nome'] . "','postagem?id=" . $_GET['id_post'] . "','" . time() . "','Comentou na sua publica&ccedil;&atilde;o')");
			header("Location: principal");
}
}

// INSERE O QUE FOR NECESS&aacute;RIO AO CURTIR UM COMENT&aacute;RIO ... (N&atilde;O ALTERE ISSO POIS FOI FEITO PARA EVITAR BURLAGENS E FOI UNICO JEITO QUE FUNCIONOU!!!!!!!!)
	if($_GET['likecomment']!="")
{
	$iiiii = mysql_query("SELECT * FROM cms_comment WHERE id = '" . $_GET['likecomment'] . "' LIMIT 1");
	$faa22 = mysql_fetch_array($iiiii);
	
	$iiiii2 = mysql_query("SELECT * FROM cms_likes_comments WHERE id_comment = '" . $faa22['id'] . "'");
	$faa2 = mysql_fetch_array($iiiii2);
	
	if($faa2['nome'] != $_SESSION['username']){
mysql_query("INSERT INTO cms_likes_comments (nome,id_comment) VALUES ('" . $_SESSION['username'] . "','" . $faa22['id'] . "')"); 
mysql_query("UPDATE cms_comment SET curtidas=curtidas + 1 WHERE id = '" . $faa22['id'] . "'") or die(mysql_error()); 
mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $useradmin['id'] . "','" . $faa2['nome'] . "','postagem?id=" . $faa22['id_post'] . "','" . time() . "','Curtiu seu coment&aacute;rio')");
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
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">   
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Habbz agora com função de beijar na boca, Efeito tirar roupa, Raros Limitados, Eventos diariamente e promoções, 99999 Créditos e Boias."/>
<meta name="keywords" content="habbo hotel, hotel, Habbzhotel, Habbz, habblet, jogos online, habbo"/>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="By Thiago Araujo equipe CoreDev Habbz" />
<link rel="shortcut icon" href="favicon.ico" />
<title><?php echo $Hotelname; ?> ~ O melhor dos melhores</title>
<!-- CSS DA CMS -->
<link rel="stylesheet" href="Lala/Lalacss/index.css?t=1500919943"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/Externos/css/me/index.css" type="text/css"/>
<link href="/Externos/css/bootstrap.css" rel="stylesheet" type="text/css" /> 
<link href="/Externos/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
<link href="/Externos/css/me/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="/Externos/css/me/bootstrap.theme.min.css" rel="stylesheet" type="text/css"/>
<link href="/Externos/css/me/bootstrap-notifications.min.css" rel="stylesheet" type="text/css"/>
<link href="/Externos/css/me/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<!-- JS DA CMS -->
<script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="Lala/Lalajs/global.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/script"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js" type="text/script"></script>
<body>
<?php require_once('Thiago/licencia.php'); ?>
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

            .onlineUsersNumber {
                font-size:22px;
                font-weight:bold;
                color:#474747;
                font-family:sans-serif;

                -webkit-animation: change-color 4s linear 0s infinite normal ;
                animation: change-color 4s linear 0s infinite normal ;
            }
</style>	
</head>
<body>
<section id="bottom">
<div id="landing">
<div class="top_sectionthiago" style="background:url(/themes/images/fondo.png) repeat-x fixed bottom;animation: header_color 25s infinite; 
-webkit-animation: header_color 25s infinite;" >
<div class="background_leftthiago" 
"></div>
<div class="background_top">
<div id="contain">
<img class="onlineUsersNumber" style="margin-top:10px; left:5%; position: relative;" src="Externos/img/logo.gif" alt="logo"/>
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
<div id="bot_mod" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="ConfiguraÃ§Ã£es">Conf</div>
<ul class="dropdown-menu" style="margin-left:-80%; margin-top:35%;">
<li><a href="/settings">ConfiguraÃ§Ãµes</a></li>
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
<nav class="navbar navbar-default">
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
<li><a href="/me"><span class="glyphicon glyphicon-home"></span> &nbsp;PÃ¡gina Inicial</a></li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-plus"></span> &nbsp;Comunidade<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="/vip.php"><i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp;Planos Vips</a></li>
<li><a href="/viprank"><i class="fa fa-id-card" aria-hidden="true"></i> &nbsp;Vips do Hotel</a></li>
<li><a href="/noticias?id="><i class="fa fa-newspaper-o" aria-hidden="true"></i> &nbsp;NotÃ­cias</a></li>
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
<ul class="nav navbar-nav navbar-right">
<?php 
$notificacaoSQL=mysql_query("SELECT * FROM notificacao WHERE recebedor = '" . $useradmin['id'] . "'");
$notificacao = mysql_fetch_array($notificacaoSQL);
?>
<li><a href="#" id="notificationsNew" data-toggle="collapse" data-target="#notificationsPop"  ><?php $numnotificacao = mysql_num_rows(mysql_query("SELECT * FROM notificacao WHERE recebedor = '" . $useradmin['id'] . "' AND visto='nao'")); ?> <?php echo $numnotificacao; ?> Notifica&ccedil;&otilde;es</a></li>				
<div class="popover fade" id="notificationsPop" style="width:275px; top: 98%; left: 75%;">		    
</a>
<h3 class="popover-title"style="width:272px;"><?php echo $numnotificacao; ?> Notifica&ccedil;&otilde;es</h3>
<div class="popover-content" style="position:relative; height:272px;width:272px;z-index:1; overflow: scroll">
<div>
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
</div>
 </div>
 <a href="" id="notificationsNew" data-toggle="collapse" onClick="history.go(0)" data-target="#notificationsPop"><center>ATUALIZAR</center></a>
<a href=""  data-toggle="collapse" data-target="#notificationsPop" style="color:red"><center>FECHAR</center></a>
<?php
 
if(isset($_POST['limpar']))
{
mysql_query("UPDATE notificacao SET visto = 'sim' WHERE recebedor = '" . $_SESSION['username'] . "'");
mysql_query("UPDATE notificacao SET visto = 'sim' WHERE recebedor = '" . $useradmin['id'] . "'");
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=principal'>";
}
 
 ?>
<form method="POST">
<button id="limpar" style="width:100%;" name="limpar" class="btn btn-primary">LIMPAR</button>
</form>
</div>
<div class="dropdown-footer text-center">
</div>
</li>
</nav>
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="panel panel-primary">
<div class="panel-heading" style="background-image: url(/Externos/img/f0b87001afb84f458e30e6af5a0a492a.png); background-position: center; padding-top: 20px; ">
<div class="row">
<div class="col-md-8">
<div class="media">
<div class="media-left media-middle">
<div style="background-image: url(http://www.avatar-retro.com/habbo-imaging/avatarimage?hb=img&figure=<?php echo $useradmin['look']; ?>&size=m&direction=2&head_direction=2&gesture=sml); background-position: -2px -20px; width:50px; height:50px;">
</div>
</div>
<div class="media-body">
<h4 class="media-heading" style="color: #fff; font-weight: bold;">
<?php echo $_SESSION['username']; ?>
</h4>
<?php echo $useradmin['motto']; ?></div>
</div>
</div>
<div class="col-md-4">
<div class="pull-right">
<a href="/client" target="habbinc_client" class="btn btn-success btn-lg" style="font-size:20px; height:50px; box-shadow:1px 1px 5px #000; ">Entrar no Hotel</a>
</div>
</div>
</div>
</div>
<div class="panel-footer">
<div class="row">
<div class="col-md-8">
<span style="color:#ffb638; font-weight: bold;"><i class="fa fa-circle" aria-hidden="true"></i><?php echo $useradmin['credits']; ?> Moedas</span> &nbsp;&nbsp;
<span style="color:#00d0ca; font-weight: bold;"><i class="fa fa-diamond" aria-hidden="true"></i><?php echo $useradmin['vip_points']; ?> Diamantes</span> &nbsp;&nbsp;
<span style="color:#f15b83; font-weight: bold;"><i class="fa fa-life-ring" aria-hidden="true"></i><?php echo $useradmin['activity_points'];?> Boias</span>
</div>
<div class="col-md-4">
<div class="pull-right">
<a href="/clientutils.php"><b><i class="fa fa-wrench" aria-hidden="true"></i> &nbsp;NÃ£o consegue entrar?</b></a>
</div>
</div>
</div>
<div class="clearfix"></div>
</div>
</div>
<style>
    .more-less {
        max-height:400px;
        overflow: hidden;
        position: relative;
    }
    .readMore {
        position:absolute;
        bottom:0px;
        z-index: 999;
        display: none;
        width: 100%;
        background-color: #FFFFD9;
        padding:5px;
        text-align: center;
    }

    hr {
        margin:5px 0px 5px 0px;
    }


    .fadeAe {
        transition: 0.5s linear all;
        -webkit-transition: 0.5s linear all;
    }

    .fadeAe.ng-enter {
        opacity: 0;
    }

    .fadeAe.ng-enter.ng-enter-active {
        opacity: 1;
    }

    .fadeAe.ng-leave {
        opacity: 1;
    }

    .fadeAe.ng-leave.ng-leave-active {
        opacity: 0;
    }

</style>
<?php
if($useradmin['LalaConf'] == 0) {
echo ("<div class='alert alert-info fade in'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Ops!</strong> VocÃª deve confirma seu email para pode posta um status!
</div>");
 }else{  
$palavrasbloqueadas=file_get_contents('PalavrasBloqueadas.txt');	 
if(isset($_POST['conteudopoststaff']))
{
$valor = $_POST['rank'];
$nome = $_SESSION['username'];;
$limite = (isset($_GET['limite'])) ? $_GET['limite'] : 2;
$conteudo = HoloText($_POST['conteudopoststaff']);
if($valor == 90909012){
mysql_query("INSERT INTO cms_posts (nome,conteudo,data,staff,type)
			VALUES ('". $nome ."','". $conteudo ."',".time().",'1','post')") or die(mysql_error());
}else{
	if(eregi(HoloText($_POST['conteudo']), $palavrasbloqueadas) == true){
		echo"<script>alert('Você digitou uma palavra bloqueada em nosso servidor.')</script>";
	}else{
mysql_query("UPDATE users SET cms_post = cms_post + '1' WHERE username = '" . $_SESSION['username'] . "'");
mysql_query("INSERT INTO cms_posts (nome,conteudo,data,staff,type)
			VALUES ('". $nome ."','". $conteudo ."',".time().",'0','post')") or die(mysql_error());
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
<div class="panel-heading" style="background-color: #75caeb; color:#FFF;"><span class="glyphicon glyphicon-home"></span> &nbsp; Atualizar Status</div>
<div class="panel-body">
<script type="text/javascript" src="http://tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
selector: "textarea",
plugins: [
"advlist autolink lists link image charmap print preview anchor",
"searchreplace visualblocks code fullscreen",
"insertdatetime media table contextmenu paste"
],
toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
<textarea name="conteudopoststaff" style="width:100%"></textarea>
</div>
<div class="panel-footer">
<div class="pull-left">
<select class="form-control" name="rank" style="width:150px">
<option value="1">Amigos</option>
<?php 
if($useradmin['rank'] > 4){?>
<option value="90908012">Post Staff</option>
<?php }?>
<?php 
if($useradmin['rank'] > 6){?>
<option value="90909012">Aviso Staff</option>
<?php }?>
</select><br>
<span class="glyphicon glyphicon-pushpin" aria-hidden="true"></span> <a data-toggle="collapse" data-target="#collapse" style="text-decoration:none;color:gray;">Regras de Utiliza&ccedil;&atilde;o</a>
<div id="collapse" class="collapse">
<h5 style="color:#545454">Quando postar quaisquer texto ou imagem na parte de rede social do site, voc&ecirc; estar&aacute; automaticamente concordando com os termos abaixo.
<b>Concordo</b> que irei:</h5><p style="color:#545454;"><h6> - Respeitar a privacidade dos outros jogadores, se comprometendo em n&atilde;o divulgar dados como: nome, email, telefone, localiza&ccedil;&atilde;o, foto, idade e demais informa&ccedil;&otilde;es pessoais.
<br>				- Respeitar a atual legisla&ccedil;&atilde;o do pais onde o jogo &eacute; rodado (Brasil), e leis como Marco C&igrave;vil da Internet.
<br>				- N&atilde;o informar suas informa&ccedil;&otilde;es pessoais, por mais que voc&ecirc; deseje.
<br>				- N&atilde;o divulgar links de outros jogos (sendo eles Habbo Hot&eacute;is ou apenas jogos) ou de sites que n&atilde;o respeitem as normas vigentes no Brasil.
<br>				- N&atilde;o divulgar links com temas relacionados &agrave;: terrorismo, armas, produtos qu&iacute;micos, bombas caseiras, conte&Uacute;do adulto, programas protegidos por direitos autorais, sites de assunto relacionado a hacking/cracking e decripta&ccedil;&atilde;o.
<br>				- N&atilde;o informar seu nome em outros Habbo Hot&eacute;is.
<br>				- N&atilde;o atacar jogadores diretamente.
<br>				- N&atilde;o tentar utilizar met&oacute;dos de hacking/cracking dentro desta rede social, tendo como penalidade bloqueio de IP.
<br>				- N&atilde;o divulgar m&Uacute;sicas (sendo elas com clipe ou n&atilde;o) que apresentem conota&ccedil;&atilde;o sexual, sendo nas imagens presentes ou na letra.
</p>
</h6>
</div>
</div>	
<div class="pull-right">
<button class="btn btn-primary" id="pubBtn" type="submit">Publicar</button>
</div>
<div class="clearfix"></div>
</div>
</div>
</form>
<?php
$i = 0;
$limite = (isset($_GET['limite'])) ? $_GET['limite'] : 1;
$e = mysql_query("SELECT * FROM cms_posts WHERE staff='1' ORDER BY id DESC LIMIT $limite");
 while($f = mysql_fetch_array($e)){ $i = $i +1;
 $e222 = mysql_query("SELECT * FROM users WHERE username='" . $f['nome'] . "'");
$usuario_post = mysql_fetch_array($e222);
	$id = $f['id'];
	if($_GET['like'] == $id)
{
	$iiiii = mysql_query("SELECT * FROM cms_posts WHERE id = '" . $id . "' LIMIT 1");
	$faa = mysql_fetch_array($iiiii);
	$iiiii2 = mysql_query("SELECT * FROM cms_likes_post WHERE id_post = '" . $id . "'");
	$faa2 = mysql_fetch_array($iiiii2);
	if($faa2['nome'] != $_SESSION['username']){
mysql_query("INSERT INTO cms_likes_post (nome,id_post) VALUES ('" . $_SESSION['username'] . "','" . $id . "')"); 
mysql_query("UPDATE cms_posts SET curtidas=curtidas + 1 WHERE id = '" . $id . "'") or die(mysql_error()); 
	mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $useradmin['id'] . "','" . $usuario_post['id'] . "','postagem?id=" . $id . "','" . time() . "','Curtiu sua publica&ccedil;&atilde;o')");
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=principal'>";
	}else{
	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=principal'>";
	}
	} 
?>
<div class="panel panel-default" id="postIdPanel12508" style="background-color: rgb(255, 255, 255);">
<div class="panel-body">
<div class="media"><div class="media-left media-top">
<div style="background-image: url(Externos/img/frank_welcome.gif); background-position: -2px -6px; width:65px; height:50px;">
</div></div>
<div class="media-body"><small><b>Equipe Habbz</b> fez um aviso</small><br><div class="more-less" onmouseover="resize(this)"><div class="more-block">
<p><?php 
$var = str_replace('&lt;', '<', $f['conteudo']);
$var = str_replace('&gt;', '>', $var);
$var = str_replace('&quot;', '"', $var);
echo $var; ?></p>
</div></div></div></div></div><div class="panel-footer"><div class="pull-right"><div class="dropdown"><a href="#" class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></a><ul class="dropdown-menu" aria-labelledby="dropdownMenu1"></div></div></div></div>
<div id="socialFeed">
</div>
<?php } ?>
<?php
 }
 //essa parte &eacute; onde faz a a&ccedil;&atilde;o da fun&ccedil;&atilde;o "CURTIR"
							$i = 0;
//Sistema de carrega mais poste by: Thiago Araujo "Servidores de SAO"
$limite = (isset($_GET['limite'])) ? $_GET['limite'] : 4;
$e = mysql_query("SELECT * FROM cms_posts WHERE staff='0' ORDER BY id DESC LIMIT $limite");

//INICIO DO WHILE DOS POSTS (AQUI MOSTRA TODOS OS POSTS EXISTENTES NA TABELA CMS_POSTS)
 while($f = mysql_fetch_array($e)){ $i = $i +1;
 
 //faz select do usuario que quer curtir
 
 $e222 = mysql_query("SELECT * FROM users WHERE username='" . $f['nome'] . "'");
$usuario_post = mysql_fetch_array($e222);
	$id = $f['id'];
	
	//pega o id da postagem que quer curtir
	if($_GET['like'] == $id)
{
	
	// faz o select do post
	$iiiii = mysql_query("SELECT * FROM cms_posts WHERE id = '" . $id . "' LIMIT 1");
	$faa = mysql_fetch_array($iiiii);
	//faz select da tabela onde fica os likes (PARA EVITAR MUITOS LIKES DE 1 PESSOA, ISSO FAZ A PESSOA CURTIR A PUBLICA&ccedil;&atilde;O 1 VEZ)
	$iiiii2 = mysql_query("SELECT * FROM cms_likes_post WHERE id_post = '" . $id . "'");
	$faa2 = mysql_fetch_array($iiiii2);
	if($faa2['nome'] != $_SESSION['username']){
		
		//SE O USUARIO LOGADO ATUALMENTE N&atilde;O CURTIU A POSTAGEM, ELE INSERE NA TABELA LIKES E FAZ UPDATE SOMANDO A QUANTIDADE DE LIKES NO POST
		
mysql_query("INSERT INTO cms_likes_post (nome,id_post) VALUES ('" . $_SESSION['username'] . "','" . $id . "')"); 
mysql_query("UPDATE cms_posts SET curtidas=curtidas + 1 WHERE id = '" . $id . "'") or die(mysql_error()); 

// MOSTRA NOTIFICA&ccedil;&atilde;O PARA A PESSOA QUE CRIOU O POST
	mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $useradmin['id'] . "','" . $usuario_post['id'] . "','postagem?id=" . $id . "','" . time() . "','Curtiu sua publica&ccedil;&atilde;o')");
echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=principal'>";
	}else{
		// SE A PESSOA ATUAL J&aacute; CURTIU, A P&aacute;GINA VAI RECARREGAR
	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=principal'>";
	}
	} 
?>

<div class="panel panel-default" id="postIdPanel30592">
<div class="panel-body">
<div class="media">
<div class="media-left media-top">
<div style="background-image: url(http://www.avatar-retro.com/habbo-imaging/avatarimage?hb=img&figure=<?php echo $usuario_post['look']; ?>&size=m&direction=2&head_direction=2&gesture=sml); background-position: -2px -17px; width:50px; height:50px;">
</div>
</div>
<div class="media-body">
<small>
<a href="perfil?pesquisa=<?php echo $f['nome']; ?>"><?php echo $f['nome']; ?></a> 
<img src="Externos/img/verified.png" title="Informativo Verificado" style="width:15px;height:15px;">&nbsp; fez uma <a href="postagem?id=<?php echo $f['id']; ?>" target="_blank">publica&ccedil;ao
<?php if($usuario_post['rank'] > 3){ ?>
<b><a href="/staff" style="color:#6abee8;"> STAFF </a></b>
<?php } ?>
<?php if($usuario_post['rank'] == 2){ ?>
<b><a href="/viprank" style="color:#6ae88b;"> VIP </a></b>
<?php } ?>
<?php if($usuario_post['rank'] == 3){ ?>
<b><a href="/viprank" style="color:#d56ae8;"> SVIP </a></b>
<?php } ?></a>
<div class="pull-right"><?php echo time_elapsed_B(time()-$f['data']); ?></div>
</small>
<br>
<div class="more-block">
<?php 
$var = str_replace('&lt;', '<', $f['conteudo']);
$var = str_replace('&gt;', '>', $var);
$var = str_replace('&quot;', '"', $var);
echo $var; ?>
</div>
</div></div></div>
<div class="panel-footer">
<a href="principal?like=<?php echo $id; ?>" style="color: #919191">
<span class="glyphicon glyphicon-thumbs-up"></span> <span id="likes"><?php echo $f['curtidas']; ?></span> Likes</a>
 &nbsp; &nbsp; <label data-toggle="collapse" data-target="#comentarios<?php echo $f['id']; ?>" ><span class="glyphicon glyphicon-comment"></span> &nbsp;<?php echo mysql_num_rows(mysql_query("SELECT * FROM cms_comment WHERE type='POST' AND id_news='" . $f['id'] . "'")); ?> Coment&aacute;rio(s)</label> 
 &nbsp; &nbsp;<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $hotel_url; ?>/postagem?id=<?php echo $f['id']; ?>" style="color: #919191"><span class="glyphicon glyphicon-share"></span> &nbsp;Compartilhar</a>
 &nbsp; &nbsp;<div class="pull-right">
 <div class="dropdown">
 <a href="#" class="dropdown-toggle" type="button" id="dropdownMenu<?php echo $id; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Op&ccedil;&otilde;es
 <span class="caret"></span>
 </a>
 <ul class="dropdown-menu" aria-labelledby="dropdownMenu<?php echo $id; ?>">
 <li>
 <a href="#">Denunciar</a>
 
 <?php 
// AQUI MOSTRA A OP&ccedil;&atilde;O DELETAR POST PARA QUEM TEM RANK MAIOR QUE 5
 
 $e2222 = mysql_query("SELECT * FROM users WHERE username='" . $_SESSION['username'] . "'");
$usuario = mysql_fetch_array($e2222);

if($usuario['rank'] > 3 || $f['nome'] == $useradmin['username']){ 
if($_GET['deletarpost'] == $id){
		mysql_query("DELETE FROM cms_posts WHERE id='" . $_GET['deletarpost'] . "' LIMIT 1");
		mysql_query("UPDATE users SET cms_post = cms_post - '1' WHERE username = '" . $_SESSION['username'] . "'");
		mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $usuario['id'] . "','" . $usuario_post['username'] . "','#','" . time() . "','Deletou sua publica&ccedil;&atilde;o')");
	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=principal'>";
}

?>
<li><a href="principal?deletarpost=<?php echo $id; ?>">Deletar Post</a>
<?php } ?>
</li></ul></div></div><p></p>
<div id="comentarios<?php echo $f['id']; ?>" class="fade collapse">
<hr style='margin: 5px 0px 5px 0px; margin-bottom:10px;'>
<?php
							$i2 = 0;
$e2 = mysql_query("SELECT * FROM cms_comment WHERE type='post' AND id_news='" . $f['id'] . "' ORDER BY id ASC");
// AQUI VERIFICA SE EXISTE ALGUM COMENT&aacute;RIO NESTE POST NA TABELA CMS_COMMENT SE O TYPE FOR 'POST'
 if(mysql_num_rows($e2) == 0){
?>
<div class="media" style="margin-top:-10px;">
<center>Nenhum coment&aacute;rio...</center>
</div>
<hr style="margin: 5px 0px 5px 0px;"> 
<p style="margin: 0 0 10px;"></p>
<?php
 }else{
	 // SE TIVER COMENT&aacute;RIO ELE VAI MOSTRAR TODOS ELES COM O CODIGO WHILE EM CIMA DO CODIGO SQL NA VARI&aacute;VEL $e2 E INCREMENTA 1 NO $i2 PARA N&atilde;O REPETIR O NAME DAS DIV's E BUGAR O SISTEMA
 while($f2 = mysql_fetch_array($e2)){ $i2 = $i2 +1;
 $e2222 = mysql_query("SELECT * FROM users WHERE username='" . $f2['nome'] . "'");
$usuario_comment = mysql_fetch_array($e2222); ?>
<div class="media" style="margin-top:-10px;">
<div class="media-left media-top">
<div style="background-image: url(http://www.avatar-retro.com/habbo-imaging/avatarimage?hb=img&figure=<?php echo $usuario_comment['look']; ?>&amp;size=s&amp;direction=2&amp;head_direction=2&amp;gesture=sml); background-position: -2px -7px; width:25px; height:30px;"></div></div>
<div class="media-body" style="max-width:720px"><a href="perfil?pesquisa=<?php echo $f2['nome']; ?>"><?php echo $f2['nome']; ?></a>
<?php echo $f2['comentario']; ?>
<br><small><a href="?likecomment=<?php echo $f2['id']; ?>" onclick="doCommentLike(13393,this, 30592); return false;" style="color: #919191"><span class="glyphicon glyphicon-thumbs-up"></span> &nbsp;Legal (<span id="likes"><?php echo $f2['curtidas']; ?></span>)</a> &nbsp; &nbsp;</small>
<?php 
// SE O RANK FOR MAIOR QUE 4 VAI PODER EXCLUIR O POST
if($useradmin['rank'] > 4){?>
<small><a href="?excluircomment=<?php echo $f2['id']; ?>" onclick="doCommentLike(13393,this, 30592); return false;" style="color: #919191"> (<span id="likes">Excluir</span>)</a> &nbsp; &nbsp;</small>
 <?php }?>
</div>
</div>
<hr style="margin: 5px 0px 5px 0px;"> 
<p style="margin: 0 0 10px;"></p>
<?php }} ?>
</div>
<?php
?>
<form method="POST" action="?id_post=<?php echo $f['id']; ?>" class="form-inline">  
<div class="media">
<div class="media-left media-top">
<div style="background-image: url(http://www.avatar-retro.com/habbo-imaging/avatarimage?hb=img&figure=<?php echo $useradmin['look']; ?>&amp;size=s&amp;direction=2&amp;head_direction=2&amp;gesture=sml); background-position: -2px -7px; width:25px; height:30px;"></div>
</div><div class="media-body">
<div class="col-md-9"><input type="text" name="comment" required class="form-control" placeholder="Escreva um coment&aacute;rio..." style="width:105%;"/></div>&nbsp; <div class="col-md-3"> <button type="submit" style="margin-top:-20px;" class="btn btn-default">Publicar</button></div></a>
</div></div></form></div></div>
<?php } //FIM DO WHILE DOS POSTS ?>
<script type="text/javascript">
$(document).ready(function(){
   $("#carregar_mais").click(function(){
       //Sistema de carrega mais poste by: Thiago Araujo "Servidores de SAO"
       window.location.href = '/me?limite=<?php echo $limite+2;?>';
   });
});
</script>
<center><p type="button" class="btn btn-success" id="carregar_mais" style="color:white; cursor:pointer;">Carregar mais 2 [<?php echo $limite;?>]</p></center>
<!-- Este echo &eacute; s&oacute; para exibir em quanto est&aacute; meu LIMIT //Sistema de carrega mais poste by: Thiago Araujo "Servidores de SAO"-->
</div>
<div class="col-md-4 my-column">
<?php 
if($useradmin['LalaConf'] == 0){?>
<div class="alert alert-warning">
<?php
 
if(isset($_POST['enviaemail']))
{
$aleatorio = rand(5, 10); // 5 À 10 CARACTERES
$valorthiago = substr(str_shuffle("AaBbCcDdEeFfGgHhIiJjKkLlMmNnPpQqRrSsTtUuVvYyXxWwZz0123456789"), 0, $aleatorio);
$buscar_usuario = mysql_query("SELECT * FROM users WHERE username='" . $_SESSION['username'] . "' AND LalaConf='0'");
$verifica = mysql_num_rows($buscar_usuario);
while($relatorio = mysql_fetch_array($buscar_usuario)){
$id = $relatorio['id'];
$usuario = $relatorio['username'];
$remetente = $relatorio['mail'];
$data = $relatorio['account_created'];

		}
		if($verifica == 0){
						echo ("<div class='alert alert-danger fade in'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Erro!</strong> Essa conta ja esta confirmada!
</div>");

		}else{
		mysql_query("UPDATE users SET Lalacodcon = '".$valorthiago."' WHERE username = '" . $_SESSION['username'] . "'");

			$assunto = 'Habbz - Confirmar Email';
			
			
			$mensagem  = '<span style="font-family:\'Trebuchet MS\'; font-size:26px; color:#333; font-weight:bold;">Habb</span><span style="font-family:\'Trebuchet MS\'; font-size:26px; color:#666; font-weight:bold;">z</span><br><br>';			
			$mensagem .= 'Olá <b>'.$usuario.'</b>, confira seus dados:<br>';
			$mensagem .= '<b>Usuário: </b>'.$usuario.'<br>';
			$mensagem .= '<b>Email: </b>'.$remetente.'<br>';
			$mensagem .= '<b>Senha: </b>.......<br>';
			$mensagem .= '<b>Código: </b>'.$valorthiago.'<br>';
			$mensagem .= '<b>Para confirma sua conta clique <a href="http://Habbz.biz/confconta.php">aqui</a>, e coloque seu nick, e-mail e o codigo.</b></br>';
			$mensagem .= '<br>';
			$mensagem .= 'Atenciosamente, Suporte/moderação - Habbz<br><br>';
			$mensagem .= 'Caso você não tenha solicitado a confirmaÃ§Ã£o de senha, iguinore este email.<br>';
			$mensagem .= 'Esta é uma mensagem automática, por favor não responda!';
			
			$extras = 'MIME-Version: 1.0' . "\r\n" .
					  'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
					  'From: Habbz Suporte <OficialHabbz@habbz.biz>';
			
			mail($remetente, $assunto, $mensagem, $extras);
			
						
			echo ("<div class='alert alert-success fade in'>
 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Enviado!</strong> VocÃª acaba de envia um confirmaÃ§Ã£o de conta para o seu email !
</div>");
}
}
 
 ?>
<form method="POST">
<span class="glyphicon glyphicon-alert" aria-hidden="true"></span>&nbsp;
VocÃª precisa verificar seu e-mail, <b>
<a style="color:#fff;">Logo abaixo!</a>
<button id="enviaemail" style="width:100%;" name="enviaemail" class="btn btn-primary">ENVIAR CONFIRMAÃ§Ã£o DE EMAIL</button>
</b> para enviar o e-mail de confirmaÃ§Ã£o, 
ou se preferir, vocÃª pode <b><a style="color:#fff;" href="/settings?page=changemail">alterar seu email aqui</a></b>.
</form>
</div>
<?php } ?>
<?php
$to5 = mysql_query("SELECT * FROM cms_news ORDER BY id DESC LIMIT 5");
$i = 0; while($newsobject = mysql_fetch_assoc($to5)){ $i++;

$ii=$i-1;
if($i==1){
 ?>
            <style>
    .visitedUrls {
        font-weight: bold;
    }
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
        width: 100%;
        margin: auto;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }.carousel-caption {
        left:10px;
        top: 0;
        text-align: left;
        max-width: 250px;
        right: auto;
        padding:5px;
    }
    .carousel-control.left, .carousel-control.right {
        top: auto;
        bottom: 20px;
        background-image: none
    }
    .carousel-inner h3 {
        font-size:18px;
        color: #fff;
        font-weight: bold;
    }
    .carrousel-inner p {
        font-size: 12px;
    }
    #carousel {
        width: 100%;
    }
    .table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
        background-color: #eaeaea;
    }
</style>

<div id="carousel" class="carousel slide" data-ride="carousel">
<div class="carousel-inner" role="listbox">
<div class="item active">
<img src="<?php echo $newsobject['image']; ?>">
<div class="carousel-caption">
<h3><a style="text-decoration:none;color:#FFF" href="/noticias?id=<?php echo $newsobject['id'];?>"><?php echo $newsobject['title']; ?></a></h3>
<p><?php echo $newsobject['shortstory']; ?> </p>
<p><a style="color:#FFF" href="/noticias?id=<?php echo $newsobject['id'];?>">Leia mais Â»</a></p>
</div>
<div class="menuSpace" style="background-color:#000;width:100%;margin-top:-40px;height:40px;opacity:0.7"></div>  
</div>
<?php }else{ ?>
<div class="item">
<img src="<?php echo $newsobject['image']; ?>">
<div class="carousel-caption">
<h3><a style="text-decoration:none;color:#FFF" href="/noticias?id=<?php echo $newsobject['id'];?>"><?php echo $newsobject['title']; ?></a></h3>
<p><?php echo $newsobject['shortstory']; ?></p>
<p><a style="color:#FFF" href="/noticias?id=<?php echo $newsobject['id'];?>">Leia mais Â»</a></p>
</div>
<div class="menuSpace" style="background-color:#000;width:100%;margin-top:-40px;height:40px;opacity:0.7"></div>  
</div>
<?php } ?>
<?php } ?>
<div class="menuSpace" style="background-color:#000;width:100%;margin-top:-40px;height:40px;opacity:0.7"></div>  
<a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left" style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;font-size:15px" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#carousel" role="button" data-slide="next">
<span class="glyphicon glyphicon-chevron-right" style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;font-size:15px" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
</div>
</div>
<?php
$to5 = mysql_query("SELECT * FROM cms_news ORDER BY id DESC LIMIT 5");
$i = 0; while($newsobject = mysql_fetch_assoc($to5)){ $i++;

$ii=$i-1;
if($i==1){
 ?>
<div class="panel panel-default">
<table class="table table-hover table-striped">
<tr>
<td style="padding:5px 15px; font-size: 14px;">
<a style="color:#636363; text-decoration: none;" href="/noticias?id=<?php echo $newsobject['id'];?>">
<?php echo $newsobject['title']; ?> Â»
</a>
<br>
<small style="color: #a2a2a2">
<?php 
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Brasilia');
// Caso não queira letras maiúsculas no início de algumas palavras, pode ser usado apenas assim:
echo utf8_encode(strftime('%A dia %d de %B', $newsobject['date']))
?></small>
</td>
</tr>
<?php }else{ ?>
<td style="padding:5px 15px; font-size: 14px;">
<a style="color:#636363; text-decoration: none;" href="/noticias?id=<?php echo $newsobject['id'];?>">
<?php echo $newsobject['title']; ?> Â»
</a>
<br>
<small style="color: #a2a2a2">
<?php 
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Brasilia');
// Caso não queira letras maiúsculas no início de algumas palavras, pode ser usado apenas assim:
echo utf8_encode(strftime('%A dia %d de %B', $newsobject['date']))
?></small>
 </td>
</tr>
<?php } ?>
<?php } ?>
<script>
 $('#carousel').carousel();
</script>
</table>
<div class="panel-body" style="padding:5px;">
<div class="pull-right"><a href="/noticias?id=<?php echo $newsobject['id'];?>">Mais noticiais Â»</a></div>
</div>
</div>
<div class="panel panel-warning" ng-controller="trendingController" ng-cloak>
<div class="panel-heading"><i class="fa fa-hashtag" aria-hidden="true"></i> Rank do Forum</div>
<?php
$e = mysql_query("SELECT username,look,cms_post,id FROM users WHERE cms_post > 0 ORDER BY cms_post DESC LIMIT 5");
while($f = mysql_fetch_array($e)){
?>
<a class="list-group-item" style="text-decoration: none;" href="/hall?<?php echo $f['username']; ?>">
<div class="media">
<div class="media-left">
<div style="background-image: url(http://www.avatar-retro.com/habbo-imaging/avatarimage?hb=img&figure=<?php echo $f['look']; ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3); background-position: -8px -17px; width:50px; height:50px;">
</div>
</div>
<div class="media-body">
<b><?php echo $f['username']; ?>                                                   </b>
<br>
<span style="color:#f98d2f;"><i class="fa fa-comment-o" aria-hidden="true"></i> <?php echo $f['cms_post']; ?> Poste na CMS</span>
</div>
</div>
</a>
<?php } ?>
</div>
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">Referidos (
<?php 
if(!isset($_GET['n'])){
$usuario = $_SESSION['username'];
}
else{
$usuario = mysql_real_escape_string($_GET['n']);
}
$query = mysql_query("SELECT * FROM users WHERE username ='". $usuario ."'") or die(mysql_error()); 
$data = mysql_fetch_assoc($query); echo $data['referidos']; 
?>)</h3>
</div>
<div class="panel-body">
<h4 style="margin-top:0px;"><span style="color:#f15b83; font-weight: bold;"><i class="fa fa-life-ring" aria-hidden="true"></i></span> Pontos de referidos: <a href="/loja"><?php echo $useradmin['referidos'];?> Referido(s)</a></h4>       
<p>Chame novas pessoas para o hotel usando o seu link de referencia e ganhe de 1 a 2 pontos de referidos a cada novo cadastro.</p>
<div class="form-group">
<form>
<small>Link de referencia:</small>
<input type="text" onClick="this.select();" class="form-control" value="<?php echo $hotel_url.'/refer.php?r='.$_SESSION['username']; ?>" readonly="readonly" /> 
</form>
</div>
</div>
</div>            
<div class="panel panel-info">
<div class="panel-heading">TOP 5 Diamantes ONLINE</div>
<div class="list-group">
<?php
$e = mysql_query("SELECT username,look,vip_points,id FROM users WHERE rank < 4 ORDER BY vip_points DESC LIMIT 5");
while($f = mysql_fetch_array($e)){
?>
<a class="list-group-item" style="text-decoration: none;" href="/hall?<?php echo $f['username']; ?>">
<div class="media">
<div class="media-left">
<div style="background-image: url(http://www.avatar-retro.com/habbo-imaging/avatarimage?hb=img&figure=<?php echo $f['look']; ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3); background-position: -8px -17px; width:50px; height:50px;">
</div>
</div>
<div class="media-body">
<b><?php echo $f['username']; ?>                                                   </b>
<br>
<span style="color:#00d0ca;"><i class="fa fa-diamond" aria-hidden="true"></i> <?php echo $f['vip_points']; ?> Diamantes</span>
</div>
</div>
</a>
<?php } ?>
</div>
</div><div class="panel panel-success">
<div class="panel-heading">TOP 5 Moedas ONLINE</div>
<div class="list-group">
<?php
$e = mysql_query("SELECT username,look,credits,id FROM users WHERE rank < 4 ORDER BY credits DESC LIMIT 5");
while($f = mysql_fetch_array($e)){
?>
<a class="list-group-item" style="text-decoration: none;" href="/hall?<?php echo $f['username']; ?>">
<div class="media">
<div class="media-left">
<div style="background-image: url(http://www.avatar-retro.com/habbo-imaging/avatarimage?hb=img&figure=<?php echo $f['look']; ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3); background-position: -8px -17px; width:50px; height:50px;">
</div>
</div>
<div class="media-body">
<b><?php echo $f['username']; ?>                            </b>
<br>
<span style="color:#ffb638;"><i class="fa fa-circle" aria-hidden="true"></i> <?php echo $f['credits']; ?> Moedas</span>
</div>
</div>
</a>
<?php } ?>
</div>
</div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=1651229915136553";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="panel panel-primary">
<div class="panel-heading">Facebook</div>
<center><div class="fb-page" data-href="https://www.facebook.com/habbzhotell" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/habbzhotell" class="fb-xfbml-parse-ignore"></blockquote></div></center>
</div>
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title">Compartilhe e ganhe</h3></div>
<div id="text">
<br><br>
<center><button class="btn btn-success" onclick="shareOnFacebook()" style="color:white; cursor:pointer;">Compartilhar</button></center>
<br><br>
<script>
// Script Prodution 45581515523145 BY: Thiago Araujo
			  window.fbAsyncInit = function() {
			    FB.init({
			      appId                : "106735026666283",
			      status               : true,
			      cookie               : true, 
			      xfbml                : true,  
			      perms                : 'read_stream',
			      access_token         : "b8e9997a385d9a40a702059b026a12b",
			      frictionlessRequests : true
			    });
			  };

			  (function(d, s, id) {
			    var js, fjs = d.getElementsByTagName(s)[0];
			    if (d.getElementById(id)) return;
			    js = d.createElement(s); js.id = id;
			    js.src = "//connect.facebook.net/pt_BR/all.js";
			    fjs.parentNode.insertBefore(js, fjs);
			  }(document, 'script', 'facebook-jssdk'));
			
			function shareOnFacebook() {
			    FB.ui(
			      {
			        method        : 'feed',
			        display       : 'iframe',
			        name          : 'habbz Hotel',
			        link          : 'http://habbz.biz/',
			        picture       : 'https://image.prntscr.com/image/PYT_0wkiT2mLGAIVtoZPtQ.png',
			        caption       : 'http://habbz.biz/',
			        description   : 'Acesse agora mesmo o habbz.',
			        access_token  : 'b8e9997a385d9a40a702059b026a12b'
			      },
			      function(response) {
			        if (response && response.post_id) {
						
			          $.ajax({
						 url: "me.php",
						type: "POST",
						data: {publish:1},
						success: function(data){
							alert(data);
						}
						  
					  });

			        } else {
			          alert('.....!');
			        }
			      }
			    );
			  }
</script>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include_once("Pagina/Foorte.php"); ?>
</body>
</html>