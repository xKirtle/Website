<meta http-equiv="refresh" content="50">
<script type="text/javascript" src="http://www.radiohunter.com.br/master/fontscritps/jquery.js"></script>
<script>
$(document).ready(function(){TocandoAgora();});

function TocandoAgora()
{
	pagina="atual.php";	
	
	if (window.ActiveXObject){		
		var request = new XMLHttpRequest();
		request.open("GET",pagina, false);
		request.send(null);
		if(!request.getResponseHeader("Date")){
			var cached = request;
			request = new XMLHttpRequest();
			var ifModifiedSince =
			cached.getResponseHeader("Last-Modified") ||
			new Date(0); // January 1, 1970
			request.open("GET",pagina, false);
			request.setRequestHeader("If-Modified-Since", ifModifiedSince);
			request.send("");
			if(request.status == 304) {
				request = cached;
			}
		}
		$('#tocando_agora').html(request.responseText);
	}
	else
	{
		$.get('atual.php', function(resultado){
			$('#tocando_agora').html(resultado);
		});
	}
	setTimeout('TocandoAgora()', 80000);
}
</script>

<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	
}
-->
</style><body>
<table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="366">
<!-- fwtable fwsrc="Untitled" fwpage="Page 1" fwbase="index.jpg" fwstyle="Dreamweaver" fwdocid = "347585763" fwnested="0" -->
  <tr>
   <td><img src="file:///C|/wamp/www/Site admin/player/nowplaying/spacer.gif" width="366" height="1" border="0" alt="" /></td>
  </tr>

  <tr>
  </tr>
  <tr>
  <td background="file:///C|/wamp/www/Site admin/player/nowplaying/nowplaying.jpg"><div id="play" style="background-image:nowplaying/nowplaying.jpg; width:400px; height:23px; overflow:hidden;,style2">
        	<marquee direction="left" id="tocando_agora" style="font: 13px/21px 'BPdotsUnicaseRegular', Arial, sans-serif; font-weight: bold; color: #CCFF00;"  onMouseOver="stop();" onMouseOut="start();">
            Radio Off-line            </marquee>
        </div></td>
  </tr>
</table>