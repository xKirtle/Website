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
            <div class="row">
                	<div class="col-md-3">
<div class="panel panel-warning">
  <div class="panel-heading"> <img src="_images/moedas.png"/> TOP 5 MOEDAS</div>
  
<?php
$e = mysql_query("SELECT username,look,credits,id FROM users WHERE rank < 4 ORDER BY credits DESC LIMIT 5");
while($f = mysql_fetch_array($e)){
?>
 <a class="list-group-item" href="perfil?pesquisa=<?php echo $f['username']; ?>" style="text-decoration: none;">
						<div class="media">
							<div class="media-left" style="padding-right: 0px; display: table-cell; vertical-align: top;">
								<div style="background-image: url(http://www.habbo.com.br/habbo-imaging/avatarimage?figure=<?php echo $f['look']; ?>&amp;size=m&amp;direction=2&amp;head_direction=2&amp;gesture=sml&img_format=png); background-position: -2px -17px; width:50px; height:50px;">
								</div>
							</div>
							<div class="media-body" style="display: table-cell;
    vertical-align: top;
	width: 10000px;
	
	overflow: hidden;
    zoom: 1;">
								<b><?php echo $f['username']; ?></b> &nbsp;
								<br><p style="line-height: 100%"><span><?php echo $f['credits']; ?> Moedas</span></p>
							</div>
						</div>
					</a>  
<?php } ?>
				
</div>
</div>

<div class="col-md-3">
<div class="panel panel-danger">
  <div class="panel-heading"> <img src="_images/duckets.png"/> TOP 5 DUCKETS</div>
  <?php
$e = mysql_query("SELECT username,look,activity_points,id FROM users WHERE rank < 4 ORDER BY activity_points DESC LIMIT 5");
while($f = mysql_fetch_array($e)){
?>
   <a class="list-group-item" href="perfil?pesquisa=<?php echo $f['username']; ?>" style="text-decoration: none;">
						<div class="media">
							<div class="media-left" style="padding-right: 0px; display: table-cell; vertical-align: top;">
								<div style="background-image: url(http://www.habbo.com.br/habbo-imaging/avatarimage?figure=<?php echo $f['look']; ?>&amp;size=m&amp;direction=2&amp;head_direction=2&amp;gesture=sml&img_format=png); background-position: -2px -17px; width:50px; height:50px;">
								</div>
							</div>
							<div class="media-body" style="display: table-cell;
    vertical-align: top;
	width: 10000px;
	
	overflow: hidden;
    zoom: 1;">
								<b><?php echo $f['username']; ?></b> &nbsp;
								<br><p style="line-height: 100%"><span><?php echo $f['activity_points']; ?> Duckets</span></p>
							</div>
						</div>
					</a>  
					<?php } ?>
</div>
</div>

<div class="col-md-3">
<div class="panel panel-info">
  <div class="panel-heading"> <img src="_images/diamonds.png"/> TOP 5 DIAMANTES</div>
  <?php
$e = mysql_query("SELECT username,look,vip_points,id FROM users WHERE rank < 4 ORDER BY vip_points DESC LIMIT 5");
while($f = mysql_fetch_array($e)){
?>
   <a class="list-group-item" href="perfil?pesquisa=<?php echo $f['username']; ?>" style="text-decoration: none;">
						<div class="media">
							<div class="media-left" style="padding-right: 0px; display: table-cell; vertical-align: top;">
								<div style="background-image: url(http://www.habbo.com.br/habbo-imaging/avatarimage?figure=<?php echo $f['look']; ?>&amp;size=m&amp;direction=2&amp;head_direction=2&amp;gesture=sml&img_format=png); background-position: -2px -17px; width:50px; height:50px;">
								</div>
							</div>
							<div class="media-body" style="display: table-cell;
    vertical-align: top;
	width: 10000px;
	
	overflow: hidden;
    zoom: 1;">
								<b><?php echo $f['username']; ?></b> &nbsp;
								<br><p style="line-height: 100%"><span><?php echo $f['vip_points']; ?> Diamantes</span></p>
							</div>
						</div>
					</a>  
					<?php } ?>
</div>
</div>

