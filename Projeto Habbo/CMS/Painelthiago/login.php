<?php
require_once('./data_classes/server-data.php_data_classes-core.php.php'); 
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
										$_SESSION['admin_auth'] = true;
										header("location: $path/Painelthiago/dashboard.php");
										}
										}
										else {
										$login_fehler = "Você não é STAFF para fazer login.";
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
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Painel Habbz V1 - Login By: Thiago Araujo</title> 
<link href="css/bootstrap/bootstrap.css" rel="stylesheet"/>
<link href="css/libs/font-awesome.css" type="text/css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="css/compiled/layout.css">
<link rel="stylesheet" type="text/css" href="css/compiled/elements.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300%7CTitillium+Web:200,300,400' rel='stylesheet' type='text/css'>
<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
</head>
<body id="login-page">
<div class="container">
<div class="row">
<div class="col-xs-12">
<div id="login-box">
<div class="row">
<div class="col-xs-12">
<header id="login-header">
<div id="login-logo">
Habbz Painel
</div>
</header>
<div id="login-box-inner">
<?php
	if(isset($login_fehler))
	{
?> <div class="alert alert-danger"> <?php echo $login_fehler; ?> </div> <?php } ?>	
<form method="POST">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-user"></i></span>
<input type="text" name="credentials_username"class="form-control" placeholder="Username">
</div>
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-key"></i></span>
<input type="password" name="credentials_password" class="form-control" placeholder="Password">
</div>
<div class="row">
<div class="col-xs-12">
<button type="submit" name="submit" class="btn btn-success col-xs-12">Login</button>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
<!-- Localized -->