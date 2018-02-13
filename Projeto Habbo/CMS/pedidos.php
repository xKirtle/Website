<?php
ob_start();
	require_once 'global.php';
	$TplClass->SetParam('title', 'Pedidos da Rádio');
	$TplClass->SetParam('zone', 'Pedidos da Rádio');
	
	$users = $db->query("SELECT * FROM users WHERE username = '{$_SESSION['username']}' AND password = '{$_SESSION['password']}'");
	$user = $users->fetch_array();
	$action = $Functions->FilterText($_GET['action']);
	$id = $Functions->FilterText($_GET['id']);

	if($_POST['addpromo']){
		if(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['longcontent']) && isset($_POST['image'])){
			$title = $Functions->FilterText($_POST['title']);
			$content = $_POST['content'];
			$longcontent = $_POST['longcontent'];
			$image = $Functions->FilterText($_POST['image']);
			if(empty($title) || empty($image) || empty($content)){
            echo "<script>alert('Algo esta em branco!');location.href='/pedidos.php';</script>";
			}else{
				$dbQuery= array();
				$dbQuery['title'] = $title;
				$dbQuery['shortstory'] = $content;
				$dbQuery['longstory'] = $longcontent;
				$dbQuery['image'] = $image;
				$dbQuery['author'] = $_SESSION['username'];
				$dbQuery['date'] = time();
				$db->query("INSERT INTO radio_pedidos (username, action, message, rank, userid, timestamp) VALUES ('". $_SESSION['username'] ."','Pedidos', 'Pedido: ".$title."', '". $user['rank'] ."', '". $user['id'] ."', '".date("Y-m-d ")."')");
				$_SESSION['GOOD_RETURN'] = "<script>alert('Enviado com exito!');</script>";
				echo "<script>alert('Enviado com exito!');location.href='/pedidosenviado.php';</script>";
			}
		}
	}
	
define("show_plugin_menu", true);
ob_end_flush(); 
?>
<?php
require_once('./data_classes/server-data.php_data_classes-core.php.php');
require_once('./data_classes/server-data.php_data_classes-session.php.php');
// COLOCA ESSAS 5 linhas abaixo para não dar erro (SEMPRE NO TOPO DA PÁGINA)
$maintenance2 = mysql_num_rows(mysql_query("SELECT * FROM cms_settings WHERE mantenimiento = '1'"));
$useradmin2 = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'");
$useradmin = mysql_fetch_array($useradmin2);
?>
<link href="Painelthiago/css/bootstrap/bootstrap.min.css" rel="stylesheet"/>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="Painelthiago/css/libs/nanoscroller.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="Painelthiago/css/compiled/layout.css">
<link rel="stylesheet" type="text/css" href="Painelthiago/css/compiled/elements.css">
<script type="text/javascript" src="http://tinymce.cachefly.net/4.2/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
selector: "textarea",
plugins: [
"advlist autolink lists link image charmap print preview anchor",
"searchreplace visualblocks code fullscreen",
"insertdatetime media table contextmenu paste"
],
toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script> 
<br>
<aside class="right-side">
<section class="content">
<div class="row">
<div class="col-md-12">
<section class="panel" style="width: 400px;height:200px;">
<?php global $db;
if($action == "edit" && !empty($id)){ 
$hj = $db->query("SELECT * FROM radio_pedidos WHERE id = '". $id ."'");
$h_edit = $hj->fetch_array();		
?>
<?php }else{ ?>
<header class="panel-heading">
Manda pedido da rádio<br>
<form action="" method="post">
</header>
<div class="panel-body">
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Pedido</label>
<div class="col-sm-10">
<input id="input-text" name="title" class="form-control" maxlength="30">
</div>
</div><br><br>
<div class="form-group" style="display: none;">
<label class="col-sm-2 col-sm-2 control-label">Subtítulo</label>
<div class="col-sm-10">
<input id="input-text" name="content" value="Habbz" class="form-control">
</div>
</div><br><br>
<div class="form-group" style="display: none;">
<label class="col-sm-2 col-sm-2 control-label">URL da imagem</label>
<div class="col-sm-10">
<input id="input-text" name="image" value="Habbz" class="form-control">
<br><br>
</div>
</div>
<script src="/adminpan/js/ckeditor/ckeditor.js"></script>
<div class="form-group" style="display: none;">
<label class="col-sm-2 col-sm-2 control-label">Conteúdo</label>
<div class="col-sm-10">
<textarea name="longcontent" value="Habbz"  rows="15" cols="80"></textarea>
</div>
</div>
<br><br><br>
<input style="width: 290px;
float: right;
margin-right: 8px; margin-top: -100;" name="addpromo" type="submit" class="btn btn-success" value="Manda pedido da rádio">
</section>
</div>
</form>
<?php } ?>
</header>
<div class="col-md-12">
<section class="panel">
<header class="panel-heading">
<div class="panel-body">
						<div class="panel-title bg-grey-500">
							<div class="panel-head color-white"><i class="fa fa-tasks"></i> Pedidos da Rádio </div>
						</div>
						<div style="padding:3px;" class="panel-body">
							<div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height:430px;">
								<table border="1" style="width:100%">
								  <tr>
									<th style="width:15%;"><center>Usuário é Rank</center></th>
									<th style="width:25%;"><center>Ação</center></th> 
									<th style="width:43.75%;"><center>Detalhes</center></th>
									<th style="width:16.25%;"><center>Enviado</center></th>
								  </tr>
									<?php global $db;
										$busc = $db->query("SELECT * FROM radio_pedidos ORDER by id DESC");
										if($busc->num_rows > 0){
											while($info = $busc->fetch_array()){ ?>
												<tr>
													<td style="padding:5px;"><center><?php echo $info['username']; ?> / <b><?php echo $info['rank']; ?></b></center></td>
													<td style="padding:5px;"><center><?php echo $info['action']; ?></center></td> 
													<td style="padding:5px;"><?php echo $info['message']; ?></td>
													<td><center>Enviado em <?php echo $info['timestamp']; ?></center></td>
												</tr>
									<?php } }else{ echo '<center><b style="color:red;">Ops, o painel Habbz não acho nem um pedidos!</b></center>'; } ?>
								</table>
							</div>
						</div>
</body>
</html>