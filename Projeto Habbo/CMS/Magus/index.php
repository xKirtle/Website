
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="css/style.css?11" rel="stylesheet" type="text/css">
<style>body a:link{color:#FFF;text-decoration:none;}a:hover{text-decoration:none;color:#FFF;}a:visited,a:active{text-decoration:none;color:#FFF;}</style>
<title>Player </title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script>
<script type="text/javascript">
 function atualiza_dados(id, caminho){
$("#"+id).html("...");
$("#"+id).fadeOut(1000);
$("#"+id).load("status/status.php?ver="+caminho);
$("#"+id).fadeIn(2000);}
</script>
</head>
<div id="base-player">
<div id="avatar-imagem"></div>
<div id="locutor"><h6>Locutor: </h6></div><div id="noar"><h4><a href="#" onClick="atualiza_dados('djver','dj')"><span id="djver">AutoDj</span></a><h4></div>
<div id="musica"><h7>Anuncio </h7></div><div id="tocando"><h5><marquee direction="left" scrolldelay="190"><a href="#" onClick="atualiza_dados('musicaver','musica')"><span id="musicaver">Acesse: www.playjogos.net e Jogue outros jogos :D HabboBr o Melhor servidor Habbo Pirata</span></marquee></a></h5></div>
<div id="ouvir"><a href="index.php"><img src="img/play.png"/></a></div>
<div id="parar"><a href="stop.php"><img src="img/stop.png"/></a></div>
<div id="programacao"><h3>Nome da Pro: </div></h3><div id="nomedaprogramacao"><h2><a href="#" onClick="atualiza_dados('programaver','programa')"><span id="programaver">Mix HabboBr</span></a><h2></div>
<div id="vote"></div><div id="bom"></div><div id="ruim"></div>
<div id="ouvintes"></div><div id="contador"><h1><a href="#" onClick="atualiza_dados('ouvintesver','ouvintes')"><span id="ouvintesver">21</span></a></h1></div>
<div id="pedidos"><a href="/pedidos.html" target="_blank"><h8>Pedidos</h8></a></div>
</div>
</html>
<script type=text/javascript src=http://webradio.hospedandosites.com.br/playersonic/player.js></script>
<script type=text/javascript>
new WHMSonic({
path     : 'http://webradio.hospedandosites.com.br/playersonic/WHMSonic.swf',
source   : 'http://198.143.132.154:11526',
volume   : 100,
autoplay : true,
width    : 1,
height   : 1,
twitter  : '',
facebook : '',
logo     : '',
});
</script>