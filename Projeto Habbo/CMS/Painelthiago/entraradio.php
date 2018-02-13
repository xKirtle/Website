<?php
if (isset($_POST["kick"])) {
	$_ex = $conn->query("SELECT * FROM $mdl_tabela LIMIT 1");
	$ex = $_ex->fetch();

	$scpass = $ex['radio_senha_kike'];
	$scfp = fsockopen($ex['radio_ip'], $ex['radio_porta'], $errno, $errstr, 30);

	if($scfp) {
		fputs($scfp,"GET /admin.cgi?pass=e6282cebcfdb&mode=&mode=kicksrc HTTP/1.0\r\nUser-Agent: SHOUTcast Song Status (Mozilla Compatible)\r\n\r\n");

		while(!feof($scfp)) {
			$page .= fgets($scfp, 1000);
		}

		fclose($scfp);
	}
?>
<div class="box-content">
	<div class="title-section"> HEHE </div>

	O locutor foi kickado com sucesso. O AutoDJ entrará na rádio em alguns segundos.<br><br>
	Entre na rádio!
</div>
<form method="post">
<input style="width: 130px;
float: right;
margin-right: 14px; margin-top: 10px;" name="kick" type="submit" class="btn btn-success" value="Kikar Dj">
</form>
<?php  } ?>

<div class="box-content">
	<div class="title-section">eee</div>
	<a href="?p=&a=1"><button class="btn btn-primary">Iniciar locução (kickar locutor)</button></a>
	<br><br>

	Para iniciar sua locução, você deve kickar/expulsar o locutor atual (ou o AutoDJ) clicando no botão abaixo.<br><br>
	<b>IP:</b> <br>
	<b>Porta:</b> <br>
	<b>Senha:</b> <br>
	<b>Tipo de transmissão:</b> <br><br>

	Você deve colocar seu nome e o nome de sua programação.
</div>