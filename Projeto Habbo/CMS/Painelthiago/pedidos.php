<?php
ob_start();
	require_once '../global.php';
	$TplClass->SetParam('title', 'Logs de la CMS');
	$TplClass->SetParam('zone', 'Logs de la CMS');
	$Functions->LoggedHk("true");
	
	$users = $db->query("SELECT * FROM users WHERE username = '{$_SESSION['username']}' AND password = '{$_SESSION['password']}'");
	$user = $users->fetch_array();

	$TplClass->SetAll();
	if( $_SESSION['ERROR_RETURN'] ){
		$TplClass->SetParam('error', '<div id="generic"><div id="error">'.$_SESSION['ERROR_RETURN'].'</div></div>');
		unset($_SESSION['ERROR_RETURN']);
	}
	if( $_SESSION['GOOD_RETURN'] ){
		$TplClass->SetParam('error', '<div id="generic"><div id="error" style="background: #88B600;border: 1px solid #88B600;">'.$_SESSION['GOOD_RETURN'].'</div></div>');
		unset($_SESSION['GOOD_RETURN']);
	}
	$result = $db->query("SELECT * FROM cms_settings WHERE id = 1 LIMIT 1");
	while($data = $result->fetch_array()){
		$SHORTNAME = $data['hotelname'];
		$FACE = $data['facebook'];
		$LOGO = $data['logo'];
	}
require("inc/top.php");
ob_end_flush(); 
?>
	<html>
		<body>
			<div class="row">
				<div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
					<div class="panel border-1 border-grey-500">
						<div class="panel-title bg-grey-500">
							<div class="panel-head color-white"><i class="fa fa-tasks"></i> Pedidos da Rádio </div>
						</div>
						<div style="padding:3px;" class="panel-body">
							<div class="slimScrollDiv" style="position: relative; overflow: auto; width: auto; height:430px;">
								<table border="1" style="width:100%">
								  <tr>
									<th style="width:15%;"><center>Usuário é Rank</center></th>
									<th style="width:25%;"><center>Ação</center></th> 
									<th style="width:43.75%;"><center>Detalhes</center></th>
									<th style="width:16.25%;"><center>Enviado</center></th>
								  </tr>
									<?php global $db;
										$busc = $db->query("SELECT * FROM radio_pedidos ORDER by id DESC");
										if($busc->num_rows > 0){
											while($info = $busc->fetch_array()){ ?>
												<tr>
													<td style="padding:5px;"><center><?php echo $info['username']; ?> / <b><?php echo $info['rank']; ?></b></center></td>
													<td style="padding:5px;"><center><?php echo $info['action']; ?></center></td> 
													<td style="padding:5px;"><?php echo $info['message']; ?></td>
													<td><center>Enviado em <?php echo $info['timestamp']; ?></center></td>
												</tr>
									<?php } }else{ echo '<center><b style="color:red;">Ops, o painel Habbz não acho nem um pedidos!</b></center>'; } ?>
								</table>
							</div>
						</div>
					</div>
					</div>
				</div>
				</div>
<footer id="footer-bar" class="row">
<p id="footer-copyright" class="col-xs-12">
&copy; Painel Habbz By: Thiago Araujo
</p>
</footer>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>