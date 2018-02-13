<?php
header("Content-Type: text/html; charset=iso-8859-1",true); 
require_once('./data_classes/server-data.php_data_classes-core.php.php'); 
$maintenance2 = mysql_num_rows(mysql_query("SELECT * FROM cms_settings WHERE mantenimiento = '1'"));
$useradmin2 = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'");
$useradmin = mysql_fetch_array($useradmin2);
if($maintenance2 == '1' && $useradmin['rank'] < 5){
		header("Location: manutencao");
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
</style>	
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#" style="padding:8px;">
<img src="Externos/img/logo.gif">
</a>
</div>
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<li><a href="/index"><span class="glyphicon glyphicon-home"></span> &nbsp;Página Inicial</a></li>
<li><a href="/register"><span class="glyphicon glyphicon-home"></span> &nbsp;Registro</a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
<li><a href="#" onclick="return false;"><b><?php echo $UsersOnline; ?> usu&aacute;rios online</b></a></li>
</ul>
</div>
</div>
</nav>
<br>
<br>
<br>
<br>
<?php	
require_once('./data_classes/server-data.php_data_classes-core.php.php'); 

if($_POST['acao'] == 'recuperar'){
$remetente = $_POST['email'];
$usuarior = $_POST['usuario'];
$codigo = $_POST['codigo'];
$senha = HoloText($_POST['novasenha']);
$buscar_usuario = mysql_query("SELECT * FROM users WHERE username='$usuarior' AND mail='$remetente' AND password='$codigo' AND mail='$remetente' AND lalarecu='1'");
$verifica = mysql_num_rows($buscar_usuario);
while($relatorio = mysql_fetch_array($buscar_usuario)){
$id = $relatorio['id'];
$usuario = $relatorio['username'];
$data = $relatorio['account_created'];

		}
		if($_POST['novasenha'] != $_POST['confirmacaonovasenha'])
	{
	echo ("<div class='container'><div class='alert alert-danger fade in'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Erro!</strong> As senhas não coincidem. ".$usuarior."!
</div></div>");
	}
		if(strlen($_POST['novasenha']) < 6)
	{
			echo ("<div class='container'><div class='alert alert-danger fade in'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Erro!</strong> A sua senha deve ter pelo menos 6 caracteres. ".$usuarior."!
</div></div>");
	}
		if($verifica == 0){
						echo ("<div class='container'><div class='alert alert-danger fade in'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Erro!</strong> Algo esta errado ".$usuarior."!
</div></div>");

		}else{
		mysql_query("UPDATE users SET LalaRecu = '0' WHERE username = '".$usuarior."'");
		mysql_query("UPDATE users SET password = MD5(SHA1(MD5('" . $senha . "'))) WHERE username = '".$usuarior."'");

			
			echo ("<div class='container'><div class='alert alert-success fade in'>
 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Enviado!</strong> Senha trocado com exito! nova senha: ".$senha."!
</div></div>");
				
		}
	}
?>
<div class="container">
<div class="row">
<div class="col-md-4">
<div class="panel panel-warning">
<div class="panel-heading">Recuperar senha</div>
<div class="panel-body">
<form method="post">
<input type="hidden" name="acao" value="recuperar">
<div class="form-group"> 
<label for="username"><b>Usuario:</b></label> 
<input type="text"  class="form-control" id="username" size="35" name="usuario" placeholder="Digite seu nome de usuario"  required> 
</div>
<div class="form-group"> 
<label for="username"><b>Email:</b></label> 
<input type="text"  class="form-control" id="username" size="35" name="email" placeholder="Digite o email do usuario"  required> 
</div>
<div class="form-group"> 
<label for="username"><b>Código:</b></label> 
<input type="text"  class="form-control" id="codigo" size="35" name="codigo" placeholder="Digite o código do usuario"  required> 
</div>
<div class="form-group"> 
<label for="username"><b>Nova senha:</b></label> 
<input class="form-control" id="novasenha" name="novasenha" type="password" size="35" placeholder="Digite a nova senha do usuario"  required> 
</div>
<div class="form-group"> 
<label for="username"><b>Repetir senha nova:</b></label> 
<input class="form-control" id="confirmacaonovasenha" name="confirmacaonovasenha" type="password" size="35" placeholder="Repetir a nova senha do usuario"  required> 
</div>
<div class="form-group">
<input type="submit" value="Troca senha" name="register" id="doregister" class="btn btn-success" >
<input type="hidden" id="recuperar" size="35" name="recuperar" value="sendToken"> 
</div>
</form> 
</div>
</div>
</div>
<div class="col-md-8">
<div class="panel panel-info">
<div class="panel-body">
<center>
</center>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">Mantenha sempre sua conta segura.</div>
<div class="panel-body">
Mantenha sempre sua conta segura com uma senha dificil.
</div>
<div class="panel-body">
Não se esquece de ver em Lixo eletrônico.
</div>
</div>
</div>
</div>
</div>
</section>
<?php include_once("Pagina/Foorte.php"); ?>