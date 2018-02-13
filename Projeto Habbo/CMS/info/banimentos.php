<?php
header("Content-Type: text/html; charset=iso-8859-1",true); 
require_once('../data_classes/server-data.php_data_classes-core.php.php');
$maintenance2 = mysql_num_rows(mysql_query("SELECT * FROM cms_settings WHERE mantenimiento = '1'"));
$useradmin2 = mysql_query("SELECT * FROM users WHERE username = '" . $_SESSION['username'] . "'");
$useradmin = mysql_fetch_array($useradmin2);
if($maintenance2 == '1' && $useradmin['rank'] < 5){
		header("Location: manutencao");
}


?>

<html lang="pt">

 <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Habbz ~ Motivos para os bloqueios e banimentos das contas </title>
	<link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon">
	<link href="../Externos/css/info/style.css" rel="stylesheet" type="text/css">
	<link href="../Externos/css/info/help.css" rel="stylesheet" type="text/css">
	<link href="http://bootswatch.com/lumen/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300normal,300italic,400normal,400italic,600normal,600italic,700normal,700italic,800normal,800italic&amp;subset=all" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css">
	<link href="//fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet" type="text/css">
	<link href="//fonts.googleapis.com/css?family=Ubuntu+Condensed" rel="stylesheet" type="text/css">
	
</head>

<body>
  <header class="header">
  <div class="header-inner">
    <div class="logo">
      <a title="P&aacute;gina inicial" href="#">
        <img src="../Externos/img/logo.png" alt="Logotipo">
      </a>
    </div>
    <nav class="user-nav">
      
        <a class="login" data-auth-action="signin" role="button" href="http://habbz.biz">Entrar</a>

    </nav>
  </div>
</header>


  <main role="main">
    <nav class="sub-nav"></nav>
<article class="main-column">

  <header class="article-header">
    <h1>Motivos para os bloqueios e banimentos das contas</h1>
    <div class="article-info">
    
      <div class="article-avatar">
        <img src="../swf/c_images/album1584/ADM.gif" alt="Avatar"/>
      </div>
      <div class="article-meta">
        <strong class="article-author" title="Equipe Staff">Habbz Staff <span class="glyphicon glyphicon-ok-circle" style="color:#0eafe2" title="Oficial"></span></strong>
        <div class="article-updated meta">
		<time data-datetime="calendar">02 de Maio de 2017 22:30</time></div>
      </div>   
    </div>
  </header>

<div class="content-body article-body">
    <p>No Habbz Hotel, utilizamos uma s&eacute;rie de crit&eacute;rios para enviar alertas, bloquear trocas e banir os usu&aacute;rios que n&atilde;o agem de acordo com a Habbz Etiqueta.</p>
