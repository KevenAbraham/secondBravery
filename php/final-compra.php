<?php 
    include ('conexao.php');
    session_start();

    $emailCompra = $_SESSION['emailUser'];
    $cpfCompra = $_SESSION['cpfUser'];
    $nomeCompra = $_SESSION['user'];
    $precoCompra = $_SESSION['total'];

    $sql = mysql_query("INSERT INTO compra (nomeCliente, CPF, emailCliente, totalCompra) VALUES 
    ('$nomeCompra', '$cpfCompra', '$emailCompra', '$precoCompra')");
 ?>
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bravery</title>
    <link rel="stylesheet" href="../css/sections.css">
    <link rel="icon" type="image/x-icon" href="../imagens/bravery-logo.png">
</head>
<body>
    <form name="formulario"> 
        <section>
            <img src="../imagens/obrigado.png" alt="" class="logo">
            <p class="title">Compra realizada com Sucesso, <?php echo $_SESSION['user']; ?>!</p>
            <p class="more">Acompanhe a sua compra pelo e-mail.</p>
            <button type="submit" onclick="document.formulario.action='conta-logada.php'">Retornar à Página Inicial</button>
        </section>
    </form>
</body>
</html>