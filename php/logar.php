<?php
// SE TORNOU INUTIL ESTE ARQUIVO. TUDO FOI TRANSFERIDO PARA O conta-logada.php ! 

    include 'conexao.php';
    session_start();
		
	$email = $_POST["usuario"];
	$cpf = $_POST["usuario"];
    $senha = $_POST["senha"];

    $emailGerente = 'gerente@bravery';
    $senhaGerente = 'bravery123';
			 
	$sql = mysql_query ("SELECT * FROM cadastro WHERE (emailCliente = '$email' OR CPF = '$cpf') AND senhaCliente = '$senha'"); 

    if ($email == $emailGerente) {
        if ($senha == $senhaGerente) {
            header("location: ../html/tabelas.html"); //FUNCIONOU!
        } else {  ?>

            <!DOCTYPE html>               <!--FUNCIONOU-->
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Bravery</title>
                <link rel="icon" type="image/x-icon" href="../imagens/bravery-logo.png">
                <link rel="stylesheet" href="../css/sections.css">
            </head>
            <body>
                <section>
                    <img src="imagens/obrigado.png" alt="" class="logo">
                    <p class="title">Acesso negado!</p>
                    <a href="../html/login.html"><button type="submit">Voltar ao Login</button></a>
                    </section>
            </body>
            </html>

            <?php
        }
    } else {
        if (mysql_num_rows($sql) > 0) { 
            while($linha = mysql_fetch_assoc($sql)) { // FUNCIONOU!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                $_SESSION['user'] = $linha['nomeCliente'];
                $_SESSION['cpfUser'] = $linha['CPF'];
                $_SESSION['emailUser'] = $linha['emailCliente'];
                header("location: conta-logada.php");
            }
        } else { ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Bravery</title>
                <link rel="icon" type="image/x-icon" href="imagens/bravery-logo.png">
                <link rel="stylesheet" href="../css/sections.css">
            </head>
            <body>
                <section>
                    <img src="../imagens/obrigado.png" alt="" class="logo">
                    <p class="title">Ops! Parece que as informações não coincidiram!</p>
                    <a href="../html/login.html"><button type="submit">Voltar ao Login</button></a>
                    </section>
            </body>
            </html>
            <?php
        }
    }
?>
