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