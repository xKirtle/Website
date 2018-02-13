<?php
ob_start();
	require_once '../global.php';
	$TplClass->SetParam('title', 'Coloca emblemas');
	$TplClass->SetParam('zone', 'Coloca emblemas');
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
	if(isset($_POST['guardar'])){ 
		$code = $Functions->FilterText($_POST['code']);
		$title = $Functions->FilterText($_POST['title']);
		$desc_b =$Functions->FilterText($_POST['desc_badge']);
		$nombrefoto1 = $_FILES['foto1']['name'];
		$ruta1 = $_FILES['foto1']['tmp_name'];
		if(empty($code) || empty($title) || empty($desc_b) || empty($nombrefoto1)){
			echo "<script>alert('Você deixo algo vazio!');location.href='/Painelthiago/subir.php';</script>";	
		}else{
			if(is_uploaded_file($ruta1)){ 
				if($_FILES['foto1']['type'] == 'image/gif'){
					$tips = 'gif';
					$type = array('image/gif' => 'gif');
					$name = $id.$nombrefoto1;
					$destino1 =  "../swf/c_images/album1584/".$name;//URL de tu carpeta album1584
					copy($ruta1,$destino1);
					
					$file = 'localhost/swf/gamedata/external_flash_texts.txt';//URL de tus external_flash_texts
					$fp = fopen($file, 'a');
					fwrite($fp, "\r\nbadge_name_".$code."=".$title."\r\n");
					fwrite($fp, "badge_desc_".$code."=".$desc_b);
					fclose($fp);
					
					$dbQuery= array();
					$dbQuery['code'] = $code;
					$dbQuery['required_right'] = '';
					$query = $db->insertInto('badge_definitions', $dbQuery);
					$db->query("INSERT INTO badge_definitions (code, required_right,) VALUES ('". $_SESSION['username'] ."',''");					
                    echo "<script>alert('Emblema hospedado com exito!');location.href='/Painelthiago/subir.php';</script>";
					
					$ruta_imagen = $destino1;
					$miniatura_ancho_maximo = 40;
					$miniatura_alto_maximo = 40;

					$info_imagen = getimagesize($ruta_imagen);
					$imagen_ancho = $info_imagen[0];
					$imagen_alto = $info_imagen[1];
					$imagen_tipo = $info_imagen['mime'];

					switch ( $imagen_tipo ){
					  case "image/gif":
						$imagen = imagecreatefromgif( $ruta_imagen );
						break;
					}
					$lienzo = imagecreatetruecolor( $miniatura_ancho_maximo, $miniatura_alto_maximo );
					imagefilledrectangle($lienzo, $imagesx());
					imagecopyresampled($lienzo, $imagen, 0, 0, 0, 0, $miniatura_ancho_maximo, $miniatura_alto_maximo, $imagen_ancho, $imagen_alto);
					imagegif($lienzo, $destino1, 80);
				}else{
					echo "<script>alert('So imagens .GIF é de 40x40!');location.href='/Painelthiago/subir.php';</script>";
				}
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
<div class="panel border-1 border-blue-500" style="margin-left:10px;">
<div class="panel-title bg-blue-500" style="margin-left:15px;">
<div class="panel-head color-white"><i class="fa fa-upload"></i> Hospedar um emblema no hotel!</div>
</div>
<br>
<p class="text-light margin-bottom-20" style="margin-left:15px;"> ATENÇÃO: Depois que hospeda o emblema você deve ir no hotel é fala o comando: (:atualizar badge_definitions)</p>
<div class="panel-body">
<form action="" method="post" enctype="multipart/form-data">
<p class="text-light margin-bottom-20">Imagem GIF de 40x40 px</p>
<div class="form-group">
<label for="input-text" class="control-label">C&oacute;digo</label>
<input type="text" class="form-control" id="input-text" name="code" placeholder="C&oacute;digo">
</div>
<div class="form-group">
<label for="input-text" class="control-label">Nome do Titulo</label>
<input type="text" class="form-control" id="input-text" name="title" placeholder="Nome do Titulo">
</div>
<div class="form-group">
<label for="input-text" class="control-label">Descrição</label>
<input type="text" class="form-control" id="input-text" name="desc_badge" placeholder="Descrição do emblema">
</div>
<input class="btn btn-dark bg-light-blue-300 color-white margin-left-10" name="foto1" type="file" id="foto1" ><br>
<input style="width: 150px;
float: right;
margin-right: 14px; margin-top: 10px;" name="guardar" type="submit" class="btn btn-success" value="Hospeda emblema">
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