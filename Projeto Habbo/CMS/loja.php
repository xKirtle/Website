<?php
require_once('./data_classes/server-data.php_data_classes-core.php.php');
require_once('./data_classes/server-data.php_data_classes-session.php.php');
$maintenance2 = mysql_num_rows(mysql_query("SELECT * FROM cms_settings WHERE mantenimiento = '1'"));
$useradmin2 = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'");
$useradmin = mysql_fetch_array($useradmin2);
if($maintenance2 == '1' && $useradmin['rank'] < 5){
		header("Location: manutencao");
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <?php header("Content-Type: text/html; charset=iso-8859-1",true); ?>
	<?php include_once("Pagina/HeadCMS.php"); ?>
  <div class="col-md-12">
        <div class="container wow" data-wow-duration="1000ms" data-wow-delay="600ms">
           <div class="row">
		   
		   
<div class="col-md-8">

		   <?php
if($_GET['trocar'] == "creditos"){
$sqlcre = mysql_query("SELECT * FROM users WHERE username ='". $_SESSION['username'] ."'");
$credit = mysql_fetch_assoc($sqlcre);

if($credit['referidos'] - 25 >= 0){
if($credit['online'] == 0){
$sqlcre2 = mysql_query("UPDATE users SET credits=credits+10000, referidos = referidos-25 WHERE username ='". $_SESSION['username'] ."'");
echo"<div class='alert alert-success fade in'>
 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Creditado!</strong> Você acaba de trocar 25 referidos por 10.000 créditos.
</div>";
}else{
echo"<div class='alert alert-warning fade in'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Cuidado!</strong> Você deve estar offline no jogo para efetiar a troca dos referidos.
</div>";
}
}else{
echo"<div class='alert alert-danger fade in'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Erro!</strong> Você não tem referidos suficiente para trocar pelo plano escolhido.
</div>";
}
}

if($_GET['trocar'] == "duckets"){
$sqlduck = mysql_query("SELECT * FROM users WHERE username ='". $_SESSION['username'] ."'");
$duck = mysql_fetch_assoc($sqlduck);

if($duck['referidos'] - 25 >= 0){
if($duck['online'] == 0){
$sqlduck2 = mysql_query("UPDATE users SET activity_points=activity_points+20000, referidos = referidos-25 WHERE username ='". $_SESSION['username'] ."'");
echo"<div class='alert alert-success fade in'>
 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Creditado!</strong> Você acaba de trocar 25 referidos por 20.000 duckets.
</div>";
}else{
echo"<div class='alert alert-warning fade in'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Cuidado!</strong> Você deve estar offline no jogo para efetiar a troca dos referidos.
</div>";
}
}else{
echo"<div class='alert alert-danger fade in'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Erro!</strong> Você não tem referidos suficiente para trocar pelo plano escolhido.
</div>";
}
}					
	
if($_GET['trocar'] == "diamantes"){
$sqldim = mysql_query("SELECT * FROM users WHERE username ='". $_SESSION['username'] ."'");
$dima = mysql_fetch_assoc($sqldim);

if($dima['referidos'] - 25 >= 0){
if($dima['online'] == 0){
$sqldim = mysql_query("UPDATE users SET vip_points=vip_points+10, referidos = referidos-25 WHERE username ='". $_SESSION['username'] ."'");
echo"<div class='alert alert-success fade in'>
 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Creditado!</strong> Você acaba de trocar 25 referidos por 10 diamantes.
</div>";
}else{
echo"<div class='alert alert-warning fade in'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Cuidado!</strong> Você deve estar offline no jogo para efetiar a troca dos referidos.
</div>";
}
}else{
echo"<div class='alert alert-danger fade in'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Erro!</strong> Você não tem referidos suficiente para trocar pelo plano escolhido.
</div>";
}
}				

if($_GET['trocar'] == "estrelas"){
$sqlcre = mysql_query("SELECT * FROM users WHERE username ='". $_SESSION['username'] ."'");
$credit = mysql_fetch_assoc($sqlcre);

if($credit['referidos'] - 25 >= 0){
if($credit['online'] == 0){
$sqlcre2 = mysql_query("UPDATE users SET gotw_points=gotw_points+10, referidos = referidos-25 WHERE username ='". $_SESSION['username'] ."'");
echo"<div class='alert alert-success fade in'>
 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Creditado!</strong> Você acaba de trocar 25 referidos por 10 estrelas.
</div>";
}else{
echo"<div class='alert alert-warning fade in'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Cuidado!</strong> Você deve estar offline no jogo para efetiar a troca dos referidos.
</div>";
}
}else{
echo"<div class='alert alert-danger fade in'>
  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
  <strong>Erro!</strong> Você não tem referidos suficiente para trocar pelo plano escolhido.
</div>";
}
}

?>
	<div class="alert alert-warning">
  <strong>CUIDADO!</strong> Você pode trocar seus referidos nos planos que tem o botão "TROCAR", ao clicar neste botão, será descontado 25 referidos que não poderá ser recuperado, então preste bastante atenção em qual plano irá escolher.  :D</br></br><center>OBS: &nbsp;&nbsp;<span class="glyphicon glyphicon-retweet"></span> - TROCAR (POR REFERIDOS) &nbsp;& &nbsp;&nbsp;<span class="glyphicon glyphicon-shopping-cart"></span> - COMPRAR (PAGAMENTO DINHEIRO REAL)</center>
</div>
	

<div class="col-md-4" style="margin-top:10px;">
<div class="panel panel-warning class">
  <div class="panel-heading"><center><img src="Externos/img/credit.png" /> &nbsp;CRÉDITOS</center></div>
  <div class="panel-body">
  
 					 <div class="list-group-item" style="text-decoration: none;">
						<div class="media"><center>
							<div class="media-left">
								
								<div style="margin-top: 3px; border-radius: 4px;
    padding: 5px 27px 5px 10px;
    background: #f1f1f1;
    display: inline-block;
    border: 1px solid #000;
	width:80px;
   background: rgb(243, 187, 46) no-repeat right 5px center url(Externos/img/credit.png);
    color: #fff;
    box-shadow: inset 0 0 0 2px #f8ef2b;">10000 </div>
								
							</div>
							<div class="media-body">
								<a href="?trocar=creditos"><button type="submit" style="margin-top:3px;" class="btn btn-success"><span class="glyphicon glyphicon-retweet"></span></button></a>
							</div>
						</center>
						</div>
					 </div>
					 
					  <div class="list-group-item" style="text-decoration: none;">
						<div class="media"><center>
							<div class="media-left">
								
								<div style="margin-top: 3px; border-radius: 4px;
    padding: 5px 27px 5px 10px;
    background: #f1f1f1;
    display: inline-block;
    border: 1px solid #000;
	width:80px;
     background: rgb(243, 187, 46) no-repeat right 5px center url(Externos/img/credit.png);
    color: #fff;
    box-shadow: inset 0 0 0 2px #f8ef2b;">20000 </div>
								
							</div>
							<div class="media-body">
								<a href="#"><button type="submit" style="margin-top:3px;" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span></button></a>
							</div>
						</center>
						</div>
					 </div>
  
  
   <div class="list-group-item" style="text-decoration: none;">
						<div class="media"><center>
							<div class="media-left">
								
								<div style="margin-top: 3px; border-radius: 4px;
    padding: 5px 27px 5px 10px;
    background: #f1f1f1;
    display: inline-block;
    border: 1px solid #000;
	width:80px;
     background: rgb(243, 187, 46) no-repeat right 5px center url(Externos/img/credit.png);
    color: #fff;
    box-shadow: inset 0 0 0 2px #f8ef2b;">50000 </div>
								
							</div>
							<div class="media-body">
								<a href="#"><button type="submit" style="margin-top:3px;" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span></button></a>
							</div>
						</center>
						</div>
					 </div>
</div>
					 </div>
</div>

<div class="col-md-4" style="margin-top:10px;">
<div class="panel panel-danger class">
  <div class="panel-heading"><center><img src="Externos/img/duck.png" /> &nbsp;DUCKETS</center></div>
  <div class="panel-body">
    <div class="list-group-item" style="text-decoration: none;">
						<div class="media"><center>
							<div class="media-left">
								
								 <div style="border-radius: 4px;
    padding: 5px 27px 5px 10px;
    background: #f1f1f1;
	width:80px;
    margin-top:3px;
    display: inline-block;
    border: 1px solid #000;
    background: rgb(229, 0, 255) no-repeat right 5px center url(Externos/img/duck.png);
    color: #fff;
    box-shadow: inset 0 0 0 2px #ffabfa;">20000 </div>
								
							</div>
							<div class="media-body">
								<a href="?trocar=duckets"><button type="submit" style="margin-top:3px;" class="btn btn-success"><span class="glyphicon glyphicon-retweet"></span></button></a>
							</div>
						</center>
						</div>
					 </div>
  
  <div class="list-group-item" style="text-decoration: none;">
						<div class="media"><center>
							<div class="media-left">
								
								 <div style="border-radius: 4px;
    padding: 5px 27px 5px 10px;
    background: #f1f1f1;
	width:80px;
    margin-top:3px;
    display: inline-block;
    border: 1px solid #000;
    background: rgb(229, 0, 255) no-repeat right 5px center url(Externos/img/duck.png);
    color: #fff;
    box-shadow: inset 0 0 0 2px #ffabfa;">30000 </div>
								
							</div>
							<div class="media-body">
								<a href="#"><button type="submit" style="margin-top:3px;" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span></button></a>
							</div>
						</center>
						</div>
					 </div>
					 
					 <div class="list-group-item" style="text-decoration: none;">
						<div class="media"><center>
							<div class="media-left">
								
								 <div style="border-radius: 4px;
    padding: 5px 27px 5px 10px;
    background: #f1f1f1;
	width:80px;
    margin-top:3px;
    display: inline-block;
    border: 1px solid #000;
    background: rgb(229, 0, 255) no-repeat right 5px center url(Externos/img/duck.png);
    color: #fff;
    box-shadow: inset 0 0 0 2px #ffabfa;">50000 </div>
								
							</div>
							<div class="media-body">
								<a href="#"><button type="submit" style="margin-top:3px;" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span></button></a>
							</div>
						</center>
						</div>
					 </div>
					 
  
  </div>
</div>
</div>

<div class="col-md-4" style="margin-top:10px;">
    <div class="panel panel-info">
  <div class="panel-heading"><center><img src="Externos/img/diamond.png" /> &nbsp;DIAMANTES</center></div>
  <div class="panel-body">
   <div class="list-group-item" style="text-decoration: none;">
						<div class="media"><center>
							<div class="media-left">
								
								 <div style="border-radius: 4px;
    padding: 5px 27px 5px 10px;
    background: #f1f1f1;
    display: inline-block;
	width:80px;
    margin-top:3px;
    border: 1px solid #000;
    background: #02abff no-repeat right 5px center url(Externos/img/diamond.png);
    color: #fff;
    box-shadow: inset 0 0 0 2px #60c6f9;">10 </div>
								
							</div>
							<div class="media-body">
								<a href="?trocar=diamantes"><button type="submit" style="margin-top:3px;" class="btn btn-success"><span class="glyphicon glyphicon-retweet"></span></button></a>
							</div>
						</center>
						</div>
					 </div>
  
   <div class="list-group-item" style="text-decoration: none;">
						<div class="media"><center>
							<div class="media-left">
								
								 <div style="border-radius: 4px;
    padding: 5px 27px 5px 10px;
    background: #f1f1f1;
    display: inline-block;
	width:80px;
    margin-top:3px;
    border: 1px solid #000;
    background: #02abff no-repeat right 5px center url(Externos/img/diamond.png);
    color: #fff;
    box-shadow: inset 0 0 0 2px #60c6f9;">50 </div>
								
							</div>
							<div class="media-body">
								<a href="#"><button type="submit" style="margin-top:3px;" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span></button></a>
							</div>
						</center>
						</div>
					 </div>
  
   <div class="list-group-item" style="text-decoration: none;">
						<div class="media"><center>
							<div class="media-left">
								
								 <div style="border-radius: 4px;
    padding: 5px 27px 5px 10px;
    background: #f1f1f1;
    display: inline-block;
	width:80px;
    margin-top:3px;
    border: 1px solid #000;
    background: #02abff no-repeat right 5px center url(Externos/img/diamond.png);
    color: #fff;
    box-shadow: inset 0 0 0 2px #60c6f9;">100 </div>
								
							</div>
							<div class="media-body">
								<a href="#"><button type="submit" style="margin-top:3px;" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span></button></a>
							</div>
						</center></div>
					 </div>
  
  </div>
</div>
</div>

<div class="col-md-4" style="margin-top:10px;">
<div class="panel panel-warning class">
  <div style="background: #875989;" class="panel-heading"><center><img src="Externos/img/estrelas.png" /> &nbsp;ESTRELAS</center></div>
  <div class="panel-body">
  
 					 <div class="list-group-item" style="text-decoration: none;">
						<div class="media"><center>
							<div class="media-left">
								
								<div style="margin-top: 3px; border-radius: 4px;
    padding: 5px 27px 5px 10px;
    background: #875989;
    display: inline-block;
    border: 1px solid #000;
	width:80px;
   background: rgb(135, 89, 137) no-repeat right 5px center url(Externos/img/estrelas.png);
    color: #fff;
    box-shadow: inset 0 0 0 2px #bb78bf;">10 </div>
								
							</div>
							<div class="media-body">
								<a href="?trocar=estrelas"><button type="submit" style="margin-top:3px;" class="btn btn-success"><span class="glyphicon glyphicon-retweet"></span></button></a>
							</div>
						</center>
						</div>
					 </div>
					 
					  <div class="list-group-item" style="text-decoration: none;">
						<div class="media"><center>
							<div class="media-left">
								
								<div style="margin-top: 3px; border-radius: 4px;
    padding: 5px 27px 5px 10px;
    background: #875989;
    display: inline-block;
    border: 1px solid #000;
	width:80px;
   background: rgb(135, 89, 137) no-repeat right 5px center url(Externos/img/estrelas.png);
    color: #fff;
    box-shadow: inset 0 0 0 2px #bb78bf;">40 </div>
								
							</div>
							<div class="media-body">
								<a href="#"><button type="submit" style="margin-top:3px;" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span></button></a>
							</div>
						</center>
						</div>
					 </div>
  
  
   <div class="list-group-item" style="text-decoration: none;">
						<div class="media"><center>
							<div class="media-left">
								
								<div style="margin-top: 3px; border-radius: 4px;
    padding: 5px 27px 5px 10px;
    background: #875989;
    display: inline-block;
    border: 1px solid #000;
	width:80px;
   background: rgb(135, 89, 137) no-repeat right 5px center url(Externos/img/estrelas.png);
    color: #fff;
    box-shadow: inset 0 0 0 2px #bb78bf;">100 </div>
								
							</div>
							<div class="media-body">
								<a href="#"><button type="submit" style="margin-top:3px;" class="btn btn-success"><span class="glyphicon glyphicon-shopping-cart"></span></button></a>
							</div>
						</center>
						</div>
					 </div>
</div>
					 </div>
</div>
    
</div>
    
    
    
<div class="col-md-4">
    <div class="panel panel-primary">
      <div class="panel-heading" style="background-color: #d43e3c;
    border-color: #ac1e1c;"><span class="glyphicon glyphicon-tags"></span> &nbsp;SEUS REFERIDOS</div>
      <div class="panel-body">
					<img src="Externos/img/frank.png" style="float: left;">
	
					<p>
					Quando voc&ecirc; traz uma conta consider&aacute;vel (<b>25+</b>) de referencias. Voc&ecirc; pode trocar ela por moedas ou diamantes no jogo, Basta trocar ou comprar um dos nossos planos nesta loja, sorte a todos.</br></br>
					<center><b>Voc&ecirc; tem atualmente:

					<b style = "color: #FF0000;"><?php 

					if(!isset($_GET['n'])){
					$usuario = $_SESSION['username'];
					}
					else{
					$usuario = mysql_real_escape_string($_GET['n']);
					}
					
					
					$query = mysql_query("SELECT * FROM users WHERE username ='". $usuario ."'") or die(mysql_error()); 
        				$data = mysql_fetch_assoc($query); echo $data['referidos']; 
					?></b></b> Referidos</p>Seu Link de Referência é <textarea class="form-control" rows="3" placeholder="Seu url da referência..." disabled style="height: 35px; width: 300px; "><?php echo $hotel_url.'/refer.php?r='.$_SESSION['username']; ?></textarea><br>
<a href="referidos"><p><u>P&Aacute;GINA DE REFERIDOS</u></p></a></center>
</div>
  </div>
</div>
  </div>
</div>
</div>
</div>					
</div>
</div>
</section><!--/#bottom-->
<?php include_once("Pagina/Foorte.php"); ?>