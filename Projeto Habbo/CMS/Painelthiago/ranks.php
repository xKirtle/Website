<?php
ob_start();
	require_once '../global.php';
	$TplClass->SetParam('title', 'Dar Rangos');
	$TplClass->SetParam('zone', 'Dar Rango');
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
	if($_POST['giverank']){
		$check = $db->query("SELECT * FROM users WHERE username = '".$Functions->FilterText($_POST['name'])."' LIMIT 1");
		$row = $check->fetch_array();
		$repeat = $db->query("SELECT * FROM users_badges WHERE user_id = '". $row['id'] ."' && badge_id = '".$Functions->FilterText($_POST['badge'])."' LIMIT 1");
        if($repeat->num_rows > 0){
			echo "<script>alert('Usuário não tem rank!');location.href='/Painelthiago/ranks.php';</script>";
		}else{
			if($check->num_rows > 0){
				$db->query("UPDATE users SET rank = '{$Functions->FilterText($_POST['rankid'])}', rankcms = '{$Functions->FilterText($_POST['rankid2'])}', cms_staffocult = '{$Functions->FilterText($_POST['ocult'])}' WHERE username = '{$_POST['name']}'");
				$db->query("INSERT INTO cms_stafflogs (username, action, message, rank, userid, timestamp) VALUES ('". $_SESSION['username'] ."','Deu rank', 'Deu rank ".$_POST['rankid']." para ".$_POST['name']."', '". $user['rank'] ."', '". $user['id'] ."', '".date("Y-m-d ")."')");
				$db->query("INSERT INTO users_badges (user_id, badge_id) VALUES ('". $row['id'] ."', '{$Functions->FilterText($_POST['badge'])}')");
                echo "<script>alert('Rank coloca com exito!');location.href='/Painelthiago/ranks.php';</script>";
			}else {
             echo "<script>alert('Usuário não existe!');location.href='/Painelthiago/ranks.php';</script>";
			}
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
<div class="panel border-1 border-green-500">
<div class="panel-title bg-green-500">
<div class="panel-head color-white" style="margin-left:11px;"><i class="fa fa-user-plus"></i> Dar Rank</div>
</div>
<div class="panel-body">
<form action="" method="post">
<p class="text-light margin-bottom-20">Preencha todos os campos para adicionar um rank</p>
<div class="form-group">
<label for="input-text" class="control-label">Usuário</label>
<input type="text" class="form-control" id="input-text" name="name" placeholder="Usuário que você vai da o rank" value="">
</div>
<div class="form-group">
<label for="input-text" class="control-label">Cargo no Hotel</label>
<br><select class="form-control" name="rankid">
<?php $que = $db->query("SELECT * FROM ranks ORDER BY id DESC"); while($qued = $que->fetch_array()){?>
<option value="<?php echo $qued['id']; ?>"><?php echo $qued['name']; ?></option>
<?php } ?>
</select>
</div>
<div class="form-group">
<label for="input-text" class="control-label">Rank na CMS</label>
<br><select class="form-control" name="rankid2">
<?php $que = $db->query("SELECT * FROM ranks ORDER BY id DESC"); while($qued = $que->fetch_array()){?>
<option value="<?php echo $qued['id']; ?>"><?php echo $qued['name']; ?></option>
<?php } ?>
</select>
</div>
<div class="form-group">
<label for="input-text" class="control-label">Pin</label>
<input type="text" class="form-control" id="input-text" name="pin" placeholder="Pin de login" value="">
</div>
<div class="form-group">
<label for="input-text" class="control-label">Trabalho a fazer</label>
<input type="text" class="form-control" id="input-text" name="role" placeholder="Trabalho a fazer" value="">
</div>
<div class="form-group">
<label for="input-text" class="control-label">Cargo Oculto</label>
<br><select value="0" class="form-control" name="ocult">
<option value="0">Não</option>
<option value="1">Sim</option>
</select>
</div>
<div class="form-group">
<label for="input-text" class="control-label">Emblema</label>
<input type="text" class="form-control" id="input-text" name="badge" placeholder="Emblema para ganha" value="">
</div>
<input name="giverank"  style="width: 150px;
float: right;
margin-right: 14px; margin-top: 10px;" type="submit" class="btn btn-success" value="Dar rank">
</form>
</div>
</div>
</div>
<div class="col-lg-3">
<div class="panel border-1 border-green-300">
<div class="panel-title bg-green-300">
<div class="panel-head color-white" style="margin-left:15px;"><i class="fa fa-shield"></i> Usuários com Rank</div>
</div>
<div class="panel-body" style="max-height:800px;display: block;overflow: auto;">
<?php global $db;
$result = $db->query("SELECT * FROM users WHERE rank >= 3 ORDER BY id DESC");
if($result->num_rows > 0){
	while($data = $result->fetch_array()){
		echo '<li style="font-size:13px;">'.$data['username'].' <div style="float:right;"> <b><i class="fa fa-shield"></i> Rank:</b> '.$data['rank'].'</div></li><hr>';
		unset($k);
	}
	echo '</ul>';
	
}else{
	echo '<b style="color:red;">Ops, o Painel do Habbz não acho nem um usuário com cargo!</i>';
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