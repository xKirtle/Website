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
<div class="container">

    <div class="row">

        <div class="col-md-8">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Parece que algo deu errado!</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 style="margin:0px">Oops!</h3>
                            Parece que algo deu errado e você foi desconectado do hotel, mas não se preocupe, clique no botão ao lado para entrar novamente.
                        </div>
                        <div class="col-md-4">
                            <a href="/client" class="btn btn-success btn-block btn-lg" style="font-size: 20px; height:63px; ">Entrar<br><small>Novamente</small></a>

                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Solução de problemas</h3>
                </div> 
                <div class="panel-body">

                    <div class="well">Verifique se a solução do seu problema não está na lista abaixo</div>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
						    <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                        [TELA BRANCA] - Não consegue entrar porque a tela fica branca? [TUTORIAL BASICO]
                                    </a>
                                </h4>
                            </div>
							   <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>1 - Entre no hotel.</p>
									<p>2 - Aperte no icone (i).</p>
									<p>3 - Procure por Flash.</p>
									<p>4 - Aperte em sempre permitir neste site.</p>
									<p>5 - Aperte em quaque luga fora da caixa branca.</p>
									<p>6 - Vai vim uma mensagem com um botão chamado Recarregar aperte nele.</p>
									<p>7 - Pronto, você vai consegui entra no hotel.</p>
                                    <p>
                                        <img src="Externos/img/i53-Sk1yQ-2QZxq8V26-yg.png">
                                    </p>
                                    <p> Você entedeu? ser sim então aperte no botão abaixo.</p>
                                    <a href="/client" ><button type="button" id="blankScreenButton" class="btn btn-primary" style="margin-top:10px;">
                                        Tenta Entra
                                    </button></a>
                                </div>
                            </div>
							<br>
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                        [TELA BRANCA] - Não consegue entrar porque a tela fica branca? [TUTORIAL DIFICIL]
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Caso na hora de entrar no jogo a tela fique branca você pode tentar solucionar o problema abaixo.</p>
                                    <p>1 - Você consegue ver as imagens asseguir?</p>
                                    <p>
                                        <img src="swf/c_images/album1584/SPACE3.gif">
                                        <img src="swf/c_images/album1584/ADM.gif">
                                        <img src="swf/c_images/album1584/SVIP.gif">
                                    </p>
                                    <p>2 - Agora faça o teste da SWF.</p>
                                    <button type="button" id="blankScreenButton" class="btn btn-primary" data-toggle="modal" data-target="#blankScreen" style="margin-top:10px;">
                                        Fazer teste
                                    </button> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
			$content = $_POST['shortstory'];
			$author = $_POST['author'];
			$type = $_POST['type'];
			$longcontent = $_POST['longcontent'];
			$image = $Functions->FilterText($_POST['image']);
{
				$dbQuery= array();
				$dbQuery['title'] = $title;
				$dbQuery['shortstory'] = $content;
				$dbQuery['longstory'] = $longcontent;
				$dbQuery['image'] = $image;
				$dbQuery['author'] = $author;
				$dbQuery['type'] = $type;
				$dbQuery['date'] = time();
				$query = $db->insertInto('cms_formulario', $dbQuery);
				echo "<script>alert('Enviado com exito!');location.href='$path/clientutils.php';</script>";
			}
		}
	}
	
define("show_plugin_menu", true);
ob_end_flush(); 
?>
        <div class="col-md-4">


            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Reportar um erro</h3>
                </div>
                <div class="panel-body">
                    Caso esteja tendo problemas constantes para entrar no hotel, nos informe pra tentarmos ajuda-lo!
                    <button type="button" id="reportbug" class="btn btn-primary pull-right" id="formulario" name="formulario" data-toggle="modal" data-target="#myModal" style="margin-top:10px;">
                        Reportar um bug ou problema
                    </button>

                </div>

            </div>
        </div>



    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
<form action="" method="post">
<input type="hidden" name="acao" value="formulario1">
  <div class="form-group">
    <label for="textNome" class="control-label">Usuário</label>
    <input readonly="readonly" id="nomes" name="title" class="form-control" placeholder="Digite seus Nomes..." value="<?php echo $useradmin['username']; ?>" type="text">
  </div>
  
  <div class="form-group">
    <label for="inputEmail" class="control-label">Texto</label>
    <input id="texto" name="longcontent" class="form-control" style="margin: 0px -1px 0px 0px; height: 87px; width: 658px;" placeholder="Insira o texto aqui, caso necessário" type="text">
  </div>
  
   <div class="form-group">
    <label for="inputEmail" class="control-label">Link da imagem ( Se necessário )</label>
    <input id="image" name="image" class="form-control" placeholder="Insira o link da imagem" type="text">
  </div>
  
       <div class="form-group">
    <label for="inputEmail" class="control-label">Assunto</label>
    <input readonly="readonly" id="content" name="content" class="form-control"  value="Bug no Hotel">
  </div>
   
     <div class="form-group">
    <label for="inputEmail" class="control-label">Envia para</label>
    <input readonly="readonly" id="author" name="author" class="form-control"  value="Staff do hotel">
  </div>
  
       <div class="form-group">
    <label for="inputEmail" class="control-label">Id do formulário</label>
    <input readonly="readonly" id="type" name="type" class="form-control"  value="....">
  </div>
  
  <input type="submit" value="Enviar formulário" name="addpromo" id="doregister" class="btn btn-primary" >
<input type="hidden" id="addpromo" size="35" name="addpromo" value="sendToken"> 
  </form>
            </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="blankScreen" tabindex="-1" role="dialog" aria-labelledby="blankScreen">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Correção de tela branca</h4>
            </div>
            <div id="blankScreenDisplay"></div>
            <div class="modal-body">
                <h3>Você consegue ver as fotos acima?</h3>
                <b>SIM?</b> Então tente entrar no Hotel novamente!<br>
                NÃO? Então <a href="https://swf-img16.habbospirata.com/static/HabboWuplle.swf?update01" target="_blank">clique aqui</a> para tentar carregar a SWF manualmente.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

</section><!--/#bottom-->
<?php include_once("Pagina/Foorte.php"); ?>