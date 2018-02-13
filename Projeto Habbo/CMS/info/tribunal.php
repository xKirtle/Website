<?php
header("Content-Type: text/html; charset=iso-8859-1",true); 
require_once('../data_classes/server-data.php_data_classes-core.php.php');
$maintenance2 = mysql_num_rows(mysql_query("SELECT * FROM cms_settings WHERE mantenimiento = '1'"));
$useradmin2 = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'");
$useradmin = mysql_fetch_array($useradmin2);
if($maintenance2 == '1' && $useradmin['rank'] < 5){
		header("Location: manutencao");
}


?>
<?php
ob_start();
	require_once '../global.php';
	$TplClass->SetParam('title', 'Baneos');
	$TplClass->SetParam('zone', 'Banear');
	
	$users = $db->query("SELECT * FROM users WHERE username = '{$_SESSION['username']}' AND password = '{$_SESSION['password']}'");
	$user = $users->fetch_array();
	$action = $Functions->FilterText($_GET['action']);
	$id = $Functions->FilterText($_GET['id']);

define("show_plugin_menu", true);
ob_end_flush(); 
?>
<html lang="pt">

 <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Habbz ~ Lista de Banimentos do Habbz Hotel </title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon">
	<link href="../Externos/css/info/style.css" rel="stylesheet" type="text/css">
	<link href="../Externos/css/info/help.css" rel="stylesheet" type="text/css">
	<link href="http://bootswatch.com/lumen/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300normal,300italic,400normal,400italic,600normal,600italic,700normal,700italic,800normal,800italic&amp;subset=all" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css">
	<link href="//fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet" type="text/css">
	<link href="//fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet" type="text/css">
	
</head>

<body>
  <header class="header">
  <div class="header-inner">
    <div class="logo">
      <a title="P&aacute;gina inicial" href="#">
        <img src="../Externos/img/logo.png" alt="Logotipo">
      </a>
    </div>
    <nav class="user-nav">
      
        <a class="login" data-auth-action="signin" role="button" href="http://habbz.biz">Entrar</a>

    </nav>
  </div>
</header>


  <main role="main">
    <nav class="sub-nav"></nav>
<article class="main-column">

  <header class="article-header">
    <h1>Lista de Banimentos do Habbz Hotel</h1>
    <div class="article-info">
    
      <div class="article-avatar">
        <img src="../swf/c_images/album1584/ADM.gif" alt="Avatar"/>
      </div>
      <div class="article-meta">
        <strong class="article-author" title="Equipe Staff">Habbz Staff <span class="glyphicon glyphicon-ok-circle" style="color:#0eafe2" title="Oficial"></span></strong>
        <div class="article-updated meta">
		<time data-datetime="calendar">02 de Maio de 2017 22:30</time></div>
      </div>   
    </div>
  </header>

<p>  Ao desrespeitar a Etiqueta Habbz, ou infligir os padr&otilde;es da Comunidade, a conta do indiv&iacute;duo &eacute; Banida do Hotel, o tempo de Banimento ser&aacute; decidido por um Staff. Abaixo voce poder&aacute; conferir todas as contas Banidas no Habbz Hotel:<br></p>

  <div class="content-body article-body" style="margin-left: -3%;">
<div class="panel-body">
  
 <?php global $db;	
