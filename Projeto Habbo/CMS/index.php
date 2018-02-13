<?php 
header("Content-Type: text/html; charset=utf-8",true); 
require_once('./data_classes/server-data.php_data_classes-core.php.php'); 
$maintenance2 = mysql_num_rows(mysql_query("SELECT * FROM cms_settings WHERE mantenimiento = '1'"));
if($maintenance2 == '1'){
		header("Location: manutencao");
} else{
if (isset($_SESSION['username'])) {
header("location: $path/principal");
}

if($_SESSION['confirmacao']=="AGUARDANDO"){
			$login_fehler = "Faça login para confirmar sua conta...";
}
$ip_check = mysql_query("SELECT ip_last,username,id FROM users WHERE ip_last = '".$remote_ip."'");
	$page = HoloText($_GET['p']);
if(isset($_REQUEST['credentials_username']) && isset($_REQUEST['credentials_password']))
{
	if(empty($_REQUEST['credentials_username']))
	{
		$login_fehler = "Entre com seu nome e senha para login.";
	}
	elseif(empty($_REQUEST['credentials_password']))
	{
		$login_fehler = "Digite sua senha.";
	}
	
	else
	{
	
		if(isset($_COOKIE['password']))
		{
			$pwd = HoloText($_REQUEST['password']);
		}
		else
		{
			$pwd = HoloText($_REQUEST['credentials_password']);
		}
		$userq = mysql_query("SELECT username,password FROM users WHERE username = '".HoloText($_REQUEST['credentials_username'])."' AND password = MD5(SHA1(MD5('".$pwd."'))) LIMIT 1");
		if(mysql_num_rows($userq) == 1)
		{
			$user = mysql_fetch_assoc($userq);
			
			$banq = mysql_query("SELECT * FROM bans WHERE value = '".HoloText($_REQUEST['credentials_username'])."' OR value = '".$_SERVER['REMOTE_ADDR']."' AND expire > '".time()."' LIMIT 1");
				$ban = mysql_fetch_assoc($banq);
			if(mysql_num_rows($banq) > 0)
			{						
				$login_fehler = "Você foi banido pelo seguinte motivo: <b>".$ban['reason']."</b> . at� <b>".date("d/m/Y H:i:s", $ban['expire'])."</b>";
			
			}else{
			
				$_SESSION['username'] = $user['username'];
				$_SESSION['password'] = $user['password'];
				
				if (isset($page)) { 
										header("location: $path/$page");
										}
										else {
										header("location: principal");
										}
										
			}
		}
		else
		{
			$login_fehler = "Sua senha e seu nome não conferem.";
		}
	}
}
}

$userrecomendacaoSQL1 = mysql_query("SELECT * FROM cms_comment WHERE type = 'recomendacao' AND ativo='1'");
$userrecomendacao1 = mysql_fetch_array($userrecomendacaoSQL1);
$userrecomendacaoSQL = mysql_query("SELECT * FROM users WHERE id = '" . $userrecomendacao1['nome'] . "'");
$userrecomendacao = mysql_fetch_array($userrecomendacaoSQL);

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">   
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Habbz agora com fun��o de beijar na boca, Efeito tirar roupa, Raros Limitados, Eventos diariamente e promo��es, 99999 Cr�ditos e Topázios."/>
<meta name="keywords" content="habbo hotel, hotel, Habbzhotel, Habbz, habblet, jogos online, habbo"/>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
<link rel="shortcut icon" href="/favicon.ico">
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

