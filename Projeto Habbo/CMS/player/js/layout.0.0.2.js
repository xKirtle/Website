		$(function(){
			Tipped.create('#expand', 'Expandir',{ size: 'x-small', position: 'left' });
			Tipped.create('#move-min', 'Mover para qualquer lugar',{ size: 'x-small', position: 'left' });
			Tipped.create('#locutor', 'Clique para seguir o locutor',{ size: 'x-small', position: 'left' });
		});
    	$("#play-pause, #play-pause-min").click(function(){
    		if ($("#play-pause, #play-pause-min").hasClass('play')) {
    			$("#play-pause, #play-pause-min").removeClass('play').removeClass('pause').addClass('pause');
    		} else {
    			$("#play-pause, #play-pause-min").removeClass('pause').removeClass('play').addClass('play');
    		}
    	});
    	$( "#player" ).draggable({axis:"y", scroll: false, containment: "#flash-container", handle: "div#move"});
    	$( "#player-min" ).draggable({handle: "div#move-box", scroll: false, containment: "#flash-container"});
    	
    	$("#close").click( function(){
    		$("#player").fadeOut(250,function(){
    			$("#player-min").fadeIn(250);
    		})
    	});
    	$("#expand").click( function(){
    		$("#player-min").fadeOut(250,function(){
    			$("#player").fadeIn(250);
    		});
    	});

    	$("#presenca-btn").click(function(){
            $("input[name='codigo']").val("");
            $(".submit-btn").prop("disabled", false);
    		$("#principal").fadeOut(250, function(){
    			$("#pedidos").hide();
    			$("#formularios, #pesenca").fadeIn(250);
    		});
    	});

    	$("#pedido-btn").click(function(){
            $("input[name='pedido']").val("");
            $(".submit-btn").prop("disabled", false);
    		$("#principal").fadeOut(250, function(){
    			$("#pesenca").hide();
    			$("#formularios, #pedidos").fadeIn(250);
    		});
    	});

    	$(".back-btn").click(function(){
            $(".submit-btn").prop("disabled", false);
    		$("#formularios").fadeOut(250, function(){
    			$("#pesenca, #pedidos").hide();
    			$("#principal").fadeIn(250);
    		});
    	});
    	
    	$("#locutor").click(function(){
        	var locutor = $("#locutor span").html();
	        $.ajax({
	            url: "http://radio.habblive.com/getRoom.php?user="+locutor,
	            method: "GET",
	            success: function(data){
	                window.MainApp.postMessage({call: "open-room", target: ""+data });
	            }
	        });
    	});
