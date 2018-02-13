<?php
header("Content-Type: text/html; charset=iso-8859-1",true); 
require_once('./data_classes/server-data.php_data_classes-core.php.php');
require_once('./data_classes/server-data.php_data_classes-session.php.php');
$maintenance2 = mysql_num_rows(mysql_query("SELECT * FROM cms_settings WHERE mantenimiento = '1'"));
$useradmin2 = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'");
$useradmin = mysql_fetch_array($useradmin2);
?>
<?php require_once('Thiago/licencia.php'); ?>
<?php include_once("Pagina/HeadCMS.php"); ?>
<div class="container">
<div class="panel panel-default">
<div class="panel-body">
<small><i>Equipe Habbz - O melhor para você!</i></small>
  <h2>Escolha em nosso menu!</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Staff</a></li>
    <li><a data-toggle="tab" href="#menu1">Ajudantes</a></li>
    <li><a data-toggle="tab" href="#menu2">Colaboradores</a></li>
    <li><a data-toggle="tab" href="#menu3">Oficiais do Habbz</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>Equipe Staff</h3>
      <?php
$e = mysql_query("SELECT * FROM ranks WHERE id>'4' ORDER BY id DESC");
while($f = mysql_fetch_array($e)){
$sql2 = mysql_query("SELECT * FROM users WHERE rank='" . $f['id'] . "' AND cms_staffocult='0' ORDER BY LIMIT 24");
$f21 = mysql_fetch_array($sql2);
?>
<?php
$sql212 = mysql_query("SELECT * FROM users WHERE rank='" . $f['id'] . "' AND cms_staffocult='0' ORDER BY id");
while($f211 = mysql_fetch_array($sql212)){
?> 
<div class="panel panel-info" style="float: left;height:250px;width:400px;">
<div class="panel-heading" style="background-color: <?php echo $f['color']; ?>; color:#FFF;">
<?php echo $f['name']; ?> <i class="<?php echo $f['fafacod']; ?>" style="float: right;"></i>
</div>
<div id="column1" class="column">
<div class="habblet-container" style="float:left;">
<div class="cb settings">
<div class="bt"><div></div></div><div class="i1"><div class="i2"><div class="i3">
<div class="panel-body" style="padding:20px;height:205px;width:400px;background-image: url('<?php echo $f211['cms_background']; ?>');">
<div style="display:block;">
<br>
<div class="habblet-container" style="width:280px; float:left">
<div class="cb clearfix darkred "><div class="bt"><div></div></div><div class="i1"><div class="i2"><div class="i3">
<?php if($f211['online'] == 1){ ?>
<img style="margin-left:0px; margin-top: -2px;" src="Externos/img/online.gif" />
<?php } ?>
<?php if($f211['online'] == 0){ ?>
<img style="margin-left:0px; margin-top: -6px;" src="Externos/img/offline.gif" />
<?php } ?>
<img src="swf/c_images/album1584/ADM.gif" style="margin-right:-70px; margin-top: 18px;" align="right"> 
<div style="float:left"><img src="http://www.habbo.com.br/habbo-imaging/avatarimage?figure=<?php echo $f211['look']; ?>&amp;head_direction=3&amp;action=wav"></div>
<br>
<div style="float:left; padding:5px 5px 0 5px; font-weight:bold; text-align:center"><font style="color:#595959;">
</font></div>
<div style="margin-left:60px; background: rgba(0, 0, 0, 0.8);padding:5px;border-radius:5px;color:white;"><b>Nome:</b> <?php echo $f211['username']; ?></div>
<br>
<div style="margin-left:60px; background: rgba(0, 0, 0, 0.8);padding:5px;border-radius:5px;color:white;"><b>Missão:</b> <?php echo $f211['motto']; ?></div>
</div></div></div><div class="bb"><div></div></div></div>
</div>
</div>
</div>
</div></div></div></div><div class="bb"><div></div></div></div>
</div></div>						
<?php }	?>
<?php } ?>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Ajudantes</h3>
            <?php
