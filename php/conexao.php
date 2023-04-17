<?php
    $servidor = "127.0.0.1";
    $usuario = "root";
    $senha = "usbw";
    $banco = "bravery";
    $conecta = mysql_connect($servidor, $usuario, $senha) or die (mysql_error());
    mysql_select_db($banco) or die ("Erro ao se conectar com o banco de dados!");
?>
