<?php
    include 'conexao.php';

    $cpf = $_POST["cpf"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM cadastro WHERE CPF = '$cpf'";
    $result = mysql_query($sql) or die(mysql_error());
    
    while($linha = mysql_fetch_assoc($result)) {

        if ($cpf == $linha['CPF']) { 

            $update = mysql_query("UPDATE cadastro SET senhaCliente='$senha' WHERE CPF='$cpf'"); ?>
            
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Bravery</title>
                <link rel="icon" type="image/x-icon" href="../imagens/bravery-logo.png">
                <link rel="stylesheet" href="../css/phpcss.css">
            </head>
            <body>
                <form name="formulario">
                    <section>
                        <img src="../imagens/obrigado.png" alt="" class="logo">
                        <p>Senha alterada com sucesso!</p>
                        <button type="submit" onclick="document.formulario.action='../html/login.html'">Retornar ao Login</button>
                    </section>
                </form>
            </body>
            </html>

            <?php

        } else { ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>CPF inválido</title>
            <link rel="stylesheet" href="../css/phpcss.css">
            <link rel="icon" type="image/x-icon" href="../imagens/bravery-logo.png">
        </head>
        <body>
            <form name="formulario">
            <section>
                    <img src="imagens/obrigado.png" alt="" class="logo">
                    <p>Ops! Parece que o CPF que você informou não existe!</p>
                    <button type="submit" onclick="document.formulario.action='../html/login.html'">Retornar ao Login</button>
                </section>
            </form>
        </body>
        </html>

        <?php
        }
    }
?>
       