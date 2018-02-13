 <title>HabbzHotel! - Client </title>

    <meta name="description" content="Client HabbzHotel - O Melhor!" />
    <meta name="author" content="Thiago Araujo" />

<!-- CREDITOS DO CRIADOR THIAGO ARAUJO -->
<!-- LOCAL DA RADIO -->

<iframe src="./client2.php" height="100%" frameborder="" scrolling="no" style="position: relative;top: 0;right: 0;z-index: 2;" width="100%"></iframe>
<body style="margin: 0;">
	<body id="client" class="flashclient">
<link rel="shortcut icon" href="favicon.ico" />
    <meta name="description" content="Client HabbzHotel - O Melhor!" />
    <meta name="author" content="Thiago Araujo" />

<!-- CREDITOS DO CRIADOR THIAGO ARAUJO -->
<!-- LOCAL DA RADIO -->

<div id="area_player" style="top: 0;position: fixed;z-index: 2;">
<!-- PRINCIPAL -->
    <div id="player" class="draggable ui-widget-content ui-draggable" style="left: 380.313px; position: relative; top: 0px;">
        <!-- PLAYER MIN -->
      <div class="player_min">
        <div class="guy"></div>
        <div class="txt">R&aacute;dio</div>
        <div class="handle ui-draggable-handle"></div>
        <div class="open o-c tip" title=""></div>
    </div>
    <!-- FIM PLAYER MIN -->
    <!-- PLAYER  -->
    <div class="player">
<!--       <div class="chair tip" title="">
      </div> -->
      <div class="btn" style="margin-left: 30px;">
      <p id="demo">

        <audio id="audio" src="http://stm10.pagehost.com.br:24328/index.html?sid=1" autoplay="" class="play"></audio>
      </p>
      <button id="controlbt" class="pause" onclick="Player.toggleP()"></button>
      </div>
 
      <div class="separa"></div>
<div id="programa" class="info room"><span id="programa">...</span></div>
<div id="locutor" title="" class="info loc"><span id="locutor">...</span></div>
<div id="muusica" class="info music"><span id="musica">...</span></div>
<div id="ouvintes" class="info listeners"><span id="ouvintes">...</span></div>
      <div class="close o-c tip" title=""></div>
      <div class="handle ui-draggable-handle"></div>
	  <button id="pedidos-btn" href="#" onclick="window.open('/pedidos.php', 'Pagina', 'STATUS=NO, TOOLBAR=NO, LOCATION=NO, DIRECTORIES=NO, RESISABLE=NO, SCROLLBARS=YES, TOP=10, LEFT=10, WIDTH=770, HEIGHT=400');" type="button"></button>
	  <button id="reload-btn" type="button" onclick="refresh()"></button>
      <div id="twitter-btn" onclick="window.open('https://twitter.com/')"></div>
      <div id="facebook-btn" onclick="window.open('http://facebook.com/')"></div>
      <button id="presenca-btn" type="button"></button>
      
      <div id="volume">
        <p id="volumeHidden" hidden="">100</p>
        <div id="barra" class="ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header ui-slider-range-min" style="width: 100%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span></div>
      </div>
    </div>
    <!-- FIM PLAYER -->
    <!-- PEDIDOS -->
    <div id="player-pedidos" class="minimize-pedidos">
      <div class="player-pedidos" style="text-align: center;">
        <form style="margin-top:5px;" id="pedidos-form" method="POST">
          <br>
          <br>
          <button type="button" id="pedidos-voltar" class="hlive-button"><b>Voltar</b></button>
        </form>
      </div>
    </div>
    <!-- FIM PEDIDOS -->
    <!-- PRESENÇA -->
    <div id="player-presenca" class="minimize-presenca">
      <div class="player-presenca" style="text-align: center;">
        <form style="margin-top:5px;" id="presenca-form" method="POST">
          <span style="color:#fff;font-size:12px;">Nick:</span>
          <br>
          <input type="text" id="nick-presenca" style="width:80%;border-radius: 5px;" placeholder="Ex: Happy." required="">
          <br>
          <span style="color:#fff;font-size:12px;">Código:</span>
          <br>
          <input type="number" id="codigo" style="width:80%;border-radius: 5px;" placeholder="O locutor irá dizer na rádio!" required="">
          <br>
          <br>
          <button type="button" id="presenca-voltar" class="hlive-button"><b>Voltar</b></button>
          <button type="submit" id="presenca-submit" class="hlive-button-green"><b>Enviar</b></button>
        </form>  
      </div>
    </div>
    <!-- FIM PRESENÇA -->
    <!-- ALERT -->
    <div id="player-alert" class="minimize-alert">
      <div class="player-alert" id="alertContent" style="text-align: center;">
        <b>Enviado</b>          
      </div>
    </div>
    <!-- FIM ALERT -->
  </div>
  </div>


<link rel="stylesheet" type="text/css" href="/player/css/reset.css">
<link rel="stylesheet" type="text/css" href="/player/css/style.css?3">
<link rel="stylesheet" type="text/css" href="/player/css/tipped.css">
<link rel="stylesheet" type="text/css" href="/player/css/main.css">

<script src="/player/js/socket.io-1.4.5.js"></script>
<script src="/player/js/jquery-1.12.4.js"></script>
<script src="/player/js/jquery-ui.js"></script>
<script src="/player/js/tipped.js"></script>
<script src="/player/js/main.js"></script>


<!-- Aqui é onde fica a altulização do status -->
<script>
function refresh(){
	$.ajax({
		url: "",
		type: "GET",
		dataType: "json",
		data:{
			"atualizar": "sim"
		},
		beforeSend:function(){
			$("#locutor").html("...");
			$("#programa").html("...");
			$("#musica").html("...");
			$("#ouvintes").html("...");
		},
		success:function(html){
			$("#locutor").html(html.locutor);
			$("#programa").html(html.programa);
			$("#musica").html(data.musica_atual);
			$("#ouvintes").html(html.ouvintes);
		}
	});
}
setInterval(function(){
	refresh();
}, 30000);
</script>

</div>
 
</div>

<body style="margin: 0;">
	<body id="client" class="flashclient">
	

</head>
</html>