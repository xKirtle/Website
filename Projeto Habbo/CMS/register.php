<?php
require_once('./data_classes/server-data.php_data_classes-core.php.php'); 
$userrecomendacaoSQL1 = mysql_query("SELECT * FROM cms_comment WHERE type = 'recomendacao' AND ativo='1'");
$userrecomendacao1 = mysql_fetch_array($userrecomendacaoSQL1);
$userrecomendacaoSQL = mysql_query("SELECT * FROM users WHERE id = '" . $userrecomendacao1['nome'] . "'");
$userrecomendacao = mysql_fetch_array($userrecomendacaoSQL);
$resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcL_hMUAAAAAOEwTaRuoHS8YYKT8iV9wBZ_eeDU=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']);
if($maintenance2 == '1' && $useradmin['rank'] < 5){
		header("Location: manutencao");
}
if (isset($_SESSION['username'])) {
header("location: $path/principal");
}
if (isset($_POST['g-recaptcha-response'])) {
    $captcha_data = $_POST['g-recaptcha-response'];
}
$ip_check2 = mysql_query("SELECT ip_reg,username,id FROM users WHERE ip_reg = '".$remote_ip."'");
$ip_check = mysql_fetch_array($ip_check2);
$ip_checkNUM = mysql_num_rows($ip_check2);
	// USERNAME
	if(empty($_POST['registrationBean_username']))
{
	
	}
	else if($ip_checkNUM > 4454556){
		$registrationErrors = "Só é permitido 4 contas em seu computador!";
	}
	else if(mysql_num_rows(mysql_query("SELECT id FROM users WHERE username = '".HoloText($_POST['registrationBean_username'])."' LIMIT 1")) == 1)
	{
		
		$registrationErrors = "Este nome já é utilizado por outro usuário.";
	
	
}else if(empty($_POST['registrationBean_email']))
	{
		
		$registrationErrors = "Digite o seu endereço de e-mail.";
	}
	else if(!preg_match("/^[A-Z0-9._-]{2,}+@[A-Z0-9._-]{2,}\.[A-Z0-9._-]{2,}$/i", $_POST['registrationBean_email']))
	{
		
		$registrationErrors = "Por favor, insira um endereço de e-mail válido.";
	}else if(empty($_POST['registrationBean_password']))
	{
		
		$registrationErrors = "Digite a sua senha.";
	}
	else if(strlen($_POST['registrationBean_password']) < 6)
	{
		
		$registrationErrors = "A sua senha deve ter pelo menos 6 caracteres";
	}
	
	else if($_POST['registrationBean_password'] != $_POST['registrationBean_password2'])
	{
	
	$registrationErrors = "As senhas não coincidem.";
	}else if(empty($_POST['registrationBean_password2']))
	{
		
		$registrationErrors = "Por favor, reescreva a senha.";
	}
	else if(strlen($_POST['registrationBean_password2']) < 6)
	{
		
		$registrationErrors = "A sua senha deve ter pelo menos 6 caracteres";
	}
	
	else if($_POST['registrationBean_password2'] != $_POST['registrationBean_password'])
	{
	
	$registrationErrors = "As senhas não coincidem.";
		
	} else if($_POST['quarto'] == ""){
		$registrationErrors = "Por favor, escolha um quarto.";
	}else{
	
	
	
	$username = HoloText($_POST['registrationBean_username']);
	$email = HoloText($_POST['registrationBean_email']);
	$password = HoloText($_POST['registrationBean_password']);
	$password2 = HoloText($_POST['registrationBean_password2']);
$nlook = HoloText($_POST['look']);

mysql_query("INSERT INTO users (online,vip_points,vip,username,password,mail,auth_ticket,rank,look,gender,motto,last_online,account_created,ip_last,ip_reg)
			VALUES ('0','0','0','".$username."',MD5(SHA1(MD5('".$password."'))),'".$email."','','1','sh-290-1222.hr-100-1045.hd-180-1.ch-210-1201.lg-275-97','M','I <3 Habbz','".time()."','".time()."','".$remote_ip."','".$remote_ip."')") or die(mysql_error());
			
			$postsaasdSQL= mysql_query("SELECT * FROM users WHERE username='" . $username . "'");
			$postsaasd = mysql_fetch_array($postsaasdSQL);
			
			if($_POST['quarto'] == "masculino"){
			
			mysql_query("INSERT INTO rooms (roomtype, caption, owner, description, category, state, users_now, users_max, model_name, score, tags, password, wallpaper, floor, landscape, allow_pets, allow_pets_eat, room_blocking_disabled, allow_hidewall, wallthick, floorthick, group_id, mute_settings, ban_settings, kick_settings, chat_mode, chat_size, chat_speed, chat_extra_flood, chat_hearing_distance, trade_settings, beijar_enabled, matar_enabled, bater_enabled, sexo_enabled, roubar_enabled, fumar_enabled, push_enabled, pull_enabled, enables_enabled, respect_notifications_enabled, pet_morphs_allowed, spull_enabled, spush_enabled) VALUES
('private', 'CANTINHO DO " . $postsaasd['username'] . "', '" . $postsaasd['id'] . "', '', 29, 'invisible', 0, 10, 'model_h', 0, '', '', '215', '110', '0.0', '0', '0', '0', '0', 0, 0, 0, '0', '1', '1', 0, 0, 0, 0, 0, 0, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1')");
			
			$quartoSQL= mysql_query("SELECT * FROM rooms WHERE owner='" . $postsaasd['id'] . "'");
			$quarto = mysql_fetch_array($quartoSQL);
			mysql_query("UPDATE users SET home_room = '" . $quarto['id'] . "' WHERE id='" . $postsaasd['id'] . "'");
			
			mysql_query("INSERT INTO items (user_id, room_id, base_item, extra_data, x, y, z, rot, wall_pos, limited_number, limited_stack) VALUES
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 1704, '', 0, 0, 0, 0, ':w=9,1 l=29,62 r', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 17, '', 5, 4, 1, 0, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99957, '', 3, 12, 0, 2, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99972, '1', 0, 0, 0, 0, ':w=5,1 l=16,24 r', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99983, '2', 0, 0, 0, 0, ':w=4,6 l=25,43 l', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99979, '', 0, 0, 0, 0, ':w=7,1 l=21,74 r', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99968, '1', 3, 9, 0, 0, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99958, '', 9, 11, 0, 0, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99955, '', 5, 6, 1, 2, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99948, '1', 8, 2, 1, 0, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99978, '1', 0, 0, 0, 0, ':w=2,11 l=25,71 l', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99959, '', 9, 10, 0, 4, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99959, '', 10, 10, 0, 4, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99959, '', 8, 11, 0, 2, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99959, '', 8, 12, 0, 2, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99945, '', 3, 10, 0, 2, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99955, '', 5, 5, 1, 2, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 900396, '', 9, 11, 0.7, 0, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 900396, '', 9, 12, 0.7, 0, '', 0, 0);");
			
			
	}else{
		
		mysql_query("INSERT INTO rooms (roomtype, caption, owner, description, category, state, users_now, users_max, model_name, score, tags, password, wallpaper, floor, landscape, allow_pets, allow_pets_eat, room_blocking_disabled, allow_hidewall, wallthick, floorthick, group_id, mute_settings, ban_settings, kick_settings, chat_mode, chat_size, chat_speed, chat_extra_flood, chat_hearing_distance, trade_settings, beijar_enabled, matar_enabled, bater_enabled, sexo_enabled, roubar_enabled, fumar_enabled, push_enabled, pull_enabled, enables_enabled, respect_notifications_enabled, pet_morphs_allowed, spull_enabled, spush_enabled) VALUES
('private', 'CANTINHO DA " . $postsaasd['username'] . "', '" . $postsaasd['id'] . "', '', 36, 'invisible', 0, 10, 'model_h', 0, '', '', '608', '110', '0.0', '0', '0', '0', '0', 0, 0, 0, '0', '1', '1', 0, 0, 0, 0, 0, 0, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');");
			
			$quartoSQL= mysql_query("SELECT * FROM rooms WHERE owner='" . $postsaasd['id'] . "'");
			$quarto = mysql_fetch_array($quartoSQL);
			
			mysql_query("UPDATE users SET home_room = '" . $quarto['id'] . "' WHERE id='" . $postsaasd['id'] . "'");
			
			mysql_query("INSERT INTO items (user_id, room_id, base_item, extra_data, x, y, z, rot, wall_pos, limited_number, limited_stack) VALUES
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 17, '', 5, 4, 1, 0, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99967, '', 3, 12, 0, 2, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99963, '1', 3, 10, 0, 2, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99973, '1', 0, 0, 0, 0, ':w=2,11 l=19,59 l', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99974, '1', 0, 0, 0, 0, ':w=5,1 l=17,28 r', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99977, '', 0, 0, 0, 0, ':w=7,1 l=13,57 r', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99960, '', 5, 5, 1, 2, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99960, '', 5, 6, 1, 2, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99947, '1', 3, 9, 0, 0, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99952, '1', 8, 2, 1, 0, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99971, '', 10, 10, 0, 4, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99971, '', 9, 10, 0, 4, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99971, '', 8, 11, 0, 2, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99971, '', 8, 12, 0, 2, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99981, '2', 0, 0, 0, 0, ':w=4,6 l=16,50 l', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 99953, '0', 9, 11, 0, 0, '', 0, 0),
('" . $postsaasd['id'] . "', '" . $quarto['id'] . "', 1704, '', 0, 0, 0, 0, ':w=9,1 l=30,62 r', 0, 0);
");
		
	}
			
			
			if(isset($_SESSION['referido'])){
			mysql_query("UPDATE users SET referidos=referidos+1 WHERE username = '".$_SESSION['userreferido']."';");
mysql_query("INSERT INTO users_referidos (id, usuario, ip_referida, fecha) VALUES (null, '".$_SESSION['userreferido']."', '".$remote_ip."', '" . TIME() . "');");
$userreferido1sql= mysql_query("SELECT * FROM users WHERE username='" . $_SESSION['userreferido'] . "'");
			$userreferido1 = mysql_fetch_array($userreferido1sql);


mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $postsaasd['id'] . "','" . $userreferido1['id'] . "','#','" . time() . "','Entrou com seu link de referidos')");
@session_start();
session_destroy();
			}
				
		$userdata2 = mysql_query("SELECT * FROM users WHERE username = '".$username."'");
$userdata = mysql_fetch_assoc($userdata2);
mysql_query("INSERT INTO `user_info` (user_id,reg_timestamp) VALUES ('".$userdata['id']."','".time()."')");
mysql_query("INSERT INTO `user_stats` (id,DailyRespectPoints,DailyPetRespectPoints) VALUES ('".$userdata['id']."','3','3')");

$_SESSION['confirmacao'] = "AGUARDANDO";

header("location: $path/index");
	}
	include_once('Pagina/Head.php');
?>
<html ng-app="app" lang="en-us">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Habbz agora com função de beijar na boca, Efeito tirar roupa, Raros Limitados, Eventos diariamente e promoções, 99999 Créditos e Topázios."/>
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
<div class="panel panel-primary">
<div class="panel-heading">Crie uma nova conta<div style="" class="pull-right" id="statusname"></div></div>
<div class="panel-body">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript">
$(function(){ 
  $("input[name='verificar']").on('click', function(){
    var registrationBean_username = $("input[name='registrationBean_username']").val();
    $.get('usuario.php?registrationBean_username=' + registrationBean_username,function(data){
      $('#resultado').html(data);
    });
  });
});
</script>
<script type="text/javascript">
$(function(){ 
  $(document).ready(function(){ 
  $("input[name='registrationBean_username']").blur( function(){
  var registrationBean_username = $( this ).val();
    $.get('usuario.php?registrationBean_username=' + registrationBean_username,function(data){
      $('#resultado').html(data);
    });
  });
});
});
</script>
<form method="post" action="">
<div id="error-messages-container"></div> 
<div id="resultado"></div>
<?php	
if(isset($registrationErrors))
echo "<div class='alert alert-danger fade in'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Erro!</strong> $registrationErrors
</div>";
?>
<div class="form-group form-inline has-feedback" id="name-field-container"> 
<div class="field field-habbo-name"> 
<label for="habbo-name"><b>Nome de Usuário &nbsp;</b></label> <br>
<input type="text" onKeypress="if (event.keyCode == 32) event.returnValue = false;" onblur="javascript:function();" class="form-control" id="registrationBean_username" style="width:204px; " size="20" value="" name="registrationBean_username" class="text-field" maxlength="15" required> 
<input type="button" class="btn btn-primary" name="verificar" id="verificar" value="TENTAR">
</div> 
</div> 
<div class="form-group"> 
<label for="password"><b>Senha &nbsp;</b></label> 
<input type="password"  class="form-control" id="password" size="35" name="registrationBean_password" value="" class="password-field" maxlength="32" required> 
</div>
<div class="form-group"> 
<label for="password"><b>Confirme a senha &nbsp;</b></label> 
<input type="password"  class="form-control" id="password" size="35" name="registrationBean_password2" value="" class="password-field" maxlength="32" required> 
</div>
<div class="form-group "> 
<label for="email"><b>E-mail &nbsp;</b></label> 
<input type="email" id="email" class="form-control" size="35" name="registrationBean_email" value="" class="text-field" maxlength="48" required> 
<br>
</div> 
<div class="form-group">
<input type="submit" value="Registrar" name="register" id="doregister" class="btn btn-success" >
<input type="button" value="Cancelar" class="btn btn-danger" onclick="location.href = '/index'" style="float:right;margin-right:12px;">
<input type="hidden" id="formulario" size="35" name="formulario" value="registro"> 
</div>
</div>
</div>
</div>
<div class="col-md-8">
<div class="panel panel-default">
<div class="panel-heading">Escolha seu quarto!</div>
<div class="panel-body">
<div class="panel-body" style="">
<center>
<h5><b>QUARTO MASCULINO</b></h5>
<img width="180" src="_images/quarto-masculino.png"/></br>
<input type="radio" name="quarto" value="masculino" checked>
<h5><b>QUARTO FEMININO</b></h5>
<img width="180" src="_images/quarto-feminino.png"/></br>
<input type="radio" name="quarto" value="feminino"></center>
</form>
</div>
</div>
</div>
</div>						
</div>
</form> 
<div class="panel panel-default">
<div class="panel-heading">Por que jogar Habbz Hotel?</div>
<div class="panel-body">
<p style="font-family:arial;font-size:12px;">
<img src="Externos/img/habbo_welcome.gif" align="right">
O Habbz Hotel é um dos mais completos e divertidos hotéis,<br>
Aqui você irá encontrar diversas pessoas legais e com assuntos interessantes, além das promoções que são realizadas<br>
semanalmente, você terá eventos a cada 15 minutos que lhe trará diversos prêmios interessantes!<br>
No Habbz você também ganha quando chama seus amigos, nosso sistema de referências permite que você<br>
chame todos os seus amigos e ganhe prêmios incríveis por isso.<br><br>
<b>Comando Gratuitos:</b><br>
- :floor (edição de quarto)<br>
- :enable (permite ativar um efeito)<br>
- :teleport (ativa o teletransporte para você se locomover em seus quartos)<br>
- :semrosto (permite que você remova os olhos, nariz e boca para estilizar seu personagem)<br><br>
<b>Moedas e Duckets:</b><br>
Habbz lhe entrega 9 MILHÕES de Moedas e Duckets logo após seu registro!<br><br>
Gostou? Não perca tempo, registre-se já!
</p>
</div>
</div>
<div id="footer_placeholder">
<br>
<br>
<span class="information_section" style="position:relative; z-index:60;left:-1%;">
<a href='#'>Habbz Hotel</a> | <a href='/info/termos.php'>Termos e Condi&ccedil;&otilde;es</a> | <a href='/info/privacidade.php'>Pol&iacute;tica de Privacidade</a>
<span class="smallprint">
Habbz Hotel <b>&copy;</b> 2017 ~ Powered by <b>CoreDev - Thiago Araujo</b><br/> Habbz n&atilde;o &eacute; afiliado ou parte da Sulake Corporation. Todos direitos reservados aos respectivos autores. <br/><br/>
</span></span>
<span class="poweredby_section"></span></div>
</div>
</div>
</body>
</html>