$e = mysql_query("SELECT * FROM ranks WHERE id='4' ORDER BY id DESC");
while($f = mysql_fetch_array($e)){
$sql2 = mysql_query("SELECT * FROM users WHERE rank='" . $f['id'] . "' AND cms_staffocult='0' ORDER BY LIMIT 24");
$f21 = mysql_fetch_array($sql2);
?>
<?php
$sql212 = mysql_query("SELECT * FROM users WHERE rank='" . $f['id'] . "' AND cms_staffocult='0' ORDER BY id");
while($f211 = mysql_fetch_array($sql212)){
?> 
<div class="panel panel-info" style="float: left;height:250px;width:400px;">
<div class="panel-heading" style="background-color: <?php echo $f['color']; ?>; color:#FFF;">
<?php echo $f['name']; ?> <i class="<?php echo $f['fafacod']; ?>" style="float: right;"></i>
</div>
<div id="column1" class="column">
<div class="habblet-container" style="float:left;">
<div class="cb settings">
<div class="bt"><div></div></div><div class="i1"><div class="i2"><div class="i3">
<div class="panel-body" style="padding:20px;height:205px;width:400px;background-image: url('<?php echo $f211['cms_background']; ?>');">
<div style="display:block;">
<br>
<div class="habblet-container" style="width:280px; float:left">
<div class="cb clearfix darkred "><div class="bt"><div></div></div><div class="i1"><div class="i2"><div class="i3">
<?php if($f211['online'] == 1){ ?>
<img style="margin-left:0px; margin-top: -2px;" src="Externos/img/online.gif" />
<?php } ?>
<?php if($f211['online'] == 0){ ?>
<img style="margin-left:0px; margin-top: -6px;" src="Externos/img/offline.gif" />
<?php } ?>
<img src="swf/c_images/album1584/HQ016.gif" style="margin-right:-70px; margin-top: 18px;" align="right"> 
<div style="float:left"><img src="http://www.habbo.com.br/habbo-imaging/avatarimage?figure=<?php echo $f211['look']; ?>&amp;head_direction=3&amp;action=wav"></div>
<br>
<div style="float:left; padding:5px 5px 0 5px; font-weight:bold; text-align:center"><font style="color:#595959;">
</font></div>
<div style="margin-left:60px; background: rgba(0, 0, 0, 0.8);padding:5px;border-radius:5px;color:white;"><b>Nome:</b> <?php echo $f211['username']; ?></div>
<br>
<div style="margin-left:60px; background: rgba(0, 0, 0, 0.8);padding:5px;border-radius:5px;color:white;"><b>Missão:</b> <?php echo $f211['motto']; ?></div>
</div></div></div><div class="bb"><div></div></div></div>
</div>
</div>
</div>
</div></div></div></div><div class="bb"><div></div></div></div>
</div></div>						
<?php }	?>
<?php } ?>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Colaboradores</h3>
                  <?php
$e = mysql_query("SELECT * FROM rankscms WHERE id>'4' ORDER BY id DESC");
while($f = mysql_fetch_array($e)){
$sql2 = mysql_query("SELECT * FROM users WHERE rankcms='" . $f['id'] . "' AND cms_staffocult='0' ORDER BY LIMIT 24");
$f21 = mysql_fetch_array($sql2);
?>
<?php
$sql212 = mysql_query("SELECT * FROM users WHERE rankcms='" . $f['id'] . "' AND cms_staffocult='0' ORDER BY id");
while($f211 = mysql_fetch_array($sql212)){
?> 
<div class="panel panel-info" style="float: left;height:250px;width:400px;">
<div class="panel-heading" style="background-color: <?php echo $f['color']; ?>; color:#FFF;">
<?php echo $f['name']; ?> <i class="<?php echo $f['fafacod']; ?>" style="float: right;"></i>
</div>
<div id="column1" class="column">
<div class="habblet-container" style="float:left;">
<div class="cb settings">
<div class="bt"><div></div></div><div class="i1"><div class="i2"><div class="i3">
<div class="panel-body" style="padding:20px;height:205px;width:400px;background-image: url('<?php echo $f211['cms_background']; ?>');">
<div style="display:block;">
<br>
<div class="habblet-container" style="width:280px; float:left">
<div class="cb clearfix darkred "><div class="bt"><div></div></div><div class="i1"><div class="i2"><div class="i3">
<?php if($f211['online'] == 1){ ?>
<img style="margin-left:0px; margin-top: -2px;" src="Externos/img/online.gif" />
<?php } ?>
<?php if($f211['online'] == 0){ ?>
<img style="margin-left:0px; margin-top: -6px;" src="Externos/img/offline.gif" />
<?php } ?>
<img src="swf/c_images/album1584/HQ016.gif" style="margin-right:-70px; margin-top: 18px;" align="right"> 
<div style="float:left"><img src="http://www.habbo.com.br/habbo-imaging/avatarimage?figure=<?php echo $f211['look']; ?>&amp;head_direction=3&amp;action=wav"></div>
<br>
<div style="float:left; padding:5px 5px 0 5px; font-weight:bold; text-align:center"><font style="color:#595959;">
</font></div>
<div style="margin-left:60px; background: rgba(0, 0, 0, 0.8);padding:5px;border-radius:5px;color:white;"><b>Nome:</b> <?php echo $f211['username']; ?></div>
<br>
<div style="margin-left:60px; background: rgba(0, 0, 0, 0.8);padding:5px;border-radius:5px;color:white;"><b>Missão:</b> <?php echo $f211['motto']; ?></div>
</div></div></div><div class="bb"><div></div></div></div>
</div>
</div>
</div>
</div></div></div></div><div class="bb"><div></div></div></div>
</div></div>						
<?php }	?>
<?php } ?>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Somos como quaisquer outra pessoa que você usuário(a) poderia conhecer em nosso servidor, estamos aqui para atende-lo da melhor forma, ser seu amigo e traçar metas e objetivos sempre em prol de uma comunidade melhor. </h3>
	  <br>
	  <h3>Se você precisar de qualquer ajuda, procure um dos membros da equipe que contem o emblema de equipe, ele podera lhe auxiliar no que for necessário.</h3>
      <p></p>
    </div>
  </div>
</div>
</div>
</div>
</div>
</section><!--/#bottom-->
<?php include_once("Pagina/Foorte.php"); ?>
