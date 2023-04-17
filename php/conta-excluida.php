<?php
    include 'conexao.php';
    session_start();

    $cpf = $_POST["cpf"];
	
    $sql = "SELECT * FROM cadastro WHERE CPF = '$cpf'";
    $result = mysql_query($sql) or die(mysql_error());

    while($linha = mysql_fetch_assoc($result)) {

        if ($cpf == $linha['CPF']) { 

            $delete = mysql_query("DELETE FROM cadastro WHERE CPF='$cpf'"); ?>
            
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Bravery</title>
                <link rel="stylesheet" href="../css/phpcss.css">
                <link rel="icon" type="image/x-icon" href="../imagens/bravery-logo.png">
            </head>
            <body>
                <form name="formulario">
                    <section>
                        <img src="../imagens/obrigado.png" alt="" class="logo">
                        <p>Conta excluída com sucesso.<br>Espero ver você de novo, <?php echo $linha['nomeCliente']; ?>!</p>
                        <button type="submit" onclick="document.formulario.action='../index.html'">Ir para a Página Principal</button>
                    </section>
                </form>
            </body>
            </html>

            <?php
        }

        if ($cpf != $linha['CPF']) { ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Exclusão de Conta</title>
            <link rel="stylesheet" href="../css/phpcss.css">
            <link rel="icon" type="image/x-icon" href="../imagens/bravery-logo.png">
        </head>
        <body>
            <form name="formulario">
            <section>
                    <img src="../imagens/obrigado.png" alt="" class="logo">
                    <p>Ops! Parece que o CPF que você informou não existe!</p>
                    <button type="submit" onclick="document.formulario.action='excluir.php'">Retornar a Página Anterior</button>
                </section>
            </form>
        </body>
        </html>

        <?php
        }
    }
?>
       