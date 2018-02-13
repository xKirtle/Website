<?php 
header("Content-Type: text/html; charset=iso-8859-1",true); 
require_once('./data_classes/server-data.php_data_classes-core.php.php'); 
$maintenance2 = mysql_num_rows(mysql_query("SELECT * FROM cms_settings WHERE mantenimiento = '1'"));
if($maintenance2 == '1'){
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
				$login_fehler = "Você foi banido pelo seguinte motivo: <b>".$ban['reason']."</b> . até <b>".date("d/m/Y H:i:s", $ban['expire'])."</b>";
			
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
<html ng-app="app" lang="en-us">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<meta charset="utf-8">
