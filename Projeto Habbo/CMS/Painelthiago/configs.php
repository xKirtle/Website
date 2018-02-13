<?php
ob_start();
	require_once '../global.php';
	$TplClass->SetParam('title', 'Configuraci&oacute;n del Hotel');
	$TplClass->SetParam('zone', 'Configuraci&oacute;n del Hotel');
	$Functions->LoggedHk("true");
	
	$users = $db->query("SELECT * FROM users WHERE username = '{$_SESSION['username']}' AND password = '{$_SESSION['password']}'");
	$user = $users->fetch_array();

	$TplClass->SetAll();
	if( $_SESSION['ERROR_RETURN'] ){
		$TplClass->SetParam('error', '<div id="generic"><div id="error">'.$_SESSION['ERROR_RETURN'].'</div></div>');
		unset($_SESSION['ERROR_RETURN']);
	}
	if( $_SESSION['GOOD_RETURN'] ){
		$TplClass->SetParam('error', '<div id="generic"><div id="error" style="background: #88B600;border: 1px solid #88B600;">'.$_SESSION['GOOD_RETURN'].'</div></div>');
		unset($_SESSION['GOOD_RETURN']);
	}
	$result = $db->query("SELECT * FROM cms_settings WHERE id = 1 LIMIT 1");
	$data = $result->fetch_array();
	$SHORTNAME = $data['hotelname'];
	$FACE = $data['facebook'];
	$LOGO = $data['logo'];
	
	if(isset($_POST['gconfig'])){
		$db->query("UPDATE cms_settings SET hotelname = '". $Functions->FilterText($_POST['hotelname']) ."', facebook = '". $Functions->FilterText($_POST['fb']) ."', logo = '". $Functions->FilterText($_POST['logo']) ."', host = '". $Functions->FilterText($_POST['host']) ."', port = '". $Functions->FilterText($_POST['port']) ."', external_variables = '". $Functions->FilterText($_POST['extvar']) ."', external_texts = '". $Functions->FilterText($_POST['exttext']) ."', productdata = '". $Functions->FilterText($_POST['prod']) ."', furnidata = '". $Functions->FilterText($_POST['furn']) ."', flash_client_url = '". $Functions->FilterText($_POST['flash']) ."', habbo_swf = '". $Functions->FilterText($_POST['habboswf']) ."', id_paygol = '". $Functions->FilterText($_POST['pay']) ."', design = '". $Functions->FilterText($_POST['diseno']) ."' WHERE id = '1'");
		$db->query("INSERT INTO cms_stafflogs (username, action, message, rank, userid, timestamp) VALUES ('". $_SESSION['username'] ."','Configuraci&oacute;n General del Hotel', 'Ha Actualizado la configuraci&oacute;n General del Hotel', '". $user['rank'] ."', '". $user['id'] ."', '".date("Y-m-d ")."')");
		$_SESSION['GOOD_RETURN'] = "La Configuraci&oacute;n General ha sido Actualizada Correctamente";
		header("LOCATION: ". HK ."/configs.php");
	}
	
	if(isset($_POST['REG'])){
		if($data['registros'] == 1){
			$var = 0;
		}else{$var = 1;}
		$action = $db->query("UPDATE cms_settings SET registros = '{$var}' WHERE id = '1' LIMIT 1");
		$db->query("INSERT INTO cms_stafflogs (username, action, message, rank, userid, timestamp) VALUES ('". $_SESSION['username'] ."','Configuraci&oacute;n General del Hotel', 'Ha Cambiado la configuraci&oacute;n de los Reg&iacute;stros', '". $user['rank'] ."', '". $user['id'] ."', '".date("Y-m-d ")."')");
		if($action){
			$_SESSION['GOOD_RETURN'] = "Registros modificados Correctamente";
			header("LOCATION: ". HK ."/configs.php");
		}else{
			$_SESSION['ERROR_RETURN'] = "Ha ocurrido un error indeterminado";
			header("LOCATION: ". HK ."/configs.php");
		}
	}
	if(isset($_POST['MOD'])){
		if($data['reg_mod'] == 1){
			$var = 0;
		}else{$var = 1;}
		$action = $db->query("UPDATE cms_settings SET reg_mod = '{$var}' WHERE id = '1' LIMIT 1");
		$db->query("INSERT INTO cms_stafflogs (username, action, message, rank, userid, timestamp) VALUES ('". $_SESSION['username'] ."','Configuraci&oacute;n General del Hotel', 'Ha Cambiado la configuraci&oacute;n de los Reg&iacute;stros con Prefijo MOD', '". $user['rank'] ."', '". $user['id'] ."', '".date("Y-m-d ")."')");
		if($action){
			$_SESSION['GOOD_RETURN'] = "Registros con Prefijo MOD modificados Correctamente";
			header("LOCATION: ". HK ."/configs.php");
		}else{
			$_SESSION['ERROR_RETURN'] = "Ha ocurrido un error indeterminado";
			header("LOCATION: ". HK ."/configs.php");
		}
	}
	if(isset($_POST['IP'])){
		if($data['reg_ip'] == 1){
			$var = 0;
		}else{$var = 1;}
		$action = $db->query("UPDATE cms_settings SET reg_ip = '{$var}' WHERE id = '1' LIMIT 1");
		$db->query("INSERT INTO cms_stafflogs (username, action, message, rank, userid, timestamp) VALUES ('". $_SESSION['username'] ."','Configuraci&oacute;n General del Hotel', 'Ha Cambiado la configuraci&oacute;n de los Reg&iacute;stros por IP', '". $user['rank'] ."', '". $user['id'] ."', '".date("Y-m-d ")."')");
		if($action){
			$_SESSION['GOOD_RETURN'] = "Registros por IP modificados Correctamente";
			header("LOCATION: ". HK ."/configs.php");
		}else{
			$_SESSION['ERROR_RETURN'] = "Ha ocurrido un error indeterminado";
			header("LOCATION: ". HK ."/configs.php");
		}
	}
	if(isset($_POST['MANT'])){
		if($data['mantenimiento'] == 1){
			$var = 0;
		}else{$var = 1;}
		$action = $db->query("UPDATE cms_settings SET mantenimiento = '{$var}' WHERE id = '1' LIMIT 1");
		$db->query("INSERT INTO cms_stafflogs (username, action, message, rank, userid, timestamp) VALUES ('". $_SESSION['username'] ."','Configuraci&oacute;n General del Hotel', 'Ha puesto un Mantenimiento', '". $user['rank'] ."', '". $user['id'] ."', '".date("Y-m-d ")."')");
		if($action){
			$_SESSION['GOOD_RETURN'] = "Mantenimiento modificado Correctamente";
			header("LOCATION: ". HK ."/configs.php");
		}else{
			$_SESSION['ERROR_RETURN'] = "Ha ocurrido un error indeterminado";
			header("LOCATION: ". HK ."/configs.php");
		}
	}
define("show_plugin_menu", true);
require("inc/top.php");
ob_end_flush();
?>
Em breve