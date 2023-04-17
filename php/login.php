<?php
    include 'conexao.php';

    $nome = $_POST ["nomeCliente"];
    $email = $_POST ["emailCliente"];
    $cpf = $_POST ["cpfCliente"];
    $senha = $_POST ["senhaCliente"];
    $confirma = $_POST ["senhaClienteConfirm"];

    // CRIAÇÃO DE CONTA, CASO A SENHA NÃO SEJA A MESMA DA SENHA DE CONFIRMAÇÃO
    if ($senha != $confirma) { ?>
        
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Bravery</title>
            <link rel="icon" type="image/x-icon" href="../imagens/bravery-logo.png">
        </head>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }

            body {
                background: url(../imagens/signup-image.png);
            }

            section {
                margin-top: 150px;
            }

            img {
                position: relative;
                left: 50%;
                transform: translateX(-50%);
            }

            p.title {
                text-align: center;
                font-size: 35px;
                color: #fff;
                padding: 20px;
            }

            button {
                position: relative;
                left: 50%;
                transform: translateX(-50%);
                background-color: transparent;
                border: none;
                color: #fff;
                font-size: 20px;
                padding: 14px 20px;
                margin: 8px 0;
                cursor: pointer;
                align-items: center;
                transition: 0.4s ease;
            }

            button:hover {
                background-color: #fff;
                color: #000;
                transition: 0.4s ease;
            }

            @media (max-width: 1366px) {
                section {
                    margin-top: 150px;
                }    
            }
        </style>
        <body>
            <section>
                <img src="../imagens/obrigado.png" alt="" class="logo"> <!--FUNCIONOU-->
                <p class="title">Ops! A senha de confirmação que você digitou não coincide!</p>
                <a href="../html/login.html"><button type="submit">Voltar ao Cadastro</button></a>
            </section>
        </body>
        </html>
        <?php
    } else { // CRIAÇÃO DE CONTA, CASO O EMAIL INSERIDO SEJA O MESMO EMAIL QUE JÁ INSERIODO ANTERIORMENTE

        $sql = mysql_query("SELECT * FROM cadastro WHERE emailCliente='$email'");

        if (mysql_num_rows($sql) > 0) {
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Bravery</title>
            <link rel="icon" type="image/x-icon" href="../imagens/bravery-logo.png">
        </head>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }

            body {
                background: url(../imagens/signup-image.png);
            }

            section {
                margin-top: 150px;
            }

            img {
                position: relative;
                left: 50%;
                transform: translateX(-50%);
            }

            p.title {
                text-align: center;
                font-size: 35px;
                color: #fff;
                padding: 20px;
            }

            button {
                position: relative;
                left: 50%;
                transform: translateX(-50%);
                background-color: transparent;
                border: none;
                color: #fff;
                font-size: 20px;
                padding: 14px 20px;
                margin: 8px 0;
                cursor: pointer;
                align-items: center;
                transition: 0.4s ease;
            }

            button:hover {
                background-color: #fff;
                color: #000;
                transition: 0.4s ease;
            }

            @media (max-width: 1366px) {
                section {
                    margin-top: 150px;
                }    
            }
        </style>
        <body>
            <section>
                <img src="../imagens/obrigado.png" alt="" class="logo">
                <p class="title">Parece que esse usuário já existe!</p>
                <a href="../html/login.html"><button type="submit">Login</button></a>
            </section>
        </body>
        </html>

        <?php

        } else { // CRIAÇÃO DE CONTA, CASO NÃO HOUVER UMA CONTA COM OS RESPECTIVOS DADOS ABAIXO, SERÁ CRIADA UMA CONTA NOVA
            $sql = mysql_query("INSERT INTO cadastro (nomeCliente, emailCliente, CPF, senhaCliente) VALUES ('$nome', '$email', '$cpf', '$senha')"); 
        ?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Bravery</title>
            <link rel="icon" type="image/x-icon" href="../imagens/bravery-logo.png">
        </head>
        <style>
                @import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');

                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                    font-family: 'Poppins', sans-serif;
                }

                body {
                    background: url(../imagens/signup-image.png);
                }

                section {
                    margin-top: 150px;
                }

                img {
                    position: relative;
                    left: 50%;
                    transform: translateX(-50%);
                }

                p.title {
                    text-align: center;
                    font-size: 35px;
                    color: #fff;
                    padding: 20px;
                }

                button {
                    position: relative;
                    left: 50%;
                    transform: translateX(-50%);
                    background-color: transparent;
                    border: none;
                    color: #fff;
                    font-size: 20px;
                    padding: 14px 20px;
                    margin: 8px 0;
                    cursor: pointer;
                    align-items: center;
                    transition: 0.4s ease;
                }

                button:hover {
                    background-color: #fff;
                    color: #000;
                    transition: 0.4s ease;
                }

                @media (max-width: 1366px) {
                    section {
                        margin-top: 100px;
                    }    
                }
        </style>
        <body>
            <section>
                <img src="../imagens/obrigado.png" alt="" class="logo">
                <p class="title">Bem-vindo(a) à Bravery, <?php echo $_POST['nomeCliente'];?>!<br>Inicie uma sessão com sua nova conta!</p> <!--FUNCIONOU-->
                <a href="../html/login.html"><button type="submit">Logar com sua nova conta</button></a>
            </section>
        </body>
    </html>

            <?php
        }
    }
?>