<?php
    include 'conexao.php';

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereco"];
    $estado = $_POST["estado"];
    $zip = $_POST["zip"];
    $nCard = $_POST["nCard"];
    $prod = "Bravery Saibot";
    $preco = "R$3.699,99";

    $sql = mysql_query("INSERT INTO tb_compra (nomeCliente, emailCliente, cpfCliente, endereco, estado, zip, numeroCartao, produto, preco) VALUES 
    ('$nome', '$email', '$cpf', '$endereco', '$estado', '$zip', '$nCard', '$prod', '$preco')");
 ?>
        
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bravery</title>
        <link rel="stylesheet" href="sections.css">
        <link rel="icon" type="image/x-icon" href="imagens/bravery-logo.png">
    </head>
    <body>
        <form name="formulario"> 
            <section>
                <img src="imagens/obrigado.png" alt="" class="logo">
                <p class="title">Compra realizada com Sucesso, <?php echo $_POST['nome']; ?>!</p>
                <p class="more">Acompanhe a sua compra pelo e-mail.</p>
                <button type="submit" onclick="document.formulario.action='index.html'">Retornar à Página Inicial</button>
            </section>
        </form>
    </body>
    </html>