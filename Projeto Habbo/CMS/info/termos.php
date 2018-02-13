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
<?php include_once("Pagina/HeadCMS.php"); ?>

<html lang="pt">

 <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Habbz ~ Termos </title>
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
    <h1>Termos e Condi&ccedil;&otilde;es de Uso</h1>
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
<p>Como em todos os hot&eacute;is privados, o nosso n&atilde;o seria diferente, os Termos e Condi&ccedil;&otilde;es do Habbz devem ser lidos atentamente antes de se registarem no site/jogo. Os Termos e Condi&ccedil;&otilde;es t&ecirc;m o seu certo valor, para uso correto do nosso website &agrave; que prestar alguns par&acirc;metros.</p>
<p>1. <strong>ACESSO AO JOGO</strong></p>
<p>1.1 O Habbz Hotel &eacute; um jogo virtual em flash, este &eacute; um ''Habbo Alternativo'', ou seja todos os conte&uacute;dos aqui propostos s&atilde;o inteiramente gratuitos. N&atilde;o temos nenhuma empresa e N&Atilde;O somos associados &agrave; Sulake Corporation OY. Voc&ecirc; deve estar ciente que todos os dados que deposita aqui s&atilde;o registados no nosso banco de dados. Ao acessar o nosso Hotel Privado voc&ecirc; concorda cumprir os Termos e Condi&ccedil;&otilde;es, e a estar jogando um jogo ''Alternativo'' ao original.</p>
<p>1.2 Voc&ecirc; aceita estar sendo comandado por uma equipe, como qualquer outro usu&aacute;rio. Em caso de infringimento de regras, ser&aacute; punido p&oacute;rem isso est&aacute; determinado na Habbz Etiqueta.</p>
<p>1.3 O utilizador &eacute; respons&aacute;vel por tudo o que faz no Hotel, todas as informa&ccedil;&otilde;es dadas, como e-mails, numeros de telem&oacute;vel, skype &eacute; de sua inteira responsabilidade. Qualquer informa&ccedil;&atilde;o que voc&ecirc; d&aacute; a algum usu&aacute;rio a responsabilidade &eacute; sua, p&oacute;rem existem consequ&ecirc;ncias como ALERTAS ou PUNI&Ccedil;&Otilde;ES dependendo do caso. O Habbz Hotel recomenda a voc&ecirc; deixar toda a sua informa&ccedil;&atilde;o confidencial pois nunca se sabe, os infratores que andam pelo Hotel.</p>
<p>1.4 Concorda em ter mais de 10 anos para utilizar o Habbz Hotel. Ao se registar voc&ecirc; declara que tem mais de 10 anos para, utilizar o Habbz Hotel.</p>
<p>1.5 Em caso de perda de senha dever&aacute; contatar um ADMinistrador, na p&aacute;gina ''Equipe'' do Hotel, ou poder&aacute; enviar um chamado atrav&eacute;s do bot&atilde;o ''Ajuda'' situado no canto superior direito a laranja. Demoramos no m&aacute;ximo a 1 dia a 2 dias &uacute;teis para dar uma resposta, nesses casos dever&aacute; enviar sua informa&ccedil;&atilde;o como perdeu, seu e-mail e afins. Caso a equipe note que &eacute; uma fraude para entrar na conta de outro utilizador o mesmo ser&aacute; punido severamente de acordo com nossa Habbz Etiqueta.</p>
<p>2. <strong style="text-transform: uppercase;">USO DO Habbz HOTEL</strong></p>
<p>2.1 Voc&ecirc; concorda em n&atilde;o pedir a troca de nome de usu&aacute;rio. O seu nome de usu&aacute;rio manter&aacute;-se sempre igual, apenas trocamos o nome em casos mais graves, dependendo, caso o nome revelar o nome verdadeiro, ou um nome INAPROPRIADO, envie-nos um ticket/chamado que trocaremos logo conforme suas informa&ccedil;&otilde;es.</p>
<p>2.2 Ao aceitar os Termos e Condi&ccedil;&otilde;es concorda em nunca DESRESPEITAR um membro da equipe que fica situado na p&aacute;gina da ''Equipe'' no site do ''www.Habbzhotel.in''.</p>
<p>2.3 Suas conversas s&atilde;o monitoradas apenas se o usu&aacute;rio/quarto em quest&atilde;o for sujeito a den&uacute;ncia atrav&eacute;s do bot&atilde;o ''Ajuda'', ou em caso de algum membro da Equipe ver alguma infra&ccedil;&atilde;o cometida tanto a Habbz Etiqueta como ao desrespeito dos Termos e Condi&ccedil;&otilde;es do Habbz Hotel.</p>
<p>2.4 Qualquer utiliza&ccedil;&atilde;o de programas externos, truques para descobrir senhas, keyllogs, cavalos de tr&oacute;ia.. qualquer coisa para tentar atrapalhar o sistema do Habbz Hotel ser&atilde;o severamente punidos.</p>
<p>2.5 Propagar sites de divulga&ccedil;&atilde;o de outros Hot&eacute;is Alternativos; propaga&ccedil;&atilde;o de conte&uacute;do sexualmente expl&iacute;cito; propagar &oacute;dio/preconceito; causar transtorno; propagar golpes (truques e sites para descubrir senhas e afins), todo este tipo de ato n&atilde;o &eacute; aceit&aacute;vel ao Habbz Hotel.</p>
<p>3.<strong> FINS LUCRATIVOS</strong></p>
<p>3.1 O Habbz Hotel N&Atilde;O tem inten&ccedil;&atilde;o de ganhar dinheiro pela cria&ccedil;&atilde;o e promo&ccedil;&atilde;o de todos os conte&uacute;dos apresentados. O Habbz Hotel &eacute; um Habbo Alternativo totalmente gratuito, n&atilde;o temos fins lucrativos de nenhum modo. Este foi criado apenas para a divers&atilde;o de voc&ecirc;s.</p>
<p>4. <strong>SUSPENS&Otilde;ES E BANIMENTOS</strong></p>
<p>4.1 A equipe ADMinistrativa do Hotel tem todo direito de banir/suspender qualquer usu&aacute;rio cometendo alguma infra&ccedil;&atilde;o, se algum utilizador desrespeitar qualquer regra citada da Habbz Etiqueta (regras) ser&aacute; ALERTADO primeiramente e caso o mesmo persista ser&aacute; BANIDO. Os banimentos variam de caso para caso obviamente para consultar a dura&ccedil;&atilde;o de banimentos a qualquer infra&ccedil;&atilde;o cometida ter&aacute; que ler a Habbz Etiqueta.</p>
<p>5.<strong> PROMO&Ccedil;&Otilde;ES, EVENTOS E AFINS</strong></p>
<p>5.1 A equipe ADMinistrativa (trata da parte auxiliar e da cria&ccedil;&atilde;o de eventos/promo&ccedil;&otilde;es), faz sempre promo&ccedil;&otilde;es di&aacute;rias tanto como eventos. Estas podem variar sendo: Eventos (jogos dentro do Hotel) e promo&ccedil;&otilde;es (fora do Hotel, obviamente escritas numa not&iacute;cia). Estas promo&ccedil;&otilde;es t&ecirc;m como objetivo animar o Hotel, dando premia&ccedil;&otilde;es ben&eacute;ficas para usu&aacute;rios dentro do Hotel, como emblemas, raros e afins.</p>
<p>6. <strong style="text-transform: uppercase;">EQUIPE DO Habbz HOTEL</strong></p>
<p>6.1 A equipe do Habbz Hotel &eacute; composta por v&aacute;rios componentes, treinados e profissionais. A equipe do Habbz Hotel tem como objetivo manter a ordem, e cada funcion&aacute;rio tem a sua fun&ccedil;&atilde;o. Lembrando que as pessoas da equipe do Habbz Hotel s&atilde;o volunt&aacute;rios, ou seja, estes n&atilde;o est&atilde;o a ser pagos para exercer a sua fun&ccedil;&atilde;o corretamente. A equipe &eacute; composta por: t&eacute;cnicos, administradores (promotores de eventos, e chefia&ccedil;&atilde;o da MODera&ccedil;&atilde;o), e MODeradores. Os t&eacute;cnicos t&ecirc;m o dever de alterar o design do Hotel, colocar nova mob&iacute;lia, manuten&ccedil;&otilde;es e muitos outros (..) alterar qualquer parte, respetiva &agrave; &aacute;rea t&eacute;cnica. A &aacute;rea administrativa que s&atilde;o os promotores de eventos, e chefiadores da MODera&ccedil;&atilde;o t&ecirc;m como dever criar promo&ccedil;&otilde;es e eventos para animar os utilizadores do Habbz Hotel, estes tratam de qualquer parte menos da &aacute;rea t&eacute;cnica, e tamb&eacute;m tem o dever de chefiar os MODeradores. Por fim, os MODeradores s&atilde;o aqueles que cuidam dos tickets/chamados.. s&atilde;o os membros da equipe que t&ecirc;m a fun&ccedil;&atilde;o de ajudar, MODerar o Hotel/quarto/usu&aacute;rios e responder a qualquer d&uacute;vida e chamado funcionam como ''recepcionistas''.</p>
   

<strong>Esta p&aacute;gina poder&aacute; ser atualizada!</strong></a></p>
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
