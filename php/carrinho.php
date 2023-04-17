<?php
    include 'conexao.php';
    session_start();

    if(!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
    }

    // adicionar carrinho

    if(isset($_GET['acao'])) {

        // adicionar carrinho
        if($_GET['acao'] == 'add') {
            $id = intval($_GET['id']);
            if(!isset($_SESSION['carrinho'][$id])) {
                $_SESSION['carrinho'][$id] = 1;
            } else {
                $_SESSION['carrinho'][$id] += 1;
            }
        }

        // remover carrinho
        if($_GET['acao'] == 'del') {
            $id = intval($_GET['id']);
            if (isset($_SESSION['carrinho'][$id])) {
                unset($_SESSION['carrinho'][$id]);
            }
        }

        //ALTERAR A QUANTIDADE 
        if($_GET['acao'] == 'up') {
            if(is_array($_POST['prod'])) {
                foreach($_POST['prod'] as $id => $qtd) {
                    $id = intval($id);
                    $qtd = intval($qtd);
                    if(!empty($qtd) || $qtd <> 0) {
                        $_SESSION['carrinho'][$id] = $qtd;
                    } else {
                        unset($_SESSION['carrinho'][$id]);
                    }
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/carrinho.css">
    <title>Bravery</title>
    <link rel="icon" type="image/x-icon" href="../imagens/bravery-logo.png">
    
</head>
<body>
    <div class="cart-container">
        <div class="header">
            <h3 class="heading"><span class="fa fa-shopping-cart"></span> Carrinho</h3>
            <h5 class="action">Bravery</h5>
        </div>
        <table>
            <caption>Carrinho de Compras</caption>
            <thead>
                <tr>
                    <th width="150">Produto</th>
                    <th width="100">Quantidade</th>
                    <th width="89">Preço</th>
                    <th width="100">Subtotal</th>
                    <th width="64">Remover</th>
                </tr>
            </thead>
            <form action="?acao=up" method="post">
                <tfoot>
                    <tr>
                    <td colspan="2"><button type="submit">Atualizar Carrinho</button></td>
                    <td colspan="5"><a class="continuarComprando" href="conta-logada.php#products">Continuar Comprando</a></td>
                    <tr>
                </tfoot>
                <tbody>
                    
                    <?php 
                        if(count($_SESSION['carrinho']) == 0) {
                            echo '<tr><td colspan="5">Não há produto no carrinho</td></tr>';
                        } else {
                            foreach($_SESSION['carrinho'] as $id => $qtd) {
                                $sql = "SELECT * FROM produtos WHERE id = '$id'";
                                $qr = mysql_query($sql) or die(mysql_error());
                                $ln = mysql_fetch_assoc($qr);

                                $nome = $ln['nomeProduto'];
                                $preco = $ln['preco'];
                                $sub = $ln['preco'] * $qtd;

                                if (!isset($total)) {
                                    $total = 0;
                                }
                                $total += $sub;
                                $_SESSION['total'] = $total;

                                echo '<tr>
                                    <tr>
                                        <td>'.$nome.'</td>
                                        <td><input type="text" size="3" name="prod['.$id.']" value="'.$qtd.'"></td>
                                        <td>R$'.$preco.'</td>
                                        <td>R$'.$sub.'</td>
                                        <td><a class="linkRemover" href="?acao=del&id='.$id.'">Remover</a></td>
                                    </tr>'; 
                                }

                                echo '<td colspan="4">Total</td> 
                                    <td>R$'.$_SESSION['total'].'</td>
                                    <tr></tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td colspan="2"><a class="confirmCompra" href="finalizar-compra.php">Confirmar Compra</a></td>';
                        }
                    ?>
                </tbody>
            </form>
        </table>
    </div>
</body>
</html>