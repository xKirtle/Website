<?php
    
require_once('./data_classes/server-data.php_data_classes-core.php.php');
require_once('./data_classes/server-data.php_data_classes-session.php.php');

mysql_query("UPDATE users SET rank_vip = '1', ip_last = '".$remote_ip."' WHERE id = '".$my_id."'") or die(mysql_error());

mysql_query("INSERT INTO user_tickets (userid, sessionticket, ipaddress) VALUES ('".$my_id."', '".GenerateTicket()."', '" . $ip . "')");

$ticketsql = mysql_query("SELECT * FROM users WHERE id = '".$my_id."'") or die(mysql_error());
$ticketrow = mysql_fetch_assoc($ticketsql);

$ticketsqls = mysql_query("SELECT * FROM user_tickets WHERE userid = '".$my_id."'") or die(mysql_error());
$ticketrows = mysql_fetch_assoc($ticketsqls);

$cmssettings = mysql_query("SELECT * FROM cms_settings") or die(mysql_error());
$cmsconfig = mysql_fetch_assoc($cmssettings);
?>
<html>
<head>	
<script type="text/javascript">
var andSoItBegins = (new Date()).getTime();
</script>

<link rel="stylesheet" href="<?php echo $path; ?>/web-gallery/v2/styles/style.css" type="text/css" />
<link href="css/flash.css" rel="stylesheet" type="text/css"/>

<link rel="stylesheet" href="<?php echo $path; ?>/web-gallery/v2/styles/habboflashclient.css" type="text/css" />
<script src="<?php echo $path; ?>/web-gallery/static/js/habboflashclient.js" type="text/javascript"></script>
<script type="text/javascript">
var ad_keywords = "petschke,diwox,gender%3Am,age%3A17";
var ad_key_value = "kvage=17;kvgender=m;kvtags=diwox:petschke";
</script>
<script type="text/javascript">
document.habboLoggedIn = true;
var habboName = "<?php echo $name; ?>";
var habboId = <?php echo $my_id; ?>;
var facebookUser = false;
var habboReqPath = "";
var habboStaticFilePath = "<?php echo $path; ?>/web-gallery";
var habboImagerUrl = "<?php echo $path; ?>/habbo-imaging/";
var habboPartner = "";
var habboDefaultClientPopupUrl = "<?php echo $path; ?>/client";
window.name = "3981c0260af76a9eb267d9b2dd7cc602d4c7b7bf";
if (typeof HabboClient != "undefined") { HabboClient.windowName = "3981c0260af76a9eb267d9b2dd7cc602d4c7b7bf"; }
</script>
	<title><?php echo $Hotelname; ?>! - Client </title>
<link rel="shortcut icon" href="favicon.ico" />
    <meta name="description" content="Feito por Thiago Araujo é Storm" />
    <meta name="author" content="By Thiago Araujo é Storm" />

<script type="text/javascript">
var BaseUrl = "<?php echo $cmsconfig['flash_client_url']; ?>";
var flashvars =
{ 
"client.allow.cross.domain" : "1",
"client.notify.cross.domain" : "0",
"connection.info.host" : "<?php echo $cmsconfig['host']; ?>",
"connection.info.port" : "<?php echo $cmsconfig['port']; ?>",
"site.url" : "<?php echo $hotel_url; ?>/",
"url.prefix" : "<?php echo $hotel_url; ?>/",
"swf.prefix" : "<?php echo $hotel_url; ?>/swf/",
"client.reload.url" : "<?php echo $hotel_url; ?>/index",
"client.fatal.error.url" : "<?php echo $hotel_url; ?>/index",
"logout.url" : "<?php echo $hotel_url; ?>/index",
"logout.disconnect.url" : "<?php echo $hotel_url; ?>/index",
"client.connection.failed.url" : "<?php echo $hotel_url; ?>/index",
"external.variables.txt" : "<?php echo $cmsconfig['external_variables']; ?>",
"external.texts.txt" : "<?php echo $cmsconfig['external_texts']; ?>",
"external.override.variables.txt" : "<?php echo $hotel_url; ?>/swf/gamedata/override/external_override_variables.txt",
"productdata.load.url" : "<?php echo $cmsconfig['productdata']; ?>",
"furnidata.load.url" : "<?php echo $cmsconfig['furnidata']; ?>",
"external.figurepartlist.txt" : "<?php echo $hotel_url; ?>/swf/gamedata/figuredata.xml",
"use.sso.ticket" : "1",
"sso.ticket" : "<?php echo $ticketrows['sessionticket']; ?>",
"processlog.enabled" : "1",
"has.identity" : "1", 
"external.override.variables.txt" : "<?php echo $hotel_url; ?>/swf/gamedata/override/external_override_variables.txt",

"external.override.texts.txt" : "<?php echo $hotel_url; ?>/swf/gamedata/override/external_flash_override_texts.txt",

"client.starting" : "O <?php echo $Hotelname; ?> Hotel está carregando!",
"client.starting.revolving" : "Quando voce menos esperar...terminaremos de carregar.../Carregando mensagem divertida! Por favor espere./Voce quer batatas fritas para acompanhar?/Siga o pato amarelo./O tempo e apenas uma ilusao./Ja chegamos?!/Eu gosto da sua camiseta./Olhe para um lado. Olhe para o outro. Pisque duas vezes. Pronto!/Nao e voce, sou eu./Shhh! Estou tentando pensar aqui./Carregando o universo de pixels.",
"flash.client.url" : BaseUrl ,
"flash.client.origin" : "popup"
};
var params =
{
"base" : BaseUrl + "",
"allowScriptAccess" : "always",
"menu" : "false"
};

