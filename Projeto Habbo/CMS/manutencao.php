<?php
require_once('./data_classes/server-data.php_data_classes-core.php.php'); 
header("Content-Type: text/html; charset=iso-8859-1",true); 
$maintenance = mysql_fetch_array(mysql_query("SELECT * FROM cms_settings WHERE mantenimiento = '1'"));

if(isset($_POST['credentials_username']) && isset($_POST['credentials_password']))
{
	if(empty($_POST['credentials_username']))
	{
		$login_fehler = "Entre com seu nome e senha para login.";
	}
	elseif(empty($_POST['credentials_password']))
	{
		$login_fehler = "Digite sua senha.";
	}
	
	else
	{
	
		if(isset($_COOKIE['password']))
		{
			$pwd = HoloText($_POST['password']);
		}
		else
		{
			$pwd = HoloText($_POST['credentials_password']);
		}
		$userq = mysql_query("SELECT username, password FROM users WHERE username = '".HoloText($_POST['credentials_username'])."' AND password = MD5(SHA1(MD5('".$pwd."'))) LIMIT 1");
		if(mysql_num_rows($userq) == 1)
		{
			$user = mysql_fetch_assoc($userq);
			
			$banq = mysql_query("SELECT id, value, reason, expire FROM bans WHERE (value = '".$user['username']."' OR value = '".$_SERVER['REMOTE_ADDR']."') AND expire > '".time()."' LIMIT 1");
			if(mysql_num_rows($banq) == 1)
			{
				$ban = mysql_fetch_assoc($banq);
			
				$login_fehler = "Você foi banido por ".$ban['reason']." atÃ© ".date("d/m/Y H:i:s", $ban['expire']);
			}
			else
			{
						
				
										$userq2 = mysql_query("SELECT username, password, rank FROM users WHERE username = '".HoloText($_POST['credentials_username'])."' AND password = MD5(SHA1(MD5('".$pwd."'))) AND rank > 4 LIMIT 1");
		
				if (mysql_num_rows($userq2) == 1) { 
										$_SESSION['username'] = $user['username'];
				$_SESSION['password'] = $user['password'];
				
				if (isset($page)) { 
										header("location: $path/$page");
										}
										else {
										header("location: $path/principal");
										}
										}
										else {
										$login_fehler = "Você não é STAFF para fazer login no meio da manutenção.";
										}
			}
		}
		else
		{
			$login_fehler = "Sua senha e seu nome não conferem.";
		}
	}
}
?>
<!DOCTYPE html>
<head>
<title>Habbz ~ Hora da manutenção!</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Habbz agora com função de beijar na boca, Efeito tirar roupa, Raros Limitados, Eventos diariamente e promoções, 99999 Créditos e Boias."/>
<meta name="keywords" content="habbo hotel, hotel, Habbzhotel, Habbz, habblet, jogos online, habbo"/>
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
<link rel="shortcut icon" href="/favicon.ico">
<!-- CSS DA CMS -->
<link rel="stylesheet" href="/Externos/css/index.css" type="text/css"/>
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
<header id="header" style="background: url(Externos/img/images.jpg);">
<div style="margin-left: 100px;" class="treme">
<img style="margin-top:30px; position: relative;" src="Externos/img/logo.gif" alt="logo"/></br>
</div>	
<nav class="navbar navbar-inverse" style="margin-top:30px;" role="banner">
<div class="container">
<div style="" class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Alternar navegação</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<div class="collapse navbar-collapse">
<ul class="nav navbar-nav">
<li><a href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-ok"></span> Login Staff</a></li>
<li><a href="http://facebook.com/<?php echo $Facebook_id; ?>"><span class="glyphicon glyphicon-thumbs-up"></span> Nosso Facebook</a></li>
</ul>
</div>
</div>
</div>
</nav>	
</header>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Login Staff</h4>
</div>
<div class="modal-body">
<form method="POST">
<input type="text" name="credentials_username" placeholder="Nome de Usuário">
<input type="password" name="credentials_password" placeholder="Senha">
<input type="submit" name="submit" class="login loginmodal-submit" value="ENTRAR">
</form>					
<div class="login-help">
Apenas staff pode fazer login no jogo!
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
</div>
</div>
</div>
</div>
<div class="content-wrapper">
<div class="container">
<?php
	if(isset($login_fehler))
	{
?>
<center>
<div class="alert alert-danger">
<?php echo $login_fehler; ?>
</div>                            
</center>  
<?php } ?>		
<center>
<h1>
O Habbz Hotel entro em Manutenção!
</h1>
<h4>Voltaremos em breve!</h4><h6> CURTA NOSSA PÁGINA NO FACEBOOK E ACOMPANHE TUDO POR LÁ...</h6>
<img src="Externos/img/profile-sticker.gif" />
</center>
<div class="progress">
<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $maintenance['progresso']; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $maintenance['progresso']; ?>%; height:20px;">
<center>Progresso está em <?php echo $maintenance['progresso']; ?>%</center>
</div>
</div>
</div>
</div>
</div>
</br>
<?php include_once("Pagina/Foorte.php"); ?>