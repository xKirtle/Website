<?php
header("Content-Type: text/html; charset=iso-8859-1",true); 
require_once('./data_classes/server-data.php_data_classes-core.php.php');
require_once('./data_classes/server-data.php_data_classes-session.php.php');
$maintenance2 = mysql_num_rows(mysql_query("SELECT * FROM cms_settings WHERE mantenimiento = '1'"));
$useradmin2 = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'");
$useradmin = mysql_fetch_array($useradmin2);
if($maintenance2 == '1' && $useradmin['rank'] < 5){
		header("Location: manutencao");
}


?>
<?php include_once("Pagina/HeadCMS.php"); ?>
<div class="container wow" data-wow-duration="1000ms" data-wow-delay="600ms">
<center><b><h4 style="Color:FF0000;"><?php echo $error; ?></h4></b>
<b><h4 style="Color:FF0000;"><?php echo $success; ?></h4></b></center>
<?php
if(isset($_POST["alterarsenha"]))
{
	$senhaantiga = HoloText($_POST['senhaantiga']);
		$senha = HoloText($_POST['novasenha']);
	if(mysql_num_rows(mysql_query("SELECT id,username,password FROM users WHERE username = '".$_SESSION['username']."' AND password = MD5(SHA1(MD5('" . $senhaantiga . "'))) LIMIT 1")) == 1)
	{
		if($_POST['novasenha'] != $_POST['confirmacaonovasenha'])
	{
			echo ("<div class='container'><div class='alert alert-danger fade in'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Erro!</strong> As senhas não coincidem.
</div></div>");
	}else{
		if(strlen($_POST['novasenha']) < 6)
	{
		echo ("<div class='container'><div class='alert alert-danger fade in'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Erro!</strong> A sua senha deve ter pelo menos 6 caracteres
</div></div>");
	}else{
		mysql_query("UPDATE users SET password = MD5(SHA1(MD5('" . $senha . "'))) WHERE username = '" . $_SESSION['username'] ."'");
		mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $useradmin['id'] . "','" . $useradmin['id'] . "','#','" . time() . "','VocÃª alterou sua senha')");
	echo ("<div class='container'><div class='alert alert-success fade in'>
 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Enviado!</strong> SENHA ALTERADA PARA: $senha  (ATUALIZE A PÁGINA E FAÇA LOGIN NOVAMENTE!)
</div></div>");
	session_destroy();
	}
	}
	}else{
					echo ("<div class='container'><div class='alert alert-danger fade in'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Erro!</strong> Senha atual incorreta!
</div></div>");

	}
}else if(isset($_POST["alteraremail"]))
{
$emailantigo = HoloText($_POST['antigoemail']);
		$email = HoloText($_POST['novoemail']);
	if(mysql_num_rows(mysql_query("SELECT id,username,password FROM users WHERE username = '".$_SESSION['username']."' AND mail = '" . $emailantigo . "' LIMIT 1")) == 1)
	{
		
		if(!preg_match("/^[A-Z0-9._-]{2,}+@[A-Z0-9._-]{2,}\.[A-Z0-9._-]{2,}$/i", $_POST['novoemail']))
	{
			echo ("<div class='container'><div class='alert alert-danger fade in'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Erro!</strong> Informe um email válido!
</div></div>");
	}else{
		mysql_query("UPDATE users SET mail = '" . $email . "' WHERE username = '" . $_SESSION['username'] ."'");
		mysql_query("INSERT INTO notificacao (criador,recebedor,url,data,texto) VALUES ('" . $useradmin['id'] . "','" . $useradmin['id'] . "','#','" . time() . "','VocÃª alterou seu Email')");
		mysql_query("UPDATE users SET LalaConf = '0' WHERE username = '" . $_SESSION['username'] ."'");		
		echo ("<div class='container'><div class='alert alert-success fade in'>
 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Enviado!</strong> EMAIL ALTERADO PARA: $email !
</div></div>");
	}
	}else{
			echo ("<div class='container'><div class='alert alert-danger fade in'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Erro!</strong> Email atual incorreto!
</div></div>");
	}
	
	}else if(isset($_POST["alterarcapa"]))
{
	
$background = HoloText($_POST['capa']);
	mysql_query("UPDATE users SET cms_background = '" . $background . "' WHERE username = '" . $_SESSION['username'] ."'");
		echo ("<div class='container'><div class='alert alert-success fade in'>
 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Enviado!</strong> Capa de perfil alterada para: $background
</div></div>");
echo "<script>alert('Capa de perfil alterada para: $background');location.href='/settings';</script>";	
}else{
	
}

?>
<div class="col-md-4">
<div class="panel panel-primary">
<div class="panel-heading">Configurações</div>
<div class="list-group">
<a href="#tab1" data-toggle="tab" class="list-group-item">Configurações Perfil</a>
<a href="#tab2" data-toggle="tab" class="list-group-item">Mudar Senha</a>
<a href="#tab3" data-toggle="tab" class="list-group-item">Mudar Email</a>
</div>
</div>
<div class="panel panel-danger">
<div class="panel-heading">Mudança de Senha</div>
<div class="panel-body">
<div class="habboclub-banner-container habboclub-clothes-banner"></div>
<p class="habboclub-header">A Equipe do Hotel informa que logo após a mudança de senha, o usuário deve anotar a senha para futuramente não a perder!</p>
<p class="habboclub-link"><a href="/client">Entre no Hotel &gt;&gt;</a></p>
</div>
</div>
</div>
<div class="parrent media-body">
<div class="tab-content">
<div class="tab-pane fade active in" id="tab1">                                       
<form class="form-horizontal" method="POST">
<fieldset>
<div class="panel panel-default">
<div class="panel-heading">Alterar Perfil</div>
<div class="panel-body">
<div class="form-group">
<div class="col-md-12">
<label class="control-label" for="capa">Capa do Perfil</label>
<input id="capa" name="capa" value="<?php echo $useradmin['cms_background']; ?>" type="text" placeholder="URL da capa... (Tamanho mínimo: 1140x360) Ex: https://i.imgur.com/example.png" class="form-control input-md" required="">
</div>
</div>
<!-- Button (Double) -->
<div class="form-group">
<label class="control-label" for="alterar"></label>
<div class="col-md-8">
<button id="alterarcapa" name="alterarcapa" class="btn btn-primary">Alterar Capa</button>
</div>
</fieldset>
</form>
</div>
<div class="tab-pane fade" id="tab2">
<form class="form-horizontal" method="POST">
<fieldset>
<!-- Password input-->
<div class="panel panel-default">
<div class="panel-heading">Alterar Senha</div>
<div class="panel-body">
<div class="form-group">
<div class="col-md-12">
<label class="control-label" for="senhaantiga">Senha Antiga</label>
<input id="senhaantiga" name="senhaantiga" type="password" placeholder="Senha Antiga" class="form-control input-md" required="">
</div>
</div>
<!-- Password input-->
<div class="form-group">
<div class="col-md-12">
<label class="control-label" for="novasenha">Nova Senha</label>
<input id="novasenha" name="novasenha" type="password" placeholder="Nova Senha" class="form-control input-md" required="">    
</div>
</div>
<!-- Password input-->
<div class="form-group">
<div class="col-md-12">
<label class="control-label" for="confirmacaonovasenha">Confirmar Nova Senha</label>
<input id="confirmacaonovasenha" name="confirmacaonovasenha" type="password" placeholder="Confirmar Nova Senha" class="form-control input-md" required="">
</div>
</div>
<!-- Button (Double) -->
<div class="form-group">
<div class="col-md-12">
<label class="control-label" for="alterar"></label>
<button id="alterarsenha" name="alterarsenha" class="btn btn-primary">Alterar Senha</button>
</div>
</div>
</div>
</div>
</fieldset>
</form>
</div>
<div class="tab-pane fade" id="tab3">
<form class="form-horizontal" method="POST">
<fieldset>
<!-- Password input-->
<div class="panel panel-default">
<div class="panel-heading">Alterar Email</div>
<div class="panel-body">
<div class="form-group">
<div class="col-md-12">
<label class="control-label" for="antigoemail">Email Antigo</label>
<input id="antigoemail" name="antigoemail" type="text" placeholder="Email Antigo" class="form-control input-md" required="">
</div>
</div>
<!-- Password input-->
<div class="form-group">
<div class="col-md-12">
<label class="control-label" for="novoemail">Novo Email</label>
<input id="novoemail" name="novoemail" type="text" placeholder="Novo Email" class="form-control input-md" required="">
</div>
</div>
<!-- Button -->
<div class="form-group">
<div class="col-md-12">
<label class="control-label" for="alteraremail"></label>
<button id="alteraremail" name="alteraremail" class="btn btn-primary">Alterar Email</button>
</div>
</div>
</div>
</div>
</fieldset>
</form>
</div>
</div> <!--/.tab-content-->  
</div> <!--/.media-body--> 
</div> <!--/.media-->     
</div><!--/.tab-wrap-->               
</div><!--/.col-sm-6-->			
</div>
</div>
</section><!--/#bottom-->
<?php include_once("Pagina/Foorte.php"); ?>