var clientUrl = "<?php echo $cmsconfig['habbo_swf']; ?>";
    swfobject.embedSWF(clientUrl, "flash-container", "100%", "100%", "10.0.0", "<?php echo $hotel_url; ?>/conf/web-gallery/flash/expressInstall.swf", flashvars, params);
</script>
<script>
flashvars = "nulled";
(function() {
var abc = document.getElementsByTagName("script"), index;
for (index = abc.length - 1; index >= 0; index--) {
    abc[index].parentNode.removeChild(abc[index]);
}
setTimeout(
    function() {
      document.getElementsByName("flashvars")[0].setAttribute("value", "hidden");
    }, 800);
})();
</script>

</head>
<body id="client" class="flashclient"style="width: 100%; height:100.7%; margin-top:-20px;margin-left:0px;overflow: hidden;"></br>
                        <script language="JavaScript">
            function toggleFullScreen() {
                if ((document.fullScreenElement && document.fullScreenElement !== null) ||    
                 (!document.mozFullScreen && !document.webkitIsFullScreen)) {
                  if (document.documentElement.requestFullScreen) {  
                    document.documentElement.requestFullScreen();  
                  } else if (document.documentElement.mozRequestFullScreen) {  
                    document.documentElement.mozRequestFullScreen();  
                  } else if (document.documentElement.webkitRequestFullScreen) {  
                    document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
                  }  
                } else {  
                  if (document.cancelFullScreen) {  
                    document.cancelFullScreen();  
                  } else if (document.mozCancelFullScreen) {  
                    document.mozCancelFullScreen();  
                  } else if (document.webkitCancelFullScreen) {  
                    document.webkitCancelFullScreen();  
                  }  
                }  
            } 
        </script>
<div id="overlay"></div>
<img src="/conf/web-gallery/v2/images/page_loader.gif" style="position:absolute; margin: -1500px;" />
<div id="overlay"></div>
<div id="client-ui" >
    <div id="flash-wrapper">
    <div id="flash-container">
        <div id="content" style="width: 400px; margin: 20px auto 0 auto; display: none">
<div class="cbb clearfix">
</div>
</div>
<div id="client-error" style="position: fixed; top: 50%; left: 50%; z-index: 9995; color: rgb(255, 255, 255); transform: translate(-50%, -50%); font-family: tahoma; font-size: 17px; display:block;">
				<h1>PARA JOGAR O <font style="color: #0099cc; font-weight: BOLD;">HABBZ HOTEL</font> VOCÊ PRECISA AUTORIZAR O <font style="color: #990033">FLASH</font></h1>
                <p>
                    Recentemente os navegadores estão atualizando e eliminando o flash de suas prioridades, então agora para executar o jogo normalmente você precisa liberar o flash, <a href="http://www.adobe.com/go/getflashplayer" style="color: white; " >Clicando aqui</a> ou clique no icone representado 
                </p>
                <table style="width: 200px; position: relative; margin: auto;">
                    <tr>
                        <td>
                            <a  href="http://www.adobe.com/go/getflashplayer" target='_blank' class="btn_att_flash"></a>
                        </td>
                        <td>
                            <img src="http://i.imgur.com/1oippaC.png">
                        </td>
                    </tr>
                </table>
                <h2>Não Funcionou?</h2>
                <p>Veja o tutorial clicando no link abaixo</p>
				<p>-</p>
                <a style="
					display: block;
					text-align: center;
					color: #339900;
					font-size: 14px;
					margin-top: -20px;
					font-family: calibri;
					text-decoration: none;
					" target="_blank" href="#">
                    Tutorial - Liberar Flash
                </a>
				<p>-</p>
				<p style="margin-top:-20px;">Depois de seguir o tutorial, volte para a pagina do jogo e clique em jogar, tenha um bom jogo!</p>
                
            </div>
        </div>
    </div>

</div>
<div id="fb-root"></div>
</head>
<body id="client" class="flashclient"style="width: 100%; height:100.7%; margin-top:-20px;margin-left:0px;overflow: hidden;"></br>
<div id="overlay"></div>
<img src="<?php echo $path; ?>/conf/web-gallery/v2/images/page_loader.gif" style="position:absolute; margin: -1500px;" />
<div id="overlay"></div>
<div id="client-ui" >
    <div id="flash-wrapper">
    <div id="flash-container">
        <div id="content" style="width: 400px; margin: 20px auto 0 auto; display: none">
<div class="cbb clearfix">
    <h2 class="title">Por favor, atualiza o adobe flash player para ultima versГЈo</h2>

    <div class="box-content">
            <p>Clique Aqui: <a href="http://get.adobe.com/flashplayer/">Instale Flash player</a>. Mais instruções para sua instalação aqui­: <a href="http://www.adobe.com/products/flashplayer/productinfo/instructions/">Mais informações</a></p>
            <p><a href="http://www.adobe.com/go/getflashplayer"><img src="<?php echo $path; ?>/conf/web-gallery/v2/images/client/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
    </div>
</div>

        </div>


        <noscript>
            <div style="width: 400px; margin: 20px auto 0 auto; text-align: center">
                <p>If you are not automatically redirected, please <a href="/client">click here</a></p>
            </div>
        </noscript>
    </div>

</div>
<div id="fb-root"></div>

<noscript>
  <meta http-equiv="refresh" content="0;url=/me#noScript">
</noscript>

</body retrue>
</html>