<?php
ob_start();
	require_once '../global.php';
	$TplClass->SetParam('title', 'Administraci&oacute;n');
	$TplClass->SetParam('zone', 'Bienvenido');
	$Functions->LoggedHk("true");
	
	$users = $db->query("SELECT * FROM users WHERE username = '{$_SESSION['username']}' AND password = '{$_SESSION['password']}'");
	$user = $users->fetch_array();
	$id = $Functions->FilterText($_GET['id']);
	
	$a = $db->query("SELECT * FROM users WHERE rank >= 3");
	$cntranks = $a->num_rows;
	
	$TplClass->SetAll();
	if( $_SESSION['ERROR_RETURN'] ){
		$TplClass->SetParam('error', '<div id="generic"><div id="error">'.$_SESSION['ERROR_RETURN'].'</div></div>');
		unset($_SESSION['ERROR_RETURN']);
	}
	if( $_SESSION['GOOD_RETURN'] ){
		$TplClass->SetParam('error', '<div id="generic"><div id="error" style="background: #88B600;border: 1px solid #88B600;">'.$_SESSION['GOOD_RETURN'].'</div></div>');
		unset($_SESSION['GOOD_RETURN']);
	}
	
	$b = mysql_query("SELECT * FROM server_status");
	$cntbans = mysql_num_rows($b);
	
	$result = $db->query("SELECT * FROM cms_settings WHERE id = 1 LIMIT 1");
	while($data = $result->fetch_array()){
		$SHORTNAME = $data['hotelname'];
		$FACE = $data['facebook'];
		$LOGO = $data['logo'];
	}

define("show_plugin_menu", true);
require("inc/top.php");
ob_end_flush(); 
?>
<div class="row">
<section id="bottom" style="margin-top:-40px;">
<div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
<div class="row">
<div class="col-md-12">
<div class="home-content" style="background: url(http://habboo-a.akamaihd.net/c_images/backgrounds2/bg_Easter_5.gif);">
<div class="home-avatar-bg img-circle">
<img class="home-avatar-fundo" alt="Yoshino" src="https://www.avatar-retro.com/habbo-imaging/avatarimage.php?figure=<?php echo $useradmin['look']; ?>&action=wav&direction=3&head_direction=3&img_format=png&gesture=sml&headonly=0&size=l">
</div>
<div class="home-reaction">
</div>
</div>
</br>
</div>
<div class="col-lg-3 col-sm-6 col-xs-12">
<div class="main-box infographic-box">
<i class="fa fa-file red-bg"></i>
<span class="headline">Usuários Regis</span>
<span class="value"><?php echo $Functions->GetCount('users'); ?></span>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-xs-12">
<div class="main-box infographic-box">
<i class="fa fa-folder red-bg"></i>
<span class="headline">Usuários Onlines</span>
<span class="value"><?php echo $Functions->GetOns(); ?></span>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-xs-12">
<div class="main-box infographic-box">
<i class="fa fa-picture-o yellow-bg"></i>
<span class="headline">Usuários Banidos</span>
<span class="value"><?php echo $Functions->GetCount('bans'); ?></span>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-xs-12">
<div class="main-box infographic-box">
<i class="fa fa-plug emerald-bg"></i>
<span class="headline">Usuários Cargo</span>
<span class="value"><?php echo $cntranks; ?></span>
</div>
</div>
</div>
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<h2> Estatisticas </h2>
<p style="padding-bottom:1px;"> Clique no botão abaixo para atualizar as estatísticas do sistema. <br> <b>Última atualização:</b> <?php echo $cntbans; ?> </span> </p>
<form action="/Painelthiago/dashboard.php" method="POST">
<input type="submit" name="scan" class="btn btn-success" value="Atualizar" style="outline:none;">
</form>
</header>
</div>
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<h2> Habbz o melhor dos melhores </h2>
<p style="padding-bottom:1px;"> Informações do Habbz Painel:</span> </p>
<pre><code><div style="overflow-y:auto; max-height:200px;">Esse painel contem todas as funções de um painel inovador, alem de possuir uma alta facilidade de ser usado. Esse painel contem muitos recursos para ajuda em um hotel, Licencia do Painel: CoreDev by: Thiago Araujo pelo criador do painel habbz.</div></code></pre>
</header>
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
</div>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>