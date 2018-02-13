<?php
ob_start();
	require_once '../global.php';
	$TplClass->SetParam('title', 'Administraci&oacute;n');
	$TplClass->SetParam('zone', 'Bienvenido');
	$Functions->LoggedHk("true");
	
	$users = $db->query("SELECT * FROM users WHERE username = '{$_SESSION['username']}' AND password = '{$_SESSION['password']}'");
	$user = $users->fetch_array();
	
	$a = $db->query("SELECT * FROM users WHERE rank >= 3");
	$cntranks = $a->num_rows;
	
	$TplClass->SetAll();
	if( $_SESSION['ERROR_RETURN'] ){
		$TplClass->SetParam('error', '<div id="generic"><div id="error">'.$_SESSION['ERROR_RETURN'].'</div></div>');
		unset($_SESSION['ERROR_RETURN']);
	}
	if( $_SESSION['GOOD_RETURN'] ){
		$TplClass->SetParam('error', '<div id="generic"><div id="error" style="background: #88B600;border: 1px solid #88B600;">'.$_SESSION['GOOD_RETURN'].'</div></div>');
		unset($_SESSION['GOOD_RETURN']);
	}
	
	$b = mysql_query("SELECT * FROM server_status");
	$cntbans = mysql_num_rows($b);
	
	$result = $db->query("SELECT * FROM cms_settings WHERE id = 1 LIMIT 1");
	while($data = $result->fetch_array()){
		$SHORTNAME = $data['hotelname'];
		$FACE = $data['facebook'];
		$LOGO = $data['logo'];
	}

define("show_plugin_menu", true);
require("inc/top.php");
ob_end_flush(); 
?>
<div class="row">
<div class="col-md-3">
<div class="panel panel-default">
<div class="panel-heading"><div class="panel-title">Em Breve</div></div>
<div class="panel-body" style="height:120px;"> 	
</div>
<div class="panel-footer">
<form action="" method="POST">
<input type="hidden" name="file" value="">
<button type="submit" name="download" class="btn btn-success" style="display:block;margin:0 auto;float:none;outline:none;"> <i class="fa fa-download"></i> ------ </button>
</form>
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