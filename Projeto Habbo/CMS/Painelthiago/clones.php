<?php
ob_start();
	require_once '../global.php';
	$TplClass->SetParam('title', 'Revisar Clones');
	$TplClass->SetParam('zone', 'Revisar Clones');
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
	while($data = $result->fetch_array()){
		$SHORTNAME = $data['hotelname'];
		$FACE = $data['facebook'];
		$LOGO = $data['logo'];
	}
	if(isset($_POST['buscador'])){
		$buscar = $Functions->FilterText($_POST['palabra']);
		$db->query("INSERT INTO cms_stafflogs (username, action, message, rank, userid, timestamp) VALUES ('". $_SESSION['username'] ."','Buscar Clones', 'Ha escaneado a ".$buscar."', '". $user['rank'] ."', '". $user['id'] ."', '".date("Y-m-d ")."')");		
		if(empty($buscar)){
			echo "<script>alert('Coloque um nome de usuário!');location.href='/Painelthiago/clones.php';</script>";
		}
	}	
define("show_plugin_menu", true);
require("inc/top.php");
ob_end_flush();
?>
<html>
<body>
<div class="row">
<div class="col-lg-6">
<div class="panel border-1 border-red-500">
<div class="panel-title bg-red-500">
<div class="panel-head color-white" style="margin-left:15px;"><i class="fa fa-search"></i> Buscar Clones</div>
</div>
<div class="panel-body">
<form action="" method="post">
<p class="text-light margin-bottom-20">Verifique clones usuário X</p>
<div class="form-group">
<input type="text" class="form-control" id="input-text" name="palabra" placeholder="Usuário">
</div>
<input name="buscador" style="width: 150px;
float: right;
margin-right: 14px; margin-top: 10px;" type="submit" class="btn btn-success" value="Buscar">
</form>
<?php 	if(isset($_POST['buscador'])){ 
$buscar = $Functions->FilterText($_POST['palabra']);
$busc = $db->query("SELECT * FROM users WHERE username = '$buscar'");
if($busc->num_rows > 0){
	echo "<br><b>RESULTADOS:</b><br>";
	while($inf = $busc->fetch_array()){
		$find = $db->query("SELECT * FROM users WHERE ip_last = '$inf[ip_last]'");
		while($us = $find->fetch_array()){
			echo "<b><li>$us[username]</b> <i style='float:right;'>$us[ip_last]</i>";
			
		}
	} 	
}else{ 
	echo '<br><b style="color:red">Não foram encontrados resultados para <i style="color:black;">'.$buscar.'</i></b><br>';
}
}
?>
</div>
</div>
</div>
</div>
</div>
<footer id="footer-bar" class="row">
<p id="footer-copyright" class="col-xs-12">
&copy; Painel Habbz By: Thiago Araujo
</p>
</footer>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>