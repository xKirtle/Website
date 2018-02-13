<?php 
require_once('./data_classes/server-data.php_data_classes-core.php.php');
require_once('./data_classes/server-data.php_data_classes-session.php.php');
$locutor1 = mysql_query("SELECT * FROM users WHERE locutor='1' AND locutor_online = '1' LIMIT 1");
$locutor = mysql_fetch_array($locutor1);
header("Content-Type: text/html; charset=iso-8859-1",true); 

?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>BotHotel » Client!</title>
<!-- CREDITOS DO CRIADOR -->
<link rel="shortcut icon" href="./favicon.ico" />
<meta name="description" content="Client Habbow - Feito por Thiago Araujo / Joao Lopes" />
<meta name="author" content="By Thiago Araujo & Joao Lopes" />
<!-- SUA CLIENT AQUI EM BAIXO -->
   <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css" />
	<script src="../js/asunacms.js"></script>
<iframe id="thiagoaraujo" src="2.php"></iframe>
</head>
<body>
<div id="thiago">
<div id="container">
<div id="logo" style="margin-right:23%; margin-top:5px;">
<img src="Files/images/XbUnWBB.png" style="margin-right:25%;margin-top:135%;" alt=""/>
<div id="carregar">
<div class="cs-loader">
<div class="cs-loader-inner" style="margin-right:65%;">
<label>	&#9679;</label>
<label>	&#9679;</label>
<label>	&#9679;</label>
<label>	&#9679;</label>
<label>	&#9679;</label>
<label>	&#9679;</label>
</div>
<center> 	<!-- SISTEMA DE ANUNCIO -->
<script src="http://code.jquery.com/jquery-latest.js"></script>
<div class="ads" style="
background-image:url('');opacity:0.50; filter:alpha(opacity=5);position:relative;padding-top:19px;margin-left:55%;height:51%;width:50%;
background-repeat: none;z-index: 398000;position: absolute;top:140px;left:-30%;overflow: hidden;">
<div id="ads" style=";
padding:5px;height:1000px;width:800px;z-index:70000;position: absolute;top:-45px; right:-65px;overflow: hidden;display: block;">
<div id="" href="#" style="color: black;"><strong style="z-index: 9999;position: absolute;top: 15px;right: 60px;border-radius: 1px;padding: 2px 4px;font-size: 16px;color:transparent;background-color: transparent;"></strong></div><br><center>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<ins class="adsbygoogle" style="display:inline-block;width:336px;height:280px" data-ad-client="ca-pub-2834242103434980" data-ad-slot="4792669758"></ins>
<script src="../js/adsthiago.js"></script>
</center>       
</div>
</div>
<!-- DIRETORIOS -->
<link href="Files/client/css/thiago.css" rel="stylesheet" type="text/css"/>
<script src="Files/client/js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="Files/client/js/jquery.cycle.all.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- SCRIPT DO TEMPO DA TELA DE CARREGAMENTO -->
<script type="text/javascript">
$(document).ready(function () {
setTimeout(function () {
$('#thiago').fadeOut(1500);
}, 30000);
});
</script>   
</div> 
</div>
<div id="text" style="margin-right:25%;">
<p>O BotHotel Hotel est&aacute; carregando!</p>
</div>
</div>  
		        <link href="css/my.css" rel="stylesheet" type="text/css"/>
	<span class="onlineusers" style="z-index: 99; margin-left:42%; position:absolute; margin-top:-100px;"><strong id="onlines"></strong> BOTs Jogando! <i class="glyphicon glyphicon-fullscreen" style="color:silver;"> </i></span>                      
</body>
</html>