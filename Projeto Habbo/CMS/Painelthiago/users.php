<?php
ob_start();
	require_once '../global.php';
	$TplClass->SetParam('title', 'Editar Usuario');
	$TplClass->SetParam('zone', 'Editar Usuario');
	$Functions->LoggedHk("true");
	
	$users = $db->query("SELECT * FROM users WHERE username = '{$_SESSION['username']}' AND password = '{$_SESSION['password']}'");
	$user = $users->fetch_array();
	$action = $Functions->FilterText($_GET['action']);
	$id = $Functions->FilterText($_GET['id']);

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
		if(empty($buscar)){
				echo "<script>alert('Coloque um nome de usuário!');location.href='/Painelthiago/users.php?buscar';</script>";
		}else{
			$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
			$sql = "SELECT * FROM users WHERE username = '$buscar' ORDER BY id DESC";
			mysql_select_db(DB_DATABASE, $con);
			$result = mysql_query($sql, $con);
			$total = mysql_num_rows($result);
			if ($row = mysql_fetch_array($result)){
					header("LOCATION: ". HK ."/users.php?id=".$row['id']."");
			}else{ 
				$_SESSION['ERROR_RETURN'] = "No se encontraron resultados para: <b>$buscar</b>";
				echo "<script>alert('Não se acha resultado para esse usuário!');location.href='/Painelthiago/users.php?buscar';</script>";
			}
		}
	}
	if(isset($_POST['save'])){
		if(empty($_POST['email'])){
			echo "<script>alert('Algo esta em branco!');location.href='/Painelthiago/users.php?id=".$id."';</script>";
		}else{
			$db->query("UPDATE users SET motto = '{$Functions->FilterText($_POST['mision'])}', mail = '{$Functions->FilterText($_POST['email'])}', cms_background = '{$Functions->FilterText($_POST['imgfondo'])}', credits = '{$Functions->FilterText($_POST['creditos'])}', activity_points = '{$Functions->FilterText($_POST['duckets'])}' vip_points = '{$Functions->FilterText($_POST['diamantes'])}' WHERE id = ".$id."");
			$db->query("INSERT INTO cms_stafflogs (username, action, message, rank, userid, timestamp) VALUES ('". $_SESSION['username'] ."','Editar usuáios', 'Edito o usuário com o id: ".$id."', '". $user['rank'] ."', '". $user['id'] ."', '".date("Y-m-d ")."')");
			echo "<script>alert('Usuário foi editado com exito!');location.href='/Painelthiago/users.php?id=".$id."';</script>";
		}

	}