<p>Aqui, listamos as diferentes raz&otilde;es pelas quais um personagem pode receber puni&ccedil;&otilde;es no Hotel.</p>
<p>Dependendo da gravidade do caso, os usu&aacute;rios envolvidos na viola&ccedil;&atilde;o da Habbz Etiqueta podem ser proibidos de falar por alguns instantes, ter seu acesso bloqueado por alguns dias, ter suas trocas inabilitadas ou, em casos mais graves, podem ser banidos permanentemente do Hotel.</p>
<p><em>Lembre-se que a modera&ccedil;&atilde;o n&atilde;o pode ajudar com chamados sobre bloqueio de passagem ou de quarto. Se isso acontecer, por favor, saia do quarto em que isso est&aacute; ocorrendo e volte um pouco mais tarde. Ou voc&ecirc; pode pedir ao dono do quarto para expulsar o usu&aacute;rio que estiver atrapalhando.</em></p>
<p><strong>Fiquei mudo, e agora?</strong></p>
<p>Quando um personagem &eacute; silenciado pelos Guardi&otilde;es, Embaixadores, Modera&ccedil;&atilde;o ou Staffs &eacute; porque ele estava descumprindo a Habbz Etiqueta, falando coisas inadequadas para o bom funcionamento ou para a boa conviv&ecird;ncia no Hotel. O silenciamento &eacute; uma puni&ccedil;&atilde;o leve e n&atilde;o permanente.</p>
<p><strong>Bans por Transtorno ou Script:</strong></p>
<p>S&atilde;o utilizados para os personagens que est&atilde;o perturbando ou atrapalhando intencionalmente o jogo. Isso inclui aproveitar-se de falhas no sistema em benef&iacute;cio pr&oacute;prio (mover mobis para fora dos quartos, andar no &quot;espa&ccedil;o&quot;), enviar mensagens abusivas a outros usu&aacute;rios, comercializar servi&ccedil;os ou produtos de maneira n&atilde;o autorizada, desconectar usu&aacute;rios do Hotel propositalmente, for&ccedil;ar trocas com usu&aacute;rios sem a permiss&atilde;o deles, tumultuar o ambiente, atrapalhar eventos ou atividades coletivas, envolver-se em qualquer m&eacute;todo de <em>scripting,</em> etc.</p>
<p><strong>Bans por comportamento sexualmente expl&iacute;cito</strong>:</p>
<p>Esta categoria &eacute; utilizada para personagens que praticam cybersexo ou cyberprostitui&ccedil;&atilde;o, oferecem favores sexuais em troca de algum benef&iacute;cio no jogo, se envolvem em conversas com conte&uacute;do de sexo expl&iacute;cito, enviam pedidos de contato sexual via webcam ou links de sites pornogr&aacute;ficos.</p>
<p><strong>Bans por ass&eacute;dio</strong>:</p>
<p>Essa categoria &eacute; utilizada para usu&aacute;rios que,&nbsp;de maneira insistente, amea&ccedil;am, intimidam, perseguem ou ofendem a usu&aacute;rios dentro do Hotel atrav&eacute;s de conversas ou a&ccedil;&otilde;es nos quartos, mensagens de bate papo ou posts nos f&oacute;runs. Os usu&aacute;rios podem ser banidos por praticar, difundir ou reproduzir xingamentos e ofensas; por assediar outros Habbzs; por difundir mensagens desrespeitosas sobre outro Habbz; por adotar comportamentos racistas, sexistas ou homof&oacute;bicos contra outros Habbzs; por utlizar palavras de baixo cal&atilde;o contra outros Habbzs; por criar quartos ofensivos contra outro Habbz ou grupo de Habbz's, etc.</p>
<p>N&oacute;s definimos ass&eacute;dio, persegui&ccedil;&atilde;o e intimida&ccedil;&atilde;o como termo utilizado para descrever atos de viol&ecirc;ncia f&iacute;sica ou psicol&oacute;gica, intencionais e repetidos, praticados por uma pessoa ou grupo de pessoas causando dor e ang&uacute;stia, sentimento de exclus&atilde;o e agress&atilde;o e que sejam executadas dentro de uma rela&ccedil;&atilde;o desigual de poder.</p>
<p><strong>Bans por nome impr&oacute;prio:</strong></p>
<p>S&atilde;o bloqueios a contas Habbz, salas ou grupos cujos nomes s&atilde;o inadequados e que est&atilde;o contra a Habbz Etiqueta. Consideramos impr&otilde;prios nomes que cont&eacute;m palavr&otilde;es ou termos sexuais ou ofensivos, que promovem drogas, viol&ecirc;ncia e qualquer outra atividade que viole os termos e condi&ccedil;&otilde;es do site.</p>
<p><strong>Bans por golpe ou fraude:</strong></p>
<p>Essas categorias s&atilde;o utilizadas para bloquear o acesso a usu&atilde;rios que ofere&ccedil;am ou divulguem oferta de cr&eacute;ditos gr&aacute;tis em troca de e-mail, Facebook ou qualquer outra informa&ccedil;&atilde;o pessoal; promovam sites retro ou 'sites fraudulentos"; organizem jogos para trapea&ccedil;ar outros usu&atilde;rios; tentem obter a senha de outro Habbz; etc.</p>
<p>Nesta categoria tamb&eacute;m se incluem tentativas de compra ou venda de contas do Habbz Hotel, compra/venda e ofertas de cr&eacute;ditos ou mobis por dinheiro real (atrav&eacute;s do Mercado Livre, Facebook, etc) ou qualquer transa&ccedil;&atilde;o ilegal referente &agrave;s contas de usu&aacute;rios do Habbz Hotel.</p>
<p>Lembre-se que bloqueios permanentes ao Hotel ser&atilde;o utilizados sempre e quando um usu&aacute;rio comprar Habbz Moedas sem permiss&atilde;o ou autoriza&ccedil;&atilde;o do dono do cart&atilde;o/celular/conta ou quando o pagamento for rejeitado/cancelado/questionado pelas nossas empresas parceira, respons&aacute;veis pela gest&atilde;o dos pagamentos.</p>
<p><strong>Bans por viola&ccedil;&atilde;o dos termos do site:</strong></p>
<p>Os usu&aacute;rios que s&atilde;o banidos por violar os Termos e Condi&ccedil;&otilde;es de uso do site podem ser banidos por incitar/divulgar/realizar a&ccedil;&otilde;es que se referem ao uso de drogas, roubo de senhas, uso de programas 'hacker', 'script' ou para modifica&ccedil;&atilde;o do Hotel. Tamb&eacute;m podem ser banidos usu&aacute;rios que admitem participar de atividades ilegais, que sejam menores de 10 anos, que t&ecirc;m comportamento violento, amea&ccedil;am matar, estuprar, roubar ou provocar danos f&iacute;sicos a usu&aacute;rios do Hotel, <em>cyberviolam</em> as regras, tentam vender ou comprar contas Habbz ou qualquer produto Habbz fora do Habbz Hotel e por dinheiro real ou revender produtos Habbz dentro do Habbz Hotel por cr&eacute;ditos virtuais sem utilizar a Feira Livre ou o sistema de trocas. Tamb&eacute;m poder&atilde;o ser banidos por qualquer viola&ccedil;&atilde;o das disposi&ccedil;&otilde;es dos nossos <a href="/termos.php" target="_blank">Termos e Condi&ccedil;&otilde;es</a>.</p>
<p>&nbsp;</p>

  </div>
   

