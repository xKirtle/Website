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
	<title>Habbz ~ Trabalhe Conosco! </title>
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
    <h1>Trabalhe Conosco!</h1>
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
<p>Se voc&ecirc; &eacute; uma pessoa din&acirc;mica e sempre disposta a enfrentar novos desafios, esta &eacute; sua chance de entrar para a Equipe que tem na qualidade e no trabalho em grupo uma de suas principais caracter&iacute;sticas.</p>

<p>Nesta p&aacute;gina voc&ecirc; poder&aacute; efetuar seu cadastro no Banco de Talentos do Habbz Hotel para participar de futuros processos seletivos em todas as &aacute;reas do Hotel.</p>

<p>Se voc&ecirc; chegou at&eacute; aqui, est&aacute; na hora de passar para a pr&oacute;xima fase.</p>

<p><strong>Modera&ccedil;&atilde;o Habbz Hotel</strong></p>

<p>Os moderadores s&atilde;o os supervisores de seguran&ccedil;a no Habbz Hotel, eles est&atilde;o online diariamente afim de proteger os Habbzs inocentes dos Habbzs que n&atilde;o se comportam adequadamente e que violam os Padr&otilde;es de Comunidade do Hotel. Os moderadores s&atilde;o respons&aacute;veis por monitorar os quartos dos Habbzs para garantir que o Hotel seja um local seguro e agrad&aacute;vel para todos os Habbzs. Eles possuem um conjunto de ferramentas que os possibilitam lidar com os Habbzs criadores de problemas, podendo assim alert&aacute;-los, remov&ecirc;-los de quartos ou at&eacute; mesmo bani-los do Hotel.</p>

<p><b>Pr&eacute;-Requisitos:</b></p>

<p>- Deve ser uma pessoa respons&aacute;vel;</p>

<p>- Excelentes habilidades de comunica&ccedil;&atilde;o escrita, ou seja portugu&ecirc;s leg&iacute;vel;</p>

<p>- Deve ser uma pessoa pr&oacute;-ativa;</p>

<p>- Nunca ter sido banido no Hotel;</p>

<p>- Deve ter um hor&aacute;rio flex&iacute;vel e estar dispon&iacute;vel 7(sete) dias por semana;</p>

<p>- Coer&ecirc;ncia com a aplica&ccedil;&atilde;o das regras do Hotel;</p>

<p>- Experi&ecirc;ncia pr&eacute;via na &aacute;rea;</p>

<p>- Criativo, din&acirc;mico, comprometido e que trabalhe bem em equipe;</p>

<p>- Possuir uma conta no Skype;</p>

<p>- Possuir uma conta no Facebook;</p>

<p><b>Responsabilidades e Fun&ccedil;&otilde;es:</b></p>

<p>- Fazer com que os Padr&otilde;es da Comunidade estejam em funcionamento;</p>

<p>- Respons&aacute;vel pelas respostas do Sistema de Chamado de Ajuda;</p>

<p>- Manter o Hotel seguro para todos os jogadores;</p>

<p>- Moderar as discuss&otilde;es no Hotel em altos n&iacute;veis de profissionalismo;</p>

<p>- Garantir a integridade entre todos os jogadores do Hotel;</p>

<p>- Ter conhecimento de todas as regras do Hotel e aplica-las no Hotel.</p>


<br>
<br>

<p><strong>Caso voc&ecirc; tenha interesse em trabalhar conosco na &aacute;rea de <b>Modera&ccedil;&atilde;o</b> do Hotel e caso voc&ecirc; queira aceitar este desafio envie seu curr&iacute;culo para nosso <a href="">Indispon&iacute;vel no momento</a>. Boa sorte!<br></strong></a></p>

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
