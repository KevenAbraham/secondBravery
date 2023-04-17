<?php 
    include ('conexao.php');
    session_start();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bravery</title>
    <link rel="icon" type="image/x-icon" href="../imagens/bravery-logo.png">
    <link rel="stylesheet" href="../css/obrigado.css">
</head>
<body>
    <section>
        <img src="../imagens/obrigado.png" alt="" class="logo">
        <p class="title">Foi um prazer tê-lo(a) conosco, <?php echo $_SESSION['user'] ?></p>
        <p class="more">Espero poder vê-lo(a) novamente!</p>
        <a href="../index.html"><button type="submit">Sair</button></a>
    </section>
</body>
</html>