<strong>Esta p&aacute;gina ser&aacute; atualizada a medida que novos banimentos forem efetuados.</strong><p></p>
  </div>

  <div class="article-attachments">
    <ul class="attachments">
      
    </ul>
  </div>



  


</article>


 <aside class="article-sidebar side-column">
  
  
  <section class="related-articles">
    <h3>Leia Tamb&eacute;m</h3>
    <ul>

        <li>
          <a href="/info/etiqueta.php">Habbz Etiqueta</a>
        </li>

        <li>
          <a href="/info/privacidade.php">Pol&iacute;tica de Privacidade</a>
        </li>
      
	<li>
          <a href="/info/banimentos.php">Regras de Banimentos</a>
        </li>
      
        <li>
          <a href="/info/tribunal.php">Tribunal de Banimentos</a>
        </li>

        <li>
          <a href="/info/termos.php">Termos e Condi&ccedil;&otilde;es de Uso</a>
        </li>
      
        <li>
          <a href="/info/trabalhe.php">Trabalhe Conosco</a>
        </li>
      



      
    </ul>
  </section>

  

</aside>
  </main>

<footer class="footer">
 <div class="footer-inner">
   <p>
	&copy; Habbz Hotel 2017 ~ Powered by <b>CoreDev</b><br>
	Habbz n&atilde;o &eacute; afiliado ou parte da Sulake Corporation. Todos direitos reservados aos respectivos autores.  
  </p>
 </div>
</footer>


</body>
