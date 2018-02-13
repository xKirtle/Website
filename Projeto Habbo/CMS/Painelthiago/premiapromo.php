<?php
ob_start();
	require_once '../global.php';
	$TplClass->SetParam('title', 'Dar Placas');
	$TplClass->SetParam('zone', 'Dar Placa');
	$Functions->LoggedHk("true");
	
	$users = $db->query("SELECT * FROM users WHERE username = '{$_SESSION['username']}' AND password = '{$_SESSION['password']}'");
	$user = $users->fetch_array();
	$do = $Functions->FilterText($_GET['do']);
	$key = $Functions->FilterText($_GET['key']);

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
	if(isset($_POST['givebadge'])){
		$check = $db->query("SELECT * FROM users WHERE username = '".$Functions->FilterText($_POST['name'])."' LIMIT 1");
		$row = $check->fetch_array();
		$repeat = $db->query("SELECT * FROM user_badges WHERE user_id = '". $row['id'] ."' && badge_id = '".$Functions->FilterText($_POST['badge'])."' LIMIT 1");
		if(empty($_POST['name']) || empty($_POST['badge'])){
        echo "<script>alert('Você deixo algo em Branco!');location.href='/Painelthiago/badges.php';</script>";
		}elseif($repeat->num_rows > 0){
			echo "<script>alert('Esse usuário ja tem esse emblema!');location.href='/Painelthiago/badges.php';</script>";
		}else{
			if($check->num_rows > 0){
				$db->query("INSERT INTO cms_stafflogs (username, action, message, rank, userid, timestamp) VALUES ('". $_SESSION['username'] ."','Dar emblema', 'Deu o emblema: ".$Functions->FilterText($_POST['badge'])." a ".$Functions->FilterText($_POST['name'])."', '". $user['rank'] ."', '". $user['id'] ."', '".date("Y-m-d ")."')");
				$db->query("INSERT INTO user_badges (user_id, badge_id) VALUES ('". $row['id'] ."', '{$Functions->FilterText($_POST['badge'])}')");
                echo "<script>alert('Emblema dado com exito ao usuário!');location.href='/Painelthiago/badges.php';</script>";
			}else {
            echo "<script>alert('Esse usuário não existe!');location.href='/Painelthiago/badges.php';</script>";
			}
		}
	}
	if(isset($_POST['searchbadge'])){ 
		$buscar = $Functions->FilterText($_POST['nameq']);
		$db->query("INSERT INTO cms_stafflogs (username, action, message, rank, userid, timestamp) VALUES ('". $_SESSION['username'] ."','Quitar Placas', 'Ha escaneado a ".$buscar."', '". $user['rank'] ."', '". $user['id'] ."', '".date("Y-m-d ")."')");
		if(empty($buscar)){
        echo "<script>alert('Deve coloca o nome do usuário!');location.href='/Painelthiago/badges.php';</script>";
		}
	}
	if($do == "dele" && !empty($key)){
		$buscar = $Functions->FilterText($_POST['nameq']);
		$db->query("INSERT INTO cms_stafflogs (username, action, message, rank, userid, timestamp) VALUES ('". $_SESSION['username'] ."','Quitar Placas', 'Ha retirado una placa a ".$buscar."', '". $user['rank'] ."', '". $user['id'] ."', '".date("Y-m-d ")."')");
		$db->query("DELETE FROM user_badges WHERE user_id = '" . $id . "' LIMIT 1");
        echo "<script>alert('Emblema retirado com exito!');location.href='/Painelthiago/badges.php';</script>";				
	}
define("show_plugin_menu", true);
require("inc/top.php");
ob_end_flush(); 
?>
<html>
<body>
<div class="row">
<div class="col-lg-6">
<div class="panel border-1 border-blue-500">
<div class="panel-title bg-blue-500">
<div class="panel-head color-white" style="margin-left:15px;"><i class="fa fa-shield"></i> Premia usuário de uma promo</div>
</div>
<div class="panel-body">
<?php	

if($_POST['acao'] == 'recuperar'){
$usuarior = $_POST['nameid'];
$badgeid = $_POST['badgeid'];
$nomepr = $_POST['nomepr'];
$newsid = $_POST['newsid'];
$buscar_usuario = mysql_query("SELECT * FROM users WHERE username='$usuarior'");
$verifica = mysql_num_rows($buscar_usuario);
while($relatorio = mysql_fetch_array($buscar_usuario)){
$id = $relatorio['id'];
$usuario = $relatorio['username'];
$data = $relatorio['account_created'];

		}
		if($verifica == 0){
						echo ("<div class='alert alert-danger fade in'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Erro!</strong> Algo esta errado!
</div>");

		}else{
		mysql_query("UPDATE users SET rank_promocao = rank_promocao + '1' WHERE username = '" . $usuarior . "'");
		mysql_query("INSERT INTO user_badges (user_id, badge_id) VALUES ('" . $id . "', '" . $badgeid . "')");
		mysql_query("INSERT INTO cms_userspromo (nome, promocao, id_news) VALUES ('" . $usuarior . "', '" . $nomepr . "', '" . $newsid . "')");

			
			echo ("<div class='alert alert-success fade in'>
 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Enviado!</strong> O usuário: ".$usuarior." foi premiado com exito!
</div>");
				
		}
	}
?>
<form method="post">
<input type="hidden" name="acao" value="recuperar">
<p class="text-light margin-bottom-20">Preencha todos os campos para premiar um usuário!</p>
<div class="form-group">
<label for="input-text" class="control-label">Nome do Usuário</label>
<input type="text" class="form-control" id="input-text" name="nameid" placeholder="Usuário que perde o emblema" value="">
</div>
<div class="form-group">
<label for="input-text" class="control-label">Código do Emblema</label>
<input type="text" class="form-control" id="input-text" name="badgeid" placeholder="C&oacute;digo do emblema" value="">
</div>
<div class="form-group">
<label for="input-text" class="control-label">Nome da promoção</label>
<input type="text" class="form-control" id="input-text" name="nomepr" placeholder="nome da promoção" value="">
</div>
<div class="form-group">
<label for="input-text" class="control-label">Id da promoção</label>
<input type="text" class="form-control" id="input-text" name="newsid" placeholder="Id da promoção" value="">
</div>
<input style="width: 150px;
float: right;
margin-right: 14px; margin-top: 10px;" type="submit" id="recuperar" name="recuperar" class="btn btn-success" value="Premia usuário">
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
