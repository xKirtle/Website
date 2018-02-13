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
if($_POST['iduser'] != ""){
			$num1 = $_POST['iduser'];
header("location: $path/perfil?pesquisa=$num1");
		}
?>
<?php include_once("Pagina/HeadCMS.php"); ?>
<div class="container wow" data-wow-duration="1000ms" data-wow-delay="600ms">
<div class="container">
<div class="row">
<div class="col-md-4">
<div class="panel panel-primary">
<div class="panel-heading">Sobre o VIP é SVIP</div>
<div class="panel-body">
<p><center><img src="Externos/img/vip_image.gif" alt="" /></center><br /></p>
<p><strong></strong><br /><br /></p>
<p></p>
</div>
</div>
</div>
<div class="row">
<div class="col-md-4">
<div class="panel panel-success">
<div class="panel-heading">Usuários VIP</div>
<?php
$e = mysql_query("SELECT username,look,motto,rank,id FROM users WHERE rank = 2 ORDER BY rank DESC");
while($f = mysql_fetch_array($e)){
?>
<div class="list-group">                   
<a class="list-group-item" style="text-decoration: none;" href="perfil?pesquisa=<?php echo $f['username']; ?>">
<div class="media">
<div class="media-left">
<div style="background-image: url(http://www.habbo.com.br/habbo-imaging/avatarimage?figure=<?php echo $f['look']; ?>&size=m&direction=2&head_direction=2&gesture=sml); background-position: -2px -17px; width:50px; height:50px;">
</div>
</div>
<div class="media-body">
<b><?php echo $f['username']; ?></b>
<br>Missão: <?php echo $f['motto']; ?></div>
</div>
</a>
</div>
<?php } ?>
</div></div>
<div class="row">
<div class="col-md-4">
<div class="panel panel-info">
<div class="panel-heading">Usuários SVIP</div>
<?php
$e = mysql_query("SELECT username,look,motto,rank,id FROM users WHERE rank = 3 ORDER BY rank DESC");
while($f = mysql_fetch_array($e)){
?>
<div class="list-group">                   
<a class="list-group-item" style="text-decoration: none;" href="perfil?pesquisa=<?php echo $f['username']; ?>">
<div class="media">
<div class="media-left">
<div style="background-image: url(http://www.habbo.com.br/habbo-imaging/avatarimage?figure=<?php echo $f['look']; ?>&size=m&direction=2&head_direction=2&gesture=sml); background-position: -2px -17px; width:50px; height:50px;">
</div>
</div>
<div class="media-body">
<b><?php echo $f['username']; ?></b>
<br>Missão: <?php echo $f['motto']; ?></div>
</div>
</a>
</div>
<?php } ?>
</div></div>
</ul>
</div>
</div></br>
<li class="list-group-item list-group-item" style=" text-transform: uppercase; ">
<div class="row">
<center>
<form method="POST">
<div class="col-sm-12">
<div class="col-sm-3">
<strong>Procurar perfil do usuário:</strong>
</div>
<div class="col-sm-7">
<input type="text" name="iduser" class="form-control">
</div>
<input type="submit" class="btn btn-info" value="PESQUISAR">
</div>
</form>
</center>
</div>
</li>
</div>
</section><!--/#bottom-->
<?php include_once("Pagina/Foorte.php"); ?>