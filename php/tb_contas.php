<?php
include 'conexao.php';
if(isset($_POST['busca_nome']) !='') {
    $sql = mysql_query("SELECT * FROM cadastro WHERE nomeCliente LIKE '{$_POST['busca_nome']}%' order by nomeCliente asc");
} else {
    $sql = mysql_query("SELECT * FROM cadastro order by nomeCliente asc");
}
if(isset($_GET['apagar'])){ 
    $sql = mysql_query("DELETE FROM cadastro WHERE nomeCliente=". $_GET['apagar']); ?>
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
                margin-top: 250px;
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
                    margin-top: 200px;
                }    
            }
        </style>
        <body>
            <section>
                <img src="../imagens/obrigado.png" alt="" class="logo">
                <p class="title">Conta excluída do banco de dados</p>
                <a href="tb_contas.php"><button type="submit">Retornar</button></a>
            </section>
        </body>
        </html>
    <?php
    return false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bravery</title>
    <link rel="stylesheet" href="../css/tabelas.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <link rel="icon" type="image/x-icon" href="../imagens/bravery-logo.png">
    <style>
        body {
            background-image: url(../imagens/signup-image.png);
        }
    </style>
</head>
<body>
    <div class="cart-container">
        <div class="header">
            <h3 class="heading">Seja Bravery!</h3>
        </div> 
        <table>
            <caption>Registro de Contas Cadastradas</caption>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Senha</th>
                    <th>Excluír</th>
                </tr>
            </thead>
            <form name='formulario' method="POST">
                <div class="box">
                    <div class="search-box">
                        <input type="text" name="busca_nome" class="search-txt" autocomplete="off" placeholder="Digite o nome do Funcionário">
                        <a href="#" class="search-btn">
                            <i class="fas fa-search"></i>
                        </a>
                    </div>
                </div>
                <tbody>
                    <?php while($linha = mysql_fetch_assoc($sql)) {?>
                        <td align="center"><?php echo $linha['nomeCliente']; ?></td>
                        <td align="center"><?php echo $linha['emailCliente']; ?></td>
                        <td align="center"><?php echo $linha['CPF']; ?></td>
                        <td align="center"><?php echo $linha['senhaCliente']; ?></td>
                        <td align="center"><a href="tb_contas.php?apagar='<?php echo $linha['nomeCliente']; ?>'"><img src='../imagens/deletar-usuario.png'></a></td>
                    </tr>  
                    <?php } ?>
                </tbody>
                <h1 class="link"><a href="../html/tabelas.html">Voltar para Página Anterior</a></h1>
            </form>
        </table>
    </div>
</body>
</html>