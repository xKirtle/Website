<?php 
// FORMATA A DATA PARA ano x, mes x, etc ... (NÃO ALTERE ISSO POIS FOI FEITO PARA EVITAR BURLAGENS E FOI UNICO JEITO QUE FUNCIONOU!!!!!!!!)
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Brasilia');
function time_elapsed_B($secs){
    $bit = array(
        '  semana'        => $secs / 604800 % 52,
        '  dia'        => $secs / 86400 % 7,
        '  hora'        => $secs / 3600 % 24,
        '  minuto'    => $secs / 60 % 60,
        );
        
    foreach($bit as $k => $v){
        if($v > 1)$ret[] = $v . $k . "'s";
        if($v == 1)$ret[] = $v . $k;
        }
		if($secs / 60 % 60){
    $ret[] = 'atr&aacute;s.';	
		}else{
    $ret[] = 'Agora.';	
		}
    
    return join(' ', $ret);
    }
	?>
<!-- CSS DA CMS -->
<link rel="stylesheet" href="/Externos/css/me/index.css" type="text/css"/>
<link href="/Externos/css/bootstrap.css" rel="stylesheet" type="text/css" /> 
<link href="/Externos/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
<link href="/Externos/css/me/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="/Externos/css/me/bootstrap.theme.min.css" rel="stylesheet" type="text/css"/>
<link href="/Externos/css/me/bootstrap-notifications.min.css" rel="stylesheet" type="text/css"/>
<link href="/Externos/css/me/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<!-- JS DA CMS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/script"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js" type="text/script"></script>
</head>
<body>
        <style type="text/css">
            body { 
                padding:0; 
                margin:0px;
                background: url(/Externos/img/bg-site.png);
            }

            .container {
                max-width: 1024px;
            }

            .titleNews {
                margin-top:10px;
                margin-left:10px;
                color: #fff;
                text-shadow: 0px 0px 5px rgba(0, 0, 0, 0.75);
            }

            .panel {
                margin-top:0px;
                margin-bottom:15px;
            }


            .onlineUsersNumber {
                font-size:22px;
                font-weight:bold;
                color:#474747;
                font-family:sans-serif;

                -webkit-animation: change-color 4s linear 0s infinite normal ;
                animation: change-color 4s linear 0s infinite normal ;
            }


            @-webkit-keyframes change-color {
                0%{
                    color:#474747;
                }
                52%{
                    color:#d6d6d6;
                }
                100%{
                    color:#474747;
                }
            }

            @keyframes change-color {
                0%{
                    color:#474747;
                }
                52%{
                    color:#d6d6d6;
                }
                100%{
                    color:#474747;
                }
            }

            .panel {
                margin:3px;
                margin-bottom:10px;
                border-left:0px;
                border-right:0px;
            }

            .my-column {
                padding: 0px;
            }
            .my-column:first-child {
                padding-left:0px;
            }
            .my-column:last-child {
                padding-right:0px;
            }

	</style>
	<style>