<div class="col-md-3">
<div class="panel panel-success">
  <div class="panel-heading"> <img src="_images/star.gif"/> TOP 5 RESPEITOS</div>
  <?php
$datosTop = mysql_query("SELECT * FROM user_stats ORDER BY Respect DESC LIMIT 5");

while($datosTop10 = mysql_fetch_array($datosTop)){
$user_q = mysql_query("SELECT * FROM users WHERE id='".$datosTop10["id"]."' LIMIT 1");
$user = mysql_fetch_array($user_q);
?>
   <a class="list-group-item" href="perfil?pesquisa=<?php echo $user['username']; ?>" style="text-decoration: none;">
						<div class="media">
							<div class="media-left" style="padding-right: 0px; display: table-cell; vertical-align: top;">
								<div style="background-image: url(http://www.habbo.com.br/habbo-imaging/avatarimage?figure=<?php echo $user['look']; ?>&amp;size=m&amp;direction=2&amp;head_direction=2&amp;gesture=sml&img_format=png); background-position: -2px -17px; width:50px; height:50px;">
								</div>
							</div>
							<div class="media-body" style="display: table-cell;
    vertical-align: top;
	width: 10000px;
	
	overflow: hidden;
    zoom: 1;">
								<b><?php echo $user['username']; ?></b> &nbsp;
								<br><p style="line-height: 100%"><span><?php echo $datosTop10['Respect']; ?> Respeitos</span></p>
							</div>
						</div>
					</a>  
					<?php } ?>
</div>
</div>
				
				</br>
				
<div class="col-md-3">
<div class="panel panel-default">
  <div class="panel-heading"> <img src="_images/room_enter.png"/> TOP 5 Quartos</div>
  <?php
$datosTop = mysql_query("SELECT * FROM rooms ORDER BY score DESC LIMIT 5");

while($datosTop10 = mysql_fetch_array($datosTop)){
$user_q = mysql_query("SELECT * FROM users WHERE id='".$datosTop10["owner"]."' LIMIT 1");
$user = mysql_fetch_array($user_q);
?>
   <a class="list-group-item" href="perfil?pesquisa=<?php echo $user['username']; ?>" style="text-decoration: none;">
						<div class="media">
							<div class="media-left" style="padding-right: 0px; display: table-cell; vertical-align: top;">
								<div style="background-image: url(Files/images/room_icon_3.gif); width:32px; height:32px;">
								</div>
							</div>
							<div class="media-body" style="display: table-cell;
    vertical-align: top;
	width: 10000px;
	
	overflow: hidden;
    zoom: 1;">
								<b><?php echo $datosTop10['caption']; ?></b></br>
								Dono: <b><?php echo $user['username']; ?></b></br>
								<p style="line-height: 100%"><span><?php echo $datosTop10['score']; ?> Pontos</span></p>
							</div>
						</div>
					</a>  
					<?php } ?>
</div>
</div>
				
				
<div class="col-md-3">
<div class="panel panel-default">
<div class="panel-heading"> <img src="_images/promo.gif"/> TOP 5 Estrelas</div>
<?php
$e = mysql_query("SELECT username,look,gotw_points,id FROM users WHERE rank < 4 ORDER BY gotw_points DESC LIMIT 5");
while($f = mysql_fetch_array($e)){
?>
<a class="list-group-item" href="perfil?pesquisa=<?php echo $f['username']; ?>" style="text-decoration: none;">
<div class="media">
<div class="media-left" style="padding-right: 0px; display: table-cell; vertical-align: top;">
<div style="background-image: url(http://www.habbo.com.br/habbo-imaging/avatarimage?figure=<?php echo $user2['look']; ?>&amp;size=m&amp;direction=2&amp;head_direction=2&amp;gesture=sml&img_format=png); background-position: -2px -17px; width:50px; height:50px;">
</div>
</div>
<div class="media-body" style="display: table-cell;
    vertical-align: top;
	width: 10000px;
	
	overflow: hidden;
    zoom: 1;">
<b><?php echo $f['username']; ?></b></br>
<p style="line-height: 100%"><span><?php echo $f['gotw_points']; ?> Estrelas</span></p>
</div>
</div>
</a>  
<?php } ?>
</div>
</div>				
<div class="col-md-3">
<div class="panel panel-default">
<div class="panel-heading"> <img src="_images/eventos.gif"/> TOP 5 Pontos de Conquistas</div>
<?php
$datosTop = mysql_query("SELECT * FROM user_stats ORDER BY AchievementScore DESC LIMIT 5");

