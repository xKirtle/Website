<?php

/* Configuração da classe.smtp.php */ 
$host = "smtp.mail.yahoo.com.br"; /*qualquer servidor de SMTP, eu usei o do Yahoo */ 
$smtp = new Smtp($host);
$smtp->user = "gugax@ymail.com"; /*o usuário do SMTP, seu e-mail do yahoo */ 
$smtp->pass = "MinhaSenha"; /* senha do usuário do SMTP, sua senha de acesso ao seu e-mail no yahoo*/ 
$smtp->debug =true; /* ativar a autenticação SMTP*/
?>