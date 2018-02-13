<?php
//require("../data_classes/html_encoder_1.9.php");
ob_start();
	require_once '../global.php';
	$TplClass->SetParam('title', 'Logs de la CMS');
	$TplClass->SetParam('zone', 'Logs de la CMS');
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
require("inc/top.php");
ob_end_flush(); 
?>
<html>
<body>
<div class="row">
<div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
<div class="panel border-1 border-grey-500">
<div class="panel-title bg-grey-500">
<div class="panel-head color-white" style="margin-left:11px;"><i class="fa fa-tasks"></i> Kicka o AutoDj </div>
</div>
<div id="barra_title_pagina">
<div id="base_icone_local_pagina">
<div id="icone_local_pagina"></div>
</div>
</div>
<div id="lado_dir_content">
<div id="box_pagina_conteudo">
<div id="content_list_inser_registro">
</div>
<h1>Aperte no quadrado em baixo para kick o AutoDj.</h1>
<p class="text-light margin-bottom-20" style="margin-left:15px;"> ATENÇÃO: Você so tem 8 segundos para entra ao vivo ser não o autoDj ira entra no seu Luga.</p>
<?php
$sql = mysql_query("SELECT * FROM dados_radio");
$ver = mysql_fetch_array($sql);
$kikar = $_POST['kikar'];
if($_POST){
	mysql_query("INSERT INTO logs_radio(usuario, ip, data) VALUES ('".$_SESSION['usuario_admin']."','".$_SERVER['REMOTE_ADDR']."','".time()."') ");
	$scfp = fsockopen($ver['ip'], $ver['porta'], $errno, $errstr, 10);
	if($scfp){
		fputs($scfp,"GET /admin.cgi?pass=e6282cebcfdb&sid=1&mode=kicksrc HTTP/1.0\r\nUser-Agent: SHOUTcast Song Status (Mozilla Compatible)\r\n\r\n");
		while(!feof($scfp)) {
			$page .= fgets($scfp, 1000);
		}
		fclose($scfp);
	}
	echo "<script>alert('Boa sorte. Processo feito com sucesso.')</script>";
}
?>
<?php
$sql = mysql_query("SELECT * FROM radio_settings");
$ver = mysql_fetch_array($sql);
?>
<br><br>
Para iniciar sua locução, você deve kickar/expulsar o locutor atual (ou o AutoDJ) clicando no botão abaixo.<br><br>
<b>IP:</b> <?php echo $ver['host']; ?><br>
<b>Porta:</b> <?php echo $ver['port']; ?><br>
<b>Senha:</b> <?php echo $ver['senha']; ?><br>
<b>Hotel:</b> <?php echo $ver['hotelname']; ?><br><br>
Você deve colocar seu nome e o nome de sua programação.
<br>
<br>
<form method="post" href="#" onclick="window.open('http://stm50.hostbh.com.br:8048/admin.cgi?pass=e6282cebcfdb&sid=1&mode=kicksrc', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');">
<input style="width: 130px;
float: right;
margin-right: 14px; margin-top: 10px;" name="kikar" type="submit" class="btn btn-success" value="Kikar Dj">
</form>
</div>
</div>
<div class="box-content">
<form method="post" href="#" onclick="window.open('/pedidos.php', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');">
<input style="width: 130px;
float: right;
margin-right: 14px; margin-top: 10px;" type="submit" value="Ver pedidos" class="btn btn-primary"></button><br>
</form>
<br>
<br>
<br>
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