/* Ocultar bot�n radio */
input[id^="spoiler"] {
display: none;
}
/* Estilo bot�n clicable */
input[id^="spoiler"] + label {
display: block;
width: 200px;
margin: 0 auto;
padding: 5px 20px;
background: #e1a;
cursor: pointer;
}
/* Estilo bot�n cuando su INPUT está seleccionado */
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
</head>
<body ng-app="formApp">
<div style="background:url(Externos/img/fondo.png) repeat-x fixed bottom;animation: header_color 25s infinite; 
-webkit-animation: header_color 25s infinite;" ng-controller="gameHeaderController"  ng-cloak>
<div class="container">   
<div class="row">
<div class="col-md-2">
<a class="navbar-brand" href="#" style="padding:20px;">
<img src="Externos/img/logo.gif">
</a>
</div>
<div class="col-md-6">
<div class="pull-left">
</div>
</div>
<div class="col-md-4">
<div class="pull-right">
<div style="margin:10px 10px 10px 0px; padding:10px; text-align: center; background-color: #fff; border-radius: 5px;">
<div style="padding: 6px; width: 60px;  line-height: 80%;">
<span class="onlineUsersNumber"><?php echo $UsersOnline; ?></span>
<small ng-show="<?php echo $UsersOnline; ?> !== 0">
<i ng-show="<?php echo $UsersOnline; ?> > 0" style="color:#459b4a" class="fa fa-level-up" aria-hidden="true"></i>
<i ng-show="<?php echo $UsersOnline; ?> < 0" style="color:#c43c3c" class="fa fa-level-down" aria-hidden="true"></i>
</small>
<br>
<small>online</small>
</div>
</div>
</div>
</div>
</div>  
</div> 
</div>  
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
<li><a href="/index"><span class="glyphicon glyphicon-home"></span> &nbsp;Página Inicial</a></li>
<li><a href="/register"><span class="glyphicon glyphicon-home"></span> &nbsp;Registro</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
<li></li>
</ul>
</div>
</div>
</nav>
<div class="container">
<div class="row">
<div class="col-md-4">
<div class="panel panel-primary" >
<div class="panel-heading" style="background-image: url('Externos/img/fondo1.gif'); background-position: center; height:50px; ">
<h4 style="color:#fff; font-weight: bold; margin:0px; padding: 5px;">Entrar</h4>
</div>
<div class="panel-footer">
<div class="row">
<div class="col-md-12">
<div id="login-form-container">
<?php	
if(isset($login_fehler)){	
echo "<div class='alert alert-danger fade in'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Erro!</strong> $login_fehler
</div>";
}
?>
<form class="form" name="logindd" id="logindd" action="" method="post" >
<div class="form-group ">
<label for="exampleInputName2"><small>Usuário</small></label>
<input type="text" class="form-control" name="credentials_username" id="credentials_username" placeholder="Usuário" value="">
</div>
<div class="form-group">
<label for="exampleInputEmail2"><small>Senha</small></label>
<input type="password" class="form-control" name="credentials_password" id="credentials_password" placeholder="Senha">
</div>
<div class="form-group">
<button type="submit" class="btn btn-success" name="login">Entrar</button>
<a class="btn btn-primary" href="/register">Crie uma conta</a>
</div>
<small><a href="/recpassword.php">Recuperar senha</a></small>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-8">
<div class="panel panelea-default" >
<div class="panel-body" style="border-radius: 5px; color:#fff;background-position: center; background-image: url('Externos/img/eaa7b3b7bf684c1fa4e93320c4ac2553.png')">
<div class="col-md-7" style="font-family: sans-serif; font-size: 16px;">
<h3 class="media-heading" style="color: #fff; font-family: sans-serif; font-weight: bold; margin-bottom:15px; margin-top: 10px;">
Este é o Habbz Hotel!
</h3>
O que está esperando para entrar no Hotel?
</div>
<div class="col-md-5">
<a href="/register" class="btn btn-success btn-lg btn-block" style="margin-top: 8px;  box-shadow:1px 1px 5px #000;">
Ainda não se cadastrou?
<h3 style="margin:0;padding:0; color: #fff;font-weight: bold;">Crie uma conta</h3>
</a>                        
</div>
</div>
</div>
<div class="panel panelea-default" >
<div class="panel-body" style="border-radius: 5px; color:#fff; background-image: url('Externos/img/c9f00e1364a24d86ad5e7ad367d64598.png')">
<img src="Externos/img/habboway_2a.png" style="float:left; margin-top:10px;">
<h3 class="media-heading" style="color: #fff; font-family: sans-serif; font-weight: bold; margin-bottom:15px; margin-top: 10px;">
Mais de 1 milhão de jogadores
</h3>
<p>
<i class="fa fa-check-circle" aria-hidden="true"></i> O jogo é totalmente grátis, você nunca precisará pagar<br>
<i class="fa fa-check-circle" aria-hidden="true"></i> Cadastre-se <b>HOJE</b> e ganhe <b>50 mil moedas</b><br>
<i class="fa fa-check-circle" aria-hidden="true"></i> A cada 15 minutos online, ganhe 5 mil moedas!<br>
<i class="fa fa-check-circle" aria-hidden="true"></i> Eventos 24h por dia, 7 dias por semana<br>
<i class="fa fa-check-circle" aria-hidden="true"></i> Visuais e mobilias sempre atualizadas<br>
<i class="fa fa-check-circle" aria-hidden="true"></i> Uma rede social dentro do hotel, envie mensagem, fotos, videos!<br>
</p>
</div>
</div>
</div>
</div>
<div class="row">
<blockquote style="margin:0px;">
<h3 style="color:#5f5f5f;font-weight: bold;" >Noticias quentinhas! <small>Veja o que está acontecendo no Hotel...</small></h3>
</blockquote>
<?php
$to5 = mysql_query("SELECT * FROM cms_news ORDER BY id DESC LIMIT 12");
$i = 0; while($newsobject = mysql_fetch_assoc($to5)){ $i++;

$ii=$i-1;
if($i==1){
 ?>
<div  style="border-radius: 5px; padding: 10px; width: 16.1%; height:90px; margin-left:0.5%; margin-bottom:5px; overflow:hidden; background-image: url('<?php echo $newsobject['image']; ?>'); float:left; ">
<a style="text-decoration:none" href="/noticias?id=<?php echo $newsobject['id'];?>" target="_blank"><h4 style="color:#fff; margin:0px; font-weight: bold;"><?php echo $newsobject['title']; ?></h4></a>
<p style="color:#fff; margin-top:5px; font-size:12px;"><?php echo $newsobject['shortstory']; ?></p>
</div>
<?php }else{ ?>
<div  style="border-radius: 5px; padding: 10px; width: 16.1%; height:90px; margin-left:0.5%; margin-bottom:5px; overflow:hidden; background-image: url('<?php echo $newsobject['image']; ?>'); float:left; ">
<a style="text-decoration:none" href="/noticias?id=<?php echo $newsobject['id'];?>" target="_blank"><h4 style="color:#fff; margin:0px; font-weight: bold;"><?php echo $newsobject['title']; ?></h4></a>
<p style="color:#fff; margin-top:5px; font-size:12px;"><?php echo $newsobject['shortstory']; ?></p>
</div>
<?php } ?>
<?php } ?>
</div>
<div id="footer_placeholder">
<span class="information_section" style="position:relative; z-index:60;left:-4%;">
<a href='#'>Habbz Hotel</a> | <a href='/info/termos.php'>Termos e Condi&ccedil;&otilde;es</a> | <a href='/info/privacidade.php'>Pol&iacute;tica de Privacidade</a>
<span class="smallprint">
Habbz Hotel <b>&copy;</b> 2017 ~ Powered by <b>CoreDev - Thiago Araujo</b><br/> Habbz n&atilde;o &eacute; afiliado ou parte da Sulake Corporation. Todos direitos reservados aos respectivos autores. <br/><br/>
</span></span>
<span class="poweredby_section"></span></div>
</div></div>
</body>
</html>