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
	<title>Habbz ~ Privacidade </title>
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

<p>O Habbz Hotel est&aacute; empenhado em proteger a sua privacidade e em desenvolver uma tecnologia que lhe proporciona cada vez mais uma poderosa e segura experi&ecirc;ncia online. Esta declara&ccedil;&atilde;o de privacidade aplica-se ao site do Habbz Hotel, ao se registrar no nosso site voc&ecirc; concorda com o processamento das pr&aacute;ticas descritas nesta declara&ccedil;&atilde;o.</p>

<p><b>1 DADOS CONFIDENCIAIS</b></p>
<p>1.1 Todo o tipo de informa&ccedil;&atilde;o que voc&ecirc; deposita ao se registar como data de nascimento, senhas etc. Isto &eacute; tudo usado apenas para voc&ecirc; conseguir logar-se corretamente ou seja, o Habbz n&atilde;o pretende de forma nenhuma acessar a outros dados que voc&ecirc; tenha, caso isso o fa&ccedil;a sentir mais seguro.</p>
<p>1.2 Aconselhamos a manter as suas informa&ccedil;&otilde;es pessoais confidenciais para os outros Habbzs, nunca se sabe quem reside no Hotel, alertamos sempre para isto para o seu bem.</p>
<p><b>2 DIVULGA&Ccedil;&Otilde;ES</b></p>
<p>2.1 O Habbz n&atilde;o divulga as suas informa&ccedil;&otilde;es pessoais, estas ficam guardadas no nosso banco de dados para caso haja algum incidente e um usu&aacute;rio perder a senha poder-mos repor-la. Tudo o que voc&ecirc; deposita no registro fica apenas para a ger&ecirc;ncia, n&atilde;o divulgamos para ningu&eacute;m os seus dados s&atilde;o protegidos.</p>
<p><b>3 IDADE</b></p>
<p>3.1 Ao se registrar no Habbz, voc&ecirc; tem a no&ccedil;&atilde;o que nos forneceu a sua idade exacta, a idade m&iacute;nima para jogar Habbz Hotel &eacute; a partir dos 10 anos. Caso algum pai, esteja desagradado com o nosso servi&ccedil;o, ou quiser dar alguma sugest&atilde;o/perguntas etc. pedimos para nos contatar atrav&eacute;s de: <b>OficialHabbz@habbz.biz</script> </b>respondemos sempre a 24 horas a 48 horas ut&eacute;is (1 a 2 dias max.)</p>
<p><b>4 MODIFICAR O REGISTRO</b></p>
<p>4.1 Este pode ser trocado apenas com a autoriza&ccedil;&atilde;o de algum superior ADMinistrador, a MODera&ccedil;&atilde;o n&atilde;o tem poderes sufecientes para o efetuar. Caso note algum erro no seu registo e queira repo-lo sempre falar com um ADMinistrador, ou enviar um e-mail para <b> OficialHabbz@habbz.biz</script> </b>aten&ccedil;&atilde;o que os dados s&oacute; podem ser alterados uma vez, caso tenha falhado no registo, portanto n&atilde;o nos tente enganar pois isso ter&aacute; consequencias caso minta algum dado.</p>
<p><b>5 O GOOGLE ADSENSE</b></p>
<p>5.1 O Habbz Hotel utiliza o Google AdSense para exibir an&uacute;ncios e manter o servidor online, ent&atilde;o o Google pode ent&atilde;o colocar o chamado DoubleClick DART Cookie no seu navegador para que as informa&ccedil;&otilde;es sobre a sua visita a este site (n&atilde;o incluindo o seu nome, endere&ccedil;o, endere&ccedil;o de e-mail ou n&uacute;mero de telefone) sejam salvas e para fornecer an&uacute;ncios sobre bens e servi&ccedil;os de seu interesse. Ao utilizar este site, voc&ecirc; concorda que o DoubleClick DART Cookie pode ser colocado no seu navegador e que ele colete informa&ccedil;&otilde;es para a exibi&ccedil;&atilde;o de an&uacute;ncios no site. Se voc&ecirc; precisar de mais informa&ccedil;&otilde;es ou se voc&ecirc; quer evitar informa&ccedil;&otilde;es sobre sua visita, leia sobre os Cookies do Adsense em: <a href="https://www.google.com/policies/technologies/ads/" target="_new">https://www.google.com/policies/technologies/ads/</a>.</p>
<p><b>6 O USO DE COOKIES</b></p>
<p>6.1 Podemos usar diversos m&eacute;todos e tecnologias atuais ou desenvolvidos posteriormente, como <b>&quot;cookies&quot;</b>, que coletem e/ou armazenem de forma autom&aacute;tica (ou passiva) determinadas informa&ccedil;&otilde;es sempre que voc&ecirc; visitar ou interagir com o Servi&ccedil;o (&quot;Tecnologias de Rastreamento&quot;), como tecnologias que podem ser baixadas em seu computador ou dispositivo e podem fazer ou modificar as configura&ccedil;&otilde;es de seu computador ou dispositivo. Um &quot;cookie&quot; &eacute; um arquivo de dados colocado em um computador ou dispositivo (como em seu navegador) quando o mesmo &eacute; usado para visitar o Servi&ccedil;o. Usamos Tecnologias de Rastreamento estritamente necess&aacute;rias para lhe permitir o uso e o acesso ao Servi&ccedil;o, incluindo os cookies necess&aacute;rios para impedir atividades fraudulentas ou para melhorar a seguran&ccedil;a. Futuramente, poderemos decidir usar as Tecnologias de Rastreamento para nos ajudar a entregar conte&uacute;do, incluindo propagandas, relevantes a seus interesses como parte de seu uso do Servi&ccedil;o e sites de terceiros. Ao usar este Servi&ccedil;o, estamos solicitando sua autoriza&ccedil;&atilde;o para usar essas diversas Tecnologias de Rastreamento.</p>
<p>6.2 Voc&ecirc; pode exercer o controle sobre cookies regulares uma vez que eles podem ser desabilitados ou removidos atrav&eacute;s das ferramentas disponibilizadas como parte da maioria dos navegadores comerciais e, em alguns casos, podem ser bloqueados no futuro, ao se selecionar determinadas configura&ccedil;&otilde;es. Cada navegador que usar ter&aacute; que ser configurado separadamente e os diferentes navegadores oferecem funcionalidades e op&ccedil;&otilde;es diferentes nesse aspecto. Ao optar por desabilitar cookies, por&eacute;m, voc&ecirc; pode n&atilde;o conseguir aproveitar inteiramente o Servi&ccedil;o (por exemplo, parte ou a totalidade do Servi&ccedil;o pode n&atilde;o continuar a funcionar como desejado).</p>
<p>6.3 Esta Pol&iacute;tica de Privacidade n&atilde;o governa as Tecnologias de Rastreamento que podem ser empregadas por outros em conex&atilde;o a nosso Servi&ccedil;o, como fornecedores de servi&ccedil;os anal&iacute;ticos, redes de propaganda, anunciantes e outros aplicativos Consulte as pol&iacute;ticas de privacidade dessas partes no que se refere a suas pr&aacute;ticas de dados.</p>
<p><b>7 ATUALIZA&Ccedil;&Otilde;ES DA POLITICA DE PRIVACIDADE</b></p>
<p>7.1 A pol&iacute;tica de privacidade do Habbz pode ser atualizada a qualquer momento, n&atilde;o existe nenhuma data certa para o fazer, caso a equipe ache que devemos implementar algo a mais colocaremos.</p>
<Br>
<p><strong>Esta p&aacute;gina poder&aacute; ser atualizada!</strong></a></p>

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
