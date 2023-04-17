<?php
    session_start();
    if(!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
    }

    // adicionar carrinho

    if(isset($_GET['acao'])) {
        // adicionar carrinho
        if($_GET['acao'] == 'add') {
            $id = intval($_GET['id']);
            if(!isset($_SESSION['carrinho']['id'])) {
                $_SESSION['carrinho']['id'] = 1;
            } else {
                $_SESSION['carrinho']['id'] += 1;
            }
        }

        // remover carrinho
        if($_GET['acao'] == 'del') {
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
    <title>Document</title>
</head>
<body>
    <table>
        <caption>Carrinho de Compras</caption>
        <thead>
            <tr>
                <th width="244">Produto</th>
                <th width="79">Quantidade</th>
                <th width="89">Preço</th>
                <th width="100">Subtotal</th>
                <th width="64">Remover</th>
            </tr>
        </thead>
        <form action="?acao=up" method="post">
            <tfoot>
                <tr>
                <td coolspan="5"><input type="submit" value="Atualizar Carrinho"></td>
                <tr>
                <td colspan="5"><a href="conta-logada.php">Continuar Comprando</a></td>
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

                            $nome = $ln['nome'];
                            $preco = $ln['preco'];
                            $sub = number_format($ln['preco'] * $qtd, 2, ',', '.');
                            $total += $sub;

                            echo '<tr>
                                    <td>'.$nome'</td>
                                    <td><input type="number" size="3" name="prod['.$id.']" value="'.$qtd.'"</td>
                                    <td>R$'.$preco.'</td>
                                    <td>R$'.$sub.'</td>
                                    <td><a href="?acao=del&id='.$id.'">Remover</td>
                                </tr>'; 
                        }
                        
                        $total = number_format($total, 2, ',', '.');
                        echo '<tr>
                               <td colspan="4">Total</td> 
                               <td>R$'.$total.'</td>
                            </tr>'
                    }
                ?>
            </tbody>
        </form>
    </table>
</body>
</html>