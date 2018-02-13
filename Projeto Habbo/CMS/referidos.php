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
<br><br>
    <section id="bottom" style="margin-top:-40px;">
	<div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
	<div class="row"></br>
	<div class="col-md-8">
<div class="panel panel-default">
      <div class="panel-heading" style="background-color: #151515; color:#FFF;"><center><b><span class="glyphicon glyphicon-star"></span> &nbsp; DIVULGUE E GANHE &nbsp;<span class="glyphicon glyphicon-star"></span></b></center></div>
      <div class="panel-body"><center>
      <img src="Externos/img/referidos.gif"/>
					</br>Quer <b>Ganhar Diamantes</b> neste hotel e ao Mesmo Tempo Divulgar o Hotel, <b><?php echo $_SESSION['username']; ?></b>? <br>
				Agora isso Ficou Mais Facil <b>Habbz</b> Apresenta: <br> 
					
				<b>sistema de referências!</b><br><br></center>
</br>
					<h4>Note-se que:</h4>
					• Se duas pessoas, convidá-lo, apenas diga a ele como referindo-se o primeiro a fazê-lo.</br>
					• Você só pode se referir a pessoas que não estão registrados no Habbz.

				</div>
				</div>
				</div>

		





	
							<div class="col-md-4">
<div class="panel panel-primary">
      <div class="panel-heading"style="background-color: #d43e3c; color:#FFF;"><span class="glyphicon glyphicon-tags"></span> &nbsp;O QUE EU FAÇO ?</div>
      <div class="panel-body">
					Simplemente ir a algum xat, Habbo, criar um clone do habbo e Floden ou colocar o link a seguir em um fórum.<br />
					<b>Você deve dar qualquer um dos seguintes endereços para divulgar:</b><br><textarea class="form-control" rows="3" placeholder="Seu url da referência..." disabled style="height: 35px; width: 300px; "><?php echo $hotel_url.'/refer.php?r='.$_SESSION['username']; ?></textarea>
</div>
  </div>
  </br>
  
  <div class="panel panel-primary">
      <div class="panel-heading"style="background-color: #d43e3c; color:#FFF;"><span class="glyphicon glyphicon-tags"></span> &nbsp;SEUS REFERIDOS</div>
      <div class="panel-body">
					<img src="Externos/img/frank.png" style="float: left;">
	
					<p>
					Quando você traz uma conta considerável (<b>25+</b>) de referencias. Você pode trocar ela por moedas ou diamantes no jogo, Basta acessar a nossa <a href ="loja">Loja</a> sorte a todos.<br><br>
					<center><b>Você tem atualmente:


					</b><b style = "color: #FF0000;"><?php 

					if(!isset($_GET['n'])){
					$usuario = $_SESSION['username'];
					}
					else{
					$usuario = mysql_real_escape_string($_GET['n']);
					}
					
					
					$query = mysql_query("SELECT * FROM users WHERE username ='". $usuario ."'") or die(mysql_error()); 
        				$data = mysql_fetch_assoc($query); echo $data['referidos']; 
					?></b> Referidos</p></center>
</div>
  </div>
  <div class="panel panel-info">
<div class="panel-heading">TOP 5 Referidos</div>
<div class="list-group">
<?php
$e = mysql_query("SELECT username,look,referidos,id FROM users WHERE referidos > 0 ORDER BY referidos DESC LIMIT 5");
while($f = mysql_fetch_array($e)){
?>
<a class="list-group-item" style="text-decoration: none;" href="/hall?<?php echo $f['username']; ?>">
<div class="media">
<div class="media-left">
<div style="background-image: url(http://www.habbo.com.br/habbo-imaging/avatarimage?figure=<?php echo $f['look']; ?>&size=m&direction=2&gesture=sml&action=std,wav&head_direction=3); background-position: -8px -17px; width:50px; height:50px;">
</div>
</div>
<div class="media-body">
<b><?php echo $f['username']; ?>                                                   </b>
<br>
<span style="color:#00d0ca;"><i class="glyphicon glyphicon-tags" aria-hidden="true"></i> <?php echo $f['referidos']; ?> Referido(s)</span>
</div>
</div>
</a>
<?php } ?>
</div>
</div>
</div>
</div>
			        </div>
	
    </section><!--/#bottom-->
<?php include_once("Pagina/Foorte.php"); ?>