<?php
// Todos os direitos resevados ao Thiago Araujo by: AsunaCMS
require_once('./data_classes/server-data.php_data_classes-core.php.php'); 

$userrecomendacaoSQL1 = mysql_query("SELECT * FROM cms_comment WHERE type = 'recomendacao' AND ativo='1'");
$userrecomendacao1 = mysql_fetch_array($userrecomendacaoSQL1);
$userrecomendacaoSQL = mysql_query("SELECT * FROM users WHERE id = '" . $userrecomendacao1['nome'] . "'");
$userrecomendacao = mysql_fetch_array($userrecomendacaoSQL);
?>
<?php echo " ".$UsersOnline; ?>