$get_bans = $db->query("SELECT * FROM bans ORDER BY id DESC LIMIT 5");
if($get_bans->num_rows > 0){
	while($row = $get_bans->fetch_array()){
if($row['bantype'] == 'user'){
	$userdata = $db->query("SELECT * FROM users WHERE username = '".$row['value']."'");
	$users = $userdata->fetch_array();
	$ip_last = $users['ip_last'];
	$ip = 'No';
}else{
	$ip_last = $row['value'];
	$ip = 'S&iacute;';
}
$minuten = $row['expire'] - time();
if(time() >= $row['expire']){
	$stat = "Expirado";
	$color="green";
}elseif(time() + 3600 >= $row['expire']){
	if(date('i', $minuten) > 0){
		$stat = "(Le restan ".date('i', $minuten)." minutos)";
		$color="red";
	}else{
		$stat = "(Le restan ".date('s', $minuten)." segundos)";
		$color="red";
	} 
}else{
	$stat = "Activo";
	$color="red";
} ?> 
	 	 				<a class="list-group-item" style="text-decoration: none;background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7)), url('../rocketinc/imagens/fundos/duck_back.gif') center center;background-color: wheat;">
						<div class="media">
							<div class="media-left" style="padding-right: 0px; display: table-cell; vertical-align: top;">
								<div style="
background-image: url(https://www.habbo.com.br/habbo-imaging/avatarimage?figure=hr-3163-45.ch-255-81.lg-280-79.hd-180-7.sh-290-62.ha-1015-66.ea-1406-62&action=std&direction=2&head_direction=3&gesture=sad&size=l);-webkit-filter: drop-shadow(0 1px 0 rgba(255, 255, 255, 0.9)) drop-shadow(0 -1px 0 rgba(255, 255, 255, 0.9)) drop-shadow(1px 0 0 rgba(255, 255, 255, 0.9)) drop-shadow(-1px 0 0 rgba(255, 255, 255, 0.9));height: 82px;width: 100px;background-position: -20px 30%;
">
								</div>
							</div>
							<div class="media-body" style="display: table-cell;vertical-align: top;width: 10000px;border-bottom: 2px solid rgba(0, 0, 0, 0.15);border-left: 2px solid rgba(0, 0, 0, 0.04);/* border-right: 2px solid rgba(0, 0, 0, 0.04); *//* border-top: 2px solid rgba(0, 0, 0, 0.02); */background: rgba(0, 0, 0, 0.6);border-radius: 5px;padding: 5px 15px;/* float: left; *//* font-size: 14px; *//* font-weight: bold; */text-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);overflow: hidden;color: white;zoom: 1;">
								Nome: <b><?php echo $row['value']; ?></b> </br>
								Motivo: <b><?php echo $row['reason']; ?></b>
								</br><p style="line-height: 100%"><span>Banido at&eacute;: <b><?php setlocale(LC_TIME,"spanish"); echo utf8_encode(strftime("%A %d de %B de %Y", $row['expire'])); ?></span></b> &nbsp;&nbsp;&nbsp; Por: <b><?php echo $row['added_by']; ?></b></p>
							</div>
						</div>
					</a>
<?php } }else{ echo "<center><b style='color:red;'>Não há usuários banidos</b></center>"; }?>

  
<strong>Esta p&aacute;gina ser&aacute; atualizada a medida que novos banimentos forem efetuados.</strong><p></p>
  </div>

  <div class="article-attachments">
    <ul class="attachments">
      
    </ul>
  </div>



  


</article>




 <aside class="article-sidebar side-column">
  
  
  <section class="related-articles">
    <h3>Leia Tamb&eacute;m</h3>
    <ul>

        <li>
          <a href="/info/etiqueta.php">Habbz Etiqueta</a>
        </li>

        <li>
          <a href="/info/privacidade.php">Pol&iacute;tica de Privacidade</a>
        </li>
      
	<li>
          <a href="/info/banimentos.php">Regras de Banimentos</a>
        </li>
      
        <li>
          <a href="/info/tribunal.php">Tribunal de Banimentos</a>
        </li>

        <li>
          <a href="/info/termos.php">Termos e Condi&ccedil;&otilde;es de Uso</a>
        </li>
      
        <li>
          <a href="/info/trabalhe.php">Trabalhe Conosco</a>
        </li>
      



      
    </ul>
  </section>

  

</aside>
  </main>

<footer class="footer">
 <div class="footer-inner">
   <p>
	&copy; Habbz Hotel 2017 ~ Powered by <b>CoreDev</b><br>
	Habbz n&atilde;o &eacute; afiliado ou parte da Sulake Corporation. Todos direitos reservados aos respectivos autores.  
  </p>
 </div>
</footer>


</body>
