<?php
header("Content-Type: text/html; charset=iso-8859-1",true); 
require_once('./data_classes/server-data.php_data_classes-core.php.php');
require_once('./data_classes/server-data.php_data_classes-session.php.php');
$maintenance2 = mysql_num_rows(mysql_query("SELECT * FROM cms_settings WHERE mantenimiento = '1'"));
$useradmin2 = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'");
$useradmin = mysql_fetch_array($useradmin2);
if($maintenance2 == '1' && $useradmin['rank'] < 5){
		header("Location: manutencao");
}
if($_POST['iduser'] != ""){
			$num1 = $_POST['iduser'];
header("location: $path/perfil?pesquisa=$num1");
		}
?>
<?php include_once("Pagina/HeadCMS.php"); ?>
<div class="container wow" data-wow-duration="1000ms" data-wow-delay="600ms">
<div class="container">
<div class="row">
<div class="col-md-8">
<div class="panel panel-danger">
<div class="panel-heading">
<h3 class="panel-title"><img src="Externos/img/vip-sml.png"> <b>O que é?</b>&nbsp; Plano, preços e beneficios de ser um VIP</h3>
</div>
<div class="panel-body">
<img align="right" src="https://images.habbo.com/c_images/article_images_hq/vip_discount_article.gif">
<h3 style="margin:0px">Beneficios de ser um <b>VIP</b>!</h3>
Sendo um membro VIP você receberá diversos diferenciais dos demais jogadores e será destacado em todas as ocasiões*, abaixo estão
listadas todas as vantagens atuais do plano.
<ul>
<li>Emblema VIP (Nível)</li>
<li>Loja de Raros VIPs</li>
<li>Emblema Semanal VIP</li>
<li>Comandos especiais:</li>
<ul>
<li>:faceless - Fique sem rosto</li>
<li>:bubble - Altere o estilo do seu balão de falas para outros customs (1 ao 40)</li>
<li>:copiar - Copiar o visual do usuário selecionado </li>
<li>:spull - Puxar o usuário para onde quiser</li>
<li>:spush - Empurrar o usuário para onde quiser</li>
<li>:ui - Ver informações do perfil do usuário selecionado</li>
<li>:criarvoto - Abre uma votação</li>
<li>:finalizar - Finaliza a votação</li>
<li>:flagme - Alterar seu nome (quando quiser, quantas vezes quiser)
<li>:megafone (enviar uma mensagem no chat de todos os quartos do jogo)</li></ul>
<li>Bloquear que os outros copiem seu visual&nbsp;&nbsp;</li>
<li>Loja de Emblemas Super VIP!</li><i>
<li>Adicionar até 6.000 amigos</li>
<li>Entrar em quartos lotados</li>
<li>Acesso a um quarto VIP exclusivo</li>
</i></ul><i>
<hr style="color:#b3b3b3">
<h3 style="margin:0px">Planos &amp; Preços</h3>
<ul>
<li>...</li>
<li>... <strong>(10% de desconto)</strong></li>
</ul>
<hr style="color:#b3b3b3">
<h3 style="margin:0px">Leia antes de comprar</h3>
Todas as compras realizadas não podem ser reembolsadas, ou seja, se você realizar uma compra não poderá voltar atrás depois que o plano for ativo.<br>Caso você seja menor de idade deverá pedir autorização para seus pais ou responsáveis legais para poder realizar a compra, independente da forma de pagamento, é importante que eles estejam cientes da compra.<br><br>Os meios de pagamento podem ser alterados de acordo com sua necessidade, basta entrar em contato com o <b>Gladius</b> e solicitar a forma desejada que não esteja disponível no site.
<hr style="color:#b3b3b3">
<h3 style="margin:0px">Após o pagamento</h3>
Após ser realizado o pagamento iremos verificar no sistema e ver se recebemos seu pagamento e confirmar suas informações diretamente com você.<br>O plano é ativo de forma manual, ou seja precisamos fazer a verificação manualmente e portanto só será ativo após essa verificação. Após concluir a compra, informe um staff para que possamos verificar e ativar seu plano, não se preocupe seu tempo de Super VIP só irá contar a partir da data que for ativo.<br><br><strong>AVISO:</strong> Boleto pode demorar até 48 horas úteis para ser identificado.
</i></div><i>
</i></div>
</div>
<div class="col-md-4">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">Torne-se um <strong>VIP!</strong></h3>
</div>
<div class="panel-body">
<center>
Breve...
</center>
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">ATENÇÃO:<strong></strong></h3>
</div>
<div class="panel-body">
<li><i>Após feito o pagamento, entre em contato com um staff para que possamos verificar e ativar seu plano!</i></li>
<i></i><li><i>Caso você seja menor de idade, compre apenas com autorização de seus pais ou responsáveis, não podemos realizar reembolsos após entregar o plano!</i>
</li>
</div>
</div>
</div>
</div>
</div>
</li>
</div>
</section><!--/#bottom-->
<?php include_once("Pagina/Foorte.php"); ?>