@-webkit-keyframes header_color {
  0% { background-color: #a94c4c; }
  12% { background-color: #a97e4c; }
  24% { background-color: #a9a84c; }
  36% { background-color: #69a94c; }
  48% { background-color: #4ca978; }
  60% { background-color: #4ca2a9; }
  72% { background-color: #4c5ea9; }
  84% { background-color: #764ca9; }
  96% { background-color: #a94c93; }
  100% { background-color: #a94c4c; }
}
@keyframes  header_color {
  0% { background-color: #a94c4c; }
  12% { background-color: #a97e4c; }
  24% { background-color: #a9a84c; }
  36% { background-color: #69a94c; }
  48% { background-color: #4ca978; }
  60% { background-color: #4ca2a9; }
  72% { background-color: #4c5ea9; }
  84% { background-color: #764ca9; }
  96% { background-color: #a94c93; }
  100% { background-color: #a94c4c; }
}

/* Ocultar botón radio */
input[id^="spoiler"] {
display: none;
}
/* Estilo botón clicable */
input[id^="spoiler"] + label {
display: block;
width: 200px;
margin: 0 auto;
padding: 5px 20px;
background: #e1a;
cursor: pointer;
}
/* Estilo botón cuando su INPUT está seleccionado */
input[id^="spoiler"]:checked + label {
color: #333;
background: #ccc;
}
/* Estilo caja SPOILER (inicialmente oculto) */
input[id^="spoiler"] ~ .spoiler {
width: 90%;
height: 0;
overflow: hidden;
opacity: 0;
margin: 10px auto 0; 
}
/* Estilo caja SPOILER cuando su INPUT está seleccionado */
input[id^="spoiler"]:checked + label + .spoiler {
height: auto;
opacity: 1;
}
</style>


    <section id="bottom">
<style>
a{
color: #000;
font-weight: bold /* negrito no texto */
-webkit-transition: 0.5s ease-in;
-moz-transition: 0.5s ease-in;
-o-transition: 0.5s ease-in;
transition: 0.5s ease-in;
}

a:hover {
color: #000;
font-weight: bold /* negrito no texto */
transition-duration: 0.5s;
transition-timing-function: ease-in;
transition-property: all;
}
span:hover {
color: #505050;
font-weight: bold /* negrito no texto */
transition-duration: 0.5s;
transition-timing-function: ease-in;
transition-property: all;
}
</style>	
<div id="landing">
<div class="top_sectionthiago" style="background:url(/themes/images/fondo.png) repeat-x fixed bottom;animation: header_color 25s infinite; 
-webkit-animation: header_color 25s infinite;" >
<div class="background_leftthiago" 
"></div>
<div class="background_top">
<div id="contain">
<img style="margin-top:10px; left:5%; position: relative;" src="Externos/img/logo.gif" alt="logo"/>
<div class="logo_placeholderthiago">
<div class=""></div></div>
<span class="online_status" style="position:relative; z-index:60;left:-8.2%;">
<span class="online_status_icon"></span>
<span class="glyphicon glyphicon-user"></span> <span id='Online'><?php echo $UsersOnline; ?></span> Usu&aacute;rios Conectados</span>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>   
<div style="position:fixed; right:20px; top:20px; width:80px;">
<div id="resultado"></div>
<div id="bot_mod"><a href="/client" title="Entra no hotel">Entra</div></a>
<script type="text/javascript">
    $('.dropdown-menu').click(function (e) {
        e.stopPropagation();
    });
</script><br>
<li class="dropdown">
<div id="bot_mod" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Configuraçães">Conf</div>
<ul class="dropdown-menu" style="margin-left:-80%; margin-top:35%;">
<li><a href="/settings">Configurações</a></li>
<li role="separator" class="divider"></li>
<li><a href="#">...</a></li>
<li><a href="#">...</a></li>
</ul>
</li>
<div id="bot_mod"><a href="/perfil?pesquisa=<?php echo $_SESSION['username']; ?>" title="Seu perfil">Perfil</div></a>
<?php 
if($useradmin['rank'] > 4){?>
<div id="bot_mod"><a href="<?php echo $hkthiago; ?>" title="Hk do hotel">HK</div></a>
<?php }?>
<div id="bot_mod"><a href="logout" title="Sair do hotel :(">Sair</div></a>
</div>
</div></div></div>
<nav class="navbar navbar-default navbar-static-top">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav">
<li><a href="/me"><span class="glyphicon glyphicon-home"></span> &nbsp;Página Inicial</a></li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-plus"></span> &nbsp;Comunidade<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="/noticias?id="><i class="fa fa-newspaper-o" aria-hidden="true"></i> &nbsp;Notícias</a></li>
<li><a href="/hall"><span class="glyphicon glyphicon-star"></span> &nbsp;Hall da Fama</a></li>
<li><a href="/staff"><span class="glyphicon glyphicon-briefcase"></span> &nbsp;Equipe</a></li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-gamepad"></span> &nbsp;Interatividade<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="/jogo"><i class="fa fa-flag" aria-hidden="true"></i> &nbsp;Jogo de Carros</a></li>
<li><a href="/ranking"><span class="fa fa-info-circle"></span> &nbsp;Ranking do Jogo</a></li>
<li><a href="/referidos"><span class="fa fa-trophy"></span> &nbsp;Sobre os Referidos</a></li>
</ul>
</li>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="fa fa-shopping-basket"></span> &nbsp;Loja Habbz<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="/loja"><i class="fa fa-shopping-basket" aria-hidden="true"></i> &nbsp;Loja em geral</a></li>
<li><a href="/diamantes"><i class="fa fa-diamond" aria-hidden="true"></i> &nbsp;Loja de Diamantes</a></li>
<li><a href="/boias"><span class="fa fa-life-ring"></span> &nbsp;Loja de Boias</a></li>
<li><a href="/moedas"><span class="fa fa-circle"></span> &nbsp;Loja de Moedas</a></li>
<li><a href="/prancha"><span class="fa fa-circle"></span> &nbsp;Loja de Prancha</a></li>
</ul>
</li>
<li><a href="/client" target="habbinc_client"><b><span class="glyphicon glyphicon-log-in"></span> &nbsp;Entrar no Hotel</b></a></li>
</ul>
<ul class="nav navbar-nav navbar-right">
		<?php 
		$notificacaoSQL=mysql_query("SELECT * FROM notificacao WHERE recebedor = '" . $useradmin['id'] . "'");
		$notificacao = mysql_fetch_array($notificacaoSQL);
		?>
        <li><a href="#" id="notificationsNew" data-toggle="collapse" data-target="#notificationsPop"  ><?php $numnotificacao = mysql_num_rows(mysql_query("SELECT * FROM notificacao WHERE recebedor = '" . $useradmin['id'] . "' AND visto='nao'")); ?> <?php echo $numnotificacao; ?> Notifica&ccedil;&otilde;es</a></li>				

		<div class="popover fade" id="notificationsPop" style="width:275px; top: 98%; left: 75%;">
		    
    </a>

		<h3 class="popover-title"style="width:272px;"><?php echo $numnotificacao; ?> Notifica&ccedil;&otilde;es</h3>
		<div class="popover-content" style="position:relative; height:272px;width:272px;z-index:1; overflow: scroll">
		<div>
		<?php 
		if ($numnotificacao == 0) {
		?>
		Nenhuma notifica&ccedil;&atilde;o...
		<?php }else{ 
		$fSQL=mysql_query("SELECT * FROM notificacao WHERE recebedor = '" . $useradmin['id'] . "' ORDER BY id DESC");
		while($f = mysql_fetch_array($fSQL)){
			
			$query = mysql_query("SELECT * FROM users WHERE id ='". $f['criador'] ."'") or die(mysql_error()); 
		        				$data = mysql_fetch_assoc($query);
			
		?>
		<a class="list-group-item" href="<?php echo $f['url']; ?>" style="text-decoration: none;">
		<div class="media">
		<div class="media-left" style="padding-right: 0px; display: table-cell; vertical-align: top;">
		<div style="background-image: url(http://habbo.com.br/habbo-imaging/avatarimage?figure=<?php echo $data['look']; ?>&amp;size=s&amp;direction=2&amp;head_direction=2&amp;gesture=sml); width:30px; height:35px;">
		</div>
		</div>
		<div class="media-body" style="display: table-cell;
		    vertical-align: top;
			width: 10000px;
			
			overflow: hidden;
		    zoom: 1;">
		<b><h6><?php echo $data['username']; ?>: <?php echo $f['texto']; ?></h6></b>
		<h6><?php echo time_elapsed_B(time()-$f['data']); ?></h6>
		</div>
		</div>
		</a>
	  <?php }} ?>
	  	  </div>
	  </div><a href="" id="notificationsNew" data-toggle="collapse" onClick="history.go(0)" data-target="#notificationsPop"><center>ATUALIZAR</center></a>
	  <a href=""  data-toggle="collapse" data-target="#notificationsPop" style="color:red"><center>FECHAR</center></a>

</div>
<div class="dropdown-footer text-center">
</div>
</li>
</nav>