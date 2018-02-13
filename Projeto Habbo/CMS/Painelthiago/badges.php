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
<div class="panel-head color-white" style="margin-left:15px;"><i class="fa fa-shield"></i> Dar Emblema</div>
</div>
<div class="panel-body">
<form action="" method="post">
<p class="text-light margin-bottom-20">Preencha todos os campos para dar um emblema</p>
<div class="form-group">
<label for="input-text" class="control-label">Usuário</label>
<input type="text" class="form-control" id="input-text" name="name" placeholder="Usuário que vai ganha o emblema" value="">
</div>
<div class="form-group">
<label for="input-text" class="control-label">Emblema</label>
<input type="text" class="form-control" id="input-text" name="badge" placeholder="C&oacute;digo do emblema" value="">
</div>
<input name="givebadge" style="width: 150px;
float: right;
margin-right: 14px; margin-top: 10px;" type="submit" type="submit" class="btn btn-success" value="Enviar">
</form>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="panel border-1 border-blue-500">
<div class="panel-title bg-blue-500">
<div class="panel-head color-white" style="margin-left:15px;"><i class="fa fa-shield"></i> Tira emblema</div>
</div>
<div class="panel-body">
<?php	
require_once('./data_classes/server-data.php_data_classes-core.php.php'); 

if($_POST['acao'] == 'recuperar'){
$usuarior = $_POST['nameid'];
$badgeid = $_POST['badgeid'];
$buscar_usuario = mysql_query("SELECT * FROM users WHERE id='$usuarior'");
$verifica = mysql_num_rows($buscar_usuario);
while($relatorio = mysql_fetch_array($buscar_usuario)){
$id = $relatorio['id'];
$usuario = $relatorio['username'];
$data = $relatorio['account_created'];

		}
		if($verifica == 0){
						echo ("<div class='alert alert-danger fade in'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Erro!</strong> Algo esta errado com o id: ".$usuarior."!
</div>");

		}else{
		mysql_query("DELETE FROM user_badges WHERE user_id = '" . $id . "' AND badge_id = '" . $badgeid . "' LIMIT 1");

			
			echo ("<div class='alert alert-success fade in'>
 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Enviado!</strong> Foi tirado o emblema: ".$badgeid." do usuário ".$usuarior." com exito!
</div>");
				
		}
	}
?>
<form method="post">
<input type="hidden" name="acao" value="recuperar">
<p class="text-light margin-bottom-20">Preencha todos os campos para tira um emblema</p>
<div class="form-group">
<label for="input-text" class="control-label">Usuário ID</label>
<input type="text" class="form-control" id="input-text" name="nameid" placeholder="Usuário que perde o emblema" value="">
</div>
<div class="form-group">
<label for="input-text" class="control-label">Código do Emblema</label>
<input type="text" class="form-control" id="input-text" name="badgeid" placeholder="C&oacute;digo do emblema" value="">
</div>
<input style="width: 150px;
float: right;
margin-right: 14px; margin-top: 10px;" type="submit" id="recuperar" name="recuperar" class="btn btn-success" value="Tira emblema">
</form>
</div>
</div>
</div>
<div class="col-lg-6">
<div class="panel border-1 border-red-500">
<div class="panel-title bg-red-500">
<div class="panel-head color-white" style="margin-left:15px;"><i class="fa fa-close"></i> Ver emblemas</div>
</div>
<div class="panel-body">
<form action="" method="post">
<input type="hidden" name="acao" value="searchbadge">
<p class="text-light margin-bottom-20">Preencha todos os campos para ver os emblemaa de um usuário</p>
<div class="form-group">
<label for="input-text" class="control-label">Usuário</label>
<input type="text" class="form-control" id="input-text" name="nameq" placeholder="Usuário a Buscar" value="">
</div>
<input name="searchbadge" style="width: 150px;
float: right;
margin-right: 14px; margin-top: 10px;" type="submit" class="btn btn-success" value="Buscar">
</form>
<?php	
if($_POST['acao'] == 'searchbadge'){
$buscar = $_POST['nameq'];
$buscar_usuario = mysql_query("SELECT * FROM users WHERE username='$buscar'");
$verifica = mysql_num_rows($buscar_usuario);
while($relatorio = mysql_fetch_array($buscar_usuario)){
$id = $relatorio['id'];
$usuario = $relatorio['username'];
$data = $relatorio['account_created'];

		}
	if($verifica > 0){
	if($user['rank'] >= 7){?>
	</div>
<div class="panel panel-primary">
<?php 
$easdasaa = mysql_query("SELECT * FROM user_badges WHERE user_id='" . $id . "' ORDER BY badge_slot DESC");
?>
<div class="panel-heading"><?php echo "<br><b>Nome é ID do usuário: ".$buscar." / ".$id."</b><br>"; ?></div>
<div class="panel-body">
<?php
while($fasda = mysql_fetch_array($easdasaa)){ 
?>
<img src='../swf/c_images/album1584/<?php echo $fasda['badge_id']; ?>.gif' style='padding:2px;' />
<p class="text-light margin-bottom-20">Código: (<?php echo $fasda['badge_id']; ?>)</p>
<?php } ?>
</div>
</div>
<?php		}else{echo '<br><b style="color:red">ferramenta so é apenas rank 7 em diante</b><br>';}
}else{ 
	echo '<br><b style="color:red">Não foram encontrados resultados para <i style="color:black;">'.$buscar.'</i></b><br>';
}
}
?>
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