define("show_plugin_menu", true);
require("inc/top.php");
ob_end_flush(); 
?>
<html>
<body>
<div class="row">
<?php global $db;
	if(!empty($id)){ 
	$hj = $db->query("SELECT * FROM users WHERE id = '". $id ."'");
	$h_edit = $hj->fetch_array();		
?>
<div class="col-lg-12">
<div class="panel border-1 border-orange-500">
<div class="panel-title bg-orange-500">
<div class="panel-head color-white" style="margin-left:15px;"><i class="fa fa-search"></i> Buscar usuário</div>
</div>
<div class="panel-body">
<form action="" method="post">
<p class="text-light margin-bottom-20">Procura o usuário é edite</p>
<div class="form-group">
<input type="text" class="form-control" id="input-text" name="palabra" placeholder="Nome de Usuário">
</div>
<input name="buscador" style="width: 150px;
float: right;
margin-right: 14px; margin-top: 10px;" type="submit" class="btn btn-success" value="Buscar">
</form>
</div>
</div>
</div>
<div class="col-lg-8">
<div class="panel border-1 border-orange-500">
<div class="panel-title bg-orange-500">
<div class="panel-head color-white" style="margin-left:15px;"><i class="fa fa-edit"></i> Edita <?php echo $h_edit['username']; ?></div>
</div>
<div class="panel-body">
<form action="" method="post">
<table>
<tr>
<td>Nome:</td>
<td><b><input style="width:260%;margin-left:-;border:1px solid gray;margin-bottom:10px;" type="text" class="form-control" id="input-text" value="<?php echo $h_edit['username']; ?>" disabled="true" /></b></td>
</tr>
<tr>
<td><br>Missão:</td>
<td><b><input style="width:260%;margin-left:-;border:1px solid gray;margin-bottom:10px;" type="text" class="form-control" id="input-text" name="mision" value="<?php echo $h_edit['motto']; ?>" /></b></td>
</tr>  
<tr> 
<td>ID:</td>
<td><b><input style="width:260%;margin-left:-;border:1px solid gray;margin-bottom:10px;" type="text" class="form-control" id="input-text" value="<?php echo $h_edit['id']; ?>" disabled="true" /></b></td>
</tr>
<tr>
<td>Email:</td>
<td><b><input style="width:260%;margin-left:-;border:1px solid gray;margin-bottom:10px;" type="text" class="form-control" id="input-text" value="<?php echo $h_edit['mail']; ?>" name="email" /></b></td>
</tr>
<tr>
<td>Rank:</td>
<td><input style="width:260%;margin-left:-;border:1px solid gray;margin-bottom:10px;" type="text" class="form-control" id="input-text" value="<?php echo $h_edit['rank']; ?>" disabled="true" /></td>
</tr>
<tr>
<td>Foi registado:</td>
<td><input style="width:260%;margin-left:-;border:1px solid gray;margin-bottom:10px;" type="text" class="form-control" id="input-text" value="<?php setlocale(LC_TIME,"spanish"); echo utf8_encode(strftime("%A %d de %B del 2015", $h_edit['account_created'])); ?>" disabled="true" /></td>
</tr>
<tr>
<td>Ùltima conexão:</td>
<td><input style="width:260%;margin-left:-;border:1px solid gray;margin-bottom:10px;" type="text" class="form-control" id="input-text" value="<?php setlocale(LC_TIME,"spanish"); echo utf8_encode(strftime("%c", $h_edit['last_online'])); ?>" disabled="true" /></td>
</tr>
<tr>
<td>Aniversário:</td>
<td><input style="width:260%;margin-left:-;border:1px solid gray;margin-bottom:10px;" type="text" class="form-control" id="input-text" value="<?php echo $h_edit['cms_birthday']; ?>" disabled="true" /></td>
</tr>
<tr>
<td>Foto de Perfil:</td>
<td><input style="width:260%;margin-left:-;border:1px solid gray;margin-bottom:10px;" type="text" class="form-control" id="input-text" name="imgprofile" value="<?php echo $h_edit['cms_pprofile']; ?>"/></td>
</tr>
<tr>
<td>Foto de Fundo:</td>
<td><input style="width:260%;margin-left:-;border:1px solid gray;margin-bottom:10px;" type="text" class="form-control" id="input-text" name="imgfondo" value="<?php echo $h_edit['cms_pbackground']; ?>"/></td>
</tr>
<tr>
<td>Facebook:</td>
<td>http://facebook.com/<input style="width:260%;margin-left:-;border:1px solid gray;margin-bottom:10px;" type="text" class="form-control" id="input-text" name="face" value="<?php echo $h_edit['facebook']; ?>"/></td>
</tr>
<tr>
<td>Twitter:</td>
<td>http://twitter.com/<input style="width:260%;margin-left:-;border:1px solid gray;margin-bottom:10px;" type="text" class="form-control" id="input-text" name="twit" value="<?php echo $h_edit['cms_twitter']; ?>"/></td>
</tr>
<tr>
<td>IP:</td>
<td><b><input style="width:260%;margin-left:-;border:1px solid gray;margin-bottom:10px;" type="text" class="form-control" id="input-text" value="<?php echo $h_edit['ip_last']; ?>" disabled="true" /></b></td>
</tr>
<tr>
<td>Diamantes:</td>
<td><input style="width:260%;margin-left:-;border:1px solid gray;margin-bottom:10px;" type="number" min="-99999999" max="99999999" class="form-control" id="input-text" name="diamantes" maxlength="8" value="<?php echo $h_edit['vip_points']; ?>" /></td>
</tr>
<tr>
<td>Cr&eacute;ditos:</td>
<td><input style="width:260%;margin-left:-;border:1px solid gray;margin-bottom:10px;" type="number" min="-99999999" max="99999999" class="form-control" id="input-text" name="creditos" maxlength="8" value="<?php echo $h_edit['credits']; ?>" /></td>
</tr>
<tr>
<td>Duckets:</td>
<td><input style="width:260%;margin-left:-;border:1px solid gray;margin-bottom:10px;" type="number" min="-99999999" max="99999999" class="form-control" id="input-text" name="duckets" maxlength="8" value="<?php echo $h_edit['activity_points']; ?>" /></td>
</tr>
<tr>
<td>Referidos:</td>
<td><input style="width:260%;margin-left:-;border:1px solid gray;margin-bottom:10px;" type="text" class="form-control" id="input-text" value="<?php echo $h_edit['cms_refers']; ?>" disabled="true" /></td>
</tr>
<tr>
<td>V&iacute;deo:</td>
<td><input style="width:260%;margin-left:-;border:1px solid gray;margin-bottom:10px;" type="text" class="form-control" id="input-text" name="video" value="<?php echo $h_edit['cms_video']; ?>"/></td>
</tr>
</table>
<input name="save" style="width: 150px;
float: right;
margin-right: 14px; margin-top: 10px;" type="submit" class="btn btn-success" value="Editar">
</form>
</div>
</div>
</div>			
<div class="col-lg-4">
<div class="panel border-1 border-orange-500">
<div class="panel-title bg-orange-500">
<div class="panel-head color-white" style="margin-left:15px;"><i class="fa fa-user"></i> <?php echo $h_edit['username']; ?></div>
</div>
<div class="panel-body" style="padding:20px;height:150px;width:100%;background-image: url('<?php echo $h_edit['cms_background']; ?>');">
<table>
<td>
<table>
<tr>
<td width="10">
<img src="<?php echo AVATARIMAGE; ?><?php echo $h_edit['look']; ?>&direction=2&head_direction=3&gesture=sml&action=wav&size=n" width="64" height="110"/>
</td>
<td>
<div style="background: rgba(0, 0, 0, 0.8);padding:5px;border-radius:5px;color:white;"><b>Nome:</b> <?php echo $h_edit['username']; ?></div>
<br>
<div style="background: rgba(0, 0, 0, 0.8);padding:5px;border-radius:5px;color:white;"><b>Missão:</b> <?php echo $h_edit['motto']; ?></div>
</td>
</tr>
</table>
</td>
</table>
</div>
</div>
</div>
<?php }else{ ?>
<div class="col-lg-6">
<div class="panel border-1 border-orange-500">
<div class="panel-title bg-orange-500">
<div class="panel-head color-white"><i class="fa fa-search"></i> Buscar um Usuário</div>
</div>
<div class="panel-body">
<form action="" method="post">
<p class="text-light margin-bottom-20">Procure o usuário é edite</p>
<div class="form-group">
<input type="text" class="form-control" id="input-text" name="palabra" placeholder="Nombre de Usuario">
</div>
<input name="buscador" style="width: 150px;
float: right;
margin-right: 14px; margin-top: 10px;" type="submit" class="btn btn-success" value="Buscar">
</form>
</div>
</div>
</div>
<?php } ?>
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
