<!DOCTYPE HTML>
<html>
<head>
 <title>HabbzHotel ~ Corrida</title>
 <link rel="shortcut icon" href="./_images/favicon.ico" type="image/vnd.microsoft.icon" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 <script type="text/javascript">
  var import_php = {
   spieler_aussehen: '' 
  };
 </script>
 <script src="Externos/js/minegame/gamethiago.js"></script>
 <link href="http://fonts.googleapis.com/css?family=Ubuntu:400,700" rel="stylesheet" type="text/css">
 <link href="Externos/css/minegame/gamethiago.css" rel="stylesheet" type="text/css">
</head>
<body>
 <div id="spiel">
  <canvas id="main_canvas" width="350" height="500">Ops, seu pc não pode roda o jogo!</canvas>
  <div id="hauptmenu">
   <button id="spielen">Jogar</button>
  </div> 
  <div id="spielmenu">
   <div id="volume"></div>
   <div id="status">
    <div id="herz_box" class="box"><div class="icon"></div><div class="icon"></div><div class="icon"></div></div>
    <div id="taler_box" class="box"><span id="anzahl">0</span> <div id="icon"></div></div>
	<div id="zeit_box" class="box"><span id="zeit">0</span> <div id="icon"></div></div>
   </div>
   <img id="pfeiltasten" src="./_images/setas.png" width="150" height="100">
  </div> 
  <div id="gameovermenu">
   <center>
    <div id="header">
     <p id="überschrift">FIM DE JOGO</p>
    </div>	
    <div id="score">Sua Pontua&ccedil;&atilde;o: <span id="score_anzahl"></span></div>   
	<button id="teilen"><img src="./_images/fb_icon.png" align="left" /> Facebook</button>
    <button id="replay"><img src="./_images/replay.png" align="left"> Reiniciar</button>
    <button id="zurück">Voltar ao Menu</button>
    <div id="bild_untenlinks"></div>
    <div id="bild_untenrechts"></div>
    <div id="bot_signatur">www.Habbz.biz</div>
   </center>
  </div>
 </div>
</body>
</html>