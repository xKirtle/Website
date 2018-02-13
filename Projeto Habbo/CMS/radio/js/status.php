<?php
// include "config.php";
// $dados = $pdo->query("SELECT * FROM aa_dados_radio")->fetch(PDO::FETCH_ASSOC);
// $host = $dados['ip'];
// $port = $dados['porta'];
@$host = 'stm10.pagehost.com.br';
@$port = '24328';
@$ch = curl_init();
@curl_setopt($ch, CURLOPT_URL, "http://".$host.":".$port."/index.html");
@curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla");
@curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
@curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
$data = @curl_exec($ch);
$locutor = @explode("<font class=default>Stream Title: </font></td><td><font class=default><b>", $data);
$locutor = @explode("</b></td></tr>", $locutor[1]);
$locutor = @strip_tags(addslashes(utf8_encode($locutor[0])));
if($locutor == ''){
	$locutor = 'Rádio Offline';
}
$programa = @explode("<font class=default>Stream Genre: </font></td><td><font class=default>", $data);
$programa = @explode("<b>", $programa[1]);
$programa = @explode("</b></td></tr>", $programa[1]);
$programa = @strip_tags(addslashes(utf8_encode($programa[0])));
if($programa == ''){
	$programa = 'Rádio Offline';
}
$musica = @explode("<font class=default>Current Song: </font></td><td><font class=default><b>", $data);
$musica = @explode("</b></td></tr>", $musica[1]);
$musica = @strip_tags(addslashes(utf8_encode($musica[0])));
if($musica == ''){
	$musica = 'Rádio Offline';
}
$unicos = @explode("<b>Stream is up at ", $data);
$unicos = @explode("(", $unicos[1]);
$unicos = @explode(" unique)", $unicos[1]);
$unicos = $unicos[0];
if($unicos < 10){
	$unicos = "0".$unicos;
}
if($locutor == 'Rádio Offline'){
	$avatar = 'AutoXD';
}else{
	$avatar = trim($locutor);
}
if($locutor == 'Rádio Offline'){
	$quarto = 'Rádio Offline';
	$quarto_id = 'Null';
}else{
	// Antônio deverá fazer o quarto pois precisa se conectar à sql.
	$quarto = 'Aquele Cafezinho';
	$quarto_id = '3';
}
@curl_close($ch);

if(isset($_GET['get']) && $_GET['get'] == 'data'){
	$data = array(
	'avatar' => $avatar,
	'locutor' => $locutor,
	'musica' => $musica,
	'unicos' => $unicos,
	'quarto' => $quarto,
	'quarto_id' => $quarto_id,
	);
	echo json_encode($data);
}
?>