while($datosTop10 = mysql_fetch_array($datosTop)){
$user_q = mysql_query("SELECT * FROM users WHERE id='".$datosTop10["id"]."' LIMIT 1");
$user = mysql_fetch_array($user_q);
?>
<a class="list-group-item" href="perfil?pesquisa=<?php echo $user['username']; ?>" style="text-decoration: none;">
<div class="media">
<div class="media-left" style="padding-right: 0px; display: table-cell; vertical-align: top;">
<div style="background-image: url(http://www.habbo.com.br/habbo-imaging/avatarimage?figure=<?php echo $user['look']; ?>&amp;size=m&amp;direction=2&amp;head_direction=2&amp;gesture=sml&img_format=png); background-position: -2px -17px; width:50px; height:50px;">
</div>
</div>
<div class="media-body" style="display: table-cell;
    vertical-align: top;
	width: 10000px;
	
	overflow: hidden;
    zoom: 1;">
<b><?php echo $user['username']; ?></b>
<p style="line-height: 100%"><span><?php echo $datosTop10['AchievementScore']; ?> Pontos</span></p>
</div>
</div>
</a>  
<?php } ?>
</div>
</div>			
<div class="col-md-3">
<div class="panel panel-default">
<div class="panel-heading"> <img src="_images/ultimologin.png"/> TOP 5 Tempo Online</div>
<?php 
// FORMATA A DATA PARA ano x, mes x, etc ... (NÃO ALTERE ISSO POIS FOI FEITO PARA EVITAR BURLAGENS E FOI UNICO JEITO QUE FUNCIONOU!!!!!!!!)
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Brasilia');
function time_elapsed_B($secs){
    $bit = array(
        '  semana'        => $secs / 604800 % 52,
        '  dia'        => $secs / 86400 % 7,
        '  hora'        => $secs / 3600 % 24,
        '  minuto'    => $secs / 60 % 60,
        );
        
    foreach($bit as $k => $v){
        if($v > 1)$ret[] = $v . $k . "'s";
        if($v == 1)$ret[] = $v . $k;
        }
		if($secs / 60 % 60){
    $ret[] = 'atr&aacute;s.';	
		}else{
    $ret[] = 'Agora.';	
		}
    
    return join(' ', $ret);
    }
	?>
<?php
$datosTop = mysql_query("SELECT * FROM user_stats ORDER BY OnlineTime DESC LIMIT 5");

while($datosTop10 = mysql_fetch_array($datosTop)){
	
$user_q = mysql_query("SELECT * FROM users WHERE id='".$datosTop10['id']."' LIMIT 1");
$user = mysql_fetch_array($user_q);


?>
<a class="list-group-item" href="perfil?pesquisa=<?php echo $user['username']; ?>" style="text-decoration: none;">
<div class="media">
<div class="media-left" style="padding-right: 0px; display: table-cell; vertical-align: top;">
<div style="background-image: url(http://www.habbo.com.br/habbo-imaging/avatarimage?figure=<?php echo $user['look']; ?>&amp;size=m&amp;direction=2&amp;head_direction=2&amp;gesture=sml&img_format=png); background-position: -2px -17px; width:50px; height:50px;">
</div>
</div>
<div class="media-body" style="display: table-cell;
    vertical-align: top;
	width: 10000px;
	
	overflow: hidden;
    zoom: 1;">
<b><?php echo $user['username']; ?></b> &nbsp;
<br><p style="line-height: 100%"><span><?php echo time_elapsed_B($datosTop10['OnlineTime']); ?></span></p>
</div>
</div>
</a>  
<?php } ?>
</div>
</div>					
</div>
</div>
</section><!--/#bottom-->
<?php include_once("Pagina/Foorte.php"); ?>