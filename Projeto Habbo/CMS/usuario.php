<?php
  //envio o charset para evitar problemas com acentos
  header("Content-Type: text/html; charset=UTF-8");


  $mysqli = new mysqli('localhost', 'root', '', 'teste');

  $user = filter_input(INPUT_GET, 'registrationBean_username');
  $sql = "SELECT * FROM `users` WHERE `username` = '{$user}'"; //monto a query


  $query = $mysqli->query( $sql ); //executo a query

  if( $query->num_rows > 0 ) {//se retornar algum resultado
    echo "<div class='alert alert-danger fade in'>
<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Error!</strong> Esse nome já existe!
</div>";
  } else {
    echo "<div class='alert alert-success fade in'>
 <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
<strong>Sucesso!</strong> Esse nome não existe!
</div>";
  }