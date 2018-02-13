// CREDITOS: THIAGO ARAUJO(HABBZHOTEL)

 function updateMusic(start){
	if(start == 'true'){
		$("#locutor").html("Carregando...");
		$("#programa").html("Carregando...");
		$("#musica").html("Carregando...");
		$("#ouvintes").html("00");
	}
    $.getJSON('http://radio.hostbh.com.br/api-json/T0RBME9BPT0rRA==', function(data) {
      //data = $.parseJSON(data);
      $("#locutor").html(data.titulo);
      $("#programa").html(data.status);
	  $("#musica").html(data.musica_atual);
      $("#ouvintes").html(data.ouvintes_conectados);

  });
  }

updateMusic(false);
setInterval(function(){
	updateMusic(false);
}, 10000);

  $("#reload-btn").click(function(){
	updateMusic('true');
  });
  $("#player").draggable({axis:"x",containment:"#area_player",scroll:false,handle:".handle"});
 
  $(".o-c").click(function(){
    $("#player").toggleClass("minimize");
  });


  // PLAYER CONTROLER
    var Player = {
      toggleP:function(){
        $("#controlbt").toggleClass("play").toggleClass("pause");
        if ($('#audio').hasClass('play') === true){
          $("#demo").html();
          $("#demo").html('<audio id="audio" src="http://stm50.hostbh.com.br:8048/;stream.mp3" ></audio>');
          var currentVolume = ($('#volumeHidden').html())/100;
          $("#audio").prop("volume", currentVolume).trigger('pause');

        }else{
            $("#audio").trigger("play");
            $("#audio").addClass('play');
        }
      }

    }
  // FIM PLAYER CONTROLER

  //ALERT CONTROLER

    var Alert = {
      show: function(time, html, minimeizeDiv, minimeizeClass){
          $("#alertContent").html(html);
          $("#player-alert").removeClass('minimize-alert');
          setTimeout(function(){ 
            $("#alertContent").html("");
            $("#player-alert").addClass('minimize-alert');
            $(minimeizeDiv).addClass(minimeizeClass);
            $(".player").fadeIn('fast');
        }, time);
        
      }
    }

  //FIM ALERT CONTROLLER
  $(function(){
    // PEDIDOS
    $("#pedidos-btn").click(function() {
      $("#player-pedidos").removeClass('minimize-pedidos');
      $("#pedido-submit").prop("disabled",false).html("Enviar");
      $("#Pedido").val("");
      $(".player").fadeOut('fast');
    });
    $("#pedidos-form").submit(function() {
      $("#pedido-submit").prop("disabled",true).html("Carregando...");
      $.ajax({
        type: 'post',
        url: 'php/all.php?func=pedir',
        data: {
          'usuario': $("#nick-pedido").val(),
          'pedido':$("#pedido").val(),
          'locutor': $("#locutor").html()
        },
        success: function(data){
          if(data == 1){
            Alert.show("3000","<b>Aguarde 5 min para o proximo pedido</b>","#player-pedidos","minimize-pedidos");
          }else if(data == 2){
            Alert.show("3000","<b>Pedido enviado com sucesso!</b>","#player-pedidos","minimize-pedidos");
          }else{
            Alert.show("3000","<b>Erro Interno</b>","#player-pedidos","minimize-pedidos");
          }
        }
      });
      return false;
    });
    $("#pedidos-voltar").click(function(){
      $("#player-pedidos").toggleClass("minimize-pedidos");
      $(".player").fadeIn('fast');
    });

  // FIM PEDIDOS
  // PRESENCA
  $("#presenca-btn").click(function() {
    $("#player-presenca").removeClass('minimize-presenca');
    $("#presenca-submit").prop("disabled",false).html("Enviar");
    $("#codigo").val("");
    $(".player").fadeOut('fast');
  });


  $("#presenca-form").submit(function() {
    $("#presenca-submit").prop("disabled",true).html("Carregando...");
    $.ajax({
      type: 'post',
      url: 'php/all.php?func=presenca',
      data: {
        'usuario': $("#nick-presenca").val(),
        'codigo':$('#codigo').val()
        },
        success: function(data){
          if(data == 1){
            Alert.show("3000","<b>VocÃƒÂª jÃƒÂ¡ marcou presenÃƒÂ§a!</b>","#player-presenca","minimize-presenca");
          }else if(data == 2){
            Alert.show("5000","<b>PresenÃƒÂ§a Marcada com sucesso!</b>","#player-presenca","minimize-presenca");
          }else if(data == 3){
            Alert.show("3000","<b>Este cÃƒÂ³digo jÃƒÂ¡ expirou!</b>","#player-presenca","minimize-presenca");
          }else{
            Alert.show("3000","<b>Erro Interno</b>","#player-presenca","minimize-presenca");
          }
        }
      });
      return false;
    });
  $("#presenca-voltar").click(function(){
    $("#player-presenca").toggleClass("minimize-presenca");
    $(".player").fadeIn('fast');
  });
// FIM PRESENÃƒâ€¡A
//VOLUME
 $("#volume > #barra").slider({
  min: 0,
  max: 100,
  value: 100,
  range: "min",
  animate: true,
  slide: function(event, ui) {
     var currentVolume = (ui.value)/100;
     $("#volumeHidden").html(ui.value);
     $("#audio").prop("volume", currentVolume);
  }
 });

//FIM VOLUME


});