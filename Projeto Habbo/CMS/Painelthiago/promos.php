<?php
ob_start();
	require_once '../global.php';
	$TplClass->SetParam('title', 'Promos');
	$TplClass->SetParam('zone', 'Promos');
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
	if($_POST['addpromo']){
		if(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['longcontent']) && isset($_POST['image'])){
			$title = $Functions->FilterText($_POST['title']);
			$content = $_POST['content'];
			$formulario = $_POST['formulario'];
			$longcontent = $_POST['longcontent'];
			$image = $Functions->FilterText($_POST['image']);
			if(empty($title) || empty($image) || empty($content)){
				echo "<script>alert('Algo esta em branco!');location.href='/Painelthiago/promos.php';</script>";
			}else{
				$dbQuery= array();
				$dbQuery['title'] = $title;
				$dbQuery['shortstory'] = $content;
				$dbQuery['longstory'] = $longcontent;
				$dbQuery['image'] = $image;
				$dbQuery['formulario'] = $formulario;
				$dbQuery['author'] = $_SESSION['username'];
				$dbQuery['date'] = time();
				$query = $db->insertInto('cms_news', $dbQuery);
				$db->query("INSERT INTO cms_stafflogs (username, action, message, rank, userid, timestamp) VALUES ('". $_SESSION['username'] ."','Promos', 'Ha creado el Promo ".$title."', '". $user['rank'] ."', '". $user['id'] ."', '".date("Y-m-d ")."')");
                echo "<script>alert('Promo criada com exito!');location.href='/Painelthiago/promos.php';</script>";
			}
		}
	}
	if($_POST['editpromo']){
		if(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['longcontent']) && isset($_POST['image'])){
			$title = $Functions->FilterText($_POST['title']);
			$content = $_POST['content'];
			$longcontent = $_POST['longcontent'];
			$formulario = $_POST['formulario'];
			$image = $Functions->FilterText($_POST['image']);
			if(empty($_POST['title']) || empty($_POST['content']) || empty($_POST['image'])){
				$_SESSION['ERROR_RETURN'] = "Has dejado campos vac&iacute;os";
				header("LOCATION: ". HK ."/promos.php");
			}else{
				$db->query("UPDATE cms_news SET title = '{$title}', shortstory = '{$content}', image = '{$image}', longstory = '{$longcontent}', author = '{$_SESSION['username']}', formulario = '{formulario}', date = '".time()."' WHERE id = '{$id}' LIMIT 1");	
				$db->query("INSERT INTO cms_stafflogs (username, action, message, rank, userid, timestamp) VALUES ('". $_SESSION['username'] ."','Promos', 'Ha editado el Promo ".$title."', '". $user['rank'] ."', '". $user['id'] ."', '".date("Y-m-d ")."')");
                echo "<script>alert('Promo editada com exito!');location.href='/Painelthiago/promos.php';</script>";
			}				
		}
	}
	if($action == "err" && !empty($id)){
			$db->query("INSERT INTO cms_stafflogs (username, action, message, rank, userid, timestamp) VALUES ('". $_SESSION['username'] ."','Promos', 'Ha borrado un Promo', '". $user['rank'] ."', '". $user['id'] ."', '".date("Y-m-d ")."')");
			$db->query("DELETE FROM cms_news WHERE id = '{$id}' LIMIT 1");
            echo "<script>alert('Promo excluida com exito!');location.href='/Painelthiago/promos.php';</script>";					
	}
	
define("show_plugin_menu", true);
require("inc/top.php");
ob_end_flush(); 
?>
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
<aside class="right-side">
<section class="content">
<div class="row">
<div class="col-md-12">
<section class="panel">
<?php global $db;
if($action == "edit" && !empty($id)){ 
$hj = $db->query("SELECT * FROM cms_news WHERE id = '". $id ."'");
$h_edit = $hj->fetch_array();		
?>
<header class="panel-heading">
Edita notícia<br>
<form action="" method="post">
</header>
<div class="panel-body">
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Título</label>
<div class="col-sm-10">
<input id="input-text" name="title" value="<?php echo $h_edit['title']; ?>" class="form-control" maxlength="30">
</div>
</div><br><br>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Formulário</label>
<div class="col-sm-10">
<select class="form-control" name="formulario">
<option value="0">Desativado</option>
<option value="1">Ativado</option>
</select>
</div>
</div><br><br>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Subtítulo</label>
<div class="col-sm-10">
<input id="input-text" name="content" value="<?php echo $h_edit['shortstory']; ?>" class="form-control">
</div>
</div><br><br>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">URL da imagem</label>
<div class="col-sm-10">
<input id="input-text" name="image" value="<?php echo $h_edit['image']; ?>" class="form-control">
<br><br>
</div>
</div>
<script src="/adminpan/js/ckeditor/ckeditor.js"></script>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Conteúdo</label>
<div class="col-sm-10">
<textarea name="longcontent"  rows="15" cols="80"><?php echo $h_edit['longstory']; ?></textarea>
</div>
</div>
<br><br><br>
<input style="width: 130px;
float: right;
margin-right: 14px; margin-top: 10px;" name="editpromo" type="submit" class="btn btn-success" value="Edita">
</div>
</section>
</div>
<?php }else{ ?>
<header class="panel-heading">
Criar notícia<br>
<form action="" method="post">
</header>
<div class="panel-body">
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Título</label>
<div class="col-sm-10">
<input id="input-text" name="title" class="form-control" maxlength="30">
</div>
</div><br><br>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Formulário</label>
<div class="col-sm-10">
<select class="form-control" name="formulario">
<option value="0">Desativado</option>
<option value="1">Ativado</option>
</select>
</div>
</div><br><br>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Subtítulo</label>
<div class="col-sm-10">
<input id="input-text" name="content" class="form-control">
</div>
</div><br><br>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">URL da imagem</label>
<div class="col-sm-10">
<input id="input-text" name="image" class="form-control">
<br><br>
</div>
</div>
<script src="/adminpan/js/ckeditor/ckeditor.js"></script>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Conteúdo</label>
<div class="col-sm-10">
<textarea name="longcontent"  rows="15" cols="80"></textarea>
</div>
</div>
<br><br><br>
<input style="width: 130px;
float: right;
margin-right: 14px; margin-top: 10px;" name="addpromo" type="submit" class="btn btn-success" value="Criar">
</div>
</section>
</div>
</form>
<?php } ?>
</header>
<div class="col-md-12">
<section class="panel">
<header class="panel-heading">
Todas as notícias<br>
<div class="panel-body">
<table class="table table-striped table-bordered table-condensed">
<table class="table table-striped table-bordered table-condensed">
<tbody>
<?php global $db;
$result = $db->query("SELECT * FROM cms_news ORDER BY id DESC");
if($result->num_rows > 0){
while($data = $result->fetch_array()){
echo '<li style="font-size:13px;">&#9758; '.$data['title'].' &#187; <div style="float:right;"><a href="'. HK .'/promos.php?action=edit&id='.$data['id'].'"><b><i class="fa fa-pencil-square-o"></i> Editar</b></a> | <a href="'. HK .'/promos.php?action=err&id='.$data['id'].'"><b><i class="fa fa-trash-o"></i> Excluir</b></a></div></li><p><b>Autor:</b> '.$data['author'].'<hr>';
unset($k);
}
echo '</ul>';									
}else{
echo '<b style="color:red;">Ops, O painel do Habbz não acho nem uma notícia.</i>';
}
?>
</table>
</div>
</div>
</div>
<script>
CKEDITOR.replace( 'editor1' );
</script>	
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